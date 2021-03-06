<?php get_header(); ?>
<!-- Post list -->
<?php if ( have_posts() ) : ?>
  <section>
    <div class="container">
      <div id="masonry-blog" class="row grid-blog">
        <?php while ( have_posts() ) : the_post(); ?>
          <div class="col s12 m6 grid-blog-item">
            <div class="card hoverable grid-card-blog-item">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="card-image">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'full', array( 'class'  => 'blog-thumbnail-responsive' ) ); ?>
                  </a>
                  <a href="<?php the_permalink(); ?>"><span class="card-title"><?php the_title(); ?></span></a>
                </div> <!-- <div class="card-image"> -->
              <?php else : ?>
                <div class="card-content">
                  <a href="<?php the_permalink(); ?>"><span class="card-title"><?php the_title(); ?></span></a>
                </div> <!-- <div class="card-content"> -->
                <div class="divider"></div>
              <?php endif; ?>
              <div class="card-content">
                <?php the_excerpt(); ?>
              </div> <!-- <div class="card-content"> -->
              <div class="card-action grid-card-action-blog-item">
                <span class="left-align">Por <?php the_author_posts_link() ?></span>
                <span class="right-align"><time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time></span>
              </div> <!-- <div class="card-action grid-card-action-blog-item"> -->
            </div> <!-- <div class="card hoverable grid-card-blog-item"> -->
          </div> <!-- <div class="col s12 m6 grid-blog-item"> -->
        <?php endwhile; ?>
      </div> <!-- <div id="masonry-blog" class="row grid-blog"> -->

      <div class="pagination">
        <span class="in-left"><?php next_posts_link('« Entradas antiguas'); ?></span>
        <span class="in-right"><?php previous_posts_link('Entradas más recientes »'); ?></span>
      </div> <!-- <div class="pagination"> -->
    </div> <!-- <div class="container"> -->
  </section>
<?php else : ?>
  <p><?php _e('Ups!, no hay entradas.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
