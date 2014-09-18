<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title>Admin Panel</title>

<link rel="shortcut icon" href="/files/images/dart_vader.png">

<script src="/files/js/jquery.min.js"></script>

<link href="/files/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" charset="utf-8">

$(function(){

    $('td').each(function(){
      a = $(this).html();
      b = a.length;

      if  (b > 500)
      {
      $(this).html('<div class="view" style="display:none">'+ a +'</div><div class="split">' + a.substr(0, 50) + ' <a href="javascript:void(0)" class="see">... <img src="/files/images/more.png"></a></div>');
      }


      });

    $('.see').click(function(){

      $(this).parent().hide();
      $(this).parent().parent().children('.view').show();

      });


});

</script>

</head>

<body>

<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="" style="">
      <a class="brand" href="/admin">Admin panel</a>
      <ul class="nav">
        <li><a href="/" target="_blank"><i class="icon-eye-open"></i> View your web</a></li>
        <li><a href="/admin_stat"><i class="icon-filter"></i> Statistic</a></li>
      </ul>
      <ul class="nav" style="float:right">
        <li><a href="/logout">Logout</a></li>
      </ul>
    </div>
  </div>
</div>


<div class="container-fluid" >

  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->

      <center>
        <a href="/admin_user/edit/<?php echo $this->session->userdata('user_id')?>">
          <b><?php echo $this->session->userdata('username'); ?></b>
        </a>
      </center>
      <br>
      <div class="well" style="max-width: 340px; padding: 8px 0;">
        <ul class="nav nav-list" style="background-color:whitesmoke">


          <li class="nav-header">Content</li>

          <li>
          <a href="/admin_data" title="Managing your Content">
            <i class="icon-th"></i> Data 
          </a>
          </li>


          <li>
          <a href="/admin_ddc" title="Managing your DDC Kategori">
            <i class="icon-th-list"></i> DDC Kategori 
          </a>
          </li>

<!--
          <li>
          <a href="/admin_apps" title="Managing your Content">
            <i class="icon-plane"></i> Apps
          </a>
          </li>

          <li>
          <a href="/admin_guest_book" title="Managing your Guest Book">
            <i class="icon-comment"></i> Guest Book
          </a>
          </li>

          <li>
          <a href="/admin_menu" title="Managing your Menu">
            <i class="icon-road"></i> Menu
          </a>
          </li>

          <li>
          <a href="/admin_banner" title="Managing your Banner">
            <i class="icon-gift"></i> Ads
          </a>
          </li>

          <li>
          <a href="/admin_front" title="Managing your Front page">
            <i class="icon-eye-open"></i> Front
          </a>
          </li>

          <li>
          <a href="/admin_category" title="Managing your Category">
            <i class="icon-folder-open"></i> Category
          </a>
          </li>
          <li>
          <a href="/admin_content" title="Managing your Content">
            <i class="icon-briefcase"></i> Content
          </a>
          </li>

          <li>
          <a href="/admin_tag" title="Managing your tag to every DB">
            <i class="icon-tags"></i> Tag
          </a>
          </li>
          <li>
          <a href="/admin_file" title="Managing your File">
            <i class="icon-file"></i> File
          </a>
          </li>
-->


          <li class="nav-header">System</li>

          <li>
          <a href="/admin_system" title="Managing your System">
            <i class="icon-th"></i> System
          </a>
          </li>
          <li>
          <a href="/admin_detail" title="Managing your User Admin">
            <i class="icon-asterisk"></i>  User Detail
          </a>
          </li>

          <li>
          <a href="/admin_user" title="Managing your User Admin">
            <i class="icon-user"></i>  User
          </a>
          </li>

        </ul>
      </div>






    </div>
    <div class="span10">
      <!--Body content-->
      <?php echo $content = (isset($content)) ? $content : ''; ?>
