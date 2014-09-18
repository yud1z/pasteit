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
class Clients extends Page {

  public function index(){
    $this->load->model($this->_getBoot_name() . 'content');
    $clients = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content_cat('clients');

    $data = array(
		  'path'                  => $this->_getPackage_path(),  
      'clients'              => $clients,
		  );
    $this->parser->parse('clients', $data);   
  
  } 


}
