 <?php get_header();?>

<div class="content">
  <div class="tab_box is_show" id="summary">
    <div class="class_matome">

  <?php if(have_posts()):?>
    <!--記事があるかどうか確認する。-->

    <?php while(have_posts()): the_post(); ?>
      <h1><?php the_title();?></h1>
      <div><?php if(has_post_thumbnail()){the_post_thumbnail('thumbnail');}?></div>
      <?php $positionname=get_the_term_list($post -> ID, 'rool');
        echo $positionname;
      ?>
      <?php the_content();?>

      <table>
        <tr>
          <th>好きな食べ物</th>
          <td>
            <?php $foodname=SCF::get('food') ;
              echo esc_html($foodname);
            ?></td>
        </tr>
        <tr>
            <th>好きな勉強</th>
            <td>
              <?php $studyname=SCF::get('study') ;
                echo esc_html($studyname);
              ?></td>
        </tr>

      </table>

<?php endwhile;?>
<?php else :?>
  <p>記事がねーぞ</p>
<?php endif;?>

<?php get_footer(); ?>
