<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';
class druid_checkout extends druid_content 
{

  var $checkout_id;
  var $checkout_quantity;
  var $checkout_harga;
  var $produk_id;
  var $order_id;

  public function get_data_by_checkout_id($checkout_id = '')
  {
    $query = $this->db->get_where(
      get_class($this),
      array(
        'checkout_id' => $checkout_id
      )
    );

    return $query->result();
  }

  /**
   * get checkout by order id
   */
  public function get_list_by_order_id($order_id = '')
  {
    $query = $this->db->get_where(
      get_class($this),
      array(
        'order_id' => $order_id
      )
    );

    return $query->result();

  }

  public function get_data_produk($order_id = '')
  {

    //echo '
      //SELECT druid_order.*,
        //druid_checkout.*, 
        //druid_produk.*, 
        //druid_content.*, 
        //druid_promo.* 
      //FROM druid_order
      //INNER JOIN druid_checkout ON druid_order.order_id = druid_checkout.order_id
      //INNER JOIN druid_produk ON druid_produk.produk_id = druid_checkout.produk_id
      //INNER JOIN druid_content ON druid_content.content_id = druid_produk.content_id
      //INNER JOIN druid_promo ON druid_promo.promo_checkout_id = druid_checkout.checkout_id
      //WHERE druid_order.order_id="'. $order_id .'"
      //ORDER BY druid_checkout.checkout_id ASC
      //';

    $query = $this->db->query('
      SELECT druid_order.*,
        druid_checkout.*, 
        druid_produk.*, 
        druid_content.* 
      FROM druid_order
      INNER JOIN druid_checkout ON druid_order.order_id = druid_checkout.order_id
      INNER JOIN druid_produk ON druid_produk.produk_id = druid_checkout.produk_id
      INNER JOIN druid_content ON druid_content.content_id = druid_produk.content_id
      WHERE druid_order.order_id="'. $order_id .'"
      ORDER BY druid_checkout.checkout_id ASC
      ');
      return $query->result();
  }

  public function get_data_produk_checkout($checkout_id = '')
  {
    $query = $this->db->query('
      SELECT druid_order.*,
        druid_checkout.*, 
        druid_produk.*, 
        druid_content.* 
      FROM druid_order
      INNER JOIN druid_checkout ON druid_order.order_id = druid_checkout.order_id
      INNER JOIN druid_produk ON druid_produk.produk_id = druid_checkout.produk_id
      INNER JOIN druid_content ON druid_content.content_id = druid_produk.content_id
      WHERE druid_checkout.checkout_id="'. $checkout_id .'"
      ORDER BY druid_checkout.checkout_id ASC
      ');
      return $query->result();
  }

  /**
   * Get checkout_id.
   *
   * @return checkout_id.
   */
  function _getCheckout_id()
  {
    return $this->checkout_id;
}

/**
 * Set checkout_id.
 *
 * @param checkout_id the value to set.
 */
function _setCheckout_id($checkout_id = '')
{
  $this->checkout_id = $checkout_id;
}

/**
 * Get checkout_quantity.
 *
 * @return checkout_quantity.
 */
function _getCheckout_quantity()
{
  return $this->checkout_quantity;
}

/**
 * Set checkout_quantity.
 *
 * @param checkout_quantity the value to set.
 */
function _setCheckout_quantity($checkout_quantity = '')
{
  $this->checkout_quantity = $checkout_quantity;
}

/**
 * Get checkout_harga.
 *
 * @return checkout_harga.
 */
function _getCheckout_harga()
{
  return $this->checkout_harga;
}

/**
 * Set checkout_harga.
 *
 * @param checkout_harga the value to set.
 */
function _setCheckout_harga($checkout_harga = '')
{
  $this->checkout_harga = $checkout_harga;
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
}
