<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_content.php';

class druid_catalogue extends druid_content 
{
  var $catalogue_id;
  var $catalogue_title;
  var $catalogue_type;
  var $catalogue_rank;
  var $catalogue_link;
  var $produk_id;
  var $file_id;


  public function start()
  {
    $this->_setKey('catalogue_id');

    $sort = $this->_getSort();
    $sort = (isset($sort)) ? $sort : 'desc';
    $this->_setSort($sort);

  }

  /**
   *  Update table user
   */
  public function update_diskon()
  {
    $id = $this->_getDiskon_id();
    $type = $this->_getDiskon_type();
    $val = $this->_getDiskon_value();

    $data = array(
      'diskon_value'  => $val,
    );

    $this->db->update(get_class($this), $data, array('diskon_id' => $id));
  }

  public function get_join_data()
  {

    $query = $this->db->query('
      SELECT druid_slide.*, druid_content.*, druid_file.*, druid_category.*
      FROM druid_slide
      INNER JOIN druid_content ON druid_slide.content_id = druid_content.content_id
      INNER JOIN druid_file ON druid_slide.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      ORDER BY druid_slide.slide_rank ASC
      ');

      return $query->result();
  }



  public function get_last_id(){
    $query = $this->db->get(get_class($this));

    $last = $query->last_row();
    return $query->result();

  }


  public function get_catalogue_by_kolom($kolom)
  {

    $query = $this->db->query('
        SELECT druid_catalogue.*, druid_file.*, druid_produk.*, druid_content.*
        FROM druid_catalogue
        INNER JOIN druid_file ON druid_catalogue.file_id = druid_file.file_id
        INNER JOIN druid_produk ON druid_catalogue.produk_id = druid_produk.produk_id
        INNER JOIN druid_content ON druid_content.content_id = druid_produk.content_id
        WHERE druid_catalogue.catalogue_type="'. $kolom .'"
        ORDER BY catalogue_rank
      ');
    return $query->result();

  }


  
  
  /**
   * Get catalogue_id.
   *
   * @return catalogue_id.
   */
  function _getCatalogue_id()
  {
      return $this->catalogue_id;
  }
  
  /**
   * Set catalogue_id.
   *
   * @param catalogue_id the value to set.
   */
  function _setCatalogue_id($catalogue_id = '')
  {
      $this->catalogue_id = $catalogue_id;
  }
  
  /**
   * Get catalogue_title.
   *
   * @return catalogue_title.
   */
  function _getCatalogue_title()
  {
      return $this->catalogue_title;
  }
  
  /**
   * Set catalogue_title.
   *
   * @param catalogue_title the value to set.
   */
  function _setCatalogue_title($catalogue_title = '')
  {
      $this->catalogue_title = $catalogue_title;
  }
  
  /**
   * Get catalogue_type.
   *
   * @return catalogue_type.
   */
  function _getCatalogue_type()
  {
      return $this->catalogue_type;
  }
  
  /**
   * Set catalogue_type.
   *
   * @param catalogue_type the value to set.
   */
  function _setCatalogue_type($catalogue_type = '')
  {
      $this->catalogue_type = $catalogue_type;
  }
  
  /**
   * Get catalogue_rank.
   *
   * @return catalogue_rank.
   */
  function _getCatalogue_rank()
  {
      return $this->catalogue_rank;
  }
  
  /**
   * Set catalogue_rank.
   *
   * @param catalogue_rank the value to set.
   */
  function _setCatalogue_rank($catalogue_rank = '')
  {
      $this->catalogue_rank = $catalogue_rank;
  }
  
  /**
   * Get catalogue_link.
   *
   * @return catalogue_link.
   */
  function _getCatalogue_link()
  {
      return $this->catalogue_link;
  }
  
  /**
   * Set catalogue_link.
   *
   * @param catalogue_link the value to set.
   */
  function _setCatalogue_link($catalogue_link = '')
  {
      $this->catalogue_link = $catalogue_link;
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
   * Get produk_id.
   *
   * @return produk_id.
   */
  function _getProduk_id()
  {
      return $this->produk_id;
  }
  
  /**
   * Set produk_id.
   *
   * @param produk_id the value to set.
   */
  function _setProduk_id($produk_id = '')
  {
      $this->produk_id = $produk_id;
  }
}
