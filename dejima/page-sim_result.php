<?php
/**
* Template Name:シミュレーション結果
*/
?>
<?php
if(empty($_POST['facility_type'])  ) {
    $url = home_url().'/simulation/';
    header('Location: ' . $url , true, 301);
    exit();
}
if(!isset($_POST['pdf'])) {

$facility_type = $_POST['facility_type'];
$record = $_POST['record'];
$nurse_call = $_POST['nurse_call'];
$care = $_POST['care'];
$system_type = null;
if (isset($_POST['system_type']) && is_array($_POST['system_type'])) {
    $system_type = $_POST['system_type'];
}


$facility_pc_num = $_POST['facility_pc_num'];
//$base_pc_num = $facility_pc_num;
if($facility_pc_num==6) {
    $facility_pc_num = $_POST['facility_pc_num_ext'];
    //    $base_pc_num = $facility_pc_num;
    $facility_pc_num = 6;
}

$record_pc_num = 0;
if (isset($_POST['record_pc_num'])) {
    $record_pc_num = $_POST['record_pc_num'];
    if($record_pc_num>6) {
        $record_pc_num = 6;
    }
}

$nurse_pc_num = 0;
if (isset($_POST['nurse_pc_num'])) {
    $nurse_pc_num = $_POST['nurse_pc_num'];
    if($nurse_pc_num>6) {
        $nurse_pc_num = 6;
    }
}

$care_pc_num = 0;
if (isset($_POST['care_pc_num'])) {
    $care_pc_num = $_POST['care_pc_num'];
    if($care_pc_num>6) {
        $care_pc_num = 6;
    }
}

$used_total_pc_num = 0;
if (isset($_POST['used_total_pc_num'])) {
    $used_total_pc_num = $_POST['used_total_pc_num'];
    if($used_total_pc_num>6) {
        $used_total_pc_num = 6;
    }
}

$nutrition_pc_num = 0;
if (isset($_POST['nutrition_pc_num'])) {
    $nutrition_pc_num = $_POST['nutrition_pc_num'];
    if($nutrition_pc_num>6) {
        $nutrition_pc_num = 6;
    }
}

$deposit_pc_num = 0;
if (isset($_POST['deposit_pc_num'])) {
    $deposit_pc_num = $_POST['deposit_pc_num'];
    if($deposit_pc_num>6) {
        $deposit_pc_num = 6;
    }
}


$pc_num = $_POST['pc_num'];
if($pc_num==6) {
    $pc_num = $_POST['pc_num_ext'];;
}

$client_pc_num = $_POST['client_pc_num'];

$client_fee1 = 180000;
$client_fee2 = ($client_pc_num-1) * 60000;
$client_fee = $client_fee1 + $client_fee2;

$price_client_pc = $client_pc_num * 120000;
$price_pc = $pc_num * 120000;

// PC１-２台＝スリム、PC３-５台＝レギュラー、PC６台以上＝ワイド
$license_table = array(
    0, 1, 1, 2, 2, 2, 3
);
$license_name_table = array(
    "", "スリム", "スリム", "レギュラー", "レギュラー", "レギュラー", "ワイド"
);



$price_table = array(
    array(),
    // 特養
    array(
        // 介護老人福祉施設管理システム SP
        array("介護老人福祉施設管理システム SP"),
        array(0, 1620000, 2460000, 3070000),
        // ケア記録オプション（介護老福）
        array(0, 880000, 1350000, 1680000),
        // ナースコールオプション（介護老福）
        array(0, 170000, 240000, 320000),
        // 施設ケアマネジメント支援システム SP
        array(0, 480000, 760000, 940000) ),
        // 老健
        array(
            // 介護老人保健施設管理システム SP
            array("介護老人保健施設管理システム SP"),
            array(0, 1900000, 2880000, 3590000),
            // ケア記録オプション（介護老福）
            array(0, 880000, 1350000, 1680000),
            // ナースコールオプション（介護老福）
            array(0, 170000, 240000, 320000),
            // 施設ケアマネジメント支援システム SP
            array(0, 480000, 760000, 940000) )
        );

        $price_etc_table = array(
            array(),
            array(
                // 利用料合算システム SP
                array($used_total_pc_num),
                array("利用料合算システム SP"),
                array(0, 280000, 470000, 590000) ),
            array(
                // 栄養ケア・マネジメント支援システム SP
                array($nutrition_pc_num),
                array("栄養ケア・マネジメント支援システム SP"),
                array(0, 300000, 470000, 590000) ),
            array(
                // 預り金管理システム SP
                array($deposit_pc_num),
                array("預り金管理システム SP"),
                array(0, 280000, 420000, 530000) ),
        );

        $system_name = $price_table[$facility_type][0][0];
        $price_base = $price_table[$facility_type][1][$license_table[$facility_pc_num]];
        $price_record = 0;
        $price_narse_call = 0;
        $price_care = 0;
        $price = 0;

        if($record==1) {
            $price_record = $price_table[$facility_type][2][$license_table[$record_pc_num]];
        }
        if($nurse_call==1) {
            $price_narse_call = $price_table[$facility_type][3][$license_table[$nurse_pc_num]];
        }
        if($care==1) {
            $price_care = $price_table[$facility_type][4][$license_table[$care_pc_num]];
        }
        $price = $price_base + $price_record + $price_narse_call + $price_care;

        if($system_type!=null) {
            foreach ($system_type as $type) {
                $num = $price_etc_table[$type][0][0];
                $price += $price_etc_table[$type][2][$license_table[$num]];
            }
        }
        $price += $client_fee;
        $lease = $price * 0.019;
        $lease_year = $lease * 12;

        $type_base = $license_name_table[$facility_pc_num];
        $type_record = $license_name_table[$record_pc_num];
        $type_narse_call = $license_name_table[$nurse_pc_num];
        $type_care = $license_name_table[$care_pc_num];

        require_once(dirname(__FILE__).'/dto/sim_data.php');
        $sim_data = new sim_data();
        $sim_data->system_name = $system_name;
        $sim_data->price = $price;
        $sim_data->lease = $lease;
        $sim_data->lease_year = $lease_year;
        $sim_data->price_base = $price_base;
        $sim_data->type_base = $type_base;
        $sim_data->client_pc_num = $client_pc_num;
        $sim_data->client_fee1 = $client_fee1;
        $sim_data->client_fee2 = $client_fee2;
        $sim_data->price_record = $price_record;
        $sim_data->type_record = $type_record;
        $sim_data->price_narse_call = $price_narse_call;
        $sim_data->type_narse_call = $type_narse_call;
        $sim_data->price_care = $price_care;
        $sim_data->type_care = $type_care;
        $sim_data->price_client_pc = $price_client_pc;
        $sim_data->pc_num = $pc_num;
        $sim_data->price_pc = $price_pc;

        $sim_data->other_system_name = array();
        $sim_data->other_system_type = array();
        $sim_data->other_system_price = array();
        if($system_type!=null) {
            $i = 0;
            foreach ($system_type as $type) {
                $num = $price_etc_table[$type][0][0];
                $sim_data->other_system_name[$i] = $price_etc_table[$type][1][0];
                $sim_data->other_system_type[$i] = $license_name_table[$num];
                $sim_data->other_system_price[$i] = $price_etc_table[$type][2][$license_table[$num]];
                $i++;
            }
        }

        $_SESSION['sim_data'] = serialize($sim_data);
}

        /*
         * PDF作成
         */
        if(isset($_POST['pdf'])) {

            $company_name = null;
            if (isset($_POST['company_name'])) {
                $company_name = $_POST['company_name'];
                error_log("見積り依頼[".$company_name."]");
            }

            require_once(dirname(__FILE__).'/dto/sim_data.php');
            $sim_data = unserialize($_SESSION['sim_data']);
            error_log("create pdf");
            require_once 'module/pdf.php';
            $admin = new pdf();
            $admin->create_pdf($sim_data, $company_name);
        }else{
            error_log("not create pdf");
        }

