<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('boot.php');

class Confirm extends Boot {
  public function _before() {

    $this->load->add_package_path(APPPATH.'third_party/'. $this->_getPackage() .'/');
    $data = array(
      'path'          => $this->_getPackage_path(),  
      'menu'          => $this->menu()->render(),  
      'menu_tiny'     => $this->menu()->render_tiny(),  
      'skyrep_start'  => $this->_skyrep('start'),  
      'skyrep_end'    => $this->_skyrep('end'),  
      'menu_login'    => 0,  
      'cart' => '',  
    );
    $this->parser->parse('header', $data);
    $this->parser->parse('topbar', $data);
  }
  public function index()
  {
    $data = array(
      'path' => $this->_getPackage_path(),
    );

    $this->parser->parse('confirm', $data);
  }
  /**
   *  footer for viewer
   */
  public function _after() {
    $data = array(
      'path' => $this->_getPackage_path(),  
    );
    $this->parser->parse('footer', $data);
  }
}
