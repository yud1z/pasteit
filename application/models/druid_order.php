<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_order extends druid_content 
{

  var $order_id;
  var $order_berat;
  var $order_harga;
  var $user_id;

  /**
   *  get order by user_id
   */
  public function get_order_by_user_id($id = '')
  {
    
    $query = $this->db->get_where(
      get_class($this),
      array(
        'user_id' => $id
      )
    );

    return $query->result();
  }

  /**
   * Get order_id.
   *
   * @return order_id.
   */
  function _getOrder_id()
  {
    return $this->order_id;
  }

  /**
   * Set order_id.
   *
   * @param order_id the value to set.
   */
  function _setOrder_id($order_id = '')
  {
    $this->order_id = $order_id;
  }

  /**
   * Get order_berat.
   *
   * @return order_berat.
   */
  function _getOrder_berat()
  {
    return $this->order_berat;
  }

  /**
   * Set order_berat.
   *
   * @param order_berat the value to set.
   */
  function _setOrder_berat($order_berat = '')
  {
    $this->order_berat = $order_berat;
  }

  /**
   * Get order_harga.
   *
   * @return order_harga.
   */
  function _getOrder_harga()
  {
    return $this->order_harga;
  }

  /**
   * Set order_harga.
   *
   * @param order_harga the value to set.
   */
  function _setOrder_harga($order_harga = '')
  {
    $this->order_harga = $order_harga;
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
}
