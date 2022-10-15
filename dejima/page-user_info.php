<?php
/**
 * Template Name:ダウンロード用ユーザ情報入力
 */
 ?>
 <?php
 if(empty($_SESSION['sim_data']) ) {
     $url = home_url().'/simulation/';
     header('Location: ' . $url , true, 301);
     exit();
 }
 ?>

<?php get_header();

require_once(dirname(__FILE__).'/dto/sim_data.php');
$sim_data = unserialize($_SESSION['sim_data']);
$system_name = $sim_data->system_name;

//$price = $_POST['price'];
//$system_name = $_POST['system_name'];


//インクルード処理
include (dirname(__FILE__).'/dto/user.php');
$user = new user;


?>

    <!-- メニュー -->
    <main>

        <div class="page-title-container">
          <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <a href="<?php echo home_url();?>/simulation/">ワイズマンシステム概算シミュレーション</a> > お客様情報登録</p>
          </div>
<!--           <div class="page-title-wrapper">
            <div class="page-title-inner">
              <h1>お客様情報登録</h1>
            </div>
          </div> -->
        </div>


    <section class="simulation">
    <form action="<?php bloginfo('url'); ?>/simulation/mail_send/" method="post" >
        <div class="user_block">
            <h2 class="text-center">お客様情報登録</h2>
            <div class="user_block_sub">
                <p class="text-center"><?php echo $system_name; ?>関連<br class="d-block d-sm-none">概算お見積り<br/><br/></p>
                <p>
                    PDFファイル形式で概算お見積りを作成いたします。<br/>
                    ご希望される方は恐れ入りますが、御社名、ご担当者様氏名、ご連絡先メールアドレスの登録をお願いいたします。<br/><br/>
                </p>
                <dl>
                    <dt>御社名</dt>
                    <dd><input type="text" class="company_name" name="company_name" size="20" maxlength="30" required></dd>
                </dl>
                <dl>
                    <dt>ご担当者様氏名</dt>
                    <dd><input type="text" class="user_name" name="user_name" size="20" maxlength="30" required></dd>
                </dl>
                <dl>
                    <dt>ご連絡先メールアドレス</dt>
                    <dd><input type="email" class="mail_addrs" name="mail_addrs" size="40" maxlength="50" required></dd>
                </dl>
            </div> <!-- user_block_sub -->

        </div> <!-- user_block -->

        <div class="user_block">
            <div class="sim_button_block">
                <button type="button" class="btn_back" onclick="history.back()">戻　る</button>
                <button class="btn_calc">登　録</button>
            </div> <!-- sim_button_block -->
        </div> <!-- user_block -->
    </form>
    </section>
</main>
<?php get_footer(); ?>
