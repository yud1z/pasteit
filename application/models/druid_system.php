<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_system extends Data 
{
  var $site_name;
  var $default_image;
  var $metadata_desc;
  var $metadata_key;
  var $default_logo;
  var $default_ico;


  public function _start()
  {
    $key = $this->_getKey();
    $key = (isset($key)) ? $key : 'site_name';
    $this->_setKey($key);
  }

  public function get_field($arg = '')
  {
    $this->db->select($arg);
    $query = $this->db->get(get_class($this));

    $result = $query->result();

    $result = (isset($result[0])) ? $result[0] : '';

    eval('$result = (isset($result->'. $arg .')) ? $result->'. $arg .' : "";');
    
    return $result;


  }

  public function _update($field = '', $arg = '')
  {

    $query = $this->db->get(get_class($this));

    $q = $query->result();

    if (!empty($q)) {


      $data = array(
        $field => $arg
      );
      $this->db->update(get_class($this), $data); 

    }
    else {

      $data = array(
        $field => $arg
      );

      $this->db->insert(get_class($this), $data);


    }


  }

  /**
   * Get site_name.
   *
   * @return site_name.
   */
  function _getSite_name()
  {
      return $this->site_name;
  }
  
  /**
   * Set site_name.
   *
   * @param site_name the value to set.
   */
  function _setSite_name($site_name = '')
  {
      $this->site_name = $site_name;
  }
  
  /**
   * Get default_image.
   *
   * @return default_image.
   */
  function _getDefault_image()
  {
      return $this->default_image;
  }
  
  /**
   * Set default_image.
   *
   * @param default_image the value to set.
   */
  function _setDefault_image($default_image = '')
  {
      $this->default_image = $default_image;
  }
  
  /**
   * Get metadata_desc.
   *
   * @return metadata_desc.
   */
  function _getMetadata_desc()
  {
      return $this->metadata_desc;
  }
  
  /**
   * Set metadata_desc.
   *
   * @param metadata_desc the value to set.
   */
  function _setMetadata_desc($metadata_desc = '')
  {
      $this->metadata_desc = $metadata_desc;
  }
  
  /**
   * Get metadata_key.
   *
   * @return metadata_key.
   */
  function _getMetadata_key()
  {
      return $this->metadata_key;
  }
  
  /**
   * Set metadata_key.
   *
   * @param metadata_key the value to set.
   */
  function _setMetadata_key($metadata_key = '')
  {
      $this->metadata_key = $metadata_key;
  }
  
  /**
   * Get default_logo.
   *
   * @return default_logo.
   */
  function _getDefault_logo()
  {
      return $this->default_logo;
  }
  
  /**
   * Set default_logo.
   *
   * @param default_logo the value to set.
   */
  function _setDefault_logo($default_logo = '')
  {
      $this->default_logo = $default_logo;
  }
  
  /**
   * Get default_ico.
   *
   * @return default_ico.
   */
  function _getDefault_ico()
  {
      return $this->default_ico;
  }
  
  /**
   * Set default_ico.
   *
   * @param default_ico the value to set.
   */
  function _setDefault_ico($default_ico = '')
  {
      $this->default_ico = $default_ico;
  }
}
