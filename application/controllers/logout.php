<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

  public function index()
  {
    
    $session = array(
      'user_id' => '',
      'user_name' => '',
      'user_level' => '',
    );
    $this->session->unset_userdata($session);

    redirect('/', 'location', 301);
  }
}
