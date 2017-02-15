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
 
<body <?php body_class("Site ".get_theme_background_color()); ?>>
 
	<!-- #MAIN HEADER  -->
<header id="main-header">
   <?php print_nav(); ?>
	 <?php if( is_front_page() ) header_text(); ?>
</header>
	<!-- #MAIN HEADER  -->
<main class="Site-content">