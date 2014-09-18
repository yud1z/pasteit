<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_content.php');

class Admin_file extends Admin_content {

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
    $this->_setAdmin_user_key('file_id');

    //set the page
    $this->_setAdmin_user_page('admin_file');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'file');

  }

  /**
   *  the content
   */
  public function index()
  {
    
    $part = (isset($_GET['part'])) ? $_GET['part'] : 1;
    $this->part($part);
    $this->_index_start();

  }


  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add File');

    $content = '';
    $content .= form_open_multipart('/'. $page .'/insert');

    $content .= form_label('*file','file');
    $content .= form_upload('file');


    $content .= form_label('*folder','folder');
    $content .= form_input('folder');

    $content .= form_label('*content id','content_id');
    $content .= form_input('content_id');

    $content .= form_label('Description','desc');
    $content .= form_textarea('desc', '', 'style="width:500px"');

    $content .= '<p>';
    $content .= form_submit('add', 'Add File', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }

  
  //filer
  public function _filer($file = array(), $folder = '')
  {

    $folder = str_replace('files/', '', $folder);


    if (!empty($file)) {

      //  check the folder if exits
      if (file_exists('files/' . $folder) && is_dir('files/' . $folder)) {

      }
      else {

        //make the directory
        mkdir('files/' . $folder, 0700);

      }
      //  move the file
      $name = time() . '_' . $file['name'];
      $fix_folder = 'files/' . $folder . '/';
      $place =  $fix_folder . $name;

      move_uploaded_file($file['tmp_name'], $place);


      //check if images or something else

      $ex = explode('.', $name);
      $ex = end($ex);
      $ex = strtolower($ex);

      if ($ex == 'jpg' ||
        $ex == 'jpeg' || 
        $ex == 'png' || 
        $ex == 'gif'
      ) {


        //convert all image to jpg
        if ($file["type"] == "image/gif") {
          $image = imagecreatefromgif($place);
        }
        elseif ($file["type"] == "image/jpeg") {
          $image = imagecreatefromjpeg($place);
        }
        elseif ($file["type"] == "image/png") {
          $image = imagecreatefrompng($place);
        }
        else {
          $image = '';
        }
        //  get filetype
        $filetype = 'jpeg';



        //must codeigneiter module
        //$this->load->library('image_lib');


        //unset($config);
        //$config = array(
          //'image_library'   => 'gd2',
          //'source_image'	  => '/path/to/image/mypic.jpg',
          //'create_thumb'    => TRUE,
          //'maintain_ratio'  => TRUE,
          //'width'	          => 14,
          //'height'	        => 14;
          //'new_image'       => '/path/to/new_image.jpg',
        //);


        //$this->load->library('image_lib', $config); 

        //$this->image_lib->crop()
          ////$this->image_lib->resize();


        $this->image($place, 14, 14);
        $this->image($place, 45, 45);
        $this->image($place, 104, 59);
        $this->image($place, 216, 154);


        ////14 * 14 px
        //$this->_conv_photos($twidth = 14, 
          //$theight = 14, 
          //$image, 
          //$fix_folder . '1_' . $name . '.jpg');
        ////45 * 45 px
        //$this->_conv_photos($twidth = 45, 
          //$theight = 45, 
          //$image, 
          //$fix_folder . '2_' . $name . '.jpg');
        ////104 * 59 px
        //$this->_conv_photos($twidth = 104, 
          //$theight = 59, 
          //$image, 
          //$fix_folder . '3_' . $name . '.jpg');
        ////216 * 154 px
        //$this->_conv_photos($twidth = 216, 
          //$theight = 154, 
          //$image, 
          //$fix_folder . '4_' . $name . '.jpg');

      }
      else {
        $filetype = $ex;
      }

      return array(
        'fix_folder'  => $fix_folder,
        'name'        => $name,
        'filetype'    => $filetype,
      );


    }

  
  }


  public function _insert_code()
  {

    $page = $this->_getAdmin_user_page();

    if (!empty($_FILES)) {

      if (!empty($_POST)) {

        $folder = $_POST['folder'];
        $content_id = $_POST['content_id'];
        $desc = $_POST['desc'];
        $file = $_FILES['file'];


        $files = $this->_filer($_FILES['file'], $folder);

        //setter

        //  input into database file
        $this->{$this->_getAdmin_user_model()}->_setFile_folder($files['fix_folder']);
        $this->{$this->_getAdmin_user_model()}->_setFile_name($files['name']);
        $this->{$this->_getAdmin_user_model()}->_setFile_extension($files['filetype']);
        $this->{$this->_getAdmin_user_model()}->_setFile_desc($desc);
        $this->{$this->_getAdmin_user_model()}->_setContent_id($content_id);
        $insert_file = $this->{$this->_getAdmin_user_model()}->insert_file();
            
        //  input into database tag
        //$this->load->model('belitung_tag');
        //$this->belitung_tag->_setBelitung_tag_table('{$this->_getAdmin_user_model()}');
        //$this->belitung_tag->_setBelitung_tag_column($insert_file);
        //$this->belitung_tag->_setBelitung_tag_name($tag);
        //$this->belitung_tag->insert_tag();
        
        //  set the tag 

        redirect('/'. $page .'', 'location', 301);




      }
      else {
        //if the folder is empty
      }

    }
    else {
      //if file is empty
    }





  }

  public function _edit_render()
  {

    $page = $this->_getAdmin_user_page();
    $this->_setAdmin_page_template_head('Edit File');

    //get all data here
    $id = $this->_getAdmin_page_template_user_id();
    $this->{$this->_getAdmin_user_model()}->_setFile_id($id);
    $wew = $this->{$this->_getAdmin_user_model()}->_getFile_id();
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    //print_r($data);
    $data = $data[0];

    $content = '';
    $content .= form_open_multipart('/'. $page .'/edit');

    $content .= form_hidden('file_id', $id);

    $content .= form_label('*file','file');
    $content .= form_upload('file');


    $content .= form_label('*folder','folder');
    $content .= form_input('folder', $data->file_folder);

    $content .= form_label('*content id','content_id');
    $content .= form_input('content_id', $data->content_id);


    $content .= form_label('Description','desc');
    $content .= form_textarea('desc', $data->file_desc, 'style="width:500px"');


    $content .= '<p>';
    $content .= form_submit('add', 'Edit File', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
    $this->output->enable_profiler(FALSE);
  }


  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {
      if (!empty($_FILES['file']['name'])
      ) {

        $folder = $_POST['folder'];
        $content_id = $_POST['content_id'];
        $desc = $_POST['desc'];
        $file = $_FILES['file'];
        $id = $_POST['file_id'];

        $this->{$this->_getAdmin_user_model()}->_setFile_id($id);
        $wew = $this->{$this->_getAdmin_user_model()}->_getFile_id();
        $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

        $data = $data[0];


        $files = $this->_filer($_FILES['file'], $folder);

        //setter

        //  input into database file
        $this->{$this->_getAdmin_user_model()}->_setFile_id($id);
        $this->{$this->_getAdmin_user_model()}->_setFile_folder($folder);
        $this->{$this->_getAdmin_user_model()}->_setFile_name($files['name']);
        $this->{$this->_getAdmin_user_model()}->_setFile_extension($files['filetype']);
        $this->{$this->_getAdmin_user_model()}->_setFile_desc($desc);
        $this->{$this->_getAdmin_user_model()}->_setContent_id($content_id);
        $insert_file = $this->{$this->_getAdmin_user_model()}->update_file();

        redirect('/'. $page .'', 'location', 301);
      }
      else {

        //update file without file changing
        $folder     = $_POST['folder'];
        $content_id = $_POST['content_id'];
        $desc       = $_POST['desc'];
        $file       = $_FILES['file'];
        $id         = $_POST['file_id'];

        $this->{$this->_getAdmin_user_model()}->_setFile_id($id);
        $wew = $this->{$this->_getAdmin_user_model()}->_getFile_id();
        $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

        $data = $data[0];


        //setter

        //  input into database file
        $this->{$this->_getAdmin_user_model()}->_setFile_id($id);
        $this->{$this->_getAdmin_user_model()}->_setFile_folder($folder);
        $this->{$this->_getAdmin_user_model()}->_setFile_desc($desc);
        $this->{$this->_getAdmin_user_model()}->_setFile_extension($data->file_extension);
        $this->{$this->_getAdmin_user_model()}->_setContent_id($content_id);
        $insert_file = $this->{$this->_getAdmin_user_model()}->update_file_metadata();

        redirect('/'. $page .'', 'location', 301);

      }
    }


  }




  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
