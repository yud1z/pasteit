<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_file.php');

class Admin_banner extends Admin_file {

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
    $this->_setAdmin_user_key('ads_id');

    //set the page
    $this->_setAdmin_user_page('admin_banner');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'ads');

  }

  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('add banner');

    $content = '';
    $content .= form_open_multipart('/'. $page .'/insert');

    $content .= form_label('*title','title');
    $content .= form_input('title');

    $content .= form_label('*image(must  be 300 x 250 pixel)','image');
    $content .= form_upload('image');

    $content .= form_label('*ranking','ranking');
    $content .= form_input('ranking');

    $content .= form_label('*link','link');
    $content .= form_input('link');

    $content .= '<p>';
    $content .= form_submit('add', 'Add Banner', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }

  public function _insert_code()
  {

    $page = $this->_getAdmin_user_page();

      if (!empty($_POST)) {
        //  insert the file here
      if (!empty($_FILES)) {

        $file     = $_FILES['image'];
        $title    = $_POST['title'];
        $ranking  = $_POST['ranking'];
        $link     = $_POST['link'];


        $files = $this->_filer($_FILES['image'], 'ads');

        //  input into database tag
        $data = array(
          'ads_title'   => $title ,
          'ads_folder'  => 'ads',
          'ads_file'    => $files['name'],
          'ads_rank'    => $ranking,
          'ads_link'    => $link,
        );

        $this->db->insert('druid_ads', $data); 

        //  set the tag 

        redirect('/'. $page .'', 'location', 301);

      }





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
    $this->{$this->_getAdmin_user_model()}->_setAds_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    $data = $data[0];

    $content = '';
    $content .= form_open_multipart('/'. $page .'/edit');

    $content .= form_hidden('ads_id', $id);

    $content .= form_label('*title','title');
    $content .= form_input('title', $data->ads_title);

    $content .= '<br>';
    $content .= '<img src="/files/'. $data->ads_folder .'/'. $data->ads_file .'">';

    $content .= form_label('*image(must  be 300 x 250 pixel)','image');
    $content .= form_upload('image');

    $content .= form_label('*ranking','ranking');
    $content .= form_input('ranking', $data->ads_rank);

    $content .= form_label('*link','link');
    $content .= form_input('link', $data->ads_link);

    $content .= '<p>';
    $content .= form_submit('add', 'Edit Banner', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
    $this->output->enable_profiler(FALSE);
  }

  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {

      if (!empty($_FILES['image']['name'])
      ) {

        $ads_id   = $_POST['ads_id'];
        $file     = $_FILES['image'];
        $title    = $_POST['title'];
        $ranking  = $_POST['ranking'];
        $link     = $_POST['link'];


        $files = $this->_filer($_FILES['image'], 'ads');

        //  input into database tag
        $data = array(
          'ads_title'   => $title ,
          'ads_folder'  => 'ads',
          'ads_file'    => $files['name'],
          'ads_rank'    => $ranking,
          'ads_link'    => $link,
        );

        $this->db->where('ads_id', $ads_id);
        $this->db->update('druid_ads', $data); 


        redirect('/'. $page .'', 'location', 301);
      }
      else {

        //update file without file changing
        $ads_id   = $_POST['ads_id'];
        $file     = $_FILES['image'];
        $title    = $_POST['title'];
        $ranking  = $_POST['ranking'];
        $link     = $_POST['link'];


        $files = $this->_filer($_FILES['image'], 'ads');

        //  input into database tag
        $data = array(
          'ads_title'   => $title ,
          'ads_rank'    => $ranking,
          'ads_link'    => $link,
        );

        $this->db->where('ads_id', $ads_id);
        $this->db->update('druid_ads', $data); 

        redirect('/'. $page .'', 'location', 301);

      }
    }


  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

