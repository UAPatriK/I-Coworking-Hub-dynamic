<?php get_header(); ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      

<!-- BLOCK WITH SCHOOL HEADER -->
     <div class="site-wrapper">
      <div class="site-wrapper-inner" style="vertical-align: top;">
        <div class="cover-container">
         <?php the_post_thumbnail('','class=img-responsive img-cover'); ?>
         <div class="col-col-lg-11" style="padding-left:45px; margin-top:50px; ">  
          <h1 class="course_sign" ><?php echo get_post_meta($post->ID, 'ou_ru_title', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_title', 1); ?></h1>
        </div>
      </div>
    </div>
  </div>

<!-- END OF BLOCK WITH SCHOOL HEADER -->

<!-- BLOCK WITH SCHOOL COURSES -->
<div class="col-xs-12 block_borders slide-styles" style="display:<?php echo get_post_meta($post->ID, 'ou_courses_visibility', 1); ?>">
<section class="main">
  <div class="col-sm-6 col-md-4 col-xs-12  text_block"  >
    <h1><?php echo get_post_meta($post->ID, 'ou_ru_courses', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_courses', 1); ?></h1>
  </div>

  <?php
  $term = get_post_meta($post->ID, 'ou_courses_slug', 1);

  $course_programm_category = new WP_Query( $args );
  $course_programm_category = new WP_Query( array(
   'post_type' => 'course',
   'paged'=>  $paged,
   'order' => ASC,
   'posts_per_page' => -1,
   'tax_query' => array(
    array(
      'taxonomy' => 'school_category',
      'field'    => 'slug',
      'terms'    => $term,
      ),
    ),
   ) );
  if( $course_programm_category->have_posts() ) {
    while( $course_programm_category->have_posts() ) {
      $course_programm_category->the_post();
      ?>

      <div class="col-sm-6 col-md-4 col-xs-12 course_item">
       <div class="col-lg-11 col-lg-offset-right-1">
        <div class="row item_border">
          <a href="<?php the_permalink(); ?>"  class="item_link">                   
            <div class="thumbnail_item ">
               <?php the_post_thumbnail('','class=img-responsive'); ?>
            </div>
            <div class="col-lg-10" style="margin-left: 10px;">
            <article>
              <h1><?php echo get_post_meta($post->ID, 'course_sign', 1); ?> </h1>
              <h2><?php echo get_post_meta($post->ID, 'course_part_price', 1); ?> грн в месяц</h2>
            </article>
            <div class="main2">
            <div id="main3" style="margin-bottom: 10px;">
              <p><?php echo get_post_meta($post->ID, 'flow_3', 1); ?></p>
              <p style="margin-top: 0px !important;"><?php echo get_post_meta($post->ID, 'flow_2', 1); ?></p>
              <p style="margin-top: 0px !important;"><?php echo get_post_meta($post->ID, 'flow_1', 1); ?></p>
            </div>
          </div>
        </div>
          </a>
        </div>
      </div>
    </div>

    <?php
  }
}
else {
}
?>
<?php wp_reset_postdata(); ?>
</section>
</div>
<!-- END OF BLOCK WITH SCHOOL COURSES -->


<!-- BLOCK WITH OPEN UNIVERSITY TALKS -->
<div class="col-xs-12 block_borders slide-styles"  style="display:<?php echo get_post_meta($post->ID, 'ou_talks_visibility', 1); ?>">
<section class="main3">
  <div class="col-sm-6 col-md-4 col-xs-12 text_block"  >
    <h1><?php echo get_post_meta($post->ID, 'ou_ru_talks', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_talks', 1); ?></h1>
  </div>

  <?php
  $term = get_post_meta($post->ID, 'ou_talks_slug', 1);
     
  $course_programm_category = new WP_Query( $args );
  $course_programm_category = new WP_Query( array(
   'post_type' => 'open-talks',
   'paged'=>  $paged,
   'order' => ASC,
   'posts_per_page' => -1,
   'tax_query' => array(
    array(
      'taxonomy' => 'item_category',
      'field'    => 'slug',
      'terms'    => $term,
      ),
    ),
   ) );
  if( $course_programm_category->have_posts() ) {
    while( $course_programm_category->have_posts() ) {
      $course_programm_category->the_post();
      ?>

      <div class="col-sm-6 col-md-4 col-xs-12 course_item" >
       <div class="col-lg-11 col-lg-offset-right-1">
        <div class="row item_border">
          <a href="<?php echo get_post_meta($post->ID, 'ol_url', 1); ?>"  class="item_link">                   
            <div class="thumbnail_item">
                          <?php the_post_thumbnail('','class=img-responsive'); ?>
            </div>

            <div class="col-lg-10" style="margin-left: 10px;">
              <article>
                <h1><?php echo get_post_meta($post->ID, 'ol_title', 1); ?> </h1>
                <h2 style=""><?php echo get_post_meta($post->ID, 'ol_price', 1); ?> </h2>
              </article>
              <p><?php echo get_post_meta($post->ID, 'ol_description', 1); ?> </p>
            </div>
          </a>
        </div>
      </div>
    </div>

    <?php
  }
}
else {
}
?>
<?php wp_reset_postdata(); ?>
</section>
</div>
<!-- END OF BLOCK WITH OPEN UNIVERSITY TALKS -->

<!-- BLOCK WITH SCHOOL SPECIAL PROJECTS -->
<div class="col-xs-12 block_borders slide-styles"  style="display:<?php echo get_post_meta($post->ID, 'ou_spec_projects_visibility', 1); ?>">
  <div class="col-sm-6 col-md-4 col-xs-12 text_block"  >
    <h1><?php echo get_post_meta($post->ID, 'ou_ru_spec_projects', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_spec_projects', 1); ?></h1>
  </div>

  <div class="col-sm-6 col-md-4 col-xs-12 course_item">
   <div class="col-lg-11 col-lg-offset-1">
    <div class="row item_border">
     <div class="thumbnail_item">
                 <?php the_post_thumbnail('','class=img-responsive'); ?></div>

      <div class="col-lg-10" style="margin-left: 10px;">
        <h1>PechaKucha Night</h1>
        <h2>200 грн за встречу</h2>
      </div>

    </div>
  </div>
</div>
</div>
<!-- END OF BLOCK WITH SCHOOL SPECIAL PROJECTS -->

<!-- BLOCK WITH SCHOOL TUTORS | MENTORS -->
<div class="col-xs-12 block_borders slide-styles"  style="display:<?php echo get_post_meta($post->ID, 'ou_tutors_visibility', 1); ?>">
  <section class="main1">

    <div class="col-sm-6 col-md-4 col-xs-12 text_block"  >
      <h1><?php echo get_post_meta($post->ID, 'ou_ru_tutors', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_tutors', 1); ?></h1>
    </div>

  <?php
    $term = get_post_meta($post->ID, 'ou_tutors_slug', 1);
    $course_programm_category = new WP_Query( $args );
    $course_programm_category = new WP_Query( array(
     'post_type' => 'team',
     'paged'=>  $paged,
     'order' => ASC,
     'posts_per_page' => -1,
     'tax_query' => array(
      array(
        'taxonomy' => 'person_category',
        'field'    => 'slug',
        'terms'    => $term,
        ),
      ),
     ) );
    if( $course_programm_category->have_posts() ) {
      while( $course_programm_category->have_posts() ) {
        $course_programm_category->the_post();
        ?>

        <div class="col-sm-6 col-md-4 col-xs-12 course_item" >
         <div class="col-lg-11 col-lg-offset-right-1">
          <div class="row item_border">
            <a href="<?php echo get_post_meta($post->ID, 'person_soc_url', 1); ?>"  class="item_link">                   
              <div class="thumbnail_item ">
                <?php the_post_thumbnail('','class=img-responsive hidden-xs'); ?>
              </div>

              <div class="col-lg-10" style="margin-left: 10px;">
                <article>
                  <h1 style="margin-bottom: 0px;"><?php echo get_post_meta($post->ID, 'person_rus_name', 1); ?> </h1>
                  <h1 style="margin-top: 0px;"><?php echo get_post_meta($post->ID, 'person_eng_name', 1); ?> </h1>
                </article>
                <div class="main1">
                  <div id="main2" style="margin-bottom: 10px; ">
                    <p style="  "><?php echo get_post_meta($post->ID, 'person_jd', 1); ?> </p>
                  </div>
                </div>
              </div>
            </a>

          </div>
        </div>
      </div>

      <?php
    }
  }
  else {
  }
  ?>
  <?php wp_reset_postdata(); ?>
</section>

<!-- <button type="button" class="btn btn-grey">
  ПОСМОТРЕТЬ ВСЕХ ТЬЮТОРОВ, МЕНТОРОВ, СПИКЕРОВ
</button> -->
</div>
<!-- END OF BLOCK WITH SCHOOL TUTORS | MENTORS -->


<!-- BLOCK WITH SCHOOL ALUMNIS -->
<div class="col-xs-12 block_borders slide-styles"  style="display:<?php echo get_post_meta($post->ID, 'ou_alumni_visibility', 1); ?>">
  <section class="main3">
    <div class="col-sm-6 col-md-4 col-xs-12 text_block" >
      <h1><?php echo get_post_meta($post->ID, 'ou_ru_alumni', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_alumni', 1); ?></h1>
    </div>

    <?php
    $term = get_post_meta($post->ID, 'ou_alumni_slug', 1);
    
    $course_programm_category = new WP_Query( $args );
    $course_programm_category = new WP_Query( array(
     'post_type' => 'team',
     'paged'=>  $paged,
     'order' => ASC,
     'posts_per_page' => -1,
     'tax_query' => array(
      array(
        'taxonomy' => 'person_category',
        'field'    => 'slug',
        'terms'    => $term,
        ),
      ),
     ) );
    if( $course_programm_category->have_posts() ) {
      while( $course_programm_category->have_posts() ) {
        $course_programm_category->the_post();
        ?>
        
        <div class="col-sm-6 col-md-4 col-xs-12 course_item" >
         <div class="col-lg-11 col-lg-offset-right-1">
          <div class="row item_border">

            <a href="<?php echo get_post_meta($post->ID, 'person_soc_url', 1); ?>" class="item_link">                   
              <div class="thumbnail_item">
                <?php the_post_thumbnail('','class=img-responsive hidden-xs'); ?>
              </div>

              <div class="col-lg-10" style="margin-left: 10px;">
               <article>
                 <h1 style="margin-bottom: 0px;"><?php echo get_post_meta($post->ID, 'person_rus_name', 1); ?> </h1>
                 <h1 style="margin-top: 0px;"><?php echo get_post_meta($post->ID, 'person_eng_name', 1); ?> </h1>
               </article>
               <div class="main2">
                <div id="main3" style="margin-bottom: 10px; ">
                  <p><?php echo get_post_meta($post->ID, 'person_jd', 1); ?> </p>
                </div>
               </div>
              </div>
          </a>

        </div>
      </div>
    </div>

    <?php
  }
}
else {
}
?>
<?php wp_reset_postdata(); ?>

</section>
<!-- <button type="button" class="btn btn-grey">
ПОСМОТРЕТЬ ВСЕХ ВЫПУСКНИКОВ

</button>
-->    </div>
<!-- END OF BLOCK WITH SCHOOL ALUMNIS -->

  <?php endwhile; ?>
  <?php endif; ?>


<?php get_footer(); ?>
