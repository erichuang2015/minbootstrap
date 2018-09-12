<?php
if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}
$sidebar_pos = get_theme_mod( 'sidebar_position' );
if ( 'both' === $sidebar_pos ) : ?>
  <div class="col-md-3 widget-area" id="left-sidebar" role="complementary">
<?php else : ?>
  <div class="col-md-4 widget-area" id="left-sidebar" role="complementary">
<?php endif; ?>
<?php
dynamic_sidebar( 'left-sidebar' ); // https://codex.wordpress.org/Function_Reference/dynamic_sidebar
?>
</div><!-- #left-sidebar -->
