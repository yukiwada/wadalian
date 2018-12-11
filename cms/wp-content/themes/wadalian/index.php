<?php get_header();?>

<?php if(is_single()){
  echo "<h1>シングルページでアリアス！</h1>";
}else{
  echo "<h1>それ以外です。</h1>";
}
?>

<?php if(is_single()){ ?>
  <h1>シングルページでアリアス！</h1>
  <?php }else{?>
    <h1>シングルページでアリアス！</h1>
  <?php } ?>
<pre>
<?php // var_dump($wp_query); ?>
<?php // var_dump(is_main_query()); ?>
<?php // var_dump($wp_query->have_posts()) ;?>
</pre>
<div class="content">
  <div class="tab_box is_show" id="summary">
    <div class="class_matome">
      <?php if(is_home() ||is_front_page()){?>
        <img src="http://placehold.it/900x300/1a3c53/" alt="">
      <?php }?>

      <?php if ( have_posts() ) : ?><!-- 記事があるかどうかを確認する -->
        <?php while ( have_posts() ) : the_post(); ?> <!-- 繰り返しを開始。記事がある場合は、その中から一つめを取得 -->
          <P><?php the_title();?></P>
          <p><?php the_category();?></p>
          <?php if(is_singular()){
            the_content();
          }else{
            the_excerpt();
          }?>
          <p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>
        <?php endwhile;?>
      <?php else: ?>
        <p>記事はありませんでした</p>
      <?php endif; ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
