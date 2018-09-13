  <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">
    <a class="skip-link sr-only sr-only-focusable" href="#content">
      <?php esc_html_e('Skip to content', 'minbootstrap'); ?></a>
    <nav class="navbar navbar-expand-md navbar-dark">
      <!-- logo / title  -->
      <?php if (!has_custom_logo()) { ?>
        <?php if (is_front_page() && is_home()) : ?>
          <h1 class="navbar-brand mb-0">
                <a rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
          </h1>
        <?php else : ?>
          <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
        <?php endif; ?>
      <?php  } else {
        the_custom_logo();
      } ?><!-- end custom logo -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                                              data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" 
                                              aria-label="<?php esc_attr_e('Toggle navigation', 'minbootstrap'); ?>">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- The WordPress Menu goes here -->
        <?php 

    $primary_menu_args = array(
      'theme_location' => 'primary',
      'container_class' => 'collapse navbar-collapse',
      'container_id' => 'navbarNavDropdown',
      'menu_class' => 'navbar-nav ml-auto',
      'fallback_cb' => '',
      'menu_id' => 'main-menu',
      'depth' => 2,
      'walker' => new wp_bootstrap_navwalker()
    );



    wp_nav_menu($primary_menu_args);


    ?>
      <?php if ('container' == $container) : ?>
      </div><!-- .container -->
      <?php endif; ?>

    </nav><!-- .site-navigation -->
