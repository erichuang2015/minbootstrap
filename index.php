<?php
// if full width:
$main_class="container-fluid";
//$main_class="container"; 

// calc cols with sidebars
 $sidebar_pos = get_theme_mod( 'sidebar_position' );
 $left_class=$right_class=null; $content_class='col-md-12';
 if ( 'right' === $sidebar_pos ) { $right_class='col-md-4';  $content_class='col-md-8';}
 elseif ( 'both' === $sidebar_pos ) { $right_class='col-md-3'; $left_class='col-md-3';  $content_class='col-md-6';}
 elseif ( 'left' === $sidebar_pos ) { $left_class='col-md-4'; $content_class='col-md-8'; }
?>
<?php get_header(); ?>
<?php 
  include "navigator.php"; 
?>

<div class="wrapper" id="page-wrapper">
  <div class="<?= $main_class ?>" id="content">

      <div class="row">
       <?php if ( $left_class): ?>
        <div class="<?= $left_class ?>">
        <?php //get_sidebar(); 
          get_template_part( 'sidebar/sidebar-left');
        ?>
        </div>
       <?php endif; ?>
      <div class="<?= $content_class ?>" >
      <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>">
                    <h2>
                    <a href="<?php the_permalink() ?>" rel="bookmark" 
                             title="<?php the_title(); ?>">
                             <?php the_title(); ?>
                    </a>
                    </h2>
                    <!-- span> <?php the_author(); ?> on <?php the_time(__('Y-m-d','min')) ?></span -->
                    <div> 
    <?php
    // treść strony / postu (przykład bez komentarzy i nawigator next/prev)
     the_content(__('Continue Reading','min').' &raquo;'); 
     ?>
                    </div>
                </div> <!-- /post -->
            <?php endwhile; ?>
        <?php else : ?>
            <p> <?php _e('Nie ma co wyświetlić','min'); ?></p>
        <?php endif; ?>

      </div>
       <?php if ( $right_class): ?>
        <div class="<?= $right_class ?>">
        <?php //get_sidebar(); 
          get_template_part( 'sidebar/sidebar-right');
        ?>
        </div>
       <?php endif; ?>
      </div>

    </div>
  </div><!-- /.container -->
<?php get_footer(); ?>