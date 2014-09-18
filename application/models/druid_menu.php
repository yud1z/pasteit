<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_menu extends druid_content 
{
  var $menu_id;
  var $menu_rank;
  var $menu_title;
  var $menu_url;
  var $menu_parent;


  public function start()
  {
    $this->_setKey('menu_id');
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
  public function delete_menu($id = '')
  {
    
    $this->db->delete(
      get_class($this), 
      array(
        'menu_id' => $id
      )
    );

  }


  public function get_menu($level_menu = '')
  {
    //$this->db->orderby('menu_id');

    $query = $this->db->get_where(
      get_class($this),
      array(
        'menu_parent' => $level_menu,
      )
    );
    return $query->result();

  }

  public function get_menu_parent()
  {
    //$this->db->orderby('menu_id');

    $query = $this->db->get_where(
      get_class($this),
      array(
        'menu_parent' => 0,
      )
    );
    return $query->result();

  }


  /**
   *  Update table user
   */
  public function update_menu()
  {
    $id = $this->_getMenu_id();
    $title = $this->_getMenu_title();
    $rank = $this->_getMenu_rank();
    $url = $this->_getMenu_url();
    $parent = $this->_getMenu_parent();

    $data = array(
      'menu_id'     => $id,
      'menu_rank'   => $rank,
      'menu_title'  => $title,
      'menu_url'    => $url,
      'menu_parent' => $parent,
    );

    $this->db->update(get_class($this), $data, array('menu_id' => $id));
  }

  
  /**
   * Get menu_id.
   *
   * @return menu_id.
   */
  function _getMenu_id()
  {
      return $this->menu_id;
  }
  
  /**
   * Set menu_id.
   *
   * @param menu_id the value to set.
   */
  function _setMenu_id($menu_id = '')
  {
      $this->menu_id = $menu_id;
  }
  
  /**
   * Get menu_rank.
   *
   * @return menu_rank.
   */
  function _getMenu_rank()
  {
      return $this->menu_rank;
  }
  
  /**
   * Set menu_rank.
   *
   * @param menu_rank the value to set.
   */
  function _setMenu_rank($menu_rank = '')
  {
      $this->menu_rank = $menu_rank;
  }
  
  /**
   * Get menu_title.
   *
   * @return menu_title.
   */
  function _getMenu_title()
  {
      return $this->menu_title;
  }
  
  /**
   * Set menu_title.
   *
   * @param menu_title the value to set.
   */
  function _setMenu_title($menu_title = '')
  {
      $this->menu_title = $menu_title;
  }
  
  /**
   * Get menu_url.
   *
   * @return menu_url.
   */
  function _getMenu_url()
  {
      return $this->menu_url;
  }
  
  /**
   * Set menu_url.
   *
   * @param menu_url the value to set.
   */
  function _setMenu_url($menu_url = '')
  {
      $this->menu_url = $menu_url;
  }
  
  /**
   * Get menu_parent.
   *
   * @return menu_parent.
   */
  function _getMenu_parent()
  {
      return $this->menu_parent;
  }
  
  /**
   * Set menu_parent.
   *
   * @param menu_parent the value to set.
   */
  function _setMenu_parent($menu_parent = '')
  {
      $this->menu_parent = $menu_parent;
  }
}
