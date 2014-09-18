<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_category extends Data 
{
  var $category_id;
  var $category_value;


  public function start()
  {
    $this->_setKey('category_id');
    //$start = $this->_getLimit_start();
    //$start = (isset($start)) ? $start : 10;
    //$this->_setLimit_start($start);

    //$end = $this->_getLimit_end();
    //$end = (isset($end)) ? $end : 0;
    //$this->_setLimit_end(0);

    $sort = $this->_getSort();
    $sort = (isset($sort)) ? $sort : 'desc';
    $this->_setSort($sort);

  }

  /**
   *  delete the user from database
   */
  public function delete_category($id = '')
  {
    
    $this->db->delete(
      get_class($this), 
      array(
        'category_id' => $id
      )
    );

  }

  public function get_category_value_byid()
  {
    $id = $this->_getCategory_id();

    $query = $this->db->get_where(
      get_class($this),
      array(
        'category_id' => $id
      )
    );

    return $query->result();

  }


  public function get_category_id_byval()
  {
    $val = $this->_getCategory_value();

    $query = $this->db->get_where(
      get_class($this),
      array(
        'category_value' => $val
      )
    );

    return $query->result();

  }



  /**
   *  Update table user
   */
  public function update_category()
  {
    $id = $this->_getCategory_id();
    $val = $this->_getCategory_value();

    $data = array(
      'category_value'  => $val,
    );

    $this->db->update(get_class($this), $data, array('category_id' => $id));
  }

  /**
   *  check the username row
   *
   */
  public function check_category($arg = '')
  {
    $query = $this->db->get_where(
      get_class($this),
      array(
        'category_value' => $arg
      )
    );

    return $query->num_rows();
  }

  /**
   * Get category_id.
   *
   * @return category_id.
   */
  function _getCategory_id()
  {
      return $this->category_id;
  }
  
  /**
   * Set category_id.
   *
   * @param category_id the value to set.
   */
  function _setCategory_id($category_id = '')
  {
      $this->category_id = $category_id;
  }
  
  /**
   * Get category_value.
   *
   * @return category_value.
   */
  function _getCategory_value()
  {
      return $this->category_value;
  }
  
  /**
   * Set category_value.
   *
   * @param category_value the value to set.
   */
  function _setCategory_value($category_value = '')
  {
      $this->category_value = $category_value;
  }
}
