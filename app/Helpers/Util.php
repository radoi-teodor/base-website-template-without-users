<?php

namespace App\Helpers;

class Util
{
  public static function to_permalink($string){

    $string = str_replace('ş', 's', $string);
    $string = str_replace('ţ', 't', $string);
    $string = str_replace('ă', 'a', $string);
    $string = str_replace('î', 'i', $string);
    $string = str_replace('â', 'a', $string);

    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    $slug = strtolower($slug);
    return $slug;
  }

  public static function reverse_permalink($string){
    $string = ucfirst(str_replace('-', ' ', $string));
    $string = ucfirst(str_replace('_', ' ', $string));
    return $string;
  }

  public static function is_null_or_empty($string){
    if($string==null || trim(strval($string))=='')
      return true;
    return false;
  }

  public static function is_null_or_empty_list($list){
    if($list==null || count($list)=='')
      return true;
    return false;
  }

  public static function clamp($current, $min, $max) {
    return max($min, min($max, $current));
  }
}
