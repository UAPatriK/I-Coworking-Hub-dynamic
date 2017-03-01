<?php get_header(); ?>


    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">

          <div class="" style="">
        <?php the_post_thumbnail('','class=img-responsive'); ?> 
          </div>

      <div class="col-lg-8" style="padding-left:15px;">  
      <h1 class="course_sign"><br>
<?php echo get_post_meta($post->ID, 'course_sign', 1); ?></h1></div>
<div class="col-lg-12">

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

  <div class="site-wrapper">
      <div class="">
        <div class="cover-container">

       
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
<button type="button" class="btn btn-red">
  УЧИТЬСЯ

</button>
      </div>



    </div>
</div>


<div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
     

          <div class="inner cover " style="margin-top: 200px;">
     
        <div class="col-lg-4 text_block" style="height: 500px;" >

<h1>Тьюторы, менторы.<br>
Tutors, mentors.</h1>



          </div>


<?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
      'post_type' => 'partners',
      'posts_per_page' => 6,
      'paged'=>  $paged
         );
    $projects_category = new WP_Query( $args );
    if( $projects_category->have_posts() ) {
      while( $projects_category->have_posts() ) {
        $projects_category->the_post();
        ?>
        <div class="col-lg-4 course_item">
               <div class="col-lg-10 col-lg-offset-1">
<div class="row item_border">
               <div class="thumbnail_item">
<img src="images/tutor_example.png" class="img-responsive" alt=""></div>

<div class="col-lg-10" style="margin-left: 10px;">
<h1>Любовь Колбина<br>
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


            
      <?php
      }
    }
    else {

      
    }
  ?>

    

 



      


          </div>
<button type="button" class="btn btn-grey">
ПОСМОТРЕТЬ ВСЕХ ТЬЮТОРОВ, МЕНТОРОВ, СПИКЕРОВ

</button>


        </div>

      </div>

    </div>

    <div class="site-wrapper block_borders " style="position: relative;" >
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner  "  ">
     
        <div class="col-lg-11 tutors_block"  >

<h1>Основной состав тьюторов бизнес курсов:</h1>
<?php echo get_post_meta($post->ID, 'course_main_tutors', 1); ?>
          </div>

     <div class="col-lg-11 tutors_block"  >

<h1>Приглашенные спикеры бизнес курсов:</h1>

<?php echo get_post_meta($post->ID, 'course_invited_tutors', 1); ?>
          </div>


          

           


          </div>

          <div class="mastfoot">
            <div class="inner">
             <button type="button" class="btn btn-red" style="margin-top: 50px;">
  УЧИТЬСЯ
</button>
            </div>
          </div>

        </div>

      </div>

    </div>



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




    <div class="site-wrapper block_borders " >
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead ">
       
          </div>

          <div class="inner  " style="margin-top: 100px; ">
     
        <div class="col-lg-4 text_block"  >

<h1>Программа курса.<br>
Course programm
</h1> 

<!-- <p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="#">Подробнее</a> -->
          </div>

       <div class="col-lg-8 " style=" margin-bottom: 100px;">
               <div class="col-lg-10 col-lg-offset-1 feedback_block">

