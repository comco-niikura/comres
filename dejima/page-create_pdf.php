<?php
/**
 * Template Name:PDF作成
 */
require_once(dirname(__FILE__).'/dto/sim_data.php');
$sim_data = unserialize($_SESSION['sim_data']);

//var_dump($sim_data);

$today = date('Y年m月d日');

$company_name = $sim_data->company_name;
$user_name = $sim_data->user_name;

$system_name = $sim_data->system_name;
$price = number_format($sim_data->price);

$lease =  number_format($sim_data->lease);
$lease_year = number_format($sim_data->lease_year);
$price_base = number_format($sim_data->price_base);
$type_base = $sim_data->type_base;
$client_pc_num = number_format($sim_data->client_pc_num);
$client_fee1 = number_format($sim_data->client_fee1);
$client_fee2 = number_format($sim_data->client_fee2);
$price_record = number_format($sim_data->price_record);
$type_record = $sim_data->type_record;
$price_narse_call = number_format($sim_data->price_narse_call);
$type_narse_call = $sim_data->type_narse_call;
$price_care = number_format($sim_data->price_care);
$type_care = $sim_data->type_care;
$price_client_pc = number_format($sim_data->price_client_pc);
$pc_num = number_format($sim_data->pc_num);
$price_pc = number_format($sim_data->price_pc);

$other_system_name = array();
$other_system_price = array();
$other_system_type = array();
for($i=0; $i<3; $i++) {
	if(is_null($sim_data->other_system_name[$i])) {
		break;
	}
	$other_system_name[$i] = $sim_data->other_system_name[$i];
	$other_system_price[$i] = number_format($sim_data->other_system_price[$i]);
	$other_system_type[$i] = $sim_data->other_system_type[$i];
}

$page_content = "";
$page_content = $page_content . '<div class="sub_block">';
$page_content = $page_content . '<table class="total"><tbody>';
$page_content = $page_content . '<tr><th>概算見積額(合計)</th><td class="price">' . $price . '円</td></tr>';
$page_content = $page_content . '<tr><th>　リース月額</th><td class="price">' . $lease . '円</td></tr>';
$page_content = $page_content . '<tr><th>　リース年額</th><td class="price">' . $lease_year . '円</td></tr>';
$page_content = $page_content . '</tbody></table>';
$page_content = $page_content . '</div>';

$page_content = $page_content . '<div class="sub_block">';
$page_content = $page_content . '<div class="sub_title">基本システム（内訳）</div>';
$page_content = $page_content . '<table><tbody>';
$page_content = $page_content . '<tr><th>基本システム料</th><td class="type">' . $type_base . '</td><td class="price">' . $price_base . '円</td></tr>';

$page_content = $page_content . '<tr><th>クライアントＰＣ台数</th><td class="type">' . $client_pc_num . '台</td><td class="price"></td></tr>';
$page_content = $page_content . '<tr><th>クライアント基本料(１本目)</th><td class="type"></td><td class="price">' .$client_fee1 . '円</td></tr>';
if($client_pc_num>1) {
	$page_content = $page_content . '<tr><th>クライアント基本料(２本目以降)</th><td class="type"></td><td class="price">' .$client_fee2 . '円</td></tr>';
}
if($price_record>0) {
	$page_content = $page_content . '<tr><th>ケア記録オプション</th><td class="type">' . $type_record . '</td><td class="price">' . $price_record . '円</td></tr>';
}
if($price_narse_call>0) {
	$page_content = $page_content . '<tr><th>ナースコールオプション</th><td class="type">' . $type_narse_call . '</td><td class="price">' . $price_narse_call . '円</td></tr>';
}
if($price_care>0) {
	$page_content = $page_content . '<tr><th>施設ケアマネジメント支援システムSP</th><td class="type">' . $type_care . '</td><td class="price">' . $price_care . '円</td></tr>';
}
$page_content = $page_content . '</tbody></table>';
$page_content = $page_content . '</div>';


