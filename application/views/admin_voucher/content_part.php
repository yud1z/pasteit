<a href="/admin_voucher/insert" class="btn">
  Generate Voucher
</a>
<a href="/admin_voucher/excel" class="btn" style="float:right" title="Export as Excel">
  Export as Excel
</a>
<div id="list_user">

  <fieldset id="List admin" style="min-height:460px;">
    <legend style="border:solid 0px white;">List Voucher</legend>
      <?php echo $row = (isset($row)) ? $row : ''; ?>
  </fieldset>
      <center>
        <?php echo $paging = (isset($paging)) ? $paging : ''; ?>
      </center>


</div>
