<?php get_header(); ?>
<div id="support" class="home-vision">
    <section class="support-kv">
      <p class="en">VISION</p>
      <h2>介護現場が<br>本来の業務に専念できるように</h2>
      <div class="support-kv-image-wrapper container">
        <div><img src="<?php echo get_template_directory_uri();?>/img/support-kv01.png"></div>
        <div><img src="<?php echo get_template_directory_uri();?>/img/support-kv02.png"></div>
        <div><img src="<?php echo get_template_directory_uri();?>/img/support-kv03.png"></div>
      </div>
    </section>
</div>

<main class="home-main">
    <section class="home-section-fluid-wrapper">
        <div class="page-container concept-container">
            <section class="concept-wrapper ver2">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-md-4">
                    <h2 class="text-center text-md-left"><span style="color: #21bf25;">COMRES〈コムレス〉</span>では、
                    <br>介護施設に働く方や運営をする方の課題に
                    <br>ICTで解決するソリューションをご提案します。
                    <br><span class="ict">※ICT = Information and Communication Technology（情報通信技術）</span>
                    </h2>
                    <div class="page-concept-image"><img src=<?php echo do_shortcode('[img]')."concept.png"; ?> alt=""></div>
                </div>
                <div class="item text d-flex flex-column flex-md-row justify-content-between">
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
                        <dd>「きずな」を深めます。<br>職員様の作業負担軽減により職員同士のコミュニケーション向上を図ります。入居者様・入居者家族様・職員様へのあんしんをITの力で解決いたします。</dd>
                    </dl>
                </div>
            </section>
        </div>
    </section>
    <section class="home-section-fluid-wrapper b-gray">
        <div class="pickup-container">
            <h2 class="top-pickup-tt"><i class="fa-solid fa-lightbulb"></i> おすすめソリューション</h2>
            <div class="pickup-wrapper d-flex flex-column flex-sm-row justify-content-between">
                <a href="<?php echo home_url();?>/solution/ict-support/"><img src=<?php echo do_shortcode('[img]')."slider05.png"; ?> alt="トータルサポート"></a>
                <a href="<?php echo home_url();?>/column/digital-transformation/"><img src=<?php echo do_shortcode('[img]')."slider02.png"; ?> alt="記録業務改善ソリューション"></a>
                <a href="<?php echo home_url();?>/solution/kaigo-recording/"><img src=<?php echo do_shortcode('[img]')."slider03.png"; ?> alt="労務管理ソリューション"></a>
            </div>
        </div>
    </section>
    <section class="b-gray mt-4">
        <div class="problem">
            <h2 class="top-sec-tt d-flex flex-row align-items-center">お悩み課題解決 <span class="top-sec-tt-en">COLUMN & SOLUTION</span></h2>
            <p class="top-sec-tt-p">こんなことでお困りではありませんか？</p>
            <div class="d-flex flex-row justify-content-between flex-wrap">
                <?php
                $args = array(
                    'post_type' => array('column','solution','case'),
                    'posts_per_page' => 6,
                    'order' => 'DESC',
                    'oderby' => 'post_date',
                    'meta_key' => 'トップページトピックス',
                    'meta_value' => 'ON'
                );
                $the_query = new WP_Query( $args );
                $exist = 0;
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    <article class="problem-item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="problem-thumb">
                                <?php if(post_custom('サムネイル')): ?>
                                <img src="<?php the_field('サムネイル'); ?>" />
                                <?php else: ?>
                                <img src=<?php echo do_shortcode('[img]')."no_image.png"; ?>>
                                <?php endif; ?>
                            </div>
                            <?php  $post_type = get_post_type();
                            if($post_type==='column') { ?>
                                <p class="problem-item-cat cat-column">お役立ちコラム</p>
                                <h3 class="problem-item-title"><?php echo post_custom('コラムタイトル'); ?></p>
                            <?php } elseif($post_type==='case') { ?>
                                <p class="problem-item-cat cat-base">導入施設</p>
                                <h3 class="problem-item-title"><?php echo post_custom('事例サブタイトル'); ?></p>
                            <?php } elseif($post_type==='solution') { ?>
                                <p class="problem-item-cat cat-product">ソリューション</p>
                                <h3 class="problem-item-title"><?php echo post_custom('サブタイトル'); ?></p>
                            <?php } ?>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php
            wp_reset_postdata();
            ?>
            </div>
        </div>
