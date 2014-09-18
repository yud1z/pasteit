<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_invoice extends druid_content 
{

  var $invoice_id;
  var $invoice_berat;
  var $invoice_harga;
  var $invoice_total_harga;
  var $invoice_code;
  var $date_time;
  var $user_id;


  public function get_invoice_by_order_id($order_id = '')
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
  
  /**
   * Get invoice_berat.
   *
   * @return invoice_berat.
   */
  function _getInvoice_berat()
  {
      return $this->invoice_berat;
  }
  
  /**
   * Set invoice_berat.
   *
   * @param invoice_berat the value to set.
   */
  function _setInvoice_berat($invoice_berat = '')
  {
      $this->invoice_berat = $invoice_berat;
  }
  
  /**
   * Get invoice_harga.
   *
   * @return invoice_harga.
   */
  function _getInvoice_harga()
  {
      return $this->invoice_harga;
  }
  
  /**
   * Set invoice_harga.
   *
   * @param invoice_harga the value to set.
   */
  function _setInvoice_harga($invoice_harga = '')
  {
      $this->invoice_harga = $invoice_harga;
  }
  
  /**
   * Get invoice_total_harga.
   *
   * @return invoice_total_harga.
   */
  function _getInvoice_total_harga()
  {
      return $this->invoice_total_harga;
  }
  
  /**
   * Set invoice_total_harga.
   *
   * @param invoice_total_harga the value to set.
   */
  function _setInvoice_total_harga($invoice_total_harga = '')
  {
      $this->invoice_total_harga = $invoice_total_harga;
  }
  
  /**
   * Get invoice_code.
   *
   * @return invoice_code.
   */
  function _getInvoice_code()
  {
      return $this->invoice_code;
  }
  
  /**
   * Set invoice_code.
   *
   * @param invoice_code the value to set.
   */
  function _setInvoice_code($invoice_code = '')
  {
      $this->invoice_code = $invoice_code;
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
