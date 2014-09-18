<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('page.php');

class Category extends Page {

  var $single;
  var $single_category;
  var $single_node;
  var $single_title;


  public function _before() {

    $this->load->add_package_path(APPPATH.'third_party/'. $this->_getPackage() .'/');
    $data = array(
      'path'          => $this->_getPackage_path(),  
      'menu'          => $this->menu()->render(),  
      'menu_tiny'     => $this->menu()->render_tiny(),  
      'skyrep_start'  => $this->_skyrep('start'),  
      'skyrep_end'    => $this->_skyrep('end'),  
      'menu_login'    => $this->_menu_login(),  
      'cart' => $this->_cart(),  
    );
    $this->parser->parse('header', $data);
    //$this->parser->parse('topbar', $data);
  }

  /**
   * For Sticky content
   */
  public function _sticky($category = '', $node = '', $title = '')
  {
    //  convert category into category id
    $this->load->model($this->_getBoot_name() . 'category');
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($category);
    $cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval($category);
    $cat = $cat[0]->category_id;

    $this->load->model($this->_getBoot_name() . 'content');
    $count = $this->{$this->_getBoot_name() . 'content'}->get_count_content($cat);

    if ($count == 1 ) {

      $val = $this->{$this->_getBoot_name() . 'content'}->get_content_after($cat);
      $val3 = $this->_convert_url($val, 'content_title');
      $val3 = $this->_date_hour($val3, 'date_time');
      $val3 = $val3[0];
      $this->_setSingle(true);
      $this->_setSingle_category($val3->category_value);
      $this->_setSingle_title($val3->content_title);
      $this->_setSingle_node($val3->content_id);


    }
    else {
      $val = $this->{$this->_getBoot_name() . 'content'}->get_join_data_sticky($cat);
      $val3 = $this->_convert_url($val, 'content_title');
      $val3 = $this->_date_hour($val3, 'date_time');

    }
    //opn($val3);
    $this->output->enable_profiler(FALSE);
    return $val3;

  }

  /**
   *  For the Archive page
   */
  public function _archive($category = '', $node = '', $title = '')
  {
    //  convert category into category id
    $this->load->model($this->_getBoot_name() . 'category');
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($category);
    $cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval($category);
    if (!empty($cat)) {
      
    $cat = $cat[0]->category_id;

    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content($cat);
    $val3 = $this->_convert_url($val, 'content_title');
    $val3 = $this->_wordy($val3, 'content_title', 25);
    $val3 = $this->_wordy($val3, 'content_desc', 80);
    $val3 = $this->_date_hour($val3, 'date_time');
    }
    else {
      $val3 = array();
    }

    return $val3;


  }

  /**
   *  For the Single page out of outomation
   */
  public function _single($category = '', $node = '', $title = '')
  {
    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_join_data($node);
    $val3 = $this->_convert_url($val, 'content_title');
    $val3 = $this->_date_hour($val3, 'date_time');
    $val4 = array();
    if (!empty($val3[1])) {
      $val4[0] = $val3[1];
    }
    else {
      $val4[0] = $val3[0];
    }
    $sim = $this->_similiar($title, $node, $val4[0]->content_desc);
    $sim1[] = $sim[0];
    array_shift($sim);

    $this->image_cache($sim, 86, 70, true,'image_strip');


    $this->load->model('druid_ads');
    $ads = $this->druid_ads->get_all_ads();



    //  modified the array here
    //  to set the url and the image

    $similiar_new = array();

    foreach ($sim as $modifier_key) {

      $modifier_key->full_url = '/category/page/'. $modifier_key->category_value .'/'. $modifier_key->content_id .'/'. $modifier_key->url;

    }


    $data = array(
      'path'            => $this->_getPackage_path(),  
      'cart'            => $this->_cart(),  
      'footbar_produk'  => $this->_random_produk(),  
      'footbar'         => $sim1,  
      'footbar1'        => $sim,  
      'value'           => $val4,
      'category'        => $category,
      'category_url'    => 'category/page/' . $category,  
      'ads'             => $ads,  
      'similiar_produk' => $this->similiar_produk(),  
      'all_url'         => 'http://anandacaitra.com/' . $_SERVER['REQUEST_URI'],  
    );
    $this->parser->parse('single', $data);
    // get the semantic by title
    // get the title
    // get the image
    // get the desc
    // get the title
    //$this->parser->parse('footbar', $data);
  }

