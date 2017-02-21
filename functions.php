<?php
include(TEMPLATEPATH . '/inc/scripts.php');
include(TEMPLATEPATH . '/inc/widgets.php');
require_once(TEMPLATEPATH."/lib/MaterializecssCompilerInPHP/MatCompiler.php");
/* Generate css after user saves on personalization menu */
function generateCSS(){
    $compiler = new MatCompiler();
    $compiler->setPrimaryColor("blue-grey","lighten-2");
    $compiler->setSecondaryColor("deep-orange","accent-2");
    $compiler->setNavbarFontColor("white","",true);
    $compiler->compileScss(TEMPLATEPATH."/css/","materialize.css");
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
    <h1 class="header center">' . wp_kses_post($header_title) . '</h1>
        <div class="row center">
            <h5 class="header col s12">' . wp_kses_post($header_subtext) . '</h5>
        </div>';
        if ($header_button_url) {
            echo '
        <div class="row center">
            <a id="download-button" class="btn-large waves-effect waves-light" href="' . esc_url($header_button_url) . '">' . esc_html($header_button) . '</a>
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

/* Add excerpt to pages*/
add_post_type_support( 'page', 'excerpt' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
?>