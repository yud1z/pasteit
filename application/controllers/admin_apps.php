<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_file.php');

class Admin_apps extends Admin_file {

  var $apps_data;


  public function _mod_load()
  {


    $query = $this->db->get('druid_category');
    $data = $query->result();
    //opn($data);

    //$data = array(
      //'our_value' => 
      //array(
        //'name' => 'Our Value',
        //'path' => 'our_value',
        //'image' => '/files/apps/icon/our_value.png',
      //),
      //'campaign' => 
      //array(
        //'name' => 'Campaign',
        //'path' => 'campaign',
        //'image' => '/files/apps/icon/campaign.png',
      //),
      //'ad_gallery' => 
      //array(
        //'name' => 'Ad Gallery',
        //'path' => 'ad_gallery',
        //'image' => '/files/apps/icon/ad_gallery.png',
      //),
      //'news' => 
      //array(
        //'name' => 'News',
        //'path' => 'news',
        //'image' => '/files/apps/icon/news.png',
      //),
      //'article' => 
      //array(
        //'name' => 'Article',
        //'path' => 'article',
        //'image' => '/files/apps/icon/article.png',
      //),
      //'inspirative_story' => 
      //array(
        //'name' => 'Inspirative story',
        //'path' => 'inspiring_story',
        //'image' => '/files/apps/icon/inspirative_story.png',
      //),
      //'blog' => 
      //array(
        //'name' => 'Blog',
        //'path' => '',
        //'image' => '/files/apps/icon/blog.png',
      //),
      //'promo' => 
      //array(
        //'name' => 'Promo',
        //'path' => 'promo',
        //'image' => '/files/apps/icon/promo.png',
      //),
      //'quiz' => 
      //array(
        //'name' => 'Quiz',
        //'path' => 'quiz',
        //'image' => '/files/apps/icon/quiz.png',
      //),
      //'event' => 
      //array(
        //'name' => 'Event',
        //'path' => 'event',
        //'image' => '/files/apps/icon/event.png',
      //),
      //'our_partner' => 
      //array(
        //'name' => 'Our partner',
        //'path' => 'our_partner',
        //'image' => '/files/apps/icon/our_partner.png',
      //),
      //'contact_us' => 
      //array(
        //'name' => 'Contact us',
        //'path' => 'contact_us',
        //'image' => '/files/apps/icon/contact_us.png',
      //),
      //'connect_with_us' => 
      //array(
        //'name' => 'Connect with us',
        //'path' => 'connect_with_us',
        //'image' => '/files/apps/icon/connect_with_us.png',
      //),
      //'join_the_team' => 
      //array(
        //'name' => 'join the team',
        //'path' => 'join_the_team',
        //'image' => '/files/apps/icon/join_the_team.png',
      //),
      //'be_our_reseller' => 
      //array(
        //'name' => 'Be our reseller',
        //'path' => 'be_our_reseller',
        //'image' => '/files/apps/icon/be_our_reseller.png',
      //),
      //'special_offer' => 
      //array(
        //'name' => 'Special Offer',
        //'path' => 'special_offer',
        //'image' => '/files/apps/icon/special_offer.png',
      //),
      //'produk' => 
      //array(
        //'name' => 'Produk',
        //'path' => 'produk',
        //'image' => '/files/apps/icon/produk.png',
      //),
      //array(
        //'name' => 'Banner',
        //'path' => 'admin_banner',
        //'image' => '/files/apps/icon/banner.png',
      //),
      //array(
        //'name' => 'Gimmick',
        //'path' => 'admin_gimmick',
        //'image' => '/files/apps/icon/gimmick.png',
      //),
      //array(
        //'name' => 'Book_Review',
        //'path' => 'book_reviews',
        //'image' => '/files/apps/icon/book_review.png',
      //),
      //array(
        //'name' => 'Photos',
        //'path' => 'photos',
        //'image' => '/files/apps/icon/photos.png',
      //),
      //array(
        //'name' => 'Outlet',
        //'path' => 'outlet',
        //'image' => '/files/apps/icon/outlet.png',
      //),

    //);

    $this->_setApps_data($data);


  }

  public function index()
  {
    $data = $this->_getApps_data();

    $content = '';

    foreach ($data as $key) {


      $content .= '<div style="float:left;padding-right:50px;padding-bottom:50px;width:100px;height:100px;">';
      $content .= '<a href="/admin_apps/apps/'. $key->category_value .'" title="'. $key->category_value .'">';

      $content .= '<center><img src="/files/apps/icon/article.png"><br>';
      $content .= '<small>' . $key->category_value . '</small></center>';
      $content .= '</a>';
      $content .= '</div>';

    }

    $cdata = array(
      'apps' => $content,
    );

    $this->load->view('admin_apps/content', $cdata);

  }

