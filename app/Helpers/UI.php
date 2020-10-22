<?php

namespace App\Helpers;

use File;
use ObjectCopy;
use Str;
use Util;

use App\ProductCategory;
use App\Setting;

class UI
{
  // Helpers
  public static function get_settings(){
    return Setting::all()->keyBy('name');
  }

  // Blogs
  public static function get_blog_image($id){
    $extensions = ['jpg', 'jpeg', 'png'];
    $path='assets/blog-imgs';

    foreach ($extensions as $extension) {
      $filename = $path.'/'.$id.'.'.$extension;
      if(File::exists(public_path().'/'.$filename)){
        return '/'.$filename;
      }
    }

    return null;
  }

  // Pagination
  public static function make_pagination(
    $current_page,
    $max_pages,
    $pagination_template,
    $active_class,
    $link_template,
    $offset=3
  ){

    $last_page = min(intval($offset/2)+1, $max_pages);

    for ($i=1; $i <= $last_page; $i++) {
      $pagination = $pagination_template;
      $pagination = str_replace('{{ data }}', strval($i), $pagination);

      if($current_page==$i){
        $pagination = str_replace('{{ active_class }}', $active_class, $pagination);
      }else{
        $pagination = str_replace('{{ active_class }}', '', $pagination);
      }

      $link = str_replace('{{ page }}', strval($i), $link_template);
      $pagination = str_replace('{{ link }}', $link, $pagination);
      $pagination = str_replace('{{ addon_attr }}', '', $pagination);

      echo $pagination;
    }


    if($current_page==$last_page && $current_page<$max_pages){
      $pagination = $pagination_template;
      $pagination = str_replace('{{ data }}', strval($current_page+1), $pagination);

      $pagination = str_replace('{{ active_class }}', '', $pagination);

      $link = str_replace('{{ page }}', strval($current_page+1), $link_template);
      $pagination = str_replace('{{ link }}', $link, $pagination);
      $pagination = str_replace('{{ addon_attr }}', '', $pagination);

      echo $pagination;

      $last_page++;
    }

    if($last_page<$max_pages){

      $next_page = $max_pages;
      $has_to_finish = false;

      if($current_page>$last_page){
        $next_page=$current_page;
        $has_to_finish = true;
      }

      if($next_page-intval($offset/2)>$last_page+1){
        $pagination = $pagination_template;
        $pagination = str_replace('{{ data }}', '...', $pagination);

        $pagination = str_replace('{{ active_class }}', '', $pagination);
        $pagination = str_replace('{{ link }}', '', $pagination);
        $pagination = str_replace('{{ addon_attr }}', 'return false;', $pagination);

        echo $pagination;
      }

      $starting_page = $next_page-intval($offset/2);

      if($next_page == $last_page+1){
        $starting_page = $next_page;
      }

      $for_limit = min($max_pages, $next_page+intval($offset/2));

      for ($i=$starting_page; $i <= $for_limit; $i++) {
        $pagination = $pagination_template;
        $pagination = str_replace('{{ data }}', strval($i), $pagination);

        if($current_page==$i){
          $pagination = str_replace('{{ active_class }}', $active_class, $pagination);
        }else{
          $pagination = str_replace('{{ active_class }}', '', $pagination);
        }

        $link = str_replace('{{ page }}', strval($i), $link_template);
        $pagination = str_replace('{{ link }}', $link, $pagination);
        $pagination = str_replace('{{ addon_attr }}', '', $pagination);

        echo $pagination;
      }
      $last_page=$for_limit;



      if($has_to_finish){
        $next_page = $max_pages;

        if($next_page-intval($offset/2)>$last_page+1){
          $pagination = $pagination_template;
          $pagination = str_replace('{{ data }}', '...', $pagination);

          $pagination = str_replace('{{ active_class }}', '', $pagination);
          $pagination = str_replace('{{ link }}', '', $pagination);
          $pagination = str_replace('{{ addon_attr }}', 'return false;', $pagination);

          echo $pagination;
        }

        $starting_page = max($next_page-intval($offset/2), $last_page+1);

        $for_limit = $max_pages;

        for ($i=$starting_page; $i <= $for_limit; $i++) {
          $pagination = $pagination_template;
          $pagination = str_replace('{{ data }}', strval($i), $pagination);

          if($current_page==$i){
            $pagination = str_replace('{{ active_class }}', $active_class, $pagination);
          }else{
            $pagination = str_replace('{{ active_class }}', '', $pagination);
          }

          $link = str_replace('{{ page }}', strval($i), $link_template);
          $pagination = str_replace('{{ link }}', $link, $pagination);
          $pagination = str_replace('{{ addon_attr }}', '', $pagination);

          echo $pagination;
        }
      }

    }
  }

}
