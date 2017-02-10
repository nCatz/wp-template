<!-- Archivo de cabecera global de Wordpress -->
<?php get_header(); ?>
<!-- Listado de posts -->
<?php if ( have_posts() ) : ?>
  <section>
    <div class="container">
  <div id="grid-blog">
    <?php while ( have_posts() ) : the_post(); ?>
      
      <div class="grid-blog-item">
          <div class="card hoverable">
              <?php if ( has_post_thumbnail() ) : ?>
                <div class="card-image">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                      <?php the_post_thumbnail( 'full', array( 'class'  => 'blog-thumbnail-responsive' ) ); ?>
                  </a>
                  <a href="<?php the_permalink(); ?>"><span class="card-title <?php echo get_primary_text_color();?>-text"><?php the_title(); ?></span></a>
                </div>
              <?php else : ?>
                <div class="card-content">
                  <a href="<?php the_permalink(); ?>"><span class="card-title <?php echo (get_primary_text_color() == "white")?"black":get_primary_text_color();?>-text"><?php the_title(); ?></span></a>
                    
                </div>
                <div class="divider"></div>
              <?php endif; ?>
              <div class="card-content">
                <?php the_excerpt(); ?>
              </div>
              <div class="card-action">
                <div class="row">
                  <div class="col s6">Por <?php the_author_posts_link() ?></div>
                  <div class="col s6"><time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time></div>
                </div>
              </div>
          </div>
      </div>
    <?php endwhile; ?>
    </div>
    </div>
    <div class="pagination">
      <span class="in-left"><?php next_posts_link('« Entradas antiguas'); ?></span>
      <span class="in-right"><?php previous_posts_link('Entradas más recientes »'); ?></span>
    </div>
    <br><br><br><br><br>
  </section>
<?php else : ?>
  <p><?php _e('Ups!, no hay entradas.'); ?></p>
<?php endif; ?>
<!-- Archivo de pié global de Wordpress -->
<?php get_footer(); ?>