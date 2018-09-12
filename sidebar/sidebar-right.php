<?php
$sidebar_pos = get_theme_mod( 'sidebar_position' );
if ( 'both' === $sidebar_pos ) : ?>
  <div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
<?php else : ?>
  <div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
<?php endif; ?>
<?php
dynamic_sidebar( 'right-sidebar' ); // https://codex.wordpress.org/Function_Reference/dynamic_sidebar
?>
</div><!-- #right-sidebar -->
