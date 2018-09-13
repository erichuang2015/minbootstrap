<?php

if (!function_exists('my_theme_customize_register')) {
  /**
   * @param WP_Customize_Manager $wp_customize - Customizer reference.
   */
  function my_theme_customize_register($wp_customize)
  {

    // Section = Min Bootstrap Layout.
    $wp_customize->add_section('minbootstrap_layout_options', array(
      'title' => __('Min Bootstrap Layout', 'minbootstrap'),
      'capability' => 'edit_theme_options',
      'description' => __('Container width and sidebar defaults', 
                          'minbootstrap'),
      'priority' => 100,
    ));

    $wp_customize->add_setting('sidebar_position', array(
      'default' => 'right',
      'type' => 'theme_mod',
//      'sanitize_callback' => '',
      'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,
        'sidebar_position',
        array(
          'label' => __('Sidebar Positioning', 'minbootstrap'),
          'description' => __(
            "Select: right, left, both or none.",
            'minbootstrap'
          ),
          'section' => 'minbootstrap_layout_options',
          'settings' => 'sidebar_position',
          'type' => 'select',
//          'sanitize_callback' => '????',
          'choices' => array(
            'right' => __('Right sidebar', 'minbootstrap'),
            'left' => __('Left sidebar', 'minbootstrap'),
            'both' => __('Left & Right sidebars', 'minbootstrap'),
            'none' => __('No sidebar', 'minbootstrap'),
          ),
          'priority' => '20',
        )
      )
    );
  }
} // endif function_exists( 'my_theme_customize_register' ).
add_action('customize_register', 'my_theme_customize_register');

////////////////// logo

add_theme_support( 'custom-logo' );
