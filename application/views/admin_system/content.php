<div id="site_name">

  <h3>
    Site Name
  </h3>

  <form action="/admin_system" method="POST" accept-charset="utf-8">
    <input type="hidden" name="type" value="site_name">
    <textarea name="site_name" rows="8" cols="40" style="width:600px"><?php echo $site_name = (isset($site_name)) ? $site_name : ''; ?></textarea>
  <p><input type="submit" value="Update &rarr;" class="btn"></p>
  </form>
  
</div>

<hr>

<div id="default_image">
  
  <h3>
    Default Image
  </h3>

  <img src="/<?php echo $default_image = (isset($default_image)) ? $default_image : ''; ?>">
  <br>
  <form enctype="multipart/form-data" action="/admin_system" method="POST" accept-charset="utf-8">
    <input type="hidden" name="type" value="default_image">
    <input type="file" name="default_image" value="">
  <p><input type="submit" value="Update &rarr;" class="btn"></p>
  </form>

</div>

<hr>

<div id="metadata_site">
  
  <h3>
    Metadata Description
  </h3>


  <form action="/admin_system" method="POST" accept-charset="utf-8">
    <input type="hidden" name="type" value="metadata_desc">
    <textarea name="metadata_desc" rows="8" cols="40" style="width:600px"><?php echo $metadata_desc = (isset($metadata_desc)) ? $metadata_desc : ''; ?></textarea>
  <p><input type="submit" value="Update &rarr;" class="btn"></p>
  </form>

</div>

<hr>

<div id="metadata_keywords">
  
  <h3>
    Metadata Keywords
  </h3>

  <form action="/admin_system" method="POST" accept-charset="utf-8">
    <input type="hidden" name="type" value="metadata_key">
    <textarea name="metadata_key" rows="8" cols="40" style="width:600px"><?php echo $metadata_key = (isset($metadata_key)) ? $metadata_key : ''; ?></textarea>
  <p><input type="submit" value="Update &rarr;" class="btn"></p>
  </form>

</div>

<hr>

<div id="default_logo">
    
  <h3>
    Default Logo
  </h3>

  <img src="/<?php echo $default_logo = (isset($default_logo)) ? $default_logo : ''; ?>">
  <form enctype="multipart/form-data" action="/admin_system" method="POST" accept-charset="utf-8">
    <input type="hidden" name="type" value="default_logo">
    <input type="file" name="default_logo" value="">
  <p><input type="submit" value="Update &rarr;" class="btn"></p>
  </form>
</div>

<hr>

<div id="ico_image">
  
  <h3>
    Default ico image
  </h3>

  <img src="/<?php echo $default_ico = (isset($default_ico)) ? $default_ico : ''; ?>">
  <form action="/admin_system" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
    <input type="hidden" name="type" value="default_ico">
    <input type="file" name="default_ico" value="">
  <p><input type="submit" value="Update &rarr;" class="btn"></p>
  </form>
</div>
