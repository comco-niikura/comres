<?php get_header(); ?>
<main>
      <div class="page-title-container">
        <div class="bread-wrapper">
          <p class="bread"><a href="https://comres.jp/">TOP</a> > トータルサポート</p>
        </div>
      </div>

      <div id="support" class="">
        <section class="top-support container-lg">
            <img class="d-md-none" src="<?php echo do_shortcode('[img]')."bg-top-support.png";?>" alt="COMRESのトータルサポート">
            <div class="top-support-text">
                <h2 class="top-sec-tt text-center text-md-left">COMRESのトータルサポート</h2>
                <p>ICTの力で施設職員様を、ご利用者様を、ご家族様をご支援にするために、<br class="d-none d-md-block">検討から導入・運用まで、コムコ株式会社がトータルにサポートします。</p>
            </div>
        </section>
        <section class="support-point-wrapper container-lg"">
          <h2><span>4</span>つの強み</h2>
<!--           <p>当社コムコは単なるITのモノ売りの販売店ではなく、基盤はシステム開発会社という販売店です。想像以上に手間と時間がかかる施設のIT課題に対し、システムの選定・導入から使用・管理のサポートまで、業界に精通した介護専任チームが全力で日本中の介護現場をサポートいたします。</p> -->
          <nav class="d-none d-md-block">
            <ul>
              <li><a href="#sec01" class="d-flex flex-column flex-md-row">
                <span>POINT 1</span>
                <p>施設の業務改善・IT導入に関わるあらゆるご提案が可能</p>
              </a></li>
              <li><a href="#sec02" class="d-flex flex-column flex-md-row">
                <span>POINT 2</span>
                <p>現在のIT環境を無料で診断し良い点・改善点を見える化</p>
              </a></li>
              <li><a href="#sec03" class="d-flex flex-column flex-md-row">
                <span>POINT 3</span>
                <p>システム・ネットワーク・ハード機器の迅速なトラブル解決</p>
              </a></li>
              <li><a href="#sec04" class="d-flex flex-column flex-md-row">
                <span>POINT 4</span>
                <p>スムーズな予算化をご提案</p>
              </a></li>
            </ul>
          </nav>
        </section>
        <section id="sec01" class="support-sec-wrapper">
          <div class="container support-sec01-s-image-wrapper">
            <div class="support-sec-inner d-flex flex-column flex-lg-row">
              <div class="support-sec-text">
                <h2>施設の業務改善・IT導入に関わる<br>あらゆるご提案が可能</h2>
                <p>システム会社ならではのIT知識で、単に製品を売るだけではないお客様ファーストで最適なご提案をいたします。
                <br><strong>「IT分からない」= OKです。</strong>
                <br><strong>「餅は餅屋」</strong>に、実績ある当社のエキスパートにお任せください。</p>
                <p class="mt-4"><img src="<?php echo get_template_directory_uri();?>/img/support-sec01-1.svg"></p>
              </div>
              <div class="support-sec-image"></div>
            </div>
          <div class="support-sec01-s-image"><img src="<?php echo get_template_directory_uri();?>/img/support-sec01-3.svg"></div>
          </div>

          <div class="btn-support-modal-wrapper container">
            <button type="button" class="btn btn-support-modal" data-toggle="modal" data-target="#support-modal">
              餅は餅屋とは？
            </button>
            <!-- Modal -->
            <div class="modal fade" id="support-modal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="support-modalTitle">餅は餅屋</h5>
                    <p>意味・由来</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>この諺は「ものごとは、何事も専門家に頼るのがいちばん」という意味ですが、「色々と自分でやろうと試したけど上手くいかなかった！」「最初から依頼しておけば良かった！」と後悔する前に、それぞれの専門家がいるということを説いてくれています。
                    <br>由来は諸説ありますが、師走の忙しい時に「餅をつく暇がない！」という忙しい家へ出張して代わりについてくれる餅屋がいて「頼んで正解だったわ」と主婦たちを喜ばせた、と伝えられています。
                    <br>実際に介護業界で働く皆さんの現場の知識・状況に耳を傾け、私たちのITの知識と技術で課題を解決するお助けができればと常日頃動いております。お気軽にご相談いただけるようサポート体制・雰囲気づくりを心がけています。</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">閉じる</button>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- modal終わり -->
        </section>

        <section id="sec02" class="support-sec-wrapper">
          <div class="container support-sec01-s-image-wrapper">
            <div class="support-sec-inner d-flex flex-column flex-lg-row flex-column-reverse">
              <div class="support-sec-image d-none d-lg-block"><img src="<?php echo get_template_directory_uri();?>/img/concept.png"></div>
              <div class="support-sec-text">
                <h2>現在のIT環境を無料で診断し<br>良い点・改善点を見える化</h2>
                <p>各種システムやツール・ハード機器をバラバラに導入すると思わぬところで業務とのミスマッチやネットワークトラブルがつきものです。プレ無料診断で施設の良い点・改善点を見える化してお伝えします。
                <br>現状ヒアリング・ご相談のうえ最適なご提案をいたします。</p>
                <div class="btn-support-modal-wrapper container">
                  <button type="button" class="btn btn-support-modal" data-toggle="modal" data-target="#support-modal02">
                    無料リソース診断とは？
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="support-modal02" tabindex="-1" role="dialog" aria-labelledby="freeModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="freeModalCenterTitle">無料診断リソース</h5>
                          <p>"もったいない！放置したままの設備投資"</p>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="support-modal02-list">
                            <p>施設内に溢れる行先不明なLANケーブル</p>
                            <p>途切れ途切れの無線電波</p>
                            <p>誰でも閲覧可能な共有ファイル</p>
                            <p>空きIPアドレスが不明なネットワーク環境</p>
                            <p>更新時期の過ぎたウィルス対策ソフトの利用</p>
                          </div>
                          <p class="text-md-center">現状ヒアリングのうえ当社から最適解をお伝えいたします。</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" data-dismiss="modal">閉じる</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- modal終わり -->
                <div class="support-sec02-point-list d-flex flex-row">
                  <div class="point-item">
                    <img src="<?php echo get_template_directory_uri();?>/img/support-network.png">
                    <p>ネットワーク診断</p>
                  </div>
                  <div class="point-item">
                    <img src="<?php echo get_template_directory_uri();?>/img/support-security.png">
                    <p>セキュリティ対策</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section id="sec03" class="support-sec-wrapper">
          <div class="container">
            <div class="support-sec-inner">
              <div class="support-sec-text">
                <h2>システム・ネットワーク・<br class="d-block d-md-none">ハード機器の<br class="d-none d-md-block">迅速なトラブル解決</h2>
                <p><strong>メーカー直契約よりも当社との契約によりトラブル発生時の解決スピード</strong>が変わります。<strong>システム・ネットワーク・ハード不具合を速やかに切り分け、ダウンタイムを極力抑え安心</strong>して業務いただけるよう全力サポートいたします。</p>
                <p class="mt-4 d-block d-md-none"><img src="<?php echo get_template_directory_uri();?>/img/support-sec03-1-sp.svg"></p>
                <p class="mt-4 d-none d-md-block"><img src="<?php echo get_template_directory_uri();?>/img/support-sec03-1.svg"></p>
              </div>
            </div>
              <div class="support-sec-image"></div>
          </div>
        </section>

        <section id="sec04" class="support-sec-wrapper">
          <div class="container">
            <div class="support-sec-inner">
              <div class="support-sec-text">
                <div class="d-flex flex-column flex-md-row">
                  <h2 class="text-md-center">スムーズな予算化をご提案</h2>
                  <ul class="sec04-head-list">
                    <li>補助金申請サポート</li>
                    <li>リース契約</li>
                    <li>資金調達支援</li>
                  </ul>
                </div>
                <p class="mt-md-2 mb-md-2">煩雑な補助金等申請のお手伝い、会計上のメリットを考えたリース契約をご提案、ファクタリングなどの資金調達をご支援することで、スムーズな予算計上のサポートをいたします。</p>
                <div class="support-sec03-point-list d-flex flex-column flex-md-row justify-content-center">
                  <div class="point-item d-flex flex-row flex-md-column">
                    <img src="<?php echo get_template_directory_uri();?>/img/support-submit.svg">
                    <p class="t">補助金<br class="d-none d-md-block">申請サポート</p>
                  </div>
                  <div class="point-item d-flex flex-row flex-md-column">
                    <img src="<?php echo get_template_directory_uri();?>/img/support-lease.svg">
                    <p>リース契約</p>
                  </div>
                  <div class="point-item d-flex flex-row flex-md-column">
                    <img src="<?php echo get_template_directory_uri();?>/img/support-money.svg">
                    <p>資金調達支援</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      <section id="sec05">
        <div class="support-sec-inner container">
          <div class="support-sec-text">
            <div class="support-sec05-tt-innner">
              <p class="support-sec05-en">CASE</p>
              <h2 class="text-center">これまでのサポート事例</h2>
              <p class="text-sm-center">実際にご依頼があったサポート事例をご紹介します</p>
            </div>
            <div id="support-content">
              <div class="accordion" id="support-case-accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        セキュリティに関するお問合せ
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#support-case-accordion">
                    <div class="card-body">
                      <ul class="support-vice-list">
                        <?php
                        $args = array(
                          'post_type' => 'total_support',
                          'order' => 'ASC',
                          'oderby' => the_field('表示順'),
                          'posts_per_page' => 1000
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) :
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?>

                        <?php
                          $terms1 = get_the_terms( get_the_ID(), 'cat_support' );
                          if($terms1[0]->name === "セキュリティに関するお問合せ"){?>
                            <li><?php the_field('サポート事例タイトル'); ?></li>
                        <?php }?>
                        <?php endwhile; ?>
                        <?php endif;?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        パソコン等に関するお問合せ
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#support-case-accordion">
                    <div class="card-body">
                      <ul class="support-vice-list">
                      <?php if ( $the_query->have_posts() ) :
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?>

                        <?php
                          $terms1 = get_the_terms( get_the_ID(), 'cat_support' );
                          if($terms1[0]->name ==="パソコン等に関するお問合せ"){?>
                            <li><?php the_field('サポート事例タイトル'); ?></li>
                        <?php }?>
                        <?php endwhile; ?>
                        <?php endif;?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        介護施設内でのリモートワークに関するお問合せ
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#support-case-accordion">
                    <div class="card-body">
                      <ul class="support-vice-list">
                        <?php if ( $the_query->have_posts() ) :
                              while ( $the_query->have_posts() ) : $the_query->the_post();
                          ?>

                          <?php
                            $terms1 = get_the_terms( get_the_ID(), 'cat_support' );
                            if($terms1[0]->name ==="介護施設内でのリモートワークに関するお問合せ"){?>
                              <li><?php the_field('サポート事例タイトル'); ?></li>
                          <?php }?>
                          <?php endwhile; ?>
                          <?php endif;?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <p class="support-vice-p">上記は、ほんの一部の事例です。<br>お気軽にご相談・お問合せください。</p>
          </div>
        </div>
      </section>

      <section class="support-cv-wrapper container">
        <div class="support-cv-inner d-flex flex-row">
          <div class="support-cv-image">
            <img src="<?php echo get_template_directory_uri();?>/img/support-members.png">
          </div>
          <div class="support-cv-text">
            <p class="cv-p01">私たちがお待ちしております！</p>
            <p class="cv-p02">IT関連のお悩みを解決します。<br>分かりやすい説明を心がけています。</p>
            <p class="cv-p03"><strong>お問い合わせフォーム</strong>または<br>お電話にてお問合せください。</p>
          </div>
        </div>
      </section>

      </div>

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
                            <p class="mt-2" style="color: #3bae36;">この記事を詳しくみる >></p>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        <p class="btn-archive"><a href="<?php echo home_url();?>/case/">導入施設一覧</a></p>
        </div>
    </section>

<?php get_footer();?>
