<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';
class druid_tag extends Druid_content 
{

  var $tag_id;
  var $tag_name;
  var $content_id;


  /**
   * Get tag_id.
   *
   * @return tag_id.
   */
  function _getTag_id()
  {
      return $this->tag_id;
  }
  
  /**
   * Set tag_id.
   *
   * @param tag_id the value to set.
   */
  function _setTag_id($tag_id = '')
  {
      $this->tag_id = $tag_id;
  }
  
  /**
   * Get tag_name.
   *
   * @return tag_name.
   */
  function _getTag_name()
  {
      return $this->tag_name;
  }
  
  /**
   * Set tag_name.
   *
   * @param tag_name the value to set.
   */
  function _setTag_name($tag_name = '')
  {
      $this->tag_name = $tag_name;
  }
  
  /**
   * Get content_id.
   *
   * @return content_id.
   */
  function _getContent_id()
  {
      return $this->content_id;
  }
  
  /**
   * Set content_id.
   *
   * @param content_id the value to set.
   */
  function _setContent_id($content_id = '')
  {
      $this->content_id = $content_id;
  }
}
