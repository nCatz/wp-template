<?php
include(TEMPLATEPATH . '/inc/scripts.php');
include(TEMPLATEPATH . '/inc/widgets.php');

/* Variables */
function get_theme_background_color(){
    return "grey lighten-4";
}

function get_primary_color(){
    return "indigo";
}

function get_primary_text_color(){
    return "white";
}
/* Generate css after user saves on personalization menu */
function generateCSS(){
    //TODO
}
add_action( 'customize_save_after', 'generateCSS' );

/* Cambia el nombre de la clase activa del menu*/
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
register_nav_menus( array(
	'main' => 'Main',
	'footer' => 'Footer'
));
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
function is_blog_entry () {
    return ( is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}
/**
 * Header text
 */
function header_text() {

	if ( !function_exists('pll_register_string') ) {
		$header_title 		= get_theme_mod('header_title');
		$header_subtext 	= get_theme_mod('header_subtext');
		$header_button		= get_theme_mod('header_button');
	} else {
		$header_title 		= pll__(get_theme_mod('header_title'));
		$header_subtext 	= pll__(get_theme_mod('header_subtext'));
		$header_button		= pll__(get_theme_mod('header_button'));
	}
	$header_button_url	= get_theme_mod('header_button_url');


echo '<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>';
    echo '
    <h1 class="header center '.get_primary_color().'-text">' . wp_kses_post($header_title) . '</h1>
        <div class="row center">
            <h5 class="header col s12 '.get_primary_color().'-text">' . wp_kses_post($header_subtext) . '</h5>
        </div>';
        if ($header_button_url) {
            echo '
        <div class="row center">
            <a id="download-button" class="btn-large waves-effect waves-light '.get_primary_color().' '.get_primary_text_color().'-text " href="' . esc_url($header_button_url) . '">' . esc_html($header_button) . '</a>
        </div>';
        echo '
        <br><br>

      </div>
    </div>';
    if ( get_theme_mod( 'ncatz_logo' ) ) {
        echo '<div class="parallax"><img src="'.esc_url( get_theme_mod( 'ncatz_logo' ) ).'" alt="Unsplashed background img 1"></div>';
    } else {
        //echo '<div class="parallax"><img src="https://yeray.ncatz.com/wp-content/uploads/2017/02/background1.jpg" alt="Unsplashed background img 1"></div>';
    }
    echo '</div>';

    
        }
}
function print_nav(){
    echo '
    <nav class="'.get_primary_color().'" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo '.get_primary_text_color().'-text">nCatz</a>
      <ul class="right hide-on-med-and-down">';
				wp_nav_menu(array(
                    'theme_location' => 'main',
                    'menu_id' => 'primary-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				)); 
     echo '
      </ul>
			<ul id="nav-mobile" class="side-nav">';
       wp_nav_menu(array(
                    'theme_location' => 'main',
                    'menu_id' => 'primary-menu',
					'container' => '',
					'items_wrap' => '%3$s'
				));
    echo '
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>';
}

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="'.get_primary_text_color().'-text"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

/* Add excerpt to pages*/
add_post_type_support( 'page', 'excerpt' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
?>