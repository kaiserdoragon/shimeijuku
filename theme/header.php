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
			<h1 class="header--logo">
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/common/logo.svg" alt="目標を達成する力を子供たちへ　真明塾" width="194" height="65">
				</a>
			</h1>
			<button class="hamburger-overlay" aria-label="メニュー" aria-controls="overlay-menu" aria-expanded="false">
				<span class="hamburger-overlay__line"></span>
				<span class="hamburger-overlay__line"></span>
				<span class="hamburger-overlay__line"></span>
			</button>
			<nav id="overlay-menu" class="gnav nav-overlay" aria-label="メインナビゲーション" aria-hidden="true">
				<div class="nav-overlay__content">
					<ul class="nav-overlay__list">
						<li class="nav-overlay__item"><a href="<?php echo esc_url(home_url('/features')); ?>">真明塾について</a></li>
						<li class="nav-overlay__item">
							<a href="<?php echo esc_url(home_url('/courses')); ?>">コース紹介</a>
							<ul class="dropdownmenu">
								<li><a href="https://example.com/">小学部 公立中進学科</a></li>
								<li><a href="https://example.com/">中学部 高校受験科</a></li>
								<li><a href="https://example.com/">高校部 大学受験科</a></li>
							</ul>
						</li>
						<li class="nav-overlay__item"><a href="<?php echo esc_url(home_url('/trial')); ?>">無料体験授業</a></li>
						<li class="nav-overlay__item">
							<a href="<?php echo esc_url(home_url('/trial')); ?>">実績・塾生の声</a>
							<ul class="dropdownmenu">
								<li><a href="https://example.com/">合格・成績向上実績</a></li>
								<li><a href="https://example.com/">合格体験記</a></li>
								<li><a href="https://example.com/">塾生の声</a></li>
							</ul>
						</li>
						<li class="nav-overlay__item"><a href="<?php echo esc_url(home_url('/policy')); ?>">教室概要</a></li>
						<li class="nav-overlay__item"><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
					</ul>
				</div>
			</nav>
		</header>