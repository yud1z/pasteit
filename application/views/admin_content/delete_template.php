<div>

<div class="form-actions">
  <h3>
    Are you sure want to delete this?
  </h3>
  <form method="post" action="<?php echo $url = (isset($url)) ? $url : '/'; ?>">
    <input type="hidden" name="id" value="<?php echo $id = (isset($id)) ? $id : '' ; ?>">
    <input type="submit" class="btn btn-danger" value="Yes, Delete">
    <a  href="javascript:window.history.back()" class="btn">Cancel</a>
</form>
</div>

</div> 
