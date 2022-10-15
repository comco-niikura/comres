<?php
/*
Template Name: コンセプト
*/
?>
<?php get_header(); ?>
<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > COMRESとは？</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>COMRESとは？</h1>
            </div>
        </div>
    </div>
    <div id="concept">
        <div class="page-container">
            <section class="concept-wrapper">
                <h2 class="text-lg-center"><span style="color: #21bf25;">COMRES</span>は、介護施設に働く方々・介護施設運営をする方々のために<br class="d-none d-md-block">伴走型のお付き合いをさせていただく、ソリューションをお届けする情報サイトです。</h2>
                <p class="concept-p01 text-md-left text-lg-center">善意を情報の力で拡散する</p>
                <p class="concept-p02 text-lg-center">ICT（Information and Communication Technology（情報通信技術））を使って介護施設のお悩みにお応えします。</p>
                <div class="concept-wrapper02 d-flex flex-column flex-md-row-reverse justify-content-between">
                    <div class="page-concept-image"><img src=<?php echo do_shortcode('[img]')."concept.png"; ?> alt=""></div>
                    <div class="item text">
                        <dl>
                            <dt><span>01</span>運営支援</dt>
                            <dd>現場を支える施設運営を支援します。<br>現行の業務改善するためのご提案や、介護職員の定着率アップを図るための情報をご提供いたします。</dd>
                        </dl>
                        <dl>
                            <dt><span>02</span>応援</dt>
                            <dd>介護現場で働く職員様を支援します。<br>介護職員の負担軽減を図る介護ソフトや、音声入力等で介護記録の手間を軽減し、入居者様へのケア向上につながるソリューションをご提案いたします。</dd>
                        </dl>
                        <dl>
                            <dt><span>03</span>息抜き</dt>
                            <dd>「きずな」を深めます。<br>職員様の作業負担軽減による職員同士のコミュニケーション向上、オンライン面会等で職員様・入居者様・入居者家族様の絆を深めます。</dd>
                        </dl>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="concept-case">
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
