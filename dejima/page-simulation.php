<?php /* Template Name: シミュレーション */ ?>
<?php get_header(); ?>

<main id="simulation">
    <div class="page-title-container">
        <div class="bread-wrapper">
            <p class="bread"><a href="<?php echo home_url();?>">TOP</a> > ワイズマンシステム概算シミュレーション</p>
        </div>
        <div class="simulation_kv">
            <div class="sim_left">
                <img class="d-none d-md-block" src=<?php echo do_shortcode('[img]')."sim_bg_pc_left.png"; ?>>
            </div>
            <div class="sim_info_text_wrapper page-container">
                <div class="sim_info_text_inner simulation">
                    <img src=<?php echo do_shortcode('[img]')."sim_deco.png"; ?>>
                    <img src=<?php echo do_shortcode('[img]')."sim_logo_brand.png"; ?>>
                    <h1>概算見積シミュレーション</h1>
                    <h2>〜 介護施設向けシステムをご検討中の方々へ 〜</h2>
                    <p class="sim_green">本シミュレーションで<br/>「ワイズマンシステム」＋「必要機器」の概算見積を取得することができます。</p>
                    <p class="sim_black">「営業問い合わせ電話が煩わしい」「取り急ぎの社内決裁用に費用感が知りたい」といった皆様へ介護ソフトと機器費用、リース月額が概算で分かるシミュレーションです</p>
                </div>
            <div class="sim_bottom d-none d-md-block">
                <img src=<?php echo do_shortcode('[img]')."sim_bg_sp_bottom.png"; ?>>
            </div>
            </div>
            <div class="sim_right">
                <img src=<?php echo do_shortcode('[img]')."sim_bg_sp_top.png"; ?>>
            </div>
            <div class="sim_bottom d-block d-md-none">
                <img src=<?php echo do_shortcode('[img]')."sim_bg_sp_bottom.png"; ?>>
            </div>
        </div>
    </div>
    <section class="simulation page-container">
    <h2 class="text-center">WEBですぐわかる！見積診断スタート</h2>
        <form action="<?php bloginfo('url'); ?>/simulation/sim_result/" method="post" >
            <div>
                <div class="sim_block_base">
                    <div class="sub_title">施設の種類を選択して下さい。</div>
                    <div class="sim_block_button">
                        <input type="radio" name="facility_type" value="1" id="facility_type_1" checked="checked" >
                        <label for="facility_type_1">特養</label>
                        <input type="radio" name="facility_type" value="2" id="facility_type_2">
                        <label for="facility_type_2">老健</label>
                    </div> <!-- sim_block_button -->
                    <div class="sim_block_pc">
                        <div class="sub_title">本システムで利用するパソコンの台数を選択して下さい。</div>
                        <div class="sim_block_button">
                            <input type="radio" name="facility_pc_num" value="1" id="facility_pc_num_1" checked="checked" onclick="click_facility_pc_num_over()">
                            <label for="facility_pc_num_1">１</label>
                            <input type="radio" name="facility_pc_num" value="2" id="facility_pc_num_2" onclick="click_facility_pc_num_over()">
                            <label for="facility_pc_num_2">２</label>
                            <input type="radio" name="facility_pc_num" value="3" id="facility_pc_num_3" onclick="click_facility_pc_num_over()">
                            <label for="facility_pc_num_3">３</label>
                            <input type="radio" name="facility_pc_num" value="4" id="facility_pc_num_4" onclick="click_facility_pc_num_over()">
                            <label for="facility_pc_num_4">４</label>
                            <input type="radio" name="facility_pc_num" value="5" id="facility_pc_num_5" onclick="click_facility_pc_num_over()">
                            <label for="facility_pc_num_5">５</label>
                            <input type="radio" name="facility_pc_num" value="6" id="facility_pc_num_6" onclick="click_facility_pc_num_over()">
                            <label for="facility_pc_num_6">６台以上</label>
                        </div> <!-- sim_block_button -->
                        <div class="facility_pc_num_over" id="facility_pc_num_over">
                            <input type="number" class="pc_num_ext" id="facility_pc_num_ext" name="facility_pc_num_ext" min=6 max=1000>台
                        </div> <!-- facility_pc_num_over -->
                    </div> <!--  sim_block_pc -->
                </div> <!-- sim_block_base -->


                <div class="sim_block_sub">
                    <div class="sub_title">クライアント台数を選択して下さい。</div>
                    <div class="sim_block_client_pc_num" id="sim_block_client_pc_num">
                        <div class="client_pc_num">
                            <input type="number" class="pc_num_ext" id="client_pc_num" name="client_pc_num" min=1 max=1000 value=1>台
                        </div> <!-- nutrition_pc_num -->
                    </div> <!--  sim_block_nutrition_num -->
                </div> <!-- sim_block_sub -->



                <div class="sim_block_sub">
                    <div class="sub_title">ケア記録を充実させたい</div>
                    <div class="sim_block_button">
                        <input type="radio" name="record" value="1" id="record_1" checked="checked" onclick="click_record_pc_num()">
                        <label for="record_1">記録必須</label>
                        <input type="radio" name="record" value="2" id="record_2" onclick="click_record_pc_num()">
                        <label for="record_2">記録不要</label>
                    </div> <!-- sim_block_button -->
                    <div class="sim_block_record_num" id="sim_block_record_num">
                        <div class="record_pc_num">
                            <input type="number" class="pc_num_ext" id="record_pc_num" name="record_pc_num" min=0 max=1000 value=1>台
                        </div> <!-- record_pc_num -->
                    </div> <!--  sim_block_record_num -->
                </div> <!-- sim_block_sub -->

                <div class="sim_block_sub">
                    <div class="sub_title">ナースコールとの連動</div>
                    <div class="sim_block_button">
                        <input type="radio" name="nurse_call" value="1" id="nurse_call_1" checked="checked" onclick="click_nurse_pc_num()">
                        <label for="nurse_call_1">必要</label>
                        <input type="radio" name="nurse_call" value="2" id="nurse_call_2" onclick="click_nurse_pc_num()">
                        <label for="nurse_call_2">不要</label>
                    </div> <!-- sim_block_button -->
                    <div class="sim_block_nurse_num" id="sim_block_nurse_num">
                        <div class="nurse_pc_num">
                            <input type="number" class="pc_num_ext" id="nurse_pc_num" name="nurse_pc_num" min=0 max=1000 value=1>台
                        </div> <!-- nurse_pc_num -->
                    </div> <!--  sim_block_nurse_num -->
                </div> <!-- sim_block_sub -->

                <div class="sim_block_sub">
                    <div class="sub_title">施設ケアマネジメント</div>
                    <div class="sim_block_button">
                        <input type="radio" name="care" value="1" id="care_1" checked="checked" onclick="click_care_pc_num()">
                        <label for="care_1">実施する</label>
                        <input type="radio" name="care" value="2" id="care_2" onclick="click_care_pc_num()">
                        <label for="care_2">実施しない</label>
                    </div> <!-- sim_block_button -->
                    <div class="sim_block_care_num" id="sim_block_care_num">
                        <div class="care_pc_num">
                            <input type="number" class="pc_num_ext" id="care_pc_num" name="care_pc_num" min=0 max=1000 value=1>台
                        </div> <!-- care_pc_num -->
                    </div> <!--  sim_block_care_num -->
                </div> <!-- sim_block_sub -->

                <div class="sim_block_base">
                    <div class="sub_title">様々なサービス</div>
                    <div class="sim_block_button">
                        <input type="checkbox" name="system_type[]" value="1" id="used_total_system" onclick="click_used_total_system()">
                        <label class="system_name" for="used_total_system">利用料合算システム SP</label>
                    </div> <!-- sim_block_sub -->
                    <div class="sim_block_used_total_num" id="sim_block_used_total_num">
                        <div class="used_total_pc_num">
                            <input type="number" class="pc_num_ext" id="used_total_pc_num" name="used_total_pc_num" min=0 max=1000 value=1>台
                        </div> <!-- care_pc_num -->
                    </div> <!--  sim_block_used_total_num -->

                    <div class="sim_block_button">
                        <input type="checkbox" name="system_type[]" value="2" id="nutrition_system" onclick="click_nutrition_system()">
                        <label class="system_name" for="nutrition_system">栄養ケア・マネジメント支援システム SP</label>
                    </div> <!-- sim_block_sub -->
                    <div class="sim_block_nutrition_num" id="sim_block_nutrition_num">
                        <div class="sub_title">本サービスを利用するパソコン台数</div>
                        <div class="nutrition_pc_num">
                            <input type="number" class="pc_num_ext" id="nutrition_pc_num" name="nutrition_pc_num" min=0 max=1000 value=1>台
                        </div> <!-- nutrition_pc_num -->
                    </div> <!--  sim_block_nutrition_num -->

                    <div class="sim_block_button">
                        <input type="checkbox" name="system_type[]" value="3" id="deposit_system" onclick="click_deposit_system()">
                        <label class="system_name" for="deposit_system">預り金管理システム SP</label>
                    </div> <!-- sim_block_button -->
                    <div class="sim_block_deposit_num" id="sim_block_deposit_num">
                        <div class="sub_title">本サービスを利用するパソコン台数</div>
                        <div class="deposit_pc_num">
                            <input type="number" class="pc_num_ext" id="deposit_pc_num" name="deposit_pc_num" min=0 max=1000 value=1>台
                        </div> <!-- deposit_pc_num -->
                    </div> <!--  sim_block_deposit_num -->
                </div> <!-- sim_block_base -->

            </div> <!-- sim_block -->
            <div>
                <div class="sim_block_sub">
                    <h3>本システム用以外で購入希望されるパソコン台数</h3>
                    <div class="sim_block_button">
                        <input type="radio" name="pc_num" value="0" id="pc_num_0" checked="checked" onclick="clikc_pc_num_over()">
                        <label for="pc_num_0">なし</label>
                        <input type="radio" name="pc_num" value="1" id="pc_num_1" onclick="clikc_pc_num_over()">
                        <label for="pc_num_1">１</label>
                        <input type="radio" name="pc_num" value="2" id="pc_num_2" onclick="clikc_pc_num_over()">
                        <label for="pc_num_2">２</label>
                        <input type="radio" name="pc_num" value="3" id="pc_num_3" onclick="clikc_pc_num_over()">
                        <label for="pc_num_3">３</label>
                        <input type="radio" name="pc_num" value="4" id="pc_num_4" onclick="clikc_pc_num_over()">
                        <label for="pc_num_4">４</label>
                        <input type="radio" name="pc_num" value="5" id="pc_num_5" onclick="clikc_pc_num_over()">
                        <label for="pc_num_5">５</label>
                        <input type="radio" name="pc_num" value="6" id="pc_num_6" onclick="clikc_pc_num_over()">
                        <label for="pc_num_6">６台以上</label>
                    </div> <!-- sim_block_button -->
                    <div class="pc_num_over" id="pc_num_over">
                        <input type="number" class="pc_num_ext" id="pc_num_ext" name="pc_num_ext" min=6 max=1000>台
                    </div> <!-- pc_num_over -->
                </div> <!-- sim_block_sub -->
            </div> <!-- sim_block -->

            <div class="submit_wrapper">
                <div class="submit_img"><img src=<?php echo do_shortcode('[img]')."submit.svg"; ?>></div>
                <div class="sim_button_block">
                    <button class="btn_calc">結果を見る</button>
                </div> <!-- sim_block_sub -->
            </div> <!-- sim_block -->
        </form>
    </section>
</main>
<?php get_footer(); ?>
