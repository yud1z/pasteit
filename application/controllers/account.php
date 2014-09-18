<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('about_us.php');

/**
 * @class Account 
 * @abstract Account settings for the user 
 * 
 * @uses About
 * @uses _us
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Account extends About_us {
  
  
  var $login_password;

  /**
   * error 
   * 
   * @var mixed
   * @access public
   */
  var $error = array();

  /**
   * @function index 
   * @abstract load the page 
   * 
   * @access public
   * @return void
   */
  public function index()
  {
    $this->_setModel($this->_getBoot_name() . 'user');
    $this->load->model($this->_getModel());
    if ($_POST) {
      if ($_POST['type'] == 'standard') {
        $this->_code_standard($_POST);
      }
      if ($_POST['type'] == 'detail') {
        $this->_code_detail($_POST);
      }
    }


    $this->load->model($this->_getBoot_name() . 'data');
    $user_id = (isset($this->session->userdata['user_id'])) ? $this->session->userdata['user_id'] : '';
    $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_id($user_id);

    $error_validation = $this->_error_render($this->_getError());

    //  get the user data by session
    //  get the detail of user here by the session
    $data = array(
      'path' => $this->_getPackage_path(),
      'detail' => $this->session->userdata,
      'data_detail' => $data_detail,
      'error' => $error_validation
    );

    $this->parser->parse('account', $data);
  }

  /**
   * @function _error_render 
   * @abstract This is the error render 
   * 
   * @param array $data 
   * @access public
   * @return void
   */
  public function _error_render($data = array())
  {

    if (!empty($data)) {

      $alert    = $data['type'];
      $content  = $data['content'];
      $head     = $data['head'];

      $show = '';

      switch ($alert) {
      case 'error':
        $show = 'alert-error'; 
        break;

      case 'info':
        $show = 'alert-info';
        break;

      case 'success':
        $show = 'alert-success';
        break;

      default:
        $show = '';
        break;
      }

      return '
        <div class="alert '. $show .'">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>'. $head .'</strong> '. $content .'
        </div>
        ';  
    }
    else {
      return '';
    }
  }

  /**
   * @function _code_standard 
   * @abstract Standard Account setting page 
   * 
   * @param array $data 
   * @access public
   * @return void
   */
  public function _code_standard($data = array()){

    $session = $this->session->userdata;
    if (isset($session['user_id'])) {

      $user_id  = $session['user_id']; 

      $email    = $session['data_email'];
      $username = $session['user_name'];

      $post_email       = $_POST['email'];
      $post_username    = $_POST['username'];
      $post_password    = $_POST['password'];
      $post_repassword  = $_POST['repassword'];

      $alert = '';

      if ($post_email != '') {

        if (filter_var($post_email, FILTER_VALIDATE_EMAIL)) {

          // detect if email has exists
          $this->load->model('druid_data');
          $this->druid_data->_setData_email($email);
          $data = $this->druid_data->check_not_mail($post_email);
          $sdata = $this->druid_data->get_mail();

          if (!empty($sdata)) {

            //  if the email not same with our own email
            if ($sdata[0]->data_email != $post_email) {
              //  check if the email not same by anyone
              if ($data >= 1) {
                //  this where email is exists
                //  set the error here
                $this->_setError(array(
                  'type'  =>  'error',
                  'head'  =>  'Error!',
                  'content' =>  'Email already exists, You must choose the other email.',
                ));
              }
              else {
                //  this where email is not exists
                //  update the email here
                $data = array(
                  'data_email' => $post_email,
                );
                $this->db->update('druid_data', $data, array('user_id' => $user_id));

                //  retrieve all the data from druid_data here
                $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_id($user_id);
                $this->druid_user->_setUser_name($username);
                $data_session = $this->druid_user->get_user_session();

                $session = array(
                  'user_id' => $data_session[0]->user_id,
                  'user_name' => $data_session[0]->user_name,
                  'user_level' => $data_session[0]->user_level,
                  'data_activation' => $data_detail[0]->data_activation,
                  'data_email' => $data_detail[0]->data_email,
                );
                //  destroy the session here
                //$this->session->sess_destroy();
                //  set the session again here
                $this->session->set_userdata($session);

                //  set the success message here
                $this->_setError(array(
                  'type'  =>  'success',
                  'head'  =>  'success!',
                  'content' =>  'You Email Change Successfully.',
                ));

              }
              // if not exists so update the email
              // sent the confirmation code
            }

          }


        }
        else {
          $this->_setError(array(
            'type'  =>  'error',
            'head'  =>  'Error!',
            'content' =>  'Email format is wrong',
          ));
 
        }
      }
      else {

        $this->_setError(array(
          'type'  =>  'error',
          'head'  =>  'Error!',
          'content' =>  'Email is Empty',
        ));

      }




      if ($post_username != '') {

        //  detect if username has exists
        //  if not exists so create the username
        $this->load->model('druid_user');
        $this->druid_user->_setUser_name($username);
        $data = $this->druid_user->check_not_user($post_username);
        $kdata = $this->druid_user->get_username();

        if (!empty($kdata)) {

          if ($kdata[0]->user_name != $post_username) {
            if ($data >= 1) {
              $this->_setError(array(
                'type'  =>  'error',
                'head'  =>  'Error!',
                'content' =>  'Username already exists, You must choose the other username.',
              ));

            }
            else {
              //  here update the username
              $data = array(
                'user_name' => $post_username,
              );
              $this->db->update('druid_user', $data, array('user_id' => $user_id));
              $this->load->model('druid_data');
              //  retrieve all the data from druid_data here
              $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_id($user_id);
              $this->druid_user->_setUser_name($post_username);
              $data_session = $this->druid_user->get_user_session();

              $session = array(
                'user_id' => $data_session[0]->user_id,
                'user_name' => $data_session[0]->user_name,
                'user_level' => $data_session[0]->user_level,
                'data_activation' => $data_detail[0]->data_activation,
                'data_email' => $data_detail[0]->data_email,
              );
              //  destroy the session here
              //$this->session->sess_destroy();
              //  set the session again here
              $this->session->set_userdata($session);

              //  set the success message here
              $this->_setError(array(
                'type'  =>  'success',
                'head'  =>  'success!',
                'content' =>  'You Username Change Successfully.',
              ));


            }
          }
        }



      }
      else {
        $this->_setError(array(
          'type'  =>  'error',
          'head'  =>  'Error!',
          'content' =>  'Username is Empty',
        ));
      }

      if ($post_password != '' && $post_repassword != '') {
        if ($post_password == $post_repassword) {
          //  if password is just 5 character

          if (strlen($post_repassword) < 5) {
            $this->_setError(array(
              'type'  =>  'error',
              'head'  =>  'Error!',
              'content' =>  'Minimum 5 character password',
            ));
          }
          else {
            // update the password 
            $this->_setLogin_password($post_repassword);
            $this->_login_pwd_encrypt();
            $password = $this->_getLogin_password();

            $data = array(
              'user_pwd' => $password,
            );
            $this->db->update('druid_user', $data, array('user_id' => $user_id));

            $this->_setError(array(
              'type'  =>  'success',
              'head'  =>  'Success!',
              'content' =>  'Password changed successfully',
            ));
          }


        }
        else {
          $this->_setError(array(
            'type'  =>  'error',
            'head'  =>  'Error!',
            'content' =>  'Password is not same',
          ));
        }
      }
      else {
        //  this line removed because any people want to choose the other username or email
        //  dont need input password again
      }

      //opn($session);

      //$data = array(

      //);
      //$this->db->update('druid_user', $data, array('user_id' => $user_id));
    }
  }

  /**
   * @function _code_detail 
   * @abstract Code detail of account settings
   * 
   * @param array $data 
   * @access public
   * @return void
   */
  public function _code_detail($data = array()){
    //opn($data);
      
    //  here to update all, no need to validate

    if ($data['district'] != '-1') {
      


    if (empty($data['newsletter'])) {
      $data['newsletter'] = 0;
    }
    else {
      $data['newsletter'] = 1;
    }

    if (empty($data['milist'])) {
      $data['milist'] = 0;
    }
    else {
      $data['milist'] = 1;
    }

    $session  = $this->session->userdata;
    $user_id   = $session['user_id']; 

    $data = array(
      'data_nama_lengkap'   => $data['nama_lengkap'],
      'data_tanggal_lahir'  => $data['tahun'] . '-' . $data['bulan'] . '-' . $data['tanggal'],
      'data_alamat'         => $data['alamat'],
      'data_kode_pos'       => $data['kode_pos'],
      'ongkir_id'           => $data['district'],
      'data_negara'         => $data['negara'],
      'data_no_telp'        => $data['no_telp'],
      'data_newsletter'     => $data['newsletter'],
      'data_milist'         => $data['milist'],
      'data_no_phone'       => $data['mobile_phone'],
    );
    $this->db->update('druid_data', $data, array('user_id' => $user_id));

    $this->load->model('druid_user');
    $this->load->model('druid_data');

    $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_id($user_id);
    $this->druid_user->_setUser_name($session['user_name']);
    $data_session = $this->druid_user->get_user_session();

    $session = array(
      'user_id' => $data_session[0]->user_id,
      'user_name' => $data_session[0]->user_name,
      'user_level' => $data_session[0]->user_level,
      'data_activation' => $data_detail[0]->data_activation,
      'data_email' => $data_detail[0]->data_email,
    );
    //  destroy the session here
    //$this->session->sess_destroy();
    //  set the session again here
    $this->session->set_userdata($session);

    //  set the success message here
    $this->_setError(array(
      'type'  =>  'success',
      'head'  =>  'success!',
      'content' =>  'Your Detail Information Changed Successfully.',
    ));

    }
    else {
    $this->_setError(array(
      'type'  =>  'error',
      'head'  =>  'error!',
      'content' =>  'Please, specify your district.',
    ));
    }


  }

  /**
   * @function _getError().
   * @abstract Get error.
   *
   * @return error.
   */
  function _getError()
  {
    return $this->error;
  }

  /**
   * @function _setError().
   * @abstract Set error.
   *
   * @param error the value to set.
   */
  function _setError($error = '')
  {
    $this->error = $error;
  }
  
  /**
   * @function _getLogin_password().
   * @abstract Get login_password.
   *
   * @return login_password.
   */
  function _getLogin_password()
  {
      return $this->login_password;
  }
  
  /**
   * @function _setLogin_password().
   * @abstract Set login_password.
   *
   * @param login_password the value to set.
   */
  function _setLogin_password($login_password = '')
  {
      $this->login_password = $login_password;
  }
}

