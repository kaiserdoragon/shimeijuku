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
      <div id="particles3-js"></div>
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
      <ul class="post_content">
        <?php
        $args = array(
          'posts_per_page' => 1
        );
        $posts = get_posts($args);
        foreach ($posts as $post):
          setup_postdata($post);
        ?>
          <li>
            <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
          </li>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>
      </ul>
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
            いま取り組んでいる勉強は、ただ点数を取るためのものではなく、<br>
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
    <img src="<?php echo get_template_directory_uri(); ?>/img/top/bg_empower.jpg" alt="" width="2331" height="1412">
  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  <h2 class="ttl_sec">Contact</h2>
  <h2 class="ttl_sec -md">Pik up News,</h2>
  <div class="is-fadein">アニメーション発火</div>

  <section class="top_info">
    <h2 class="top_info--ttl">お知らせ</h2>
    <?php
    $args = array(
      'posts_per_page' => 3,
      'post_type' => 'post', //postは通常の投稿機能
      'post_status' => 'publish'
    );
    $my_posts = get_posts($args);
    ?>
    <dl class="top_info--list">
      <?php foreach ($my_posts as $post): setup_postdata($post); ?>
        <dt class="top_info--term">
          <span class="top_info--time"><?php the_time('Y.m.j'); ?></span>
        </dt>
        <dd class="top_info--detail">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </dd>
      <?php endforeach; ?>
    </dl>
    <?php wp_reset_postdata(); ?>
  </section>



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


</main>
<?php get_footer(); ?>