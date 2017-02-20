<?php
if ( ! is_active_sidebar( 'sidebar-right' ) || !is_blog_entry() ) {
	return;
}
?>
<div class="col s12 m12 l3 col_blog_entry">
    <div class="card-panel">
            <?php dynamic_sidebar( 'sidebar-right' ); ?>
    </div>
</div>