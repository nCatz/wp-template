<?php

function ncatz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel         = 'ncatz_header_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '9';
    $wp_customize->get_section( 'title_tagline' )->title        = __('Site branding', 'ncatz');
    $wp_customize->remove_control( 'header_textcolor' );


    //Titles
    class Ncatz_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;border-bottom:1px solid;padding:5px;color:#111;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
    //___Header area___//
    $wp_customize->add_panel( 'ncatz_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'ncatz'),
    ) );

    //___Header text___//
    $wp_customize->add_section(
        'ncatz_header_title',
        array(
            'title'         => __('Header text', 'ncatz'),
            'priority'      => 14,
            'panel'         => 'ncatz_header_panel'
        )
    );
    $wp_customize->add_setting(
        'header_title',
        array(
            'default' => '',
            'sanitize_callback' => 'ncatz_sanitize_text',
            'transport'     => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'header_title',
        array(
            'label' => __( 'Header text', 'ncatz' ),
            'section' => 'ncatz_header_title',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'header_subtext',
        array(
            'default' => '',
            'sanitize_callback' => 'ncatz_sanitize_text',
            'transport'     => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'header_subtext',
        array(
            'label' => __( 'Header small text', 'ncatz' ),
            'section' => 'ncatz_header_title',
            'type' => 'text',
            'priority' => 10
        )
    );    
    $wp_customize->add_setting(
        'header_button',
        array(
            'default' => '',
            'sanitize_callback' => 'ncatz_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_button',
        array(
            'label' => __( 'Button text', 'ncatz' ),
            'section' => 'ncatz_header_title',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'header_button_url',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'header_button_url',
        array(
            'label' => __( 'Button URL', 'ncatz' ),
            'section' => 'ncatz_header_title',
            'type' => 'text',
            'priority' => 11
        )
    );
    /*___Header logo___*/
    $wp_customize->add_section( 'ncatz_logo_section' , array(
        'title'       => __( 'Logo', 'ncatz' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
        'panel'         => 'ncatz_header_panel'
    ) );
    $wp_customize->add_setting( 'ncatz_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ncatz_logo', array(
        'label'    => __( 'ncatz_logo', 'ncatz' ),
        'section'  => 'ncatz_logo_section',
        'settings' => 'ncatz_logo',
    ) ) );

    
}
add_action( 'customize_register', 'ncatz_customize_register' );


/**
 * Sanitize
 */
//Header type
function ncatz_sanitize_header( $input ) {
    if ( in_array( $input, array( 'image', 'shortcode', 'video', 'nothing' ), true ) ) {
        return $input;
    }
}
//Text
function ncatz_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function ncatz_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
//Menu style
function ncatz_sanitize_menu_style( $input ) {
    if ( in_array( $input, array( 'inline', 'centered' ), true ) ) {
        return $input;
    }
}
//Menu style
function ncatz_sanitize_sticky( $input ) {
    if ( in_array( $input, array( 'sticky', 'static' ), true ) ) {
        return $input;
    }
}
//Footer widget areas
function ncatz_sanitize_fwidgets( $input ) {
    if ( in_array( $input, array( '1', '2', '3' ), true ) ) {
        return $input;
    }
}
//Blog layout
function ncatz_sanitize_blog( $input ) {
    if ( in_array( $input, array( 'list', 'fullwidth', 'masonry-layout' ), true ) ) {
        return $input;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ncatz_customize_preview_js() {
	wp_enqueue_script( 'ncatz_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ncatz_customize_preview_js' );
