<?php get_header(); ?>

<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > トピックス</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>トピックス</h1>
            </div>
        </div>
    </div>

    <section class="page-inner-wrapper">
     <section class="home-section-fluid-wrapper">
        <ul class="topics-wrapper">

        <?php
        $args = array(
            'post_type' => 'topics',
            'order' => 'DESC',
            'oderby' => 'post_date'
        );
        $the_query = new WP_Query( $args );


        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <?php
            $terms1 = get_the_terms( get_the_ID(), 'cat_topics' );
            $term = "";
            if($terms1) {
                  foreach ( $terms1 as $term ) {
                      $term = $term->name;
                          break;
                      }
            } ?>
            <li>
              <div><date><?php the_time('Y年n月j日'); ?></date><p class="topics-cat"><?php echo $term; ?></p></div>
              <a href="<?php the_permalink(); ?>"><?php echo post_custom('トピックスタイトル'); ?></a>
            </li>
        <?php endwhile; ?>
        <?php else: ?>
            <p>準備中</p>
        <?php endif; ?>
        <?php
        wp_reset_postdata();
        ?>
        </ul>
        <?php $count = wp_count_posts('topics')->publish;?>
          <?php if($count > 10): ?>
          <p class ="btn-archive">
            <a class="more-post" data-posttype ="topics" data-tmpdir ="<?php echo esc_url(get_template_directory_uri()); ?>">もっと読む</a>
          </p>
          <?php endif; ?>
     </section>
    </section>
    <section>
        <div class="case">
            <h2 class="top-sec-tt d-flex flex-row align-items-center">最新導入事例 <span class="top-sec-tt-en">CASE</span></h2>
            <div class="column01-item">
                <?php
                $args = array(
                    'posts_per_page' => 1,
                    'post_type' => 'case',
                    'order' => 'DESC',
                    'oderby' => 'post_date'
                );
                $my_query = new WP_Query($args);
                if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                ?>
                <?php
                $terms1 = get_the_terms( get_the_ID(), 'cat_case' );
                $terms2 = get_the_terms( get_the_ID(), 'tag_case' );
                ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="d-flex flex-row justify-content-around align-items-center">
                        <div class="column01-thumb">
                            <?php if(post_custom('サムネイル')): ?>
                                <img src="<?php the_field('サムネイル'); ?>" />
                            <?php else: ?>
                                <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                            <?php endif; ?>
                        </div>
                        <div class="column01-content">
                            <p class="column01-client-date"><?php the_field('顧客名'); ?> 様</p>
                            <h3 class="column01-title"><?php the_field('事例タイトル'); ?></h3>
                            <p class="info"><?php echo post_custom('事例サブタイトル'); ?></p>
                            <?php
                            if($terms1 || $terms2) {
                                ?>
                                <div class="column01-category">
                                    <ul class="d-flex flex-row justify-content-start flex-wrap">
                                        <?php
                                        if($terms1) {
                                            foreach ( $terms1 as $term ) {
                                                echo '<li>'.$term->name.'</li>';
                                            }
                                        }
                                        if($terms2) {
                                            foreach ( $terms2 as $term ) {
                                                echo '<li>'.$term->name.'</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            <p class="mt-2" style="color: #3bae36;">この記事を詳しくみる >></p>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        <p class="btn-archive"><a href="<?php echo home_url();?>/case/">導入施設一覧</a></p>
        </div>
    </section>
<?php get_footer(); ?>
