<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller 
{

  public function index()
  {
    $vals = array(
      'img_path'	 => './files/captcha/',
      'img_url'	 => '/files/captcha/',
      'img_width'	 => 150,
      'img_height' => 50,
      //'font_path'	 => './files/fonts/font4.ttf',
      'border' => 10, 
      'expiration' => 7200
    ); 
    //opn($vals);
    $cap = create_captcha($vals);
    $data['image'] = $cap['image'];
    $this->session->set_userdata('word', $cap['word']);
    $this->load->view('captcha', $data);
  }

}
