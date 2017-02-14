<?php get_header(); ?>
<?php if ( !is_front_page() ) : ?>
<div class="container row">
<div class="col s12 card-panel">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <div class="divider"></div>
    <?php endwhile; endif; ?>
</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>
