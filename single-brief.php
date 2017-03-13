<?php get_header(); ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      

<div class="container-fluid video-container" style="min-height: 2972px; margin-bottom: 0px; padding-left: 0px; padding-right:0px;">

    

<?php echo get_post_meta($post->ID, 'brief_row_1', 1); ?>



</div>







  <?php endwhile; ?>
  <?php endif; ?>


<?php get_footer(); ?>
