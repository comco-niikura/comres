<?php get_header(); ?>
<main>
    <?php if(have_posts()): while(have_posts()):the_post(); ?>


        <div class="page-title-container">
          <div class="bread-wrapper">
          <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <a href="<?php echo home_url();?>/solution/">ソリューション</a> > <?php the_field('ソリューション名'); ?></p>
          </div>
          <div class="page-title-wrapper">
            <div class="page-title-inner">
              <h1 class="text-md-center"><?php the_field('ソリューション名'); ?></h1>
              <p class="text-md-center"><?php the_field('サブタイトル'); ?></p>
            </div>
          </div>
        </div>




        <div class="page-container solution">
            <section>
                <p><?php echo post_custom('概要'); ?></p>
            </section>

            <?php
            for($i=1; $i<4; $i++) {
                $num = mb_convert_kana($i , 'A');
                $label = '見出し'.$num;
                ?>

                <?php if(post_custom($label)): ?>
                    <section class="page-inner-wrapper">
                        <h2 class="heading-page01"><?php the_field($label); ?></h2>
                        <?php if(post_custom($label.'項番１')): ?>
                            <div class="single-solution-point-list">
                                <ul>
                                    <li><?php the_field($label.'項番１'); ?></li>
                                    <?php if(post_custom($label.'項番２')): ?>
                                        <li><?php the_field($label.'項番２'); ?></li>
                                    <?php endif; ?>
                                    <?php if(post_custom($label.'項番３')): ?>
                                        <li><?php the_field($label.'項番３'); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(post_custom($label.'内容')): ?>
                            <?php the_field($label.'内容'); ?>
                        <?php endif; ?>
                        <?php if(post_custom($label.'画像')): ?>
                            <figure>
                                <img src="<?php the_field($label.'画像'); ?>" />
                            </figure>
                        <?php endif; ?>
                    </section>
                <?php endif; ?>
            <?php } ?>

            <!-- 関連製品 -->
            <?php $exist = 0; ?>
            <?php
            for($i=1; $i<4; $i++) {
                $num = mb_convert_kana($i , 'A');
                ?>
                <?php
                if(!post_custom('関連製品'.$num)) {
                    continue;
                }
                $product = post_custom('関連製品'.$num);
                ++$exist;
                ?>
                <?php if($exist==1) { ?>
                    <section>
                        <div class="archive-link-container">
                            <h4>関連製品</h4>
                        <?php } ?>

                        <?php
                        $args = array(
                            'posts_per_page' => 1,
                            'post_type' => 'product',
                            'meta_key' => '製品名',
                            'meta_value' => "$product"
                        );
                        $my_query = new WP_Query($args);
                        $exist_prduct = 0;
                        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
                        $exist_prduct = 1;

                        ?>
                        <div class="column01-item column02 d-flex flex-column flex-md-row">
                            <div class="column01-inner d-flex flex-row">
                                <div class="column01-thumb">
                                    <?php if(post_custom('製品画像')): ?>
                                        <img src="<?php the_field('製品画像'); ?>" />
                                    <?php else: ?>
                                        <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="column01-content">
                                    <p class="column01-client-date"><?php the_field('製品開発会社'); ?></p>
                                    <h3 class="column01-title"><?php the_field('製品名'); ?></h3>
                                    <p class="info"><?php the_field('サブタイトル'); ?></p>
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
                        </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>

                    <!-- 製品情報がない場合 -->
                    <?php if($exist_prduct==0) { ?>
                        <div class="column01-item column02 d-flex flex-column flex-md-row">
                            <div class="column01-inner d-flex flex-row">
                                <div class="column01-thumb">
                                    <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                                </div>
                                <div class="column01-content">
                                    <h3 class="column01-title"><?php the_field('関連製品'.$num); ?></h3>
                                </div>
                            </div>
                            <a href="https://business.form-mailer.jp/fms/9b83c954179866" target="_new"><p class="btn-more-lg orange" id="inquiry_solution">お問合せ</p></a>
                        </div>

                    <?php } ?>


                <?php } ?>

                <?php if($exist!=0) { ?>
                </div>
            </section>
        <?php } ?>

        <?php $exist = 0; ?>
        <?php
        for($i=1; $i<4; $i++) {
            $num = mb_convert_kana($i , 'A');
            ?>
            <?php
            if(!post_custom('関連導入事例'.$num)) {
                continue;
            }
            $case = post_custom('関連導入事例'.$num);
            $args = array(
                'posts_per_page' => 1,
                'post_type' => 'case',
                'meta_key' => '顧客名',
                'meta_value' => "$case"
            );
            $my_query = new WP_Query($args);
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
            ?>

            <?php $exist += 1; ?>
            <?php if($exist===1) { ?>
                <section>
                    <div class="archive-link-container">
                        <h4>関連導入施設</h4>
                        <div class="archive-list-wrapper">
                        <?php } ?>

                        <?php
                        $terms1 = get_the_terms( get_the_ID(), 'cat_case' );
                        $terms2 = get_the_terms( get_the_ID(), 'tag_case' );
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
                                        <p class="column01-client-date"><?php the_field('顧客名'); ?></p>
                                        <h3 class="column01-title"><?php the_field('事例タイトル'); ?></h3>

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
                                        <?php } ?>
                                    </div>
                                </div>
                                <p class="btn-more-lg d-none d-md-block">もっと見る</p>
                            </div>
                        </a>
                    <?php endwhile; endif; wp_reset_postdata(); ?>

                <?php } ?>
                <?php if($exist!=0) { ?>

                </div>
            </div>
        </section>
    <?php } ?>

    <?php
    $exist = 0;
    for($i=1; $i<4; $i++) {
        $num = mb_convert_kana($i , 'A');
        ?>
        <?php
        if(!post_custom('関連コラム'.$num)) {
            continue;
        }
        $title = post_custom('関連コラム'.$num);


        $args = array(
            'posts_per_page' => 1,
            'post_type' => 'column',
            'meta_key' => 'コラムタイトル',
            'meta_value' => "$title"
        );
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
        ?>
        <?php $exist += 1; ?>
        <?php if($exist===1) { ?>
            <section>
                <div class="archive-link-container">
                    <h4>関連コラム</h4>
                <?php } ?>

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
                                <p class="column01-client-date">投稿日：<?php the_date(); ?></p>
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
                                    <p>
                                        <?php
                                        //brだけ残す
                                        if(mb_strlen($post->post_content, 'UTF-8')>50){
                                            $content= mb_substr(strip_tags($post->post_content, '<br>'), 0, 50, 'UTF-8');
                                            echo $content.'……';
                                        }else{
                                            echo strip_tags($post->post_content, '<br>');
                                        }
                                        ?>
                                    </p>
                                <?php } ?>

                            </div>
                        </div>
                        <p class="btn-more-lg d-none d-md-block">もっと見る</p>
                    </div>
                </a>
            <?php endwhile; endif; wp_reset_postdata(); ?>

        <?php } ?>
        <?php if($exist!=0) { ?>
        </div>
    </section>
<?php } ?>
</div>
</div>


<?php endwhile; ?>
<?php else: ?>
    <p>記事がありません</p>
<?php endif; ?>

<p class="btn-archive"><a href="<?php echo home_url();?>/solution/">ソリューション一覧</a></p>

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
