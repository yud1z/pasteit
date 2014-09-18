 <div id="form">

    <?php echo form_fieldset($head); ?>
      <?php echo $alert = (isset($alert)) ? $alert : ''; ?>
      <?php echo $content = (isset($content)) ? $content : ''; ?>
    <?php echo form_fieldset_close(); ?> 

</div>

