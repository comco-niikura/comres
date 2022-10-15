<!doctype html>
<html lang="ja">
<?php wp_head()?>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVF82VV');</script>
<!-- End Google Tag Manager -->

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta name="description" content="COMRES(コムレス)は、介護施設に働く方々・介護施設運営をする方々のために伴走型のお付き合いをさせていただく、ソリューションをお届けする情報サイトです。">
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:site" content="@ComcoOfficial" />
      <meta name="twitter:creator" content="@ComcoOfficial" />
      <meta property="og:type" content="article" />
      <meta property="og:title" content="介護施設をICTでサポートする「COMRES（コムレス）」" />
      <meta property="og:description" content="COMRES（コムレス）は、介護施設に働く方々・介護施設運営をする方々のために伴走型のお付き合いをさせていただく、ソリューションをお届けする情報サイトです。" />
      <meta property="og:site_name" content="COMRES" />
      <meta property="og:image" content="<?php echo get_template_directory_uri();?>/img/concept.png" />
      <link rel="icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico" type="image/x-icon">
      <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/img/apple-touch-icon.png">
      <link rel="icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico" type="image/vnd.microsoft.icon">
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico" type="image/vnd.microsoft.icon">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@1,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css?Ver=7.3">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/support.css">
      <title>
      <?php
         if(!is_home()) {
             wp_title('|', true, 'right');
         }else{
             bloginfo('name');
         }
      ?>
      </title>
      <link rel="icon" href="<?php echo get_template_directory_uri();?>/img/favicon.ico">
      <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/img/apple-touch-icon.png">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/reset.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/slider.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/topics.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/remodal.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/remodal-default-theme.css">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/reset.css">
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css?20220208_1'); ?>">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/editor.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="<?php echo get_template_directory_uri();?>/js/remodal.min.js"></script>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/comco_style.css">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/simulation.css">
      <script src="<?php echo get_template_directory_uri();?>/js/simulation.js"></script>

      <link rel="canonical" href="https://comres.jp/" />
      <link rel="canonical" href="https://comres.jp/aboutsite/" />
      <link rel="canonical" href="https://comres.jp/company/" />
      <link rel="canonical" href="https://comres.jp/case/" />

<?php
    if( is_single( array(141, 135, 137, 134, 133, 132, 131, 130, 129, 125, 124, 123, 122, 119, 117, 114, 113, 111) )) {
        echo '<meta name="robots" content="noindex , nofollow" />';
    }
?>

<script id="_bownow_ts">
var _bownow_ts = document.createElement('script');
_bownow_ts.charset = 'utf-8';
_bownow_ts.src = 'https://contents.bownow.jp/js/UTC_d3952e80e3ab3fba4614/trace.js';
document.getElementsByTagName('head')[0].appendChild(_bownow_ts);
</script>

      <SCRIPT language="JavaScript">
          function popup_confirm01(){
              window.open("https://pro.form-mailer.jp/lp/eee1f4b0152171","_blank");
          }
      </SCRIPT>
  </head>
  <body>
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVF82VV"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

    <div id="header">
        <header>
            <a href="<?php echo home_url();?>/"><h2 class="logo"><img src=<?php echo do_shortcode('[img]')."logo-comres.svg"?> ></h2></a>
            <button type="button" class="btn_menu">
                <span></span><span></span><span></span>
            </button>

            <?php // 投稿のスラッグを取得
             $page = get_post( get_the_ID() );
             $post_type = $page->post_type;
//             echo $post_type;
            ?>

            <div class="menu_wrap">
                <nav class="main_menu">
                    <ul>
                        <li><a <?php if(is_front_page() or is_home()) {?> class="active" <?php } ?> href="<?php echo home_url();?>/">トップ</a></li>
                        <li><a <?php if(!is_search() && $post_type==='topics') {?> class="active" <?php } ?> href="<?php echo home_url();?>/topics/">トピックス</a></li>
                        <li><a <?php if(!is_search() && $post_type==='solution') {?> class="active" <?php } ?> href="<?php echo home_url();?>/solution/">ソリューション</a></li>
                        <li><a <?php if(!is_search() && $post_type==='product') {?> class="active" <?php } ?> href="<?php echo home_url();?>/product/">製品</a></li>
                        <li><a <?php if(!is_search() && $post_type==='case') {?> class="active" <?php } ?> href="<?php echo home_url();?>/case/">導入施設</a></li>
                        <li><a <?php if(!is_search() && $post_type==='column') {?> class="active" <?php } ?> href="<?php echo home_url();?>/column/">お役立ちコラム</a></li>
                        <li><a <?php if(!is_search() && $_SERVER['REQUEST_URI']==='/support/') {?> class="active" <?php } ?> href="<?php echo home_url();?>/support/">トータルサポート</a></li>
                        <p><a class="d-none d-lg-block btn btn-lg btn-primary" href="https://pro.form-mailer.jp/fms/7657f246153238" target="_blank" role="button" id="inquiry_header">お問合せ</a></p>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
