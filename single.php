<?php get_header(); ?>

<div class="blog_entry row center-align">
  <div class="<?php echo ( is_active_sidebar( 'sidebar-right' ) && is_blog_entry() )?"col s12 m12 l9":"col s12"; ?>">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="card">
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="card-image">
            <?php the_post_thumbnail( 'full', array( 'class'  => 'blog-entry-thumbnail' ) ); ?>
            <a class="btn-floating btn-large halfway-fab waves-effect waves-light blog-share-btn" onClick="shareBlog();"><i class="material-icons">share</i></a>
          </div> <!-- <div class="card-image"> -->
        <?php else: ?>
          <a class="btn-floating btn-large halfway-fab waves-effect waves-light blog-share-btn" onClick="shareBlog();"><i class="material-icons">share</i></a>
        <?php endif; ?>
        <div class="card-content">
          <h1><span class=""><?php the_title(); ?></span></h1>
          <div class="row">
            <div class="col s12 blog-entry-info">
              <div class="divider"></div>
              <i class="material-icons">account_circle</i>
              <a href="<?php echo get_the_author_link(); ?>"><?php echo get_the_author(); ?></a>
              <span class="tab-separator">/</span>
              <i class="material-icons">perm_contact_calendar</i><?php the_time( get_option( 'date_format' ) ); ?>
              <span class="tab-separator">/</span>
              <i class="material-icons">folder</i>
              <?php $category = get_the_category()[0]; ?>
              <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><i class="i-right-double-arrow"></i> <?php echo $category->name; ?></a>
              <div class="divider"></div>
            </div> <!-- <div class="col s12"> -->
          </div> <!-- <div class="row"> -->
          <?php the_content(); ?>
          <?php
            $posttags = get_the_tags();
            if ($posttags) {
              foreach($posttags as $tag) {
                echo "<div class=\"chip\">";
                echo '  <a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>'. ' '; 
                echo "</div> <!-- <div class=\"chip\"> -->";
              }
            }
          ?>
        </div> <!-- <div class="card-content"> -->
      </div> <!-- <div class="card"> -->
      <?php comments_template( '', true ); ?>
    <?php endwhile; endif; ?>
  </div> <!-- <div class="col s12 m12 l9"> -->
  <?php get_sidebar(); ?>
</div> <!-- <div class="blog_entry row center-align"> -->
<?php get_footer(); ?>
