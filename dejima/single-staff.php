<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()):the_post(); ?>

  <main>
    <div class="page-title-container">
      <div class="bread-wrapper">
        <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > スタッフ紹介</p>
      </div>
      <div class="page-title-wrapper">
        <div class="page-title-inner">
          <h1>スタッフ紹介</h1>
        </div>
      </div>
    </div>
    <div id="staff">
      <div class="page-container">
        <section class="concept-wrapper">
            <h2>スタッフのご紹介</h2>
            <div class="staff-info-container d-flex flex-column flex-lg-row justify-content-around">
              <div class="staff-photo">
                <?php if(post_custom('スタッフ画像')): ?>
                  <img src="<?php the_field('スタッフ画像'); ?>" />
                <?php else:?>
                  <img src=<?php echo do_shortcode('[img]')."staffpage-nophoto.png"; ?> alt="">
                <?php endif; ?>
              </div>
              <div class="staff-info-wrapper">
                <div class="staff-info-01">
                  <p class="stf01"><?php the_field('役職'); ?></p>
                  <p class="stf02"><?php the_field('スタッフ名'); ?></p>
                </div>
                <dl>
                  <dd>
                  <p class="staff-comment">
                    <?php the_field('スタッフ紹介見出し1'); ?>
                    <?php if(post_custom("スタッフ紹介見出し2")):?>
                      <br class="d-md-none">
                      <?php the_field("スタッフ紹介見出し2");?>
                    <?php endif; ?>
                  </p>
                    <?php the_field('スタッフ紹介')?>
                  </dd>
                </dl>
                <div>
                  <dt>業務実績</dt>
                  <dd>
                    <?php the_field('業務実績'); ?>
                  </dd>
                </div>
                <div class="staff-otherinfo-wrapper">
                  <dl>
                    <dt>出身地</dt>
                    <dd><?php the_field('出身地'); ?></dd>
                  </dl>
                  <dl>
                    <dt>資格</dt>
                    <dd><?php the_field('資格'); ?></dd>
                  </dl>
                  <dl>
                    <dt>趣味</dt>
                    <dd>
                      <?php the_field('趣味1'); ?>
                      <?php if(post_custom("趣味2")):?>
                        <br/>
                        <?php the_field("趣味2");?>
                      <?php endif; ?>
                      <?php if(post_custom("趣味3")):?>
                        <br/>
                        <?php the_field("趣味3");?>
                      <?php endif; ?>
                    </dd>
                  </dl>
                  <dl>
                    <dt>休日の過ごし方</dt>
                    <dd>
                      <?php the_field('休日の過ごし方1'); ?>
                      <?php if(post_custom("休日の過ごし方2")):?>
                        <br/>
                        <?php the_field("休日の過ごし方2");?>
                      <?php endif; ?>
                      <?php if(post_custom("休日の過ごし方3")):?>
                        <br/>
                        <?php the_field("休日の過ごし方3");?>
                      <?php endif; ?>
                    </dd>
                  </dl>
                </div>
              </div>
            </div>
          <div class="staff-bg-demo"></div>
          <div class="staff-fist-tt-wrapper">
            <h2>サポート実績多数の当社へ<br class="d-md-none">お気軽にご相談ください。</h2>
            <img src=<?php echo do_shortcode('[img]')."staffpage-all.jpg"; ?> alt="">
          </div>
        </section>
      </div>
    </div>
<?php endwhile; ?>
<?php else: ?>
<p>記事がありません</p>
<?php endif; ?>

<?php get_footer(); ?>
