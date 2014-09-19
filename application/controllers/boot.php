<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @class Boot 
 * @abstract Root of all page, you can put yout method as root here 
 * 
 * @uses CI
 * @uses _Controller
 * @package 
 * @version $id$
 * @copyright Yud1z code Development
 * @author Yudhistiara, Langi <yudis.net42@gmail.com> 
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class Boot extends CI_Controller {

  /**
   * boot_alert_type 
   * 
   * @var mixed
   * @access public
   */
  var $boot_alert_type;
  /**
   * boot_alert_text 
   * 
   * @var mixed
   * @access public
   */
  var $boot_alert_text;
  /**
   * boot_alert_big 
   * 
   * @var mixed
   * @access public
   */
  var $boot_alert_big;

  /**
   * boot_table_data 
   * 
   * @var mixed
   * @access public
   */
  var $boot_table_data;
  /**
   * boot_table_font 
   * 
   * @var mixed
   * @access public
   */
  var $boot_table_font;

  /**
   * boot_gen_data 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_data;
  /**
   * boot_gen_edit 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_edit;
  /**
   * boot_gen_view 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_view;
  /**
   * boot_gen_delete 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_delete;
  /**
   * boot_gen_delimiter 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_delimiter;
  /**
   * boot_gen_head 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_head;
  /**
   * boot_gen_result 
   * 
   * @var mixed
   * @access public
   */
  var $boot_gen_result;

  /**
   * boot_part_perpage 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_perpage;
  /**
   * boot_part_count_data 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_count_data;
  /**
   * boot_part 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part;
  /**
   * boot_part_render 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_render;
  /**
   * boot_part_uri 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_uri;
  /**
   * boot_part_onset 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_onset;
  /**
   * boot_part_offset 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_offset;
  /**
   * boot_part_arg 
   * 
   * @var mixed
   * @access public
   */
  var $boot_part_arg;

  /**
   * boot_sort 
   * 
   * @var mixed
   * @access public
   */
  var $boot_sort;
  /**
   * boot_sort_field 
   * 
   * @var mixed
   * @access public
   */
  var $boot_sort_field;
  /**
   * boot_sort_type 
   * 
   * @var mixed
   * @access public
   */
  var $boot_sort_type;

  /**
   * boot_log 
   * 
   * @var mixed
   * @access public
   */
  var $boot_log;

  /**
   * boot_name 
   * 
   * @var mixed
   * @access public
   */
  var $boot_name;

  /**
   * log 
   * 
   * @var mixed
   * @access public
   */
  var $log;
  /**
   * count 
   * 
   * @var mixed
   * @access public
   */
  var $count;
  /**
   * model 
   * 
   * @var mixed
   * @access public
   */
  var $model;
  /**
   * callback 
   * 
   * @var mixed
   * @access public
   */
  var $callback;
  /**
   * package 
   * 
   * @var mixed
   * @access public
   */
  var $package;
  /**
   * package_path 
   * 
   * @var mixed
   * @access public
   */
  var $package_path;
  /**
   * error 
   * 
   * @var array
   * @access public
   */
  var $error = array();

  /**
   * @function _now 
   * @abstract get now date 
   * 
   * @param string $time 
   * @access public
   * @return void
   */
  public function _now($time = '')
  {
    if ($time) {
      return date('Y-m-d H:i:s', $time);
    }
    else {
      return date('Y-m-d H:i:s', time());
    }
  }
  /**
   * @function _system 
   * @abstract load the system as Global variable 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _system($arg = '')
  {

    $this->_setModel($this->_getBoot_name() . 'system');
    $this->load->model($this->_getModel());
    $val = '';

    if ($arg == 'site_name') {
      $val .=  $this->{$this->_getModel()}->get_field('site_name');
    }
    elseif ($arg == 'default_image') {
      $val .=  $this->{$this->_getModel()}->get_field('default_image');
    }
    elseif ($arg == 'metadata_desc') {
      $val .=  $this->{$this->_getModel()}->get_field('metadata_desc');
    }
    elseif ($arg == 'metadata_key') {
      $val .=  $this->{$this->_getModel()}->get_field('metadata_key');
    }
    elseif ($arg == 'default_logo') {
      $val .=  $this->{$this->_getModel()}->get_field('default_logo');
    }
    elseif ($arg == 'default_ico') {
      $val .=  $this->{$this->_getModel()}->get_field('default_ico');
    }

    return $val;

  }

  /**
   * @function _skyrep 
   * @abstract just fixing of layout in different of page 
   * 
   * @param string $arg 
   * @access public
   * @return void
   */
  public function _skyrep($arg = '')
  {
    if ($arg == 'start') {
      return '<div class="skyrep">';
    }
    else {
      return '</div>';
    }
  }

  /**
   * @function _before 
   * @abstract set the header here 
   * 
   * @access public
   * @return void
   */
  public function _before(){
  }

    /**
     * @function menu 
     * @abstract menu from database 
     * 
     * @param mixed $level 
     * @access public
     * @return void
     */
    public function menu($level = NULL)  
    {  
      $this->load->model($this->_getBoot_name() . 'menu');
      $level_id = empty($level) ? 0 : $level->menu_id;
      $val = $this->{$this->_getBoot_name() . 'menu'}->get_menu($level_id);

      $this->load->library('menu');

      $menu = new menu;  
      foreach ($val as $lvl)  
      {  
        $menu->add($lvl->menu_title, $lvl->menu_url, $this->menu($lvl));  
      }  
      return $menu;
    }  

  /**
   * @function _record_log 
   * @abstract you can active it if you want 
   * 
   * @access public
   * @return void
   */
  public function _record_log()
  {


    //$this->load->model('belitung_hits');

    ////opn($this->belitung_hits);


    ////  just input into Database
    //$url = $_SERVER['REQUEST_URI'];


    //$input = array(
    //'hits_table'    => '',
    //'hits_node'     => '',
    //'hits_browser'  => $_SERVER['HTTP_USER_AGENT'],
    //'hits_read'     => date('Y:m:d H:i:s', time()),
    //'hits_ip'       => $_SERVER['REMOTE_ADDR'],
    //'hits_url'      => $url,
    //);

    //////here insert the user
    //$this->db->insert('belitung_hits', $input);

  }

  /**
   * @function _remap 
   * @abstract modify the load before function 
   * 
   * @param mixed $method 
   * @param mixed $args 
   * @access public
   * @return void
   */
  public function _remap($method, $args) {

    session_start();

    $this->load->database();
    $this->_setBoot_name($this->db->dbprefix . '_');

    $this->_setPackage('druid_default');
    $this->_setPackage_path(APPPATH.'third_party/'. $this->_getPackage() .'/');

    $boot_log = $this->_getBoot_log();

    //  all record in database, false mean page who doesnt record
    if ($boot_log == false) {

      //  goto the record log
      $this->_record_log();

    }



    // Call before action

    if ($method != 'ajax') {
      $this->_before();
    }
    $list_mthd = get_class_methods(get_class($this));

    if (in_array($method, $list_mthd)) {

      //call the method
      call_user_func_array(array($this, $method), $args);
    }
    else {
      //redirect to error page
      redirect('/what/err/error in parse the '. $method .'', 'location', 301);

    }

    if ($method != 'ajax') {
      $this->_after();
      $this->_analytics();
    }

  }

  /**
   * @function _analytics 
   * @abstract description 
   * 
   * @access public
   * @return void
   */
  public function _analytics()
  {
    if ($this->session->userdata('user_level') != 'admin') {
      $this->parser->parse('analytics', array()); 
    }
  }

  /**
   *  paging feature
   *  its handle every larga data
   */
  public function _paging($arg = '')
  {

    //if not argument set it to one
    if ($arg == '') {
      $arg = 1;
    }

    //set data perpage
    $data_perpage = 10;

    //count the offset
    $offset = ($arg - 1) * $data_perpage;

    //the data count
    $data_sum = $this->_getCount();

    //split the count
    $page_sum = ceil($data_sum/$data_perpage);

    $the_part = '';

    //uri
    $uri = '/';

    //uri parse
    $uparse;

    $sort = '';
    $by = '&by=asc';

    if (isset($_GET['sort'])) {
      $sort = '&sort=' . $_GET['sort'];
    }

    if (isset($_GET['by'])) {
      $by = '&by=' . $_GET['by'];
    }


    $seg = '/?part';

    if (!empty($_GET)) {


      $seg =  $_SERVER['REQUEST_URI'] . '&part';

      if (isset($_GET['part']) && isset($_GET['by'])) {

        $seg = explode('&part', $_SERVER['REQUEST_URI']);

        $seg = $seg[0] . '&part';

      }


    }


    $the_part .= '<div id="pagination-flickr">';


    //show previous link
    if ($arg > 1) 
    {
      $the_part .=  "<a class='previous-off' href='". $seg ."=".($arg-1). $sort . $by . "'>&lt;&lt; Prev</a>"; 
    }

    //paging algoritm
    for($page = 1; $page <= $page_sum; $page++)
    {
      if ((($page >= $arg - 3) && ($page <= $arg + 3)) || ($page == 1) || ($page == $page_sum))
      {
        if (($offset == 1) && ($page != 2))  $the_part .= "<span class='active'>...</span>";
        if (($offset != ($page_sum - 1)) && ($page == $page_sum))  $the_part .= "<span class='active'>...</span>";
        if ($page == $arg) $the_part .= " <span class='active'>".$page."</span> ";
        else $the_part .= " <a href='". $seg ."=".$page. $sort . $by . "'>".$page."</a> ";
        $offset = $page;
      }
    }


    //show next link
    if ($arg < $page_sum) 
    {
      $the_part .= "<a  class='next' href='". $seg ."=".($arg+1). $sort . $by . "'>Next &gt;&gt;</a>";
    }
    $the_part .= '</div>';

    return $the_part;

  }

  /**
   *  get image from content
   *  size = 1, 2, 3, 0
   */
  public function content2image($id = '')
  {
    if ($id) {
      $this->belitung_content->_setBelitung_content_content_id($id);
      $it = $this->belitung_content->get_file_id();

      if (!empty($it)) {
        return $it[0]->file_folder . '/' . $it[0]->file_name; 
      }

    }
  }

  /**
   *  get all image without the content
   */
  public function event2image($table = '', $id = '', $key = '')
  {

    //get file id from the content_id
    //get folder and filename
    //if doesnt exists show the default image

    $this->load->model('belitung_file');
    $this->belitung_file->_setTable($table);
    $this->belitung_file->_setNode($id);
    $this->belitung_file->_setKey($key);

    $val =  $this->belitung_file->other_file();

    if (!empty($val)) {
      return $val[0]->file_folder . '/' . $val[0]->file_name; 
    }



  }

  /**
   *  sorting page
   */
  public function sort(){}

    /**
     *  Sort the table
     */
    public function _sort()
    {
      //here to code the sort 
      $ts = $this->uri->total_segments();
      $offset = (isset($_GET['by'])) ? $_GET['by'] : 'asc'; 


      $uri = $this->uri->segments;
      $val = $this->uri->segment($ts -1); 

      //print_r($uri);

      //serach the val
      $search = array_search('sort', $uri);
      //print_r($search);

      //check if sort
      if (array_key_exists('sort', $_GET)) {

        $data = $this->_getAdmin_user_all_data();
        //push the query of sorting table to spread
        $this->_setBoot_sort_field($_GET['sort']);
        $this->_setBoot_sort_type($offset);

      }

    }

  public function _after(){
  }
  public function _modify(){
  }
    /**
     * @function _rupiah 
     * @abstract description 
     * 
     * @param int $angka 
     * @access public
     * @return void
     */
    public function _rupiah($angka = 0)
    {
      $jadi = "Rp " . number_format($angka,0,'','.');
      return $jadi;
    }

  /**
   * @function image 
   * @abstract this will caching the image 
   * 
   * @param mixed $image_path 
   * @param int $width 
   * @param int $height 
   * @access public
   * @return void
   */
  function image($image_path, $width = 0, $height = 0) {


    //Get the Codeigniter object by reference
    $CI = $this;

    if ($image_path == 'images/') {
      $image_path = '';
    }


    //Alternative image if file was not found
    if (! file_exists($image_path))
      $image_path = 'files/images/content_default.png';

    //The new generated filename we want
    $fileinfo = pathinfo($image_path);
    $new_image_path = $fileinfo['dirname'] . '/' . $fileinfo['filename'] . '_' . $width . 'x' . $height . '.' . $fileinfo['extension'];

    //The first time the image is requested
    //Or the original image is newer than our cache image
    if ((! file_exists($new_image_path)) || filemtime($new_image_path) < filemtime($image_path)) {
      $CI->load->library('image_lib');

      //The original sizes
      if (file_exists($image_path)) {
      $original_size = getimagesize($image_path);
      $original_width = $original_size[0];
      $original_height = $original_size[1];
      $ratio = $original_width / $original_height;

      //The requested sizes
      $requested_width = $width;
      $requested_height = $height;

      //Initialising
      $new_width = 0;
      $new_height = 0;

      //Calculations
      if ($requested_width > $requested_height) {
        $new_width = $requested_width;
        $new_height = $new_width / $ratio;
        if ($requested_height == 0)
          $requested_height = $new_height;

        if ($new_height < $requested_height) {
          $new_height = $requested_height;
          $new_width = $new_height * $ratio;
        }

      }
      else {
        $new_height = $requested_height;
        $new_width = $new_height * $ratio;
        if ($requested_width == 0)
          $requested_width = $new_width;

        if ($new_width < $requested_width) {
          $new_width = $requested_width;
          $new_height = $new_width / $ratio;
        }
      }

      $new_width = ceil($new_width);
      $new_height = ceil($new_height);

      //Resizing
      $config = array();
      $config['image_library'] = 'gd2';
      $config['source_image'] = $image_path;
      $config['new_image'] = $new_image_path;
      $config['maintain_ratio'] = FALSE;
      $config['height'] = $new_height;
      $config['width'] = $new_width;
      $CI->image_lib->initialize($config);
      $CI->image_lib->resize();
      $CI->image_lib->clear();

      //Crop if both width and height are not zero
      if (($width != 0) && ($height != 0)) {
        $x_axis = floor(($new_width - $width) / 2);
        $y_axis = floor(($new_height - $height) / 2);

        //Cropping
        $config = array();
        $config['source_image'] = $new_image_path;
        $config['maintain_ratio'] = FALSE;
        $config['new_image'] = $new_image_path;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['x_axis'] = $x_axis;
        $config['y_axis'] = $y_axis;
        $CI->image_lib->initialize($config);
        $CI->image_lib->crop();
        $CI->image_lib->clear();
      }
      }
    }

    return $new_image_path;
  }

  /**
   * @function _error_render 
   * @abstract This is the error render 
   * 
   * @param array $data 
   * @access public
   * @return void
   */
  public function _error_render($data = array())
  {

    if (!empty($data)) {

      $alert    = $data['type'];
      $content  = $data['content'];
      $head     = $data['head'];

      $show = '';

      switch ($alert) {
      case 'error':
        $show = 'alert-error'; 
        break;

      case 'info':
        $show = 'alert-info';
        break;

      case 'success':
        $show = 'alert-success';
        break;

      default:
        $show = '';
        break;
      }

      return '
        <div class="alert '. $show .'">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>'. $head .'</strong> '. $content .'
        </div>
        ';  
    }
    else {
      return '';
    }
  }

  /**
   * @function _conv_photos 
   * @abstract description 
   * 
   * @param int $twidth 
   * @param int $theight 
   * @param string $image 
   * @param string $output 
   * @access public
   * @return void
   */
  public function _conv_photos($twidth = 0, $theight = 0, $image = '', $output = '')
  {

    $twidth; // Maximum Width For Thumbnail Images
    $theight; // Maximum Height For Thumbnail Images

    $currwidth = imagesx($image); // Current Image Width
    $currheight = imagesy($image); // Current Image Height

    if ($currheight > $currwidth) { // If Height Is Greater Than Width
      $zoom = $twidth / $currheight; // Length Ratio For Width
      $newheight = $theight; // Height Is Equal To Max Height
      $newwidth = $currwidth * $zoom; // Creates The New Width
    } else { // Otherwise, Assume Width Is Greater Than Height (Will Produce Same Result If Width Is Equal To Height)
      $zoom = $twidth / $currwidth; // Length Ratio For Height
      $newwidth = $twidth; // Width Is Equal To Max Width
      $newheight = $currheight * $zoom; // Creates The New Height
    }

    $dimg = imagecreate($newwidth, $newheight); // Make New Image For Thumbnail
    imagetruecolortopalette($image, false, 256); // Create New Color Pallete
    $palsize = ImageColorsTotal($image);
    for ($i = 0; $i < $palsize; $i++) { // Counting Colors In The Image
      $colors = ImageColorsForIndex($image, $i); // Number Of Colors Used
      ImageColorAllocate($dimg, $colors['red'], $colors['green'], $colors['blue']); // Tell The Server What Colors This Image Will Use
    }
    imagecopyresized($dimg, $image, 0, 0, 0, 0, $newwidth, $newheight, $currwidth, $currheight); // Copy Resized Image To The New Image (So We Can Save It)
    imagejpeg($dimg, $output); // Saving The Image
    //imagejpeg($dimg, $path . '1_' . $file_b); // Saving The Image

  }

  /**
   *  show the page
   */
  public function part($arg = ''){}

    /**
     *  paging feature
     *  its handle every larga data
     */
    public function _part($arg = '')
    {
      $bool = $this->_getBoot_part();

      if ($bool == true) {

        //if not argument set it to one
        if ($arg == '') {
          $arg = 1;
        }

        //set data perpage
        $data_perpage = $this->_getBoot_part_perpage();

        //count the offset
        $offset = ($arg - 1) * $data_perpage;

        //the data count
        $data_sum = $this->_getBoot_part_count_data();

        //split the count
        $page_sum = ceil($data_sum/$data_perpage);

        $the_part = '';

        //uri
        $uri = $this->_getBoot_part_uri();

        //uri parse
        $uparse;

        //check if sort exists
        $segi = $this->uri->segments;
        $seg = base_url() . $uri;
        if (in_array('sort', $segi)) {


          //get current url
          $seg = '/' . $this->uri->uri_string();

        }

        $sort = '';
        $by = '&by=asc';

        if (isset($_GET['sort'])) {
          $sort = '&sort=' . $_GET['sort'];
        }

        if (isset($_GET['by'])) {
          $by = '&by=' . $_GET['by'];
        }

        $the_part .= '<div id="pagination-flickr">';


        //show previous link
        if ($arg > 1) 
        {
          $the_part .=  "<a class='previous-off' href='". $seg ."/?part=".($arg-1). $sort . $by . "'>&lt;&lt; Prev</a>"; 
        }

        //paging algoritm
        for($page = 1; $page <= $page_sum; $page++)
        {
          if ((($page >= $arg - 3) && ($page <= $arg + 3)) || ($page == 1) || ($page == $page_sum))
          {
            if (($offset == 1) && ($page != 2))  $the_part .= "<span class='active'>...</span>";
            if (($offset != ($page_sum - 1)) && ($page == $page_sum))  $the_part .= "<span class='active'>...</span>";
            if ($page == $arg) $the_part .= " <span class='active'>".$page."</span> ";
            //if ($page == $arg && $page == 1) $the_part .= " <span class='active'>".$page."</span> ";
            else $the_part .= " <a href='". $seg ."/?part=".$page. $sort . $by . "'>".$page."</a> ";
            $offset = $page;
          }
        }


        //show next link
        if ($arg < $page_sum) 
        {
          $the_part .= "<a  class='next' href='". $seg ."/?part=".($arg+1). $sort . $by . "'>Next &gt;&gt;</a>";
        }
        $the_part .= '</div>';

        $this->_setBoot_part_render($the_part);
      }




    }

  /**
   * @function _split 
   * @abstract description 
   * 
   * @param string $word 
   * @param int $len 
   * @access public
   * @return void
   */
  public function _split($word = '', $len = 0)
  {

    $word = ucfirst(strtolower($word));

    if (strlen($word) >= $len) {

      return substr($word, 0, $len) . '...';


    }
    else {
      return $word;
    }

  }

  /**
   *  Alert method it use in every document
   */
  public function alert()
  {
    //setting up the variable
    $alert_text = $this->_getBoot_alert_text();
    $alert_type = $this->_getBoot_alert_type();
    $alert_big  = $this->_getBoot_alert_big();

    //the alert
    return $alert = '
      <div class="'. $alert_type .'">
      <button type="button" class="close" data-dismiss="alert"><a href="">&times;</a></button>
      <strong>'. $alert_big .'</strong> '. $alert_text .'
      </div>
      ';

  }

  /**
   *  Table method, its make boosting in make the table
   */
  public function table()
  {
    $table_data = $this->_getBoot_table_data();

    if (is_array($table_data)) {

      $font = $this->_getBoot_table_font();
      $font = (isset($font)) ? 'font-size:' . $font . ';' : '';

      $table = '<table class="table table-bordered table-striped" style="'. $font .'">';

      $a = 1;
      foreach ($table_data as $data) {
        $table .= '<tr>';
        $data = (array)$data;

        $count = count($data);

        foreach ($data as $key_data => $cnt_data) {

          //opn($key_data);

          //echo $a;

          if ($a <= $count) {

            $sort = $this->_getBoot_sort();
            $uri = '' . $this->_getBoot_part_uri();


            if ($sort == true) {

              if ($key_data != 'action') {

                //here to code for toggle 
                $ts = $this->uri->total_segments();
                $offset = (isset($_GET['by'])) ? $_GET['by'] : 'asc'; 
                $val = (isset($_GET['sort'])) ? $_GET['sort'] : ''; 
                $sort = $this->uri->segment($ts -2);

                //$tet = explode('_', $key_data);
                //$tet = $tet[0];
                $tet = $key_data;

                if ($key_data == $val) {

                  if ($offset == 'asc') {

                    $table .= '<td>';
                    $table .= '<b>';
                    $table .= '<a href="'. $uri .'?sort='. $key_data .'&by=desc">' . str_replace($tet . '_', ' ', $key_data) . '</a>';
                    $table .= '</b>';
                    $table .= '</td>';


                  }
                  else
                  {

                    $table .= '<td>';
                    $table .= '<b>';
                    $table .= '<a href="'. $uri .'?sort='. $key_data .'&by=asc">' . str_replace($tet . '_', ' ', $key_data) . '</a>';
                    $table .= '</b>';
                    $table .= '</td>';

                  }


                }
                else {

                  $table .= '<td>';
                  $table .= '<b>';
                  $table .= '<a href="'. $uri .'?sort='. $key_data .'&by=asc">' . str_replace($tet . '_', ' ', $key_data) . '</a>';
                  $table .= '</b>';
                  $table .= '</td>';

                }

              }
              else {

                $table .= '<td>';
                $table .= '<center><b>';
                $table .= $key_data;
                $table .= '</b></center>';
                $table .= '</td>';


              }


            }
            else {

              $table .= '<td>';
              $table .= '<center><b>';
              $table .= $key_data;
              $table .= '</b></center>';
              $table .= '</td>';

            }


          }

          $a++;

        }
        $table .= '</tr>';

        $table .= '<tr>';
        foreach ($data as $key_data => $cnt_data) {

          $table .= '<td>';
          $table .= strip_tags($cnt_data, '<a> <center>');
          $table .= '</td>';

        }
        $table .= '</tr>';

      }
      $table .= '</table>';

      return $this->_setBoot_table_data($table);

    }

  }

  /**
   *  Action to table
   *
   */
  function _gen_action()
  {
    $data = $this->_getBoot_gen_data();
    $edit = $this->_getBoot_gen_edit();
    $view = $this->_getBoot_gen_view();
    $delete = $this->_getBoot_gen_delete();
    $delimiter = $this->_getBoot_gen_delimiter();
    $head = $this->_getBoot_gen_head();

    $result = array();

    //print_r($data);


    if (!empty($data)) {


      foreach ($data as $data_key) {
        $dat = (array)$data_key;

        $text = '';

        $uri = $this->_getBoot_part_uri();

        $text .= '<center>';

        if ($view == true) {
          $text .= '<a href="/'. $uri .'/view/'. $dat[$head] .'" >view</a>';
          $text .= $delimiter;
        }


        if ($edit == true) {
          if (!empty($_GET)) {
            $text .= '<a href="/'. $uri .'/edit/'. $dat[$head] .'" >edit</a>';
          }
          else {
            $text .= '<a href="'. $uri .'/edit/'. $dat[$head] .'" >edit</a>';
          }
          $text .= $delimiter;
        }


        if ($delete == true) {
          if (!empty($_GET)) {
            $text .= '<a href="/'. $uri .'/delete/'. $dat[$head] .'" >delete</a>';
          }
          else {
            $text .= '<a href="'. $uri .'/delete/'. $dat[$head] .'" >delete</a>';
          }
        }
        $text .= '</center>';

        array_push($dat, $dat['action'] = $text);
        unset($dat[0]);
        $result[] = $dat;

      }
    }


    $this->_setBoot_gen_result($result);

  }

  /**
   *  fungsi untuk enkripsi password
   *  @param $pasword plain text
   *  @return password yang sudah dihash
   */
  function _login_pwd_encrypt()
  {

    //DO::include the php pass
    $arg = array(
      'key' => 8,
      'boolen' => FALSE, 
    );
    $this->load->library('PasswordHash', $arg);

    //mulai enkripsi
    //menggunakan phppass
    $hash       = $this->passwordhash->HashPassword($this->_getLogin_password());
    return $this->_setLogin_password($hash);
  }
  /**
   * Get boot_alert_type.
   *
   * @return boot_alert_type.
   */
  function _getBoot_alert_type()
  {
    return $this->boot_alert_type;
  }

  /**
   * Set boot_alert_type.
   *
   * @param boot_alert_type the value to set.
   */
  function _setBoot_alert_type($boot_alert_type = '')
  {
    $this->boot_alert_type = $boot_alert_type;
  }

  /**
   * Get boot_alert_text.
   *
   * @return boot_alert_text.
   */
  function _getBoot_alert_text()
  {
    return $this->boot_alert_text;
  }

  /**
   * Set boot_alert_text.
   *
   * @param boot_alert_text the value to set.
   */
  function _setBoot_alert_text($boot_alert_text = '')
  {
    $this->boot_alert_text = $boot_alert_text;
  }

  /**
   * Get boot_alert_big.
   *
   * @return boot_alert_big.
   */
  function _getBoot_alert_big()
  {
    return $this->boot_alert_big;
  }

  /**
   * Set boot_alert_big.
   *
   * @param boot_alert_big the value to set.
   */
  function _setBoot_alert_big($boot_alert_big = '')
  {
    $this->boot_alert_big = $boot_alert_big;
  }

  /**
   * Get boot_table_data.
   *
   * @return boot_table_data.
   */
  function _getBoot_table_data()
  {
    return $this->boot_table_data;
  }

  /**
   * Set boot_table_data.
   *
   * @param boot_table_data the value to set.
   */
  function _setBoot_table_data($boot_table_data = '')
  {
    $this->boot_table_data = $boot_table_data;
  }

  /**
   * Set boot_table_font.
   *
   * @param boot_table_font the value to set.
   */
  function _setBoot_table_font($boot_table_font = '')
  {
    $this->boot_table_font = $boot_table_font;
  }

  /**
   * Get boot_table_font.
   *
   * @return boot_table_font.
   */
  function _getBoot_table_font()
  {
    return $this->boot_table_font;
  }

  /**
   * Set boot_gen_delimiter.
   *
   * @param boot_gen_delimiter the value to set.
   */
  function _setBoot_gen_delimiter($boot_gen_delimiter = '')
  {
    $this->boot_gen_delimiter = $boot_gen_delimiter;
  }

  /**
   * Get boot_gen_delimiter.
   *
   * @return boot_gen_delimiter.
   */
  function _getBoot_gen_delimiter()
  {
    return $this->boot_gen_delimiter;
  }

  /**
   * Set boot_gen_delete.
   *
   * @param boot_gen_delete the value to set.
   */
  function _setBoot_gen_delete($boot_gen_delete = '')
  {
    $this->boot_gen_delete = $boot_gen_delete;
  }

  /**
   * Get boot_gen_delete.
   *
   * @return boot_gen_delete.
   */
  function _getBoot_gen_delete()
  {
    return $this->boot_gen_delete;
  }

  /**
   * Set boot_gen_edit.
   *
   * @param boot_gen_edit the value to set.
   */
  function _setBoot_gen_edit($boot_gen_edit = '')
  {
    $this->boot_gen_edit = $boot_gen_edit;
  }

  /**
   * Get boot_gen_edit.
   *
   * @return boot_gen_edit.
   */
  function _getBoot_gen_edit()
  {
    return $this->boot_gen_edit;
  }

  /**
   * Set boot_gen_data.
   *
   * @param boot_gen_data the value to set.
   */
  function _setBoot_gen_data($boot_gen_data = '')
  {
    $this->boot_gen_data = $boot_gen_data;
  }

  /**
   * Get boot_gen_data.
   *
   * @return boot_gen_data.
   */
  function _getBoot_gen_data()
  {
    return $this->boot_gen_data;
  }

  /**
   * Get boot_gen_head.
   *
   * @return boot_gen_head.
   */
  function _getBoot_gen_head()
  {
    return $this->boot_gen_head;
  }

  /**
   * Set boot_gen_head.
   *
   * @param boot_gen_head the value to set.
   */
  function _setBoot_gen_head($boot_gen_head = '')
  {
    $this->boot_gen_head = $boot_gen_head;
  }

  /**
   * Get boot_gen_result.
   *
   * @return boot_gen_result.
   */
  function _getBoot_gen_result()
  {
    return $this->boot_gen_result;
  }

  /**
   * Set boot_gen_result.
   *
   * @param boot_gen_result the value to set.
   */
  function _setBoot_gen_result($boot_gen_result = '')
  {
    $this->boot_gen_result = $boot_gen_result;
  }

  /**
   * Get boot_part_perpage.
   *
   * @return boot_part_perpage.
   */
  function _getBoot_part_perpage()
  {
    return $this->boot_part_perpage;
  }

  /**
   * Set boot_part_perpage.
   *
   * @param boot_part_perpage the value to set.
   */
  function _setBoot_part_perpage($boot_part_perpage = '')
  {
    $this->boot_part_perpage = $boot_part_perpage;
  }

  /**
   * Get boot_part_count_data.
   *
   * @return boot_part_count_data.
   */
  function _getBoot_part_count_data()
  {
    return $this->boot_part_count_data;
  }

  /**
   * Set boot_part_count_data.
   *
   * @param boot_part_count_data the value to set.
   */
  function _setBoot_part_count_data($boot_part_count_data = '')
  {
    $this->boot_part_count_data = $boot_part_count_data;
  }

  /**
   * Get boot_part.
   *
   * @return boot_part.
   */
  function _getBoot_part()
  {
    return $this->boot_part;
  }

  /**
   * Set boot_part.
   *
   * @param boot_part the value to set.
   */
  function _setBoot_part($boot_part = '')
  {
    $this->boot_part = $boot_part;
  }

  /**
   * Get boot_part_render.
   *
   * @return boot_part_render.
   */
  function _getBoot_part_render()
  {
    return $this->boot_part_render;
  }

  /**
   * Set boot_part_render.
   *
   * @param boot_part_render the value to set.
   */
  function _setBoot_part_render($boot_part_render = '')
  {
    $this->boot_part_render = $boot_part_render;
  }

  /**
   * Get boot_part_uri.
   *
   * @return boot_part_uri.
   */
  function _getBoot_part_uri()
  {
    return $this->boot_part_uri;
  }

  /**
   * Set boot_part_uri.
   *
   * @param boot_part_uri the value to set.
   */
  function _setBoot_part_uri($boot_part_uri = '')
  {
    $this->boot_part_uri = $boot_part_uri;
  }

  /**
   * Set boot_part_offset.
   *
   * @param boot_part_offset the value to set.
   */
  function _setBoot_part_offset($boot_part_offset = '')
  {
    $this->boot_part_offset = $boot_part_offset;
  }

  /**
   * Get boot_part_offset.
   *
   * @return boot_part_offset.
   */
  function _getBoot_part_offset()
  {
    return $this->boot_part_offset;
  }

  /**
   * Set boot_part_onset.
   *
   * @param boot_part_onset the value to set.
   */
  function _setBoot_part_onset($boot_part_onset = '')
  {
    $this->boot_part_onset = $boot_part_onset;
  }

  /**
   * Get boot_part_onset.
   *
   * @return boot_part_onset.
   */
  function _getBoot_part_onset()
  {
    return $this->boot_part_onset;
  }

  /**
   * Set boot_part_arg.
   *
   * @param boot_part_arg the value to set.
   */
  function _setBoot_part_arg($boot_part_arg = '')
  {
    $this->boot_part_arg = $boot_part_arg;
  }

  /**
   * Get boot_part_arg.
   *
   * @return boot_part_arg.
   */
  function _getBoot_part_arg()
  {
    return $this->boot_part_arg;
  }

  /**
   * Get boot_sort.
   *
   * @return boot_sort.
   */
  function _getBoot_sort()
  {
    return $this->boot_sort;
  }

  /**
   * Set boot_sort.
   *
   * @param boot_sort the value to set.
   */
  function _setBoot_sort($boot_sort = '')
  {
    $this->boot_sort = $boot_sort;
  }

  /**
   * Get boot_sort_field.
   *
   * @return boot_sort_field.
   */
  function _getBoot_sort_field()
  {
    return $this->boot_sort_field;
  }

  /**
   * Set boot_sort_field.
   *
   * @param boot_sort_field the value to set.
   */
  function _setBoot_sort_field($boot_sort_field = '')
  {
    $this->boot_sort_field = $boot_sort_field;
  }

  /**
   * Get boot_sort_type.
   *
   * @return boot_sort_type.
   */
  function _getBoot_sort_type()
  {
    return $this->boot_sort_type;
  }

  /**
   * Set boot_sort_type.
   *
   * @param boot_sort_type the value to set.
   */
  function _setBoot_sort_type($boot_sort_type = '')
  {
    $this->boot_sort_type = $boot_sort_type;
  }

  /**
   * Set boot_gen_view.
   *
   * @param boot_gen_view the value to set.
   */
  function _setBoot_gen_view($boot_gen_view = '')
  {
    $this->boot_gen_view = $boot_gen_view;
  }

  /**
   * Get boot_gen_view.
   *
   * @return boot_gen_view.
   */
  function _getBoot_gen_view()
  {
    return $this->boot_gen_view;
  }

  /**
   * Get boot_log.
   *
   * @return boot_log.
   */
  function _getBoot_log()
  {
    return $this->boot_log;
  }

  /**
   * Set boot_log.
   *
   * @param boot_log the value to set.
   */
  function _setBoot_log($boot_log = '')
  {
    $this->boot_log = $boot_log;
  }

  /**
   * Get boot_name.
   *
   * @return boot_name.
   */
  function _getBoot_name()
  {
    return $this->boot_name;
  }

  /**
   * Set boot_name.
   *
   * @param boot_name the value to set.
   */
  function _setBoot_name($boot_name = '')
  {
    $this->boot_name = $boot_name;
  }

  /**
   * Get log.
   *
   * @return log.
   */
  function _getLog()
  {
    return $this->log;
  }

  /**
   * Set log.
   *
   * @param log the value to set.
   */
  function _setLog($log = '')
  {
    $this->log = $log;
  }

  /**
   * Get count.
   *
   * @return count.
   */
  function _getCount()
  {
    return $this->count;
  }

  /**
   * Set count.
   *
   * @param count the value to set.
   */
  function _setCount($count = '')
  {
    $this->count = $count;
  }

  /**
   * Get model.
   *
   * @return model.
   */
  function _getModel()
  {
    return $this->model;
  }

  /**
   * Set model.
   *
   * @param model the value to set.
   */
  function _setModel($model = '')
  {
    $this->model = $model;
  }  

  /**
   * Get callback.
   *
   * @return callback.
   */
  function _getCallback()
  {
    return $this->callback;
  }

  /**
   * Set callback.
   *
   * @param callback the value to set.
   */
  function _setCallback($callback = '')
  {
    $this->callback = $callback;
  }

  /**
   * Get package.
   *
   * @return package.
   */
  function _getPackage()
  {
    return $this->package;
  }

  /**
   * Set package.
   *
   * @param package the value to set.
   */
  function _setPackage($package = '')
  {
    $this->package = $package;
  }

  /**
   * Get package_path.
   *
   * @return package_path.
   */
  function _getPackage_path()
  {
    return $this->package_path;
  }

  /**
   * Set package_path.
   *
   * @param package_path the value to set.
   */
  function _setPackage_path($package_path = '')
  {
    $this->package_path = $package_path;
  }

  /**
   * @function _getError().
   * @abstract Get error.
   *
   * @return error.
   */
  function _getError()
  {
    return $this->error;
  }

  /**
   * @function _setError().
   * @abstract Set error.
   *
   * @param error the value to set.
   */
  function _setError($error = '')
  {
    $this->error = $error;
  }
}

