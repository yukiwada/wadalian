<?php get_header();?>
<pre>
<?php // var_dump($wp_query); ?>
<?php // var_dump(is_main_query()); ?>
<?php // var_dump($wp_query->have_posts()) ;?>
</pre>
<div class="content">
  <div class="tab_box is_show" id="summary">
    <div class="class_matome">
      <?php if ( have_posts() ) : ?><!-- 記事があるかどうかを確認する -->
        <?php while ( have_posts() ) : the_post(); ?> <!-- 繰り返しを開始。記事がある場合は、その中から一つめを取得 -->
          <h2><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
          <?php if(has_post_thumbnail()){
            the_post_thumbnail();
          }else{?>
            <p>画像がないよ</p>
        <?php } ?>
          <?php the_time('Y年n月j日'); ?>              <!-- 日付を表示 -->
          <?php //the_category(); ?>                    <!-- カテゴリーを表示 -->
          <?php
            if(is_singular()){
              the_content();
            }else{
              the_excerpt();
            }
          ?>

          <hr>
        <?php endwhile;?>
      <?php else: ?>
        <p>記事はありませんでした</p>
      <?php endif; ?>
    </div>
  </div>
  <?php the_posts_pagination();?>
</div>

<?php get_footer(); ?>