<!--         <div class="interview">
            <h2 class="top-sec-tt d-flex flex-row align-items-center">インタビュー <span class="top-sec-tt-en">INTERVIEW</span></h2>
            <div class="d-flex flex-row justify-content-between flex-wrap">
                <article class="interview-item">
                    <a href="">
                        <div class="interview-thumb">
                            <img src=<?php echo do_shortcode('[img]')."sample.png"; ?>>
                        </div>
                        <h3 class="interview-item-title">医療法人社団大坪会<br>介護老人保健施設ホスピア東和  様</h3>
                        <p class="interview-item-p">事務長　〇〇様　インタビュー</p>
                    </a>
                </article>
                <article class="interview-item">
                    <a href="">
                        <div class="interview-thumb">
                            <img src=<?php echo do_shortcode('[img]')."sample.png"; ?>>
                        </div>
                        <h3 class="interview-item-title">医療法人社団大坪会<br>介護老人保健施設ホスピア東和  様</h3>
                        <p class="interview-item-p">事務長　〇〇様　インタビュー</p>
                    </a>
                </article>
                <article class="interview-item">
                    <a href="">
                        <div class="interview-thumb">
                            <img src=<?php echo do_shortcode('[img]')."sample.png"; ?>>
                        </div>
                        <h3 class="interview-item-title">医療法人社団大坪会<br>介護老人保健施設ホスピア東和  様</h3>
                        <p class="interview-item-p">事務長　〇〇様　インタビュー</p>
                    </a>
                </article>
            </div>
        </div> -->
    </section>
    <?php
    $args = array(
        'post_type' => array('topics'),
        'posts_per_page' => 10,
        'order' => 'DESC',
        'oderby' => 'post_date'
    );
    $the_query = new WP_Query( $args );
    $exist = 0;
    if ( $the_query->have_posts() ) : ?>
    <section class="home-section-fluid-wrapper">
        <h2 class="top-sec-tt2 d-flex flex-row align-items-center">新着トピックス</h2>
        <p class="top-sec-tt-en2 text-center">TOPICS</p>
          <ul class="topics-wrapper">

      <?php
          while ( $the_query->have_posts() ) : $the_query->the_post();
          ?>
          <?php
          $terms1 = get_the_terms( get_the_ID(), 'cat_topics' );
          $term = "";
          if($terms1) {
                foreach ( $terms1 as $term ) {
                    $term = $term->name;
                        break;
                    }
          } ?>
          <li>
            <div><date><?php the_time('Y年n月j日'); ?></date><p class="topics-cat"><?php echo $term; ?></p></div>
            <a href="<?php the_permalink(); ?>"><?php echo post_custom('トピックスタイトル'); ?></a>
          </li>
          <?php endwhile; ?>
          <?php
            wp_reset_postdata();
          ?>
      </ul>
      <p class="btn-archive"><a href="<?php echo home_url();?>/topics/">トピックス一覧</a></p>
    </section>
    <?php endif; ?>
    <div class="solution-line"></div>
    <section class="home-section-fluid-wrapper top-solution-container">
        <div class="home-section">
            <div class="top-solution-wrapper d-flex flex-column flex-md-row justify-content-md-between">
                <div class="top-solution-text">
                    <h2 class="top-sec-tt text-center text-md-left">ソリューション</h2>
                    <p class="top-sec-tt-en2 text-center text-md-left">SOLUTION</p>
                    <p class="top-solution-p text-center text-md-left">介護施設のお悩みや課題を、長年の実績と信頼の<br class="d-none d-md-block">介護ソリューション専任チームが解決に向けて<br class="d-none d-md-block">お手伝いいたします。</p>
                    <p class="btn-archive"><a href="<?php echo home_url();?>/solution/">ソリューション一覧</a></p>
                </div>
                <div class="top-solution-img">
                    <img src=<?php echo do_shortcode('[img]')."top-sol.png";?>>
                </div>
            </div>
        </div>
    </section>
    <section class="home-section-fluid-wrapper top-product-container">
        <h2 class="top-sec-tt text-center">製品情報</h2>
        <p class="top-sec-tt-en2 text-center">PRODUCT</p>
        <!--         <p class="home-solution-p">いまとこれからの介護業務改善ソリューションをご提案いたします</p> -->
        <div class="home-section d-flex flex-row justify-content-around flex-wrap">
            <div class="product-item">
                <div class="">
                    <a href="<?php echo home_url();?>/product/#care-soft">
                        <img src=<?php echo do_shortcode('[img]')."product-icon.png";?>>
                        <h3>介護ソフト</h3>
                        <p class="btn-more">もっと見る</p>
                    </a>
                </div>
            </div>
            <div class="product-item">
                <div class="">
                    <a href="<?php echo home_url();?>/product/#online-tool">
                        <img src=<?php echo do_shortcode('[img]')."product-icon02.png";?> >
                        <h3>オンライン面会</h3>
                        <p class="btn-more">もっと見る</p>
                    </a>
                </div>
            </div>
            <div class="product-item">
                <div class="">
                    <a href="<?php echo home_url();?>/product/#watching-system">
                        <img src=<?php echo do_shortcode('[img]')."product-icon03.png"?> >
                        <h3>見守りシステム</h3>
                        <p class="btn-more">もっと見る</p>
                    </a>
                </div>
            </div>
            <div class="product-item">
                <div class="">
                    <a href="<?php echo home_url();?>/product/#labor-management">
                        <img src=<?php echo do_shortcode('[img]')."product-icon04.png";?> >
                        <h3>労務管理</h3>
                        <p class="btn-more">もっと見る</p>
                    </a>
                </div>
            </div>
        </div>
        <p class="btn-archive"><a href="<?php echo home_url();?>/product/">製品情報一覧</a></p>
    </section>
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
                            <p class="case-top-btn-more">この記事を詳しくみる <i class="fa-solid fa-angles-right"></i></p>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        <p class="btn-archive"><a href="<?php echo home_url();?>/case/">導入施設一覧</a></p>
        </div>
    </section>
    <section class="top-support home-section">
        <img class="d-md-none" src=<?php echo do_shortcode('[img]')."bg-top-support.png";?> alt="COMRESのトータルサポート">
        <div class="top-support-text">
            <h2 class="top-sec-tt text-center text-md-left">COMRESのトータルサポート</h2>
            <p>ICTの力で施設職員様を、ご利用者様を、ご家族様をご支援にするために、<br class="d-none d-md-block">検討から導入・運用まで、コムコ株式会社がトータルにサポートします。</p>
            <p class="btn-top-more"><a href="<?php echo home_url();?>/support/">もっと見る</a></p>
        </div>
    </section>


</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/slick.min.js"></script>
<script type="text/javascript">
$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 800;//スクロールスピード
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var adjust = -500;// 移動先を100px上にずらす
    var position = target.offset().top + adjust;
    //スムーススクロール
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });
});

$('.kv-slider').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    speed: 800,
    dots: true,
    arrows: true,
    infinite: true,
    pauseOnHover: false,
    /*----両サイドを表示----*/
    centerMode:true,
    centerPadding:"15%",
    /*----------------------*/
    responsive: [
      {
        breakpoint: 992,
        settings: {
        centerMode:true,
        centerPadding:"5%",
        },
      },
    ],
  });

</script>
<?php get_footer(); ?>
