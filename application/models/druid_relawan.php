<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_relawan extends druid_content 
{


  var $relawan_id;
  var $relawan_nama;
  var $relawan_alamat;
  var $ongkir_id;
  var $relawan_email;
  var $relawan_telp;
  var $relawan_date_time;



  /**
   *  by pass for get data
   */
  public function get_data_all()
  {

    $key = $this->_getKey();
    $start = $this->_getLimit_start();
    $end = $this->_getLimit_end();
    $sort = $this->_getSort();

    $where = $this->_getWhere();

    if ($where == true) {

      $where_table  = $this->_getWhere_table();
      $where_val    = $this->_getWhere_val();

      $this->db->order_by($key, $sort); 
      $this->db->join('druid_ongkir', 'druid_ongkir.ongkir_id = druid_relawan.ongkir_id');
      $query = $this->db->get_where(get_class($this),array($where_table => $where_val), $start, $end);
      return $query->result();

    }
    else {

      $this->db->order_by($key, $sort); 
      $this->db->select('relawan_id');
      $this->db->select('relawan_nama');
      $this->db->select('relawan_email');
      $this->db->select('relawan_telp');
      $this->db->select('relawan_date_time');
      $this->db->select('relawan_alamat');
      $this->db->select('ongkir_propinsi');
      $this->db->select('ongkir_kabupaten');
      $this->db->select('ongkir_kecamatan');
      $this->db->join('druid_ongkir', 'druid_ongkir.ongkir_id = druid_relawan.ongkir_id');
      $query = $this->db->get(get_class($this), $start, $end);
      return $query->result();

    }


    //echo '<hr>';
    //echo $start;
    //echo '<br>';
    //echo $end;
    //echo '<hr>';


  
  }


  public function start()
  {
    $this->_setKey('relawan_id');
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
   * @function _getRelawan_id().
   * @abstract Get relawan_id.
   *
   * @return relawan_id.
   */
  function _getRelawan_id()
  {
      return $this->relawan_id;
  }
  
  /**
   * @function _setRelawan_id().
   * @abstract Set relawan_id.
   *
   * @param relawan_id the value to set.
   */
  function _setRelawan_id($relawan_id = '')
  {
      $this->relawan_id = $relawan_id;
  }
  
  /**
   * @function _getRelawan_nama().
   * @abstract Get relawan_nama.
   *
   * @return relawan_nama.
   */
  function _getRelawan_nama()
  {
      return $this->relawan_nama;
  }
  
  /**
   * @function _setRelawan_nama().
   * @abstract Set relawan_nama.
   *
   * @param relawan_nama the value to set.
   */
  function _setRelawan_nama($relawan_nama = '')
  {
      $this->relawan_nama = $relawan_nama;
  }
  
  /**
   * @function _getRelawan_alamat().
   * @abstract Get relawan_alamat.
   *
   * @return relawan_alamat.
   */
  function _getRelawan_alamat()
  {
      return $this->relawan_alamat;
  }
  
  /**
   * @function _setRelawan_alamat().
   * @abstract Set relawan_alamat.
   *
   * @param relawan_alamat the value to set.
   */
  function _setRelawan_alamat($relawan_alamat = '')
  {
      $this->relawan_alamat = $relawan_alamat;
  }
  
  /**
   * @function _getOngkir_id().
   * @abstract Get ongkir_id.
   *
   * @return ongkir_id.
   */
  function _getOngkir_id()
  {
      return $this->ongkir_id;
  }
  
  /**
   * @function _setOngkir_id().
   * @abstract Set ongkir_id.
   *
   * @param ongkir_id the value to set.
   */
  function _setOngkir_id($ongkir_id = '')
  {
      $this->ongkir_id = $ongkir_id;
  }
  
  /**
   * @function _getRelawan_email().
   * @abstract Get relawan_email.
   *
   * @return relawan_email.
   */
  function _getRelawan_email()
  {
      return $this->relawan_email;
  }
  
  /**
   * @function _setRelawan_email().
   * @abstract Set relawan_email.
   *
   * @param relawan_email the value to set.
   */
  function _setRelawan_email($relawan_email = '')
  {
      $this->relawan_email = $relawan_email;
  }
  
  /**
   * @function _getRelawan_telp().
   * @abstract Get relawan_telp.
   *
   * @return relawan_telp.
   */
  function _getRelawan_telp()
  {
      return $this->relawan_telp;
  }
  
  /**
   * @function _setRelawan_telp().
   * @abstract Set relawan_telp.
   *
   * @param relawan_telp the value to set.
   */
  function _setRelawan_telp($relawan_telp = '')
  {
      $this->relawan_telp = $relawan_telp;
  }
  
  /**
   * @function _getRelawan_date_time().
   * @abstract Get relawan_date_time.
   *
   * @return relawan_date_time.
   */
  function _getRelawan_date_time()
  {
      return $this->relawan_date_time;
  }
  
  /**
   * @function _setRelawan_date_time().
   * @abstract Set relawan_date_time.
   *
   * @param relawan_date_time the value to set.
   */
  function _setRelawan_date_time($relawan_date_time = '')
  {
      $this->relawan_date_time = $relawan_date_time;
  }
}
