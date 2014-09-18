<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *  Get user of database model
 *  just 5 method namespace in here
 *  check_
 *  get_
 *  unsert_
 *  update_
 *  delete_
 **/
class Data extends CI_Model
{

  var $key;
  var $limit_start;
  var $limit_end;
  var $sort = 'desc';

  var $table;
  var $node;

  var $counter;

  var $where;
  var $where_table;
  var $where_val;

  var $index;


    function __construct()
    {

    $wel = get_object_vars($this);

    reset($wel);
    $this->_setIndex(key($wel));

        // Call the Model constructor
        parent::__construct();
    }

  public function start()
  {}


  /**
   *  get all row count from database
   */
  public function get_data()
  {
    $this->start();
    return $this->get_data_all();
    
  }

  /**
   *  by pass for get data
   */
  public function get_data_all()
  {

    $key = $this->_getKey();
    $start = $this->_getLimit_start();
    $end = $this->_getLimit_end();
    $sort = $this->_getSort();

    $where = $this->_getWhere();

    if ($where == true) {

      $where_table  = $this->_getWhere_table();
      $where_val    = $this->_getWhere_val();

      $this->db->order_by($key, $sort); 
      $query = $this->db->get_where(get_class($this),array($where_table => $where_val), $start, $end);
      return $query->result();

    }
    else {

      $this->db->order_by($key, $sort); 
      $query = $this->db->get(get_class($this), $start, $end);
      return $query->result();


    }


    //echo '<hr>';
    //echo $start;
    //echo '<br>';
    //echo $end;
    //echo '<hr>';


  
  }

  /**
   *  get all row count from database
   */
  public function get_row()
  {
    $query = $this->db->get(get_class($this));
    $this->_setCounter($query->num_rows());
    return $query->num_rows();
    
  }

  /**
   * Get key.
   *
   * @return key.
   */
  function _getKey()
  {
      return $this->key;
  }
  
  /**
   * Set key.
   *
   * @param key the value to set.
   */
  function _setKey($key = '')
  {
      $this->key = $key;
  }
  
  /**
   * Get limit_start.
   *
   * @return limit_start.
   */
  function _getLimit_start()
  {
      return $this->limit_start;
  }
  
  /**
   * Set limit_start.
   *
   * @param limit_start the value to set.
   */
  function _setLimit_start($limit_start = '')
  {
      $this->limit_start = $limit_start;
  }
  
  /**
   * Get limit_end.
   *
   * @return limit_end.
   */
  function _getLimit_end()
  {
      return $this->limit_end;
  }
  
  /**
   * Set limit_end.
   *
   * @param limit_end the value to set.
   */
  function _setLimit_end($limit_end = '')
  {
      $this->limit_end = $limit_end;
  }
  
  /**
   * Get sort.
   *
   * @return sort.
   */
  function _getSort()
  {
      return $this->sort;
  }
  
  /**
   * Set sort.
   *
   * @param sort the value to set.
   */
  function _setSort($sort = '')
  {
      $this->sort = $sort;
  }
  
  /**
   * Get table.
   *
   * @return table.
   */
  function _getTable()
  {
      return $this->table;
  }
  
  /**
   * Set table.
   *
   * @param table the value to set.
   */
  function _setTable($table = '')
  {
      $this->table = $table;
  }
  
  /**
   * Get node.
   *
   * @return node.
   */
  function _getNode()
  {
      return $this->node;
  }
  
  /**
   * Set node.
   *
   * @param node the value to set.
   */
  function _setNode($node = '')
  {
      $this->node = $node;
  }
  
  /**
   * Get counter.
   *
   * @return counter.
   */
  function _getCounter()
  {
      return $this->counter;
  }
  
  /**
   * Set counter.
   *
   * @param counter the value to set.
   */
  function _setCounter($counter = '')
  {
      $this->counter = $counter;
  }
  
  /**
   * Get where.
   *
   * @return where.
   */
  function _getWhere()
  {
      return $this->where;
  }
  
  /**
   * Set where.
   *
   * @param where the value to set.
   */
  function _setWhere($where = '')
  {
      $this->where = $where;
  }
  
  /**
   * Get where_table.
   *
   * @return where_table.
   */
  function _getWhere_table()
  {
      return $this->where_table;
  }
  
  /**
   * Set where_table.
   *
   * @param where_table the value to set.
   */
  function _setWhere_table($where_table = '')
  {
      $this->where_table = $where_table;
  }
  
  /**
   * Get where_val.
   *
   * @return where_val.
   */
  function _getWhere_val()
  {
      return $this->where_val;
  }
  
  /**
   * Set where_val.
   *
   * @param where_val the value to set.
   */
  function _setWhere_val($where_val = '')
  {
      $this->where_val = $where_val;
  }
  
  /**
   * Set index.
   *
   * @param index the value to set.
   */
  function _setIndex($index = '')
  {
      $this->index = $index;
  }
  
  /**
   * Get index.
   *
   * @return index.
   */
  function _getIndex()
  {
      return $this->index;
  }

}
