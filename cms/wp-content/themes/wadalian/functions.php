<?php
  //管理画面上にアイキャッチ設定を設置
  add_theme_support('post-thumbnails');
  //アイキャッチのサイズを揃える
  add_image_size('category-thumb',450,9999);
  add_image_size('category-big',900,9999);

function wadalian_widgets_init(){
  register_sidebar(array(
    'name' => '和田ウィジットvo1',
    'id' => 'sidebar-1',
    'description' => '和田さんのウィジットです',
    'before_widget' => '<aside id=""%1$s class="widget%2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
  ));
}

add_action('widgets_init' ,'wadalian_widgets_init');


function theme_wada_script(){
  wp_enqueue_style('add_stylesheet', get_stylesheet_uri());
  wp_enqueue_script('add_script',get_template_directory_uri() .'/js/index.js',array('Jquery'),'1.0.0',true);
}

add_action('wp_enque_scripts' ,'theme_wada_scripts');
