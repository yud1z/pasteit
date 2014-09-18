<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('boot.php');

/**
 * @class Page 
 * @abstract description 
 * 
 * @uses Boot
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Page extends Boot {

  /**
   *  header for viewer 
   */


  /**
   * @function _menu_login 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _menu_login()
  {
    
    if ($this->session->userdata('user_level')) {
      return true;
      //return '
//<div class="two columns mt8 mskrepos">
//<a href="/setting" class="langgan">Settings</a>
//</div>
//<div class="two columns mt8 msikrep">
//<a href="/logout" class="masuk">Sign Out</a>
//</div>
        //';

    }
    else {
      return false;
      //return '
//<div class="two columns mt8 mskrepos">
//<a href="/register" class="langgan">Sign Up</a>
//</div>
//<div class="two columns mt8 msikrep">
//<a href="/login" class="masuk">Sign In</a>
//</div>
        //';

    }
  }

  /**
   * @function similiar_produk 
   * @abstract description 
   * 
   * @param string $code 
   * @access public
   * @return void
   */
  public function similiar_produk($code = '')
  {
    $category = 'produk';
    $this->load->model($this->_getBoot_name() . 'category');
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($category);
    $cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval($category);

    if (!empty($cat)) {
      

    $cat = $cat[0]->category_id;

    $this->load->model($this->_getBoot_name() . 'produk');
    $val = $this->{$this->_getBoot_name() . 'produk'}->get_join_data_random($cat, 3, $code);
    $val3 = $this->_convert_url($val, 'content_title');
    $this->image_cache($val3, 288, 273, true,'image_strip');
      $val4 = array();

      foreach ($val3 as $key) {

        $key->produk_harga = $this->_rupiah($key->produk_harga);

        $val4[] = $key;

      }
    }
    else {
      $val3 = array();
    }
    return $val3;
  }

  /**
   * @function _cart 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _cart()
  {

    $cart = '';

    //$user_id = $this->session->userdata('user_id');

    //if ($user_id) {

      ////  get the logic of the cart
      ////  get the quantity
      ////  get the full sum price of all
      ////  get the link


      //$user_id = $this->session->userdata('user_id');
      //$this->load->model($this->_getBoot_name() . 'order');
      //$val = $this->{$this->_getBoot_name() . 'order'}->get_order_by_user_id($user_id);
      //if (empty($val)) {
        ////  insert into order
        //$data = array(
          //'order_berat' => 0,
          //'order_harga' => 0,
          //'user_id'     => $user_id,
        //);
        //$this->db->insert($this->_getBoot_name() . 'order', $data);
        //$order_id = $this->db->insert_id();
      //}
      //else {
        //$val = $val[0];
        //$order_id = $val->order_id;
      //}

      //$this->load->model($this->_getBoot_name() . 'checkout');
      //$val1 = $this->{$this->_getBoot_name() . 'checkout'}->get_data_produk($order_id);
      //if (!empty($val1)) {


        //$kuantitas = 0;

        //foreach ($val1 as $key8) {

          //$kuantitas += $key8->checkout_quantity;
        //}


        //$val2 = $val1[0]->order_harga;

        //$data = array(
          //'path' => $this->_getPackage_path(),  
          //'val' => $val1,  
          //'order_harga' => $val2,  
        //);

        ////$cart = '
          ////<div class="cart">
          ////<div class="catem">
          ////<b>
          ////<a href="/checkout" title="Your Cart"><u><div style="font-size:10px;margin-bottom:-10px;margin-top:-2px;">'. $this->_rupiah($val->order_harga) .'</div></u>
          ////</b>
          ////<br>
          ////<b>'. $kuantitas .'</b> items</a>

          ////</div>
          ////</div>	
          ////';
        //$cart = $kuantitas;

        ////opn($val);
      //}
      //else {

        //$data = array(
          //'path' => $this->_getPackage_path(),  
          //'val' => array(),  
          //'order_harga' => '',  
        //);

        $cart = '
          ';



    //}










    //}

    return $cart;

  }

  /**
   * @function _tweet 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _tweet(){
    $xml = simplexml_load_file('tweet.xml');  
    $tweet = $xml[0];
    $tweet = preg_replace("/@(\w+)/i", "<a href=\"http://twitter.com/$1\" target='_blank'>$0</a>", $tweet);
    $tweet = preg_replace("/#(\w+)/i", "<a href=\"https://twitter.com/search?q=%23$1\" target='_blank'>$0</a>", $tweet);
    return $tweet;
  }
  
  /**
   * @function _before 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _before() {

    $this->load->add_package_path(APPPATH.'third_party/'. $this->_getPackage() .'/');
    $data = array(
		  'path'          => $this->_getPackage_path(),  
		  'menu'          => $this->menu()->render(),  
		  'menu_tiny'     => $this->menu()->render_tiny(),  
		  'skyrep_start'  => '',  
		  'skyrep_end'    => '',  
		  'menu_login'    => $this->_menu_login(),  
		  'head'          => 1,  
		  'cart'          => $this->_cart(),  
		  );
    $this->parser->parse('header', $data);
    //$this->parser->parse('topbar', $data);
  }

  /**
   * @function _convert_url 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _convert_url($array = array(), $arg = '')
  {
    $val3 = array();
    foreach ($array as $key) {
      $key->url = url_title($key->{$arg});
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   * @function _wordy 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @param int $length 
   * @param mixed $ellipe 
   * @param mixed $strip 
   * @access public
   * @return void
   */
  public function _wordy($array = array(), $arg = '', $length = 0, $ellipe = true, $strip = true)
  {
    $val3 = array();
    foreach ($array as $key) {
      $key->{$arg . '_trim'} = $this->_trim_text($key->{$arg}, $length, $ellipe, $strip);
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   * @function _condition_height 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _condition_height($array = array(), $arg = '')
  {
    $val3 = array();
    foreach ($array as $key) {
      $k = $key->{$arg};
      if ($k < 200) {
	$key->content_desc = '';
      }
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   * @function _pure_url 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _pure_url($array = array(), $arg = '')
  {
    $val3 = array();
    foreach ($array as $key) {
      $t = $key->category_value;
      if ($t == 'produk') {
        $key->pure_url = '/produk/detail/' . 
          $t . 
          '/' . 
          $key->content_id . 
          '/' . 
          url_title($key->{$arg});
      }
      else {
        $key->pure_url = '/category/page/' . 
          $t . 
          '/' . 
          $key->content_id . 
          '/' . 
          url_title($key->{$arg});
      }
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   *  Get Special Offer
   */
  public function special()
  {
    $val3 = array();

    $category = 'special_offer';
    //  convert category into category id
    $this->load->model($this->_getBoot_name() . 'category');
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($category);
    $cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval($category);

    if (!empty($cat)) {
      

    $cat = $cat[0]->category_id;

    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content($cat);
    $val3 = $this->_convert_url($val, 'content_title');
    }

    return $val3;
  }

  /**
   *  Caching the images
   */
  public function image_cache($array = array(), $width = 0, $height = 0, $cond = true, $name = 'image_cache')
  {
    $val3 = array();
    if ($cond == true) {
      
      foreach ($array as $key) {
        eval('$key->'. $name .' = $this->image($key->file_folder . $key->file_name, $width, $height);');
        $val3[] = $key;
      }
    }
    else {
      foreach ($array as $key) {
        eval('$key->'. $name .' = $key->file_folder . $key->file_name;');
        $val3[] = $key;
      }

    }
    return $val3;
  }

  /**
   * @function _convert_rupiah 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _convert_rupiah($array = array(), $arg = '')
  {
    $val3 = array();
    foreach ($array as $key) {
      $key->{$arg . '_rupiah'} = $this->_rupiah($key->{$arg});
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   * @function _date_hour 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _date_hour($array = array(), $arg = '')
  {
    $val3 = array();
    foreach ($array as $key) {
      $key->{$arg . '_hour'} = date("d M Y", strtotime($key->{$arg}));
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   * @function _image_size 
   * @abstract description 
   * 
   * @param array $array 
   * @param string $arg 
   * @param string $arg1 
   * @access public
   * @return void
   */
  public function _image_size($array = array(), $arg = '', $arg1 = '')
  {
    $val3 = array();
    foreach ($array as $key) {
      $key->{$arg . '_width'} = $this->_get_dimension('width', $key->{$arg} . $key->{$arg1});
      $key->{$arg . '_height'} = $this->_get_dimension('height', $key->{$arg} . $key->{$arg1});
      $val3[] = $key;
    }
    return $val3;
  }

  /**
   * @function _get_dimension 
   * @abstract description 
   * 
   * @param string $type 
   * @param string $filename 
   * @access public
   * @return void
   */
  public function _get_dimension($type = 'width', $filename = '')
  {

    $val = getimagesize($filename);

    switch ($type) {
    case 'width':
      return $val[0];
      break;
    case 'height':
      return $val[1];
      break;
    }
  
  }

  /**
   * http://www.ebrueggeman.com/blog/abbreviate-text-without-cutting-words-in-half
   * trims text to a space then adds ellipses if desired
   * @param string $input text to trim
   * @param int $length in characters to trim to
   * @param bool $ellipses if ellipses (...) are to be added
   * @param bool $strip_html if html tags are to be stripped
   * @return string 
   */
  function _trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
      $input = strip_tags($input);
    }

    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
      return $input;
    }

    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);

    //add ellipses (...)
    if ($ellipses) {
      $trimmed_text .= '...';
    }

    return $trimmed_text;
  }

  /**
   *  For the Archive page
   */
  public function _archive($category = '', $node = '', $title = '', $limit = -1, $sort = 'desc', $index = 1)
  {
    //  convert category into category id
    $this->load->model($this->_getBoot_name() . 'category');
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($category);
    $cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval($category);
    if (!empty($cat)) {
      
    $cat = $cat[0]->category_id;

    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content($cat, $limit, $sort, $index);
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
   *  the content
   */
  public function index()
  {

    $this->load->model($this->_getBoot_name() . 'category');
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value('slide');
    $cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval('slide');
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

    $this->load->model($this->_getBoot_name() . 'content');
    $narasi_bhs = $this->{$this->_getBoot_name() . 'content'}->get_join_data(121);
    $narasi_en = $this->{$this->_getBoot_name() . 'content'}->get_join_data(122);
    $slider = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content_cat('front_slider');
    $marketing_list = $this->{$this->_getBoot_name() . 'content'}->get_join_data_content_cat('marketing_list');
    //opn($slider);

    $data = array(
		  'path'                  => $this->_getPackage_path(),  
      'narasi_bhs'            => $narasi_bhs,
      'narasi_en'             => $narasi_en,
      'front_slider'          => $slider,
      'marketing_list'        => $marketing_list,
		  );
    $this->parser->parse('front', $data);

  }

  /**
   *  Get the random Produk
   */
  public function _random_produk()
  {
  
    //$this->load->model($this->_getBoot_name() . 'produk');
    //$val = $this->{$this->_getBoot_name() . 'produk'}->get_random_produk();

    //$val4 = $this->image_cache($val, 100, 120);
    //$val4 = $this->_convert_url($val4, 'content_title');
    //$val4 = $this->_convert_rupiah($val4, 'produk_harga');
    $val4 = array();
    return $val4;
  }

  /**
   *  Get the random Produk
   */
  public function _random_produk_4()
  {
  
    $this->load->model($this->_getBoot_name() . 'produk');
    $val = $this->{$this->_getBoot_name() . 'produk'}->get_random_produk_4();

    $val4 = $this->image_cache($val, 100, 120);
    $val4 = $this->_convert_url($val4, 'content_title');
    $val4 = $this->_convert_rupiah($val4, 'produk_harga');
    return $val4;
  }

  /**
   * Get similiar content
   */
  public function _similiar($title = '', $node = '', $lim = 0)
  {

    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_smiliar_data_content($title, $node);

    $val4 = $this->image_cache($val, 460, 345, false);
    $val4 = $this->_convert_url($val4, 'content_title');
    return $val4;
  
  }

  /**
   * Get similiar content
   */
  public function _similiar_lim($title = '', $node = '', $lim = 0)
  {

    $this->load->model($this->_getBoot_name() . 'content');
    $val = $this->{$this->_getBoot_name() . 'content'}->get_smiliar_data_content($title, $node, $lim, $lim);

    $val4 = $this->image_cache($val, 460, 345, false);
    $val4 = $this->_convert_url($val4, 'content_title');
    return $val4;
  
  }

  /**
   * @function _page_tab 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _page_tab(){

    //$data = ($this->_archive($_POST['cat_t'], '', '', 3, 'desc', $_POST['index_t']));
    $index = $_POST['index_t'];
    $limit = 3;

        $startset = (($limit * $index) - ($limit - $index) - $index);
        if ($startset <= 0) {
          $startset = 0;
        }
        //echo $startset;
        $endset = $limit;

        $query = $this->db->query('
          SELECT druid_content.*, druid_file.*, druid_category.*
          FROM druid_content
          INNER JOIN druid_file ON druid_content.content_id = druid_file.content_id
          INNER JOIN druid_category ON druid_category.category_id = druid_content.category_id
          WHERE druid_content.content_rank != "-1"
          AND druid_category.category_value != "slide"
          GROUP BY druid_content.content_id
          ORDER BY druid_content.date_time DESC
          LIMIT '. $startset .', '. $endset .'
          ');

        $data = $query->result();


    $this->image_cache($data, 300, 250, true,'image_strip');
        $this->_convert_url($data, 'content_title');

    $new = array();
    foreach ($data as $key) {

      unset($key->content);
      unset($key->content_title1);
      unset($key->category_id);
      unset($key->content_desc1);
      unset($key->content_desc2);
      unset($key->content_quote);
      unset($key->content_quote1);
      unset($key->sender_ip);
      unset($key->date_time);
      unset($key->content_draft);
      unset($key->content_resource);
      unset($key->hits_count);
      unset($key->comment_count);
      unset($key->user_id);
      unset($key->file_id);
      unset($key->file_extension);
      unset($key->file_preview);
      unset($key->file_name);
      unset($key->file_folder);
      unset($key->file_desc);
      unset($key->content_title_trim);
      unset($key->content_desc_trim);
      unset($key->date_time_hour);
      unset($key->content_publish);
      unset($key->content_rank);
      $new[] = $key;

    }

    echo json_encode($new);

    
  }

  /**
   * @function ajax 
   * @abstract description 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function ajax($arg = '')
  {
    if ($arg == 'custom.css') {
      $this->_custom_css();
    }
    elseif ($arg == 'page_front') {
      $this->_page_front();
    }
    elseif ($arg == 'page_tab') {
      $this->_page_tab();
    }
    elseif ($arg == 'ongkir') {
      $this->_ongkir();
    }
    else {
      echo '';
    }
  }

  /**
   * @function _ongkir 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _ongkir()
  {
   $this->load->model('druid_ongkir'); 
   $prel = $this->druid_ongkir->get_shipping_fee($_POST['ongkir_id']);
   if (!empty($prel)) {
     $prel = $prel[0];
   }
   else {
     $prel = array();
   }
   echo json_encode($prel);
  }

  /**
   * @function _page_front 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _page_front()
  {
    $data = ($this->_archive($_POST['cat_t'], '', '', 4, 'desc', $_POST['index_t']));
    $this->image_cache($data, 220, 165, true,'image_strip');

    $new = array();
    foreach ($data as $key) {

      unset($key->content);
      unset($key->content_title1);
      unset($key->category_id);
      unset($key->content_desc1);
      unset($key->content_desc2);
      unset($key->content_quote);
      unset($key->content_quote1);
      unset($key->sender_ip);
      unset($key->date_time);
      unset($key->content_draft);
      unset($key->content_resource);
      unset($key->hits_count);
      unset($key->comment_count);
      unset($key->user_id);
      unset($key->file_id);
      unset($key->file_extension);
      unset($key->file_preview);
      unset($key->file_name);
      unset($key->file_folder);
      unset($key->file_desc);
      unset($key->content_title_trim);
      unset($key->content_desc_trim);
      unset($key->date_time_hour);
      unset($key->content_publish);
      unset($key->content_rank);
      $new[] = $key;

    }

    echo json_encode($new);


    //  TODO::  get the POST data
    //  TODO::  get the index of position page
    //  TODO::  get the category
    //  TODO::  get 4 content from the category
    //  TODO::  set it by json
    //  TODO::  if empty show error "end value"
  }

  /**
   * @function _get_second_image 
   * @abstract description 
   * 
   * @param array $array 
   * @access public
   * @return void
   */
  public function _get_second_image($array = array())
  {  
    //get second image
    $this->load->model($this->_getBoot_name() . 'file');

    $val = array();

    foreach ($array as $key) {
      $this->{$this->_getBoot_name() . 'file'}->_setContent_id($key->content_id);
      $val1 = $this->{$this->_getBoot_name() . 'file'}->get_content_value_bycontentid();
      if (!empty($val1[1])) {
        $key->second_image = $val1[1]; 
      }
      $val[] = $key;
    }
    return $val;
  }

  /**
   * @function _custom_css 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _custom_css()
  {


    //load the data
    $this->load->model($this->_getBoot_name() . 'slide');
    $val = $this->{$this->_getBoot_name() . 'slide'}->get_join_data();
    header("Content-type: text/css; charset: UTF-8");

    echo '
.demo-1 .sl-slider-wrapper {
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}

.demo-2 .sl-slider-wrapper {
	width: 100%;
	height: 600px;
	overflow: hidden;
	position: relative;
}

.demo-2 .sl-slider h2,
.demo-2 .sl-slider blockquote {
	padding: 100px 30px 10px 30px;
	width: 80%;
	max-width: 960px;
	color: #fff;
	margin: 0 auto;
	position: relative;
	z-index: 100;
}

.demo-2 .sl-slider h2 {
	font-size: 100px;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.2);
}

.demo-2 .sl-slider blockquote {
	font-size: 28px;
	padding-top: 10px;
	font-weight: 300;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.2);
}

.demo-2 .sl-slider blockquote cite {
	font-size: 16px;
	font-weight: 700;
	font-style: normal;
	text-transform: uppercase;
	letter-spacing: 5px;
	padding-top: 30px;
	display: inline-block;
}

.demo-2 .bg-img {
	padding: 200px;
	-webkit-box-sizing: content-box;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	position: absolute;
	top: -200px;
	left: -200px;
	width: 100%;
	height: 100%;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	background-size: cover;
	background-position: center center;
}

/* Custom navigation arrows */

.nav-arrows span {
	position: absolute;
	z-index: 2000;
	top: 50%;
	width: 40px;
	height: 40px;
	
	text-indent: -90000px;
	margin-top: -40px;
	cursor: pointer;
	

}

.nav-arrows span:hover {
	width:68px;
	height:57px;
}

.nav-arrows span.nav-arrow-prev {
	left: 0;
	
	background:url(/'. $this->_getPackage_path() .'files/images/arrowp.png) no-repeat;
	border-right: none;
	border-top: none;
	width:68px;
	height:57px;
	z-index:10;
}

.nav-arrows span.nav-arrow-next {
	
	background:url(/'. $this->_getPackage_path() .'files/images/arrow.png) no-repeat;
	right: 0;
	width:68px;
	height:57px;
	border-left: none;
	border-bottom: none;
	z-index:10;
}

/* Custom navigation dots */

.nav-dots {
	text-align: center;
	position: absolute;
	bottom: 2%;
	height: 30px;
	width: 100%;
	left: 0;
	z-index: 1000;
}

.nav-dots span {
	display: inline-block;
	position: relative;
	width: 16px;
	height: 16px;
	border-radius: 50%;
	margin: 3px;
	background: #fff;
	
	cursor: pointer;
	box-shadow: 
		0 1px 1px rgba(255,255,255,0.4), 
		inset 0 1px 1px rgba(0,0,0,0.1);
}

.demo-2 .nav-dots span {
	background: rgba(150,150,150,0.1);
	margin: 6px;
	-webkit-transition: all 0.2s;
	-moz-transition: all 0.2s;
	-ms-transition: all 0.2s;
	-o-transition: all 0.2s;
	transition: all 0.2s;
	box-shadow: 
		0 1px 1px rgba(255,255,255,0.4), 
		inset 0 1px 1px rgba(0,0,0,0.1),
		0 0 0 2px rgba(255,255,255,0.5);
}

.demo-2 .nav-dots span.nav-dot-current,
.demo-2 .nav-dots span:hover {
	box-shadow: 
		0 1px 1px rgba(255,255,255,0.4), 
		inset 0 1px 1px rgba(0,0,0,0.1),
		0 0 0 5px rgba(255,255,255,0.5);
}

.nav-dots span.nav-dot-current:after {
	content: "";
	position: absolute;
	width: 10px;
	height: 10px;
	top: 3px;
	left: 3px;
	border-radius: 50%;
	background: #333;
}

/* Content elements */

.demo-1 .deco {
	width: 260px;
	height: 260px;
	border: 2px dashed #ddd;
	border: 2px dashed rgba(150,150,150,0.4);
	border-radius: 50%;
	position: absolute;
	bottom: 50%;
	left: 50%;
	margin: 0 0 0 -130px;
}

.demo-1 [data-icon]:after {
    content: attr(data-icon);
    font-family: "AnimalsNormal";
	color: #999;
	text-shadow: 0 0 1px #999;
	position: absolute;
	width: 220px;
	height: 220px;
	line-height: 220px;
	text-align: center;
	font-size: 100px;
	top: 50%;
	left: 50%;
	margin: -110px 0 0 -110px;
	box-shadow: inset 0 0 0 10px #f7f7f7;
	border-radius: 50%;
}

.demo-1 .sl-slide h2 {
	color: #000;
	text-shadow: 0 0 1px #000;
	padding: 20px;
	position: absolute;
	font-size: 34px;
	font-weight: 700;
	letter-spacing: 13px;
	text-transform: uppercase;
	width: 80%;
	left: 10%;
	text-align: center;
	line-height: 50px;
	bottom: 50%;
	margin: 0 0 -120px 0;
}

.demo-1 .sl-slide blockquote {
	position: absolute;
	width: 100%;
	text-align: center;
	left: 0;
	font-weight: 400;
	font-size: 14px;
	line-height: 20px;
	height: 70px;
	color: #8b8b8b;
	z-index: 2;
	bottom: 50%;
	margin: 0 0 -200px 0;
	padding: 0;
}

.demo-1 .sl-slide blockquote p{
	margin: 0 auto;
	width: 60%;
	max-width: 400px;
	position: relative;
}

.demo-1 .sl-slide blockquote p:before {
	color: #f0f0f0;
	color: rgba(244,244,244,0.65);
	font-family: "Bookman Old Style", Bookman, Garamond, serif;
	position: absolute;
	line-height: 60px;
	width: 75px;
	height: 75px;
	font-size: 200px;
	z-index: -1;
	left: -80px;
	top: 35px;
	content: "\201C";
}

.demo-1 .sl-slide blockquote cite {
	font-size: 10px;
	padding-top: 10px;
	display: inline-block;
	font-style: normal;
	text-transform: uppercase;
	letter-spacing: 4px;
}

/* Custom background colors for slides in first demo */

/* First Slide */
.demo-1 .bg-1 .sl-slide-inner,
.demo-1 .bg-1 .sl-content-slice {
	background-image:url(/'. $val[0]->file_folder . str_replace(' ', '%20', $val[0]->file_name) . ');
	width: 100%;
	height: 100%;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
background-position: center center;}



/* Second Slide */
.demo-1 .bg-2 .sl-slide-inner,
.demo-1 .bg-1 .sl-content-slice {
	background-image:url(/'. $val[1]->file_folder . str_replace(' ', '%20', $val[1]->file_name) . ');
	width: 100%;
	height: 100%;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
background-position: center center;}

.demo-1 .bg-2 [data-icon]:after,
.demo-1 .bg-2 h2 {
	color: #fff;
}

.demo-1 .bg-2 blockquote:before {
	color: #222;
}

/* Third Slide */
.demo-1 .bg-3 .sl-slide-inner,
.demo-1 .bg-1 .sl-content-slice {
	background-image:url(/'. $val[2]->file_folder . str_replace(' ', '%20', $val[2]->file_name) . ');
	width: 100%;
	height: 100%;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
background-position: center center;}
.demo-1 .bg-3 .deco {
	border-color: #fff;
	border-color: rgba(255,255,255,0.5);
}

.demo-1 .bg-3 [data-icon]:after {
	color: #fff;
	text-shadow: 0 0 1px #fff;
	box-shadow: inset 0 0 0 10px #b55381;
}

.demo-1 .bg-3 h2,
.demo-1 .bg-3 blockquote{
	color: #fff;
	text-shadow: 0px 1px 1px rgba(0,0,0,0.3);
}

.demo-1 .bg-3 blockquote:before {
	color: #c46c96;
}

/* Forth Slide */
.demo-1 .bg-4 .sl-slide-inner,
.demo-1 .bg-1 .sl-content-slice {
	background-image:url(/'. $val[3]->file_folder . str_replace(' ', '%20', $val[3]->file_name) . ');
	width: 100%;
	height: 100%;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
background-position: center center;}

.demo-1 .bg-4 .deco {
	border-color: #379eaa;
}

.demo-1 .bg-4 [data-icon]:after {
	text-shadow: 0 0 1px #277d87;
	color: #277d87;
}

.demo-1 .bg-4 h2,
.demo-1 .bg-4 blockquote{
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
}

.demo-1 .bg-4 blockquote:before {
	color: #379eaa;
}

/* Fifth Slide */
.demo-1 .bg-5 .sl-slide-inner,
.demo-1 .bg-1 .sl-content-slice {
	background-image:url(/'. $val[4]->file_folder . str_replace(' ', '%20', $val[4]->file_name) . ');
	width: 100%;
	height: 100%;
	-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
background-position: center center;}

.demo-1 .bg-5 .deco {
	border-color: #ECD82C;
}

.demo-1 .bg-5 .deco:after {
	color: #000;
	text-shadow: 0 0 1px #000;
}

.demo-1 .bg-5 h2,
.demo-1 .bg-5 blockquote{
	color: #000;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
}

.demo-1 .bg-5 blockquote:before {
	color: #ecd82c;
}



/* Animations for content elements */

.sl-trans-elems .deco{
	-webkit-animation: roll 1s ease-out both, fadeIn 1s ease-out both;
	-moz-animation: roll 1s ease-out both, fadeIn 1s ease-out both;
	-o-animation: roll 1s ease-out both, fadeIn 1s ease-out both;
	-ms-animation: roll 1s ease-out both, fadeIn 1s ease-out both;
	animation: roll 1s ease-out both, fadeIn 1s ease-out both;
}
.sl-trans-elems h2{
	-webkit-animation: moveUp 1s ease-in-out both;
	-moz-animation: moveUp 1s ease-in-out both;
	-o-animation: moveUp 1s ease-in-out both;
	-ms-animation: moveUp 1s ease-in-out both;
	animation: moveUp 1s ease-in-out both;
}
.sl-trans-elems blockquote{
	-webkit-animation: fadeIn 0.5s linear 0.5s both;
	-moz-animation: fadeIn 0.5s linear 0.5s both;
	-o-animation: fadeIn 0.5s linear 0.5s both;
	-ms-animation: fadeIn 0.5s linear 0.5s both;
	animation: fadeIn 0.5s linear 0.5s both;
}
.sl-trans-back-elems .deco{
	-webkit-animation: scaleDown 1s ease-in-out both;
	-moz-animation: scaleDown 1s ease-in-out both;
	-o-animation: scaleDown 1s ease-in-out both;
	-ms-animation: scaleDown 1s ease-in-out both;
	animation: scaleDown 1s ease-in-out both;
}
.sl-trans-back-elems h2{
	-webkit-animation: fadeOut 1s ease-in-out both;
	-moz-animation: fadeOut 1s ease-in-out both;
	-o-animation: fadeOut 1s ease-in-out both;
	-ms-animation: fadeOut 1s ease-in-out both;
	animation: fadeOut 1s ease-in-out both;
}
.sl-trans-back-elems blockquote{
	-webkit-animation: fadeOut 1s linear both;
	-moz-animation: fadeOut 1s linear both;
	-o-animation: fadeOut 1s linear both;
	-ms-animation: fadeOut 1s linear both;
	animation: fadeOut 1s linear both;
}
@-webkit-keyframes roll{
	0% {-webkit-transform: translateX(500px) rotate(360deg);}
	100% {-webkit-transform: translateX(0px) rotate(0deg);}
}
@-moz-keyframes roll{
	0% {-moz-transform: translateX(500px) rotate(360deg); opacity: 0;}
	100% {-moz-transform: translateX(0px) rotate(0deg); opacity: 1;}
}
@-o-keyframes roll{
	0% {-o-transform: translateX(500px) rotate(360deg); opacity: 0;}
	100% {-o-transform: translateX(0px) rotate(0deg); opacity: 1;}
}
@-ms-keyframes roll{
	0% {-ms-transform: translateX(500px) rotate(360deg); opacity: 0;}
	100% {-ms-transform: translateX(0px) rotate(0deg); opacity: 1;}
}
@keyframes roll{
	0% {transform: translateX(500px) rotate(360deg); opacity: 0;}
	100% {transform: translateX(0px) rotate(0deg); opacity: 1;}
}
@-webkit-keyframes moveUp{
	0% {-webkit-transform: translateY(40px);}
	100% {-webkit-transform: translateY(0px);}
}
@-moz-keyframes moveUp{
	0% {-moz-transform: translateY(40px);}
	100% {-moz-transform: translateY(0px);}
}
@-o-keyframes moveUp{
	0% {-o-transform: translateY(40px);}
	100% {-o-transform: translateY(0px);}
}
@-ms-keyframes moveUp{
	0% {-ms-transform: translateY(40px);}
	100% {-ms-transform: translateY(0px);}
}
@keyframes moveUp{
	0% {transform: translateY(40px);}
	100% {transform: translateY(0px);}
}
@-webkit-keyframes fadeIn{
	0% {opacity: 0;}
	100% {opacity: 1;}
}
@-moz-keyframes fadeIn{
	0% {opacity: 0;}
	100% {opacity: 1;}
}
@-o-keyframes fadeIn{
	0% {opacity: 0;}
	100% {opacity: 1;}
}
@-ms-keyframes fadeIn{
	0% {opacity: 0;}
	100% {opacity: 1;}
}
@keyframes fadeIn{
	0% {opacity: 0;}
	100% {opacity: 1;}
}
@-webkit-keyframes scaleDown{
	0% {-webkit-transform: scale(1);}
	100% {-webkit-transform: scale(0.5);}
}
@-moz-keyframes scaleDown{
	0% {-moz-transform: scale(1);}
	100% {-moz-transform: scale(0.5);}
}
@-o-keyframes scaleDown{
	0% {-o-transform: scale(1);}
	100% {-o-transform: scale(0.5);}
}
@-ms-keyframes scaleDown{
	0% {-ms-transform: scale(1);}
	100% {-ms-transform: scale(0.5);}
}
@keyframes scaleDown{
	0% {transform: scale(1);}
	100% {transform: scale(0.5);}
}
@-webkit-keyframes fadeOut{
	0% {opacity: 1;}
	100% {opacity: 0;}
}
@-moz-keyframes fadeOut{
	0% {opacity: 1;}
	100% {opacity: 0;}
}
@-o-keyframes fadeOut{
	0% {opacity: 1;}
	100% {opacity: 0;}
}
@-ms-keyframes fadeOut{
	0% {opacity: 1;}
	100% {opacity: 0;}
}
@keyframes fadeOut{
	0% {opacity: 1;}
	100% {opacity: 0;}
}


/* Media Queries for custom slider */

@media screen and (max-width: 660px) {
	.demo-1 .deco {
		width: 130px;
		height: 130px;
		margin-left: -65px;
		margin-bottom: 50px;
	}

	.demo-1 [data-icon]:after {
		width: 110px;
		height: 110px;
		line-height: 110px;
		font-size: 40px;
		margin: -55px 0 0 -55px;
	}

	.demo-1 .sl-slide blockquote {
		margin-bottom: -120px;
	}

	.demo-1 .sl-slide h2 {
		line-height: 22px;
		font-size: 18px;
		margin-bottom: -40px;
		letter-spacing: 8px;
	}

	.demo-1 .sl-slide blockquote p:before {
		line-height: 10px;
		width: 40px;
		height: 40px;
		font-size: 120px;
		left: -45px;
	}

	.demo-2 .sl-slider-wrapper {
		height: 500px;
	}

	.demo-2 .sl-slider h2 {
		font-size: 36px;
	}

	.demo-2 .sl-slider blockquote {
		font-size: 16px;
	}

}


      ';
  }

  /**
   *  footer for viewer
   */
  public function _after() {

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
		  'value_scroll'          => $hasil_val1,  
		  'value_scroll1'          => $hasil_val2,  
		  );
    $this->parser->parse('footer', $data);
  }

}
