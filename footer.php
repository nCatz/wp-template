</main>
  <?php get_sidebar('footer');?>
  <footer class="page-footer <?php echo get_primary_color(); ?>">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="<?php echo get_primary_text_color()?>-text">Footer Content</h5>
          <p class="<?php echo get_primary_text_color()?>-text text-lighten-1"><?php bloginfo('description'); ?></p>
        </div> <!-- <div class="col l6 s12"> -->
        <div class="col l4 offset-l2 s12">
          <h5 class="<?php echo get_primary_text_color()?>-text">Links</h5>
          <ul>
            <?php
              wp_nav_menu(array(
              'theme_location' => 'footer',
              'menu_id' => 'footer-menu',
              'container' => '',
              'items_wrap' => '%3$s')); 
            ?>
          </ul>
        </div> <!-- <div class="col l4 offset-l2 s12"> -->
      </div> <!-- <div class="row"> -->
    </div> <!-- <div class="container"> -->
    <div class="footer-copyright">
      <div class="container">
        <span class="<?php echo get_primary_text_color()?>-text light-bold">© <?php echo date("Y"); ?> Copyright</span>
        <a class="<?php echo get_primary_text_color()?>-text right light-bold" href="<?php echo ""; ?>">Privacy</a>
      </div> <!-- <div class="container"> -->
    </div> <!-- <div class="footer-copyright"> -->
  </footer>
  <?php wp_footer(); ?>
</body>
</html>