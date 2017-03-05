<?php

add_theme_support('post-thumbnails' );








// Code for Open University

function my_custom_post_open_university() {
  $labels = array(
    'name'               => _x( 'Школы', 'post type general name' ),
    'singular_name'      => _x( 'Школа', 'post type singular name' ),
    'add_new'            => _x( 'Добавить новую школу', 'book' ),
    'add_new_item'       => __( 'Новая школа' ),
    'edit_item'          => __( 'Редактировать школу' ),
    'new_item'           => __( 'Новая школа' ),
    'all_items'          => __( 'Все школы' ),
    'view_item'          => __( 'Просмотреть школу' ),
    'search_items'       => __( 'Искать школу' ),
    'not_found'          => __( 'Школы не найдены' ),
    'not_found_in_trash' => __( 'Школы в корзине не найдены' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Открытый университет'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Тип записи для отображения информации про Школы Открытого Университета',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
     'menu_icon' => 'dashicons-welcome-learn-more',
  );
  register_post_type( 'open-university', $args ); 
}
add_action( 'init', 'my_custom_post_open_university' );

function my_updated_messages_open_university( $messages ) {
  global $post, $post_ID;
  $messages['partners'] = array(
    0 => '', 
    1 => sprintf( __('Школа обновлена. <a href="%s">Просмотреть школу</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Поле добавлено.'),
    3 => __('Поле удалено.'),
    4 => __('Школа обновлена.'),
    5 => isset($_GET['revision']) ? sprintf( __('Школа восстановлена %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Школа опубликована. <a href="%s">Просмотреть школу</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Школа сохранена.'),
    8 => sprintf( __('Предпросмотр школы <a target="_blank" href="%s">Preview school</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Публикация школы запланирована: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр школы</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Черновик школы сохранен. <a target="_blank" href="%s">Предпросмотр школы</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages_open_university' );



// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields_open_university', 1);

function my_extra_fields_open_university() {
	add_meta_box( 'extra_fields', 'Додаткові поля', 'extra_fields_box_func_open_university', 'open-university', 'normal', 'high'  );
}

// код блока
function extra_fields_box_func_open_university( $post ){
?>

<table width="100%" border="1" cellspacing="0" bordercolor="ececec" cellpadding="7">
<tr colspan="2"><b>Заголовок страницы</b></tr>
<tr><label>
	<td>
	Название школы (англ.):
	</td>
	<td>
		 <input type="text" name="extra[ou_eng_title]" value="<?php echo get_post_meta($post->ID, 'ou_eng_title', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Название школы (рус.):
	</td>
	<td>
		 <input type="text" name="extra[ou_ru_title]" value="<?php echo get_post_meta($post->ID, 'ou_ru_title', 1); ?>" style="width:100%" />
	</td></label>
</tr>


	<tr ><td  colspan="2"><b>Блок курсов школы:</b></td></tr>
<tr><label>
	<td>
	Заголовок блока курсов (англ.):
	</td>
	<td>
		 <input type="text" name="extra[ou_eng_courses]" value="<?php echo get_post_meta($post->ID, 'ou_eng_courses', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Заголовок блока курсов (рус.):
	</td>
	<td>
		 <input type="text" name="extra[ou_ru_courses]" value="<?php echo get_post_meta($post->ID, 'ou_ru_courses', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Ccылка на категорию курсов Школы:
	</td>
	<td>
		 <input type="text" name="extra[ou_courses_slug]" value="<?php echo get_post_meta($post->ID, 'ou_courses_slug', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Видимость блока Курсов:
	</td>
	<td>
		<select name="extra[ou_courses_visibility]" >
			<?php $sel_v = get_post_meta($post->ID, 'ou_courses_visibility', 1); ?>
					<option value="block" <?php selected( $sel_v, 'block' )?> >Показать</option>
			
			<option value="none" <?php selected( $sel_v, 'none' )?> >Скрыть</option>
			
		</select>
	</td></label>
</tr>




<tr><td  colspan="2"><b>Блок Открытого лектория школы:</b></td></tr>
<tr><label>
	<td>
	Заголовок блока Открытого Лектория (англ.):
	</td>
	<td>
		 <input type="text" name="extra[ou_eng_talks]" value="<?php echo get_post_meta($post->ID, 'ou_eng_talks', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Заголовок блока Открытого Лектория (рус.):
	</td>
	<td>
		 <input type="text" name="extra[ou_ru_talks]" value="<?php echo get_post_meta($post->ID, 'ou_ru_talks', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Ccылка на категорию Открытого Лектория Школы:
	</td>
	<td>
		 <input type="text" name="extra[ou_talks_slug]" value="<?php echo get_post_meta($post->ID, 'ou_talks_slug', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Видимость блока Открытого Лектория:
	</td>
	<td>
		<select name="extra[ou_talks_visibility]" >
			<?php $sel_v = get_post_meta($post->ID, 'ou_talks_visibility', 1); ?>
					<option value="block" <?php selected( $sel_v, 'block' )?> >Показать</option>
			
			<option value="none" <?php selected( $sel_v, 'none' )?> >Скрыть</option>
			
		</select>
	</td></label>
</tr>





<tr><td  colspan="2"><b>Блок Специальных проектов школы:</b></td></tr>
<tr><label>
	<td>
	Заголовок блока Специальных проектов (англ.):
	</td>
	<td>
		 <input type="text" name="extra[ou_eng_spec_projects]" value="<?php echo get_post_meta($post->ID, 'ou_eng_spec_projects', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Заголовок блока Специальных проектов (рус.):
	</td>
	<td>
		 <input type="text" name="extra[ou_ru_spec_projects]" value="<?php echo get_post_meta($post->ID, 'ou_ru_spec_projects', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Ccылка на категорию Специальных Проектов школы:
	</td>
	<td>
		 <input type="text" name="extra[ou_spec_projects_slug]" value="<?php echo get_post_meta($post->ID, 'ou_spec_projects_slug', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Видимость блока Специальных проектов:
	</td>
	<td>
		<select name="extra[ou_spec_projects_visibility]" >
			<?php $sel_v = get_post_meta($post->ID, 'ou_spec_projects_visibility', 1); ?>
					<option value="block" <?php selected( $sel_v, 'block' )?> >Показать</option>
			
			<option value="none" <?php selected( $sel_v, 'none' )?> >Скрыть</option>
			
		</select>
	</td></label>
</tr>




<tr><td  colspan="2"><b>Блок Тьюторов школы:</b></td></tr>
<tr><label>
	<td>
	Заголовок блока Тьюторов (англ.):
	</td>
	<td>
		 <input type="text" name="extra[ou_eng_tutors]" value="<?php echo get_post_meta($post->ID, 'ou_eng_tutors', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Заголовок блока Тьюторов (рус.):
	</td>
	<td>
		 <input type="text" name="extra[ou_ru_tutors]" value="<?php echo get_post_meta($post->ID, 'ou_ru_tutors', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Ccылка на категорию Тьюторов школы:
	</td>
	<td>
		 <input type="text" name="extra[ou_tutors_slug]" value="<?php echo get_post_meta($post->ID, 'ou_tutors_slug', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Видимость блока Тьюторов:
	</td>
	<td>
		<select name="extra[ou_tutors_visibility]" >
			<?php $sel_v = get_post_meta($post->ID, 'ou_tutors_visibility', 1); ?>
					<option value="block" <?php selected( $sel_v, 'block' )?> >Показать</option>
			
			<option value="none" <?php selected( $sel_v, 'none' )?> >Скрыть</option>
			
		</select>
	</td></label>
</tr>





<tr><td  colspan="2"><b>Блок Выпускников школы:</b></td></tr>
<tr><label>
	<td>
	Заголовок блока Выпускников (англ.):
	</td>
	<td>
		 <input type="text" name="extra[ou_eng_alumni]" value="<?php echo get_post_meta($post->ID, 'ou_eng_alumni', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Заголовок блока Выпускников (рус.):
	</td>
	<td>
		 <input type="text" name="extra[ou_ru_alumni]" value="<?php echo get_post_meta($post->ID, 'ou_ru_alumni', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Ccылка на категорию Выпускников школы:
	</td>
	<td>
		 <input type="text" name="extra[ou_alumni_slug]" value="<?php echo get_post_meta($post->ID, 'ou_alumni_slug', 1); ?>" style="width:100%" />
	</td></label>
</tr>
<tr><label>
	<td>
	Видимость блока Выпускников:
	</td>
	<td>
		<select name="extra[ou_alumni_visibility]" >
			<?php $sel_v = get_post_meta($post->ID, 'ou_alumni_visibility', 1); ?>
					<option value="block" <?php selected( $sel_v, 'block' )?> >Показать</option>
			
			<option value="none" <?php selected( $sel_v, 'none' )?> >Скрыть</option>
			
		</select>
	</td></label>
</tr>
	</table>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update_open_university', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update_open_university( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false;	

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}






// Code for Open University Talks

function my_custom_post_open_university_talks() {
  $labels = array(
    'name'               => _x( 'Cобытия Открытого Лектория', 'post type general name' ),
    'singular_name'      => _x( 'Событие Открытого Лектория', 'post type singular name' ),
    'add_new'            => _x( 'Добавить новое событие', 'book' ),
    'add_new_item'       => __( 'Новое событие Открытого Лектория' ),
    'edit_item'          => __( 'Редактировать событие' ),
    'new_item'           => __( 'Новое событие' ),
    'all_items'          => __( 'Все события Открытого Лектория' ),
    'view_item'          => __( 'Просмотреть событие Открытого Лектория' ),
    'search_items'       => __( 'Искать событие' ),
    'not_found'          => __( 'События не найдены' ),
    'not_found_in_trash' => __( 'События в корзине не найдены' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Открытый Лекторий'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Тип записи для отображения информации про cобытия Открытого Лектория',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
     'menu_icon' => 'dashicons-calendar-alt',
  );
  register_post_type( 'open-talks', $args ); 
}
add_action( 'init', 'my_custom_post_open_university_talks' );

function my_updated_messages_open_university_talks( $messages ) {
  global $post, $post_ID;
  $messages['open-university-talks'] = array(
    0 => '', 
    1 => sprintf( __('Событие обновлено. <a href="%s">Просмотреть событие</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Поле добавлено.'),
    3 => __('Поле удалено.'),
    4 => __('Событие обновлено.'),
    5 => isset($_GET['revision']) ? sprintf( __('Событие восстановлено %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Событие опубликовано. <a href="%s">Просмотреть событие</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Событие сохранено.'),
    8 => sprintf( __('Предпросмотр события <a target="_blank" href="%s">Preview event</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Публикация события запланирована: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр события</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Черновик события сохранен. <a target="_blank" href="%s">Предпросмотр события</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages_open_university_talks' );



function my_taxonomies_events_talks() {
  $labels = array(
    'name'              => _x( 'Тип событий', 'taxonomy general name' ),
    'singular_name'     => _x( 'Тип события', 'taxonomy singular name' ),
    'search_items'      => __( 'Искать тип события' ),
    'all_items'         => __( 'Все события' ),
    'parent_item'       => __( 'Родительская категория событий' ),
    'parent_item_colon' => __( 'Родительская категория события:' ),
    'edit_item'         => __( 'Редактировать категорию события' ), 
    'update_item'       => __( 'Обновить категорию события' ),
    'add_new_item'      => __( 'Добавить новую категорию события' ),
    'new_item_name'     => __( 'Новая категория события' ),
    'menu_name'         => __( 'Тип событий' ),
  );
  $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      
        'rewrite' => true

       
    );
  register_taxonomy( 'item_category', array('open-talks'), $args );
}
add_action( 'init', 'my_taxonomies_events_talks', 0 );

// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields_open_university_talks', 1);

function my_extra_fields_open_university_talks() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func_open_university_talks', 'open-talks', 'normal', 'high'  );
}

// код блока
function extra_fields_box_func_open_university_talks( $post ){
?>

<table width="100%" border="1" cellspacing="0" bordercolor="ececec" cellpadding="7">

<tr><label>
	<td>
	Название события:
	</td>
	<td>
		 <input type="text" name="extra[ol_title]" value="<?php echo get_post_meta($post->ID, 'ol_title', 1); ?>" style="width:100%" />
	</td></label>
</tr>



<tr><label>
	<td>
	Стоимость события:
	</td>
	<td>
		 <input type="text" name="extra[ol_price]" value="<?php echo get_post_meta($post->ID, 'ol_price', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Дата и время события:
	</td>
	<td>
		 <input type="text" name="extra[ol_description]" value="<?php echo get_post_meta($post->ID, 'ol_description', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Ссылка на событие:
	</td>
	<td>
		 <input type="text" name="extra[ol_url]" value="<?php echo get_post_meta($post->ID, 'ol_url', 1); ?>" style="width:100%" />
	</td></label>
</tr>


	</table>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update_open_university_talks', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update_open_university_talks( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false;	

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}









// Code for Team

function my_custom_post_team() {
  $labels = array(
    'name'               => _x( 'Персоны команды', 'post type general name' ),
    'singular_name'      => _x( 'Персона команды', 'post type singular name' ),
    'add_new'            => _x( 'Добавить новую персону', 'book' ),
    'add_new_item'       => __( 'Новая персона' ),
    'edit_item'          => __( 'Редактировать персону' ),
    'new_item'           => __( 'Новая персона' ),
    'all_items'          => __( 'Все персоны' ),
    'view_item'          => __( 'Просмотреть персону' ),
    'search_items'       => __( 'Искать персону' ),
    'not_found'          => __( 'Персоны не найдены' ),
    'not_found_in_trash' => __( 'Персоны в корзине не найдены' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Команда'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Тип записи для отображения информации о персонах команды',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
     'menu_icon' => 'dashicons-id-alt',
  );
  register_post_type( 'team', $args ); 
}
add_action( 'init', 'my_custom_post_team' );

function my_updated_messages_team( $messages ) {
  global $post, $post_ID;
  $messages['team'] = array(
    0 => '', 
    1 => sprintf( __('Персона обновлена. <a href="%s">Просмотреть персону</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Поле добавлено.'),
    3 => __('Поле удалено.'),
    4 => __('Персона обновлена.'),
    5 => isset($_GET['revision']) ? sprintf( __('Персона восстановлена %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Персона опубликована. <a href="%s">Просмотреть персону</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Персона сохранена.'),
    8 => sprintf( __('Предпросмотр персоны <a target="_blank" href="%s">Preview person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Публикация персоны запланирована: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр персоны</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Черновик персоны сохранен. <a target="_blank" href="%s">Предпросмотр персоны</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages_team' );



// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields_team', 1);

function my_extra_fields_team() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func_team', 'team', 'normal', 'high'  );
}

// код блока
function extra_fields_box_func_team( $post ){
?>

<table width="100%" border="1" cellspacing="0" bordercolor="ececec" cellpadding="7">

<tr><label>
	<td>
	Имя и Фамилия (.рус):
	</td>
	<td>
		 <input type="text" name="extra[person_rus_name]" value="<?php echo get_post_meta($post->ID, 'person_rus_name', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Имя  и Фамилия (англ.):
	</td>
	<td>
		 <input type="text" name="extra[person_eng_name]" value="<?php echo get_post_meta($post->ID, 'person_eng_name', 1); ?>" style="width:100%" />
	</td></label>
</tr>



<tr><label>
	<td>
	Должности персоны:
	</td>
	<td>
	<textarea type="text" name="extra[person_jd]" value="<?php echo get_post_meta($post->ID, 'person_jd', 1); ?>" style="width:50%" /><?php echo get_post_meta($post->ID, 'person_jd', 1); ?></textarea>
	</td></label>
</tr>

<tr><label>
	<td>
	Отзыв:
	</td>
	<td>
		<textarea type="text" name="extra[person_feedback]" value="<?php echo get_post_meta($post->ID, 'person_feedback', 1); ?>" style="width:50%" /><?php echo get_post_meta($post->ID, 'person_feedback', 1); ?></textarea>
	</td></label>
</tr>

<tr><label>
	<td>
	Ссылка на личную страницу персоны:
	</td>
	<td>
		 <input type="text" name="extra[person_soc_url]" value="<?php echo get_post_meta($post->ID, 'person_soc_url', 1); ?>" style="width:100%" />
	</td></label>
</tr>

	</table>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update_team', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update_team( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false;	

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}




// Code for Course

function my_custom_post_course() {
  $labels = array(
    'name'               => _x( 'Курсы', 'post type general name' ),
    'singular_name'      => _x( 'Курс', 'post type singular name' ),
    'add_new'            => _x( 'Добавить новый курс', 'book' ),
    'add_new_item'       => __( 'Новый курс' ),
    'edit_item'          => __( 'Редактировать курс' ),
    'new_item'           => __( 'Новый курс' ),
    'all_items'          => __( 'Все курсы' ),
    'view_item'          => __( 'Просмотреть курс' ),
    'search_items'       => __( 'Искать курс' ),
    'not_found'          => __( 'Курсы не найдены' ),
    'not_found_in_trash' => __( 'В корзине курсы не найдены' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Курсы'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Тип запису для отображения информации о курсах Открытого Университета',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
     'menu_icon' => 'dashicons-groups',
  );
  register_post_type( 'course', $args ); 
}
add_action( 'init', 'my_custom_post_course' );

function my_updated_messages_course( $messages ) {
  global $post, $post_ID;
  $messages['course'] = array(
    0 => '', 
    1 => sprintf( __('Курс обновлен. <a href="%s">Просмотреть курс</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Поле добавлено.'),
    3 => __('Поле удалено.'),
    4 => __('Курс обновлен.'),
    5 => isset($_GET['revision']) ? sprintf( __('Курс восстановлен от %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Курс опубликован. <a href="%s">View course</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Курс сохранен.'),
    8 => sprintf( __('Предпросмотр курса <a target="_blank" href="%s">Preview course</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Публикация курса запланирована: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр курса</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Черновик курса сохранен. <a target="_blank" href="%s">Предпросмотр курса</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages_course' );



function my_taxonomies_schools() {
  $labels = array(
    'name'              => _x( 'Школы', 'taxonomy general name' ),
    'singular_name'     => _x( 'Школа', 'taxonomy singular name' ),
    'search_items'      => __( 'Искать школу' ),
    'all_items'         => __( 'Все школы' ),
    'parent_item'       => __( 'Родительская категория школы' ),
    'parent_item_colon' => __( 'Родительская категория школы:' ),
    'edit_item'         => __( 'Редактировать категорию школы' ), 
    'update_item'       => __( 'Обновить категорию школы' ),
    'add_new_item'      => __( 'Добавить новую категорию школы' ),
    'new_item_name'     => __( 'Новая категория школы' ),
    'menu_name'         => __( 'Школы' ),
  );
  $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      
        'rewrite' => true

       
    );
  register_taxonomy( 'school_category', array('course'), $args );
}
add_action( 'init', 'my_taxonomies_schools', 0 );

// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields_course', 1);

function my_extra_fields_course() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func_course', 'course', 'normal', 'high'  );
}

// код блока
function extra_fields_box_func_course( $post ){
?>

<table width="100%" border="1" cellspacing="0" bordercolor="ececec" cellpadding="7">

<tr><label>
	<td>
	Заголовок курса:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_sign', 1);
$settings = array('textarea_name'=>'extra[course_sign]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_sign', $settings);?> 
	</td></label>
</tr>

<tr><label>
	<td>
	Поток 1:
	</td>
	<td>
		 <input type="text" name="extra[flow_1]" value="<?php echo get_post_meta($post->ID, 'flow_1', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Поток 2:
	</td>
	<td>
		 <input type="text" name="extra[flow_2]" value="<?php echo get_post_meta($post->ID, 'flow_2', 1); ?>" style="width:100%" />
	</td></label>
</tr>


<tr><label>
	<td>
	Поток 3:
	</td>
	<td>
		 <input type="text" name="extra[flow_3]" value="<?php echo get_post_meta($post->ID, 'flow_3', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Подзаголовок курса:
	</td>
	<td>
		 <input type="text" name="extra[course_subsign]" value="<?php echo get_post_meta($post->ID, 'course_subsign', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Описание курса:
	</td>
	<td>
		<textarea type="text" name="extra[course_describe]" value="<?php echo get_post_meta($post->ID, 'course_describe', 1); ?>" style="width:50%" /><?php echo get_post_meta($post->ID, 'course_describe', 1); ?></textarea>
	</td></label>
</tr>



<tr><label>
	<td>
	Курс необходим:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_necessary', 1);
$settings = array('textarea_name'=>'extra[course_necessary]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_necessary', $settings);?> 
	</td></label>
</tr>


<tr><label>
	<td>
	Преимущества:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_achievments', 1);
$settings = array('textarea_name'=>'extra[course_achievments]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_achievments', $settings);?> 
	</td></label>
</tr>


<tr><label>
	<td>
	Начало курса:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_beggin', 1);
$settings = array('textarea_name'=>'extra[course_beggin]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_beggin', $settings);?> 
	</td></label>
</tr>


<tr><label>
	<td>
	Продолжительность курса:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_term', 1);
$settings = array('textarea_name'=>'extra[course_term]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_term', $settings);?> 
	</td></label>
</tr>


<tr><label>
	<td>
	Интенсивность курса:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_intensivity', 1);
$settings = array('textarea_name'=>'extra[course_intensivity]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_intensivity', $settings);?> 
	</td></label>
</tr>

<tr><label>
	<td>
	Cсылка на бриф курса:
	</td>
	<td>
		 <input type="text" name="extra[course_brief_link]" value="<?php echo get_post_meta($post->ID, 'course_brief_link', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Cсылка на категорию тьюторов курса:
	</td>
	<td>
		 <input type="text" name="extra[course_tutors_cpt]" value="<?php echo get_post_meta($post->ID, 'course_tutors_cpt', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Основной состав тьюторов курса:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_main_tutors', 1);
$settings = array('textarea_name'=>'extra[course_main_tutors]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_main_tutors', $settings);?> 
	</td></label>
</tr>

<tr><label>
	<td>
	Приглашенный состав тьюторов курса:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_invited_tutors', 1);
$settings = array('textarea_name'=>'extra[course_invited_tutors]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_invited_tutors', $settings);?> 
	</td></label>
</tr>



<tr><label>
	<td>
	Cсылка на категорию программы курса:
	</td>
	<td>
		 <input type="text" name="extra[course_programm_cpt]" value="<?php echo get_post_meta($post->ID, 'course_programm_cpt', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Месячная стоимость курса:
	</td>
	<td>
		 <input type="text" name="extra[course_part_price]" value="<?php echo get_post_meta($post->ID, 'course_part_price', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Единоразовая стоимость курса:
	</td>
	<td>
		 <input type="text" name="extra[course_full_price]" value="<?php echo get_post_meta($post->ID, 'course_full_price', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Заголовок блока стоимости 1:
	</td>
	<td>
		 <input type="text" name="extra[course_price_sign_1]" value="<?php echo get_post_meta($post->ID, 'course_price_sign_1', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Текст блока стоимости 1:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_price_text_1', 1);
$settings = array('textarea_name'=>'extra[course_price_text_1]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_price_text_1', $settings);?> 
	</td></label>
</tr>


<tr><label>
	<td>
	Заголовок блока стоимости 2:
	</td>
	<td>
		 <input type="text" name="extra[course_price_sign_2]" value="<?php echo get_post_meta($post->ID, 'course_price_sign_2', 1); ?>" style="width:100%" />
	</td></label>
</tr>

<tr><label>
	<td>
	Текст блока стоимости 2:
	</td>
	<td>
<?php 
$content = get_post_meta($post->ID, 'course_price_text_2', 1);
$settings = array('textarea_name'=>'extra[course_price_text_2]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_price_text_2', $settings);?> 
	</td></label>
</tr>


	</table>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update_course', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update_course( $post_id ){
	if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
	if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

	if( !isset($_POST['extra']) ) return false;	

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) ){
			delete_post_meta($post_id, $key); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
	}
	return $post_id;
}







// Code for Furniture

function my_custom_post_course_programm() {
  $labels = array(
    'name'               => _x( 'Программа курсов', 'post type general name' ),
    'singular_name'      => _x( 'Программа курса', 'post type singular name' ),
    'add_new'            => _x( 'Добавить новую тему лекции', 'book' ),
    'add_new_item'       => __( 'Новая тема лекции' ),
    'edit_item'          => __( 'Редактировать тему лекции' ),
    'new_item'           => __( 'Новая тема лекции' ),
    'all_items'          => __( 'Все темы лекции' ),
    'view_item'          => __( 'Просмотреть темы лекции' ),
    'search_items'       => __( 'Искать темы лекции' ),
    'not_found'          => __( 'Темы лекции не найдены' ),
    'not_found_in_trash' => __( 'В корзине тема лекции не найдена' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Программы курсов'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'В данном типе записи хранятся темый лекций для курсов',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'thumbnail'),
    'has_archive'   => true,
     'menu_icon' => 'dashicons-hammer',
  );
  register_post_type( 'course_programm', $args ); 
}
add_action( 'init', 'my_custom_post_course_programm' );

function my_updated_messages_course_programm( $messages ) {
  global $post, $post_ID;
  $messages['course_programm'] = array(
    0 => '', 
    1 => sprintf( __('Тема лекции обновлена. <a href="%s">Просмотреть тему лекции</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Поле добавлено.'),
    3 => __('Поле удалено.'),
    4 => __('Тема лекции обновлена.'),
    5 => isset($_GET['revision']) ? sprintf( __('Тема лекции восстановлена от %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Тема лекции опубликована. <a href="%s">View issue</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Тема лекции сохранена.'),
    8 => sprintf( __('Предпросмотр темы лекции <a target="_blank" href="%s">Preview issue</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Публикация темы лекции запланирована: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Предпросмотр темы лекции</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Черновик темы лекции сохранен. <a target="_blank" href="%s">Предпросмотр темы лекции</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages_course_programm' );




function my_taxonomies_course_programm() {
  $labels = array(
    'name'              => _x( 'Курсы', 'taxonomy general name' ),
    'singular_name'     => _x( 'Курс', 'taxonomy singular name' ),
    'search_items'      => __( 'Искать курс' ),
    'all_items'         => __( 'Все курсы' ),
    'parent_item'       => __( 'Родительская категория курса' ),
    'parent_item_colon' => __( 'Родительская категория курса:' ),
    'edit_item'         => __( 'Редактировать категорию курса' ), 
    'update_item'       => __( 'Обновить категорию курса' ),
    'add_new_item'      => __( 'Добавить новую категорию курса' ),
    'new_item_name'     => __( 'Новая категория курса' ),
    'menu_name'         => __( 'Категории курса' ),
  );
  $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
      
        'rewrite' => true

       
    );
  register_taxonomy( 'course_programm_category', array('course_programm'), $args );
}
add_action( 'init', 'my_taxonomies_course_programm', 0 );



// подключаем функцию активации мета блока (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields_course_programm', 1);

function my_extra_fields_course_programm() {
  add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func_course_programm', 'course_programm', 'normal', 'high'  );
}

// код блока
function extra_fields_box_func_course_programm( $post ){
?>

<table width="100%" border="1" cellspacing="0" bordercolor="ececec" cellpadding="7">

<tr><label>
  <td>
  Наименование темы:
  </td>
  <td>
    <input type="text" name="extra[course_programm_issue]" value="<?php echo get_post_meta($post->ID, 'course_programm_issue', 1); ?>" style="width:50%" />
  </td></label>
</tr>
<tr><label>
  <td>
    Содержание темы:
  </td>
  <td>
   <?php 
$content = get_post_meta($post->ID, 'course_programm_text', 1);
$settings = array('textarea_name'=>'extra[course_programm_text]','textarea_rows'=>10, 'wpautop'=>true, 'tinymce'=>true);
 wp_editor( $content, 'course_programm_text', $settings);?> 
  </td></label>
</tr>



  </table>
  <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_extra_fields_update_course_programm', 0);

/* Сохраняем данные, при сохранении поста */
function my_extra_fields_update_course_programm( $post_id ){
  if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
  if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

  if( !isset($_POST['extra']) ) return false; 

  // Все ОК! Теперь, нужно сохранить/удалить данные
  $_POST['extra'] = array_map('trim', $_POST['extra']);
  foreach( $_POST['extra'] as $key=>$value ){
    if( empty($value) ){
      delete_post_meta($post_id, $key); // удаляем поле если значение пустое
      continue;
    }

    update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
  }
  return $post_id;
}





add_action('after_switch_theme', 'my_rewrite_flush' );
  function my_rewrite_flush() {
    flush_rewrite_rules();
  }


?>