?>

<?php get_header(); ?>

<main>
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > <a href="<?php echo home_url();?>/simulation/">ワイズマンシステム概算シミュレーション</a> > ワイズマンシステム概算シミュレーション結果</p>
        </div>
<!--         <div class="page-title-wrapper">
            <div class="page-title-inner">
                <h1>ワイズマンシステム概算シミュレーション結果</h1>
            </div>
        </div> -->
    </div>


    <section class="simulation page-container">
    <div class="simulation_re">
        <h2>見積シミュレーション結果</h2>
        <p>お客様の概算見積は以下のとおりです。<br>詳しい見積については「お問合せフォーム」よりお問い合わせください。</p>
    </div>
        <div>
            <div class="price_list">
                <div class="title">
                    <span class="title_reco">おすすめのシステム</span>
                    <p><?php echo $system_name; ?></p>
                </div>
                <div class="outline">
                    <dl><dt>概算見積額（合計）</dt><dd><strong><?php echo number_format($price); ?></strong>円</dd></dl>
                    <dl><dt>リース月額</dt><dd><strong><?php echo number_format($lease); ?></strong>円</dd></dl>
                    <dl><dt>リース年額</dt><dd><strong><?php echo number_format($lease_year); ?></strong>円</dd></dl>
                </div>
                <div class="sub_title">基本システム</div>
                <div class="price_detail">
                <div class="mini_sub"><span>内訳</span></div>
                    <dl><dt>基本システム料 <?php echo $type_base; ?></dt><dd><strong><?php echo number_format($price_base); ?></strong> 円</dd></dl>
                    <dl><dt>クライアントＰＣ台数</dt><dd><strong><?php echo number_format($client_pc_num); ?></strong> 台</dd></dl>
                    <dl><dt>クライアント基本料(１本目)</dt><dd><strong><?php echo number_format($client_fee1); ?></strong> 円</dd></dl>
                    <?php if($client_fee2>0){ ?>
                        <dl><dt>クライアント基本料(２本目以降)</dt><dd><strong><?php echo number_format($client_fee2); ?></strong> 円</dd></dl>
                    <?php } ?>
                    <?php if($record_pc_num>0){ ?>
                        <dl><dt>ケア記録オプション <?php echo $type_record; ?></dt><dd><strong><?php echo number_format($price_record); ?></strong> 円</dd></dl>
                    <?php } ?>
                    <?php if($nurse_pc_num>0){ ?>
                        <dl><dt>ナースコールオプション <?php echo $type_narse_call; ?></dt><dd><strong><?php echo number_format($price_narse_call); ?></strong> 円</dd></dl>
                    <?php } ?>
                    <?php if($care_pc_num>0){ ?>
                        <dl><dt>施設ケアマネジメント支援システムSP <?php echo $type_care; ?></dt><dd><strong><?php echo number_format($price_care); ?></strong> 円</dd></dl>
                    <?php } ?>
                </div>
                <?php
                if($system_type!=null) {
                    ?>
                    <div class="sub_title">その他システム</div>
                    <div class="price_detail">
                        <?php
                        foreach ($system_type as $type) {
                            ?>
                            <dl>
                                <dt>
                                    <?php
                                    $num = $price_etc_table[$type][0][0];
                                    echo $price_etc_table[$type][1][0];
                                    ?> <?php echo $license_name_table[$num]; ?></dt>
                                <dd>
                                    <strong><?php
                                    echo number_format($price_etc_table[$type][2][$license_table[$num]]) . "</strong> 円";
                                    ?>
                                </dd>
                            </dl>
                        <?php

                        }
                    ?>
                </div> <!--  price_detail -->
                <?php
            }
            ?>
            <div class="sub_title">PC価格</div>
            <div class="price_detail">
            <div class="mini_sub"><span>参考</span></div>
                <dl><dt>導入PC <strong style="margin-right: 0 !important"><?php echo number_format($client_pc_num); ?></strong>台で算出</dt><dd>合計 <strong><?php echo number_format($price_client_pc); ?></strong> 円</dd></dl>
                <dl><dt>その他PC <strong style="margin-right: 0 !important"><?php echo number_format($pc_num); ?></strong>台で算出</dt><dd>合計 <strong><?php echo number_format($price_pc); ?></strong> 円</dd></dl>
            </div> <!--  price_detail -->
        </div> <!-- price_list -->

        <div class="simulation_re_info">
            <div>
                <ul>
                    <li>表示価格はメーカー希望小売価格（税抜き）で参考価格です。</li>
                    <li>ネットワーク構築などの諸費用は別途申し受けます。</li>
                    <li>表記以外のオプション価格は含みません。</li>
                    <li>本価格は予告なく変更する場合があります。</li>
                    <li>一部対応していない機器がございます。
                    <li>詳細な費用算出をお求めの際にはお見積もりいたします。</li>
                </ul>
            </div>
            <div>
                <img src=<?php echo do_shortcode('[img]')."warning.png"; ?>>
            </div>
        </div>

        <div class="dl_wrapper d-flex flex-row justify-content-around">
            <form action="" method="post"  name="f">
                <div class="sim_button_block">
                    <button type="button" class="btn_back" onclick="history.back()">もう一度やり直す</button>
                    <input type="hidden" name="facility_type" value="<?php echo $facility_type; ?>" >
                    <input type="hidden" name="record" value="<?php echo $record; ?>" >
                    <input type="hidden" name="nurse_call" value="<?php echo $nurse_call; ?>" >
                    <input type="hidden" name="care" value="<?php echo $care; ?>" >
                    <input type="hidden" name="facility_pc_num" value="<?php echo $facility_pc_num; ?>" >
                    <input type="hidden" name="client_pc_num" value="<?php echo $client_pc_num; ?>" >
                    <input type="hidden" name="pc_num" value="<?php echo $pc_num; ?>" >
                    <input type=hidden name="company_name">
                    <button class="btn_calc" type="submit" name="pdf" onclick="return f.company_name.value=prompt('貴社名を入力してください')">お見積り書作成</button>
                    <a href="https://business.form-mailer.jp/fms/9b83c954179866" target="_new" class="btn_calc">詳しいお見積り</a>
                </div> <!-- sim_block_sub -->
            </form>
        </div> <!-- price_list -->
    </div>
</section>
</main>

<?php get_footer(); ?>
