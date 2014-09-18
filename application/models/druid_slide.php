<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_slide extends druid_content 
{

  var $slide_id;
  var $slide_rank;
  var $content_id;

  public function start()
  {
    $this->_setKey('slide_id');
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
   *  Update table user
   */
  public function update_diskon()
  {
    $id = $this->_getDiskon_id();
    $type = $this->_getDiskon_type();
    $val = $this->_getDiskon_value();

    $data = array(
      'diskon_value'  => $val,
    );

    $this->db->update(get_class($this), $data, array('diskon_id' => $id));
  }

  public function get_join_data()
  {

    //$this->db->query('');
    

    $query = $this->db->query('
      SELECT druid_slide.*, druid_content.*, druid_file.*, druid_category.*
      FROM druid_slide
      INNER JOIN druid_content ON druid_slide.content_id = druid_content.content_id
      INNER JOIN druid_file ON druid_slide.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      GROUP BY druid_content.content_id
      ORDER BY druid_slide.slide_rank ASC
      ');


    //$key = $this->_getKey();
    //$start = $this->_getLimit_start();
    //$end = $this->_getLimit_end();
    //$sort = $this->_getSort();

    //$where = $this->_getWhere();

    //if ($where == true) {

      //$where_table  = $this->_getWhere_table();
      //$where_val    = $this->_getWhere_val();

      //$this->db->order_by($key, $sort); 
      ////$this->db->select('*');
      ////$this->db->join('druid_file', 'druid_file.content_id = druid_content.content_id');
      //$query = $this->db->get_where(get_class($this),array($where_table => $where_val), $start, $end);
      return $query->result();

    //}
    //else {

      //$this->db->order_by($key, $sort); 
      //$query = $this->db->get(get_class($this), $start, $end);
      //return $query->result();


    //}
  }


  /**
   *  delete the user from database
   */
  public function delete_diskon($id = '')
  {
    
    $this->db->delete(
      get_class($this), 
      array(
        'diskon_id' => $id
      )
    );

  }

  /**
   *  delete the user from database
   */
  public function delete_diskon_by_produk($id = '')
  {
    
    $this->db->delete(
      get_class($this), 
      array(
        'produk_id' => $id
      )
    );

  }

  public function get_content_value_byprodukid()
  {
    $id = $this->_getProduk_id();

    $this->db->order_by('diskon_type');

    $query = $this->db->get_where(
      get_class($this),
      array(
        'produk_id' => $id
      )
    );

    return $query->result();

  }

  
  /**
   * Get slide_id.
   *
   * @return slide_id.
   */
  function _getSlide_id()
  {
      return $this->slide_id;
  }
  
  /**
   * Set slide_id.
   *
   * @param slide_id the value to set.
   */
  function _setSlide_id($slide_id = '')
  {
      $this->slide_id = $slide_id;
  }
  
  /**
   * Get slide_rank.
   *
   * @return slide_rank.
   */
  function _getSlide_rank()
  {
      return $this->slide_rank;
  }
  
  /**
   * Set slide_rank.
   *
   * @param slide_rank the value to set.
   */
  function _setSlide_rank($slide_rank = '')
  {
      $this->slide_rank = $slide_rank;
  }
  
  /**
   * Get content_id.
   *
   * @return content_id.
   */
  function _getContent_id()
  {
      return $this->content_id;
  }
  
  /**
   * Set content_id.
   *
   * @param content_id the value to set.
   */
  function _setContent_id($content_id = '')
  {
      $this->content_id = $content_id;
  }
}
