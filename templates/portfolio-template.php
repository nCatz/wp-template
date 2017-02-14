<?php
/*
Template Name: Portfolio template
*/
?>
<?php get_header(); ?>
<div class="container row">


<?php
        $template = 'templates/project-template';
        $query = new WP_Query( array( 'post_type' => 'page', 'meta_key' => '_wp_page_template', 'meta_value' => $template.'.php' ) );

        if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        
        <?php the_title(); ?>
        <?php endwhile; // end of the loop. ?>


      <?php wp_reset_query(); ?>
</div>
</div>
<?php get_footer(); ?>
