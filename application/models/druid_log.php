<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_log extends CI_Model 
{

  var $log_id;
  var $log_table;
  var $log_node_temp;
  var $log_node;
  var $log_browser;
  var $log_read;
  var $log_ip;
  var $log_url;

  /**
   * Get log_id.
   *
   * @return log_id.
   */
  function _getLog_id()
  {
    return $this->log_id;
  }

  /**
   * Set log_id.
   *
   * @param log_id the value to set.
   */
  function _setLog_id($log_id = '')
  {
    $this->log_id = $log_id;
  }

  /**
   * Get log_table.
   *
   * @return log_table.
   */
  function _getLog_table()
  {
    return $this->log_table;
  }

  /**
   * Set log_table.
   *
   * @param log_table the value to set.
   */
  function _setLog_table($log_table = '')
  {
    $this->log_table = $log_table;
  }

  /**
   * Get log_node_temp.
   *
   * @return log_node_temp.
   */
  function _getLog_node_temp()
  {
    return $this->log_node_temp;
  }

  /**
   * Set log_node_temp.
   *
   * @param log_node_temp the value to set.
   */
  function _setLog_node_temp($log_node_temp = '')
  {
    $this->log_node_temp = $log_node_temp;
  }

  /**
   * Get log_node.
   *
   * @return log_node.
   */
  function _getLog_node()
  {
    return $this->log_node;
  }

  /**
   * Set log_node.
   *
   * @param log_node the value to set.
   */
  function _setLog_node($log_node = '')
  {
    $this->log_node = $log_node;
  }

  /**
   * Get log_browser.
   *
   * @return log_browser.
   */
  function _getLog_browser()
  {
    return $this->log_browser;
  }

  /**
   * Set log_browser.
   *
   * @param log_browser the value to set.
   */
  function _setLog_browser($log_browser = '')
  {
    $this->log_browser = $log_browser;
  }

  /**
   * Get log_read.
   *
   * @return log_read.
   */
  function _getLog_read()
  {
    return $this->log_read;
  }

  /**
   * Set log_read.
   *
   * @param log_read the value to set.
   */
  function _setLog_read($log_read = '')
  {
    $this->log_read = $log_read;
  }

  /**
   * Get log_ip.
   *
   * @return log_ip.
   */
  function _getLog_ip()
  {
    return $this->log_ip;
  }

  /**
   * Set log_ip.
   *
   * @param log_ip the value to set.
   */
  function _setLog_ip($log_ip = '')
  {
    $this->log_ip = $log_ip;
  }

  /**
   * Get log_url.
   *
   * @return log_url.
   */
  function _getLog_url()
  {
    return $this->log_url;
  }

  /**
   * Set log_url.
   *
   * @param log_url the value to set.
   */
  function _setLog_url($log_url = '')
  {
    $this->log_url = $log_url;
  }
}
