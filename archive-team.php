<?php get_header(); ?>

<!-- BLOCK WITH HEAD -->
<div class="site-wrapper">
  <div class="site-wrapper-inner"  style="vertical-align: top;">
    <div class="cover-container" >
      <img src="<?php bloginfo('template_url'); ?>/images/team_cover.jpg" class="img-cover" alt="">
      <div class="col-col-lg-11" style="padding-left:45px; margin-top:50px; ">  
        <h1 class="course_sign">Команда<br>
        Team</h1>
      </div>
    </div>
  </div>
</div>
<!-- END OF BLOCK WITH HEAD -->


<!-- BLOCK WITH TUTORS MENTORS OF DESIGN SCHOOL -->
<div class="col-xs-12 block_borders slide-styles" >
  <section class="main1">

    <div class="col-sm-6 col-md-4 col-xs-12 text_block" >
      <h1>Тьюторы, менторы <br>Школы Дизайна.<br>
        Design School Tutors, mentors.</h1>
    </div>

    <?php
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
          'terms'    => 'менторы-и-тьюторы-ux-design-essential-course',
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
              <a href="<?php echo get_post_meta($post->ID, 'person_soc_url', 1); ?>">                   
                <div class="thumbnail_item">
                  <?php the_post_thumbnail('','class=img-responsive'); ?>
                </div>

                <div class="col-lg-10" style="margin-left: 10px;">
                  <article>  
                   <h1 style="margin-bottom: 0px;"><?php echo get_post_meta($post->ID, 'person_rus_name', 1); ?> </h1>
                   <h1 style="margin-top: 0px;"><?php echo get_post_meta($post->ID, 'person_eng_name', 1); ?> </h1>
                  </article>
                  <div class="main1">
                    <div id="main2" style="margin-bottom: 10px; ">
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

</div>
<!-- 
<button type="button" class="btn btn-grey">
  ПОСМОТРЕТЬ ВСЕХ ТЬЮТОРОВ, МЕНТОРОВ, СПИКЕРОВ
</button> -->
<!-- END OF BLOCK WITH TUTORS MENTORS OF DESIGN SCHOOL -->


<!-- BLOCK WITH TUTORS MENTORS OF BUSINESS SCHOOL -->
<div class="col-xs-12 block_borders slide-styles" >
  <section class="main2">

    <div class="col-sm-6 col-md-4 col-xs-12  text_block">
      <h1>Тьюторы, менторы<br> Школы Бизнеса.<br>
        Business School <br>  Tutors, mentors.</h1>
    </div>

    <?php
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
          'terms'    => 'менторы-и-тьюторы-pm-online-course',
          ),
        ),
       ) );
      if( $course_programm_category->have_posts() ) {
        while( $course_programm_category->have_posts() ) {
          $course_programm_category->the_post();
          ?>

          <div class="col-sm-6 col-md-4 col-xs-12  course_item" >
           <div class="col-lg-11 col-lg-offset-right-1">
            <div class="row item_border">
              <a href="<?php echo get_post_meta($post->ID, 'person_soc_url', 1); ?>">                   
                <div class="thumbnail_item">
                  <?php the_post_thumbnail('','class=img-responsive'); ?>
                </div>

                <div class="col-lg-10" style="margin-left: 10px;">
                  <article>
                    <h1 style="margin-bottom: 0px;"><?php echo get_post_meta($post->ID, 'person_rus_name', 1); ?> </h1>
                    <h1 style="margin-top: 0px;"><?php echo get_post_meta($post->ID, 'person_eng_name', 1); ?> </h1>
                  </article>
                  <div class="main1">
                    <div id="main2" style="margin-bottom: 10px; ">
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


</div>
<!--   <button type="button" class="btn btn-grey">
   ПОСМОТРЕТЬ ВСЕХ ТЬЮТОРОВ, МЕНТОРОВ, СПИКЕРОВ
  </button> -->

<!-- END OF BLOCK WITH TUTORS MENTORS OF BUSINESS SCHOOL -->



<!-- 

<div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
     

          <div class="inner cover " style="margin-top: 200px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Тьюторы, менторы<br> Малого Открытого Университета.<br>
Sport School <br>  Tutors, mentors.
</h1>


          </div>

       <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/mou_tutor_example.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1>Демьян Ом<br>
Demyan Om
</h1>

<p>
 Founder, CEO at I Business Incubator; Founder, CEO at I Сoworking Hub; U Open University Principal
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


<div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
     

          <div class="inner cover " style="margin-top: 200px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Тьюторы, тренеры<br> Школы Спорта.<br>
</h1>


          </div>

       <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/mou_tutor_example.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1>Демьян Ом<br>
Demyan Om
</h1>

<p>
 Founder, CEO at I Business Incubator; Founder, CEO at I Сoworking Hub; U Open University Principal
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



<div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
     

          <div class="inner cover " style="margin-top: 200px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Кураторы Открытого Университета.
</h1>


          </div>

       <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/mou_tutor_example.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1>Демьян Ом<br>
Demyan Om
</h1>
<p>
 Founder, CEO at I Business Incubator; Founder, CEO at I Сoworking Hub; U Open University Principal
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

    <div class="site-wrapper block_borders " >
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

    </div> -->

<?php get_footer(); ?>
