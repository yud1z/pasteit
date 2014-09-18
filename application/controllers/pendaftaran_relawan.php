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
class Pendaftaran_relawan extends Category {


  /**
   * @function index 
   * @abstract fill up with view page 
   * 
   * @access public
   * @return void
   */
  public function index()
  {
    $this->load->model('druid_ads');
    $ads = $this->druid_ads->get_all_ads();
    $data = array(
      'path' => $this->_getPackage_path(),
      'footbar_produk'  => $this->_random_produk_4(),  
      'ads'             => $ads,  
		  'tweet'                 => $this->_tweet(),  
    );

    $this->parser->parse('pendaftaran_relawan', $data);
  }


  public function _code_relawan(){

    if ($_POST['tipe'] == 'relawan') {

      $data1 = array(
        'relawan_nama'      => $_POST['nama'] ,
        'relawan_alamat'    => $_POST['alamat'] ,
        'ongkir_id'         => $_POST['district'] ,
        'relawan_email'     => $_POST['email'] ,
        'relawan_telp'      => $_POST['no_telp'] ,
        'relawan_date_time' => $this->_now() ,
      );

      $this->db->insert('druid_relawan', $data1); 

    }

      $data = array(
        'subscribe_email'      => $_POST['email'] ,
        'subscribe_datetime'    => $this->_now() ,
      );

      $this->db->insert('druid_subscribe', $data); 

  
  }

  
  public function success()
  {

    if ($_POST) {
      $this->_code_relawan();
    }

    $this->load->model('druid_ads');
    $ads = $this->druid_ads->get_all_ads();
    $data = array(
      'path' => $this->_getPackage_path(),
      'footbar_produk'  => $this->_random_produk_4(),  
      'ads'             => $ads,  
		  'tweet'                 => $this->_tweet(),  
    );

    $this->parser->parse('pendaftaran_relawan_success', $data);
  }

  public function success_email()
  {

    if ($_POST) {
      $this->_code_relawan();
    }

    $this->load->model('druid_ads');
    $ads = $this->druid_ads->get_all_ads();
    $data = array(
      'path' => $this->_getPackage_path(),
      'footbar_produk'  => $this->_random_produk_4(),  
      'ads'             => $ads,  
		  'tweet'                 => $this->_tweet(),  
    );

    $this->parser->parse('pendaftaran_relawan_success_email', $data);
  }




}

