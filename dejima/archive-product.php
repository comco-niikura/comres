<?php get_header(); ?>

<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > 製品情報</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>製品情報</h1>
            </div>
        </div>
    </div>


    <div class="page-container">
        <section>
            <p>介護施設に役立つ製品をご提供いたします。</p>
        </section>
        <section class="page-inner-wrapper">
            <h2 class="heading-page01">製品情報一覧</h2>
            <?php
                $titles = array("介護ソフト", "オンライン面会", "見守りシステム", "労務管理", "ICT", "介護業務支援", "省エネ");
                $terms = array("product-care-soft", "product-online-tool", "product-watching-system", "product-labor-management", "product-ict", "product-work-support", "product-energy-saving");
                $ids = array("care-soft", "online-tool", "system", "labor-management", "ict", "work-support", "energy-saving");
                ?>
            <div class="page-inner-category-wrapper d-flex flex-column flex-md-row flex-wrap">
                <?php for ($count = 0; $count < count($titles); $count++){ ?>
                    <div class="inner-link">
                        <a href="#<?php echo $ids[$count]; ?>"><?php echo $titles[$count]; ?></a>
                    </div>
                <?php } ?>
            </div>

            <?php for ($count = 0; $count < count($titles); $count++){ ?>
                <div id="<?php echo $ids[$count]; ?>" class="solution-list-container">
                    <h3><?php echo $titles[$count]; ?></h3>
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'cat_product',
                                    'field' => 'slug',
                                    'terms' => $terms[$count],
                                )
                            ),
                            'order' => 'ASC',
                            'meta_key'=> '表示順',
                            'orderby' => 'meta_value'
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
                                    <a href="<?php echo post_custom('コラムリンク'); ?>" target="_new" rel=”noopener”><p class="btn-more-lg btn-more-lg-reverse">製品サイト</p></a>
                                <?php } ?>
                            <?php else: ?>
                                <?php if(post_custom('製品リンク')){ ?>
                                    <a href="<?php the_permalink(); ?>"><p class="btn-more-lg">もっと見る</p></a>
                                <?php } else { ?>
                                    <a href="https://business.form-mailer.jp/fms/9b83c954179866" target="_new" rel=”noopener”id="inquiry_product"><p class="btn-more-lg orange">お問合せ</p></a>
                                <?php } ?>
                            <?php endif; ?>
                    </div>
                    <?php endwhile; ?>
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
        <div class="case">
            <h2 class="top-sec-tt d-flex flex-row align-items-center">最新導入施設 <span class="top-sec-tt-en">CASE</span></h2>
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
    </div>
    <?php get_footer(); ?>
