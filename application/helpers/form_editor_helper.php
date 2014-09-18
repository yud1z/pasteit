<?php


function form_editor($name = '', $val = '', $attr = '')
{
  return '
    <script src="/files/js/ckeditor/ckeditor.js"></script>
<textarea class="ckeditor" name="'. $name .'" '. $attr .'>'. $val .'</textarea>';  
}
