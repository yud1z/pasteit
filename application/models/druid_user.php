<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_user extends Data 
{

  var $user_id;
  var $user_name;
  var $user_pwd;
  var $user_level;
  var $user_active;


  /**
   *  get username and name for editing
   */
  public function get_username_name()
  {
    $user_id = $this->_getUser_id();
    $this->db->select('user_id, user_name, user_active');
    $query = $this->db->get_where(
      get_class($this),
      array(
        'user_id' => $user_id
      )
    );

    return $query->result();

  }

  /**
   *  Update table user
   */
  public function update_user()
  {
    $user_id      = $this->_getUser_id();
    $username     = $this->_getUser_name();
    $user_pwd     = $this->_getUser_pwd();
    $user_active  = $this->_getUser_active();

    $data = array(
      'user_name'     => $username,
      'user_pwd'      => $user_pwd,
      'user_active'   => $user_active,
    );

    $this->db->update(get_class($this), $data, array('user_id' => $user_id));
  }

  /**
   *  insert the username, password and name
   *  
   */
  public function insert_user()
  {
    $username     = $this->_getUser_name();
    $password     = $this->_getUser_pwd();
    $level        = $this->_getUser_level();

    $data = array(
      'user_name'    => $username,
      'user_pwd'         => $password,
      'user_level'  => $level,
    );

    //here insert the user
    $this->db->insert(get_class($this), $data);

  }

  /**
   *  get all data for session
   */
  public function get_user_session()
  {
    $username = $this->_getUser_name();
    $query = $this->db->get_where(
      get_class($this),
      array(
        'user_name' => $username
      )
    );
    return $query->result();

    
  }

  /**
   *  check the email row
   *
   */
  public function check_not_user($username = '')
  {
    $query = $this->db->query('
      SELECT user_name
      FROM druid_user
      WHERE user_name = "'. $username .'" 
      ');

    //  whats is going on here
    //  Check the email which is not the my email but show the other email
    //$query = $this->db->get_where(
      //get_class($this),
      //array(
        //'data_email' => $email
      //)
    //);

    return $query->num_rows();
  }

  /**
   *  get the password
   */
  public function get_password()
  {
    $username = $this->_getUser_name();
    $this->db->select('user_pwd');
    $query = $this->db->get_where(
      get_class($this),
      array(
        'user_name' => $username
      )
    );

    return $query->result();
  }

  public function start()
  {
    $key = $this->_getKey();
    $key = (isset($key)) ? $key : 'user_id';
    $this->_setKey($key);

    //$start = $this->_getLimit_start();
    //$start = (isset($start)) ? $start : 10;
    //$this->_setLimit_start($start);

    //$end = $this->_getLimit_end();
    //$end = (isset($end)) ? $end : 0;
    //$this->_setLimit_end(0);
    //$this->_setSort('desc');

  }

  /**
   *  delete the user from database
   */
  public function delete_user()
  {
    
    $this->db->delete(
      get_class($this), 
      array(
        'user_id' => $this->_getUser_id()
      )
    );

  }

  /**
   *  check the username row
   *
   */
  public function check_username()
  {
    $user_name = $this->_getUser_name();
    $query = $this->db->get_where(
      get_class($this),
      array(
        'user_name' => $user_name
      )
    );

    return $query->num_rows();
  }

  /**
   *  check the username row
   *
   */
  public function get_username()
  {
    $user_name = $this->_getUser_name();
    $query = $this->db->get_where(
      get_class($this),
      array(
        'user_name' => $user_name
      )
    );

    return $query->result();
  }

  /**
   * Get user_id.
   *
   * @return user_id.
   */
  function _getUser_id()
  {
      return $this->user_id;
  }
  
  /**
   * Set user_id.
   *
   * @param user_id the value to set.
   */
  function _setUser_id($user_id = '')
  {
      $this->user_id = $user_id;
  }
  
  /**
   * Get user_name.
   *
   * @return user_name.
   */
  function _getUser_name()
  {
      return $this->user_name;
  }
  
  /**
   * Set user_name.
   *
   * @param user_name the value to set.
   */
  function _setUser_name($user_name = '')
  {
      $this->user_name = $user_name;
  }
  
  /**
   * Get user_pwd.
   *
   * @return user_pwd.
   */
  function _getUser_pwd()
  {
      return $this->user_pwd;
  }
  
  /**
   * Set user_pwd.
   *
   * @param user_pwd the value to set.
   */
  function _setUser_pwd($user_pwd = '')
  {
      $this->user_pwd = $user_pwd;
  }
  
  /**
   * Get user_level.
   *
   * @return user_level.
   */
  function _getUser_level()
  {
      return $this->user_level;
  }
  
  /**
   * Set user_level.
   *
   * @param user_level the value to set.
   */
  function _setUser_level($user_level = '')
  {
      $this->user_level = $user_level;
  }
  
  /**
   * @function _getUser_active().
   * @abstract Get user_active.
   *
   * @return user_active.
   */
  function _getUser_active()
  {
      return $this->user_active;
  }
  
  /**
   * @function _setUser_active().
   * @abstract Set user_active.
   *
   * @param user_active the value to set.
   */
  function _setUser_active($user_active = '')
  {
      $this->user_active = $user_active;
  }
}
