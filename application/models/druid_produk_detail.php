<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class Model_druid_produk_detail extends CI_Model 
{

  var $detail_id;
  var $produk_id;
  var $detail_type;
  var $detail_weight;
  var $detail_status;
  var $datetime;



  /**
   * Get detail_id.
   *
   * @return detail_id.
   */
  function _getDetail_id()
  {
    return $this->detail_id;
  }

  /**
   * Set detail_id.
   *
   * @param detail_id the value to set.
   */
  function _setDetail_id($detail_id = '')
  {
    $this->detail_id = $detail_id;
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

  /**
   * Get detail_type.
   *
   * @return detail_type.
   */
  function _getDetail_type()
  {
    return $this->detail_type;
  }

  /**
   * Set detail_type.
   *
   * @param detail_type the value to set.
   */
  function _setDetail_type($detail_type = '')
  {
    $this->detail_type = $detail_type;
  }

  /**
   * Get detail_weight.
   *
   * @return detail_weight.
   */
  function _getDetail_weight()
  {
    return $this->detail_weight;
  }

  /**
   * Set detail_weight.
   *
   * @param detail_weight the value to set.
   */
  function _setDetail_weight($detail_weight = '')
  {
    $this->detail_weight = $detail_weight;
  }

  /**
   * Get detail_status.
   *
   * @return detail_status.
   */
  function _getDetail_status()
  {
    return $this->detail_status;
  }

  /**
   * Set detail_status.
   *
   * @param detail_status the value to set.
   */
  function _setDetail_status($detail_status = '')
  {
    $this->detail_status = $detail_status;
  }

}
