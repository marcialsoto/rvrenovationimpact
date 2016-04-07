<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header', 'super');
      get_template_part('templates/header');
    ?>
    <div class="wrap masshead__page container" role="document">
      <?php get_template_part('templates/masshead', 'page'); ?>
    </div>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main" role="main">
          
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Config\display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
            <?php if ( is_page(array('À propos de nous', 'About us', 'Services', 'Service après sinistre', 'Services after disaster', 'Réalisations', 'Achievements')) ) {?>
              <?php get_template_part('templates/sidebar', 'menu'); ?>
            <?php }else if ( is_page(array('Contact Us', 'Contactez-Nous')) ) {?>
              <?php get_template_part('templates/sidebar', 'contacto'); ?>
            <?php }else{ ?>
              <?php include Wrapper\sidebar_path(); ?>
            <?php } ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
