<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

/**
 * @class druid_data 
 * @abstract This describe the data detail os detial data 
 * 
 * @uses druid
 * @uses _content
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class druid_data extends druid_content 
{
  /**
   * data_id 
   * 
   * @var mixed
   * @access public
   */
  var $data_id;
  /**
   * user_id 
   * 
   * @var mixed
   * @access public
   */
  var $user_id;
  /**
   * data_nama_lengkap 
   * 
   * @var mixed
   * @access public
   */
  var $data_nama_lengkap;
  /**
   * data_tanggal_lahir 
   * 
   * @var mixed
   * @access public
   */
  var $data_tanggal_lahir;
  /**
   * data_alamat 
   * 
   * @var mixed
   * @access public
   */
  var $data_alamat;
  /**
   * data_kode_pos 
   * 
   * @var mixed
   * @access public
   */
  var $data_kode_pos;
  /**
   * ongkir_id 
   * 
   * @var mixed
   * @access public
   */
  var $ongkir_id;
  /**
   * data_negara 
   * 
   * @var mixed
   * @access public
   */
  var $data_negara;
  /**
   * data_no_telp 
   * 
   * @var mixed
   * @access public
   */
  var $data_no_telp;
  /**
   * data_email 
   * 
   * @var mixed
   * @access public
   */
  var $data_email;
  /**
   * data_newsletter 
   * 
   * @var mixed
   * @access public
   */
  var $data_newsletter;
  /**
   * data_milist 
   * 
   * @var mixed
   * @access public
   */
  var $data_milist;
  /**
   * @function start 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function start()
  {
    $this->_setKey('data_id');
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
   * @function get_data_by_user_id 
   * @abstract description 
   * 
   * @param string $id 
   * @access public
   * @return void
   */
  public function get_data_by_user_id($id = '')
  {

    $query = $this->db->get_where(get_class($this), array('user_id' => $id));
    $addon = $query->result();
    if (!empty($addon)) {

      if ($addon[0]->ongkir_id != 0) {
        $this->db->join('druid_ongkir', 'druid_data.ongkir_id = druid_ongkir.ongkir_id');
        $query = $this->db->get_where(get_class($this), array('user_id' => $id));
        return $query->result();
      }
      else {
        return $addon;
      }
    }


  }
  /**
   * @function get_data_by_user_id_pure 
   * @abstract description 
   * 
   * @param string $id 
   * @access public
   * @return void
   */
  public function get_data_by_user_id_pure($id = '')
  {
    $query = $this->db->get_where(get_class($this), array('user_id' => $id));
    return $query->result();
  
  }

  /**
   * @function get_confirm_code 
   * @abstract description 
   * 
   * @param string $id 
   * @access public
   * @return void
   */
  public function get_confirm_code($id = '')
  {
    $query = $this->db->get_where(get_class($this), array('data_email' => $id));
    return $query->result();
  
  }

  /**
   *  check the email row
   *
   */
  public function check_mail()
  {
    $user_name = $this->_getData_email();
    $query = $this->db->get_where(
      get_class($this),
      array(
        'data_email' => $user_name
      )
    );

    return $query->num_rows();
  }

  /**
   *  check the email row
   *
   */
  public function check_not_mail($email = '')
  {
    $user_name = $this->_getData_email();

    $query = $this->db->query('
      SELECT data_email
      FROM druid_data
      WHERE data_email = "'. $email .'" 
      ');

      //  whats is going on here
      //  Check the email which is not the my email but show the other email
      //$query = $this->db->get_where(
        //get_class($this),
        //array(
          //'data_email' => $email
        //)
      //);

    return $query->num_rows();
  }


  /**
   *  check the email row
   *
   */
  public function get_mail()
  {
    $user_name = $this->_getData_email();
    $query = $this->db->get_where(
      get_class($this),
      array(
        'data_email' => $user_name
      )
    );

    return $query->result();
  }

  /**
   *  get the password
   */
  public function get_password()
  {
    $email = $this->_getData_email();
    $this->db->from('druid_data');
    $this->db->where('druid_data.data_email', $email);
    $this->db->join('druid_user', 'druid_user.user_id = druid_data.user_id');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_data_by_user_code($code = '')
  {

    $query = $this->db->get_where(get_class($this), array('data_activation_key' => $code));
    return $query->num_rows();
  
  }

  /**
   * Get data_id.
   *
   * @return data_id.
   */
  function _getData_id()
  {
      return $this->data_id;
  }
  
  /**
   * Set data_id.
   *
   * @param data_id the value to set.
   */
  function _setData_id($data_id = '')
  {
      $this->data_id = $data_id;
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
  
  /**
   * Get data_nama_lengkap.
   *
   * @return data_nama_lengkap.
   */
  function _getData_nama_lengkap()
  {
      return $this->data_nama_lengkap;
  }
  
  /**
   * Set data_nama_lengkap.
   *
   * @param data_nama_lengkap the value to set.
   */
  function _setData_nama_lengkap($data_nama_lengkap = '')
  {
      $this->data_nama_lengkap = $data_nama_lengkap;
  }
  
  /**
   * Get data_tanggal_lahir.
   *
   * @return data_tanggal_lahir.
   */
  function _getData_tanggal_lahir()
  {
      return $this->data_tanggal_lahir;
  }
  
  /**
   * Set data_tanggal_lahir.
   *
   * @param data_tanggal_lahir the value to set.
   */
  function _setData_tanggal_lahir($data_tanggal_lahir = '')
  {
      $this->data_tanggal_lahir = $data_tanggal_lahir;
  }
  
  /**
   * Get data_alamat.
   *
   * @return data_alamat.
   */
  function _getData_alamat()
  {
      return $this->data_alamat;
  }
  
  /**
   * Set data_alamat.
   *
   * @param data_alamat the value to set.
   */
  function _setData_alamat($data_alamat = '')
  {
      $this->data_alamat = $data_alamat;
  }
  
  /**
   * Get data_kode_pos.
   *
   * @return data_kode_pos.
   */
  function _getData_kode_pos()
  {
      return $this->data_kode_pos;
  }
  
  /**
   * Set data_kode_pos.
   *
   * @param data_kode_pos the value to set.
   */
  function _setData_kode_pos($data_kode_pos = '')
  {
      $this->data_kode_pos = $data_kode_pos;
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
   * Get data_negara.
   *
   * @return data_negara.
   */
  function _getData_negara()
  {
      return $this->data_negara;
  }
  
  /**
   * Set data_negara.
   *
   * @param data_negara the value to set.
   */
  function _setData_negara($data_negara = '')
  {
      $this->data_negara = $data_negara;
  }
  
  /**
   * Get data_no_telp.
   *
   * @return data_no_telp.
   */
  function _getData_no_telp()
  {
      return $this->data_no_telp;
  }
  
  /**
   * Set data_no_telp.
   *
   * @param data_no_telp the value to set.
   */
  function _setData_no_telp($data_no_telp = '')
  {
      $this->data_no_telp = $data_no_telp;
  }
  
  /**
   * Get data_email.
   *
   * @return data_email.
   */
  function _getData_email()
  {
      return $this->data_email;
  }
  
  /**
   * Set data_email.
   *
   * @param data_email the value to set.
   */
  function _setData_email($data_email = '')
  {
      $this->data_email = $data_email;
  }
  
  /**
   * Get data_newsletter.
   *
   * @return data_newsletter.
   */
  function _getData_newsletter()
  {
      return $this->data_newsletter;
  }
  
  /**
   * Set data_newsletter.
   *
   * @param data_newsletter the value to set.
   */
  function _setData_newsletter($data_newsletter = '')
  {
      $this->data_newsletter = $data_newsletter;
  }
  
  /**
   * Get data_milist.
   *
   * @return data_milist.
   */
  function _getData_milist()
  {
      return $this->data_milist;
  }
  
  /**
   * Set data_milist.
   *
   * @param data_milist the value to set.
   */
  function _setData_milist($data_milist = '')
  {
      $this->data_milist = $data_milist;
  }
}
