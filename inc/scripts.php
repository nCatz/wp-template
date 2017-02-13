<?php
function mytheme_scripts() {
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-2.1.1.min.js' );
    wp_enqueue_script( 'script-materialize', get_template_directory_uri() . '/js/materialize.js', array(), '1.0.0', true );
    wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array(), '1.0.0', true );
}
 
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );
?>