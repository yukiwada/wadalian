<?php get_header();?>
<pre>
  <?php //var_dump($wp_query); ?>
</pre>
<div class="content">
  <div class="tab_box is_show" id="summary">
    <div class="class_matome">

      <?php if ( have_posts() ) : ?>                  <!-- 記事があるかどうかを確認する -->

        <?php while ( have_posts() ) : the_post(); ?>
          <p><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></p>
          <p><?php the_category(); ?></p>
          <p><?php the_time('Y年n月j日'); ?></p>
          <?php the_content(); ?>
          <hr>
        <?php endwhile; ?>                            <!-- 繰り返しの最初に戻る -->
      <?php else : ?>                                 <!-- 記事がなかった場合の記述 -->
        <p>記事がありませんでした</p>                     <!-- この内容を表示 -->
      <?php endif; ?>                                 <!-- 記事があるかどうかを確認を終了 -->

      <ul>
        <?php
          $article_oldpost = get_posts('numberposts=3&orderby=post_date&order=ASC');
          foreach ($article_oldpost as $post) : setup_postdata($post);
        ?>
        <li>
          <?php the_time('Y年n月j日'); ?><br><a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        </li>
        <?php endforeach;
          wp_reset_postdata();?>
      </ul>
    </div>
  </div>
</div>
<?php get_footer(); ?>
