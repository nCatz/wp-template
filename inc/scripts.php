<?php
function load_scripts() {
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-2.1.1.min.js' );
    wp_enqueue_script( 'script-materialize', get_template_directory_uri() . '/js/materialize.js', array(), '1.0.0', true );
    wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array(), '1.0.0', true );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js.js', array(), '1.0.0', true );
    wp_enqueue_style( 'material', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style('materialize',get_template_directory_uri().'/css/materialize.css');
    wp_enqueue_style('style',get_template_directory_uri().'/style.css');
}
 
add_action( 'wp_enqueue_scripts', 'load_scripts' );
?>
