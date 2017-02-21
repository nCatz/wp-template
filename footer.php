</main>
  <?php get_sidebar('footer');?>
  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5>Puedes seguirme en</h5>
          <div class="social-buttons">
            <a href="https://github.com/yeray697/"><img src="https://yeray.ncatz.com/wp-content/uploads/2017/02/github-128.png"width="48px" height="48px"></a>
            <a href="https://www.linkedin.com/in/yeray-ruiz-juárez-b7384a11a"><img src="https://yeray.ncatz.com/wp-content/uploads/2017/02/linkedin-128.png" width="48px" height="48px"></a>
          </div>
        </div> <!-- <div class="col l6 s12"> -->
        <div class="col l4 offset-l2 s12">
          <h5>Links</h5>
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
        <span class="light-bold">© <?php echo date("Y"); ?> Copyright</span>
        <a class="light-bold right" href="https://yeray.ncatz.com/policy/">Privacy</a>
      </div> <!-- <div class="container"> -->
    </div> <!-- <div class="footer-copyright"> -->
  </footer>
  <!-- AddToAny BEGIN -->
  <script>
  var a2a_config = a2a_config || {};
  a2a_config.locale = "es";
  a2a_config.prioritize = ["whatsapp"];
  </script>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
  <!-- AddToAny END -->
  <?php wp_footer(); ?>
</body>
</html>