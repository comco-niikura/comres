<?php get_header(); ?>
<main>
<?php if(have_posts()): while(have_posts()):the_post(); ?>
    <?php
    $terms1 = get_the_terms( get_the_ID(), 'cat_case' );
    $terms2 = get_the_terms( get_the_ID(), 'tag_case' );
    ?>


    <div id="case" class="page-title-container">
      <div class="bread-wrapper">
          <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <a href="<?php echo home_url();?>/case/">導入施設</a> > <?php echo post_custom('顧客名'); ?></p>
      </div>
      <div class="container-xl page-case-title-wrapper">
        <div class="page-case-title-inner d-flex flex-column-reverse flex-md-row">
          <div class="page-title-case-text">
            <img class="case-tt" src=<?php echo do_shortcode('[img]')."case-tt.png" ?>>
            <div class="case-title-container">
              <p class="sub-tt"><span><?php echo post_custom('事例サブタイトル'); ?></span></p>
              <h1><?php echo post_custom('事例タイトル'); ?></h1>
              <p class="cmp-name"><?php echo post_custom('顧客名'); ?> 事例</p>
            </div>
          </div>
          <div class="page-title-case-img">
            <img src=<?php echo wp_get_attachment_url(post_custom('画像')); ?>>
          </div>
        </div>
      </div>
    </div>

    <div id="single" class="page-container case-page-container">
    <section>
        <?php
            if($terms1 || $terms2) {
        ?>
        <div class="column01-category">
          <ul class="d-flex flex-row justify-content-md-center flex-wrap">
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

    </section>

    </div>




  <div class="page-container">
        <section id="single-editor" class="page-inner-wrapper">

            <section class="page-inner-wrapper">
                <h2 class="heading-page01 heading-page01_1 heading-page01-img3">顧客名</h2>
                <?php echo post_custom('顧客正式名称'); ?>
            </section>
            <section class="page-inner-wrapper">
                <h2 class="heading-page01 heading-page01_1 heading-page01-img3">導入先の概要</h2>
                <div class="case-outline">
                    <img src="<?php the_field('サムネイル'); ?>" />
                    <?php echo post_custom('導入先概要'); ?>
                </div>
            </section>
            <section class="page-inner-wrapper">
                <h2 class="heading-page01 heading-page01_1 heading-page01-img4">導入の経緯</h2>
                <?php echo post_custom('概要'); ?>
            </section>
            <?php if(post_custom('ユーザの声')): ?>
                <section class="page-inner-wrapper">
                    <h2 class="heading-page01 heading-page01_1 heading-page01-img5">ユーザの声</h2>
                    <?php echo post_custom('ユーザの声'); ?>
                </section>
            <?php endif; ?>
            <div class="case-outline">
                <?php if(post_custom('導入の狙い')): ?>
                    <section class="page-inner-wrapper_split">
                        <h2 class="heading-page01 heading-page01_1 heading-page01-img1">課題</h2>
                        <?php echo post_custom('導入の狙い'); ?>
                    </section>
                <?php endif; ?>
                <?php if(post_custom('解決策')): ?>
                    <section class="page-inner-wrapper_split">
                        <h2 class="heading-page01 heading-page01_1 heading-page01-img2">解決策</h2>
                        <?php echo post_custom('解決策'); ?>
                    </section>
                <?php endif; ?>
            </div>
            <?php if(post_custom('導入構成図')): ?>
                <section class="page-inner-wrapper">
                    <h2 class="heading-page01 heading-page01_1 heading-page01-img6">導入構成図</h2>
                    <img class="structure" src=<?php echo wp_get_attachment_url(post_custom('導入構成図')); ?>>
                </section>
            <?php endif; ?>
            <section class="page-inner-wrapper case-product">
                <h2 class="heading-page01 heading-page01_1 heading-page01-img7">納入した製品</h2>
                <?php echo post_custom('製品カテゴリ'); ?>
            </section>
            <?php if(post_custom('今後の展望')): ?>
                <section class="page-inner-wrapper">
                    <h2 class="heading-page01 heading-page01_1 heading-page01-img8">今後の展望</h2>
                    <?php echo post_custom('今後の展望'); ?>
                </section>
            <?php endif; ?>
            <?php if(post_custom('担当者コメント')): ?>
                <section class="page-inner-wrapper">
                    <h2 class="heading-page01 heading-page01_1 heading-page01-img9">担当者のコメント</h2>
                    <?php echo post_custom('担当者コメント'); ?>
                </section>
            <?php endif; ?>

      </section>

      </div>


  <?php endwhile; ?>
  <?php else: ?>
  <p>記事がありません</p>
  <?php endif; ?>
  <p class="btn-archive"><a href="<?php echo home_url();?>/case/">一覧へ戻る</a></p>
  <section class="banner-link home-section">
      <img class="d-md-none" src=<?php echo do_shortcode('[img]')."bg-banner-product.png";?> alt="製品情報">
      <div class="banner-link-text">
          <h2 class="sec-tt text-center text-md-left">製品情報</h2>
          <p>介護施設に働く方々の抱えるお悩みをICT製品を使って解決します。<br class="d-none d-md-block">ICT製品の検討・選定から導入・運用まで、<br class="d-none d-md-block">コムコ株式会社がトータルにサポートします。</p>
          <p class="btn-top-more"><a href="<?php echo home_url();?>/product/">製品情報</a></p>
      </div>
  </section>
<?php get_footer(); ?>
