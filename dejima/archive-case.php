<?php get_header(); ?>

    <main>
        <div class="page-title-container">
          <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > 導入施設</p>
          </div>
          <div class="page-title-wrapper">
            <div class="page-title-inner">
              <h1>導入施設</h1>
            </div>
          </div>
        </div>


      <div class="page-container">
        <section>
          <p>これまでのお取引様の導入事例をご紹介いたします。</p>
        </section>
        <section>
          <div class="archive-link-container">
          <h2 class="heading-page01">クローズアップ</h2>
              <?php
              $args = array(
                'post_type' => 'case',
              );
              $the_query = new WP_Query( $args );
              if ( $the_query->have_posts() ) :
                  while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>

              <?php if(post_custom('トピックス')==='ON'): ?>

                  <?php
                  $terms1 = get_the_terms( get_the_ID(), 'cat_case' );
                  $terms2 = get_the_terms( get_the_ID(), 'tag_case' );
                  ?>

                  <a href="<?php the_permalink(); ?>">
                      <div class="column01-item">
                        <div class="d-flex flex-row justify-content-around">
                          <div class="column01-thumb">
                              <?php if(post_custom('サムネイル')): ?>
                                  <img src="<?php the_field('サムネイル'); ?>" />
                              <?php else: ?>
                                  <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                              <?php endif; ?>
                          </div>
                          <div class="column01-content">
                            <p class="column01-client-date"><?php echo post_custom('顧客名'); ?></p>
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
                            <?php } ?>
                          </div>
                        </div>
                        <p class="btn-more-lg d-none d-md-block">もっと見る</p>
                      </div>
                  </a>
              <?php endif; ?>
              <?php endwhile; ?>
              <?php else: ?>
                  <p>記事がありません</p>
              <?php endif; ?>
              <?php
                  wp_reset_postdata();
               ?>
          </div>
        </section>
        <section>
          <div class="archive-link-container">
            <h4 class="latest-solution">導入施設一覧</h4>
                <?php
                $args = array(
                  'post_type' => 'case',
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                ?>

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
                                <p class="column01-client-date"><?php echo post_custom('顧客名'); ?></p>
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
                                <?php } ?>
                            </div>
                        </div>
                        <p class="btn-more-lg d-none d-md-block case-btn">もっと見る</p>
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
        </section>
        <section class="banner-link home-section">
            <img class="d-md-none" src=<?php echo do_shortcode('[img]')."bg-banner-product.png";?> alt="製品情報">
            <div class="banner-link-text">
                <h2 class="sec-tt text-center text-md-left">製品情報</h2>
                <p>介護施設に働く方々の抱えるお悩みをICT製品を使って解決します。<br class="d-none d-md-block">ICT製品の検討・選定から導入・運用まで、<br class="d-none d-md-block">コムコ株式会社がトータルにサポートします。</p>
                <p class="btn-top-more"><a href="<?php echo home_url();?>/product/">製品情報</a></p>
            </div>
        </section>
    </div>

<?php get_footer(); ?>
