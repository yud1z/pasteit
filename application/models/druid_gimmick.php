<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_gimmick extends Druid_content 
{

  var $gimmick_id;
  var $gimmick_code;
  var $gimmick_name;
  var $gimmick_rank;
  var $gimmick_file;
  var $gimmick_desc;
  var $gimmick_weight;

  public function get_gimmick_by_code($code = '')
  {
    if ($code) {

      $this->db->where('gimmick_code', $code); 
      $query = $this->db->get('druid_gimmick');
      return $query->result();

    }
    else {
      return array();
    }
  }
  
  /**
   * @function _getGimmick_id().
   * @abstract Get gimmick_id.
   *
   * @return gimmick_id.
   */
  function _getGimmick_id()
  {
      return $this->gimmick_id;
  }
  
  /**
   * @function _setGimmick_id().
   * @abstract Set gimmick_id.
   *
   * @param gimmick_id the value to set.
   */
  function _setGimmick_id($gimmick_id = '')
  {
      $this->gimmick_id = $gimmick_id;
  }
  
  /**
   * @function _getGimmick_code().
   * @abstract Get gimmick_code.
   *
   * @return gimmick_code.
   */
  function _getGimmick_code()
  {
      return $this->gimmick_code;
  }
  
  /**
   * @function _setGimmick_code().
   * @abstract Set gimmick_code.
   *
   * @param gimmick_code the value to set.
   */
  function _setGimmick_code($gimmick_code = '')
  {
      $this->gimmick_code = $gimmick_code;
  }
  
  /**
   * @function _getGimmick_name().
   * @abstract Get gimmick_name.
   *
   * @return gimmick_name.
   */
  function _getGimmick_name()
  {
      return $this->gimmick_name;
  }
  
  /**
   * @function _setGimmick_name().
   * @abstract Set gimmick_name.
   *
   * @param gimmick_name the value to set.
   */
  function _setGimmick_name($gimmick_name = '')
  {
      $this->gimmick_name = $gimmick_name;
  }
  
  /**
   * @function _getGimmick_rank().
   * @abstract Get gimmick_rank.
   *
   * @return gimmick_rank.
   */
  function _getGimmick_rank()
  {
      return $this->gimmick_rank;
  }
  
  /**
   * @function _setGimmick_rank().
   * @abstract Set gimmick_rank.
   *
   * @param gimmick_rank the value to set.
   */
  function _setGimmick_rank($gimmick_rank = '')
  {
      $this->gimmick_rank = $gimmick_rank;
  }
  
  /**
   * @function _getGimmick_file().
   * @abstract Get gimmick_file.
   *
   * @return gimmick_file.
   */
  function _getGimmick_file()
  {
      return $this->gimmick_file;
  }
  
  /**
   * @function _setGimmick_file().
   * @abstract Set gimmick_file.
   *
   * @param gimmick_file the value to set.
   */
  function _setGimmick_file($gimmick_file = '')
  {
      $this->gimmick_file = $gimmick_file;
  }
  
  /**
   * @function _getGimmick_desc().
   * @abstract Get gimmick_desc.
   *
   * @return gimmick_desc.
   */
  function _getGimmick_desc()
  {
      return $this->gimmick_desc;
  }
  
  /**
   * @function _setGimmick_desc().
   * @abstract Set gimmick_desc.
   *
   * @param gimmick_desc the value to set.
   */
  function _setGimmick_desc($gimmick_desc = '')
  {
      $this->gimmick_desc = $gimmick_desc;
  }
  
  /**
   * @function _getGimmick_weight().
   * @abstract Get gimmick_weight.
   *
   * @return gimmick_weight.
   */
  function _getGimmick_weight()
  {
      return $this->gimmick_weight;
  }
  
  /**
   * @function _setGimmick_weight().
   * @abstract Set gimmick_weight.
   *
   * @param gimmick_weight the value to set.
   */
  function _setGimmick_weight($gimmick_weight = '')
  {
      $this->gimmick_weight = $gimmick_weight;
  }
}
