<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_diskon extends druid_content 
{

var $diskon_id;
var $diskon_value;
var $diskon_type;
var $produk_id;

  public function start()
  {
    $this->_setKey('diskon_id');
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
 * Get diskon_id.
 *
 * @return diskon_id.
 */
function _getDiskon_id()
{
    return $this->diskon_id;
}

/**
 * Set diskon_id.
 *
 * @param diskon_id the value to set.
 */
function _setDiskon_id($diskon_id = '')
{
    $this->diskon_id = $diskon_id;
}

/**
 * Get diskon_value.
 *
 * @return diskon_value.
 */
function _getDiskon_value()
{
    return $this->diskon_value;
}

/**
 * Set diskon_value.
 *
 * @param diskon_value the value to set.
 */
function _setDiskon_value($diskon_value = '')
{
    $this->diskon_value = $diskon_value;
}

/**
 * Get diskon_type.
 *
 * @return diskon_type.
 */
function _getDiskon_type()
{
    return $this->diskon_type;
}

/**
 * Set diskon_type.
 *
 * @param diskon_type the value to set.
 */
function _setDiskon_type($diskon_type = '')
{
    $this->diskon_type = $diskon_type;
}


/**
 * Get produk_id.
 *
 * @return produk_id.
 */
function _getProduk_id()
{
    return $this->produk_id;
}

/**
 * Set produk_id.
 *
 * @param produk_id the value to set.
 */
function _setProduk_id($produk_id = '')
{
    $this->produk_id = $produk_id;
}
}
