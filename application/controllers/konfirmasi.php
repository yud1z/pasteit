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
class Konfirmasi extends Category {

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
    $this->parser->parse('header_cust', $data);
    //$this->parser->parse('topbar', $data);
  }

  public function _post_konfirmasi(){
    
    $data = array(
      'konfirmasi_tanggal_bayar' => $_POST['year'] .'-' . $_POST['month'] . '-'. $_POST['day'],
      'konfirmasi_jumlah_bayar'  => $_POST['jumlah'],
      'konfirmasi_bank_pembayar' => $_POST['bank'],
      'konfirmasi_bank_pengirim' => $_POST['bank_pengirim'],
      'konfirmasi_catatan'       => $_POST['catatan'],
      'date_time'                => $this->_now(),
      'invoice_id'               => $_POST['kode_pesanan'],
    );

    $this->db->insert('druid_konfirmasi', $data); 



    redirect('/konfirmasi/sukses', 'location', 301);
  
  }

  public function sukses()
  {


    $data = array(
      'path' => $this->_getPackage_path(),
      'footbar_produk'  => $this->_random_produk_4(),  
    );

    $this->parser->parse('konfirmasi_sukses', $data);
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

    if ($_POST) {
      $this->_post_konfirmasi();
    }

    $data = array(
      'path' => $this->_getPackage_path(),
      'footbar_produk'  => $this->_random_produk_4(),  
    );

    $this->parser->parse('konfirmasi', $data);
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

