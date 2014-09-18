<?php

  function dict()
  {
    $xml = simplexml_load_file('application/controllers/dict.xml');
    $dict = $xml->text->body->termEntry;
    $array = array();
    foreach ($dict as $key) {
      $wel = (array)$key->langSet->term;
      $array[] = $wel[0];
    }
    return $array;
  }

