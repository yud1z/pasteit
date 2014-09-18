<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'data.php';

class druid_content extends Data 
{
  var $content_id;
  var $content_rank;
  var $content_publish;
  var $content_title;
  var $content_title1;
  var $content_desc;
  var $content_desc1;
  var $content_desc2;
  var $content_quote;
  var $content_quote1;
  var $content;
  var $sender_ip;
  var $date_time;
  var $content_draft;
  var $content_resource;
  var $hits_count;
  var $comment_count;
  var $user_id;
  var $category_id;

  public function start()
  {
    $this->_setKey($this->_getIndex());
    //$start = $this->_getLimit_start();
    //$start = (isset($start)) ? $start : 10;
    //$this->_setLimit_start($start);

    //$end = $this->_getLimit_end();
    //$end = (isset($end)) ? $end : 0;
    //$this->_setLimit_end(0);

    $sort = $this->_getSort();
    $sort = (isset($sort)) ? $sort : 'desc';
    $this->_setSort($sort);



  }

  public function get_content_value_byid()
  {
    eval('$id = $this->_get'. ucfirst($this->_getIndex()) .'();');

    $query = $this->db->get_where(
      get_class($this),
      array(
        $this->_getIndex() => $id
      )
    );

    return $query->result();

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
   *  delete the user from database
   */
  public function delete_content($id = '')
  {

    $this->db->delete(
      get_class($this), 
      array(
        $this->_getIndex() => $id
      )
    );

  }

  public function get_content_after($category = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      WHERE druid_content.category_id="'. $category .'"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id DESC
      ');
      return $query->result();
  }

  public function get_count_content($category = '')
  {

    $query = $this->db->query('
      SELECT druid_content.content_id
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      WHERE druid_content.category_id="'. $category .'"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id DESC
      ');
      return $query->num_rows();
  }

  public function get_join_data_sticky($category = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank = "-1"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id DESC
      ');
      return $query->result();
  }


  public function get_join_data_content_cat($category = '', $limit = -1, $sort = 'desc', $index = 1)
  {

    $cat_id = 0;

    $this->db->where('category_value', $category);
    $get_cat_id = $this->db->get('druid_category');
    $res_cat = $get_cat_id->result();

    foreach ($res_cat as $key) {
      $cat_id = $key->category_id;
    }

    $category = $cat_id;


    if ($limit > -1) {

      if ($index >= 1) {

        //  DO::  get the index
        //  DO::  get the start set by startset = (limit * index) - (limit - index)
        //  DO::  get the last set by lastset = (limit * index)
        $startset = (($limit * $index) - ($limit - $index) - $index);
        if ($startset <= 0) {
          $startset = 0;
        }
        //echo $startset;
        $endset = $limit;
        //echo $endset;

        $query = $this->db->query('
          SELECT druid_content.*, druid_file.*, druid_category.*
          FROM druid_content
          INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
          INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
          WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
          GROUP BY druid_content.content_id
          ORDER BY druid_content.content_rank '. $sort .'
          LIMIT '. $startset .', '. $endset .'
          ');
        
      }
      else {

        $query = $this->db->query('
          SELECT druid_content.*, druid_file.*, druid_category.*
          FROM druid_content
          INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
          INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
          WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
          GROUP BY druid_content.content_id
          ORDER BY druid_content.content_rank '. $sort .'
          LIMIT '. $limit .'
          ');
      }

    }
    else {
      

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_rank DESC
      ');
    }
      return $query->result();
  }


  public function get_join_data_content($category = '', $limit = -1, $sort = 'desc', $index = 1)
  {

    if ($limit > -1) {

      if ($index >= 1) {

        //  DO::  get the index
        //  DO::  get the start set by startset = (limit * index) - (limit - index)
        //  DO::  get the last set by lastset = (limit * index)
        $startset = (($limit * $index) - ($limit - $index) - $index);
        if ($startset <= 0) {
          $startset = 0;
        }
        //echo $startset;
        $endset = $limit;
        //echo $endset;

        $query = $this->db->query('
          SELECT druid_content.*, druid_file.*, druid_category.*
          FROM druid_content
          INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
          INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
          WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
          GROUP BY druid_content.content_id
          ORDER BY druid_content.date_time '. $sort .'
          LIMIT '. $startset .', '. $endset .'
          ');
        
      }
      else {

        $query = $this->db->query('
          SELECT druid_content.*, druid_file.*, druid_category.*
          FROM druid_content
          INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
          INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
          WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
          GROUP BY druid_content.content_id
          ORDER BY druid_content.date_time '. $sort .'
          LIMIT '. $limit .'
          ');
      }

    }
    else {
      

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      WHERE druid_content.category_id="'. $category .'" AND druid_content.content_rank != "-1"
      GROUP BY druid_content.content_id
      ORDER BY druid_content.date_time DESC
      ');
    }
      return $query->result();
  }

  public function get_smiliar_data_content($title = '', $node = '', $desc = '', $lim = 7)
  {
    $title1 = explode('-', $title);

      $str = 'WHERE druid_content.content_title LIKE "%'. $title .'%"';

    if (count($title1) >= 2) {
      $str = 'WHERE (druid_content.content_title LIKE "%'. $title .'%"';
      foreach ($title1 as $key) {
        $str .= 'OR druid_content.content_title LIKE "%' . $key .'%"'; 
        //$str .= 'OR druid_content.content_title LIKE "%' . $desc .'%"'; 
      }
      $str .= ')';
    }

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      '. $str .'
        AND druid_content.category_id <> 19 
        AND druid_content.category_id <> 22 
        AND druid_content.category_id <> 11 
        AND druid_content.category_id <> 24 
        AND druid_content.category_id <> 23 
        AND druid_content.content_id <> '. $node .'
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id ASC
      LIMIT 0,'. $lim .'
      ');
      
      $res = $query->result();
      $count_res = count($res);

      if ($count_res < 6) {
        // Get Last Content
        $query1 = $this->db->query('
          SELECT druid_content.*, druid_file.*, druid_category.*
          FROM druid_content
          INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
          INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
          WHERE druid_content.category_id <> 19 
          AND druid_content.category_id <> 22 
          AND druid_content.category_id <> 11 
          AND druid_content.category_id <> 24 
          AND druid_content.category_id <> 23 
          AND druid_content.content_id <> '. $node .'
          GROUP BY druid_content.content_id
          ORDER BY druid_content.content_id DESC
          LIMIT 0,'. $lim .'
          ');
        return $query1->result();
      }
      else {
        
        return $query->result();
      }

  }

  public function get_search_data_content($title = '', $start = 0, $end = 10)
  {
    $title1 = explode('-', $title);

      $str = 'WHERE druid_content.content_title LIKE "%'. $title .'%" OR druid_content.content_desc LIKE "%'. $title .'%"';
      $str .= 'OR druid_content.content LIKE "%' . $title .'%"'; 

    if (count($title1) >= 2) {
      $str = 'WHERE (druid_content.content_title LIKE "%'. $title .'%" OR druid_content.content_desc LIKE "%'. $title .'%"';
      foreach ($title1 as $key) {
        $str .= 'OR druid_content.content_title LIKE "%' . $key .'%"'; 
      }
      $str .= ')';
    }

    $query = $this->db->query('
      SELECT 
        druid_content.content_title,
        druid_content.content_desc,
        druid_content.content_id,
        druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      '. $str .'
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id DESC
      LIMIT '. $start .','. $end .'
      ');
      
      $res = $query->result();
      return $res;

  }

  public function count_search_data_content($title = '')
  {
    $title1 = explode('-', $title);

      $str = 'WHERE druid_content.content_title LIKE "%'. $title .'%"';
      $str .= 'OR druid_content.content LIKE "%' . $title .'%"'; 

    if (count($title1) >= 2) {
      $str = 'WHERE (druid_content.content_title LIKE "%'. $title .'%"';
      foreach ($title1 as $key) {
        $str .= 'OR druid_content.content_title LIKE "%' . $key .'%"'; 
      }
      $str .= ')';
    }

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
      INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
      '. $str .'
      GROUP BY druid_content.content_id
      ORDER BY druid_content.content_id DESC
      ');
      
      $res = $query->num_rows();


      return $res;

  }

  public function get_join_data($node = '')
  {

    $query = $this->db->query('
      SELECT druid_content.*, druid_file.*, druid_category.*
      FROM druid_content
      LEFT JOIN druid_file ON druid_content.content_id = druid_file.content_id
      LEFt JOIN druid_category ON druid_category.category_id = druid_content.category_id
      WHERE druid_content.content_id="'. $node .'"
      ORDER BY druid_content.content_id ASC
      ');
      return $query->result();
  }

  /**
   *  Update table user
   */
  public function update_content()
  {
    $id           = $this->_getContent_id();
    $content      = $this->_getContent();
    $title        = $this->_getContent_title();
    $title1       = $this->_getContent_title1();
    $rank         = $this->_getContent_rank();
    $publish      = $this->_getContent_publish();
    $draft        = $this->_getContent_draft();
    $resources    = $this->_getContent_resource();
    $category_id  = $this->_getCategory_id();
    $date_time    = $this->_getDate_time();
    $content_desc    = $this->_getContent_desc();
    $content_desc1    = $this->_getContent_desc1();
    $content_desc2    = $this->_getContent_desc2();
    $content_quote    = $this->_getContent_quote();
    $content_quote1    = $this->_getContent_quote1();


    //  check if exists
    $data = array(
      'content_title'     => $title,
      'content_title1'     => $title1,
      'content_rank'      => $rank,
      'content_publish'   => $publish,
      'content_desc'      => $content_desc,
      'content_desc1'     => $content_desc1,
      'content_desc2'     => $content_desc2,
      'content_quote'     => $content_quote,
      'content_quote1'    => $content_quote1,
      'content'           => $content,
      'sender_ip'         => $_SERVER['REMOTE_ADDR'],
      'date_time'         => $date_time,
      'content_draft'     => $draft,
      'content_resource'  => $resources,
      'hits_count'        => 0,
      'comment_count'     => 0,
      'user_id'           => $this->session->userdata('user_id'),
      'category_id'       => $category_id,
    );

    $this->db->update(get_class($this), $data, array($this->_getIndex() => $id));
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

  /**
   * Get content_rank.
   *
   * @return content_rank.
   */
  function _getContent_rank()
  {
    return $this->content_rank;
  }

  /**
   * Set content_rank.
   *
   * @param content_rank the value to set.
   */
  function _setContent_rank($content_rank = '')
  {
    $this->content_rank = $content_rank;
  }

  /**
   * Get content_publish.
   *
   * @return content_publish.
   */
  function _getContent_publish()
  {
    return $this->content_publish;
  }

  /**
   * Set content_publish.
   *
   * @param content_publish the value to set.
   */
  function _setContent_publish($content_publish = '')
  {
    $this->content_publish = $content_publish;
  }

  /**
   * Get content_title.
   *
   * @return content_title.
   */
  function _getContent_title()
  {
    return $this->content_title;
  }

  /**
   * Set content_title.
   *
   * @param content_title the value to set.
   */
  function _setContent_title($content_title = '')
  {
    $this->content_title = $content_title;
  }

  /**
   * Get content.
   *
   * @return content.
   */
  function _getContent()
  {
    return $this->content;
  }

  /**
   * Set content.
   *
   * @param content the value to set.
   */
  function _setContent($content = '')
  {
    $this->content = $content;
  }

  /**
   * Get sender_ip.
   *
   * @return sender_ip.
   */
  function _getSender_ip()
  {
    return $this->sender_ip;
  }

  /**
   * Set sender_ip.
   *
   * @param sender_ip the value to set.
   */
  function _setSender_ip($sender_ip = '')
  {
    $this->sender_ip = $sender_ip;
  }

  /**
   * Get date_time.
   *
   * @return date_time.
   */
  function _getDate_time()
  {
    return $this->date_time;
  }

  /**
   * Set date_time.
   *
   * @param date_time the value to set.
   */
  function _setDate_time($date_time = '')
  {
    $this->date_time = $date_time;
  }

  /**
   * Get content_resource.
   *
   * @return content_resource.
   */
  function _getContent_resource()
  {
    return $this->content_resource;
  }

  /**
   * Set content_resource.
   *
   * @param content_resource the value to set.
   */
  function _setContent_resource($content_resource = '')
  {
    $this->content_resource = $content_resource;
  }

  /**
   * Get hits_count.
   *
   * @return hits_count.
   */
  function _getHits_count()
  {
    return $this->hits_count;
  }

  /**
   * Set hits_count.
   *
   * @param hits_count the value to set.
   */
  function _setHits_count($hits_count = '')
  {
    $this->hits_count = $hits_count;
  }

  /**
   * Get comment_count.
   *
   * @return comment_count.
   */
  function _getComment_count()
  {
    return $this->comment_count;
  }

  /**
   * Set comment_count.
   *
   * @param comment_count the value to set.
   */
  function _setComment_count($comment_count = '')
  {
    $this->comment_count = $comment_count;
  }

  /**
   * Get category_id.
   *
   * @return category_id.
   */
  function _getCategory_id()
  {
    return $this->category_id;
  }

  /**
   * Set category_id.
   *
   * @param category_id the value to set.
   */
  function _setCategory_id($category_id = '')
  {
    $this->category_id = $category_id;
  }

  /**
   * Get user_id.
   *
   * @return user_id.
   */
  function _getUser_id()
  {
    return $this->user_id;
  }

  /**
   * Set user_id.
   *
   * @param user_id the value to set.
   */
  function _setUser_id($user_id = '')
  {
    $this->user_id = $user_id;
  }

  /**
   * Get content_draft.
   *
   * @return content_draft.
   */
  function _getContent_draft()
  {
    return $this->content_draft;
  }

  /**
   * Set content_draft.
   *
   * @param content_draft the value to set.
   */
  function _setContent_draft($content_draft = '')
  {
    $this->content_draft = $content_draft;
  }
  
  /**
   * Get content_desc.
   *
   * @return content_desc.
   */
  function _getContent_desc()
  {
      return $this->content_desc;
  }
  
  /**
   * Set content_desc.
   *
   * @param content_desc the value to set.
   */
  function _setContent_desc($content_desc = '')
  {
      $this->content_desc = $content_desc;
  }
  
  /**
   * Get content_desc1.
   *
   * @return content_desc1.
   */
  function _getContent_desc1()
  {
      return $this->content_desc1;
  }
  
  /**
   * Set content_desc1.
   *
   * @param content_desc1 the value to set.
   */
  function _setContent_desc1($content_desc1 = '')
  {
      $this->content_desc1 = $content_desc1;
  }
  
  /**
   * Get content_desc2.
   *
   * @return content_desc2.
   */
  function _getContent_desc2()
  {
      return $this->content_desc2;
  }
  
  /**
   * Set content_desc2.
   *
   * @param content_desc2 the value to set.
   */
  function _setContent_desc2($content_desc2 = '')
  {
      $this->content_desc2 = $content_desc2;
  }
  
  /**
   * Get content_quote.
   *
   * @return content_quote.
   */
  function _getContent_quote()
  {
      return $this->content_quote;
  }
  
  /**
   * Set content_quote.
   *
   * @param content_quote the value to set.
   */
  function _setContent_quote($content_quote = '')
  {
      $this->content_quote = $content_quote;
  }
  
  /**
   * Get content_quote1.
   *
   * @return content_quote1.
   */
  function _getContent_quote1()
  {
      return $this->content_quote1;
  }
  
  /**
   * Set content_quote1.
   *
   * @param content_quote1 the value to set.
   */
  function _setContent_quote1($content_quote1 = '')
  {
      $this->content_quote1 = $content_quote1;
  }
  
  /**
   * Get content_title1.
   *
   * @return content_title1.
   */
  function _getContent_title1()
  {
      return $this->content_title1;
  }
  
  /**
   * Set content_title1.
   *
   * @param content_title1 the value to set.
   */
  function _setContent_title1($content_title1 = '')
  {
      $this->content_title1 = $content_title1;
  }
}
