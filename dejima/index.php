<?php
/*
Template Name: テンプレート
*/
?><?php get_header(); ?>
<main>
    <?php if ( have_posts() ) : ?>
      <?php while( have_posts() ) : the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <p><?php the_content(); ?></p>
      <?php endwhile;?>
    <?php endif; ?>
<?php get_footer(); ?>
