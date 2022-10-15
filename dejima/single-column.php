<?php get_header(); ?>
<main>
  <?php if(have_posts()): while(have_posts()):the_post(); ?>
    <?php
    $terms1 = get_the_terms( get_the_ID(), 'cat_column' );
    $terms2 = get_the_terms( get_the_ID(), 'tag_column' );
    ?>

    <div class="page-title-container">
      <div class="bread-wrapper">
        <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <a href="<?php echo home_url();?>/column/">お役立ちコラム</a> ><?php echo post_custom('コラムタイトル'); ?></p>
      </div>
      <div class="page-title-wrapper">
        <div class="page-title-inner">
          <h1 class="text-md-center"><?php echo post_custom('コラムタイトル'); ?></h1>
        </div>
      </div>
    </div>
    <div id="single" class="page-container single-column">
      <section class="date-wrapper text-md-center">
        <p>投稿日：<?php the_date(); ?></p>
        <p>更新日：<?php the_modified_date(); ?></p>
      </section>
      <section class="mt-2">
        <?php
        if($terms1) {
          ?>
          <div class="column01-category">
            <ul class="d-flex flex-row justify-content-md-center flex-wrap">
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
            <ul class="d-flex flex-row justify-content-md-center flex-wrap">
              <?php
              foreach ( $terms2 as $term ) {
                echo '<li>'.$term->name.'</li>';
              }
              ?>
            </ul>
          </div>
        <?php } ?>

      </section>
      <section id="single-editor" class="page-inner-wrapper">
        <figure class="top">
          <?php if(post_custom('サムネイル')): ?>
            <img src="<?php the_field('サムネイル'); ?>" />
          <?php else: ?>
            <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
          <?php endif; ?>
        </figure>
        <?php the_content(); ?>
      </section>
      <div>
        <p class="sns-area-title">記事をシェアする</p>
        <div class="sns-area-inner">
          <div class="sns-area-item">
            <a href="https://twitter.com/share?url=<? echo get_the_permalink(); ?>&text=<? echo get_the_title(); ?>" class="sns_tw" target="_blank" id="sns_tw" >
              <i class="fab fa-twitter icon_tw" aria-hidden="true"></i>
            </a>
          </div>
          <div class="sns-area-item">
            <a href="http://www.facebook.com/share.php?u=<? echo get_the_permalink(); ?>" class="sns-button sns_fa" target="_blank" id="sns_fa" >
              <i class="fab fa-facebook-f icon_fb" aria-hidden="true"></i>
            </a>
          </div>
          <div class="sns-area-item">
            <a href="https://social-plugins.line.me/lineit/share?url=<? echo get_the_permalink(); ?>" class="sns-button sns_line" target="_blank" id="sns_line">
              <i class="fab fa-line icon_line" aria-hidden="true"></i>
            </a>
          </div>
          <div class="sns-area-item">
            <a href="https://getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>" class="sns-button sns_pc" target="_blank" id="sns_pc">
              <i class="fab fa-get-pocket" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="author-wrapper">
        <p class="blog-share-title">この記事のURLをコピーする</p>
        <?php echo do_shortcode('[copy_btn]'); ?>
        <p class="blog-share-title">この記事を書いた人</p>
        <div class="d-flex flex-row justify-content-center">
          <div class="author-img">
            <?php echo get_avatar(get_the_author_meta('ID'));?>
          </div>
          <div class="author-info">
            <p class="name01"><?php the_author_nickname(); ?></p>
            <p class="name02"><?php the_author_lastname(); ?> <?php the_author_firstname(); ?></p>
            <p class="author-p"><?php the_author_meta('user_description'); ?></p>
            <a href = "<?php echo home_url();?>/staff#<?php echo get_the_author_meta('initial'); ?>">
              <p class="staff-more">スタッフ紹介を見る</p>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>記事がありません</p>
  <?php endif; ?>

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
                <?php } ?>

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
