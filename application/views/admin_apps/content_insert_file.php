<fieldset id="Add the File">
  <legend>Add the File</legend>

  <form action="/admin_apps/apps/<?php echo $arg = (isset($arg)) ? $arg : ''; ?>/<?php echo $node = (isset($node)) ? $node : ''; ?>/insert_file" method="post" enctype="multipart/form-data">
    Send these files:<br />
    <div class="fileme"><input name="userfile[]" type="file" /><br/></div>
    <div id="separator"></div>

    <a href="javascript:void(0)" id="add_file"><img src="/files/images/add_file.gif"> <small>Add More File</small></a>
    <br>
    <br>

    <input type="hidden" name="type" value="file" class="btn"/>
    <input type="submit" value="Send files & finish it" class="btn"/>
  </form>

</fieldset>


<script type="text/javascript" charset="utf-8">

  $(function(){
      $('#add_file').click(function(){
        
       var a = $('.fileme').html(); 
       $('#separator').after(a);
       });
      });
  
</script>
