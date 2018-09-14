<?php
function minb1_remove_scripts() {
    wp_dequeue_style( 'minb1-styles' );
    wp_deregister_style( 'minb1-styles' );

    wp_dequeue_script( 'minb1-scripts' );
    wp_deregister_script( 'minb1-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'minb1_remove_scripts', 20 );

function theme_enqueue_styles() {
    // Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style( 'oe-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'oe-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/*
function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );
*/