<?php

/* サイトURL取得 */
function shortcode_url() {
    return get_bloginfo('url');
}
add_shortcode('url', 'shortcode_url');

/* uploads URL取得 */
function shortcode_up() {
    $upload_dir = wp_upload_dir();
    return $upload_dir['baseurl'];
}
add_shortcode('uploads', 'shortcode_up');

// imgォルダのパスを取得するショートコード
function get_img_url($atts, $content = null) {
return get_template_directory_uri().'/img/';
}
add_shortcode('img', 'get_img_url');

//
function get_tmpl_url($atts, $content = null) {
return get_template_directory_uri().'/';
}
add_shortcode('tmpl', 'get_tmpl_url');


// 投稿＆固定ページ　本文編集エリア非表示
add_action( 'init' , 'my_remove_post_editor_support' );
function my_remove_post_editor_support() {
  remove_post_type_support( 'post', 'editor' );//本文
//  remove_post_type_support( 'page', 'editor' );//本文
  remove_post_type_support( 'case', 'editor' );//本文
  remove_post_type_support( 'solution', 'editor' );//本文
  remove_post_type_support( 'staff', 'editor' );//本文
  remove_post_type_support( 'product', 'editor' );//本文
//  remove_post_type_support( 'column', 'editor' );//本文
}

function add_scripts() {
  wp_enqueue_script(
    'sim-script',
    get_template_directory_uri() . '/js/simulation.js'
  );
}
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function my_session_start(){
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        header('Expires: -1');
        header('Cache-Control:');
        header('Pragma:');
    }
}
add_action('init', 'my_session_start');

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


//URLコピーボタンのショートコード
function myshortcode_copy_btn() {
$title = wp_get_document_title();
$url = get_permalink();
return '
<div class="copy_main">
<div class="copy_btn" data-clipboard-text="'.$title.' '.$url.'">
<i class="fa"></i><span>この記事のURLをコピーする</span>
</div>
</div>
';
}
add_shortcode('copy_btn', 'myshortcode_copy_btn');


//スマホだけtelリンク有効
function my_wp_head_tel_link(){
if(!wp_is_mobile()): ?>
<style type="text/css">
a[href*="tel:"] {
pointer-events: none;
cursor: default;
text-decoration: none;
}
</style>
<?php endif;
}
add_action('wp_head', 'my_wp_head_tel_link');


//カスタム投稿 コラム 作成者選択表示 スタッフ　ユーザー選択表示
add_action('admin_menu', 'myplugin_add_custom_box');
function myplugin_add_custom_box(){
    if (function_exists('add_meta_box')){
        add_meta_box('myplugin_sectionid', __('作成者', 'myplugin_textdomain'), 'post_author_meta_box', 'column', 'advanced');
        add_meta_box('myplugin_sectionid', __('ユーザー', 'myplugin_textdomain'), 'post_author_meta_box', 'staff', 'advanced');
    }
}

//ユーザープロフールに項目追加
function my_user_meta($wb)
{
  $wb['initial'] = 'イニシャル';
    return $wb;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);

//カスタム投稿アーカイブページの並び順を変更
function change_posts_per_page($query) {

    //管理画面,メインクエリに干渉しないために必須
    if( is_admin() || ! $query->is_main_query() ){
        return;
    }

    //カスタム投稿「staff」表示順番号昇順でソート
    if ( $query->is_post_type_archive('staff'))//スタッフアーカイブページが開いてるか
        {
            $query -> set('meta_key', '表示順');
            $query -> set('orderby', 'meta_value');
            $query -> set('order','ASC'); //昇順
        return;
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

// 親ページのスラッグを取得する
function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}

// 【検索】検索対象をカスタム投稿タイプで絞り込む && 投稿タイプごとに並び替え
function searchFilter($query) {
  if ($query->is_search) {
    $query->set( 'post_type', array('solution','staff','case','product','column','topics') );
    $query->set( 'order', 'DESC' );
    $query->set( 'orderby', 'post_type' );
  }
}
add_action( 'pre_get_posts','searchFilter' );

?>
