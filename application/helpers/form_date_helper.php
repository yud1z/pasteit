<?php
 

 function date_activate()
 {
   return '
     <link href="/files/js/datepicker/css/datepicker.css" rel="stylesheet"> 
     <script src="/files/js/datepicker/js/bootstrap-datepicker.js"></script>
     <script>
       $(function(){
         $(".mod_date").datepicker()
           .on("changeDate", function(ev){
             $(".mod_date").datepicker("hide");
       });
       
       });
     </script>


     ';
 }

 function timing($name = '')
 {
   $name = $name . '_time';

   return '
     <input type="text" name="'. $name .'" style="width:120px;" placeholder="time ex: 12:20 am">
     ';

 }

  function form_date($name = 'date', $class = 'date', $time = false)
  {
    if ($time == true) {

      return '
        <input type="text" style="margin-bottom:10px;width:100px;" name="'. $name .'" value="" class="'. $class .'">
        ' .  timing($name);

    }
    else {
      return '
        <input type="text" style="margin-bottom:10px;width:100px;" name="'. $name .'" value="" class="'. $class .'">
        ';
      
    }
  }

