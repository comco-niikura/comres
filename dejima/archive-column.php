<?php get_header(); ?>
<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > お役立ちコラム</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>お役立ちコラム</h1>
            </div>
        </div>
    </div>


    <div class="page-container">
        <section>
            <p>介護職員の方々向けのお役立ちコンテンツを掲載しています。</p>
        </section>
        <?php
        $args = array(
            'post_type' => 'column',
            'order' => 'DESC',
            'oderby' => 'post_date'
        );
        $the_query = new WP_Query( $args );
        $exist = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <?php if(post_custom('トピックス')==='ON'): ?>

                <?php
                $terms1 = get_the_terms( get_the_ID(), 'cat_column' );
                $terms2 = get_the_terms( get_the_ID(), 'tag_column' );
                ?>

                <?php $exist += 1; ?>
                <?php if($exist === 1){ ?>
                    <section>
                        <div class="archive-link-container">
                        <h2 class="heading-page01">おすすめのお役立ちコラム</h2>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="column01-item column02 d-flex flex-column flex-md-row">
                                <div class="d-flex flex-row justify-content-around">
                                    <div class="column01-thumb">
                                        <?php if(post_custom('サムネイル')): ?>
                                            <img src="<?php the_field('サムネイル'); ?>" />
                                        <?php else: ?>
                                            <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="column01-content">
                                        <p class="column01-client-date">投稿日：<?php the_time('Y年n月j日'); ?></p>
                                        <h3 class="column01-title"><?php echo post_custom('コラムタイトル'); ?></h3>

                                        <?php
                                        if($terms1) {
                                            ?>
                                            <div class="column01-category">
                                                <ul class="d-flex flex-row justify-content-start flex-wrap">
                                                    <?php
                                                    foreach ( $terms1 as $term ) {
                                                        echo '<li>'.$term->name.'</li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if($terms2) {
                                            ?>
                                            <div class="column01-tag">
                                                <ul class="d-flex flex-row justify-content-start flex-wrap">
                                                    <?php
                                                    foreach ( $terms2 as $term ) {
                                                        echo '<li>'.$term->name.'</li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <p class="btn-more-lg d-none d-md-block">もっと見る</p>
                            </div>
                        </a>

                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php
            wp_reset_postdata();

            if($exist!=0) {
                ?>
            </div>
        </section> <!-- page-inner-wrapper -->

        <?php
    }
    ?>

    <section>
        <div class="archive-link-container">
            <h4 class="latest-solution">コラム一覧</h4>
            <div class="archive-list-wrapper">

                <?php
                $args = array(
                    'post_type' => 'column',
                    'order' => 'DESC',
                    'oderby' => 'post_date'
                );
                $the_query = new WP_Query( $args );


                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    <?php
                    $terms1 = get_the_terms( get_the_ID(), 'cat_column' );
                    $terms2 = get_the_terms( get_the_ID(), 'tag_column' );
                    ?>

                    <a href="<?php the_permalink(); ?>">
                        <div class="column01-item column02 d-flex flex-column flex-md-row">
                            <div class="column01-inner d-flex flex-row">
                                <div class="column01-thumb">
                                    <?php if(post_custom('サムネイル')): ?>
                                        <img src="<?php the_field('サムネイル'); ?>" />
                                    <?php else: ?>
                                        <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="column01-content">
                                    <p class="column01-client-date">投稿日：<?php the_time('Y年n月j日'); ?></p>
                                    <h3 class="column01-title"><?php echo post_custom('コラムタイトル'); ?></h3>
                                    <?php
                                    if($terms1) {
                                        ?>
                                        <div class="column01-category">
                                            <ul class="d-flex flex-row justify-content-start flex-wrap">
                                                <?php
                                                foreach ( $terms1 as $term ) {
                                                    echo '<li>'.$term->name.'</li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <?php } ?>

                                    <?php
                                    if($terms2) {
                                        ?>
                                        <div class="column01-tag">
                                            <ul class="d-flex flex-row justify-content-start flex-wrap">
                                                <?php
                                                foreach ( $terms2 as $term ) {
                                                    echo '<li>'.$term->name.'</li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <p class="btn-more-lg d-none d-md-block">もっと見る</p>
                        </div>
                    </a>



                <?php endwhile; ?>
            <?php else: ?>
                <p>記事がありません</p>
            <?php endif; ?>
            <?php
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
</div>
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
