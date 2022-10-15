<?php get_header(); ?>

<main>
  <div class="page-title-container">
    <div class="bread-wrapper">
      <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > 検索結果</p>
    </div>
    <div class="page-title-wrapper">
      <div class="page-title-inner">
        <h1>検索結果</h1>
      </div>
    </div>
  </div>

  <div class="page-container">
    <section class="page-inner-wrapper">
      <?php if($_GET['s'] && $_GET['s'] !==' '){?>
        <h2 class="heading-page01"><?php echo '「'.get_search_query().'」の検索結果：' .$wp_query->found_posts. ' 件、ヒットしました。';?></h2>
        <?php if (have_posts()): ?>
          <?php query_posts($query_string.'&posts_per_page='.$wp_query->found_posts); ?>
          <?php while(have_posts()):the_post(); ?>
            <?php $post_type = get_post_type(get_the_ID());?>
            <div class="column01-item column02 d-flex flex-column flex-md-row">
              <div class="column01-inner d-flex flex-row">
                <div class="column01-thumb">
                  <?php if(post_custom('サムネイル')): ?>
                    <img src="<?php the_field('サムネイル'); ?>" />
                  <?php elseif(post_custom('製品画像')): ?>
                    <img src=<?php the_field('製品画像'); ?>>
                  <?php elseif(post_custom('スタッフ画像')): ?>
                    <img src=<?php the_field('スタッフ画像'); ?>>
                  <?php else: ?>
                    <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?> alt="">
                  <?php endif; ?>
                </div>
                <div class="column01-content">
                  <div class="column01-tag">
                    <ul class="d-flex flex-row justify-content-start flex-wrap">
                      <li><?php echo esc_html(get_post_type_object($post_type)->label);  ?></li>
                    </ul>
                  </div>
                  <?php if($post_type !== "staff"){?><p class="column01-client-date">投稿日：<?php the_time('Y年n月j日'); ?></p><?php }?>
                  <h3 class="column01-title"><?php echo the_title() ?></h3>
                  <div class="column01-category">
                    <ul class="d-flex flex-row justify-content-start flex-wrap">
                      <?php
                      if($post_type==="product" || $post_type ==="solution"){
                        if (mb_strlen(strip_tags(post_custom('サブタイトル')), 'UTF-8') > 80) {
                          $content = mb_substr(strip_tags(post_custom('サブタイトル')), 0, 80, 'UTF-8');
                          echo $content . '…';
                        } else {
                          echo strip_tags(post_custom('サブタイトル'));
                        }
                      }else if($post_type === "case"){
                        if (mb_strlen(strip_tags(post_custom('概要')), 'UTF-8') > 80) {
                          $content = mb_substr(strip_tags(post_custom('概要')), 0, 80, 'UTF-8');
                          echo $content . '…';
                        } else {
                          echo strip_tags(post_custom('概要'));
                        }
                      }else if($post_type === "staff"){
                        if (mb_strlen(strip_tags(post_custom('スタッフ紹介')), 'UTF-8') > 80) {
                          $content = mb_substr(strip_tags(post_custom('スタッフ紹介')), 0, 80, 'UTF-8');
                          echo $content . '…';
                        } else {
                          echo strip_tags(post_custom('スタッフ紹介'));
                        }
                      }else{
                        if (mb_strlen(strip_tags(get_the_content()), 'UTF-8') > 80) {
                          $content = mb_substr(strip_tags(get_the_content()), 0, 80, 'UTF-8');
                          echo $content . '…';
                        } else {
                          echo strip_tags(get_the_content());
                        }
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
              <?php if($post_type==="product"){
                if(post_custom('コラムリンク')): ?>
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
              <?php endif;
            }else if($post_type === "staff"){ ?>
              <a href="<?php echo esc_url( home_url ( '/staff#' .mb_strtolower(str_replace('．' ,'', post_custom('スタッフ名')))));?>"><p class="btn-more-lg">もっと見る</p></a>
            <?php }else{ ?>
            <a href="<?php the_permalink(); ?>"><p class="btn-more-lg">もっと見る</p></a>
            <?php }?>
          </div>

        <?php endwhile; ?>

        <?php
        if (function_exists("pagination")) {
          pagination($wp_query->max_num_pages);
        }
        ?>
      <?php else: ?>
        <p>検索されたキーワードに一致する記事はありませんでした</p>

      <?php endif; ?>
    <?php }else{?>
      <h2 class="heading-page01">検索ボックスに検索ワードを入れてください。</h2>
    <?php } ?>
  </section>
</div>
</main>
</div>
<?php get_footer(); ?>
