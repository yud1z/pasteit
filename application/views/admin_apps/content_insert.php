<a href="/admin_apps/apps/<?php echo $arg = isset($arg) ? $arg : ''; ?>/insert" class="btn">
Add <?php echo $arg = isset($arg) ? str_replace('_', ' ', $arg) : ''; ?>
</a>
<div id="list_user">

  <fieldset id="List admin" style="min-height:460px;">
    <legend style="border:solid 0px white;">List <?php echo $arg = isset($arg) ? str_replace('_', ' ', $arg) : ''; ?></legend>
      <?php echo $row = (isset($row)) ? $row : ''; ?>
  </fieldset>
      <center>
        <?php echo $paging = (isset($paging)) ? $paging : ''; ?>
      </center>


</div>
