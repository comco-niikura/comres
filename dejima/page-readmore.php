<?php
require_once("../../../wp-config.php");

$now_post_num = $_POST['now_post_num'];
$post_type = $_POST['post_type'];
$get_post_num = wp_count_posts( $post_type)->publish - $now_post_num;
$html = '';
?>

<?php
$args = array(
  'post_type' => $post_type,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'posts_per_page' => $get_post_num,
  'offset' => $now_post_num,
);
$posts = new WP_Query($args);
?>

<?php if ($posts -> have_posts()) : ?>
  <?php while($posts -> have_posts()) : $posts -> the_post();?>
    <?php
    $terms1 = get_the_terms( get_the_ID(), 'cat_topics' );
    $term = "";
    $permalink = get_permalink();
    $date = get_the_date('Y年n月j日');
    $title = post_custom('トピックスタイトル');
    if($terms1) {
      foreach ( $terms1 as $term ) {
        $term = $term->name;
        break;
      }
    } ?>
    <?php //ヒアドキュメントで変数に格納し続ける
    $html .= <<<EOM
    <li>
    <div><date>$date</date><p class="topics-cat">$term</p></div>
    <a href="$permalink"> $title</a>
    </li>
    EOM;
    ?>

  <?php endwhile;?>

<?php endif; wp_reset_postdata();?>

<?php
echo $html;
?>
