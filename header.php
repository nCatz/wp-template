<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title('|', true, 'right');?> <?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
	<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
 
	<?php wp_head(); ?>
 
</head>
 
<body <?php body_class("Site"); ?>>
 
<header id="main-header">
	<nav role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">nCatz</a>
			<ul class="right hide-on-med-and-down">
				<?php 
					wp_nav_menu(array(
						'theme_location' => 'main',
						'menu_id' => 'primary-menu',
						'container' => '',
						'items_wrap' => '%3$s'
					));
				?>
			</ul>
			<ul id="nav-mobile" class="side-nav">
				<?php 
					wp_nav_menu(array(
						'theme_location' => 'main',
						'menu_id' => 'primary-menu',
						'container' => '',
						'items_wrap' => '%3$s'
					));
				?>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div> <!-- <div class="nav-wrapper container"> -->
	</nav>
	<?php if( is_front_page() ) : ?>
		<?php header_text(); ?>
	<?php endif; ?>
</header>
<main class="Site-content">