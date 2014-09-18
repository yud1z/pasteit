<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('admin_content.php');

class Admin_menu extends Admin_content {

  public function _start()
  {

    //set the key
    $this->_setAdmin_user_key('menu_id');

    //set the page
    $this->_setAdmin_user_page('admin_menu');

    //set the data model
    $this->_setAdmin_user_model($this->_getBoot_name() . 'menu');
  
  }


  public function _insert_render()
  {

    $page = $this->_getAdmin_user_page();

    $this->_setAdmin_page_template_head('Add menu');

    $content = '';
    $content .= form_open('/'. $page .'/insert');

    $content .= form_label('Menu Title', 'menu_title');
    $content .= form_input('menu_title');

    $content .= form_label('Menu Rank', 'menu_rank');
    $content .= form_input('menu_rank');

    $content .= form_label('Menu Url', 'menu_url');
    $content .= form_input('menu_url');

    $data_menu_parent = array(
      '0' => 'Root /',
    );
    $data_menu_parent[1] = 'preet';
    //  DO::  get all the element of 0 element
    $this->load->model($this->_getBoot_name() . 'menu');
    $data_parent = $this->{$this->_getBoot_name() . 'menu'}->get_menu_parent();
    //opn($data_parent);

    foreach ($data_parent as $key_parent) {
      
      $data_menu_parent[$key_parent->menu_id] = $key_parent->menu_title;

    }

    $content .= form_label('Menu Parent', 'menu_parent');
    $content .= form_dropdown('menu_parent', $data_menu_parent, '0');

    $content .= '<p>';
    $content .= form_submit('add', 'Add Menu', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_insert($content);
  }


  public function _insert_code()
  {
    if (!empty($_POST)) {
      if (isset($_POST['menu_title'])  
      ) {

        $data = array(
          'menu_title'  => $_POST['menu_title'],
          'menu_rank'   => $_POST['menu_rank'],
          'menu_url'    => $_POST['menu_url'],
          'menu_parent' => $_POST['menu_parent'],
        );
        $this->db->insert($this->_getAdmin_user_model(), $data);
        redirect('/admin_menu', 'location', 301);



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
    $this->_setAdmin_page_template_head('Edit Menu');

    //get all data here
    $id = $this->_getAdmin_page_template_user_id();
    $this->load->model($this->_getBoot_name() . 'menu');

    //get all data here
    $this->load->model($this->_getBoot_name() . 'menu');
    $this->{$this->_getBoot_name() . 'menu'}->_setMenu_id($id);
    $data = $this->{$this->_getBoot_name() . 'menu'}->get_content_value_byid();
    $data = $data[0];

    $content = '';
    $content .= form_open('/'. $page .'/edit');

    $content .= form_hidden('menu_id', $id);

    $content .= form_label('Menu Title', 'menu_title');
    $content .= form_input('menu_title', $data->menu_title);

    $content .= form_label('Menu Rank', 'menu_rank');
    $content .= form_input('menu_rank', $data->menu_rank);

    $content .= form_label('Menu Url', 'menu_url');
    $content .= form_input('menu_url', $data->menu_url);


    $this->load->model($this->_getBoot_name() . 'menu');
    $data_parent = $this->{$this->_getBoot_name() . 'menu'}->get_menu_parent();
    //opn($data_parent);

    $data_menu_parent = array(
      '0' => 'Root /',
    );
    $data_menu_parent[1] = 'preet';
    foreach ($data_parent as $key_parent) {
      
      $data_menu_parent[$key_parent->menu_id] = $key_parent->menu_title;

    }

    $content .= form_label('Menu Parent', 'menu_parent');
    $content .= form_dropdown('menu_parent', $data_menu_parent, $data->menu_parent);

    $content .= '<p>';
    $content .= form_submit('add', 'Edit Menu', 'class="btn"');
    $content .= '</p>';

    $content .= form_close();

    $this->_setAdmin_page_template_edit($content);
  }

  public function _edit_code()
  {
    $page = $this->_getAdmin_user_page();
    if (!empty($_POST)) {
      if (isset($_POST['menu_id']) 
      ) {

          //update the data          
          $this->{$this->_getAdmin_user_model()}->_setMenu_id($_POST['menu_id']);
          $this->{$this->_getAdmin_user_model()}->_setMenu_title($_POST['menu_title']);
          $this->{$this->_getAdmin_user_model()}->_setMenu_rank($_POST['menu_rank']);
          $this->{$this->_getAdmin_user_model()}->_setMenu_url($_POST['menu_url']);
          $this->{$this->_getAdmin_user_model()}->_setMenu_parent($_POST['menu_parent']);
          $this->{$this->_getAdmin_user_model()}->update_menu();

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