  public function apps($arg = '', $method = '', $node = '')
  {


    $this->_setAdmin_user_model($this->_getBoot_name() . 'content');
    //echo $arg;
    //echo $method;

    //show the list
    //add input button
    if ($method) {

      //its must be insert
      //its must be edit
      //its must be delete

      if ($method == 'insert') {
        $this->_apps_insert($arg);
      }
      elseif ($node == 'insert_file') {
        $this->_apps_insert_file($arg, $method);
      }
      elseif ($node == 'insert_produk') {
        $this->_apps_insert_produk($arg, $method);
      }
      elseif ($node == 'insert_diskon') {
        $this->_apps_insert_diskon($arg, $method);
      }
      elseif ($method == 'delete') {

        if ($arg == 'produk') {
          $this->_apps_delete_produk($arg, $method, $node);
        }
        else {
          $this->_apps_delete_content($arg, $method, $node);
        }

      }
      elseif ($method == 'edit') {

        if ($arg == 'produk') {
          $this->_apps_edit_produk($arg, $method, $node);
        }
        else {
          $this->_apps_edit_content($arg, $method, $node);
        }

      }
      elseif ($method == 'edit') {
        $this->_apps_edit($arg);
      }
      elseif ($method == 'delete') {
        $this->_apps_delete($arg);
      }
    }
    else {
      $this->_apps_view($arg);
    }

  }

  public function _apps_code_produk($arg = '', $method = '', $node = '') 
  {

    if ($_POST['type'] == 'content') {
      $this->_edit_code_content_produk($arg, $method, $node); 
    }
    elseif ($_POST['type'] == 'file') {
      $this->_edit_code_file_produk($arg, $method, $node); 
    }
    elseif ($_POST['type'] == 'produk') {
      $this->_edit_code_produk($arg, $method, $node); 
    }
    elseif ($_POST['type'] == 'diskon') {
      $this->_edit_code_diskon_produk($arg, $method, $node); 
    }

  
  }

  public function _edit_code_produk($arg = '', $method = '', $node = '')
  {
    $page = 'admin_apps/apps/produk';
    if (!empty($_POST)) {

    $this->load->model($this->_getBoot_name() . 'produk');

        $data = array(
          //'produk_id'     => $_POST['product_code'],
          'produk_harga'  => $_POST['product_price'],
          'produk_type'   => $_POST['product_type'],
          'produk_weight' => $_POST['product_weight'],
          'produk_status' => $_POST['product_status'],
          //'content_id'    => $_POST['content_id'],
        );

        $this->db->update($this->_getBoot_name() . 'produk', 
        $data, 
         array(
            'content_id' => $_POST['content_id']
          )
        );

        redirect('/'. $page .'/edit/' . $node, 'location', 301);
    }
  
  }

  public function _edit_code_diskon_produk($arg = '', $method = '', $node = '')
  {
    $page = 'admin_apps/apps/produk';
    $data = $_POST;
    //opn($data);
    //opn($data);
    $count = count($_POST['discount_type']);
    $discount_type = $_POST['discount_type'];
    $discount_value = $_POST['discount_value'];
    $produk_id = $_POST['produk_id'];

    for ($i = 0; $i < $count; $i++) {
  
      $cdata = array(
        'diskon_value' => $discount_value[$i],
        'diskon_type' => $discount_type[$i],
        'produk_id' => $produk_id,
      );
      $this->db->insert($this->_getBoot_name() . 'diskon', $cdata);


    }

    redirect('/'. $page .'/edit/' . $node, 'location', 301);
  
  }
  
  public function _edit_code_file_produk($arg = '', $method = '', $node = '')
  {

    $page = 'admin_apps/apps/produk';
    $file = $_FILES;

    $file = $file['userfile'];
    $file = $this->_reArrayFiles($file);
    $this->load->model($this->_getBoot_name() . 'file');
    //opn($file);

    foreach ($file as $key) {

      // Here Do the multiple file handling
      //opn($key);

      //  Put the file into file system
      $files = $this->_filer($key, $arg);
      $desc = '';

      //  Insert into Database
      $this->{$this->_getBoot_name() . 'file'}->_setFile_folder($files['fix_folder']);
      $this->{$this->_getBoot_name() . 'file'}->_setFile_name($files['name']);
      $this->{$this->_getBoot_name() . 'file'}->_setFile_extension($files['filetype']);
      $this->{$this->_getBoot_name() . 'file'}->_setFile_desc($desc);
      $this->{$this->_getBoot_name() . 'file'}->_setContent_id($node);
      $insert_file = $this->{$this->_getBoot_name() . 'file'}->insert_file();


    }


    //redirect('/'. $page .'/edit/' . $node, 'location', 301);


  }

