<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_file.php');

class Admin_catalogue extends Admin_file {

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
    $this->_setAdmin_user_key('catalogue_id');

    //set the page
    $this->_setAdmin_user_page('admin_catalogue');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'catalogue');

  }

  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add Catalogue');

    $content = '';
    $content .= form_open_multipart('/'. $page .'/insert');


    $content .= form_label('*title','catalogue_title');
    $content .= form_input('catalogue_title');

    $data1 = array(
      'kolom_1' => 'Kolom 1',
      'kolom_2' => 'Kolom 2',
      'kolom_3' => 'Kolom 3',
    );
    $content .= form_label('*type','catalogue_type');
    $content .= form_dropdown('catalogue_type', $data1);

    //  get last id
    //  jika genap maka tambah 3
    //  jika ganjil maka tambah 2
    $val = $this->{$this->_getAdmin_user_model()}->get_last_id();
    $val = $val[0];
    //opn($val);
    $rank = 1;

    if (!empty($val)) {
      
      if ($val->catalogue_rank%2 == 0) {
        $rank = $val->catalogue_rank + 2;
      }
      else {
        $rank = $val->catalogue_rank + 3;
      }
    }


    $content .= form_label('*rank','catalogue_rank');
    $content .= form_input('catalogue_rank', $rank);

    $content .= form_label('*file','file');
    $content .= form_upload('file');

    $content .= form_label('*link','catalogue_link');
    $content .= form_input('catalogue_link');

    $content .= form_label('*Produk_id','produk_id');
    $content .= form_input('produk_id');

    $content .= '<p>';
    $content .= form_submit('add', 'Add Catalogue', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }

  public function _insert_code()
  {

    $page = $this->_getAdmin_user_page();


      if (!empty($_POST)) {

        $folder = 'catalogue';

        //  insert the file
        $files = $this->_filer($_FILES['file'], $folder);

        //setter
        $this->load->model($this->_getBoot_name() . 'file');

        //  input into database file
        $this->{$this->_getBoot_name() . 'file'}->_setFile_folder($files['fix_folder']);
        $this->{$this->_getBoot_name() . 'file'}->_setFile_name($files['name']);
        $this->{$this->_getBoot_name() . 'file'}->_setFile_extension($files['filetype']);
        $this->{$this->_getBoot_name() . 'file'}->_setFile_desc('');
        $this->{$this->_getBoot_name() . 'file'}->_setContent_id(1);
        $insert_file = $this->{$this->_getBoot_name() . 'file'}->insert_file();


        //  insert the tag
        $data = array(
          'catalogue_title' => $_POST['catalogue_title'],
          'catalogue_type'  => $_POST['catalogue_type'],
          'catalogue_rank'  => $_POST['catalogue_rank'],
          'catalogue_link'  => $_POST['catalogue_link'],
          'produk_id'       => $_POST['produk_id'],
          'file_id'         => $insert_file,
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
    $this->_setAdmin_page_template_head('Edit Catalogue');

    //get all data here
    $id = $this->_getAdmin_page_template_user_id();
    $this->{$this->_getAdmin_user_model()}->_setCatalogue_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_content_value_byid();

    //print_r($data);
    $data = $data[0];

    $content = '';
    $content .= form_open_multipart('/'. $page .'/edit/' . $id);

    $content .= form_hidden('catalogue_id', $id);
    $content .= form_hidden('file_id', $data->file_id);
    $content .= form_label('*title','catalogue_title');
    $content .= form_input('catalogue_title', $data->catalogue_title);

    $data1 = array(
      'kolom_1' => 'Kolom 1',
      'kolom_2' => 'Kolom 2',
      'kolom_3' => 'Kolom 3',
    );
    $content .= form_label('*type','catalogue_type');
    $content .= form_dropdown('catalogue_type', $data1, $data->catalogue_type);

    //  get last id
    //  jika genap maka tambah 3
    //  jika ganjil maka tambah 2
    $this->{$this->_getAdmin_user_model()}->get_last_id();

    $content .= form_label('*rank','catalogue_rank');
    $content .= form_input('catalogue_rank', $data->catalogue_rank);


    $this->load->model($this->_getBoot_name() . 'file');
    $this->{$this->_getBoot_name() . 'file'}->_setFile_id($data->file_id);
    $data1 = $this->{$this->_getBoot_name() . 'file'}->get_content_value_byid();


      $content .= '<h4>List File in this Content</h4>';
    foreach ($data1 as $key1) {

      //opn($key1);
      $content .= '<a href="/admin_file/delete/'. $key1->file_id .'/?callback=admin_catalogue/edit/'. $id .'" title="delete">';
      $content .= 'x';
      $content .= '</a> ';
      $content .= '<a target="_blank" href="/'. $key1->file_folder . $key1->file_name .'">';
      $content .= $key1->file_name;
      $content .= '</a><br>';

    }


    $content .= form_label('*file','file');
    $content .= form_upload('file');

    $content .= form_label('*link','catalogue_link');
    $content .= form_input('catalogue_link', $data->catalogue_link);

    $content .= form_label('*Produk_id','produk_id');
    $content .= form_input('produk_id', $data->produk_id);


    $content .= '<p>';
    $content .= form_submit('add', 'Edit catalogue', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
    $this->output->enable_profiler(FALSE);
  }

  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {

      $id = $_POST['catalogue_id'];

        $folder = 'catalogue';

      //opn($_FILES);

      $insert_file = $_POST['file_id'];

        if ($_FILES['file']['name'] != '') {


        //  insert the file
        $files = $this->_filer($_FILES['file'], $folder);

        //setter
        $this->load->model($this->_getBoot_name() . 'file');

        //  input into database file
        $this->{$this->_getBoot_name() . 'file'}->_setFile_folder($files['fix_folder']);
        $this->{$this->_getBoot_name() . 'file'}->_setFile_name($files['name']);
        $this->{$this->_getBoot_name() . 'file'}->_setFile_extension($files['filetype']);
        $this->{$this->_getBoot_name() . 'file'}->_setFile_desc('');
        $this->{$this->_getBoot_name() . 'file'}->_setContent_id(1);
        $insert_file = $this->{$this->_getBoot_name() . 'file'}->insert_file();

        }

        $data = array(
          'catalogue_title' => $_POST['catalogue_title'],
          'catalogue_type'  => $_POST['catalogue_type'],
          'catalogue_rank'  => $_POST['catalogue_rank'],
          'catalogue_link'  => $_POST['catalogue_link'],
          'produk_id'       => $_POST['produk_id'],
          'file_id'         => $insert_file,
        );

      $this->db->update($this->_getAdmin_user_model(), 
      $data, 
      array(
        $this->{$this->_getAdmin_user_model()}->_getIndex() => $id)
      );
        //$this->db->insert($this->_getAdmin_user_model(), $data;

        //redirect('/'. $page .'', 'location', 301);
    }


  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
