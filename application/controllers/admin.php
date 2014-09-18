<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('login.php');

/**
 * @class Admin 
 * @abstract This class is root for all admin package 
 * 
 * @uses Login
 * @package 
 * @version 0.1
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Admin extends Login {

  /**
   * admin_page_edit 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_edit = false;
  /**
   * admin_page_edit 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_delete = false;
  /**
   * admin_page_insert 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_insert = false;
  /**
   * admin_page_template 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template;
  /**
   * admin_page_template_head 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_head;
  /**
   * admin_page_template_insert 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_insert;
  /**
   * admin_page_template_edit 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_edit;
  /**
   * admin_page_template_delete 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_delete;
  /**
   * admin_page_template_user_id 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_user_id;
  /**
   * admin_page_template_url 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_url;
  /**
   * admin_page_template_call_back 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_template_call_back;
  /**
   * admin_page_data_push 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_data_push;
  /**
   * admin_page_key_push 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_key_push;
  /**
   * admin_page_result_push 
   * 
   * @var mixed
   * @access public
   */
  var $admin_page_result_push;

  /**
   * @function _before 
   * @abstract Route Before diplay the page 
   * 
   * @access public
   * @return void
   */
  public function _before()
  {
    if ($this->session->userdata('user_level') != 'admin') {
      redirect('/', 'location', 301);
    }

    $this->load->view('template_admin/header');
    $this->_mod_load();
  }

  /**
   * @function _mod_load 
   * @abstract Empty the mod_load 
   * 
   * @access public
   * @return void
   */
  public function _mod_load(){}

  /**
   * @function _start 
   * @abstract empty the _start 
   * 
   * @access public
   * @return void
   */
  public function _start(){}
  
  /**
   * @function index 
   * @abstract Load the UI of face 
   * 
   * @access public
   * @return void
   */
	public function index()
	{
    $data = array(
      'default_logo' => $this->_system('default_logo'),
    );

    $this->load->view('admin', $data);
  }

  /**
   * @function _push_data 
   * @abstract push the data into array 
   * 
   * @param array $old_data 
   * @param string $key 
   * @param string $data 
   * @access public
   * @return void
   */
  public function _push_data($old_data = array(), $key = '', $data = ''){
    array_push($old_data, $old_data[$key] = $data);
    $this->_setAdmin_page_result_push($old_data);
  }

  /**
   * @function insert 
   * @abstract make insert page for each admin page 
   * 
   * @access public
   * @return void
   */
  public function insert()
  {
    $this->_start();
    $this->_insert_code();

    $insert = $this->_getAdmin_page_insert();
    $template = $this->_getAdmin_page_template();

    if ($insert == true) {

      $this->_insert_render();

      $data = array(
        'head' => $this->_getAdmin_page_template_head(),
        'content' => $this->_getAdmin_page_template_insert(),
        'alert' => $this->_getAdmin_user_alert(),
      );

      //show the input form
      $this->load->view($template, $data);
    }

  }

  /**
   * @function _insert_render 
   * @abstract rendering the page of insert 
   * 
   * @access public
   * @return void
   */
  public function _insert_render(){
  }

  /**
   * @function _insert_code 
   * @abstract Make the insert code work here 
   * 
   * @access public
   * @return void
   */
  public function _insert_code(){
  }

  /**
   * @function edit 
   * @abstract Edit the page here 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function edit($arg = '')
  {
    $this->_start();
    $this->_edit_code();
    $edit = $this->_getAdmin_page_edit();
    $template = $this->_getAdmin_page_template();
    if ($edit == true) {

      //this the code to show the edit
      if ($arg == '') {
        $arg = 1;
      }
      $this->_setAdmin_page_template_user_id($arg);
      $this->_edit_render();
      $data = array(
        'alert' => $this->_getAdmin_user_alert(),
        'head' => $this->_getAdmin_page_template_head(),
        'content' => $this->_getAdmin_page_template_edit(),
      );
      //show the form with valued
      $this->load->view($template, $data);

    }
  
  }

  /**
   * @function _edit_render 
   * @abstract Rendering the page here 
   * 
   * @access public
   * @return void
   */
  public function _edit_render(){
  }

  /**
   * @function _edit_code 
   * @abstract Insert the code here to edit 
   * 
   * @access public
   * @return void
   */
  public function _edit_code(){
  }

  /**
   * @function delete 
   * @abstract control page to delete 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function delete($arg = '')
  {
    $this->_delete_code();
    $delete = $this->_getAdmin_page_delete();
    $template = $this->_getAdmin_page_template_delete();

    if ($delete == true) {

      //this the code to show the delete
      if ($arg == '') {
        $arg = 1;
      }
      $this->_setAdmin_page_template_user_id($arg);
      $this->_delete_render();

      $callback = (isset($_GET['callback'])) ? $_GET['callback'] : '';

      //show the dialog box
      $data = array(
        'id' => $this->_getAdmin_page_template_user_id(),
        'url' => $this->_getAdmin_page_template_url(),
        'callback' => $callback,
      );
      //show the form with valued
      $this->load->view($template, $data);

    }
    
  }

  /**
   * @function _delete_render 
   * @abstract render deleting of the page 
   * 
   * @access public
   * @return void
   */
  public function _delete_render(){
  }

  /**
   * @function _delete_code 
   * @abstract delete the code 
   * 
   * @access public
   * @return void
   */
  public function _delete_code(){
  }

  /**
   * @function _after 
   * @abstract Insert the footer page, write here if different 
   * 
   * @access public
   * @return void
   */
  public function _after()
  {
    $this->load->view('template_admin/footer');
  
  }
  
  /**
   * Get admin_page_edit.
   *
   * @return admin_page_edit.
   */
  function _getAdmin_page_edit()
  {
      return $this->admin_page_edit;
  }
  
  /**
   * Set admin_page_edit.
   *
   * @param admin_page_edit the value to set.
   */
  function _setAdmin_page_edit($admin_page_edit = '')
  {
      $this->admin_page_edit = $admin_page_edit;
  }
  
  /**
   * Get admin_page_delete.
   *
   * @return admin_page_delete.
   */
  function _getAdmin_page_delete()
  {
      return $this->admin_page_delete;
  }
  
  /** 
   * Set admin_page_delete.
   *
   * @param admin_page_delete the value to set.
   */
  function _setAdmin_page_delete($admin_page_delete = '')
  {
      $this->admin_page_delete = $admin_page_delete;
  }
  
  /**
   * Set admin_page_insert.
   *
   * @param admin_page_insert the value to set.
   */
  function _setAdmin_page_insert($admin_page_insert = '')
  {
      $this->admin_page_insert = $admin_page_insert;
  }
  
  /**
   * Get admin_page_insert.
   *
   * @return admin_page_insert.
   */
  function _getAdmin_page_insert()
  {
      return $this->admin_page_insert;
  }

  /**
   * Get admin_page_template.
   *
   * @return admin_page_template.
   */
  function _getAdmin_page_template()
  {
      return $this->admin_page_template;
  }
  
  /**
   * Set admin_page_template.
   *
   * @param admin_page_template the value to set.
   */
  function _setAdmin_page_template($admin_page_template = '')
  {
      $this->admin_page_template = $admin_page_template;
  }
  
  /**
   * Get admin_page_template_insert.
   *
   * @return admin_page_template_insert.
   */
  function _getAdmin_page_template_insert()
  {
      return $this->admin_page_template_insert;
  }
  
  /**
   * Set admin_page_template_insert.
   *
   * @param admin_page_template_insert the value to set.
   */
  function _setAdmin_page_template_insert($admin_page_template_insert = '')
  {
      $this->admin_page_template_insert = $admin_page_template_insert;
  }
  
  /**
   * Get admin_page_template_edit.
   *
   * @return admin_page_template_edit.
   */
  function _getAdmin_page_template_edit()
  {
      return $this->admin_page_template_edit;
  }
  
  /**
   * Set admin_page_template_edit.
   *
   * @param admin_page_template_edit the value to set.
   */
  function _setAdmin_page_template_edit($admin_page_template_edit = '')
  {
      $this->admin_page_template_edit = $admin_page_template_edit;
  }
  
  /**
   * Get admin_page_template_delete.
   *
   * @return admin_page_template_delete.
   */
  function _getAdmin_page_template_delete()
  {
      return $this->admin_page_template_delete;
  }
  
  /**
   * Set admin_page_template_delete.
   *
   * @param admin_page_template_delete the value to set.
   */
  function _setAdmin_page_template_delete($admin_page_template_delete = '')
  {
      $this->admin_page_template_delete = $admin_page_template_delete;
  }
  
  /**
   * Get admin_page_template_head.
   *
   * @return admin_page_template_head.
   */
  function _getAdmin_page_template_head()
  {
      return $this->admin_page_template_head;
  }
  
  /*   * Set admin_page_template_head.
   *
   * @param admin_page_template_head the value to set.
   */
  function _setAdmin_page_template_head($admin_page_template_head = '')
  {
      $this->admin_page_template_head = $admin_page_template_head;
  }
  
  /**
   * Set admin_page_template_user_id.
   *
   * @param admin_page_template_user_id the value to set.
   */
  function _setAdmin_page_template_user_id($admin_page_template_user_id = '')
  {
      $this->admin_page_template_user_id = $admin_page_template_user_id;
  }
  
  /**
   * Get admin_page_template_user_id.
   *
   * @return admin_page_template_user_id.
   */
  function _getAdmin_page_template_user_id()
  {
      return $this->admin_page_template_user_id;
  }

  /**
   * Get admin_page_template_url.
   *
   * @return admin_page_template_url.
   */
  function _getAdmin_page_template_url()
  {
      return $this->admin_page_template_url;
  }
  
  /**
   * Set admin_page_template_url.
   *
   * @param admin_page_template_url the value to set.
   */
  function _setAdmin_page_template_url($admin_page_template_url = '')
  {
      $this->admin_page_template_url = $admin_page_template_url;
  }
  
  /**
   * Get admin_page_template_call_back.
   *
   * @return admin_page_template_call_back.
   */
  function _getAdmin_page_template_call_back()
  {
      return $this->admin_page_template_call_back;
  }
  
  /**
   * Set admin_page_template_call_back.
   *
   * @param admin_page_template_call_back the value to set.
   */
  function _setAdmin_page_template_call_back($admin_page_template_call_back = '')
  {
      $this->admin_page_template_call_back = $admin_page_template_call_back;
  }
  
  /**
   * Get admin_page_data_push.
   *
   * @return admin_page_data_push.
   */
  function _getAdmin_page_data_push()
  {
      return $this->admin_page_data_push;
  }
  
  /**
   * Set admin_page_data_push.
   *
   * @param admin_page_data_push the value to set.
   */
  function _setAdmin_page_data_push($admin_page_data_push = '')
  {
      $this->admin_page_data_push = $admin_page_data_push;
  }
  
  /**
   * Get admin_page_key_push.
   *
   * @return admin_page_key_push.
   */
  function _getAdmin_page_key_push()
  {
      return $this->admin_page_key_push;
  }
  
  /**
   * Set admin_page_key_push.
   *
   * @param admin_page_key_push the value to set.
   */
  function _setAdmin_page_key_push($admin_page_key_push = '')
  {
      $this->admin_page_key_push = $admin_page_key_push;
  }
  
  /**
   * Get admin_page_result_push.
   *
   * @return admin_page_result_push.
   */
  function _getAdmin_page_result_push()
  {
      return $this->admin_page_result_push;
  }
  
  /**
   * Set admin_page_result_push.
   *
   * @param admin_page_result_push the value to set.
   */
  function _setAdmin_page_result_push($admin_page_result_push = '')
  {
      $this->admin_page_result_push = $admin_page_result_push;
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
