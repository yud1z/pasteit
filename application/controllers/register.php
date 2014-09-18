<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'category.php';

/**
 * @class Register 
 * @abstract description 
 * 
 * @uses Category
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Register extends Category 
{
  /**
   * login_password 
   * 
   * @var mixed
   * @access public
   */
  var $login_password;

  /**
   * @function _code_register 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _code_register()
  {
    $this->form_validation->set_error_delimiters('<div class="errorbox">', '</div>');
    //opn($_POST);
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[druid_user.user_name]');
    $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[3]|max_length[50]|');
    $this->form_validation->set_rules('district', 'District', 'callback_valid_place');
    $this->form_validation->set_rules('alamat', 'Postal Address', 'required');
    $this->form_validation->set_rules('zip', 'Postal Code', 'required');
    $this->form_validation->set_rules('mobile', 'mobile Phone Number', 'required');
    $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|match[vmail]|is_unique[druid_data.data_email]');
    $this->form_validation->set_rules('vemail', 'Verivy Email Address', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|match[vassword]||min_length[5]|max_length[12]|');
    $this->form_validation->set_rules('vassword', 'Verivy Password', 'required');

    //  If form is cool
    if ($this->form_validation->run() == TRUE) {


      //encrypt the password
      $this->_setLogin_password($_POST['password']);
      $this->_login_pwd_encrypt();
      $password = $this->_getLogin_password();

      //  insert the user
      $data = array(
        'user_name'   => $_POST['username'],
        'user_pwd'    => $password,
        'user_level'  => 'user',
      );
      $this->db->insert($this->_getBoot_name() . 'user', $data);
      $id = $this->db->insert_id();

      $newsletter = (isset($_POST['newsletter'])) ? $_POST['newsletter'] : 0;
      $milist     = (isset($_POST['milist'])) ? $_POST['milist'] : 0;

      $code = random_string('alnum', 10) . time();
      //  insert the details
      $data = array(
        'user_id'             => $id,
        'data_nama_lengkap'   => $_POST['fullname'],
        'data_tanggal_lahir'  => $_POST['tanggal'] . '-' . $_POST['bulan'] . '-' . $_POST['tahun'],
        'data_alamat'         => $_POST['alamat'],
        'data_kode_pos'       => $_POST['zip'],
        'ongkir_id'           => $_POST['district'],
        'data_negara'         => 'ID',
        'data_no_telp'        => $_POST['Phone'],
        'data_no_phone'       => $_POST['mobile'],
        'data_email'          => $_POST['email'],
        'data_newsletter'     => $newsletter,
        'data_milist'         => $milist,
        'data_activation'     => '0',
        'data_activation_key' => $code,
      );
      $this->db->insert($this->_getBoot_name() . 'data', $data);


      //  Send Mail
      $this->load->library('phpmailer');

      $mailer = new PHPMailer();
      $mailer->IsSMTP();
      $mailer->Host = 'mail.vamily.co.id:587';
      $mailer->SMTPAuth = TRUE;

      $mailer->Username = 'vamily@vamily.co.id';  // Change this to your gmail adress
      $mailer->Password = 'patalsenayan.';  // Change this to your gmail password
      $mailer->From = 'vamily@vamily.co.id';  // This HAVE TO be your gmail adress
      $mailer->FromName = 'Vamily'; // This is the from name in the email, you can put anything you like here

      $mailer->Subject = 'Vamily Link Activation';
      $mailer->AddAddress($_POST['email']);  // This is where you put the email adress of the person you want to mail

      $mailer->IsHTML(true);
      $mailer->Body = "
        Please click link below to activate your account at <a href='http://vamily.co.id'>vamily.co.id</a>
        <br>
        <br>
        <a href='http:://vamily.co.id/activate/code/". $code ."'>Click Here</a>
        <br>
        <br>
or
<br>
  <br>
  http:://vamily.co.id/activate/code/". $code ."

  <br>
  <br>
Thanks
";

$mailer->Send();


//  Got the success Page
redirect('/register/success', 'location', 301);
    }

  }

  /**
   * @function success 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function success()
  {
    $data = array(    
      'path' => $this->_getPackage_path(),  
    );

    $this->parser->parse('sign_up_success', $data);
  }

  /**
   * @function banned 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function banned()
  {
    $data = array(    
      'path' => $this->_getPackage_path(),  
    );

    $this->parser->parse('sign_up_banned', $data);
  }

  /**
   * @function valid_captcha 
   * @abstract description 
   * 
   * @param string $str 
   * @access public
   * @return void
   */
  public function valid_captcha($str = '')
  {
    if ($str != $this->session->userdata('word')) {
      $this->form_validation->set_message('valid_captcha', 'Wrong Captcha');
      return FALSE;
    }
    else {
      return TRUE;
    }
  }

  /**
   * @function valid_place 
   * @abstract description 
   * 
   * @param string $str 
   * @access public
   * @return void
   */
  public function valid_place($str = '')
  {
    if ($str == '' || $str == '---' || $str == '-1') {
      $this->form_validation->set_message('valid_place', 'You are not fill %s yet');
      return FALSE;
    }
    else {
      return TRUE;
    }

  }

  /**
   * @function _place 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _place()
  {
    $this->load->model($this->_getBoot_name() . 'ongkir');
    $val = $this->{$this->_getBoot_name() . 'ongkir'}->get_province();

    $val1 = array();

    foreach ($val as $key) {

      $val2 = $this->{$this->_getBoot_name() . 'ongkir'}->get_city($key->ongkir_propinsi);
      foreach ($val2 as $key1) {
        $val3 = $this->{$this->_getBoot_name() . 'ongkir'}->get_district($key->ongkir_propinsi, $key1->ongkir_kabupaten);
        foreach ($val3 as $key2) {
          $val1[
            str_replace('.', '_', str_replace(' ', '_', $key->ongkir_propinsi))
            ][
            str_replace('.', '_', str_replace(' ', '_', $key1->ongkir_kabupaten))
            ][
            str_replace('.', '_', str_replace(' ', '_', $key2->ongkir_kecamatan))
            ] = $key2->ongkir_id; 
        }

      }
    }

    return $val1;

  }

  /**
   * @function ajax 
   * @abstract description 
   * 
   * @param string $method 
   * @access public
   * @return void
   */
  public function ajax($method = '')
  {
    if ($method == 'place') {
      header("Content-type: text/javascript; charset: UTF-8");
      header("Cache-Control: must-revalidate");
      $offset = 60 * 60 * 24 * 3;
      $ExpStr = "Expires: " .
        gmdate("D, d M Y H:i:s",
          time() + $offset) . " GMT";
      header($ExpStr);
      echo 'var place = ' . json_encode($this->_place()) . ';';

    }
    elseif ($method == 'captcha') {
      echo $this->_capthca();
    }
    elseif ($method == 'valid') {
      $this->_ajax_valid();
    }
    elseif ($method == 'valid_store') {
      $this->_ajax_valid_store();
    }
    elseif ($method == 'valid_user') {
      $this->_ajax_valid_user();
    }
    elseif ($method == 'reg_user') {
      $this->_reg_user();
    }
    elseif ($method == 'reg_resend') {
      $this->_reg_resend();
    }

  }

  /**
   * @function _reg_resend 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _reg_resend()
  {
    $email = urldecode($_POST['m']);
    $password = urldecode($_POST['p']);
    if ($email) {

      $this->load->model('druid_data');
      $this->load->model('druid_user');
      $arg = array(
        'key' => 8,
        'boolen' => FALSE, 
      );
      $this->load->library('passwordhash',$arg);

      $data = $this->druid_data->get_confirm_code($email);

      if (!empty($data)) {

        $code = $data[0]->data_activation_key;

        //  Send Mail
        $this->load->library('phpmailer');

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Host = 'mail.vamily.co.id:587';
        $mailer->SMTPAuth = TRUE;

        $mailer->Username = 'vamily@vamily.co.id';  // Change this to your gmail adress
        $mailer->Password = 'patalsenayan.';  // Change this to your gmail password
        $mailer->From = 'vamily@vamily.co.id';  // This HAVE TO be your gmail adress
        $mailer->FromName = 'Vamily'; // This is the from name in the email, you can put anything you like here

        $mailer->Subject = 'Vamily Link Activation';
        $mailer->AddAddress($email);  // This is where you put the email adress of the person you want to mail

        $mailer->IsHTML(true);
        $mailer->Body = "
          Please click link below to activate your account at <a href='http://vamily.co.id'>vamily.co.id</a>
          <br>
          <br>
          <a href='http:://vamily.co.id/activate/code/". $code ."'>Click Here</a>
          <br>
          <br>
or
<br>
  <br>
  http:://vamily.co.id/activate/code/". $code ."

  <br>
  <br>
Thanks
";

$mailer->Send();



      }
    }


  }


  /**
   * @function _reg_user 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _reg_user()
  {
    $email = urldecode($_POST['m']);
    $pass = urldecode($_POST['p']);
    $alay = array();
    $u_dat = 0;
    $p_dat = 0;

    if ($email == '') {
      $alay['type'] = 'error';
      $alay['code'] = '103';
      $alay['value'] = 'email must not empty';
      $m_dat = 0;
    }
    else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alay['type'] = 'error';
        $alay['code'] = '104';
        $alay['value'] = 'Its Wrong Email Format';    
        $m_dat = 0;
      }
      else {
        $alay['type'] = 'success';
        $alay['code'] = '205';
        $alay['value'] = 'Email good';        
        $m_dat = 1;
      }
    }

    if ($pass == '') {
      $alay['type'] = 'error';
      $alay['code'] = '105';
      $alay['value'] = 'password must not empty';
      $u_dat = 0;
    }
    else {
      if (strlen($pass) < 3) {
        $alay['type'] = 'error';
        $alay['code'] = '106';
        $alay['value'] = 'Et least 3 Character please';
        $u_dat = 0;
      }
      else {
        $alay['type'] = 'success';
        $alay['code'] = '206';
        $alay['value'] = 'Password good';           
        $u_dat = 1;
      }
    }

    if ($m_dat == 1 && $u_dat == 1) {

      $this->load->model('druid_data');
      $this->load->model('druid_user');     

      //encrypt the password
      $this->_setLogin_password($pass);
      $this->_login_pwd_encrypt();
      $password = $this->_getLogin_password();

      //  regsiter to our db here
      //  insert the user
      $data = array(
        'user_name'   => $email,
        'user_pwd'    => $password,
        'user_level'  => 'user',
      );
      $this->db->insert('druid_user', $data);
      unset($data);
      $id = $this->db->insert_id();


      $code = random_string('alnum', 10) . time();
      //  insert the details
      $data = array(
        'user_id'             => $id,
        'data_email'          => $email,
        'data_activation'     => '0',
        'data_activation_key' => $code,
        'ongkir_id'           => 0,
      );
      $this->db->insert('druid_data', $data);


      //  Send Mail
      $this->load->library('phpmailer');

      $mailer = new PHPMailer();
      $mailer->IsSMTP();
      $mailer->Host = 'mail.vamily.co.id:587';
      $mailer->SMTPAuth = TRUE;

      $mailer->Username = 'vamily@vamily.co.id';  // Change this to your gmail adress
      $mailer->Password = 'patalsenayan.';  // Change this to your gmail password
      $mailer->From = 'vamily@vamily.co.id';  // This HAVE TO be your gmail adress
      $mailer->FromName = 'Vamily'; // This is the from name in the email, you can put anything you like here

      $mailer->Subject = 'Vamily Link Activation';
      $mailer->AddAddress($email);  // This is where you put the email adress of the person you want to mail

      $mailer->IsHTML(true);
      $mailer->Body = "
        Please click link below to activate your account at <a href='http://vamily.co.id'>vamily.co.id</a>
        <br>
        <br>
        <a href='http:://vamily.co.id/activate/code/". $code ."'>Click Here</a>
        <br>
        <br>
or
<br>
  <br>
  http:://vamily.co.id/activate/code/". $code ."

  <br>
  <br>
Thanks
";

$mailer->Send();

//  set the cookies here

$alay['type'] = 'success';
$alay['code'] = '207';
$alay['value'] = 'everything so good';           

    }
    echo json_encode($alay);

  }

  //  Check if user exists in database
  //  if exists = 1
  //  if not exists = 0
  /**
   * @function _ajax_valid_user 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _ajax_valid_user()
  {
    $email = urldecode($_POST['m']);
    $password = urldecode($_POST['p']);

    $this->load->model('druid_data');
    $this->load->model('druid_user');
    $arg = array(
      'key' => 8,
      'boolen' => FALSE, 
    );
    $this->load->library('passwordhash',$arg);

    //DO::check user
    $this->druid_data->_setData_email($email);
    $result = $this->druid_data->check_mail();

    if ($result > 0) {
      $lay = array(
        'type' => 'success',
        'code' => '200',
        'value' => 'success',
      );

      ////DO::check password
      $password_in = $this->druid_data->get_password();

      if (!empty($password_in)) {

        $t_hasher   =  $this->passwordhash->CheckPassword($password, $password_in[0]->user_pwd);

        if ($t_hasher == true) {

          ////give the session here
          $lay = array(
            'type' => 'success',
            'code' => '200',
            'value' => 'success',
          );
          $data_session = $this->druid_user->_setUser_name($password_in[0]->user_name);
          $data_session = $this->druid_user->get_user_session();
          $this->load->model($this->_getBoot_name() . 'data');
          $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_id_pure($data_session[0]->user_id);

          ////redirect('/admin', 'location', 301);

          $level = $data_session[0]->user_level;

          if ($level == 'admin') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '201',
              'value' => 'success as admin',
            );

          }
          elseif ($level == 'reseller_online') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '202',
              'value' => 'success as online reseller',
            );
          }
          elseif ($level == 'reseller_outlet') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '203',
              'value' => 'success as outlet reseller',
            );
          }
          elseif ($level == 'reseller_personal') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '204',
              'value' => 'success as personal reseller',
            );
          }
          elseif ($level == 'kasir') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '205',
              'value' => 'success as Cashier',
            );
          }
          elseif ($level == 'sales') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '206',
              'value' => 'success as Sales',
            );
          }
          elseif ($level == 'gudang') {
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
            );
            $this->session->set_userdata($session);
            $lay = array(
              'type' => 'success',
              'code' => '207',
              'value' => 'success as Warehouse',
            );
          }
          else {
            //opn($data_session);
            //opn($data_detail);
            $data_activation = $data_detail[0]->data_activation;
            $session = array(
              'user_id' => $data_session[0]->user_id,
              'user_name' => $data_session[0]->user_name,
              'user_level' => $data_session[0]->user_level,
              'data_activation' => $data_detail[0]->data_activation,
              'data_email' => $data_detail[0]->data_email,
            );
            $this->session->set_userdata($session);
            if ($data_activation == 0) {
              $lay = array(
                'type' => 'success',
                'code' => '202',
                'value' => 'success as newbie',
              );
            }
            elseif ($data_activation == 2) {
              $lay = array(
                'type' => 'success',
                'code' => '203',
                'value' => 'success as rookie',
              );
            }
            else {
              $lay = array(
                'type' => 'success',
                'code' => '204',
                'value' => 'success as all',
              );
            }
          }

        }
        else {
          //error of password
          $lay = array(
            'type' => 'error',
            'code' => '101',
            'value' => 'password not right',
          );

        }



      }
      else {
        //error of password
        $lay = array(
          'type' => 'error',
          'code' => '101',
          'value' => 'password not right',
        );

      }


    }
    else {
      //error mail
      $lay = array(
        'type' => 'warning',
        'code' => '300',
        'value' => 'email not exists',
      );
    }
    echo json_encode($lay);
  }

  /**
   * @function _ajax_valid_store 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _ajax_valid_store()
  {
    switch ($_POST['type']) {
    case 'store':
      $this->form_validation->set_rules('value', 'Store', 'required|min_length[5]|max_length[12]|is_unique[druid_reseller.reseller_store]');
      $this->form_validation->run();
      echo validation_errors();
      break;
    }

    $this->_ajax_valid();

  } 

  /**
   * @function _ajax_valid 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _ajax_valid()
  {
    switch ($_POST['type']) {
    case 'username':
      $this->form_validation->set_rules('value', 'Username', 'required|min_length[5]|max_length[12]|is_unique[druid_user.user_name]');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'fullname':
      $this->form_validation->set_rules('value', 'Fullname', 'required|min_length[3]|max_length[50]|');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'alamat':

      $this->form_validation->set_rules('value', 'Postal Address', 'required');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'district':

      $this->form_validation->set_rules('value', 'District', 'callback_valid_place');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'zip':

      $this->form_validation->set_rules('value', 'Postal Code', 'required');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'mobile':

      $this->form_validation->set_rules('value', 'mobile Phone Number', 'required');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'email':

      $this->form_validation->set_rules('value', 'Email Address', 'required|valid_email|match[value1]|is_unique[druid_data.data_email]');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'vemail':

      if ($_POST['value'] != $_POST['value1']) {
        echo 'Email not same'; 
      }
      else {

        $this->form_validation->set_rules('value', 'Verivy Email Address', 'required|valid_email|match[value1]');
        $this->form_validation->run();
        echo validation_errors();
      }

      break;

    case 'password':
      $this->form_validation->set_rules('value', 'Password', 'required|match[value2]||min_length[5]|max_length[12]|');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'vassword':

      $this->form_validation->set_rules('value', 'Verivy Password', 'required');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'captcha':

      $this->form_validation->set_rules('value', 'Captcha', 'required|callback_valid_captcha');
      $this->form_validation->run();
      echo validation_errors();
      break;

    case 'sign_up':

      $this->form_validation->set_rules('value', 'Username', 'required|min_length[5]|max_length[12]|is_unique[druid_user.user_name]');
      $this->form_validation->run();
      echo validation_errors();
      break;

    }

  }

  /**
   * @function index 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function index()
  {

    if (!empty($_POST)) {

      $this->_code_register();

    }
    $captcha = $this->_capthca();
    //$captcha = new captcha();
    $data = array(
      'path' => $this->_getPackage_path(),  
      'error' => validation_errors(),  
      'captcha' => $captcha,  
      'cart' => $this->_cart(),  
    );
    $this->parser->parse('sign_up', $data);

  }

  public function _capthca()
  {

    $word = $this->_dict();
    shuffle($word);

    $vals = array(
      'img_path'	    => './files/captcha/',
  /**
   * @function _capthca 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
      'img_url'	      => '/files/captcha/',
      'img_width'	    => 150,
      'img_height'    => 40,
      //'font_path'	  => './files/fonts/font4.ttf',
      'border'        => 10,
      'word'          =>  $word[0], 
      'expiration'    => 2700
    ); 
    $cap = create_captcha($vals);
    $_SESSION['word'] = trim($word[0]);

    return $cap['image'];

  }

  /**
   * @function _dict 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _dict()
  {
    $xml = simplexml_load_file('application/controllers/dict.xml');
    $dict = $xml->text->body->termEntry;
    $array = array();
    foreach ($dict as $key) {
      $wel = (array)$key->langSet->term;
      $array[] = $wel[0];
    }
    return $array;
  }



  /**
   * Get login_password.
   *
   * @return login_password.
   */
  function _getLogin_password()
  {
    return $this->login_password;
  }

  /**
   * Set login_password.
   *
   * @param login_password the value to set.
   */
  function _setLogin_password($login_password = '')
  {
    $this->login_password = $login_password;
  }
}
