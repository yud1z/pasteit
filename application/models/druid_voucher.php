<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_voucher extends Data 
{


  var $voucher_code;
  var $voucher_diskon;
  var $vaucher_use;
  var $datetime;

  public function start()
  {
    $this->_setKey('voucher_code');

    $sort = $this->_getSort();
    $sort = (isset($sort)) ? $sort : 'desc';
    $this->_setSort($sort);

  }

  public function get_voucher_cond($data = array())
  {
    $prefix   = $data['prefix'];
    $suffix   = $data['suffix'];
    $used     = $data['used'];
    $discount = $data['discount'];
    $date     = $data['date'];
    $date1    = $data['date1'];
    $last     = $data['last'];


    if (!empty($prefix)) {
      $this->db->like('voucher_code', $prefix, 'after'); 
    }

    if (!empty($suffix)) {
      $this->db->like('voucher_code', $suffix, 'before'); 
    }

    if ($used != '2') {
      $this->db->where('voucher_use = '. $used .'');
    }

    if (!empty($discount)) {
      $this->db->where('voucher_diskon = '. $discount .'');
    }

    if (!empty($date) && !empty($date1)) {
      $date = explode('/', $date);
      $date = $date['2'] . '-' . $date['0'] . '-' . $date['1'];
      $date1 = explode('/', $date1);
      $date1 = $date1['2'] . '-' . $date1['0'] . '-' . $date1['1'];
      $this->db->where("datetime BETWEEN '$date' AND '$date1'");
    }

    if ($last != '2') {
      $this->db->where('voucher_last = '. $last .'');
    }

    $query = $this->db->get(get_class($this));


    return $query->result();

    //opn($data);

    //$query = $this->db->get_where(
      //get_class($this),
      //array(
        //'voucher_code' => $val
      //)
    //);



  }
  public function get_voucher_result_bycode()
  {
    $val = $this->_getVoucher_code();

    $query = $this->db->get_where(
      get_class($this),
      array(
        'voucher_code' => $val,
        'voucher_use' => 0
      )
    );

    return $query->result();

  }

  

  public function get_voucher_bycode()
  {
    $val = $this->_getVoucher_code();

    $query = $this->db->get_where(
      get_class($this),
      array(
        'voucher_code' => $val,
        'voucher_use' => 0
      )
    );

    return $query->num_rows();

  }


  public function get_voucher_byorder($order_id = 0)
  {
    $query = $this->db->get_where(
      get_class($this),
      array(
        'order_id' => $order_id,
      )
    );

    return $query->result();

  }

  
  /**
   * Get vaucher_use.
   *
   * @return vaucher_use.
   */
  function _getVaucher_use()
  {
      return $this->vaucher_use;
  }
  
  /**
   * Set vaucher_use.
   *
   * @param vaucher_use the value to set.
   */
  function _setVaucher_use($vaucher_use = '')
  {
      $this->vaucher_use = $vaucher_use;
  }
  
  /**
   * Get datetime.
   *
   * @return datetime.
   */
  function _getDatetime()
  {
      return $this->datetime;
  }
  
  /**
   * Set datetime.
   *
   * @param datetime the value to set.
   */
  function _setDatetime($datetime = '')
  {
      $this->datetime = $datetime;
  }


  
  /**
   * Get voucher_code.
   *
   * @return voucher_code.
   */
  function _getVoucher_code()
  {
      return $this->voucher_code;
  }
  
  /**
   * Set voucher_code.
   *
   * @param voucher_code the value to set.
   */
  function _setVoucher_code($voucher_code = '')
  {
      $this->voucher_code = $voucher_code;
  }
  
  /**
   * Get voucher_diskon.
   *
   * @return voucher_diskon.
   */
  function _getVoucher_diskon()
  {
      return $this->voucher_diskon;
  }
  
  /**
   * Set voucher_diskon.
   *
   * @param voucher_diskon the value to set.
   */
  function _setVoucher_diskon($voucher_diskon = '')
  {
      $this->voucher_diskon = $voucher_diskon;
  }
}
