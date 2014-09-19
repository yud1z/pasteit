<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin.php');

/**
 * @class Admin_user 
 * @abstract description 
 * 
 * @uses Admin
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Admin_user extends Admin {

  /**
   * admin_user_username 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_username;
  /**
   * admin_user_password 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_password;
  /**
   * admin_user_result 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_result;
  /**
   * admin_user_name 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_name;
  /**
   * admin_user_level 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_level;

  /**
   * admin_user_alert 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_alert;
  /**
   * admin_user_all_data 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_all_data;

  /**
   * admin_user_page 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_page;
  /**
   * admin_user_model 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_model;
  /**
   * admin_user_key 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_key;

  /**
   * admin_user_count 
   * 
   * @var mixed
   * @access public
   */
  var $admin_user_count;

  /**
   * @function _start 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _start()
  {

    //set the key
    $this->_setAdmin_user_key('user_id');

    //set the page
    $this->_setAdmin_user_page('admin_user');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'user');
  
  
  }

  /**
   * @function _mod_load 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _mod_load()
  {
    $this->_start();

    $model = $this->_getAdmin_user_model();
    $page = $this->_getAdmin_user_page();

    //load the user table
    $this->load->model($model);

    //activate the edit and delete page
    $this->_setAdmin_page_edit(true);
    $this->_setAdmin_page_delete(true);
    $this->_setAdmin_page_insert(true);
    $this->_setAdmin_page_template($page . '/template');
    $this->_setAdmin_page_template_delete($page . '/delete_template');

    //activate the paging
    $this->_setBoot_part(true);

    //activate sort table
    $this->_setBoot_sort(true);
    $this->_sort();


  }

  /**
   *  before the index start
   */
  public function _index_start()
  {
  
    $model = $this->_getAdmin_user_model();
    $key  = $this->_getAdmin_user_key();

    $page = $this->_getAdmin_user_page();

    //set the uri of paging
    $this->_setBoot_part_uri($page);

    //this get data count perpage
    $this->_setBoot_part_perpage(10);

    //count form database
    eval('$this->_setAdmin_user_count($this->'. $model .'->get_row());');


    //modify the data
    $this->_modify();



    $count = $this->_getAdmin_user_count();

    ////get count all user
    $this->_setBoot_part_count_data($count);

    ////the argument for paging
    $argue = $this->_getBoot_part_arg();
    $this->_part($argue);


    ////get the admin list from database
    ////limited by 10, and make the method for all paging
    $this->_spread_userdata();

    $data_table = $this->_getAdmin_user_all_data();

    //add action into table
    $this->_setBoot_gen_data($data_table);
    $this->_setBoot_gen_edit(true);
    $this->_setBoot_gen_delete(true);
    $this->_setBoot_gen_view(true);
    $this->_setBoot_gen_delimiter(' | ');
    $this->_setBoot_gen_head($key);

    $this->_gen_action();

    $data_table = $this->_getBoot_gen_result();

    //opn($data_table);

    //unset($data_table);

    //render it into table
    $this->_setBoot_table_data($data_table);
    $this->_setBoot_table_font(13);
    $this->table();


    $data = array(
      'row' => $this->_getBoot_table_data(),
      'paging' => $this->_getBoot_part_render(),
    );
    $this->_push_data($data, $this->_getAdmin_page_key_push(), $this->_getAdmin_page_data_push());
    //print_r($data);

    //show the content
    $this->load->view('/'. $page .'/content', $this->_getAdmin_page_result_push());

  
  }


  /**
   *  the content
   */
  public function index()
  {

    $part = (isset($_GET['part'])) ? $_GET['part'] : 1;
    $this->part($part);
    $this->_index_start();

  }

  /**
   * @function sort 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function sort()
  {

    $this->_index_start();
  }
  

  /**
   * @function part 
   * @abstract description 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function part($arg = '')
  {

    if(isset($arg))
    {
      $noPage = $arg;
    }
    else $noPage = 1;


    $dataPerPage = 10;

    $offset = ($noPage - 1) * $dataPerPage;

    $this->_setBoot_part_onset($offset);
    $this->_setBoot_part_offset($dataPerPage);
    $this->_setBoot_part_arg($arg);

  }

  /**
   * @function _insert_render 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add User');

    $content = '';
    $content .= form_open('/'. $page .'/insert');

    $content .= form_label('username', 'username');
    $content .= form_input('username');

    $content .= form_label('level', 'level');
    $content .= form_input('level');


    $content .= form_label('password', 'password');
    $content .= form_password('password');

    $content .= form_label('repassword', 'repassword');
    $content .= form_password('repassword');

    $content .= '<p>';
    $content .= form_submit('add', 'Add Admin', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }

  /**
   * @function _insert_code 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _insert_code()
  {
    if (!empty($_POST)) {
      if (isset($_POST['username']) && 
        isset($_POST['password']) && 
        isset($_POST['repassword'])
      ) {

        if ($_POST['password'] == $_POST['repassword']) {

          //set the username
          $this->_setAdmin_user_name($_POST['username']);
          //set the password
          $this->_setAdmin_user_password($_POST['password']);
          $this->_setAdmin_user_level($_POST['level']);

          //insert into database
          $this->_admin_user_insert();
          redirect('/admin_user', 'location', 301);


        }
        else {

          //here to show the alert
          $this->_setBoot_alert_type('alert alert-error');
          $this->_setBoot_alert_text('Password not same');
          $this->_setBoot_alert_big('Error!');
          $this->_setAdmin_user_alert($this->alert());


        }

      }
      else {

        //here to show the alert
        $this->_setBoot_alert_type('alert alert-error');
        $this->_setBoot_alert_text('you must fill all form');
        $this->_setBoot_alert_big('Error!');
        $this->_setAdmin_user_alert($this->alert());


      }


    }


  }

  /**
   * @function _edit_render 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _edit_render()
  {
    $page = $this->_getAdmin_user_page();
    $this->_setAdmin_page_template_head('Edit Admin');

    //get all data here
    $user_id = $this->_getAdmin_page_template_user_id();
    $this->{$this->_getAdmin_user_model()}->_setUser_id($user_id);
    $data = $this->{$this->_getAdmin_user_model()}->get_username_name();
    $user_id = $data[0]->user_id;
    $username = $data[0]->user_name;
    $user_active = $data[0]->user_active;

    if ($user_active == 1) {
      $user_active = 'active';
    }
    else {
      $user_active = 'inactive';
    }


    $content = '';
    $content .= form_open('/'. $page .'/edit');

    $content .= form_hidden('user_id', $user_id);

    $content .= form_label('username', 'username');
    $content .= form_input('username', $username);

    $content .= form_label('new password', 'password');
    $content .= form_password('password');

    $content .= form_label('repassword', 'repassword');
    $content .= form_password('repassword');

    $content .= form_label('user active', 'user_active');
    $options = array(
      'active'      => 'active',
      'inactive'    => 'inactive',
    );
    $content .= form_dropdown('user_active', $options, $user_active);

    $content .= '<p>';
    $content .= form_submit('add', 'Edit Admin', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
  }

  /**
   * @function _edit_code 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {
      if (isset($_POST['username']) && 
        isset($_POST['user_id']) && 
        isset($_POST['password']) && 
        isset($_POST['repassword'])
      ) {

        if ($_POST['password'] == $_POST['repassword']) {

          if ($_POST['user_active'] == 'active') {
            $user_active = 1;
          }
          else {
            $user_active = 0;
          }


          $this->{$this->_getAdmin_user_model()}->_setUser_id($_POST['user_id']);
          $this->{$this->_getAdmin_user_model()}->_setUser_name($_POST['username']);
          $this->{$this->_getAdmin_user_model()}->_setUser_active($user_active);

          //encrypt the password
          $this->_setLogin_password($_POST['password']);
          $this->_login_pwd_encrypt();
          $password = $this->_getLogin_password();
          $this->{$this->_getAdmin_user_model()}->_setUser_pwd($password);

          //update the data
          $this->{$this->_getAdmin_user_model()}->update_user();

          redirect('/'. $page .'', 'location', 301);


        }
        else {

          //here to show the alert
          $this->_setBoot_alert_type('alert alert-error');
          $this->_setBoot_alert_text('Password not same');
          $this->_setBoot_alert_big('Error!');
          $this->_setAdmin_user_alert($this->alert());


        }

      }
      else {

        //here to show the alert
        $this->_setBoot_alert_type('alert alert-error');
        $this->_setBoot_alert_text('you must fill all form');
        $this->_setBoot_alert_big('Error!');
        $this->_setAdmin_user_alert($this->alert());


      }
    }


  }


  /**
   * @function _delete_render 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _delete_render()
  {
    

    $page = $this->_getAdmin_user_page();

    //input the content here
    $this->_setAdmin_page_template_call_back('/'. $page .'');
    $this->_setAdmin_page_template_url('/'. $page .'/delete');
    
  }

  /**
   * @function _delete_code 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _delete_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {

      if (isset($_POST['id'])) {

        $this->{$this->_getAdmin_user_model()}->_setUser_id($_POST['id']);
        //delete the data in database
        $this->{$this->_getAdmin_user_model()}->delete_user();
        redirect('/'. $page .'');

      }

    }

  }


  /**
   *  spread the userdata into the table
   */
  public function _spread_userdata()
  {

    $model = $this->_getAdmin_user_model();
    $onset = $this->_getBoot_part_onset();
    $offset = $this->_getBoot_part_offset();


    if ($onset == '' || $offset == '') {
      $onset = 0;
      $offset = 10;
    }


    $field = $this->_getBoot_sort_field();
    $sort = $this->_getBoot_sort_type();


    $this->{$this->_getAdmin_user_model()}->_setKey($field);
    $this->{$this->_getAdmin_user_model()}->_setLimit_start($offset);
    $this->{$this->_getAdmin_user_model()}->_setLimit_end($onset);
    $this->{$this->_getAdmin_user_model()}->_setSort($sort);



    eval('$data_all = $this->'. $model .'->get_data($offset,$onset,$field,$sort);');
    $this->_setAdmin_user_all_data($data_all);

  }

  /**
   *  insert the admin into database
   */
  public function _admin_user_insert()
  {
    //include the function of encrypt
    $name     = $this->_getAdmin_user_name();
    $username = $this->_getAdmin_user_username();
    $password = $this->_getAdmin_user_password();
    $level    = $this->_getAdmin_user_level();

    //encrypt the password
    $this->_setLogin_password($password);
    $this->_login_pwd_encrypt();
    $password = $this->_getLogin_password();



    //check into database
    $this->_admin_user_check();

    $result = $this->_getAdmin_user_result();

    //insert into database
    if ($result <= 0) {


      $this->{$this->_getAdmin_user_model()}->_setUser_name($name); 
      $this->{$this->_getAdmin_user_model()}->_setUser_pwd($password); 
      $this->{$this->_getAdmin_user_model()}->_setUser_level($level); 
      $this->{$this->_getAdmin_user_model()}->insert_user(); 


    }
    else {
      //if username exists show the alert

      //here to show the alert
      $this->_setBoot_alert_type('alert alert-error');
      $this->_setBoot_alert_text('Username exists');
      $this->_setBoot_alert_big('Error!');
      $this->_setAdmin_user_alert($this->alert());

    }


  }


  /**
   *  check the username in database
   *  must need username
   *  TRUE if exists
   *  FALSE if not exists
   */
  public function _admin_user_check()
  {
    $username = $this->_getAdmin_user_username();

    $this->{$this->_getAdmin_user_model()}->_setUser_name($username);
    $result = $this->{$this->_getAdmin_user_model()}->check_username();

    //set the result
    $this->_setAdmin_user_result($result);

  }


  /**
   * Get admin_user_username.
   *
   * @return admin_user_username.
   */
  function _getAdmin_user_username()
  {
    return $this->admin_user_username;
  }

  /**
   * Set admin_user_username.
   *
   * @param admin_user_username the value to set.
   */
  function _setAdmin_user_username($admin_user_username = '')
  {
    $this->admin_user_username = $admin_user_username;
  }

  /**
   * Get admin_user_password.
   *
   * @return admin_user_password.
   */
  function _getAdmin_user_password()
  {
    return $this->admin_user_password;
  }

  /**
   * Set admin_user_password.
   *
   * @param admin_user_password the value to set.
   */
  function _setAdmin_user_password($admin_user_password = '')
  {
    $this->admin_user_password = $admin_user_password;
  }

  /**
   * Get admin_user_result.
   *
   * @return admin_user_result.
   */
  function _getAdmin_user_result()
  {
    return $this->admin_user_result;
  }

  /**
   * Set admin_user_result.
   *
   * @param admin_user_result the value to set.
   */
  function _setAdmin_user_result($admin_user_result = '')
  {
    $this->admin_user_result = $admin_user_result;
  }

  /**
   * Set admin_user_name.
   *
   * @param admin_user_name the value to set.
   */
  function _setAdmin_user_name($admin_user_name = '')
  {
    $this->admin_user_name = $admin_user_name;
  }

  /**
   * Get admin_user_name.
   *
   * @return admin_user_name.
   */
  function _getAdmin_user_name()
  {
    return $this->admin_user_name;
  }

  /**
   * Get admin_user_alert.
   *
   * @return admin_user_alert.
   */
  function _getAdmin_user_alert()
  {
    return $this->admin_user_alert;
  }

  /**
   * Set admin_user_alert.
   *
   * @param admin_user_alert the value to set.
   */
  function _setAdmin_user_alert($admin_user_alert = '')
  {
    $this->admin_user_alert = $admin_user_alert;
  }

  /**
   * Get admin_user_all_data.
   *
   * @return admin_user_all_data.
   */
  function _getAdmin_user_all_data()
  {
    return $this->admin_user_all_data;
  }

  /**
   * Set admin_user_all_data.
   *
   * @param admin_user_all_data the value to set.
   */
  function _setAdmin_user_all_data($admin_user_all_data = '')
  {
    $this->admin_user_all_data = $admin_user_all_data;
  }
  
  /**
   * Get admin_user_page.
   *
   * @return admin_user_page.
   */
  function _getAdmin_user_page()
  {
      return $this->admin_user_page;
  }
  
  /**
   * Set admin_user_page.
   *
   * @param admin_user_page the value to set.
   */
  function _setAdmin_user_page($admin_user_page = '')
  {
      $this->admin_user_page = $admin_user_page;
  }
  
  /**
   * Get admin_user_model.
   *
   * @return admin_user_model.
   */
  function _getAdmin_user_model()
  {
      return $this->admin_user_model;
  }
  
  /**
   * Set admin_user_model.
   *
   * @param admin_user_model the value to set.
   */
  function _setAdmin_user_model($admin_user_model = '')
  {
      $this->admin_user_model = $admin_user_model;
  }
  
  /**
   * Get admin_user_key.
   *
   * @return admin_user_key.
   */
  function _getAdmin_user_key()
  {
      return $this->admin_user_key;
  }
  
  /**
   * Set admin_user_key.
   *
   * @param admin_user_key the value to set.
   */
  function _setAdmin_user_key($admin_user_key = '')
  {
      $this->admin_user_key = $admin_user_key;
  }
  
  /**
   * Get admin_user_count.
   *
   * @return admin_user_count.
   */
  function _getAdmin_user_count()
  {
      return $this->admin_user_count;
  }
  
  /**
   * Set admin_user_count.
   *
   * @param admin_user_count the value to set.
   */
  function _setAdmin_user_count($admin_user_count = '')
  {
      $this->admin_user_count = $admin_user_count;
  }
  
  /**
   * Get admin_user_level.
   *
   * @return admin_user_level.
   */
  function _getAdmin_user_level()
  {
      return $this->admin_user_level;
  }
  
  /**
   * Set admin_user_level.
   *
   * @param admin_user_level the value to set.
   */
  function _setAdmin_user_level($admin_user_level = '')
  {
      $this->admin_user_level = $admin_user_level;
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
