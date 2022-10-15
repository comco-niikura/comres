<section class="home-section-fluid-wrapper cv-wrapper">
  <div class="cv-content">
    <div class="home-section">
      <h2 class="text-center"><i class="fa-solid fa-headset"></i><br class="d-block d-lg-none">課題解決・ソリューションについて<br class="d-block d-lg-none">ご相談ください<i class="pc fa-solid fa-headset"></i></h2>
      <div class="cv-recomend-icon d-flex flex-row flex-wrap justify-content-center">
        <div class="item">
          <img src=<?php echo do_shortcode('[img]')."recomend-icon01.png"; ?> alt="">
          <p>記録業務軽減</p>
        </div>
        <div class="item">
          <img src=<?php echo do_shortcode('[img]')."recomend-icon02.png"; ?> alt="">
          <p>WiFi環境</p>
        </div>
        <div class="item">
          <img src=<?php echo do_shortcode('[img]')."recomend-icon03.png"; ?> alt="">
          <p>感染症対策</p>
        </div>
        <div class="item">
          <img src=<?php echo do_shortcode('[img]')."recomend-icon04.png"; ?> alt="">
          <p>コミュニケーション</p>
        </div>
      </div>
      <div class="cv-btn-wrapper d-flex flex-column flex-md-row justify-content-center align-items-center">
        <div class="item cv-form">
          <a href="https://business.form-mailer.jp/fms/9b83c954179866" target="_new" class="d-flex flex-row" id="inquiry_footer" data-gtm-click="inquiry_footer">
            <!-- <img src=<?php echo do_shortcode('[img]')."form.svg"; ?> alt=""> -->
            <i class="mail fa-solid fa-envelope faa-wrench animated"></i>
            <p>お問い合わせはこちら<i class="link fa-solid fa-arrow-up-right-from-square"></i></p>
          </a>
        </div>
        <div class="item">
          <a class="d-flex flex-row" href="tel:0338374871">
            <img src=<?php echo do_shortcode('[img]')."tel.svg"; ?> alt="">
            <p>03-3837-4871</p>
          </a>
          <div class="cv-p-mini">
            <p>営業時間 ／ 9:00～12:00、13:00～18:00</p>
            <p>（土・日・祝日・年末年始・夏季休暇を除く）</p>
          </div>
        </div>
      </div>
      <p class="covid-19"><a href="<?php echo content_url('comco'); ?>/files/covid19.pdf" target="_new">新型コロナウイルスの感染症拡大防止についてのお知らせ(PDF開く)</a></p>
      </div>
    <p class="page-top"><a href="#"></a></p>
  </div>
</section>

</main>

<footer>
<div id="footer">
  <div class="home-section">
    <div class="d-flex flex-column flex-md-row justify-content-between flex-wrap">
      <div class="footer-col">
        <ul>
          <li>
            <div class="item"><a href="<?php echo home_url();?>" style="color: #21bf25">COMRESトップページ</a></div>
            <div>
              <ul>
                <li><a href="<?php echo home_url();?>/concept/">COMRESとは？</a></li>
