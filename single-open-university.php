<?php get_header(); ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      
   
       <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <div class="" style="">
           <img src="images/pm_course_page.png" class="img-responsive" alt="">
          </div>

      <div class="col-col-lg-11" style="padding-left:15px; margin-top:50px">  
      <h1 class="course_sign"><?php echo get_post_meta($post->ID, 'ou_ru_title', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_title', 1); ?></h1></div>



        </div>

      </div>

    </div>


    <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner" style="display:<?php echo get_post_meta($post->ID, 'ou_courses_visibility', 1); ?>">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner cover " style="margin-top: 100px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1><?php echo get_post_meta($post->ID, 'ou_ru_courses', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_courses', 1); ?></h1>


          </div>




<?php
$term = get_post_meta($post->ID, 'ou_courses_slug', 1);
 
      //      $args = array(
      // 'post_type' => 'course_programm',
      // 'paged'=>  $paged,
      // 'order' => ASC,
      //  'posts_per_page' => -1,
      // 'tax_query' => array(
      //         'taxonomy' => 'course_programm_category',
      //       'field' => 'slug',
      //       'terms' => 'program-pm-online-course',
      //              ),
      //                  );

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

                <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">

<a href="<?php the_permalink(); ?>">                   <div class="thumbnail_item">
<img src="<?php bloginfo('template_url'); ?>/images/item_image.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1><?php echo get_post_meta($post->ID, 'course_sign', 1); ?> </h1>
<h2><?php echo get_post_meta($post->ID, 'course_part_price', 1); ?> грн в месяц</h2>
<p><?php echo get_post_meta($post->ID, 'flow_3', 1); ?></p>
<p style="margin-top: 0px !important;"><?php echo get_post_meta($post->ID, 'flow_2', 1); ?></p>
<p style="margin-top: 0px !important;"><?php echo get_post_meta($post->ID, 'flow_1', 1); ?></p>
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


     

           


          </div>



        </div>

      </div>

    </div>







    <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner"  style="display:<?php echo get_post_meta($post->ID, 'ou_talks_visibility', 1); ?>">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner cover " style="margin-top: 40px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1><?php echo get_post_meta($post->ID, 'ou_eng_talks', 1); ?> <br><?php echo get_post_meta($post->ID, 'ou_eng_talks', 1); ?></h1>

          </div>

     


  <?php

 $term = get_post_meta($post->ID, 'ou_talks_slug', 1);
      //      $args = array(
      // 'post_type' => 'course_programm',
      // 'paged'=>  $paged,
      // 'order' => ASC,
      //  'posts_per_page' => -1,
      // 'tax_query' => array(
      //         'taxonomy' => 'course_programm_category',
      //       'field' => 'slug',
      //       'terms' => 'program-pm-online-course',
      //              ),
      //                  );

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
        

   <div class="col-lg-4 course_item" style="height: 400px;">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">

<a href="<?php echo get_post_meta($post->ID, 'ol_url', 1); ?>">                   <div class="thumbnail_item">
<img src="<?php bloginfo('template_url'); ?>/images/item_image.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1><?php echo get_post_meta($post->ID, 'ol_title', 1); ?> </h1>
<h2 style=""><?php echo get_post_meta($post->ID, 'ol_price', 1); ?> </h2>
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

           


          </div>

  <!--         <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div> -->

        </div>

      </div>

    </div>




    <div class="site-wrapper block_borders " style="display:<?php echo get_post_meta($post->ID, 'ou_spec_projects_visibility', 1); ?>">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner cover " style="margin-top: 40px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Спецпроекты. <br>Special projects.</h1>

<!-- <p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="#">Подробнее</a> -->
          </div>

       <div class="col-lg-4 course_item">
               <div class="col-lg-11 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/course_d.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1>PechaKucha Night</h1>
<h2>200 грн за встречу</h2>
</div>

</div>

</div>

          </div>


          

           


          </div>

  <!--         <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div> -->

        </div>

      </div>

    </div>



<div class="site-wrapper block_borders " style="display:<?php echo get_post_meta($post->ID, 'ou_tutors_visibility', 1); ?>">
      <div class="site-wrapper-inner">
        <div class="cover-container">
     

          <div class="inner cover " style="margin-top: 200px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Тьюторы, менторы.<br>
Tutors, mentors.</h1>


          </div>

       <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/tutor_example.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1><br>
Liubov Kolbina
</h1>
<!-- <h2>4500 грн в месяц</h2> -->
<p>
  Project Manager at SoftServe |
Tutor at U Open University, I
Сoworking Hub
</p>
</div>


</div>

</div>

          </div>



          </div>
<button type="button" class="btn btn-grey">
ПОСМОТРЕТЬ ВСЕХ ТЬЮТОРОВ, МЕНТОРОВ, СПИКЕРОВ

</button>


        </div>

      </div>

    </div>



    <div class="site-wrapper block_borders " style="display:<?php echo get_post_meta($post->ID, 'ou_alumni_visibility', 1); ?>">
      <div class="site-wrapper-inner">
        <div class="cover-container">
     

          <div class="inner cover " style="margin-top: 200px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Выпускники.<br>
Alumni.</h1>


          </div>

       <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/alumni_example.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1>Elena Pred<br>
Елена Пред
</h1>
<!-- <h2>4500 грн в месяц</h2> -->
<p>
 Выпускница Design school | U Open University
</p>
</div>


</div>

</div>

          </div>



          </div>


          </div>
<button type="button" class="btn btn-grey">
ПОСМОТРЕТЬ ВСЕХ ВЫПУСКНИКОВ

</button>


    
      </div>

    </div>



  <?php endwhile; ?>
  <?php endif; ?>


<?php get_footer(); ?>
