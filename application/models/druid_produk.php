<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'druid_file.php';

class druid_produk extends Druid_file  
{


  var $produk_id;
  var $produk_harga;
  var $produk_type;
  var $produk_weight;
  var $produk_status;
  var $content_id;

  //DO:: Get all produk for the archive
  public function get_all_produk()
  {
    $query = $this->db->get(get_class($this));
    return $query->result();
  }

  /**
   *  Get Product by code
   */
  public function get_produk_by_id($id = '')
  {
    $query = $this->db->get_where(
      get_class($this),
      array(
        'produk_id' => $id
      )
    );

    return $query->result();
  }

  public function get_file_by_produk_id($id = '')
  {
    //  Convert Produk_id to content_id
    $val = $this->get_produk_by_id($id);
    $val = $val[0];

    $query = $this->db->get_where(
      'druid_file',
      array(
        'content_id' => $val->content_id
      )
    );

    return $query->result();

  }

  /**
   *  delete the user from database
   */
  public function delete_produk_by_contentid($id = '')
  {
    
    $this->db->delete(
      get_class($this), 
      array(
        'content_id' => $id
      )
    );

  }

  public function get_produk_by_contentid()
  {
    $content_id = $this->_getContent_id();


    $query = $this->db->get_where(
      get_class($this),
      array(
        'content_id' => $content_id
      )
    );

    return $query->result();
  
  }

  public function get_join_data_sticky($category = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*, druid_produk.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      INNER JOIN druid_produk ON druid_produk.content_id = druid_content.content_id
      WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank = "-1"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id ASC
      ');
      return $query->result();
  }

  public function get_join_data_archive($category = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*, druid_produk.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      INNER JOIN druid_produk ON druid_produk.content_id = druid_content.content_id
      WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_rank DESC
      ');
      return $query->result();
  }

  public function get_join_data_random($category = '', $limit = 0, $code = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*, druid_produk.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      INNER JOIN druid_produk ON druid_produk.content_id = druid_content.content_id
      WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
      AND druid_produk.produk_id <> "'. $code .'"
      GROUP BY druid_content.content_id
      ORDER BY RAND()
      LIMIT 0,'. $limit .'
      ');
      return $query->result();
  }

  public function get_join_data_single($node = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*, druid_produk.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      INNER JOIN druid_produk ON druid_produk.content_id = druid_content.content_id
      WHERE druid_produk.produk_id="'. $node .'"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id ASC
      ');
      return $query->result();
  }

  public function get_random_produk()
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*, druid_produk.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      INNER JOIN druid_produk ON druid_produk.content_id = druid_content.content_id
      GROUP BY druid_content.content_id
      ORDER BY RAND()
      LIMIT 0, 2
      ');
      return $query->result();
  }

    public function get_random_produk_4()
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*, druid_produk.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      INNER JOIN druid_produk ON druid_produk.content_id = druid_content.content_id
      GROUP BY druid_content.content_id
      ORDER BY RAND()
      LIMIT 0, 4
      ');
      return $query->result();
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

  /**
   * Get produk_harga.
   *
   * @return produk_harga.
   */
  function _getProduk_harga()
  {
    return $this->produk_harga;
  }

  /**
   * Set produk_harga.
   *
   * @param produk_harga the value to set.
   */
  function _setProduk_harga($produk_harga = '')
  {
    $this->produk_harga = $produk_harga;
  }
  
  /**
   * Get produk_type.
   *
   * @return produk_type.
   */
  function _getProduk_type()
  {
      return $this->produk_type;
  }
  
  /**
   * Set produk_type.
   *
   * @param produk_type the value to set.
   */
  function _setProduk_type($produk_type = '')
  {
      $this->produk_type = $produk_type;
  }
  
  /**
   * Get produk_weight.
   *
   * @return produk_weight.
   */
  function _getProduk_weight()
  {
      return $this->produk_weight;
  }
  
  /**
   * Set produk_weight.
   *
   * @param produk_weight the value to set.
   */
  function _setProduk_weight($produk_weight = '')
  {
      $this->produk_weight = $produk_weight;
  }
  
  /**
   * Get produk_status.
   *
   * @return produk_status.
   */
  function _getProduk_status()
  {
      return $this->produk_status;
  }
  
  /**
   * Set produk_status.
   *
   * @param produk_status the value to set.
   */
  function _setProduk_status($produk_status = '')
  {
      $this->produk_status = $produk_status;
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
