<?php
/*
Template Name: 企業情報
*/
?>
<?php get_header(); ?>

<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > 企業情報</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>企業情報</h1>
            </div>
        </div>
    </div>
    <div class="page-container">
        <section class="company-wrapper">
            <h3>企業情報</h3>
            <div class="company-list-wrapper">
                <dl>
                    <dt>商号</dt>
                    <dd>コムコ株式会社</dd>
                </dl>
                <dl>
                    <dt>本社所在地</dt>
                    <dd>〒113-0034<br>東京都文京区湯島3-24-11 湯島北東ビル</dd>
                </dl>
                <dl>
                    <dt>ホームページ</dt>
                    <dd><a href="https://comco.co.jp/" target="_blank">https://comco.co.jp/</a></dd>
                </dl>
                <dl>
                    <dt>代表電話</dt>
                    <dd>03-3837-4871</dd>
                </dl>
                <dl>
                    <dt>設立</dt>
                    <dd>1973年3月17日</dd>
                </dl>
                <dl>
                    <dt>資本金</dt>
                    <dd>1億円</dd>
                </dl>
                <dl>
                    <dt>従業員数</dt>
                    <dd>250名(2022年4月1日現在)</dd>
                </dl>
                <dl>
                    <dt>事業内容</dt>
                    <dd>システムインテグレーションサービス(情報システムの企画、設計、開発、導入、保守、運用など)、パッケージの開発、ならびにコンピュータ機器販売</dd>
                </dl>
            </div>
        </section>
    </div>
    <section>
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
