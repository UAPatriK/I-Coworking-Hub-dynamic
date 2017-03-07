<?php get_header(); ?>

  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

<!-- BLOCK WITH COURSE HEADER -->
      <div class="site-wrapper">
        <div class="site-wrapper-inner" style="vertical-align: top;">
          <div class="cover-container">
          <?php the_post_thumbnail('','class=img-responsive img-cover'); ?>
           <div class="col-col-lg-11" style="padding-left:45px;" >  
            <h1 class="course_sign"><br>
              <?php echo get_post_meta($post->ID, 'course_sign', 1); ?></h1>
           </div>

            <div class="col-lg-12" style="padding-left:45px;">
               <?php $sel_v = get_post_meta($post->ID, 'course_subsign', $single = true); ?>
               <?php if($sel_v !== '') { ?>
               <p class="course_subsign"><?php echo get_post_meta($post->ID, 'course_subsign', 1); ?></p>
               <?php }
               else { ?> 
               <?php } ?>
             </div>

           </div>
         </div>
       </div>
<!-- END OF BLOCK WITH COURSE HEADER -->

<!-- BLOCK WITH COURSE DESCRIPTION -->
<div class="col-xs-12 block_borders slide-styles" style="border-bottom: 0px;">

  <div class="col-lg-8">
    <p class="course_text"><?php echo get_post_meta($post->ID, 'course_describe', 1); ?></p>
<!-- <p style="margin-top: 30px;">
<a href="#" class="feedback_link">Другие этапы обучения</a>
</p> -->
  </div>

  <div class="col-lg-12" style="margin-top: 100px;">
    <div class="row">
      <div class="col-lg-4 course_info">
        <h1  class="">Курс необходим:</h1>
        <?php echo get_post_meta($post->ID, 'course_necessary', 1); ?>
      </div>

      <div class="col-lg-4 course_info">
        <h1  class="">Преимущества:</h1>
        <?php echo get_post_meta($post->ID, 'course_achievments', 1); ?>
      </div>
  
      <div class="col-lg-4 course_info">
        <h1  class="">Начало занятий:</h1>
        <p><?php echo get_post_meta($post->ID, 'course_beggin', 1); ?></p>
    
        <h1  class="">Продолжительность:</h1>
        <p><?php echo get_post_meta($post->ID, 'course_term', 1); ?></p>
    
        <h1  class="">Интенсивность:</h1>
        <p><?php echo get_post_meta($post->ID, 'course_intensivity', 1); ?></p>
      </div>
    </div>
  
</div>
  </div>
<button type="button" class="btn btn-red">
  УЧИТЬСЯ
</button>
<!-- END OF BLOCK WITH COURSE DESCRIPTION -->


<!-- BLOCK WITH COURSE TUTORS|MENTORS -->
<div class="col-xs-12 block_borders slide-styles" style="border-bottom: 0px;">

   <section class="main">
    <div class="col-sm-6 col-md-4 col-xs-12 text_block" >
      <h1>Тьюторы, менторы.<br>
        Tutors, mentors.</h1>
      </div>

      <?php
      $term = get_post_meta($post->ID, 'course_tutors_cpt', 1);
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

              <a href="<?php echo get_post_meta($post->ID, 'person_soc_url', 1); ?>">                   
                <div class="thumbnail_item">
                  <?php the_post_thumbnail('','class=img-responsive'); ?>
                </div>

                <div class="col-lg-10" style="margin-left: 10px;">
                  <article>
                    <h1 style="margin-bottom: 0px;"><?php echo get_post_meta($post->ID, 'person_rus_name', 1); ?> </h1>
                    <h1 style="margin-top: 0px;"><?php echo get_post_meta($post->ID, 'person_eng_name', 1); ?> </h1>
                  </article>
                  <div class="main2">
                    <div id="main3" style="margin-bottom: 10px;">
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
<!-- END OF BLOCK WITH COURSE TUTORS|MENTORS -->

<!-- BLOCK WITH COURSE TUTORS|MENTORS 2 -->
<div class="col-xs-12 block_borders text_block slide-styles" style="border-bottom: 0px;">

  <div class="col-lg-11 tutors_block"  >
    <h1 style="margin-bottom: 10px;">Основной состав тьюторов бизнес курсов:</h1>
    <?php echo get_post_meta($post->ID, 'course_main_tutors', 1); ?>
  </div>

  <div class="col-lg-11 tutors_block"  >
    <h1 style="margin-bottom: 10px;">Приглашенные спикеры бизнес курсов:</h1>
    <?php echo get_post_meta($post->ID, 'course_invited_tutors', 1); ?>
  </div>

</div>
<button type="button" style="margin-top: 0px;" class=" btn btn-red" >
  УЧИТЬСЯ
</button>
<!-- END BLOCK WITH COURSE TUTORS|MENTORS 2 -->
         

<!--     <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner  " style="margin-top: 100px;  ">
     
        <div class="col-lg-4 text_block"  >

<h1>Выпускники говорят. <br>Alumni talks</h1>


          </div>

       <div class="col-lg-8 ">
               <div class="col-lg-10 col-lg-offset-1 feedback_block">
<div class="row" style="padding-bottom: 100px !important;">
<div class="col-lg-4"><img src="images/feedback_photo.png" class="img-responsive" alt=""></div>
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
        </div>
      </div>
    </div> -->


