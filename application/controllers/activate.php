<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'category.php';

/**
 * @class Activate 
 * @abstract class for activation account create 
 * 
 * @uses Category
 * @package 
 * @version 0.1
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Activate extends Category 
{

  /**
   * @function index 
   * @abstract Emptying the index 
   * 
   * @access public
   * @return void
   */
  public function index(){
  }

  /**
   * @function code 
   * @abstract description 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function code($arg = '')
  {

    //  Load mode of druid_data and load the active record
    $this->load->model($this->_getBoot_name() . 'data');
    $data_detail = $this->{$this->_getBoot_name() . 'data'}->get_data_by_user_code($arg);

    //  if you are nor activated
    if ($data_detail > 0) {

      //  edit the activation
      $data = array(
        'data_activation' => 1,
      );

      //  update the database of data_activation_key
      $this->db->update($this->_getBoot_name() . 'data', 
      $data, 
      array(
        'data_activation_key' => $arg)
      );

      $data = array(    
        'path' => $this->_getPackage_path(),  
      );

      //  parse the third party template in activate.php
      $this->parser->parse('activate', $data);

    }
    else {

      //  if you are banned
      $data = array(    
        'path' => $this->_getPackage_path(),  
      );

      //  parse the third party template in sign_up_banned.php
      $this->parser->parse('sign_up_banned', $data);


    }

  }
  
}
