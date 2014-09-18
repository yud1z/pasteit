<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('page.php');

class Login extends Page {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

  //TODO::make sure the login
  //acivate via remap

  var $login_username;
  var $login_password;
  var $login_alert;

  /**
   *  header for viewer 
   */
  public function _before() {

    //opn($val);

    //opn($this->menu()->render());


    //DO::include the php pass
    $arg = array(
      'key' => 8,
      'boolen' => FALSE, 
    );
    $this->load->library('PasswordHash', $arg);

    //load the user table
    //$this->load->model('belitung_user');
    $this->load->add_package_path(APPPATH.'third_party/'. $this->_getPackage() .'/');
    $data = array(
      'path' => $this->_getPackage_path(),  
      'menu' => $this->menu()->render(),  
      'menu_tiny' => $this->menu()->render_tiny(),  
      'skyrep_start'  => $this->_skyrep('start'),  
      'skyrep_end'    => $this->_skyrep('end'), 
      'menu_login' => $this->_menu_login(),  
    );
    $this->parser->parse('header', $data);
    //$this->parser->parse('topbar', $data);
  }

  /**
   *  the content
   */
	public function index()
	{

    //set the data model
    $this->_setModel($this->_getBoot_name() . 'user');

    $this->load->model($this->_getModel());


    if (isset($_POST)) {
      if (isset($_POST['username']) && isset($_POST['password'])) {

        //Autentikasi password and username
        $this->_setLogin_username($_POST['username']);
        $this->_setLogin_password($_POST['password']);
        $this->_login_auth();
      }
    }
    $data = array(
      'alert' => $this->_getLogin_alert(),
      'path' => $this->_getPackage_path(),  
      'cart' => $this->_cart(),  
    );
    $this->parser->parse('login', $data);

	}



  /**
   *  Login and auth method
   */
  public function _login_auth()
  {

    $username = $this->_getLogin_username();
    $password = $this->_getLogin_password();    


    //DO::check user
    $this->{$this->_getModel()}->_setUser_name($username);
    $result = $this->{$this->_getModel()}->check_username();

    if ($result >= 0) {

      //DO::check password
      $password_in = $this->{$this->_getModel()}->get_password();

      if (!empty($password_in)) {

        //$arg = array(
          //'key' => 8,
          //'boolen' => FALSE, 
        //);
        //$this->load->library('PasswordHash', $arg);

        $t_hasher   =  $this->passwordhash->CheckPassword($password, $password_in[0]->user_pwd);

        if ($t_hasher == true) {

          //give the session here

          $this->load->model('druid_data');
          $data_session = $this->{$this->_getModel()}->get_user_session();
          $this->load->model($this->_getBoot_name() . 'data');
          $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_id($data_session[0]->user_id);
          //opn($data_session);

          //redirect('/admin', 'location', 301);

          $level = $data_session[0]->user_level;

          if ($level == 'admin') {
          $session = array(
            'user_id' => $data_session[0]->user_id,
            'user_name' => $data_session[0]->user_name,
            'user_level' => $data_session[0]->user_level,
          );
          $this->session->set_userdata($session);
            redirect('/admin', 'location', 301);
          }
          elseif ($level == 'reseller_online') {
            redirect('/Onlineseller', 'location', 301);
          }
          else {
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
              redirect('/register/success', 'location', 301);
            }
            elseif ($data_activation == 2) {
              redirect('/register/banned', 'location', 301);
            }
            else {
              redirect('/', 'location', 301);
            }
          }
        }
        else {
          //error of password
          $this->_setBoot_alert_type('alert alert-error');
          $this->_setBoot_alert_text('Login Failure');
          $this->_setBoot_alert_big('Error!');
          $this->_setLogin_alert($this->alert());

        }
      }
      else {
        //error of password
        $this->_setBoot_alert_type('alert alert-error');
        $this->_setBoot_alert_text('Login Failure');
        $this->_setBoot_alert_big('Error!');
        $this->_setLogin_alert($this->alert());
      }
    }
    else {
      //error username
      $this->_setBoot_alert_type('alert alert-error');
      $this->_setBoot_alert_text('Login Failure');
      $this->_setBoot_alert_big('Error!');
      $this->_setLogin_alert($this->alert());
    }
  }




  ///**
   //*  footer for viewer
   //*/
  //public function _after() {

    //$val4 = $this->image_cache($this->special(), 220, 160);
    //$val4 = $this->_convert_url($val4, 'content_title');
    //$data = array(
      //'path' => $this->_getPackage_path(),  
      //'special_offer' => $val4,  
      //'special_offer_mobile' => $val4,  
    //);
    //$this->parser->parse('footer', $data);
  //}

  
  /**
   * Get login_username.
   *
   * @return login_username.
   */
  function _getLogin_username()
  {
      return $this->login_username;
  }
  
  /**
   * Set login_username.
   *
   * @param login_username the value to set.
   */
  function _setLogin_username($login_username = '')
  {
      $this->login_username = $login_username;
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
  
  /**
   * Get login_alert.
   *
   * @return login_alert.
   */
  function _getLogin_alert()
  {
      return $this->login_alert;
  }
  
  /**
   * Set login_alert.
   *
   * @param login_alert the value to set.
   */
  function _setLogin_alert($login_alert = '')
  {
      $this->login_alert = $login_alert;
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
