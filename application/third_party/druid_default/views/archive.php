<div class="container container-twelve">

<div class="four columns">
        <div class="arsipnya" style="margin-top:10px;">
	<a href="/pendaftaran_relawan" class="arsiplink">Pendaftaran Relawan</a>
    </div>
   </div>


<div class="four columns">
		<div class="searchbar">
           	<form action="/search" method="GET" id="tw-form">    
                            <input type="text" id="tw-input-texts" name="query" value="search" onfocus="if(this.value=='search'){this.value='';}" onblur="if(this.value==''){this.value='search';}"> 
                            <input type="submit" id="tw-input-submit" value=""> 
                        </form>
            </div>
     </div>

<div class="four columns">
            <form action="/pendaftaran_relawan/success_email" method="post" class="subscribe-form">
                  <input type="email" name="email" class="subscribe-input" placeholder="Email address" autofocus="">
                  <input type="hidden" name="tipe" value="" class="subscribe-input" placeholder="Email address" autofocus="">
                  <button type="submit" class="subscribe-submit">Subscribe</button>
                </form>
            </div>

</div>
<div class="clear"></div>


<div class="container">


	
<div class="overborder"></div>
<!--tabbing-->    
    <div class="tabs-wrapper" style="margin-top: -25px;">
    	<div align="center">


<div class="clear"></div>
    	
		<div class="container container-twelve">

<?php

$value = $this->_ci_cached_vars['value_tab'];

  $i = 0;

  foreach ($value as $key_run) {
      $i++;
      //echo '
 			//<div id="tab-body-'. $i .'" class="tab-body">
            //<div class="lineup">';

      
      $count_archive = count($key_run);

      if ($count_archive == 1) {


          foreach ($key_run as $value_sub) {

            echo '
              <div style="min-height:200px;margin:150px;">
                  <div class="clear"></div>
     <img  src="/'.$value_sub->file_folder . $value_sub->file_name.'" alt=""> '.$value_sub->content.'
              </div>
              '; 

          }

      }
      else {


        if (!empty($key_run)) {


          foreach ($key_run as $value_sub) {

            echo '
              <div class="four columns mb10 margone grey">
              <a href="/category/page/'. $value_sub->category_value .'/'.$value_sub->content_id.'/'.$value_sub->url.'" class="mainh4"><div class="boxmage"><img src="/'.$value_sub->image_strip.'"></div></a>
              <div class="texthere">
              <h4><a href="/category/page/'. $value_sub->category_value .'/'.$value_sub->content_id.'/'.$value_sub->url.'" class="mainh4">'.$value_sub->content_title.'</a></h4>
              <p>
              '.$value_sub->content_desc.'
              </p>
              </div>
              </div>';
          }
        }
        else {
          //echo '
            //<div id="" style="min-height:200px;margin:150px;">
            //<center>
            //<font style="color:grey">This page is empty</font>
            //<br>
            //<br>
            //<img src="/files/images/empty.png">
            //</center>
            //</div>
            //';
        }
      }


  echo '
			</div>
           
		<!--paging categori 2-->
           	<div class="linesection"></div>
            <!--pagination
             
             <ul id="pagination-flickr" style="margin-top:20px;">
               <li class="previouss-off">«Previous</li>
                <li class="active">1</li>
                <li><a href="?page=2">2</a></li>
                <li><a href="?page=3">3</a></li>
                <li><a href="?page=4">4</a></li>
                <li><a href="?page=5">5</a></li>
                <li><a href="?page=6">6</a></li>
                <li><a href="?page=7">7</a></li>
                <li class="nexts"><a href="?page=2">Next »</a></li>
            </ul>
            -->
           
            <!--end paging-->
            <div class="clear"></div>
			</div>       
        ';

  }
  

?>

		</div>
	</div>
    </div>
<!--end tabbing-->    
  
</div>

<script type="text/javascript" charset="utf-8">
  $(function(){
        //  DO::get the url without domain
        var path = window.location.pathname;
        //  DO::clear the css
        //$(".tab-head").css('background', '#009ADE');
        //$(".prek").css('background', '#009ADE');

        //  DO::set the css into the place
        //$("input[path='"+ path +"']").attr('style', 'background:#0059B2');
        //$("label[path='"+ path +"']").attr('style', 'background:#0059B2');

        //  TODO::set the content into the place
      });
</script>
