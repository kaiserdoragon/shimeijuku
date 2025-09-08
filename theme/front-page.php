<?php get_header(); ?>
<main>
  <div class="top_mv">
    <p>知る、<br>考える、<br>力になる</p>
    <img src="<?php echo get_template_directory_uri(); ?>/img/top/mv.jpg" alt="" width="1920" height="971">
    <div class="top_mv--scroll">
      <span>Scroll</span>
    </div>
  </div>


  <h2 class="ttl_sec">Contact</h2>
  <h2 class="ttl_sec -md">Pik up News,</h2>


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



  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-scrollbar"></div>
  </div>
</main>
<?php get_footer(); ?>