if(!is_null($other_system_name[0])) {
	$page_content = $page_content . '<div class="sub_block">';
	$page_content = $page_content . '<div class="sub_title">その他システム</div>';
	$page_content = $page_content . '<table><tbody>';

	for($i=0; $i<3; $i++) {
		if(is_null($other_system_name[$i])) {
			break;
		}
		$page_content = $page_content . '<tr><th>' . $other_system_name[$i] . '</th><td class="type">' . $other_system_type[$i] . '</td><td class="price">' . $other_system_price[$i] . '円</td></tr>';
	}
	$page_content = $page_content . '</tbody></table>';
	$page_content = $page_content . '</div>';
}

$page_content = $page_content . '<div class="sub_block">';
$page_content = $page_content . '<div class="sub_title">（参考）ＰＣ価格</div>';
$page_content = $page_content . '<table><tbody>';
$page_content = $page_content . '<tr><th>導入ＰＣ</th><td class="type">' .$client_pc_num . '台</td><td class="price">' . $price_client_pc . '円</td></tr>';
$page_content = $page_content . '<tr><th>その他ＰＣ</th><td class="type">' .$pc_num . '台</td><td class="price">' . $price_pc . '円</td></tr>';
$page_content = $page_content . '</tbody></table>';
$page_content = $page_content . '</div>';
$page_content = $page_content . '以上';


//設置したPHPライブラリを読み込み
require_once (dirname(__FILE__).'/module/tcpdf/tcpdf.php');

//TCPDFインスタンスを作成
$tcpdf = new TCPDF();

//日本語フォントのセット
$tcpdf->SetFont('kozminproregular', "", 10);

//ヘッダー表示制御（非表示）
$tcpdf->setPrintHeader(false);

//ヘッダー表示制御（非表示）
$tcpdf->setPrintFooter(false);

//余白を設定
$tcpdf->SetMargins(15, 0, 15);

//PDFファイルのタイトルを設定
$tcpdf->SetTitle('概算見積書');

//PDFファイルの作成者を設定
$tcpdf->SetAuthor('コムコ');

//1ページ目を作成
$tcpdf->AddPage();

//自動改ページをONにする
$margin = 15;
$tcpdf->SetAutoPageBreak(true, $margin);

//表示させるHTMLコード
$content = <<< EOF
<div class="pdf-page">
<h1>概算見積書</h1>
<div class="pdf_target">
$today<br/>
$company_name $user_name 様
</div>
<div class="pdf_system">$system_name</div>
<div class="pdf_content">
$page_content
</div>
</div>
EOF;

//適用するCSS
$css = <<< EOF
<style>
.pdf-page {
	line-height: 1.8;
}
.pdf-page h1 {
	font-size: 22px;
	text-align: center;
}
.pdf_target {
	margin-bottom: 5px;
	text-align: right;
	font-size: 12px;
}
.pdf_system {
	margin-bottom: 10px;
	text-align: center;
	font-size: 14px;
}
.pdf_content {
	font-size: 10px;
}
.pdf_content .total {
	font-size: 14px;
}
.pdf_content sub_block {
	margin-bottom: 8px;
}

.pdf_content .sub_title {
	margin-bottom: 5px;
	text-align: center;
	text-decoration: underline;
}
.pdf_content tr {
	width: 100%;
}
.pdf_content th {
    width: 250px;
	text-align: left;
}
.pdf_content td {
}
.pdf_content td.type {
	text-align: left;
	width: 100px;
}
.pdf_content td.price {
	text-align: right;
	width: 100px;
}
</style>
EOF;

$html = $css . $content;

//HTMLコードをセット
$tcpdf->writeHTML($html);

//PDFとして出力
$name = 'cost_estimate.pdf'; //ファイル名称
$tcpdf->Output($name, 'I');
//上記の「I」は出力の型。↓の4パターンがある
//I: ブラウザに出力する(既定)、保存時のファイル名が$nameで指定した名前になる。
//D: ブラウザで(強制的に)ダウンロードする。
//F: ローカルファイルとして保存する。
//S: PDFドキュメントの内容を文字列として出力する。
