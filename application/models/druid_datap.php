<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_datap extends druid_content 
{

  var $datap_id;
  var $datap_data;


  public function start()
  {
    $this->_setKey('datap_id');
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
   * @function _getDatap_id().
   * @abstract Get datap_id.
   *
   * @return datap_id.
   */
  function _getDatap_id()
  {
      return $this->datap_id;
  }
  
  /**
   * @function _setDatap_id().
   * @abstract Set datap_id.
   *
   * @param datap_id the value to set.
   */
  function _setDatap_id($datap_id = '')
  {
      $this->datap_id = $datap_id;
  }
  
  /**
   * @function _getDatap_data().
   * @abstract Get datap_data.
   *
   * @return datap_data.
   */
  function _getDatap_data()
  {
      return $this->datap_data;
  }
  
  /**
   * @function _setDatap_data().
   * @abstract Set datap_data.
   *
   * @param datap_data the value to set.
   */
  function _setDatap_data($datap_data = '')
  {
      $this->datap_data = $datap_data;
  }
}
