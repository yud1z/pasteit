<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_ongkir extends CI_Model 
{

  var $ongkir_id;
  var $ongkir_propinsi;
  var $ongkir_kabupaten;
  var $ongkir_kecamatan;
  var $ongkir_jne;
  var $ongkir_reguler;
  var $ongkir_reguler_estimasi;
  var $ongkir_ekonomi;
  var $ongkir_ekonomi_estimasi;


  /**
   *  get the shipping fee
   */
  public function get_shipping_fee($ongkir_id)
  {
    
    $this->db->select('ongkir_reguler');
    $query = $this->db->get_where(get_class($this),
      array(
        'ongkir_id' => $ongkir_id
      ));
    return $query->result();
  }


  /**
   *  Get all province by distinct 
   *  @param
   *  @return province data
   */
  public function get_province()
  {
    $this->db->select('ongkir_propinsi');
    $this->db->order_by('ongkir_propinsi', 'DESC');
    $this->db->distinct();
    $query = $this->db->get(get_class($this));
    return $query->result();
  
  }

  /**
   *  Get all City by province data
   *  @param Province
   *  @return the city data
   */
  public function get_city($province = '')
  {
    $this->db->select('ongkir_kabupaten');
    $this->db->distinct();
    $query = $this->db->get_where(get_class($this),
      array(
        'ongkir_propinsi' => $province
      ));
    return $query->result();
  
  }
  
  /**
   *  Get all dsitrict data
   *  @param province data and city data
   *  @return the id of the value
   */
  public function get_district($province = '', $city = '')
  {
    $this->db->select('ongkir_kecamatan,ongkir_id');
    $this->db->distinct();
    $query = $this->db->get_where(get_class($this),
      array(
        'ongkir_propinsi' => $province,
        'ongkir_kabupaten' => $city
      ));
    return $query->result();
  
  }


  /**
   * Get ongkir_id.
   *
   * @return ongkir_id.
   */
  function _getOngkir_id()
  {
    return $this->ongkir_id;
  }

  /**
   * Set ongkir_id.
   *
   * @param ongkir_id the value to set.
   */
  function _setOngkir_id($ongkir_id = '')
  {
    $this->ongkir_id = $ongkir_id;
  }

  /**
   * Get ongkir_propinsi.
   *
   * @return ongkir_propinsi.
   */
  function _getOngkir_propinsi()
  {
    return $this->ongkir_propinsi;
  }

  /**
   * Set ongkir_propinsi.
   *
   * @param ongkir_propinsi the value to set.
   */
  function _setOngkir_propinsi($ongkir_propinsi = '')
  {
    $this->ongkir_propinsi = $ongkir_propinsi;
  }

  /**
   * Get ongkir_kabupaten.
   *
   * @return ongkir_kabupaten.
   */
  function _getOngkir_kabupaten()
  {
    return $this->ongkir_kabupaten;
  }

  /**
   * Set ongkir_kabupaten.
   *
   * @param ongkir_kabupaten the value to set.
   */
  function _setOngkir_kabupaten($ongkir_kabupaten = '')
  {
    $this->ongkir_kabupaten = $ongkir_kabupaten;
  }

  /**
   * Get ongkir_kecamatan.
   *
   * @return ongkir_kecamatan.
   */
  function _getOngkir_kecamatan()
  {
    return $this->ongkir_kecamatan;
  }

  /**
   * Set ongkir_kecamatan.
   *
   * @param ongkir_kecamatan the value to set.
   */
  function _setOngkir_kecamatan($ongkir_kecamatan = '')
  {
    $this->ongkir_kecamatan = $ongkir_kecamatan;
  }

  /**
   * Get ongkir_jne.
   *
   * @return ongkir_jne.
   */
  function _getOngkir_jne()
  {
    return $this->ongkir_jne;
  }

  /**
   * Set ongkir_jne.
   *
   * @param ongkir_jne the value to set.
   */
  function _setOngkir_jne($ongkir_jne = '')
  {
    $this->ongkir_jne = $ongkir_jne;
  }

  /**
   * Get ongkir_reguler.
   *
   * @return ongkir_reguler.
   */
  function _getOngkir_reguler()
  {
    return $this->ongkir_reguler;
  }

  /**
   * Set ongkir_reguler.
   *
   * @param ongkir_reguler the value to set.
   */
  function _setOngkir_reguler($ongkir_reguler = '')
  {
    $this->ongkir_reguler = $ongkir_reguler;
  }

  /**
   * Get ongkir_reguler_estimasi.
   *
   * @return ongkir_reguler_estimasi.
   */
  function _getOngkir_reguler_estimasi()
  {
    return $this->ongkir_reguler_estimasi;
  }

  /**
   * Set ongkir_reguler_estimasi.
   *
   * @param ongkir_reguler_estimasi the value to set.
   */
  function _setOngkir_reguler_estimasi($ongkir_reguler_estimasi = '')
  {
    $this->ongkir_reguler_estimasi = $ongkir_reguler_estimasi;
  }

  /**
   * Get ongkir_ekonomi.
   *
   * @return ongkir_ekonomi.
   */
  function _getOngkir_ekonomi()
  {
    return $this->ongkir_ekonomi;
  }

  /**
   * Set ongkir_ekonomi.
   *
   * @param ongkir_ekonomi the value to set.
   */
  function _setOngkir_ekonomi($ongkir_ekonomi = '')
  {
    $this->ongkir_ekonomi = $ongkir_ekonomi;
  }

  /**
   * Get ongkir_ekonomi_estimasi.
   *
   * @return ongkir_ekonomi_estimasi.
   */
  function _getOngkir_ekonomi_estimasi()
  {
    return $this->ongkir_ekonomi_estimasi;
  }

  /**
   * Set ongkir_ekonomi_estimasi.
   *
   * @param ongkir_ekonomi_estimasi the value to set.
   */
  function _setOngkir_ekonomi_estimasi($ongkir_ekonomi_estimasi = '')
  {
    $this->ongkir_ekonomi_estimasi = $ongkir_ekonomi_estimasi;
  }
}
