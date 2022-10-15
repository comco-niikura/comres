<?php get_header(); ?>

<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > ソリューション</p>
        </div>
        <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>ソリューション</h1>
            </div>
        </div>
    </div>
    <div class="page-container">
        <section>
            <p>介護施設のお悩みや課題を、<br class="d-none d-md-block">長年の実績と信頼の介護ソリューション専任チームが解決に向けてお手伝いいたします。</p>
            <p class="solution-problrem">こんなことでお困りではありませんか？</p>
            <ul class="solution-problrem-list">
                <li>介護記録が煩雑で何かよいソフトはない？</li>
                <li>施設の感染症対策がしたい。</li>
                <li>利用者家族様と入居者様のWEB面会ってどうすればいいの？</li>
                <li>施設内でのイベントをもっと通知したい。</li>
                <li>無線ルーターにパソコンを接続したい。</li>
                <li>ネットワークのセキュリティを強化したい。</li>
                <li>多すぎる無線関連の機器、何に使ってるの？</li>
                <li>モバイルノートパソコンはどれがおすすめ？</li>
                <li>ICTトラブル時の相談相手がいなくてどうしよう。</li>
                <li>施設の労務管理もっとシンプルにできないか？</li>
                <li>引っ越し、移転時何に気を付ける？どこに連絡するの？</li>
            </ul>
        </section>

        <section class="page-inner-wrapper">
            <?php
            $titles = array("利用者家族様向けソリューション", "入居者様向けソリューション", "職員様向けソリューション");
            $terms = array("care-user-family", "care-user", "care-staff");
            $ids = array("care-user-family", "care-user", "care-staff");
            ?>

            <h2 class="heading-page01">ソリューション一覧</h2>
            <div class="page-inner-category-wrapper d-flex flex-column flex-md-row flex-wrap">
                <?php for ($count = 0; $count < 3; $count++){ ?>
                    <div class="inner-link">
                        <a href="#<?php echo $ids[$count]; ?>"><?php echo $titles[$count]; ?></a>
                    </div>
                <?php } ?>
            </div>

            <?php for ($count = 0; $count < 3; $count++){ ?>
                <div id="<?php echo $ids[$count]; ?>" class="solution-list-container">
                    <h3><?php echo $titles[$count]; ?></h3>
                    <div class="solution-list-wrapper d-flex flex-column flex-sm-row flex-wrap">
                        <?php
                        $args = array(
                            'post_type' => 'solution',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'cat_solution',
                                    'field' => 'slug',
                                    'terms' => $terms[$count],
                                )
                            )
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) :
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                            ?>

                            <div class="solution-item-page">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if(post_custom('サムネイル')): ?>
                                        <img src="<?php the_field('サムネイル'); ?>" />
                                    <?php else: ?>
                                        <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                                    <?php endif; ?>
                                    <p class="sub-title"><?php echo post_custom('サブタイトル'); ?></p>
                                    <h4><?php echo post_custom('ソリューション名'); ?></h4>
                                    <p class="btn-more">もっと見る</p>
                                </a>
                            </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>記事がありません</p>
                        <?php endif; ?>
                        <?php
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>
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



<?php get_footer(); ?>
