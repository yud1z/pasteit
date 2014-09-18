<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('category.php');

/**
 * @class About_us 
 * @abstract Show About Us Page, static page 
 * 
 * @uses Category
 * @package 
 * @version 0.1
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Photos extends Category {

  /**
   * @function _before 
   * @abstract fill with single header 
   * 
   * @access public
   * @return void
   */
  public function _before() {

    $this->load->add_package_path(APPPATH.'third_party/'. $this->_getPackage() .'/');
    $data = array(
      'path'          => $this->_getPackage_path(),  
      'menu'          => $this->menu()->render(),  
      'menu_tiny'     => $this->menu()->render_tiny(),  
      'skyrep_start'  => $this->_skyrep('start'),  
      'skyrep_end'    => $this->_skyrep('end'),  
      'menu_login'    => $this->_menu_login(),  
      'cart' => $this->_cart(),  
    );
    $this->parser->parse('header', $data);
    //$this->parser->parse('topbar', $data);
  }


  /**
   * @function index 
   * @abstract fill up with view page 
   * 
   * @access public
   * @return void
   */
  public function index()
  {


    $this->db->join('druid_category', 'druid_category.category_id = druid_content.category_id');
    $this->db->join('druid_file', 'druid_file.content_id = druid_content.content_id');
    $this->db->where('druid_category.category_value', 'photos');
    $query = $this->db->get('druid_content');

    $hasil = $query->result();

    $this->image_cache($hasil, 220, 220, true,'image_strip');

    $data = array(
      'path' => $this->_getPackage_path(),
      'footbar_produk'  => $this->_random_produk_4(),  
      'value'  => $hasil,  
    );

    $this->parser->parse('photos', $data);
  }


  /**
   * @function _after 
   * @abstract set the single footer here 
   * 
   * @access public
   * @return void
   */
  public function _after() {
    $val4 = $this->image_cache($this->special(), 220, 160);
    $val4 = $this->_convert_url($val4, 'content_title');
    $data = array(
      'path' => $this->_getPackage_path(),  
      'special_offer' => $val4,  
      'special_offer_mobile' => $val4,  
    );
    $this->parser->parse('footer', $data);
  }


}

