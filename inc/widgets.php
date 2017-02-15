<?php
/* Sidebar */
register_sidebar(array(
 'id' => 'sidebar-right',
 'name' => 'Sidebar Right',
 'before_widget' => '',
 'after_widget' => '',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));

register_sidebar( array(
    'id'            => 'sidebar-footer',
    'name'          => 'Sidebar Footer',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
) );

/* Widgets */
function ncatz_create_widget(){
    include_once(TEMPLATEPATH . '/inc/widgets/project_widget.php');
    register_widget('project_widget');
}
add_action('widgets_init','ncatz_create_widget'); 
?>