<?php get_header(); ?>

<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > 製品</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>製品</h1>
            </div>
        </div>
    </div>


    <div class="page-container">
        <section>
            <p>介護施設に役立つ製品をご提供いたします。</p>
        </section>
        <section class="page-inner-wrapper">
            <h2 class="heading-page01">製品一覧</h2>
            <?php
                $titles = array("介護ソフト", "オンライン面会", "見守りシステム", "労務管理", "ICT");
                $terms = array("product-care-soft", "product-online-tool", "product-watching-system", "product-labor-management", "product-ict");
                $ids = array("care-soft", "online-tool", "system", "labor-management", "ict");
                ?>
            <div class="page-inner-category-wrapper d-flex flex-column flex-md-row flex-wrap">
                <?php for ($count = 0; $count < 5; $count++){ ?>
                    <div class="inner-link">
                        <a href="#<?php echo $ids[$count]; ?>"><?php echo $titles[$count]; ?></a>
                    </div>
                <?php } ?>
            </div>

            <?php for ($count = 0; $count < 5; $count++){ ?>
                <div id="<?php echo $ids[$count]; ?>" class="solution-list-container">
                    <h3><?php echo $titles[$count]; ?></h3>
                    <!-- div class="column01-item column02 d-flex flex-column flex-md-row justify-content-around" -->
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'cat_product',
                                'field' => 'slug',
                                'terms' => $terms[$count],
                            )
                        )
                    );
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?>
                    <div class="column01-item column02 d-flex flex-column flex-md-row justify-content-around">
                            <div class="column01-inner d-flex flex-row" id="<?php the_field('製品名'); ?>">
                                <div class="column01-thumb">
                                    <?php if(post_custom('製品画像')): ?>
                                        <img src="<?php the_field('製品画像'); ?>" />
                                    <?php else: ?>
                                        <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="column01-content">
                                    <p class="column01-client-date"><?php echo post_custom('製品開発会社'); ?></p>
                                    <h3 class="column01-title"><?php echo post_custom('製品名'); ?></h3>
                                    <p class="info"><?php echo post_custom('製品説明'); ?></p>
                                </div>
                            </div>
                            <?php if(post_custom('コラムリンク')): ?>
                                <?php
                                $home_url = home_url();
                                $url = post_custom('コラムリンク');
                                if(strpos($url,$home_url) !== false){
                                    ?>
                                    <a href="<?php echo post_custom('コラムリンク'); ?>"><p class="btn-more-lg">もっと見る</p></a>
                                <?php } else { ?>
                                    <a href="<?php echo post_custom('コラムリンク'); ?>" target="_new" rel=”noopener”><p class="btn-more-lg">もっと見る</p></a>
                                <?php } ?>
                            <?php else: ?>
                                <a href=""><p class="btn-more-lg orange">お問合せ</p></a>
                            <?php endif; ?>
                            <?php endwhile; ?>
                    </div>
                        <?php else: ?>
                            <p>記事がありません</p>
                        <?php endif; ?>
                        <?php
                        wp_reset_postdata();
                        ?>
                </div>
            <?php } ?>
        </section>

        <section>
            <h2 class="text-center">最新ソリューション事例<br><span class="title-en">case</span></h2>
            <div class="home-section">
                <div class="column01-item">
                    <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'post_type' => 'case',
                        'order' => 'DESC',
                        'oderby' => 'post_date'
                    );
                    $my_query = new WP_Query($args);
                    $exist = 0;
                    if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                    $exist = 1;
                    ?>
                    <div class="d-flex flex-row justify-content-around">
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
                            <div class="column01-category">
                                <ul class="d-flex flex-row justify-content-start flex-wrap">
                                    <li>利用者家族様向けソリューション</li>
                                    <li>オンライン面会</li>
                                    <li>〜100床</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" target=”_new” rel=”noopener”><p class="btn-more-lg">もっと見る</p></a>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    </div>
    <?php get_footer(); ?>
