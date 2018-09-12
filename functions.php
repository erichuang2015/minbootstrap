<?php
function my_theme_enqueue() {
  // https://developer.wordpress.org/reference/functions/wp_enqueue_script/
  // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
  $the_theme = wp_get_theme();
  wp_enqueue_style( 'minb1-styles', 
                    get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
  wp_enqueue_script( 'minb1-scripts', 
                    get_template_directory_uri() . '/js/theme.min.js', array(), false );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue' );

////////// menu

// Register Custom Navigation Walker
require_once('inc/class-wp-bootstrap-navwalker.php');

// bez tego nie mozna menu definiowac z zaplecza WP
register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'main-menu' ),
) );


/// customizer
require_once('inc/custom.php');
require_once('sidebar/widgets.php');
