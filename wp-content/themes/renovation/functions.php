<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
  'lib/wp_bootstrap_navwalker.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/* Custom Login */

function rv_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/dist/images/logo--sm.png); 
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'rv_login_logo' );

function rv_url_login( $url ) {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'rv_url_login' );

function rv_title_login() {
    return 'R&V Renovation Impact';
}
add_filter( 'login_headertitle', 'rv_title_login' );

function themeslug_enqueue_style() {
  wp_enqueue_style( 'core', get_template_directory_uri() . '/assets/styles/login.css', false ); 
}

add_action( 'login_enqueue_scripts', 'themeslug_enqueue_style', 10 );