<!--                <li><a href="">担当スタッフ紹介</a></li> -->
                <li><a href="<?php echo home_url();?>/company/">企業情報</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li>
            <div class="item"><a href="<?php echo home_url();?>/solution/">ソリューション一覧<span class="ico-open"></span></a></div>
              <ul>
                <li>利用者家族様向けソリューション
                  <ul class="item-inner">
                      <?php
                      $args = array(
                          'post_type' => 'solution',
                          'posts_per_page' => 3,
                          'order' => 'DESC',
                          'oderby' => 'post_date',
                          'cat_solution' => 'care-user-family'
                      );
                      $the_query = new WP_Query( $args );
                      $exist = 0;
                      if ( $the_query->have_posts() ) :
                          while ( $the_query->have_posts() ) : $the_query->the_post();
                          ?>
                          <li><a href="<?php the_permalink(); ?>"><?php echo post_custom('ソリューション名'); ?></a></li>
                      <?php endwhile; ?>
                  <?php endif; ?>
                  <?php
                  wp_reset_postdata();
                  ?>
                  </ul>
                </li>
                <li>入居者様向けソリューション
                  <ul class="item-inner">
                      <?php
                      $args = array(
                          'post_type' => 'solution',
                          'posts_per_page' => 3,
                          'order' => 'DESC',
                          'oderby' => 'post_date',
                          'cat_solution' => 'care-user'
                      );
                      $the_query = new WP_Query( $args );
                      $exist = 0;
                      if ( $the_query->have_posts() ) :
                          while ( $the_query->have_posts() ) : $the_query->the_post();
                          ?>
                          <li><a href="<?php the_permalink(); ?>"><?php echo post_custom('ソリューション名'); ?></a></li>
                      <?php endwhile; ?>
                  <?php endif; ?>
                  <?php
                  wp_reset_postdata();
                  ?>
                  </ul>
                </li>
                <li>職員様向けソリューション
                  <ul class="item-inner">
                      <?php
                      $args = array(
                          'post_type' => 'solution',
                          'posts_per_page' => 3,
                          'order' => 'DESC',
                          'oderby' => 'post_date',
                          'cat_solution' => 'care-staff'
                      );
                      $the_query = new WP_Query( $args );
                      $exist = 0;
                      if ( $the_query->have_posts() ) :
                          while ( $the_query->have_posts() ) : $the_query->the_post();
                          ?>
                          <li><a href="<?php the_permalink(); ?>"><?php echo post_custom('ソリューション名'); ?></a></li>
                      <?php endwhile; ?>
                  <?php endif; ?>
                  <?php
                  wp_reset_postdata();
                  ?>
                  </ul>
                </li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li>
            <div class="item" style="color: #3bae36"><a href="<?php echo home_url();?>/product/">製品情報一覧<span class="ico-open"></span></a></div>
              <ul>
                <li><a href="<?php echo home_url();?>/product/#care-soft">介護ソフト</a></li>
                <li><a href="<?php echo home_url();?>/product/#online-tool">オンライン面会</a></li>
                <li><a href="<?php echo home_url();?>/product/#watching-system">見守りシステム</a></li>
                <li><a href="<?php echo home_url();?>/product/#labor-management">労務管理</a></li>
                <li><a href="<?php echo home_url();?>/product/#ict">ICT</a></li>
                <li><a href="<?php echo home_url();?>/product/#work-support">介護業務支援</a></li>
              </ul>
          </li>
        </ul>
      </div>
      <div class="footer-col">
        <ul>
          <li class="item"><a href="<?php echo home_url();?>/topics/">トピックス</a></li>
          <li class="item"><a href="<?php echo home_url();?>/case/">導入施設</a></li>
          <li class="item"><a href="<?php echo home_url();?>/column/">お役立ちコラム</a></li>
          <li class="item"><a href="<?php echo home_url();?>/support/">COMRSEのトータルサポート</a></li>
<!--          <li class="item"><a href="">コムコのトータルサポート</a></li> -->
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="footer-second">
  <div class="search-wrapper">
    <?php get_search_form(); ?>
  </div>
  <div class="footer-logo">
    <a href=""><img src=<?php echo do_shortcode('[img]')."logo-comres.svg"; ?> alt=""></a>
  </div>
  <div class="text-center corp_label">コムコ株式会社<span class="corp_label_address">東京都文京区湯島3-24-11 湯島北東ビル</span></div>
  <div class="link-corporate">
    <a href="https://comco.co.jp"  target="_new">Corporate site</a>
  </div>
  <ul class="d-flex flex-row justify-content-center">
    <li><a href="<?php echo home_url();?>/aboutsite/">サイトの利用</a></li>
    <li><a href="<?php echo home_url();?>/policy/">プライバシーポリシー</a></li>
    <li><a href="<?php echo home_url();?>/privacy/">個人情報保護方針</a></li>
  </ul>
  <p>&copy; COMCO Corporation. All rights reserved.</p>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="<?php echo do_shortcode('[tmpl]').'js/common.js'; echo '?' . filemtime(get_template_directory().'/js/common.js'); ?>" ></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>
<script type="text/javascript">
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 800;//スクロールスピード
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var adjust = -110;// 移動先を100px上にずらす
    var position = target.offset().top + adjust;
    //スムーススクロール
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 800;//スクロールスピード
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var adjust = -110;// 移動先を100px上にずらす
    var position = target.offset().top + adjust;
    //スムーススクロール
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

//column-copy
var clipboard = new Clipboard('.copy_btn');
    clipboard.on('success', function(e) {
    jQuery(".copy_btn").addClass('copied');
    jQuery(".copy_btn span").text('コピーしました');
    jQuery(".copy_text").slideDown('slow');
});
    clipboard.on('error', function(e) {
    jQuery(".copy_btn").addClass('copied not-copied');
    jQuery(".copy_btn span").text('コピーできませんでした');
    jQuery(".copy_text").slideDown('slow');
});

jQuery('#copy_textbox').on('click', function(e) {
  e.target.setSelectionRange(0, e.target.value.length);
});




</script>

<?php
wp_footer();
?>
<!-- HPF -->
<script type="text/javascript">
var _paq = _paq || [];
_paq.push(["trackPageView"]);
_paq.push(["enableLinkTracking"]);

(function() {
var u=(("https:" == document.location.protocol) ? "https" : "http") +
"://wa2.hot-profile.com/010429/";
_paq.push(["setTrackerUrl", u+"010429.php"]);
_paq.push(["setSiteId", "11899230"]);
var d=document, g=d.createElement("script"),
s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
g.defer=true; g.async=true; g.src=u+"010429.js";
s.parentNode.insertBefore(g,s);
})();
</script>
<!-- End HPF Code -->
</body>
</html>