<div class="panel-group" id="accordion">


  
<?php
$term = get_post_meta($post->ID, 'course_programm_cpt', 1);

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
           $args = array(
      'post_type' => 'course_programm',
      'paged'=>  $paged,
      'order' => ASC,
       'posts_per_page' => -1,
      'tax_query' => array (
          array(
            'taxonomy' => 'course_programm_category',
            'field' => 'slug',
            'terms' => $term,
               ),
                           ),
                       );



    $furniture_category1 = new WP_Query( $args );
    if( $furniture_category1->have_posts() ) {
      while( $furniture_category1->have_posts() ) {
        $furniture_category1->the_post();
        ?>
        
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo get_the_ID(); ?>">
      <?php echo get_post_meta($post->ID, 'course_programm_issue', 1); ?>
        </a><i class="indicator fa  fa-plus pull-right"></i>
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
      echo __('Нажаль, у даний момент проекти відсутні.',sonce_0_01);
    }
  ?>
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




    <div class="site-wrapper block_borders " style="position: relative; padding-bottom: 200px;">
      <div class="site-wrapper-inner">
        <div class="cover-container">
        

          <div class="inner  " style="margin-top: 100px; ">
     
        <div class="col-lg-4 text_block"  >

<h1>Стоимость.<br>
Pricing:<br>
<span style="color:#F62A49">3000</span> грн в месяц <br>
или <span style="color:#F62A49">5000</span> грн<br>
за весь курс
</h1> 

<!-- <p style="width: 83%">The world needs new acting talents and geniuses.
Skillful, intensive, practical education and
specialized events — it is exactly what
I coworking hub deals with to achieve the goal.</p>

<a href="#">Подробнее</a> -->
          </div>

       <div class="col-lg-8 ">
               <div class="col-lg-10 col-lg-offset-1 feedback_block">

    <div class="col-lg-12 tutors_block"  >

<!-- <h1>Основной состав тьюторов бизнес курсов:</h1> -->
<ul>
<li>1. Для вас мы подготовили презентации и сняли 16 больших видео лекций по часу и более, которые
включают в себя и базовый материал по проектному менеджменту, и кейсы по People Management (vs
Human Resource Management).</li>
<li>2. Также команда Открытого Университета рекомендует самостоятельно трудиться по статьям и книгам,
список которых прилагаем к лекциям и презентациям.</li>
<li>3. Сопровождение куратора Школы Бизнеса— ежедневно.</li>
<li>4. Тьюторы во внутреннем чате отвечают на вопросы по материалу*</li>
<li>5. Вы защищаете квалификацию по подробному брифу и кейсам, получаете сертификат с подписями
экспертного жюри.</li>
<li>6. Выпускников, которые защитили квалификацию, рекомендуем на стажировки и представляем
директорам по персоналу и собственникам международных компаний.</li>
<li></li>
<li>* До 700 часов за 2 месяца</li>
</ul>
          </div>

           <div class="col-lg-12 tutors_block"  style="margin-top: 60px;">

<h1 style="margin-left: 0px; text-align: left;">1. Введение в профессию ПМ | Introduction to PM | Тьютор: Алексей Бычков</h1>
<ul>
<li>1. Организуйте для себя вместе с куратором менторские телемосты для работы над конкретным кейсом
или личным проектом.</li>
<li>2. В Украине — Киеве и Днепре — встречайтесь и работайте с менторами лично в наших
образовательных Хабах.</li>
<li>3. В Днепре — участвуйте в воркшопах вместе со студентами очной Школы Бизнеса.</li>
<li>4. Как выпускник, получите специальную цену на следующий этап обучения в Открытом Лектории
или одной из Школ Открытого Университета</li>
<li></li>
<li>Выберите опции и напишите куратору Школы Бизнеса.</li>
</ul>
          </div>

</div>
</div>
  

</div>

       <div class="mastfoot" style="">
            <div class="inner">
             <button type="button" class="btn btn-red" >
  УЧИТЬСЯ
</button>
            </div>
          </div>
          </div>


           


          </div>
        </div>

   





    <div class="site-wrapper block_borders ">
      <div class="site-wrapper-inner">
        <div class="cover-container">
        

          <div class="inner  " style="margin-top: 100px; ">
     
        <div class="col-lg-4 text_block"  >

          </div>

       <div class="col-lg-8 " style="margin-bottom: 100px; ">
               <div class="col-lg-10 col-lg-offset-1 feedback_block">

    <div class="col-lg-12 tutors_block"  >

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

    <div class="col-lg-12 tutors_block" style="margin-top: 60px;" >

<h1 style="margin-left: 0px; text-align: left;">Headhunting sponsor:</h1>
<a href="#" class="feedback_link">I business incubator</a>
<p style="font-size: 20px;">Если у вас есть вопросы до заполнения брифа или вы хотите, что бы с вами связался отдел продаж,
пожалуйста, звоните</p>
          </div>

 <div class="col-lg-12 tutors_block"  style="margin-top: 60px;">

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


          </div>


           


          </div>
        </div>


<?php get_footer(); ?>
