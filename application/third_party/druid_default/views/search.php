<div class="container">

    <h2 style="float:left;margin-top:10px;">Pencarian : </h2>
  <div class="twelve columns">
    <div align="right">
      <div id="tw-form-outer">
        <form action="/search" method="GET" id="tw-form" class="sb">    
          <input type="text" id="tw-input-text" name="query" value=''  style="margin-left:5px;" placeholder="search" /> 
          <input type="submit" id="tw-input-submit" value="" /> 
        </form>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="line-separator"></div>

  <div class="sixteen columns signintext">
    <span style="font-size:20px; color:#900"><b>Hasil Pencarian :</b></span>
    <br>
    <small>
      Terdapat {count} hasil pencarian; 
    </small>

    <div class="clear"></div>

    <div class="eight columns mt15">

      <!--hasil pencarian-->
      {value}
      <hr>
      <div class="judulSearch mt15">
        <a href="{pure_url}" class="mainh4">{content_title}</a>
      </div>
      <div class="clear"></div>
      <div class="urlSearch">
        <small><a href="{pure_url}">vamily.co.id{pure_url}</a></small>
      </div>
      <div class="hasil">
        {content_desc}
      </div>
      {/value}
      <!--end hasil pencarian-->
      <div id="sepa_time"></div>

    </div> 
    <div class="clear"></div>
    <div class="eight columns mt25" id="wrap_load" style="margin-top:50px;">
      <a href="javascript: void(0);" id="load_more"><img src="/{path}files/images/load.png" alt="load more"></a>
      <span id="loading" style="display:none"><img src="/{path}files/images/ajax-loader.gif" > Loading ...</span>
    </div>
  </div>
</div>


<div id="start" style="display:none">3</div>
<div id="string" style="display:none">{string}</div>

<script type="text/javascript" charset="utf-8">
  $(function(){

      function show_load(){$('#loading').show();$('#load_more').hide();}

      function fetch_valid(arg, val)
      {
        $.ajax({
            type:'POST',
            url:'/search/ajax/find',
            data:{string : arg, start : val},
            success:
            function(data)
            {
              if (data == '')
              {
                $('#wrap_load').hide();
              }
              else
              {
                // here parse the json
              d = $.parseJSON(data);
                $.each(d, function(i, item){
                    $('#sepa_time').before('<div class="judulSearch mt15">' +
                      '<hr><a href="'+ item.pure_url +'" class="mainh4">'+ item.content_title +'</a>' +
                  '</div>' +
                  '<div class="clear"></div>' +
                  '<div class="urlSearch">' +
                  '<a href="'+ item.pure_url +'">vamily.co.id'+ item.pure_url +'</a>' +
                  '</div>' +
                  '<div class="hasil">' +
                  ''+ item.content_desc +'' +
                  '</div>');
                  });
                $('#loading').hide();
                $('#load_more').show();
                q = $('#start').html();
                q = parseInt(q);
                q = q + 1;
                $('#start').html(q);
              }
              
            }
          });
        
      }




      $('#load_more').click(function(){
          show_load();
          fetch_valid($('#string').html(), $('#start').html());
        });
      });
</script>
