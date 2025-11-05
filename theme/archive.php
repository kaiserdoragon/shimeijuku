<?php get_header(); ?>
<div class="eyecatch">
  <h1>お知らせの一覧</h1>
</div>
<?php get_template_part('include/common', 'breadcrumb'); //　Breadcrumb NavXTを使わないときは削除
?>
<div class="has_sidebar news_page">
  <main>
    <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
    <section class="post_excerpt">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="post_excerpt--img">
        <?php if (has_post_thumbnail()): // サムネイルを持っているとき 
        ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
          <?php else: // サムネイルを持っていない 
          ?><?php endif; ?>
      </div>
      <div class="post_excerpt--txt">
        <div class="post_meta">
          <time class="post_meta--date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
          <ul class="post_meta--cat_list">
            <?php categories_label() ?>
          </ul>
          <p class="post_meta--tag">
            <?php echo get_the_tag_list('#', ' #', ''); ?>
          </p>
        </div>
        <?php the_excerpt(); ?>
      </div>
    </section>
    <?php endwhile; ?><?php endif; ?>
    <div class="pagination"><?php wp_pagination(); //ページネーション 
                            ?></div>
  </main>

  <?php
  $post_type = get_post_type($post);
  echo $post_type
  ?>


  <p>【最新投稿】</p>
  <ul>
    <?php
    $args = array(
      'posts_per_page' => 5 // 表示件数の指定
    );
    $posts = get_posts($args);
    foreach ($posts as $post): // ループの開始
      setup_postdata($post); // 記事データの取得
    ?>
      <li>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </li>
    <?php
    endforeach; // ループの終了
    wp_reset_postdata(); // 直前のクエリを復元する
    ?>
  </ul>



  <p>【年別アーカイブ】</p>
  <?php
  // 年アーカイブURLを /news/YYYY/ に
  add_filter('year_link', function ($link, $year) {
    return home_url('/news/' . $year . '/');
  }, 10, 2);

  // wp_get_archives の「件数」を <a> 内に入れる
  add_filter('get_archives_link', function ($link_html, $url, $text, $format, $before, $after, $selected) {
    if ($format === 'linkedcount') {
      // &nbsp; を除去し、半角()→全角（）
      $after = str_replace('&nbsp;', '', $after);
      $after = preg_replace('/\((\d+)\)/', '（$1）', $after);

      // 「2025年（3）」の全体をリンク化
      $link_html = "\t<li>$before<a href='" . esc_url($url) . "'>" . esc_html($text . '年') . "$after</a></li>\n";
    }
    return $link_html;
  }, 10, 7);

  // 呼び出し
  echo '<ul class="year-list">';
  wp_get_archives([
    'type'            => 'yearly',
    'format'          => 'linkedcount', // ←上のフィルターを有効化
    'show_post_count' => true,          // 件数を出す
    'post_type'       => 'post',
  ]);
  echo '</ul>';
  ?>

  <p>【カテゴリー一覧】</p>
  <?php $cats = get_categories(); ?>
  <?php foreach ($cats as $cat) : ?>
    <article>
      <a href="<?php echo get_category_link($cat->term_id); ?>"><?php echo $cat->name; ?></a>
    </article>
  <?php endforeach; ?>

</div>
<?php get_footer(); ?>