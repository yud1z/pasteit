<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'category.php';

class Search extends Category 
{


  public function index()
  {
    $search = '';
    if (!empty($_GET)) {
      $search = '';
      if (isset($_GET['query'])) {
          $search = $_GET['query'];
      }
    }


    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_search_data_content($search);
    $val = $this->_pure_url($val, 'content_title');

    $val1 = $this->{$this->_getBoot_name() . 'content'}->count_search_data_content($search);

      $data = array(
        'path'            => $this->_getPackage_path(),  
        'cart'            => $this->_cart(),  
        'value'           => $val,  
        'count'           => $val1,  
        'string'          => $search,  
      );
      $this->parser->parse('search', $data);

  }


  public function ajax($method = '')
  {
    if ($method == 'find') {
      $this->_find();
    }
    else {
      echo '';
    }
  }

  public function _find()
  {
    $search = '';
    if (!empty($_POST)) {
      $search = '';
      if (isset($_POST['string'])) {
          $search = $_POST['string'];
      }
    }

    if (!isset($_POST['start'])) {
      $_POST['start'] = '1';
    }

    $arg = $_POST['start'];

    $nopage = (isset($arg)) ? $arg : 1;
    $dataPerPage = 10;
    $offset = ($nopage - 1) * $dataPerPage;
    $wew = $offset - 10;

    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_search_data_content($search, $wew, $offset);
    $val = $this->_pure_url($val, 'content_title');
    echo json_encode($val);
  }


}

