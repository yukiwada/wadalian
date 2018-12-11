<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="wp-content/themes/wadalian/dist/stylesheets/style.css">
  <?php theme_wada_script();?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="main">
    <h1 class="title"><a href="/"><?php bloginfo("name")?></a></h1>
    <p><?php bloginfo('description'); ?></p>
    <?php if(is_home()){ ?>
      <div><img src="https://placehold.jp/900x300.png"></div>
    <?php } ?>
