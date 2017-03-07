<?php get_header(); ?>

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
      

          <div class="inner cover" style="">
        <div class="row"> <?php echo do_shortcode( '[metaslider id=246]' ); ?></div>
          </div>

  <!--         <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div> -->

        </div>

      </div>

    </div>




    <div class="col-xs-12 block_borders "  style="padding-top: 40px; padding-left:45px; padding-right: 45px;">
  
  

 
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Школа Дизайна. <br>Design School.</h1>

<p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="/open-university/design-school/">Подробнее</a>
          </div>


  
<?php

 
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
      'terms'    => 'design-school',
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

<a href="<?php the_permalink(); ?>">               <div class="thumbnail_item">
<img src="<?php bloginfo('template_url'); ?>/images/item_image.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1><?php echo get_post_meta($post->ID, 'course_sign', 1); ?> </h1>
<h2><?php echo get_post_meta($post->ID, 'course_part_price', 1); ?> грн в месяц</h2>
<p><?php echo get_post_meta($post->ID, 'flow_3', 1); ?></p>
<p><?php echo get_post_meta($post->ID, 'flow_2', 1); ?></p>
<p><?php echo get_post_meta($post->ID, 'flow_1', 1); ?></p>
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







    <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner cover " style="margin-top: 40px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Школа Бизнеса. <br>Курсы. <br>Business School. <br>Courses</h1>

<p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="/open-university/business-school/">Подробнее</a>
          </div>




           
  
<?php

 
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
      'terms'    => 'business-school',
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

  <!--         <div class="mastfoot">
            <div class="inner">
              <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
            </div>
          </div> -->

        </div>

      </div>

    </div>




    <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner cover " style="margin-top: 40px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Школа Бизнеса. <br>Лекции. <br>Business School. <br> Lectures</h1>

<!-- <p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="#">Подробнее</a> -->
          </div>

   <?php

 
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
      'terms'    => 'лекции-школы-бизнеса',
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



    <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner  " style="margin-top: 100px;  ">
     
        <div class="col-lg-4 text_block"  >

<h1>Выпускники говорят. <br>Alumni talks</h1>

<!-- <p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="#">Подробнее</a> -->
          </div>

       <div class="col-lg-8 ">
               <div class="col-lg-10 col-lg-offset-1 feedback_block">
<div class="row" style="padding-bottom: 100px !important;">
<div class="col-lg-4"><img src="<?php bloginfo('template_url'); ?>/images/feedback_photo.png" class="img-responsive" alt=""></div>
<div class="col-lg-8">
<h1>Юлия Истапенко<br>
Julia Istapenko
</h1>
<p style="margin-top: 15px; margin-left: 20px;">
<a href="#" class="feedback_link" >Former HRD at Группакомпаний“Ривьера”</a></p>
</div>

<div class="col-lg-12">
<p>Целью обучения было получение фундаментальных знаний для формирования в
компании нового подразделения- Проектного департамента. Целью которого, было
бы сопровождение нетипичных, разовых, уникальных проектов. Обучение было
необходимо для описания бизнес-процессов, правил, инструкций по сопровождению
проектов. А так же для обучения проектному управлению менеджеров компании.
Обучение длилось 2,5 месяца.
В результате обучения, я получила доступ не только к 16 презентациям и лекциям, но
и библиотеке книг, а так же получила возможность общаться с единомышленникамии
 коллегами в специальной группе в чате. Являясь представителем производственной
компании, не все полученные мною в ходе обучения знания я смогла сразу применить
на практике. Но эти знания были полезны, т.к. расширили мой кругозор, позволили
лучше понимать коллег из других сфер. А современем я смогла их использовать,
потому что технологии не стоят на месте и все-таки входят в жизнь компаний, не
связанных с ИТ-сферой.
Особо хочу отметить подход тьюторов. Много примеров, причем не только для ит-
компаний, живые диалоги и реальная помощь в рабочих ситуациях, отзывчивость и
заинтересованность не просто "прочитать" материал, а поделиться опытом, избавить
от ошибок и помочь стать успешными! В настоящий момент, я часто заглядываю в
свой конспект и изучаю лекции по ПМ.
Поскольку, моя сфера деятельности связана с управлением людьми и бизнес-
процессами, наибольшую пользу мне принесли лекции по пипл-менеджменту,
коммуникациям и мотивации команды. Открытием стали инструменты по части риск-
менеджмента, так как помогли сформировать пул критериев, о которых нельзя
забывать, планируя проект. Мне, как эйчару, были интересны лекции о разных
практиках управления проектами, в настоящий момент применяю SCRUM-подход в
управлениии зменениями в компании. Этот опыт однозначно был полезен и вывел
меня на новый качественный уровень. Изменения, ради которых я стала студентом
курса, полностью реализованы в рамках компании, а знания полученные в I
COWORKING HUB дали мне возможность двигаться дальше в моем
профессиональном развитии и деятельности.
<br>
<a href="#" class="feedback_link" >PM Online course</a>
</p>


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



<?php get_footer(); ?>