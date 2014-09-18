<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_diskvoc extends druid_content 
{
  var $diskvoc_id;
  var $diskvoc_voucher;
  var $diskvoc_diskon;
  var $invoice_id;
  var $date_time;

  public function get_diskvoc_by_order_id($order_id = '')
  {
    $this->db->group_by('diskvoc_diskon'); 
    
    $query = $this->db->get_where(
      get_class($this),
      array(
        'invoice_id' => $order_id
      )
    );

    return $query->result();
  }
  
  /**
   * Get diskvoc_id.
   *
   * @return diskvoc_id.
   */
  function _getDiskvoc_id()
  {
      return $this->diskvoc_id;
  }
  
  /**
   * Set diskvoc_id.
   *
   * @param diskvoc_id the value to set.
   */
  function _setDiskvoc_id($diskvoc_id = '')
  {
      $this->diskvoc_id = $diskvoc_id;
  }
  
  /**
   * Get diskvoc_voucher.
   *
   * @return diskvoc_voucher.
   */
  function _getDiskvoc_voucher()
  {
      return $this->diskvoc_voucher;
  }
  
  /**
   * Set diskvoc_voucher.
   *
   * @param diskvoc_voucher the value to set.
   */
  function _setDiskvoc_voucher($diskvoc_voucher = '')
  {
      $this->diskvoc_voucher = $diskvoc_voucher;
  }
  
  /**
   * Get diskvoc_diskon.
   *
   * @return diskvoc_diskon.
   */
  function _getDiskvoc_diskon()
  {
      return $this->diskvoc_diskon;
  }
  
  /**
   * Set diskvoc_diskon.
   *
   * @param diskvoc_diskon the value to set.
   */
  function _setDiskvoc_diskon($diskvoc_diskon = '')
  {
      $this->diskvoc_diskon = $diskvoc_diskon;
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
}
