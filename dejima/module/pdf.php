<?php
/*
 * PDF作成
 */

class pdf {
    function create_pdf($sim_data, $company_name) {
        require_once(dirname(__FILE__).'/../dto/sim_data.php');

        error_log(print_r($sim_data, 1));
        error_log($company_name);

        $company_name .= "　様";

        date_default_timezone_set('Asia/Tokyo');
        $year = date("Y")-2018;
        $month = date("n");
        $today = date('令和'.$year.'年'.$month.'月d日');
        $period = date('令和'.$year.'年'.$month.'月末日');

        // データ加工
        $price = number_format($sim_data->price) . '　円';
        $lease = number_format($sim_data->lease) . '　円';
        $lease_year = number_format($sim_data->lease_year) . '　円';
        $type_base  = '基本システム料　' . $sim_data->type_base;
        $price_base = number_format($sim_data->price_base) . '　円';
        $client_pc_num = number_format($sim_data->client_pc_num) . '　台';
        $client_fee1 = number_format($sim_data->client_fee1) . '　円';
        if(isset($sim_data->client_fee2)) {
            $client_fee2 = number_format($sim_data->client_fee2) . '　円';
        }else{
            $client_fee2 = null;
        }
        if(isset($sim_data->price_record)) {
            $price_record = number_format($sim_data->price_record) . '　円';
        }else{
            $price_record = null;
        }
        if(isset($sim_data->price_narse_call)) {
            $price_narse_call = number_format($sim_data->price_narse_call) . '　円';
        }else{
            $price_narse_call = null;
        }
        if(isset($sim_data->price_care)) {
            $price_care = number_format($sim_data->price_care) . '　円';
        }else{
            $price_care = null;
        }

        $client_pc_num = number_format($sim_data->client_pc_num) . '　台';
        $price_client_pc = number_format($sim_data->price_client_pc) . '　円';
        $pc_num = number_format($sim_data->pc_num) . '　台';
        $price_pc = number_format($sim_data->price_pc) . '　円';


        $detail = '<br/><br/><br/>'
                . '<div style="text-align:center;font-size:10px;">基本システム（内訳）</div>';

        $detail .= '<table style="border:none;">'
                . '<tr style="" >'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;' . $type_base . '</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $price_base . '</td>'
                . '</tr>'
                . '<tr style="" >'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;クライアントＰＣ台数</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $client_pc_num . '</td>'
                . '</tr>'
                . '<tr style="" >'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;クライアント基本料(１本目)</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $client_fee1 . '</td>'
                . '</tr>';
        if(isset($client_fee2)) {
            $detail .= '<tr style="">'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;クライアント基本料(２本目以降)</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $client_fee2 . '</td>'
                . '</tr>';
        }
        if(isset($price_record)) {
            $detail .= '<tr style="">'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;ケア記録オプション</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $price_record . '</td>'
                . '</tr>';
        }
        if(isset($price_narse_call)) {
            $detail .= '<tr style="">'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;ナースコールオプション</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $price_narse_call . '</td>'
                . '</tr>';
        }
        if(isset($price_care)) {
            $detail .= '<tr style="">'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;施設ケアマネジメント支援システムSP</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $price_care . '</td>'
                . '</tr>';
        }

        $detail .= '</table>';


        $other_system = "";
        if(isset($sim_data->other_system_name) && is_array($sim_data->other_system_name)) {

            $other_system = '<br/><br/><br/>'
                    . '<div style="text-align:center;font-size:10px;">その他システム</div>';

            $other_system .= '<table style="">';
            for($i = 0; $i<count($sim_data->other_system_name); $i++) {
                $other_system .= '<tr style="">'
                    . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;' . $sim_data->other_system_name[$i] . '　'. $sim_data->other_system_type[$i] . '</td>'
                    . '<td style="text-align:right; width:20%; font-size:8px;">' . number_format($sim_data->other_system_price[$i]) . '　円</td>'
                    . '</tr>';
            }
            $other_system .= '</table>';
        }


        $pc = '<br/><br/><br/>'
                . '<div style="text-align:center;font-size:10px;">ＰＣ価格（参考）</div>';

        $pc .= '<table style="">'
                . '<tr style="" >'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;導入PC' . $client_pc_num . 'で算出</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $price_client_pc . '</td>'
                . '</tr>'
                . '<tr style="" >'
                . '<td style="text-align:left; width:60%; font-size:8px;">&nbsp;&nbsp;&nbsp;&nbsp;その他PC' . $pc_num . 'で算出</td>'
                . '<td style="text-align:right; width:20%; font-size:8px;">' . $price_pc . '</td>'
                . '</tr>';
        $pc .= '</table>';


        // ファイル名用
        $now = strtotime('now');
        $datetime = date('YmdHis', $now);

        //設置したPHPライブラリを読み込み
        require_once (dirname(__FILE__).'/tcpdf/tcpdf.php');

        //TCPDFインスタンスを作成
        $tcpdf = new TCPDF();
        //日本語フォントのセット
        $tcpdf->SetFont('kozminproregular', "", 12);
        //ヘッダー表示制御（非表示）
        $tcpdf->setPrintHeader(false);
        //ヘッダー表示制御（非表示）
        $tcpdf->setPrintFooter(false);
        //余白を設定
        $tcpdf->SetMargins(15, 10, 15);
        //PDFファイルのタイトルを設定
        $tcpdf->SetTitle($sim_data->system_name.'御見積書（概算）');
        //PDFファイルの作成者を設定
        $tcpdf->SetAuthor('コムコ株式会社');
        //自動改ページをOFFにする
        $tcpdf->SetAutoPageBreak(false);

        //適用するCSS
        $css = <<< EOF
        <style>
        .pdf-page {
        	line-height: 1.8;
        }
        .pdf-page div{
            line-height: 1.4;
            margin: 0;
            margin-bottom: 5px;
        }
        .pdf-page h1 {
        	font-size: 22px;
        	text-align: center;
            margin: 0;
            margin-bottom: 5px;
        }
        .pdf-page table, .pdf-page tr, .pdf-page td {
            border: 0.5px #ff0000 solid
        }
        .pdf-page td {
        }
        .pdf-page td.title {
            padding-left: 30px;
            width: 30%;
        }
        .pdf-page td.data {
            padding-left: 30px;
            width: 70%;
        }
        .pdf-page .comment {
            margin-top: 50px;
        }
        table.contact , table.contact tr, table.contact td {
            border: none;
        }
        </style>
        EOF;

        // $content = "";
        // $application_num = "";
        // $application_ids = array();
        // foreach($results as $result){
        //     array_push($application_ids, $result['application_id']);
        $content = "";
        $tcpdf->AddPage();
        //     //表示させるHTMLコード
            $page = <<< EOF
            <div class="pdf-page">
            <div style="text-align:center; font-size:14px; margin-bottom:50px;">御見積書（概算）</div><br/>
            <table style="border:none;">
            <tr style="border:none;" >
            <td style="border:none; text-align:left; width:58%; font-size:8px;">
            <span style="font-size:12px;">$company_name</span><br/><br/>
            <span style="font-size:10px;">$sim_data->system_name</span><br/><br/>
            御照会を賜りました件につきまして、下記の通り御見積り申し上げます。<br/>何卒宜しくご下命の程お願い申し上げます。<br/><br/>
            有効期限　$period
            </td>
            <td style="border:none; text-align:right; width:40%; font-size:8px;">
            $today<br><br>
            <span style="font-size:10px;">コムコ株式会社</span><br>
            ソリューション営業部<br>部長　井川健一<br/>
            ＴＥＬ　03-3837-4871
            </td>
            </tr>
            </table>
            <br/><br/><br/>
            <div>
            <table style="border:none;">
            <tr style="border:none;" >
            <td style="border:none; text-align:left; width:60%; font-size:10px;">
            &nbsp;&nbsp;&nbsp;&nbsp;概算見積額（合計）
            </td>
            <td style="border:none; text-align:right; width:20%; font-size:12px;">
            $price
            </td>
            </tr>
            <tr style="border:none;" >
            <td style="border:none; text-align:left; width:60%; font-size:10px;">
            &nbsp;&nbsp;&nbsp;&nbsp;リース月額
            </td>
            <td style="border:none; text-align:right; width:20%; font-size:12px;">
            $lease
            </td>
            </tr>
            <tr style="border:none;" >
            <td style="border:none; text-align:left; width:60%; font-size:10px;">
            &nbsp;&nbsp;&nbsp;&nbsp;リース年額
            </td>
            <td style="border:none; text-align:right; width:20%; font-size:12px;">
            $lease_year
            </td>
            </tr>
            </table>


            $detail
            $other_system
            $pc

            </div>
            <div id="pdf-remarks" style="font-size:8px;">
            備　考<br/><br/>
            ※上記ワイズマンＡＳＰ費用には５年間の保守契約料・法改正対応費用が含まれております。<br/>
            ※ＡＳＰシステムのご利用にはインターネット常時接続環境が必須となります。<br/>
            ※上記見積書には国保連合会ＷＥＢ請求に関わる伝送ソフト、電子証明書等の料金は含まれて居りません。<br/>
            ※上記すぐろくケアマネ料金に端末（ＳＩＭカード含む）・通信費は含まれておりません。<br/><br/><br/>
            </div>
            </div>
            <br pagebreak="true"/>

            EOF;
            $content = $content . $page;
            $html = $css . $content;
            //HTMLコードをセット
            $tcpdf->writeHTML($html);
//        }

        //PDFとして出力
        $name = 'COMRES_'; //ファイル名称
        // if(count($ids)==1) {
        //     $name .= $application_num .'_';
        // }
        $name .= $datetime . '.pdf';
        $furl = content_url() . "/download/" . $name;
        $fullname =  get_theme_root()."/../download/" . $name;

        if (ob_get_contents()) ob_end_clean();
        if (ob_get_length()) ob_end_clean();
        $tcpdf->Output($fullname, 'FD');
        //上記の「I」は出力の型。↓の4パターンがある
        //I: ブラウザに出力する(既定)、保存時のファイル名が$nameで指定した名前になる。
        //D: ブラウザで(強制的に)ダウンロードする。
        //F: ローカルファイルとして保存する。
        //S: PDFドキュメントの内容を文字列として出力する。

        exit;
    }
}
?>
