<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
  <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
      <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
        <head>

          <!-- Basic Page Needs
          ================================================== -->
          <meta charset="utf-8">
          <title>Ananda Caitra</title>
          <meta name="description" content="">
          <meta name="author" content="Nahason Jurun - Web Designer , Langi Yudistiara - Web Developer, Copyright by Ananda Caitra">

          <!-- Mobile Specific Metas
          ================================================== -->
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

          <!-- CSS Responsive
          ================================================== -->
          <link rel="stylesheet" href="/{path}files/stylesheets/base.css">
          <link rel="stylesheet" href="/{path}files/stylesheets/skeleton.css">
          <link rel="stylesheet" href="/{path}files/stylesheets/layout.css">
          <link rel="stylesheet" href="/{path}files/stylesheets/allfonts.css">
          <link rel="stylesheet" href="/{path}files/stylesheets/nahasonjurun.css">
          <link rel="stylesheet" href="/{path}files/stylesheets/tabs.css">
          <link rel="stylesheet" href="/{path}files/stylesheets/flexslider.css">


          <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
          <![endif]-->

          <!-- Favicons
          ================================================== -->
          <link rel="shortcut icon" href="/{path}files/images/favicon.ico">
          <link rel="apple-touch-icon" href="/{path}files/images/apple-touch-icon.png">
          <link rel="apple-touch-icon" sizes="72x72" href="/{path}files/images/apple-touch-icon-72x72.png">
          <link rel="apple-touch-icon" sizes="114x114" href="/{path}files/images/apple-touch-icon-114x114.png">

          <script type="text/javascript" src="/{path}files/javanesse/jqlatest.js"></script>

          <script>

            (function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
          </script>
        </head>
        <body>
          <?php echo (isset($unit_test)) ? $unit_test : "";?>


<!--section 1-->
<div class="top">
	<div class="container">
    	<a href="/index.php" title="home"><div class="eight columns logo"></div></a>
        <div class="six columns fr">
        	<div class="signinup">
        	<a href="/login" class="link1">Sign in</a>. Not a member yet? <a href="/register" class="link1">Sign up</a>.
        	</div>
            <div class="searchbar">
           	<form action="/search" method="GET" id="tw-form">    
                            <input type="text" id="tw-input-texts" name="query" onFocus="if(this.value=='search'){this.value='';}" onBlur="if(this.value==''){this.value='search';}" /> 
                            <input type="submit" id="tw-input-submit" value="" /> 
                        </form>
            </div>
        </div>
    </div>
</div>

<!--section 2-->
<div class="rectangle">
	<div class="container">
    	<div class="sixteen columns">
            <div class="login">
            <a href="/login" class="link1">Sign in</a>. Not a member yet? <a href="/register" class="link1">Sign up</a>.
            </div>
            <div class="cari">
           	<form action="/search" method="GET" id="tw-form">    
                            <input type="text" id="tw-input-texts" name="query" value='search' onFocus="if(this.value=='search'){this.value='';}" onBlur="if(this.value==''){this.value='search';}" /> 
                            <input type="submit" id="tw-input-submit" value="" /> 
                        </form>
            </div>
        </div>
    </div>
</div>

<!--section 3-->
<?php 
   if (isset($head)) {
     echo '<div class="wallpapper">';
   }
?>
	<div class="container">
    	<div class="navigasibar">
        	<div class="navcontainer">
            {menu}
            <div class="acordion">
           		<ul id="accordion">
                {menu_tiny}
            </ul>
            </div>
        </div>
    </div>
    <div class="shady"></div>
    </div>


<div class="clear"></div>
<!--section 4-->
<!--cart-->
<div class="sticky">
	<div class="items">
    ({cart})
    </div>
    <div class="clear"></div>
    <div class=" lihat">
    <a href="/checkout" id="view1">Items</a>
    </div>
    <div class="clear"></div>
    <div class=" lihat" style="margin-top:40px">
    <a href="/bookmark" id="view1">List</a>
    </div>
</div>
