<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_konfirmasi extends druid_content 
{
  var $konfirmasi_id;
  var $konfirmasi_tanggal_bayar;
  var $konfirmasi_jumlah_bayar;
  var $konfirmasi_bank_pembayar;
  var $konfirmasi_bank_pengirim;
  var $konfirmasi_catatan;
  var $date_time;
  var $invoice_id;
  
  /**
   * Get konfirmasi_id.
   *
   * @return konfirmasi_id.
   */
  function _getKonfirmasi_id()
  {
      return $this->konfirmasi_id;
  }
  
  /**
   * Set konfirmasi_id.
   *
   * @param konfirmasi_id the value to set.
   */
  function _setKonfirmasi_id($konfirmasi_id = '')
  {
      $this->konfirmasi_id = $konfirmasi_id;
  }
  
  /**
   * Get konfirmasi_tanggal_bayar.
   *
   * @return konfirmasi_tanggal_bayar.
   */
  function _getKonfirmasi_tanggal_bayar()
  {
      return $this->konfirmasi_tanggal_bayar;
  }
  
  /**
   * Set konfirmasi_tanggal_bayar.
   *
   * @param konfirmasi_tanggal_bayar the value to set.
   */
  function _setKonfirmasi_tanggal_bayar($konfirmasi_tanggal_bayar = '')
  {
      $this->konfirmasi_tanggal_bayar = $konfirmasi_tanggal_bayar;
  }
  
  /**
   * Get konfirmasi_jumlah_bayar.
   *
   * @return konfirmasi_jumlah_bayar.
   */
  function _getKonfirmasi_jumlah_bayar()
  {
      return $this->konfirmasi_jumlah_bayar;
  }
  
  /**
   * Set konfirmasi_jumlah_bayar.
   *
   * @param konfirmasi_jumlah_bayar the value to set.
   */
  function _setKonfirmasi_jumlah_bayar($konfirmasi_jumlah_bayar = '')
  {
      $this->konfirmasi_jumlah_bayar = $konfirmasi_jumlah_bayar;
  }
  
  /**
   * Get konfirmasi_bank_pembayar.
   *
   * @return konfirmasi_bank_pembayar.
   */
  function _getKonfirmasi_bank_pembayar()
  {
      return $this->konfirmasi_bank_pembayar;
  }
  
  /**
   * Set konfirmasi_bank_pembayar.
   *
   * @param konfirmasi_bank_pembayar the value to set.
   */
  function _setKonfirmasi_bank_pembayar($konfirmasi_bank_pembayar = '')
  {
      $this->konfirmasi_bank_pembayar = $konfirmasi_bank_pembayar;
  }
  
  /**
   * Get konfirmasi_bank_pengirim.
   *
   * @return konfirmasi_bank_pengirim.
   */
  function _getKonfirmasi_bank_pengirim()
  {
      return $this->konfirmasi_bank_pengirim;
  }
  
  /**
   * Set konfirmasi_bank_pengirim.
   *
   * @param konfirmasi_bank_pengirim the value to set.
   */
  function _setKonfirmasi_bank_pengirim($konfirmasi_bank_pengirim = '')
  {
      $this->konfirmasi_bank_pengirim = $konfirmasi_bank_pengirim;
  }
  
  /**
   * Get konfirmasi_catatan.
   *
   * @return konfirmasi_catatan.
   */
  function _getKonfirmasi_catatan()
  {
      return $this->konfirmasi_catatan;
  }
  
  /**
   * Set konfirmasi_catatan.
   *
   * @param konfirmasi_catatan the value to set.
   */
  function _setKonfirmasi_catatan($konfirmasi_catatan = '')
  {
      $this->konfirmasi_catatan = $konfirmasi_catatan;
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
