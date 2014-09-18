<script type="text/javascript" src="/files/js/str_replace.js"></script>
<script type="text/javascript" src="/files/js/json2.js"></script>
<script type="text/javascript" src="/register/ajax/place"></script>
<div class="clear"></div>

<div class="container container-twelve">
	
    <div class="four columns">
       <div class="arch">
      <a href="#"> Lihat Semua Posting</a>
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
                  <button type="submit" class="subscribe-submit">Subscribe</button>
                </form>
            </div>
	
</div>

<div class="clear"></div>

<div class="container">
<div class="lini"></div>
</div>
<div class="clear"></div>


  <div class="container container-sixteen" style="margin-top:40px;">
<div class="ten columns">

<div class="ten columns">
    <div class="qontain">
    	<div class="quotes">
        " {tweet} "
        </div>
    </div>
    
    <p>
                    Saya sangat menghargai dukungan anda untuk mewujudkan Indonesia Unggul.
                    <br>
Silakan isi form berikut ini dengan benar 
                    </p>
      <div class="five columns">   
      <form method="POST" action="/pendaftaran_relawan/success">          
      Nama Lengkap :<br>
      <input name="nama" type="text" style="margin-bottom:10px; width:100%">
      Alamat :<br>
       <textarea name="alamat" style="margin-bottom:10px; width:100%" rows="8" cols="40"></textarea>
       Propinsi :<br>
                <select name="province"  id="province">
                  <option id="null_province" value="-1">---</option>
                </select>
       Kabupaten :<br>
                <select name="state" id="state">
                  <option id="null_state" value="-1">---</option>
                </select>
       Kecamatan :<br>
                <select name="district" id="district">
                  <option id="null_district" value="-1">---</option>

                </select>
      Email :<br>
      <input name="email" type="text" style="margin-bottom:10px; width:100%">
      <input name="tipe" type="hidden" value="relawan" style="margin-bottom:10px; width:100%">
      No. Telepon :<br>
      <input name="no_telp" type="text" style="margin-bottom:10px; width:100%">
     
     </div>
     <div class="clear"></div>
     <div class="pagingline" style="margin-top:10px; padding-bottom:5px!important;padding-top:8px">
     <button type="submit" class="daftaran">Daftar</button>
</form>
     </div>
     
    </div>


<div class="clear"></div>
 <div class="container container-twelve">  
 <div class="linesection" style="margin-top:40px"></div>

        
        
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

<script type="text/javascript" charset="utf-8">
  $(function(){

    $('#ad_promo').hide();

      function rupiah(number)
      {
      if (isNaN(number)) return '';
      var str = new String(number);
      var result = '' ,len = str.length;            
      for(var i=len-1;i>=0;i--)
      {            
      if ((i+1)%3 == 0 && i+1!= len) result += '.';
      result += str.charAt(len-1-i);
      }        
      return 'Rp ' + result;
      }


      $.each(place, function(i, obj) {
        $('#null_province').after('<option id="null_province" value="'+ i +'">' +
          i.toUpperCase().replace('_', ' ').replace('__', ' ') +
          '</option>');
        });

      $('#province').change(function(){
          eval('var w = place.' + $(this).val()); 
          $('#null_state').nextAll().remove();
          $.each(w, function(i, obj) {
            $('#null_state').after('<option id="null_state" value="'+ i +'">' +
              str_replace('_', ' ', i.toUpperCase())+
              '</option>');
            });
          });

      $('#state').change(function(){
          var prov = $('#province').find(":selected").val();
          eval('var w = place.'+ prov + '.' + $(this).val()); 

          $('#null_district').nextAll().remove();

          $.each(w, function(i, obj) {
            $('#null_district').after('<option id="null_state" value="'+ obj +'">' +
              str_replace('_', ' ', i.toUpperCase())+
              '</option>');
            });
          });



});
</script>