  public function _edit_code_content_produk($arg = '', $method = '', $node = '')
  {
    $page = 'admin_apps/apps/produk';
    $callback = $this->_getCallback();
    if ($callback != '') {
      $page =  $callback;
    }
    if (!empty($_POST)) {
      if (isset($_POST['title']) ||
          isset($_POST['content_id']) ||
          isset($_POST['rank']) ||
          isset($_POST['publish']) ||
          isset($_POST['draft']) ||
          isset($_POST['category']) ||
          isset($_POST['resource']) ||
          isset($_POST['date_time']) ||
          isset($_POST['content'])
      ) {

          //update the data          
          $this->load->model($this->_getBoot_name() . 'content');
          $this->{$this->_getBoot_name() . 'content'}->_setContent_id($_POST['content_id']);
          $this->{$this->_getBoot_name() . 'content'}->_setDate_time($_POST['date_time']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent($_POST['content']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_title($_POST['title']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_title1($_POST['title1']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_rank($_POST['rank']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_publish($_POST['publish']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_draft($_POST['draft']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_resource($_POST['resource']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_desc($_POST['content_desc']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_desc1($_POST['content_desc1']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_desc2($_POST['content_desc2']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_quote($_POST['content_quote']);
          $this->{$this->_getBoot_name() . 'content'}->_setContent_quote1($_POST['content_quote1']);
          $this->{$this->_getBoot_name() . 'content'}->_setCategory_id($_POST['category']);
          $this->{$this->_getBoot_name() . 'content'}->update_content();

          //redirect('/'. $page .'/edit/' . $node, 'location', 301);
      }
      else {

        //here to show the alert
        $this->_setBoot_alert_type('alert alert-error');
        $this->_setBoot_alert_text('you must fill all form');
        $this->_setBoot_alert_big('Error!');
        $this->_setAdmin_user_alert($this->alert());


      }
    }


  }
  
  public function _apps_edit_produk($arg = '', $method = '', $node = '')
  {

    if (!empty($_POST)) {

      $this->_apps_code_produk($arg, $method, $node);

    }

    $content = '';

    $this->load->model($this->_getBoot_name() . 'content');

    $id = $node;
    $this->{$this->_getBoot_name() . 'content'}->_setContent_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    $data = $data[0];

    //opn($data);

    /**
     *  After sending the content
     *  lets ask for the file
     */
    $content .= form_open('/admin_apps/apps/'. $arg .'/edit/' . $node);

    $content .= form_hidden('type', 'content');
    $content .= form_hidden('content_id', $data->content_id);

    $content .= form_label('*Title', 'title');
    $content .= form_input('title', $data->content_title);

    $content .= form_label('title1', 'title1');
    $content .= form_input('title1', $data->content_title1);
    // the categpry goes here

    //get the category
    $this->load->model($this->_getBoot_name() . 'category');
    $val = $this->{$this->_getBoot_name() . 'category'}->get_data();


    $arr = array();

    foreach ($val as $key) {
      $arr[$key->category_id] = $key->category_value; 
    }

    //  convert category to categoryid
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($arg);
    $id_cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval();
    $id_cat = $id_cat[0];

    $content .= form_label('category', 'category');
    $content .= form_dropdown('category', $arr, $id_cat->category_id);

    //$content .= form_label('category', 'category');
    //$content .= form_input('category', $arg, 'disabled');
    //$content .= form_input('category', $arg, 'disabled');

    $content .= form_label('*Rank', 'rank');
    $content .= form_input('rank', $data->content_rank);

    $data1 = array(
      '1' => 'yes',
      '0' => 'no',
    );
    $content .= form_label('publish', 'publish');
    $content .= form_dropdown('publish', $data1, $data->content_publish);

    $content .= form_label('draft', 'draft');
    $content .= form_dropdown('draft', array_reverse($data1), $data->content_draft);


    $content .= form_label('resource', 'resource');
    $content .= form_input('resource', $data->content_resource);


    $content .= form_label('content Description', 'content_desc');
    $content .= form_textarea('content_desc', $data->content_desc, 'style="width:600px;"');

    $content .= form_label('content Description1', 'content_desc1');
    $content .= form_textarea('content_desc1', $data->content_desc1, 'style="width:600px;"');

    $content .= form_label('content Description2', 'content_desc2');
    $content .= form_textarea('content_desc2', $data->content_desc2, 'style="width:600px;"');

    $content .= form_label('Quote', 'content_quote');
    $content .= form_textarea('content_quote', $data->content_quote, 'style="width:600px;"');

    $content .= form_label('Quote1', 'content_quote1');
    $content .= form_textarea('content_quote1', $data->content_quote1, 'style="width:600px;"');


    $content .= form_label('*Content', 'content');
    $content .= form_editor('content', $data->content);

    $content .= '<br>';

    $content .= '<p>';
    $content .= form_submit('add', 'Edit ' . ucfirst(str_replace('_', ' ', $arg)), 'class="btn"');
    $content .= '</p>';

    $content .= form_close();
    $content .= '<hr>';

    $this->load->model($this->_getBoot_name() . 'file');

    $id = $node;
    $this->{$this->_getBoot_name() . 'file'}->_setContent_id($id);
    $data1 = $this->{$this->_getBoot_name() . 'file'}->get_content_value_bycontentid();

      $content .= '<h4>List File in this Content</h4>';
    foreach ($data1 as $key1) {

      //opn($key1);
      $content .= '<a href="/admin_file/delete/'. $key1->file_id .'/?callback=admin_apps/apps/produk/edit/'. $id .'" title="delete">';
      $content .= 'x';
      $content .= '</a> ';
      $content .= '<a target="_blank" href="/'. $key1->file_folder . $key1->file_name .'">';
      $content .= $key1->file_name;
      $content .= '</a><br>';

    }

    $data = array(
      'arg' => 'produk/edit',
      'node' => $node,
    );

    $content .= $this->load->view('admin_apps/content_insert_file', $data, true);

    $content .= '<hr>';

    //get all data here
    $this->load->model($this->_getBoot_name() . 'produk');
    $this->{$this->_getBoot_name() . 'produk'}->_setContent_id($id);
    $data2 = $this->{$this->_getBoot_name() . 'produk'}->get_content_value_bycontentid();

    $data2 = $data2[0];


    $content .= form_open('/admin_apps/apps/'. $arg .'/edit/' . $node);

    $content .= form_hidden('type', 'produk');
    $content .= form_hidden('content_id', $id);

    $content .= form_fieldset('Edit the Product');


    $content .= form_label('Product Code ex:NEMA10', 'product_code');
    $content .= form_input('product_code', $data2->produk_id, 'disabled');

    $content .= form_label('Product Price *IDR ex:10000', 'product_price');
    $content .= form_input('product_price', $data2->produk_harga);

    $content .= form_label('Product Type ex:TOYS', 'product_type');
    $content .= form_input('product_type', $data2->produk_type);

    $content .= form_label('Product Weight *in Kg ex:1.4', 'product_weight');
    $content .= form_input('product_weight', $data2->produk_weight);

    $data1 = array(
      '0' => 'Available',
      '1' => 'No',
    );


    $content .= form_label('Product Status', 'product_status');
    $content .= form_dropdown('product_status', $data1, $data2->produk_status);

    $content .= '<p>';
    $content .= form_submit('add', 'Edit ' . ucfirst(str_replace('_', ' ', $arg)), 'class="btn"');
    $content .= '</p>';
    $content .= form_fieldset_close(); 
    $content .= form_close(); 

    $content .= '<hr>';



    $this->load->model($this->_getBoot_name() . 'diskon');

    //get all data here
    $this->load->model($this->_getBoot_name() . 'diskon');
    $this->{$this->_getBoot_name() . 'diskon'}->_setProduk_id($data2->produk_id);
    $data3 = $this->{$this->_getBoot_name() . 'diskon'}->get_content_value_byprodukid();

    //opn($data3);
      $content .= '<h4>List Discount in this Content</h4>';
    foreach ($data3 as $key3) {

      //opn($key1);
      $content .= '<a href="/admin_discount/delete/'. $key3->diskon_id .'/?callback=admin_apps/apps/produk/edit/'. $id .'" title="delete">';
      $content .= 'x';
      $content .= '</a> ';
      $content .= $key3->diskon_type . ' -> ' . $key3->diskon_value . '%';
      $content .= '<br>';

    }

    $content .= form_fieldset('Edit the Discount');

    $content .= form_open('/admin_apps/apps/'. $arg .'/edit/' . $node);

    $content .= form_hidden('type', 'diskon');
    $content .= form_hidden('produk_id', $data2->produk_id);

    $content .= '<div class="discount_me">';
    $content .= form_label('Disount Type ex:A *Must Unique', 'discount_type');
    $content .= form_input('discount_type[]', '', 'class="discount_type"');

    $content .= form_label('Disount Value ex:10 without %', 'discount_value');
    $content .= form_input('discount_value[]', '', 'class="discount_value"');
    $content .= '<hr>';
    $content .= '</div>';

    $content .= '<div id="separator1"></div>';

    $content .= '      
      <a href="javascript:void(0)" id="add_discount"><img src="/files/images/add_file.gif"> <small>Add More Discount</small></a><br><br>
      ';

    $content .= '<p>';
    $content .= form_submit('add', 'Edit ' . ucfirst(str_replace('_', ' ', 'Discount')), 'class="btn"');
    $content .= '</p>';
    $content .= form_fieldset_close(); 
    $content .= form_close(); 

    $content .= '
      <script type="text/javascript" charset="utf-8">
      $(function(){
        $("#add_discount").click(function(){
            var a = $(".discount_me").html(); 
            $("#separator1").after(a);
          });
        });
      </script>
      ';

    $data = array(
      'head' => ucfirst($arg),
      'content' => $content,
    );

    $this->load->view('admin_apps/template', $data);

  
  }

  public function _apps_edit_content($arg, $method, $node)
  {
  

    if (!empty($_POST)) {

      $this->_setCallback();
      $this->_apps_code_produk($arg, $method, $node);

    }

    $content = 'admin_apps/apps/' . $arg;

    $this->load->model($this->_getBoot_name() . 'content');

    $id = $node;
    $this->{$this->_getBoot_name() . 'content'}->_setContent_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    $data = $data[0];
    $content .= '
      <link rel="stylesheet" type="text/css" media="screen" href="/files/bootstrap/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
      <script type="text/javascript" src="/files/bootstrap/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
      ';

    //opn($data);

    /**
     *  After sending the content
     *  lets ask for the file
     */
    $content .= form_open('/admin_apps/apps/'. $arg .'/edit/' . $node);

    $content .= form_hidden('type', 'content');
    $content .= form_hidden('content_id', $data->content_id);

    $content .= form_label('*Title', 'title');
    $content .= form_input('title', $data->content_title);

    $content .= form_label('title1', 'title1');
    $content .= form_input('title1', $data->content_title1);
    // the categpry goes here

    //get the category
    $this->load->model($this->_getBoot_name() . 'category');
    $val = $this->{$this->_getBoot_name() . 'category'}->get_data();


    $arr = array();

    foreach ($val as $key) {
      $arr[$key->category_id] = $key->category_value; 
    }

    //  convert category to categoryid
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($arg);
    $id_cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval();
    $id_cat = $id_cat[0];

    $content .= form_label('category', 'category');
    $content .= form_dropdown('category', $arr, $id_cat->category_id);

    //$content .= form_label('category', 'category');
    //$content .= form_input('category', $arg, 'disabled');
    //$content .= form_input('category', $arg, 'disabled');

    $content .= form_label('*Rank', 'rank');
    $content .= form_input('rank', $data->content_rank);

    $data1 = array(
      '1' => 'yes',
      '0' => 'no',
    );
    $content .= form_label('publish', 'publish');
    $content .= form_dropdown('publish', $data1, $data->content_publish);

    $content .= form_label('draft', 'draft');
    $content .= form_dropdown('draft', array_reverse($data1), $data->content_draft);


    $content .= form_label('resource', 'resource');
    $content .= form_input('resource', $data->content_resource);

    //  TODO::Edit the date here
    $content .= form_label('<br>date', 'date_time');
    $content .= '
      <div class="well">
  <div id="datetimepicker1" class="input-append date">
    <input data-format="yyyy-MM-dd hh:mm:ss" type="text" style="height:30px;" value="'. $data->date_time .'" name="date_time"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
</div>
  ';

$content .= "
  <script type='text/javascript'>
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
  ";

    $content .= form_label('content Description', 'content_desc');
    $content .= form_textarea('content_desc', $data->content_desc, 'style="width:600px;"');

    $content .= form_label('content Description1', 'content_desc1');
    $content .= form_textarea('content_desc1', $data->content_desc1, 'style="width:600px;"');

    $content .= form_label('content Description2', 'content_desc2');
    $content .= form_textarea('content_desc2', $data->content_desc2, 'style="width:600px;"');

    $content .= form_label('Quote', 'content_quote');
    $content .= form_textarea('content_quote', $data->content_quote, 'style="width:600px;"');

    $content .= form_label('Quote1', 'content_quote1');
    $content .= form_textarea('content_quote1', $data->content_quote1, 'style="width:600px;"');


    $content .= form_label('*Content', 'content');
    $content .= form_editor('content', $data->content);

    $content .= '<br>';

    $content .= '<p>';
    $content .= form_submit('add', 'Edit ' . ucfirst(str_replace('_', ' ', $arg)), 'class="btn"');
    $content .= '</p>';

    $content .= form_close();
    $content .= '<hr>';

    $this->load->model($this->_getBoot_name() . 'file');

    $id = $node;
    $this->{$this->_getBoot_name() . 'file'}->_setContent_id($id);
    $data1 = $this->{$this->_getBoot_name() . 'file'}->get_content_value_bycontentid();

      $content .= '<h4>List File in this Content</h4>';
    foreach ($data1 as $key1) {

      //opn($key1);
      $content .= '<a href="/admin_file/delete/'. $key1->file_id .'/?callback=admin_apps/apps/'. $arg .'/edit/'. $id .'" title="delete">';
      $content .= 'x';
      $content .= '</a> ';
      $content .= '<a target="_blank" href="/'. $key1->file_folder . $key1->file_name .'">';
      $content .= $key1->file_name;
      $content .= '</a><br>';

    }

    $data = array(
      'arg' => $arg . '/edit',
      'node' => $node,
    );

    $content .= $this->load->view('admin_apps/content_insert_file', $data, true);

    $data = array(
      'head' => ucfirst($arg),
      'content' => $content,
    );

    $this->load->view('admin_apps/template', $data);


  } 

  public function _code_delete_produk($arg = '', $method = '', $node = '')
  {
    //  convert id content to produk id
    $this->load->model($this->_getBoot_name() . 'produk');
    $this->load->model($this->_getBoot_name() . 'diskon');
    $this->load->model($this->_getBoot_name() . 'file');
    $this->load->model($this->_getBoot_name() . 'content');
    $this->{$this->_getBoot_name() . 'produk'}->_setContent_id($_POST['id']);
    $val = $this->{$this->_getBoot_name() . 'produk'}->get_produk_by_contentid();

    //opn($val);
    foreach ($val as $key) {
      //  delete all diskon by the produk id
      $this->{$this->_getBoot_name() . 'diskon'}->delete_diskon_by_produk($key->produk_id);
    }
    //  delete all the produk by id content
    $this->{$this->_getBoot_name() . 'produk'}->delete_produk_by_contentid($_POST['id']);

    //  delete all the file by id content
    $this->{$this->_getBoot_name() . 'file'}->delete_file_by_contentid($_POST['id']);

    //  delete the content
    $this->{$this->_getBoot_name() . 'content'}->delete_content($_POST['id']);

    //  redirect into admin apps
    redirect('/admin_apps/apps/' . $arg, 'location', 301);

  }

  public function _apps_delete_produk($arg = '', $method = '', $node = '')
  {

    if (!empty($_POST)) {
      $this->_code_delete_produk($arg, $method, $node);
    }


    $data = array(
      'id' => $node,
      'url' => '/admin_apps/apps/produk/delete/' . $node,
    );
    //show the form with valued
    $this->load->view('admin_apps/delete_template', $data);


  } 

  public function _code_delete_content($arg = '', $method = '', $node = '')
  {
    //  convert id content to produk id
    $this->load->model($this->_getBoot_name() . 'file');
    $this->load->model($this->_getBoot_name() . 'content');

    //  delete all the file by id content
    $this->{$this->_getBoot_name() . 'file'}->delete_file_by_contentid($_POST['id']);

    //  delete the content
    $this->{$this->_getBoot_name() . 'content'}->delete_content($_POST['id']);

    //  redirect into admin apps
    redirect('/admin_apps/apps/' . $arg, 'location', 301);

  }

  public function _apps_delete_content($arg = '', $method = '', $node = '')
  {
    if (!empty($_POST)) {
      $this->_code_delete_content($arg, $method, $node);
    }
    $data = array(
      'id' => $node,
      'url' => '/admin_apps/apps/'. $arg .'/delete/' . $node,
    );
    //show the form with valued
    $this->load->view('admin_apps/delete_template', $data);
  } 

  public function _code_insert_diskon($arg, $method)
  {
    //echo $method;
    $data = $_POST;
    $data = $this->_reArrayInput($data);
    //opn($data);

    foreach ($data as $key) {

      //Insert into database here
      $cdata = array(
        'diskon_value' => $key['discount_value'],
        'diskon_type' => $key['discount_type'],
        'produk_id' => $method,
      );
      $this->db->insert($this->_getBoot_name() . 'diskon', $cdata);

    }

    redirect('/admin_apps/apps/' . $arg, 'location', 301);

  }

  public function _apps_insert_diskon($arg = '', $method = '')
  {
    if (!empty($_POST)) {
      $this->_code_insert_diskon($arg, $method);
    }

    $content = '';

    $content .= form_open('/admin_apps/apps/'. $arg .'/'. $method .'/insert_diskon');

    $content .= '<div class="discount_me">';
    $content .= form_label('Disount Type ex:A *Must Unique', 'discount_type');
    $content .= form_input('discount_type[]', '', 'class="discount_type"');

    $content .= form_label('Disount Value ex:10 without %', 'discount_value');
    $content .= form_input('discount_value[]', '', 'class="discount_value"');
    $content .= '<hr>';
    $content .= '</div>';

    $content .= '<div id="separator"></div>';

    $content .= '      
      <a href="javascript:void(0)" id="add_discount"><img src="/files/images/add_file.gif"> <small>Add More Discount</small></a><br><br>
      ';

    $content .= '<p>';
    $content .= form_submit('add', 'Add ' . ucfirst(str_replace('_', ' ', 'Discount')), 'class="btn"');
    $content .= '</p>';

    $content .= '
      <script type="text/javascript" charset="utf-8">
      $(function(){
        $("#add_discount").click(function(){
            var a = $(".discount_me").html(); 
            $("#separator").after(a);
          });
        });
      </script>
      ';

    $data = array(
      'head' => 'Add the ' . ucfirst('Discount'),
      'content' => $content,
    );

    $this->load->view('admin_apps/template', $data);

  }

  public function _code_insert_produk($arg = '', $method = '')
  {

    //opn($_POST);

    $data = array(
      'produk_id'     => $_POST['product_code'],
      'produk_harga'  => $_POST['product_price'],
      'produk_type'   => $_POST['product_type'],
      'produk_weight' => $_POST['product_weight'],
      'produk_status' => $_POST['product_status'],
      'content_id'    => $method,
    );

    //  Insert into Database here
    $this->db->insert($this->_getBoot_name() . 'produk', $data);


    redirect('/admin_apps/apps/' . $arg . '/' . $_POST['product_code'] . '/insert_diskon', 'location', 301);
    //$this->load->model($this->_getBoot_name() . 'produk');
    //$this->{$this->_getBoot_name() . 'produk'}->_setFile_folder($files['fix_folder']);

  } 

  public function _apps_insert_produk($arg = '', $method = '')
  {

    if (!empty($_POST)) {
      $this->_code_insert_produk($arg, $method);
    }

    $content = '';

    $content .= form_open('/admin_apps/apps/'. $arg .'/'. $method .'/insert_produk');

    $content .= form_label('Product Code ex:NEMA10', 'product_code');
    $content .= form_input('product_code');

    $content .= form_label('Product Price *IDR ex:10000', 'product_price');
    $content .= form_input('product_price');

    $content .= form_label('Product Type ex:TOYS', 'product_type');
    $content .= form_input('product_type');

    $content .= form_label('Product Weight *in Kg ex:1.4', 'product_weight');
    $content .= form_input('product_weight');

    $data1 = array(
      '0' => 'Available',
      '1' => 'No',
    );

    $content .= form_label('Product Status', 'product_status');
    $content .= form_dropdown('product_status', $data1);

    $content .= '<p>';
    $content .= form_submit('add', 'Add ' . ucfirst(str_replace('_', ' ', $arg)), 'class="btn"');
    $content .= '</p>';

    $data = array(
      'head' => 'Add the ' . ucfirst($arg),
      'content' => $content,
    );

    $this->load->view('admin_apps/template', $data);

  }

  /**
   *  spread the userdata into the table
   */
  public function _spread_userdata($arg = '')
  {

    $model = $this->_getAdmin_user_model();
    $onset = $this->_getBoot_part_onset();
    $offset = $this->_getBoot_part_offset();


    if ($onset == '' || $offset == '') {
      $onset = 0;
      $offset = 100;
    }


    $field = $this->_getBoot_sort_field();
    $sort = $this->_getBoot_sort_type();


    $this->{$this->_getAdmin_user_model()}->_setKey($field);
    $this->{$this->_getAdmin_user_model()}->_setLimit_start($offset);
    $this->{$this->_getAdmin_user_model()}->_setLimit_end($onset);
    $this->{$this->_getAdmin_user_model()}->_setSort($sort);
    $this->{$this->_getAdmin_user_model()}->_setWhere(true);
    $this->{$this->_getAdmin_user_model()}->_setWhere_table('category_id');
    $this->{$this->_getAdmin_user_model()}->_setWhere_val($arg);


    eval('$data_all = $this->'. $model .'->get_data($offset,$onset,$field,$sort);');
    $this->_setAdmin_user_all_data($data_all);

  }

  /**
   *
   * View the Apps
   */
  public function _apps_view($arg = ''){


    //set the key
    $this->_setAdmin_user_key('content_id');

    //set the page
    $this->_setAdmin_user_page('/admin_apps/apps/' . $arg);

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'content');

    $model = $this->_getAdmin_user_model();
    $page = $this->_getAdmin_user_page();

    //load the user table
    $this->load->model($model);


    $model = $this->_getAdmin_user_model();
    $key  = $this->_getAdmin_user_key();

    $page = $this->_getAdmin_user_page();

    //set the uri of paging
    $this->_setBoot_part_uri($page);

    //this get data count perpage
    $this->_setBoot_part_perpage(100);

    //count form database
    eval('$this->_setAdmin_user_count($this->'. $model .'->get_row());');


    //modify the data
    $this->_modify();

    $count = $this->_getAdmin_user_count();

    ////get count all user
    $this->_setBoot_part_count_data($count);

    ////the argument for paging
    $argue = $this->_getBoot_part_arg();
    $this->_part($argue);


    ////get the admin list from database
    ////limited by 9, and make the method for all paging

    //get category by id with input by value
    $this->load->model($this->_getBoot_name() . 'category');

    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($arg);
    $val = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval();
    $val = $val[0]->category_id;

    $this->_spread_userdata($val);

    $data_table = $this->_getAdmin_user_all_data();

    //add action into table
    $this->_setBoot_gen_data($data_table);
    $this->_setBoot_gen_edit(true);
    $this->_setBoot_gen_delete(true);
    $this->_setBoot_gen_view(true);
    $this->_setBoot_gen_delimiter(' | ');
    $this->_setBoot_gen_head($key);

    $this->_gen_action();

    $data_table = $this->_getBoot_gen_result();



    //render it into table
    $this->_setBoot_table_data($data_table);
    $this->_setBoot_table_font(13);
    $this->table();

    $field = 'content_id';
    $offset = 10;
    $onset = 0;
    $sort = 'DESC';

    $this->{$this->_getAdmin_user_model()}->_setKey($field);
    $this->{$this->_getAdmin_user_model()}->_setLimit_start($offset);
    $this->{$this->_getAdmin_user_model()}->_setLimit_end($onset);
    $this->{$this->_getAdmin_user_model()}->_setSort($sort);
    $this->{$this->_getAdmin_user_model()}->_setWhere(true);
    $this->{$this->_getAdmin_user_model()}->_setWhere_table('category_id');
    $this->{$this->_getAdmin_user_model()}->_setWhere_val($arg);


    eval('$data_all = $this->'. $model .'->get_data($offset,$onset,$field,$sort);');




    $data = array(
      'row' => $this->_getBoot_table_data(),
      'paging' => $this->_getBoot_part_render(),
      'arg' => $arg,
    );
    $this->_push_data($data, $this->_getAdmin_page_key_push(), $this->_getAdmin_page_data_push());


    //$data = array(
    //'arg' => $arg,
    //);

    $this->load->view('admin_apps/content_insert', $this->_getAdmin_page_result_push());

  }

  public function _insert_code()
  {
    if (!empty($_POST)) {
      if (isset($_POST['title']) ||
        isset($_POST['rank']) ||
        isset($_POST['publish']) ||
        isset($_POST['draft']) ||
        isset($_POST['category']) ||
        isset($_POST['content'])
      ) {

        //  check if exists
        $data = array(
          'content_title'     => $_POST['title'],
          'content_title1'    => $_POST['title1'],
          'content_rank'      => $_POST['rank'],
          'content_publish'   => $_POST['publish'],
          'content_desc'      => $_POST['content_desc'],
          'content_desc1'     => $_POST['content_desc1'],
          'content_desc2'     => $_POST['content_desc2'],
          'content_quote'     => $_POST['content_quote'],
          'content_quote1'    => $_POST['content_quote1'],
          'content'           => $_POST['content'],
          'sender_ip'         => $_SERVER['REMOTE_ADDR'],
          'date_time'         => $this->_now(),
          'content_draft'     => $_POST['draft'],
          'content_resource'  => $_POST['resource'],
          'hits_count'        => 0,
          'comment_count'     => 0,
          'user_id'           => $this->session->userdata('user_id'),
          'category_id'       => $_POST['category'],
        );
        $this->db->insert($this->_getAdmin_user_model(), $data);

        $callback = $this->_getCallback();

        //echo $callback . $this->db->insert_id() . '/insert_file';

        if (isset($callback)) {
          redirect($callback . $this->db->insert_id() . '/insert_file', 'location', 301);
        }
        else {
          redirect('/admin_content', 'location', 301);
        }


      }
      else {

        //here to show the alert
        $this->_setBoot_alert_type('alert alert-error');
        $this->_setBoot_alert_text('you must fill all form');
        $this->_setBoot_alert_big('Error!');
        $this->_setAdmin_user_alert($this->alert());


      }


    }


  }

  public function _code_insert($arg = '', $data = array())
  {

    //  insert the data
    $this->_insert_code();

    // redirect to insert file

  }

  /**
   *
   * Insert the Apps
   */
  public function _apps_insert($arg = ''){

    if (!empty($_POST)) {

      //opn($_POST);

      //  if produk so callback to other

      $this->_setCallback('/admin_apps/apps/' . $arg . '/');
      $this->_code_insert($arg, $_POST);

    }


    $content = '';


    /**
     *  After sending the content
     *  lets ask for the file
     */
    $content .= form_open('/admin_apps/apps/'. $arg .'/insert');

    $content .= form_label('*Title', 'title');
    $content .= form_input('title');

    $content .= form_label('title1', 'title1');
    $content .= form_input('title1');

    // the categpry goes here

    //get the category
    $this->load->model($this->_getBoot_name() . 'category');
    $val = $this->{$this->_getBoot_name() . 'category'}->get_data();

    $arr = array();

    foreach ($val as $key) {

      $arr[$key->category_id] = $key->category_value; 

    }

    //  convert category to categoryid
    $this->{$this->_getBoot_name() . 'category'}->_setCategory_value($arg);
    $id_cat = $this->{$this->_getBoot_name() . 'category'}->get_category_id_byval();
    $id_cat = $id_cat[0];

    $content .= form_label('category', 'category');
    $content .= form_dropdown('category', $arr, $id_cat->category_id);


    //$content .= form_label('category', 'category');
    //$content .= form_input('category', $arg, 'disabled');
    //$content .= form_input('category', $arg, 'disabled');

    $content .= form_label('*Rank', 'rank');
    $content .= form_input('rank');


    $data1 = array(
      '1' => 'yes',
      '0' => 'no',
    );
    $content .= form_label('publish', 'publish');
    $content .= form_dropdown('publish', $data1);

    $content .= form_label('draft', 'draft');
    $content .= form_dropdown('draft', array_reverse($data1));


    $content .= form_label('resource', 'resource');
    $content .= form_input('resource');

    $content .= form_label('content Description', 'content_desc');
    $content .= form_textarea('content_desc', '', 'style="width:600px;"');

    $content .= form_label('content Description1', 'content_desc1');
    $content .= form_textarea('content_desc1', '', 'style="width:600px;"');

    $content .= form_label('content Description2', 'content_desc2');
    $content .= form_textarea('content_desc2', '', 'style="width:600px;"');

    $content .= form_label('Quote', 'content_quote');
    $content .= form_textarea('content_quote', '', 'style="width:600px;"');

    $content .= form_label('Quote1', 'content_quote1');
    $content .= form_textarea('content_quote1', '', 'style="width:600px;"');

    $content .= form_label('*Content', 'content');
    $content .= form_editor('content');

    $content .= '<br>';


    $content .= '<p>';
    $content .= form_submit('add', 'Add ' . ucfirst(str_replace('_', ' ', $arg)), 'class="btn"');
    $content .= '</p>';


    $data = array(
      'head' => ucfirst($arg),
      'content' => $content,
    );

    $this->load->view('admin_apps/template', $data);

  }

  public function _code_insert_file($arg = '', $node = '', $file = array())
  {

    $file = $file['userfile'];
    $file = $this->_reArrayFiles($file);
    $this->load->model($this->_getBoot_name() . 'file');
    //opn($file);

    foreach ($file as $key) {

      // Here Do the multiple file handling
      //opn($key);

      //  Put the file into file system
      $files = $this->_filer($key, $arg);
      $desc = '';

      //  Insert into Database
      $this->{$this->_getBoot_name() . 'file'}->_setFile_folder($files['fix_folder']);
      $this->{$this->_getBoot_name() . 'file'}->_setFile_name($files['name']);
      $this->{$this->_getBoot_name() . 'file'}->_setFile_extension($files['filetype']);
      $this->{$this->_getBoot_name() . 'file'}->_setFile_desc($desc);
      $this->{$this->_getBoot_name() . 'file'}->_setContent_id($node);
      $insert_file = $this->{$this->_getBoot_name() . 'file'}->insert_file();


    }


    if ($file[0]['name'] == '') {

    }
    //echo $arg;
      // Redirect into the APPs  
      if ($arg == 'produk') {
        redirect('/admin_apps/apps/' . $arg . '/' . $node . '/insert_produk', 'location', 301);
      }
      else {
        redirect('/admin_apps/apps/' . $arg, 'location', 301);
      }

  }

  public function _reArrayInput(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['discount_type']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
      foreach ($file_keys as $key) {
        $file_ary[$i][$key] = $file_post[$key][$i];
      }
    }

    return $file_ary;
  }

  public function _reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
      foreach ($file_keys as $key) {
        $file_ary[$i][$key] = $file_post[$key][$i];
      }
    }

    return $file_ary;
  }

  /**
   *  Insert the file after the content uploaded
   */
  public function _apps_insert_file($arg = '', $node = '')
  {

    if (!empty($_FILES)) {


      $this->_code_insert_file($arg, $node, $_FILES);

    }

    $data = array(
      'arg' => $arg,
      'node' => $node,
    );

    $this->load->view('admin_apps/content_insert_file', $data);
  }

  /**
   *  Edit the Apps
   */
  public function _apps_edit($arg = ''){

    $content = '';

    $data = array(
      'head' => $arg,
      'content' => $content,
    );

    $this->load->view('admin_apps/template', $data);
  }

  /**
   *  Delete the content of apps
   */
  public function _apps_delete($arg = ''){


    $content = '';

    $data = array(
      'head' => $arg,
      'content' => $content,
    );

    $this->load->view('admin_apps/delete_template', $data);

  }

  /**
   * Get apps_data.
   *
   * @return apps_data.
   */
  function _getApps_data()
  {
    return $this->apps_data;
  }

  /**
   * Set apps_data.
   *
   * @param apps_data the value to set.
   */
  function _setApps_data($apps_data = '')
  {
    $this->apps_data = $apps_data;
  }
}
