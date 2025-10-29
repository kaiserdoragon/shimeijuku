<?php get_header(); ?>
<main>
  <div class="top_mv">
    <p>知る、<br>考える、<br>力になる</p>
    <img src="<?php echo get_template_directory_uri(); ?>/img/top/mv.jpg" alt="" width="1920" height="971">
    <div class="top_mv--scroll">
      <span><img src="<?php echo get_template_directory_uri(); ?>/img/top/txt_scroll.svg" alt="Scroll" width="12" height="47"></span>
    </div>
    <div class="particle_lefttop">
      <div id="js-particle_lefttop"></div>
    </div>

    <div class="particle_righttop">
      <div id="js-particle_righttop"></div>
    </div>

    <div class="particle_rightbottom">
      <div id="js-particle_rightbottom"></div>
    </div>
  </div>
  <section class="top_lead">
    <div class="top_lead--inner">
      <h2 class="ttl_sec">Contact</h2>
      <p>無料体験・個別説明会のお申し込み<br>その他お問い合わせはこちら</p>
      <ul>
        <li>
          <a href="#">
            公式LINEでお申し込み<br>
            ID:XXXXXXXXXXX
          </a>
        </li>
        <li>
          <a href="tel:052-504-3738">
            お電話でお申し込み<br>
            052-504-3738
          </a>
        </li>
        <li>
          <a href="mailto:testtest@gmail.com">
            365日いつでも<br>
            WEBからお申し込み
          </a>
        </li>
      </ul>
    </div>
  </section>
  <section class="top_latest">
    <div class="container">
      <h2 class="ttl_sec -md">Pik up News,</h2>
      <p>自由に書き込みができる場所です。</p>
      <div class="post_content">
        <?php
        $args = array(
          'posts_per_page' => 1
        );
        $posts = get_posts($args);
        foreach ($posts as $post):
          setup_postdata($post);
        ?>
          <div>
            <?php the_content(); ?>
          </div>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </section>
  <section class="top_empower">
    <div class="top_empower--inner">
      <h2 class="ttl_sec">Empower</h2>
      <dl>
        <dt>あなたの未来を、あなたの手で選ぶ。</dt>
        <dd>
          <p class="u-mb10">これからの人生には、何度も「選ぶ」瞬間が訪れます。</p>
          <p class="u-mb10">どんな夢を描くのか。どの道を進むのか。<br>そして――どんな自分でありたいのか。<br>そのすべては、いま積み重ねている力から始まります。</p>
          <p>
            学ぶことは、誰かにやらされるものではありません。<br>
            「知りたい」「できるようになりたい」「変わりたい」――<br>
            その想いこそが、本当の成長を生み出します。<br>
            いま取り組んでいる勉強は、ただ点数を取るためのものではなく、<br class="is-hidden_sp">
            未来を自分で選びとるための大切な「土台」になるはずです。<br>
            真明塾は、その挑戦を本気で支えます。<br>
            一人ひとりの目標や課題に真剣に向き合い、<br>時には厳しく徹底的に指導し、そして大きな愛情で見守ります。<br>
            その先にある「できた！」という感動を、共に分かち合いたいと願っています。<br>
            結果がすぐに現れないこともあるでしょう。<br>
            しかし、努力を続ける限り、その積み重ねは必ず力となって返ってきます。<br>
            夢や目標の実現に向けて踏み出す勇気。<br>
            挑戦しようとする気持ちを、私たちは信じています。
          </p>
        </dd>
      </dl>
      <a href="<?php echo esc_url(home_url('/contact')); ?>">真明塾の特徴</a>
    </div>
    <picture>
      <source srcset="<?php echo get_template_directory_uri(); ?>/img/top/bg_empower_sp.png" media="(max-width: 768px)" />
      <img class="top_empower--bg" src="<?php echo get_template_directory_uri(); ?>/img/top/bg_empower.png" alt="" width="2496" height="1705">
    </picture>
  </section>
  <section class="top_course">
    <h2 class="ttl_sec -lg">Course<span>コース紹介</span></h2>
    <div class="top_course--inner">
      <div class="container">
        <ol>
          <li class="is-fadein">
            <div>
              <h3>小学部 公立中進学科</h3>
              <p>勉強をする習慣をつけ基礎学力を向上させる『本科コース』を中心に、厳しいけど温かく、授業を行ってます。目標は中学進学後の成績上位、そこに重点を置いた指導です。</p>
              <a href="#">詳細を見る</a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_course_01.jpg" alt="" width="244" height="305">
          </li>
          <li class="is-fadein">
            <div>
              <h3>中学部 高校受験科</h3>
              <p>学校に準拠した予習・復習を最新鋭の個別学習システムを活用し、5教科を徹底指導していきます。中学1年生の段階から基礎学力を向上させ、高校受験を目標に応用まで、しっかり学習できます。</p>
              <a href="#">詳細を見る</a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_course_02.jpg" alt="" width="244" height="305">
          </li>
          <li class="is-fadein">
            <div>
              <h3>高校生の学習コース</h3>
              <p>真明塾から、難関・有名大学へ―。「アドバンスウィング＋学研プライムゼミ」で体系的に学び、大学入試共通テストの土台が築ける。</p>
              <a href="#">詳細を見る</a>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_course_03.jpg" alt="" width="244" height="305">
          </li>
        </ol>
      </div>
    </div>
  </section>
  <section class="top_method">
    <div class="top_method--inner is-fadein">
      <div>
        <h2 class="ttl_sec -lg">Method<span>シンメイ メソッド</span></h2>
        <p>勉強ができるとは、「わかる」「できる」「やり遂げる」<br class="is-hidden_sp">の３つのステップから成り立っています。</p>
        <span class="top_method--addition">1992年開校から蓄積された指導法と<br class="is-hidden_sp">最新鋭の教育システムが提供する真明塾のメソッド</span>
        <a href="#">指導方針</a>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_method.png" alt="" width="510" height="448">
    </div>
  </section>
  <section class="top_news">
    <h2 class="ttl_sec -lg">News<span>お知らせ</span></h2>
    <div class="top_news--box">
      <div class="top_news--inner is-fadein">
        <?php
        $args = array(
          'posts_per_page' => 3,
          'post_type' => 'post', //postは通常の投稿機能
          'post_status' => 'publish'
        );
        $my_posts = get_posts($args);
        ?>
        <ul class="top_news--list">
          <?php if ($my_posts) : foreach ($my_posts as $post): setup_postdata($post); ?>
              <li>
                <?php if (has_post_thumbnail()): ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('custom-size');; ?>
                  </a>
                <?php else : ?>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_thumbnail.jpg" alt="" width="170" height="170">
                  </a>
                <?php endif; ?>
                <dl>
                  <dt>
                    <a href="<?php the_permalink(); ?>">
                      <?php
                      if (mb_strlen($post->post_title) > 30) {
                        $title = mb_substr($post->post_title, 0, 30);
                        echo $title . '';
                      } else {
                        echo $post->post_title;
                      }
                      ?>
                    </a>
                  </dt>
                  <dd><span><?php the_time('Y年m月d日'); ?></span></dd>
                  <dd>
                    <a href="<?php the_permalink(); ?>">
                      <?php
                      if (mb_strlen($post->post_content, 'UTF-8') > 30) {
                        $content = str_replace('\n', '', mb_substr(strip_tags($post->post_content), 0, 30, 'UTF-8'));
                        echo $content . '';
                      } else {
                        echo str_replace('\n', '', strip_tags($post->post_content));
                      }
                      ?>
                    </a>
                  </dd>
                </dl>
              </li>
          <?php endforeach;
          endif; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
    <a class="top_news--link" href="<?php echo esc_url(home_url('/news')); ?>">過去の記事を見る</a>
  </section>
  <div class="tpp_ad">
    <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_method_01.png" alt="疑問・不安全て解決　無料体験授業実施" width="245" height="107">
    <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_method_02.png" alt="目標を達成する力を子供たちへ　これが本気の学習法　シンメイメソッド" width="245" height="107">
    <img src="<?php echo get_template_directory_uri(); ?>/img/top/img_method_03.png" alt="成績向上実績　合格実績" width="245" height="107">
  </div>
  <div>
    <div class="googlemap">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1629.6161247721666!2d136.89178628912322!3d35.22558813424816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6003746df7939f1d%3A0x678bab8e0dcf8635!2z44CSNDUyLTA4MDkg5oSb55-l55yM5ZCN5Y-k5bGL5biC6KW_5Yy66Iqx5Y6f55S6!5e0!3m2!1sja!2sjp!4v1757401703217!5m2!1sja!2sjp" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <address class="googlemap--address">真明塾　名古屋市西区花原町47番</address>
  </div>






  <!-- <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
  </div> -->









  <details class="accordion_menu js-accordion">
    <summary class="js-accordion--ttl"><span class="accordion_menu--btn"></span>1つ目のアコーディオンのタイトル</summary>
    <div class="accordion_menu--content js-accordion--content">
      <p>ここは、1つ目のアコーディオンの中身です。</p>
      <button class="close-btn">閉じる</button>
    </div>
  </details>
  <details class="accordion_menu js-accordion">
    <summary class="js-accordion--ttl"><span class="accordion_menu--btn"></span>2つ目のアコーディオンのタイトル</summary>
    <div class="accordion_menu--content js-accordion--content">
      <p>ここは、2つ目のアコーディオンの中身です。ここは、2つ目のアコーディオンの中身です。ここは、2つ目のアコーディオンの中身です。ここは、2つ目のアコーディオンの中身です。</p>
      <p>ここは、2つ目のアコーディオンの中身です。ここは、2つ目のアコーディオンの中身です。ここは、2つ目のアコーディオンの中身です。<br>
        ここは、2つ目のアコーディオンの中身です。ここは、2つ目のアコーディオンの中身です。
      </p>
      <button class="close-btn">閉じる</button>
    </div>
  </details>
  <details class="accordion_menu js-accordion">
    <summary class="js-accordion--ttl"><span class="accordion_menu--btn"></span>3つ目のアコーディオンのタイトル</summary>
    <div class="accordion_menu--content js-accordion--content">
      <p>ここは、3つ目のアコーディオンの中身です。ここは、3つ目のアコーディオンの中身です。</p>
      <p>ここは、3つ目のアコーディオンの中身です。</p>
      <p>ここは、3つ目のアコーディオンの中身です。<br>
        ここは、3つ目のアコーディオンの中身です。ここは、3つ目のアコーディオンの中身です。ここは、3つ目のアコーディオンの中身です。ここは、3つ目のアコーディオンの中身です。ここは、3つ目のアコーディオンの中身です。
      </p>
      <button class="close-btn">閉じる</button>
    </div>
  </details>


</main>
<?php get_footer(); ?>