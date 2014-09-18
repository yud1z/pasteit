  <script>
  
    (function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
  </script>
    
    <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>
    
 <script src="http://i.po.st/static/v3/post-widget.js#publisherKey=9eio0h9cj6pp8918m5v8" type="text/javascript"></script>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="clear"></div>

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
<div class="lini"></div>
</div>
<div class="clear"></div>


{value}
  <div class="container container-sixteen" style="margin-top:40px;">
<div class="ten columns">
  <div class="single-title">
      {content_title}
</div>
    <div class="clear"></div>
    <div class="beardcumb"><a href="/">Beranda</a> / <a href="/{category_url}">{category}</a></div>
    <div class="clear"></div>
    <div class="date">{date_time_hour}</div>
    <div class="clear"></div>
    
    <div class="eight columns" style="margin-top:20px; margin-left:-5px">
        <div class="pw-widget pw-counter-none">
  <a class="pw-button-facebook pw-look-native"></a>
  <a class="pw-button-twitter pw-look-native"></a>
  <a class="pw-button-email pw-look-native"></a>
    </div>
        </div>
      <div class="one column" style="margin-top:20px">
      <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-gry20.png" alt="Print Friendly and PDF"/></a>
        </div>
    <div class="clear"></div>
    <div class="sline"></div>
    
    <div class="pembuka">
      {content_desc}
    </div>
    <div class="clear"></div>
    <p class="simage">
     <img class="conmage" src="/{file_folder}{file_name}" alt=""> {content}  {/value}
<!--fb comment-->
<div class="fb-comments" data-href="{all_url}" style="width:100%!important;"></div>
<!--end comment-->


<div class="clear"></div>
 <div class="container container-twelve">  
 <div class="linesection" style="margin-top:40px"></div>

{similiar_produk}
 	<div class="four columns mbt">
        	<div class="boxesstore">
            	<div class="cobox">
                <a href="/produk/detail/{produk_id}"><img src="/{image_strip}" alt=""></a>
                    <div class="txtshop">
                    <h6><a href="/produk/detail/{produk_id}">{content_title}</a></h6>
                   {content_desc}
                   
                   <br><br><a href="/produk/detail/{produk_id}" class="detlink">[Selengkapnya..]</a>
                    </div>
                    
                    <!--bagian block harga dan tombol beli-->
                    <div class="hargabrg">
                    	<div class="harga">
                         {produk_harga}
                        </div>
                        <div class="cartbuy">
                <form action="/promo" method="GET" id="checkout_{produk_id}">
                <input type="hidden" name="code" value="{produk_id}">
              </form>
              <button type="submit" form="checkout_{produk_id}" class="buttonow" style="position:absolute;margin-top:-20px;"></button>
                        </div>
                    </div>
                    <!--end explain-->
                    
                </div>
            </div>
        </div>
{/similiar_produk}
        
        
 </div>



</div>  

<div class="six columns">
    {ads}
      <div class="ads"><a href="{ads_link}" target="_blank" title="{ads_title}"><img src="/files/{ads_folder}/{ads_file}" alt="{ads_title}"></a></div>
    {/ads}
    <div class="clear"></div>
<!--
    <div class="sidebar">
      <div class="related">Related Link</div>
        <table width="100%">
   {footbar1} 
          <tr style="height:90px;">
              <td width="28%" class="vdle"><a href="/category/page/{category_value}/{content_id}/{url}"><img src="/{image_strip}" alt=""></a></td>
                <td width="65%" class="vlign" style="padding-left:10px"><h4><a href="/category/page/{category_value}/{content_id}/{url}" class="mainh4">{content_title}</a></h4>
                
                </td>
            </tr>
   {/footbar1} 
        </table>
    </div>
-->
</div>

</div>

<div class="clear"></div>
