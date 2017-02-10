<?php get_header(); ?>


<div class="blog_entry row center-align">
      <div class="<?php echo ( is_active_sidebar( 'sidebar-right' ) && is_blog_entry() )?"col s12 m12 l9":"col s12"; ?>"><div class="card-panel">
      		    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>   
        <h1><?php the_title(); ?></h1>
        <small><?php the_time( get_option( 'date_format' ) ); ?></small>
        <div class="entry-meta">
            <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'mytheme' ) ); ?></span>
        </div>
        <?php the_content(); ?>
 
        <?php
        $posttags = get_the_tags();
        if ($posttags) {
          foreach($posttags as $tag) {
            echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'. ' '; 
          }
        }
        ?>
 
        <div class="author_post">
            <?php _e( 'Escrito por ', 'mytheme' ); ?>
            <?php echo get_the_author(); ?> - <?php echo get_the_author_meta("user_description"); ?>
        </div>
     <?php comments_template( '', true ); ?>
    <?php endwhile; endif; ?>
      </div></div>
      <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>