  /**
   *  For url to single Page
   */
  public function page($category = '', $node = '', $title = '')
  {

    //  if archived
    if ($node == '' && $title == '') {
      $val3 = $this->_sticky($category, $node, $title);
      $val4 = $this->_archive($category, $node, $title);

      //opn($val4);

      $arr = $val4;
      $alay1 = array();
      $alay2 = array();
      $alay3 = array();

      if (!empty($arr)) {
        
      $cols = array_chunk($arr, ceil(count($arr)/3));
      for ($i=0, $n=count($cols[0]); $i<$n; $i++) {
        $alay1[] = $cols[0][$i];
        if (isset($cols[1][$i])) $alay2[] = $cols[1][$i];
        if (isset($cols[2][$i])) $alay3[] = $cols[2][$i];
      }


      $single = $this->_getSingle();

      if ($single == true) {
        $category = $this->_getSingle_category();
        $node = $this->_getSingle_node();
        $title = $this->_getSingle_title();
        $this->_single($category, $node, $title); 
      }
      else {
        //opn($val4);
        
        //  get the child menu from this
  
        $categ = '/category/page/' . $category;

        //  search in db, where category means it
        $this->db->where('menu_url', $categ); 
        $query_cat = $this->db->get('druid_menu');
        $parent = $query_cat->result();

        $sep_menu = array();
        $merge_val = array();
        
        //if (!empty($parent)) {

        //$parent = $parent[0]->menu_parent;
        //$this->db->where('menu_parent', $parent); 
        //$query_cat1 = $this->db->get('druid_menu');
        //$all_menu = $query_cat1->result();


        //$sep_menu = array();
        //$merge_val = array();
        
        //$k = 0;
        //$count_menu = count($all_menu);
        //$url = $_SERVER['REQUEST_URI'];

        //foreach ($all_menu as $index_menu => $loop_menu) {
          //$k--;

          ////  DO::make add the description and the object in here
          ////  DO::convert the url into the category
          //$category = explode('/', $loop_menu->menu_url);
          //$category = end($category);

          ////  DO::get the content based on the category
          //$val5 = $this->_archive($category, $node, $title);
          //$this->image_cache($val5, 300, 250, true,'image_strip');
          //$merge_val[] = $val5; 

          ////opn($loop_menu);

          //if ($loop_menu->menu_url == $url) {
            //$loop_menu->menu_tab = 'checked';
          //}
          //else {
            //$loop_menu->menu_tab = '';
          //}
          //$sep_menu[] = $loop_menu;
        //}



        //}
        //else {

          $val5 = $this->_archive($category, $node, $title);
          $this->image_cache($val5, 300, 250, true,'image_strip');
          $merge_val[] = $val5;         

          //}



        //opn($sep_menu);

        $data = array(
          'path'        => $this->_getPackage_path(),  
          'sticky'      => $val3,  
          'sticky1'     => $val3,  
          'cart'        => $this->_cart(),  
          'value'       => $val4,
          'kolom1'      => $alay1,
          'kolom2'      => $alay2,
          'kolom3'      => $alay3,
          'cart'        => $this->_cart(),  
          'menu_child'  => $sep_menu,  
          'value_tab'   => $merge_val,  
        );
        $this->parser->parse('archive', $data);
      }
      }
      else {
        $data = array(
          'path' => $this->_getPackage_path(),  
        );
        $this->parser->parse('empty', $data);

      }

    }
    //  if single
    else {
      $this->_single($category, $node, $title);
    }

  }

  /**
   *  footer for viewer
   */
  public function _after() {
    $val4 = $this->image_cache($this->special(), 220, 160);
    $val4 = $this->_convert_url($val4, 'content_title');


    $this->db->join('druid_file', 'druid_content.content_id = druid_file.content_id');
    $this->db->join('druid_category', 'druid_category.category_id = druid_content.category_id');

    $this->db->group_by('druid_content.content_id'); 

    $this->db->limit(3);
    $this->db->order_by('druid_content.date_time', 'desc');
    $this->db->where('druid_category.category_value !=', 'slide');
    $has_val1 = $this->db->get('druid_content');

    $hasil_val1 = $has_val1->result();
    $this->image_cache($hasil_val1, 300, 250, true,'image_strip');
    $this->_convert_url($hasil_val1, 'content_title');


    $this->db->join('druid_file', 'druid_content.content_id = druid_file.content_id');
    $this->db->join('druid_category', 'druid_category.category_id = druid_content.category_id');

    $this->db->group_by('druid_content.content_id'); 

    $this->db->limit(3,3);
    $this->db->order_by('druid_content.date_time', 'desc');
    $this->db->where('druid_category.category_value !=', 'slide');
    $has_val2 = $this->db->get('druid_content');

    $hasil_val2 = $has_val2->result();
    $this->image_cache($hasil_val2, 300, 250, true,'image_strip');
    $this->_convert_url($hasil_val2, 'content_title');


    $data = array(
      'path' => $this->_getPackage_path(),  
      'special_offer' => $val4,  
      'special_offer_mobile' => $val4,  
		  'value_scroll'          => $hasil_val1,  
		  'value_scroll1'          => $hasil_val2,  
    );
    $this->parser->parse('footer', $data);
  }

  /**
   * Get single.
   *
   * @return single.
   */
  function _getSingle()
  {
    return $this->single;
  }

  /**
   * Set single.
   *
   * @param single the value to set.
   */
  function _setSingle($single = '')
  {
    $this->single = $single;
  }

  /**
   * Get single_category.
   *
   * @return single_category.
   */
  function _getSingle_category()
  {
    return $this->single_category;
  }

  /**
   * Set single_category.
   *
   * @param single_category the value to set.
   */
  function _setSingle_category($single_category = '')
  {
    $this->single_category = $single_category;
  }

  /**
   * Get single_node.
   *
   * @return single_node.
   */
  function _getSingle_node()
  {
    return $this->single_node;
  }

  /**
   * Set single_node.
   *
   * @param single_node the value to set.
   */
  function _setSingle_node($single_node = '')
  {
    $this->single_node = $single_node;
  }

  /**
   * Get single_title.
   *
   * @return single_title.
   */
  function _getSingle_title()
  {
    return $this->single_title;
  }

  /**
   * Set single_title.
   *
   * @param single_title the value to set.
   */
  function _setSingle_title($single_title = '')
  {
    $this->single_title = $single_title;
  }
}
