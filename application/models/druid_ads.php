<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_ads extends Druid_content 
{
  var $ads_id;
  var $ads_title;
  var $ads_folder;
  var $ads_file;
  var $ads_rank;
  var $ads_link;

  public function get_all_ads()
  {

    $this->db->order_by('ads_rank', 'asc'); 
    $query = $this->db->get('druid_ads');
    return $query->result();

  }

  /**
   *  insert File
   *  
   */
  public function insert_file()
  {
      $filename   = $this->_getAds_file();

    $data = array(
      'file_extension'    => $extension,
      'file_preview'      => '',
      'file_folder'       => $folder,
      'file_name'         => $filename,
      'file_desc'         => $desc,
      'content_id'        => $content_id,
    );

    //here insert the user
    $this->db->insert(get_class($this), $data);
    return $this->db->insert_id();

  }

  /**
   * @function _getAds_id().
   * @abstract Get ads_id.
   *
   * @return ads_id.
   */
  function _getAds_id()
  {
      return $this->ads_id;
  }
  
  /**
   * @function _setAds_id().
   * @abstract Set ads_id.
   *
   * @param ads_id the value to set.
   */
  function _setAds_id($ads_id = '')
  {
      $this->ads_id = $ads_id;
  }
  
  /**
   * @function _getAds_title().
   * @abstract Get ads_title.
   *
   * @return ads_title.
   */
  function _getAds_title()
  {
      return $this->ads_title;
  }
  
  /**
   * @function _setAds_title().
   * @abstract Set ads_title.
   *
   * @param ads_title the value to set.
   */
  function _setAds_title($ads_title = '')
  {
      $this->ads_title = $ads_title;
  }
  
  /**
   * @function _getAds_file().
   * @abstract Get ads_file.
   *
   * @return ads_file.
   */
  function _getAds_file()
  {
      return $this->ads_file;
  }
  
  /**
   * @function _setAds_file().
   * @abstract Set ads_file.
   *
   * @param ads_file the value to set.
   */
  function _setAds_file($ads_file = '')
  {
      $this->ads_file = $ads_file;
  }
  
  /**
   * @function _getAds_rank().
   * @abstract Get ads_rank.
   *
   * @return ads_rank.
   */
  function _getAds_rank()
  {
      return $this->ads_rank;
  }
  
  /**
   * @function _setAds_rank().
   * @abstract Set ads_rank.
   *
   * @param ads_rank the value to set.
   */
  function _setAds_rank($ads_rank = '')
  {
      $this->ads_rank = $ads_rank;
  }
  
  /**
   * @function _getAds_folder().
   * @abstract Get ads_folder.
   *
   * @return ads_folder.
   */
  function _getAds_folder()
  {
      return $this->ads_folder;
  }
  
  /**
   * @function _setAds_folder().
   * @abstract Set ads_folder.
   *
   * @param ads_folder the value to set.
   */
  function _setAds_folder($ads_folder = '')
  {
      $this->ads_folder = $ads_folder;
  }
  
  /**
   * @function _getAds_link().
   * @abstract Get ads_link.
   *
   * @return ads_link.
   */
  function _getAds_link()
  {
      return $this->ads_link;
  }
  
  /**
   * @function _setAds_link().
   * @abstract Set ads_link.
   *
   * @param ads_link the value to set.
   */
  function _setAds_link($ads_link = '')
  {
      $this->ads_link = $ads_link;
  }
}
