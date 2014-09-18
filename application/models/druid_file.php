<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_file extends Druid_content 
{
  var $file_id;
  var $file_extension;
  var $file_preview;
  var $file_folder;
  var $file_name;
  var $file_desc;
  var $content_id;


  /**
   *  insert File
   *  
   */
  public function insert_file()
  {
      $folder = $this->_getFile_folder();
      $filename = $this->_getFile_name();
      $extension = $this->_getFile_extension();
      $content_id = $this->_getContent_id();
      $desc = $this->_getFile_desc();

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


  public function get_content_value_bycontentid()
  {
    $id = $this->_getContent_id();

    $query = $this->db->get_where(
      get_class($this),
      array(
        'content_id' => $id
      )
    );

    return $query->result();

  }


  
  /**
   *  Update table user
   */
  public function update_file()
  {
      $folder       = $this->_getFile_folder();
      $filename     = $this->_getFile_name();
      $extension    = $this->_getFile_extension();
      $content_id   = $this->_getContent_id();
      $desc         = $this->_getFile_desc();
      $id           = $this->_getFile_id();

    $data = array(
      'file_extension'    => $extension,
      'file_preview'      => '',
      'file_folder'       => $folder,
      'file_name'         => $filename,
      'file_desc'         => $desc,
      'content_id'        => $content_id,
    );

    $this->db->update(get_class($this), $data, array($this->_getIndex() => $id));
  }

  /**
   *  Update table user
   */
  public function update_file_metadata()
  {
      $folder       = $this->_getFile_folder();
      $filename     = $this->_getFile_name();
      $extension    = $this->_getFile_extension();
      $content_id   = $this->_getContent_id();
      $desc         = $this->_getFile_desc();
      $id           = $this->_getFile_id();

    $data = array(
      'file_extension'    => $extension,
      'file_preview'      => '',
      'file_folder'       => $folder,
      'file_desc'         => $desc,
      'content_id'        => $content_id,
    );

    $this->db->update(get_class($this), $data, array($this->_getIndex() => $id));
  }

  /**
   *  delete the user from database
   */
  public function delete_file_by_contentid($id = '')
  {


    //$query = $this->db->get_where(
      //'belitung_content',
      //array(
        //'content_id' => $id
      //)
    //);


    //$val =  $query->result();
    //$val = $val[0];

    //$query2 = $this->db->get_where(
      //get_class($this),
      //array(
        //'file_id' => $val->file_id
      //)
    //);
 
    //$val =  $query2->result();
    //$val = $val[0];

    ////unlink($val->file_folder . $val->file_name);
    //$val1 = explode('_', $val->file_name);
    //$val1 = $val1[0];

    //$files = glob($val->file_folder . $val1 . '_*');
    ////opn($files);
    //array_map('unlink', $files);

    //$this->db->delete(
      //get_class($this), 
      //array(
        //'file_id' => $id
      //)
    //);





    
    $this->db->delete(
      get_class($this), 
      array(
        'content_id' => $id
      )
    );

  }

  /**
   * Get file_id.
   *
   * @return file_id.
   */
  function _getFile_id()
  {
      return $this->file_id;
  }
  
  /**
   * Set file_id.
   *
   * @param file_id the value to set.
   */
  function _setFile_id($file_id = '')
  {
      $this->file_id = $file_id;
  }
  
  /**
   * Get file_extension.
   *
   * @return file_extension.
   */
  function _getFile_extension()
  {
      return $this->file_extension;
  }
  
  /**
   * Set file_extension.
   *
   * @param file_extension the value to set.
   */
  function _setFile_extension($file_extension = '')
  {
      $this->file_extension = $file_extension;
  }
  
  /**
   * Get file_preview.
   *
   * @return file_preview.
   */
  function _getFile_preview()
  {
      return $this->file_preview;
  }
  
  /**
   * Set file_preview.
   *
   * @param file_preview the value to set.
   */
  function _setFile_preview($file_preview = '')
  {
      $this->file_preview = $file_preview;
  }
  
  /**
   * Get file_folder.
   *
   * @return file_folder.
   */
  function _getFile_folder()
  {
      return $this->file_folder;
  }
  
  /**
   * Set file_folder.
   *
   * @param file_folder the value to set.
   */
  function _setFile_folder($file_folder = '')
  {
      $this->file_folder = $file_folder;
  }
  
  /**
   * Get file_name.
   *
   * @return file_name.
   */
  function _getFile_name()
  {
      return $this->file_name;
  }
  
  /**
   * Set file_name.
   *
   * @param file_name the value to set.
   */
  function _setFile_name($file_name = '')
  {
      $this->file_name = $file_name;
  }
  
  /**
   * Get file_desc.
   *
   * @return file_desc.
   */
  function _getFile_desc()
  {
      return $this->file_desc;
  }
  
  /**
   * Set file_desc.
   *
   * @param file_desc the value to set.
   */
  function _setFile_desc($file_desc = '')
  {
      $this->file_desc = $file_desc;
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
