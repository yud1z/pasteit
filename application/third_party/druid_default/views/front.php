<script type="text/javascript" charset="utf-8" src="/files/js/jquery-ui.js"></script>

<script>
$(function() {
    $( "#tabs" ).tabs();
    });
</script>

<div class="content">
  <div id="slider" class="nivoSlider">
    {front_slider}
    <a href="{content_resource}"><img src="/{file_folder}{file_name}" data-thumb="/{file_folder}{file_name}" alt="{content_desc}" title="{content_desc}" /></a>
    {/front_slider}
  </div>

  <div id="tabs">
    <ul>
      <li style="float:left"><a href="#tabs-1">Bahasa</a></li>
      <li style="float:left">&nbsp;&nbsp;|&nbsp;&nbsp;</li>
      <li style="float:none"><a href="#tabs-2">English</a></li>
    </ul>
    <div id="tabs-1">
      {narasi_bhs}
      {content}
      {/narasi_bhs}
    </div>
    <div id="tabs-2">
      {narasi_en}
      {content}
      {/narasi_en}
    </div>
  </div>


</div> <!-- akhir content -->

<div class="sidebar">
  <div class="form_login">
    <form method="POST" action="/login">
      <table>
        <tr>
          <td>Username</td><td>:</td>
          <td>
            <input type="text" name="username">
          </td>
        </tr>
        <tr>
          <td>Password</td><td>:</td>
          <td><input type="password" name="password"></td>
        </tr>
      </table>
      <input type="submit" value="login"/>
    </form>
  </div><!--  akhir form_login -->

  {marketing_list}
  <div class="market">
    {content}
  </div>
  {/marketing_list}

  <div class="statistik">
    <img src="/{path}/files/img/statistik.jpg">
    <br>
    <table>
      <tr>
        <td>533</td>
        <td><img src="/{path}/files/img/user.png"></td>
        <td>Total Hits Halaman</td>
      </tr>
      <tr>
        <td>533</td>
        <td><img src="/{path}/files/img/user.png"></td>
        <td>Total Pengunjung</td>
      </tr>
      <tr>
        <td>533</td>
        <td><img src="/{path}/files/img/user.png"></td>
        <td>Hits Hari Ini</td>
      </tr>
      <tr>
        <td>533</td>
        <td><img src="/{path}/files/img/user.png"></td>
        <td>Pengunjung Hari ini</td>
      </tr>
      <tr>
        <td>533</td>
        <td><img src="/{path}/files/img/user.png"></td>
        <td>Pengunjung Online</td>
      </tr>
    </table>
  </div> <!-- akhir statistik -->

</div> <!-- akhir sidebar -->
