<?php
/**
 * Declaring widgets 
 */


if ( ! function_exists( 'my_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function my_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'minbootstrap' ),
			'id'            => 'right-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'minbootstrap' ),
			'id'            => 'left-sidebar',
			'description'   => 'Left sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Full', 'minbootstrap' ),
			'id'            => 'footerfull',
			'description'   => 'Full sized footer widget with dynamic grid',
		    'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

	}
} // endif function_exists( 'my_widgets_init' ).

add_action( 'widgets_init', 'my_widgets_init' );
