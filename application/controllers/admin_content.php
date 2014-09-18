<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_user.php');

class Admin_content extends Admin_user {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

  /**
   *  lets start
   */
  public function _start()
  {

    //set the primary key
    $this->_setAdmin_user_key('content_id');

    //set the page
    $this->_setAdmin_user_page('admin_content');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'content');
  }



  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add Content');

    $content = '';
    $content .= form_open('/'. $page .'/insert');

    $content .= form_label('title', 'title');
    $content .= form_input('title');


    $content .= form_label('title1', 'title1');
    $content .= form_input('title1');

    //get the category
    $this->load->model($this->_getBoot_name() . 'category');
    $val = $this->{$this->_getBoot_name() . 'category'}->get_data();

    $arr = array();

    foreach ($val as $key) {

      $arr[$key->category_id] = $key->category_value; 

    }


    $content .= form_label('category', 'category');
    $content .= form_dropdown('category', $arr);


    $content .= form_label('rank', 'rank');
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

    $content .= form_label('content', 'content');
    $content .= form_editor('content', '', 'style="width:600px;"');


    $content .= '<p>';
    $content .= form_submit('add', 'Add Content', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
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



  public function _delete_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {

      if (isset($_POST['id'])) {

        //delete the data in database
        $this->{$this->_getAdmin_user_model()}->delete_content($_POST['id']);
        if ($_POST['callback'] != '') {
          $page = $_POST['callback'];
        }
        redirect('/'. $page .'', 'location', 301);

      }

    }

  }

  public function _edit_render()
  {
    $page = $this->_getAdmin_user_page();
    $this->_setAdmin_page_template_head('Edit Content');

    //get all data here
    $id = $this->_getAdmin_page_template_user_id();
    $this->{$this->_getAdmin_user_model()}->_setContent_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    $data = $data[0];


    $content = '';
    $content .= '
      <link rel="stylesheet" type="text/css" media="screen" href="/files/bootstrap/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
      <script type="text/javascript" src="/files/bootstrap/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
      ';
    $content .= form_open('/'. $page .'/edit');

    $content .= form_hidden('content_id', $id);

    $content .= form_label('title', 'title');
    $content .= form_input('title', $data->content_title);


    $content .= form_label('title1', 'title1');
    $content .= form_input('title1', $data->content_title1);

    //get the category
    $this->load->model($this->_getBoot_name() . 'category');
    $val = $this->{$this->_getBoot_name() . 'category'}->get_data();

    $arr = array();

    foreach ($val as $key) {

      $arr[$key->category_id] = $key->category_value; 

    }


    $content .= form_label('category', 'category');
    $content .= form_dropdown('category', $arr, $data->category_id);


    $content .= form_label('rank', 'rank');
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

    $content .= form_label('content', 'content');
    $content .= form_editor('content', $data->content, 'style="width:600px;"');


    $content .= '<p>';
    $content .= form_submit('add', 'Edit Content', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();


    $this->_setAdmin_page_template_edit($content);
  }


  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {
      if (isset($_POST['title']) ||
          isset($_POST['content_id']) ||
          isset($_POST['rank']) ||
          isset($_POST['publish']) ||
          isset($_POST['draft']) ||
          isset($_POST['category']) ||
          isset($_POST['resource']) ||
          isset($_POST['content'])
      ) {

          //update the data          
          $this->{$this->_getAdmin_user_model()}->_setContent_id($_POST['content_id']);
          $this->{$this->_getAdmin_user_model()}->_setDate_time($_POST['date_time']);
          $this->{$this->_getAdmin_user_model()}->_setContent($_POST['content']);
          $this->{$this->_getAdmin_user_model()}->_setContent_title($_POST['title']);
          $this->{$this->_getAdmin_user_model()}->_setContent_title1($_POST['title1']);
          $this->{$this->_getAdmin_user_model()}->_setContent_rank($_POST['rank']);
          $this->{$this->_getAdmin_user_model()}->_setContent_publish($_POST['publish']);
          $this->{$this->_getAdmin_user_model()}->_setContent_desc($_POST['content_desc']);
          $this->{$this->_getAdmin_user_model()}->_setContent_desc1($_POST['content_desc1']);
          $this->{$this->_getAdmin_user_model()}->_setContent_desc2($_POST['content_desc2']);
          $this->{$this->_getAdmin_user_model()}->_setContent_quote($_POST['content_quote']);
          $this->{$this->_getAdmin_user_model()}->_setContent_quote1($_POST['content_quote1']);
          $this->{$this->_getAdmin_user_model()}->_setContent_draft($_POST['draft']);
          $this->{$this->_getAdmin_user_model()}->_setContent_resource($_POST['resource']);
          $this->{$this->_getAdmin_user_model()}->_setCategory_id($_POST['category']);
          $this->{$this->_getAdmin_user_model()}->update_content();

          redirect('/'. $page .'', 'location', 301);
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


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
