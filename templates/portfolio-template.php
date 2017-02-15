<?php
/*
Template Name: Portfolio template
*/
?>
<?php get_header(); ?>
<div class="container row">


<?php
$query = get_pages( array('hierarchical' => 0, 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/project-template.php' ) );
foreach($query as $page) {
	echo '<div class="card">
		<div class="card-content">
			    '.$page->post_title.'<br />
		</div>
	</div>';
}
?>
</div>
<?php get_footer(); ?>