<?php
 

  function captc()
  {

    $word = dict();
    shuffle($word);

    $vals = array(
      'img_path'	    => './files/captcha/',
      'img_url'	      => '/files/captcha/',
      'img_width'	    => 150,
      'img_height'    => 40,
      //'font_path'	  => './files/fonts/font4.ttf',
      'border'        => 10,
      'word'          =>  $word[0], 
      'expiration'    => 2700
    ); 
    $cap = create_captcha($vals);
    $_SESSION['word'] = trim($word[0]);

    return $cap['image'];

  }


