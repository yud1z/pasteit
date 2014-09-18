<div class="clear"></div>

   <div class="containers" style="margin-top:60px">
   <div class="line-separator"></div>
   <div class="scrollu">
   <a href="#myAnchor2" rel="" id="anchor2" class="anchorLink"><img src="/{path}files/images/scrollu.png" alt=""></a>
   </div>
   </div>



   <div class="clear" style="margin-bottom:50px"></div>


   <div class="containers"> 	

   <div class="eight columns">
   <!--bisa juga related article, tinggal ganti jadi Image-->
   <div class="imgorvid" style="min-width:460px;">
   &nbsp;
RELATED CONTENT<br>
The newest article that related, this week article , or newest.<br>

{footbar}
<h3><a href="/category/page/{category_value}/{content_id}/{url}">{content_title}</a></h3>
<img src="/{image_cache}" alt="">
  <br>
  <p>
  <a href="/category/page/{category_value}/{content_id}/{url}">{content_desc}
</a>
</p>
{/footbar}
</div>
<div class="clear"></div>
  {footbar1}
<div class="tworelated">
  <h3><a href="/category/page/{category_value}/{content_id}/{url}">{content_title}</a></h3>

  <p>
  <a href="/category/page/{category_value}/{content_id}/{url}">{content_desc}
</a>
</p>
</div>
{/footbar1}


</div>

<div class="eight columns">
  <div class="two columns stdf">
  <b>AVAILABLE</b><br>
  On Store
  </div>
  <div class="five columns stdf">
  <a href="/produk"><b>VISIT STORE</b></a>
  </div>
  {footbar_produk}
<div class="clear"></div>
  <br>
  <br>

  <div class="two columns books">  
  <img src="/{image_cache}" alt="">
  </div>
  <div class="five columns stdf">
  <a href="/produk/detail/{produk_id}/{url}"><h3>{content_title}</h3></a>
  <h6>{produk_harga_rupiah}</h6>
  <div class="clear"></div><br>
  <form action="/checkout" method="POST">
  <input type="hidden" name="code" value="{produk_id}">
  <input type="submit" class="buying" name="submit" value="Order">
  </form>
  </div>

    {/footbar_produk}

</div>
</div>


</div>
