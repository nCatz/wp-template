<?php
if ( ! is_active_sidebar( 'sidebar-footer' ) || !is_front_page() ) {
	return;
}
?>
<?php dynamic_sidebar( 'sidebar-footer' ); ?>