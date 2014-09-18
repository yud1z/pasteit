<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('page.php');

/**
 * @class Page 
 * @abstract description 
 * 
 * @uses Boot
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Contact_us extends Page {


  public function _post_message(){

    if ($_POST['nama'] != '') {
    $data = array(
      'book_nama'     => $_POST['nama'],
      'book_email'    => $_POST['email'],
      'book_phone'    => $_POST['phone'],
      'book_company'  => $_POST['company'],
      'book_message'  => $_POST['message'],
      'book_date'     => $this->_now(),
    );
    $this->db->insert('druid_book', $data);  

    }
    redirect('/contact_us/success', 'location', 301);
  
  }


  public function index(){

    if ($_POST) {
      $this->_post_message();
    }


    $this->load->model($this->_getBoot_name() . 'content');
    $contact_us = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content_cat('contact_us');

    $data = array(
		  'path'                  => $this->_getPackage_path(),  
      'contact_us'            => $contact_us,
		  );
    $this->parser->parse('contact_us', $data);   
  
  } 

  public function success(){
  

    $data = array(
		  'path'                  => $this->_getPackage_path(),  
		  );
    $this->parser->parse('contact_us_success', $data);   
  
  }


}
