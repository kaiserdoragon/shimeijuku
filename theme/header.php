<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="<?php if (wp_title('', false)): ?><?php bloginfo('name'); ?>の<?php echo trim(wp_title('', false)); ?>のページです。<?php endif; ?><?php bloginfo('description'); ?>">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/icons/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>

<body>
	<div class="wrap">
		<header class="header">
			<div class="header--inner">
				<h1 class="header--logo">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/common/logo.svg" alt="目標を達成する力を子供たちへ　真明塾" width="194" height="65">
					</a>

				</h1>
				<button id="js-gnav_btn" class="gnav_btn" aria-label="メニューを開く" aria-controls="js-gnav" aria-expanded="false">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</button>
				<nav id="js-gnav" class="gnav" aria-label="メインナビゲーション">
					<ul>
						<li><a href="<?php echo esc_url(home_url('/features')); ?>">真明塾の特徴</a></li>
						<li><a href="<?php echo esc_url(home_url('/courses')); ?>">コース紹介</a></li>
						<li><a href="<?php echo esc_url(home_url('/policy')); ?>">指導方針</a></li>
						<li><a href="<?php echo esc_url(home_url('/testimonials')); ?>">塾生の声</a></li>
						<li><a href="<?php echo esc_url(home_url('/trial')); ?>">無料体験授業</a></li>
						<li><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
					</ul>
				</nav>
			</div>
		</header>