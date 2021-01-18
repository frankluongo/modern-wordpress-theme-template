<?php

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

function format_date( $date ) {
  return date('l, F jS', strtotime($date));
}

function make_excerpt($string) {
  $processed_string = strip_tags($string);
  $processed_string = substr($processed_string, 0, 250);
  $processed_string = "$processed_string...";
  return $processed_string;
}
