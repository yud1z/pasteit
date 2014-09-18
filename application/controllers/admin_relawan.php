<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_file.php');

class Admin_relawan extends Admin_file {

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




  /**
   *  lets start
   */
  public function _start()
  {

    //set the primary key
    $this->_setAdmin_user_key('relawan_id');

    //set the page
    $this->_setAdmin_user_page('admin_relawan');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'relawan');

  }




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

