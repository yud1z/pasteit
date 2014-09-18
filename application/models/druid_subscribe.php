<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_subscribe extends druid_content 
{

  var $subscribe_id;
  var $subscribe_email;
  var $subscribe_datetime;


  public function start()
  {
    $this->_setKey('subscribe_id');
    $sort = $this->_getSort();
    $sort = (isset($sort)) ? $sort : 'desc';
    $this->_setSort($sort);

  }
  
  
  /**
   * @function _getSubscribe_id().
   * @abstract Get subscribe_id.
   *
   * @return subscribe_id.
   */
  function _getSubscribe_id()
  {
      return $this->subscribe_id;
  }
  
  /**
   * @function _setSubscribe_id().
   * @abstract Set subscribe_id.
   *
   * @param subscribe_id the value to set.
   */
  function _setSubscribe_id($subscribe_id = '')
  {
      $this->subscribe_id = $subscribe_id;
  }
  
  /**
   * @function _getSubscribe_email().
   * @abstract Get subscribe_email.
   *
   * @return subscribe_email.
   */
  function _getSubscribe_email()
  {
      return $this->subscribe_email;
  }
  
  /**
   * @function _setSubscribe_email().
   * @abstract Set subscribe_email.
   *
   * @param subscribe_email the value to set.
   */
  function _setSubscribe_email($subscribe_email = '')
  {
      $this->subscribe_email = $subscribe_email;
  }
  
  /**
   * @function _getSubscribe_datetime().
   * @abstract Get subscribe_datetime.
   *
   * @return subscribe_datetime.
   */
  function _getSubscribe_datetime()
  {
      return $this->subscribe_datetime;
  }
  
  /**
   * @function _setSubscribe_datetime().
   * @abstract Set subscribe_datetime.
   *
   * @param subscribe_datetime the value to set.
   */
  function _setSubscribe_datetime($subscribe_datetime = '')
  {
      $this->subscribe_datetime = $subscribe_datetime;
  }
}
