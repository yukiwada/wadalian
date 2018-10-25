<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
  img{
    max-width:100%;
    height: auto;
  }
  body {
    background-color: #f6f6f6;
  }
  
  .main {
    width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    text-align: center;
  }
  
  .title {
    border-bottom: 2px solid #000;
  }
  
  .content {
    text-align: left;
  }
  .copyright{
    text-align: center;
    margin: 50px 0;
    padding-top: 30px;
    border-top: 1px solid #ccc;
  }
  </style>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="main">
    <h1 class="title"><a href="/"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p>
    