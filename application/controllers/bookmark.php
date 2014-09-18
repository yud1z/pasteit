<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('category.php');

class Bookmark extends category {

  public function index()
  {
        $session_id = $this->session->userdata('session_id');

        $query = $this->db->get_where(
          'druid_bookmark', 
          array(
            'bookmark_session' => $session_id
          ));
        $result = $query->result();

      $data = array(
        'path'            => $this->_getPackage_path(),  
        'cart'            => $this->_cart(),  
        'bookmark'        => $result,  
      );
      $this->parser->parse('bookmark', $data);
    
  }

  public function ajax($arg = '')
  {
    //  get the session php
        $session_id = $this->session->userdata('session_id');
    //  get the url
        if ($_POST) {
          
        $url = $_POST['url'];

        //  check into dabase from the exists of user session and the url
        $query = $this->db->get_where(
          'druid_bookmark', 
          array(
            'bookmark_session' => $session_id,
            'bookmark_url' => $url
          ));
        $result = $query->result();
        if (empty($result)) {
          
    //  if ekxists so dont add
    //  insert into database
        $data = array(
          'bookmark_session' => $session_id,
          'bookmark_url' => $url,
        );

        $this->db->insert('druid_bookmark', $data); 
        }

        }
  }

}
