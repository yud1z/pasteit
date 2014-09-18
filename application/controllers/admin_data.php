<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_content.php');

class Admin_data extends Admin_content {

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
  public function index()
  {
     $data = array(
    );

    $this->load->view('admin_data/content_part', $data);     
    
  }

  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add Tag');

    $content = '';
    $content .= form_open('/'. $page .'/insert');


    $content .= form_label('*rank','slide_rank');
    $content .= form_input('slide_rank');

    $content .= form_label('*content id','content_id');
    $content .= form_input('content_id');


    $content .= '<p>';
    $content .= form_submit('add', 'Add Slide', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }

  public function _insert_code()
  {

    $page = $this->_getAdmin_user_page();


      if (!empty($_POST)) {


        //  insert the tag
        $data = array(
          'slide_rank' => $_POST['slide_rank'],
          'content_id' => $_POST['content_id'],
        );

        $this->db->insert($this->_getAdmin_user_model(), $data);
        //  set the tag 

        redirect('/'. $page .'', 'location', 301);

      }
      else {
        //if the folder is empty
      }

  }

  public function _edit_render()
  {

    $page = $this->_getAdmin_user_page();
    $this->_setAdmin_page_template_head('Edit Slide');

    //get all data here
    $id = $this->_getAdmin_page_template_user_id();
    $this->{$this->_getAdmin_user_model()}->_setSlide_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    //print_r($data);
    $data = $data[0];

    $content = '';
    $content .= form_open('/'. $page .'/edit');

    $content .= form_hidden('slide_id', $id);

    $content .= form_label('*rank','slide_rank');
    $content .= form_input('slide_rank', $data->slide_rank);

    $content .= form_label('*content id','content_id');
    $content .= form_input('content_id', $data->content_id);

    $content .= '<p>';
    $content .= form_submit('add', 'Edit tag', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
    $this->output->enable_profiler(FALSE);
  }

  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {

      $id = $_POST['slide_id'];

        $data = array(
          'slide_rank' => $_POST['slide_rank'],
          'content_id' => $_POST['content_id'],
        );

        $this->db->update($this->_getAdmin_user_model(), $data, array($this->{$this->_getAdmin_user_model()}->_getIndex() => $id));
        //$this->db->insert($this->_getAdmin_user_model(), $data;

        redirect('/'. $page .'', 'location', 301);
    }


  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
