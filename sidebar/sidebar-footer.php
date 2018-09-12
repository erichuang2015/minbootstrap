<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>
<div class="footer section large-padding bg-dark">
  <div class="footer-inner section-inner">      
    <div class="wrapper" id="wrapper-footer-full">
        <div class="row">
          <?php dynamic_sidebar( 'footerfull' ); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
