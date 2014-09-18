<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_user.php');

class Admin_category extends Admin_user {

  public function _start()
  {

    //set the key
    $this->_setAdmin_user_key('category_id');

    //set the page
    $this->_setAdmin_user_page('admin_category');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'category');
  
  }

  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add Category');

    $content = '';
    $content .= form_open('/'. $page .'/insert');

    $content .= form_label('category', 'category');
    $content .= form_input('category');

    $content .= '<p>';
    $content .= form_submit('add', 'Add Category', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }

  public function _insert_code()
  {
    if (!empty($_POST)) {
      if (isset($_POST['category'])  
      ) {

        //  check if exists

        $val = $this->{$this->_getAdmin_user_model()}->check_category($_POST['category']); 

        if ($val == 0) {


        $data = array(
          'category_value' => $_POST['category'],
        );
        $this->db->insert($this->_getAdmin_user_model(), $data);
        redirect('/admin_category', 'location', 301);

        }
        else {
        redirect('/admin_category', 'location', 301);
          
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

  public function _edit_render()
  {
    $page = $this->_getAdmin_user_page();
    $this->_setAdmin_page_template_head('Edit Category');

    //get all data here
    $id = $this->_getAdmin_page_template_user_id();
    $this->{$this->_getAdmin_user_model()}->_setCategory_id($id);
    $data = $this->{$this->_getAdmin_user_model()}->get_category_value_byid();

    $id = $data[0]->category_id;
    $val = $data[0]->category_value;


    $content = '';
    $content .= form_open('/'. $page .'/edit');

    $content .= form_hidden('category_id', $id);

    $content .= form_label('category', 'category');
    $content .= form_input('category', $val);

    $content .= '<p>';
    $content .= form_submit('edit', 'Edit Category', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
  }

  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {
      if (isset($_POST['category']) 
      ) {

          //update the data          
          $this->{$this->_getAdmin_user_model()}->_setCategory_id($_POST['category_id']);
          $this->{$this->_getAdmin_user_model()}->_setCategory_value($_POST['category']);
          $this->{$this->_getAdmin_user_model()}->update_category();

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

  public function _delete_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {

      if (isset($_POST['id'])) {

        //delete the data in database
        $this->{$this->_getAdmin_user_model()}->delete_category($_POST['id']);
        redirect('/'. $page .'');

      }

    }

  }


}