<style>
a.accordion-toggle, a.accordion-toggle:hover  {
  text-decoration: none;
}
</style>
<!-- BLOCK WITH COURSE PROGRAMM -->
<div class="col-xs-12 block_borders text_block slide-styles" style="border-bottom: 0px; margin-bottom: 40px;">

  <div class="col-sm-6 col-md-4 col-xs-12 text_block"  >
    <h1>Программа курса.<br>
      Course programm
    </h1> 
  </div>

  <div class="col-sm-8 " style=" margin-bottom: 100px;">
   <div class="col-xs-12 col-lg-11 col-lg-offset-right-1 feedback_block">

    <div class="panel-group" id="accordion">
      <?php
      $term = get_post_meta($post->ID, 'course_programm_cpt', 1);
      $course_programm_category = new WP_Query( $args );
      $course_programm_category = new WP_Query( array(
       'post_type' => 'course_programm',
       'paged'=>  $paged,
       'order' => ASC,
       'posts_per_page' => -1,
       'tax_query' => array(
        array(
          'taxonomy' => 'course_programm_category',
          'field'    => 'slug',
          'terms'    => $term,
          ),
        ),
       ) );
      if( $course_programm_category->have_posts() ) {
        while( $course_programm_category->have_posts() ) {
          $course_programm_category->the_post();
          ?>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo get_the_ID(); ?>">
                  <span style="display: inline-block; width: 93% "><?php echo get_post_meta($post->ID, 'course_programm_issue', 1); ?></span>
                  <span style="display: inline-block; float:right;"><i class="indicator fa  fa-plus pull-right"></i></span></a>
                </h4>
              </div>
              <div id="<?php echo get_the_ID(); ?>" class="panel-collapse collapse ">
                <div class="panel-body">
                  <?php echo get_post_meta($post->ID, 'course_programm_text', 1); ?>
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
<!-- END OF BLOCK WITH COURSE PROGRAMM -->


<!-- BLOCK WITH COURSE PRICES -->
<div class="col-xs-12 block_borders text_block slide-styles" style="border-bottom: 0px; margin-bottom: 0px;" >

  <div class="col-sm-6 col-md-4 col-xs-12 text_block">
    <h1>Стоимость.<br>
      Pricing:<br>
      <span style="color:#F62A49"> <?php echo get_post_meta($post->ID, 'course_part_price', 1); ?></span> грн в месяц <br>
      или <span style="color:#F62A49"><?php echo get_post_meta($post->ID, 'course_full_price', 1); ?></span> грн<br>
      за весь курс
    </h1> 
  </div>

  <div class="col-lg-8 ">
   <div class="col-lg-10 col-lg-offset-1 feedback_block">
    <div class="col-lg-12 tutors_block"  >
      <h1><?php echo get_post_meta($post->ID, 'course_price_sign_1', 1); ?></h1>
      <?php echo get_post_meta($post->ID, 'course_price_text_1', 1); ?>
    </div>

    <div class="col-lg-12 tutors_block"  style="margin-top: 60px;">
      <h1><?php echo get_post_meta($post->ID, 'course_price_sign_2', 1); ?></h1>
      <?php echo get_post_meta($post->ID, 'course_price_text_2', 1); ?>
    </div>

  </div>
</div>
</div>

<button type="button" class="btn btn-red" >
  УЧИТЬСЯ
</button>
<!-- END OF BLOCK WITH COURSE PRICES -->





   <div class="col-xs-12 block_borders text_block slide-styles" style="border-bottom: 0px; margin-bottom: 0px;" >
    
        <div class="col-sm-6 col-md-4 col-xs-12 text_block"  >

          </div>

       <div class="col-sm-8 " style="margin-bottom: 100px; ">
               <div class="col-lg-11 col-lg-offset-right-1 feedback_block">

    <div class="col-xs-12 tutors_block"  >

<h1 style="margin-left: 0px; text-align: left;">План действий:</h1>
<ul>
<li>1. Регистрируетесь (нажав кнопку на этой странице)</li>
<li>2. Совершаете оплату</li>
<li>3. Приступаете к занятиям</li>
<li>4. Защищаете квалификацию</li>
<li>5. Переходите на следующий этап обучения сразу или через некоторое время работы с проектами и
применения полученных знаний</li>
</ul>
          </div>

    <div class="col-xs-12 tutors_block" style="margin-top: 60px;" >

<h1 style="margin-left: 0px; text-align: left;">Headhunting sponsor:</h1>
<a href="#" class="feedback_link">I business incubator</a>
<p style="font-size: 20px;">Если у вас есть вопросы до заполнения брифа или вы хотите, что бы с вами связался отдел продаж,
пожалуйста, звоните</p>
          </div>

 <div class="col-xs-12 tutors_block"  style="margin-top: 60px;">

<h1 style="margin-left: 0px; text-align: left;">Команда кураторов Открытого Университета| U Open University:</h1>
<ul>
<li>Демьян Ом| Demyan Om, куратор</li>
<li>Олеся Малеваная| Olesya Malevanaya, независимый помощник куратора</li>
<li>+38067 631 36 64</li>
<li>Яна Владимирова| Yana Vladimirova, помощник куратора</li>
<li>+38 067 565 48 61</li>
<li>Яна Вихарева| Yana Vikhareva, помощник куратора</li>
<li>Влад Власов| Vlad Vlasov, помощник куратора</li>
</ul>
          </div>

</div>
</div>


</div>


       
  <?php endwhile; ?>
  <?php endif; ?>


<?php get_footer(); ?>
