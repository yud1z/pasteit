<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_file.php');

class Admin_system extends Admin_File {

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

   
  public function index()
  {

    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');

    if (!empty($_POST) || !empty($_FILES)) {

      $this->_code_system();

    }

    //opn($this->{$this->_getAdmin_user_model()}->get_field('site_name'));

    $data = array(
      'site_name'     => $this->{$this->_getAdmin_user_model()}->get_field('site_name'),
      'default_image' => $this->{$this->_getAdmin_user_model()}->get_field('default_image'),
      'metadata_desc' => $this->{$this->_getAdmin_user_model()}->get_field('metadata_desc'),
      'metadata_key'  => $this->{$this->_getAdmin_user_model()}->get_field('metadata_key'),
      'default_logo'  => $this->{$this->_getAdmin_user_model()}->get_field('default_logo'),
      'default_ico'   => $this->{$this->_getAdmin_user_model()}->get_field('default_ico'),
    );


    $this->load->view('admin_system/content', $data);
    
  }

  public function _code_system()
  {

    if ($_POST['type'] == 'site_name') {
      $this->_update_site_name();
    }
    elseif ($_POST['type'] == 'default_image') {
      $this->_update_default_image();
    }
    elseif ($_POST['type'] == 'metadata_desc') {
      $this->_update_metadata_desc();
    }
    elseif ($_POST['type'] == 'metadata_key') {
      $this->_update_metadata_key();
    }
    elseif ($_POST['type'] == 'default_logo') {
      $this->_update_default_logo();
    }
    elseif ($_POST['type'] == 'default_ico') {
      $this->_update_default_ico();
    }
  }

  public function _update_site_name(){


    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');

    $site_name = (isset($_POST['site_name'])) ? $_POST['site_name'] : '';

    $this->{$this->_getAdmin_user_model()}->_update('site_name', $site_name);
  
  }

  public function _update_default_image(){
  
    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');

    $folder = 'system/default_image';

    $files = $this->_filer($_FILES['default_image'], $folder);

    $default_image = (isset($files['name'])) ? $files['fix_folder'] . $files['name'] : '';

    $this->{$this->_getAdmin_user_model()}->_update('default_image', $default_image);

  }

  public function _update_metadata_desc(){
  

    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');

    $metadata_desc = (isset($_POST['metadata_desc'])) ? $_POST['metadata_desc'] : '';

    $this->{$this->_getAdmin_user_model()}->_update('metadata_desc', $metadata_desc);

  }

  public function _update_metadata_key(){
  

    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');

    $metadata_key = (isset($_POST['metadata_key'])) ? $_POST['metadata_key'] : '';

    $this->{$this->_getAdmin_user_model()}->_update('metadata_key', $metadata_key);

  }

  public function _update_default_logo(){
  

    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');


    $folder = 'system/default_logo';

    $lookdir = 'files/'. $folder .'/*';

    //  Clean up the folder
    array_map('unlink', glob($lookdir));


    //insert the file
    $files = $this->_filer($_FILES['default_logo'], $folder);

    $default_logo = (isset($files['name'])) ? $files['fix_folder'] . $files['name'] : '';

    $this->{$this->_getAdmin_user_model()}->_update('default_logo', $default_logo);

  }

  public function _update_default_ico(){
  

    $this->_setAdmin_user_model($this->_getBoot_name() . 'system');
    $this->load->model($this->_getBoot_name() . 'system');


    $folder = 'system/default_ico';


    $lookdir = 'files/'. $folder .'/*';

    //  Clean up the folder
    array_map('unlink', glob($lookdir));


    //insert the file
    $files = $this->_filer($_FILES['default_ico'], $folder);

    $default_ico = (isset($files['name'])) ? $files['fix_folder'] . $files['name'] : '';

    $this->{$this->_getAdmin_user_model()}->_update('default_ico', $default_ico);

  }




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
