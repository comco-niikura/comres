<?php
/**
* Template Name:ダウンロード用メール送信
*/
?>
<?php
if(empty($_POST['mail_addrs'])  ) {
    $url = home_url().'/simulation/';
    header('Location: ' . $url , true, 301);
    exit();
}
?>

<?php get_header();

//インクルード処理
include (dirname(__FILE__).'/module/mailsender.inc');

//クラスインスタンス化
$mailsender = new mailsender_download;

$company_name = h(@$_POST['company_name']);
$user_name = h(@$_POST['user_name']);
$mail_addrs = $_POST['mail_addrs'];

require_once(dirname(__FILE__).'/dto/sim_data.php');
$sim_data = unserialize($_SESSION['sim_data']);
$sim_data->company_name = $company_name;
$sim_data->user_name = $user_name;
$_SESSION['sim_data'] = serialize($sim_data);

$title = "ダウンロードの御礼";
$content = $company_name . "　" . $user_name . "様\r\r";
$content = $content . "ダウンロードの手続きをしていただき、誠にありがとうございました";
?>
<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <a href="<?php echo home_url();?>/simulation/">ワイズマンシステム概算シミュレーション</a> > PDFファイル・ダウンロード</p>
        </div>
    </div>

    <section class="simulation page-container">
        <form action="<?php bloginfo('url'); ?>/simulation/create_pdf/" method="post" target="_blank">
            <div class="user_block">
                <?php
                $mailsender->mailsend($mail_addrs,$title,nl2br($content, false));
                ?>
                <?php echo $company_name; ?>　<?php echo $user_name; ?>様 <br/><br/>
                ご登録ありがとうございました。<br/>
                下記「ダウンロード」からPDFファイルをダウンロードしてください。

            </div> <!-- user_block -->
            <div class="user_block">
                <div class="sim_button_block">
                    <button class="btn_calc">ダウンロード</button>
                </div> <!-- sim_block_sub -->
            </div> <!-- price_list -->
        </form>
    </section>
</main>
<?php get_footer(); ?>
