<?php get_header(); ?>
<main>
    <?php if(have_posts()): while(have_posts()):the_post(); ?>

        <div class="page-title-container">
            <div class="bread-wrapper">
                <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <?php the_title(); ?></p>
            </div>
            <div class="page-title-wrapper">
                <div class="page-title-inner">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="page-container">
            <section>
                <p><?php the_content(); ?></p>
            </section>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>記事がありません</p>
<?php endif; ?>
<?php
wp_reset_postdata();
?>

<?php get_footer(); ?>
