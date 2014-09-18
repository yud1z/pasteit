<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_cart extends druid_content 
{
  var $cart_id;
  var $cart_quantity;
  var $cart_harga;
  var $date_time;
  var $produk_id;
  var $invoice_id;

  public function get_cart_by_order_id($order_id = '')
  {
    
    $query = $this->db->get_where(
      get_class($this),
      array(
        'invoice_id' => $order_id
      )
    );

    return $query->result();
  }
  
  /**
   * Get cart_id.
   *
   * @return cart_id.
   */
  function _getCart_id()
  {
      return $this->cart_id;
  }
  
  /**
   * Set cart_id.
   *
   * @param cart_id the value to set.
   */
  function _setCart_id($cart_id = '')
  {
      $this->cart_id = $cart_id;
  }
  
  /**
   * Get cart_quantity.
   *
   * @return cart_quantity.
   */
  function _getCart_quantity()
  {
      return $this->cart_quantity;
  }
  
  /**
   * Set cart_quantity.
   *
   * @param cart_quantity the value to set.
   */
  function _setCart_quantity($cart_quantity = '')
  {
      $this->cart_quantity = $cart_quantity;
  }
  
  /**
   * Get cart_harga.
   *
   * @return cart_harga.
   */
  function _getCart_harga()
  {
      return $this->cart_harga;
  }
  
  /**
   * Set cart_harga.
   *
   * @param cart_harga the value to set.
   */
  function _setCart_harga($cart_harga = '')
  {
      $this->cart_harga = $cart_harga;
  }
  
  /**
   * Get date_time.
   *
   * @return date_time.
   */
  function _getDate_time()
  {
      return $this->date_time;
  }
  
  /**
   * Set date_time.
   *
   * @param date_time the value to set.
   */
  function _setDate_time($date_time = '')
  {
      $this->date_time = $date_time;
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
   * Get invoice_id.
   *
   * @return invoice_id.
   */
  function _getInvoice_id()
  {
      return $this->invoice_id;
  }
  
  /**
   * Set invoice_id.
   *
   * @param invoice_id the value to set.
   */
  function _setInvoice_id($invoice_id = '')
  {
      $this->invoice_id = $invoice_id;
  }
}
