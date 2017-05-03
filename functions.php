<?php
//header('Access-Control-Allow-Origin: *'); 
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
	//register_nav_menu( 'header', __( 'Menu Header', 'cademonline' ) );
	register_nav_menu( 'general', __( 'Menu Principal', 'cademonline' ) );
	register_nav_menu( 'header', __( 'Menu Header', 'cademonline' ) );
	//register_nav_menu( 'footer', __( 'Menu Footer', 'cademonline' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5' );
}

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'premio',
		array(
		  'labels' => array(
			'name' => __( 'Premios', 'cademonline' ),
			'singular_name' => __( 'Premio', 'cademonline' )
		  ),
		  'menu_icon' => "dashicons-products",
		  'menu_position' => 3,
		  'public' => true,
		  'has_archive' => false,
		  'taxonomies' => array('category'),
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'thumbnail',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'encuesta',
		array(
		  'labels' => array(
			'name' => __( 'Encuestas', 'cademonline' ),
			'singular_name' => __( 'Encuesta', 'cademonline' )
		  ),
		  'menu_icon' => "dashicons-forms",
		  'menu_position' => 3,
		  'public' => true,
		  'has_archive' => false,
		  'taxonomies' => array('category'),
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'thumbnail',
			'custom-fields'
		  )
		)
	);
	//--
	register_post_type( 'faqs',
		array(
		  'labels' => array(
			'name' => __( 'Preguntas Frecuentes', 'cademonline' ),
			'singular_name' => __( 'Pregunta Frecuente', 'cademonline' )
		  ),
		  'menu_icon' => "dashicons-format-chat",
		  'menu_position' => 3,
		  'public' => true,
		  'has_archive' => false,
		  'taxonomies' => array('category'),
		  'supports' => array (
			'title',
			'author',
			'editor',
			'page-attributes',
			'thumbnail',
			'custom-fields'
		  )
		)
	);
}
function wpse_category_set_post_types( $query ){
    if( $query->is_category() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'post', 'news' ) );
    }
}
add_action( 'pre_get_posts', 'wpse_category_set_post_types' );

function noImage($cont){	
	return preg_replace('/<img[^>]+>/i', '', $cont);
}

//--
function init_function(){
	wp_deregister_script('jquery');
	wp_deregister_script('jquery-migrate');
	wp_register_script('jquery', ("//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"), false, '2.2.4');
	wp_register_script('jquery-migrate', ("//code.jquery.com/jquery-migrate-1.4.1.min.js"), false, '1.4.1');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-migrate');
	//--
}
add_action( 'init', 'init_function' );
/*this function allows users to use the first image in their post as their thumbnail*/
function first_image($content = "") {
	global $post, $posts;
	$img = '';
	ob_start();
	ob_end_clean();
	if(empty($content)){
		$content=$post->post_content;
	}
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	$img = $matches [1] [0];

	return trim($img);
} 
/* this function gets thumbnail from Post Thumbnail or Custom field or First post image */
function get_thumbnail($width=100, $height=100, $fullpath=false, $post_id=false, $class='', $alttext='', $titletext='', $custom_field=''){
	global $post, $shortname, $posts;
	
	if(!$post_id){
		$post_id = $post->ID;
	}
	$thumb_array['thumb'] = '';
	$thumb_array['use_timthumb'] = true;
	if ($fullpath) $thumb_array['fullpath'] = ''; //full image url for lightbox
	
	if ( function_exists('has_post_thumbnail') ) {
		if ( has_post_thumbnail($post_id) ) {
			$thumb_array['use_timthumb'] = false;
			
			$args='';
			if ($class <> '') $args['class'] = $class;
			if ($alttext <> '') $args['alt'] = $alttext;
			if ($titletext <> '') $args['title'] = $titletext;
			
			$thumb_array['thumb'] = get_the_post_thumbnail( $post_id, array($width,$height), $args );
			
			if ($fullpath) {
				$thumb_array['fullpath'] = get_the_post_thumbnail( $post_id );
				if ($thumb_array['fullpath'] <> '') { 
					$thumb_array['fullpath'] = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $thumb_array['fullpath'], $matches);
					$thumb_array['fullpath'] = trim($matches[1][0]);
				};
			};
		}
	};
	
	if ($thumb_array['thumb'] == '') {
		if ($custom_field == '') $thumb_array['thumb'] = get_post_meta($post_id, 'Thumbnail', $single = true);
		else { 
			$thumb_array['thumb'] = get_post_meta($post_id, $custom_field, $single = true);
			if ($thumb_array['thumb'] == '') $thumb_array['thumb'] = get_post_meta($post_id, 'Thumbnail', $single = true);
		}
		
		if (($thumb_array['thumb'] == '') && ((get_option($shortname.'_grab_image')) == 'on')) $thumb_array['thumb'] = first_image();
		
		if ($fullpath) $thumb_array['fullpath'] = apply_filters('et_fullpath', $thumb_array['thumb']);
	}
			
	return $thumb_array;
}

function fix_svg_thumb_display() {
  echo '<style>
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { 
      width: 100% !important; 
      height: auto !important; 
    }
  </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['mp4'] = 'video/mp4';
  $mimes['m4v'] = 'video/mp4';
  $mimes['webm'] = 'video/webm';
  $mimes['ogv'] = 'video/ogg';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
add_action( 'wp_ajax_get_concursantes', 'get_concursantes' );
add_action( 'wp_ajax_nopriv_get_concursantes', 'get_concursantes' );
function get_concursantes(){
	$concursantes='';
	$resp='';
	//consulta
	if(isset($_POST['p'])){
		$query = new WP_Query(array('post_type' => 'encuesta', 'post_status' => 'publish', 'p' => $_POST['p']));
	}else{
		$query = new WP_Query(array('post_type' => 'encuesta', 'post_status' => 'publish', 's' => $_POST['s']));
	}
	if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
		$desc=get_the_content( );
		$concursantes=$desc;
	endwhile; endif;
	//
	$n=0;
	$usuarios=explode(',',$concursantes);
	if(count($usuarios)%2!=0){
		array_push($usuarios,' - ');
	}
	//echo '<pre>'.print_r($usuarios,true).'</pre>';
	foreach($usuarios as $usuario):$n++;
	if($n%2==0):
		$resp.='<div class="col s6">'.$usuario.'</div></li>';
	else:
		$resp.='<li class="collection-item row"><div class="col s6">'.$usuario.'</div>';
	endif;
	endforeach;				
	wp_die( $resp );
}
/*
New Users
*/

define('SALT', 'qEGST6a1EeILR+62DComCy3rlRssLNTI1gx5Fgo1Qw'); 

function encrypt($text) 
{ 
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
} 

function decrypt($text) 
{ 
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))); 
} 

function FechaNac($fechaN)
{
	$date = new DateTime($fechaN);
    return $date->format('Y-m-d');
}

function ReplaceRut($rut)
{
	$FormatRut = str_replace(array('.','-'), '', trim($rut));
	return $FormatRut;

}

add_action( 'wp_ajax_new_user', 'new_user' );
add_action( 'wp_ajax_nopriv_new_user', 'new_user' );

function new_user(){	
	global $wpdb;
	
	$resp = 'Exito';
	//--
	
	$user_post = array(
		'nombres'					=> $_POST['nombres'],
		'apellidos'					=> $_POST['apellidos'],
		'email'						=> $_POST['email'],
		'fecha_nacimiento'			=> FechaNac($_POST['nacimiento_submit']),
		'sexo'						=> $_POST['sexo'],
		'rut'						=> ReplaceRut($_POST['rut']),
		'email'						=> $_POST['email'],
		'region'					=> $_POST['region'],
		'comuna'					=> $_POST['comunasel'],
		'p2'						=> $_POST['typeNY'], //ok 
		'p1'						=> $_POST['p3'], //ok
        'p4'						=> $_POST['p5'], //ok 
        'p6'						=> $_POST['p6'], //ok
        'p3'						=> $_POST['p1'],
        'p5'					    => $_POST['p4'],
        'p8'						=> $_POST['p6'],
		'password'					=> encrypt($_POST['password']),
		'confirmapassword'			=> encrypt($_POST['confirmapassword']),
		'terminos'					=> str_replace('on', 1, $_POST['terminos']),
		'created_at'				=> date("Y-m-d H:i:s"),
		'ultima_ip'					=> $_SERVER['REMOTE_ADDR'],
		'form'						=> 'wp-new'
	);

	$db = new wpdb('cadem_panel','C+m.SK*S)3kW','cadem_apppanel','localhost');

	$rut = ReplaceRut($_POST['rut']);

	$query = "select count(*) from users where rut = $rut || email = '{$_POST["email"]}'";

	$num = $db->get_var($query);

	if($num == 0) {
		$db->insert('users', $user_post);
	} else{
		$resp = 'Usuario ya existe';		
	}
	
	//respuesta
	wp_die( $resp );
}
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { 
?>
	<h3><?php _e('Informacion Extra', 'cademonline') ?></h3>
	<table class="form-table">	
		<tr>
			<th><label for="nombre">Nombre</label></th>
			<td>
				<input type="text" name="nombre" id="nombre" value="<?php echo esc_attr( get_the_author_meta( 'nombre', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Nombre</span>
			</td>
		</tr>
		<tr>
			<th><label for="apellidos">Apellidos</label></th>
			<td>
				<input type="text" name="apellidos" id="apellidos" value="<?php echo esc_attr( get_the_author_meta( 'apellidos', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Apellido Paterno y Materno</span>
			</td>
		</tr>	
		<tr>
			<th><label for="sexo">Genero</label></th>
			<td>
				<input type="text" name="sexo" id="sexo" value="<?php echo esc_attr( get_the_author_meta( 'sexo', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Femenino o Masculino</span>
			</td>
		</tr>
		<tr>
			<th><label for="nacimiento">Fecha de Nacimiento</label></th>
			<td>
				<input type="date" name="nacimiento" id="nacimiento" value="<?php echo esc_attr( get_the_author_meta( 'nacimiento', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">DD-MM-YYYY</span>
			</td>
		</tr>
		<tr>
			<th><label for="rut">RUT</label></th>
			<td>
				<input type="text" name="rut" id="rut" value="<?php echo esc_attr( get_the_author_meta( 'rut', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">ej 12345678-9</span>
			</td>
		</tr>
		<tr>
			<th><label for="region">Region</label></th>
			<td>
				<select name="region" id="region">
					<option value="" disabled selected>Seleccione Region</option>
					<option value="15" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='15'?'selected':''; ?>>Arica y Parinacota</option>
					<option value="1" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='1'?'selected':''; ?>>Tarapacá</option>
					<option value="2" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='2'?'selected':''; ?>>Antofagasta</option>
					<option value="3" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='3'?'selected':''; ?>>Atacama</option>
					<option value="4" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='4'?'selected':''; ?>>Coquimbo</option>
					<option value="5" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='5'?'selected':''; ?>>Valparaíso</option>
					<option value="13" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='13'?'selected':''; ?>>Metropolitana de Santiago</option>
					<option value="6" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='6'?'selected':''; ?>>Del Libertador Gral. Bernardo O’Higgins</option>
					<option value="7" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='7'?'selected':''; ?>>Del Maule</option>
					<option value="8" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='8'?'selected':''; ?>>Del Biobío</option>
					<option value="9" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='9'?'selected':''; ?>>De la Araucanía</option>
					<option value="14" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='14'?'selected':''; ?>>De Los Ríos</option>
					<option value="10" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='10'?'selected':''; ?>>De Los Lagos</option>
					<option value="11" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='11'?'selected':''; ?>>De Aisén del Gral. Carlos Ibáñez del Campo</option>
					<option value="12" <?php echo esc_attr( get_the_author_meta( 'region', $user->ID ) )=='12'?'selected':''; ?>>De Magallanes y de la Antártica Chilena</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="comuna">Comuna</label></th>
			<td>
				<select id="comunas" name="comuna" required>
					<option value="" disabled selected>Seleccione Comuna</option>
					<option value="13101" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13101'?'selected':''; ?>>Santiago</option>
					<option value="13102" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13102'?'selected':''; ?>>Cerrillos</option>
					<option value="13103" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13103'?'selected':''; ?>>Cerro Navia</option>
					<option value="13104" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13104'?'selected':''; ?>>Conchalí</option>
					<option value="13105" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13105'?'selected':''; ?>>El Bosque</option>
					<option value="13106" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13106'?'selected':''; ?>>Estación Central</option>
					<option value="13107" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13107'?'selected':''; ?>>Huechuraba</option>
					<option value="13108" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13108'?'selected':''; ?>>Independencia</option>
					<option value="13109" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13109'?'selected':''; ?>>La Cisterna</option>
					<option value="13110" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13110'?'selected':''; ?>>La Florida</option>
					<option value="13111" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13111'?'selected':''; ?>>La Granja</option>
					<option value="13112" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13112'?'selected':''; ?>>La Pintana</option>
					<option value="13113" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13113'?'selected':''; ?>>La Reina</option>
					<option value="13114" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13114'?'selected':''; ?>>Las Condes</option>
					<option value="13115" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13115'?'selected':''; ?>>Lo Barnechea</option>
					<option value="13116" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13116'?'selected':''; ?>>Lo Espejo</option>
					<option value="13117" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13117'?'selected':''; ?>>Lo Prado</option>
					<option value="13118" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13118'?'selected':''; ?>>Macul</option>
					<option value="13119" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13119'?'selected':''; ?>>Maipú</option>
					<option value="13120" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13120'?'selected':''; ?>>Ñuñoa</option>
					<option value="13121" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13121'?'selected':''; ?>>Pedro Aguirre Cerda</option>
					<option value="13122" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13122'?'selected':''; ?>>Peñalolén</option>
					<option value="13123" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13123'?'selected':''; ?>>Providencia</option>
					<option value="13124" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13124'?'selected':''; ?>>Pudahuel</option>
					<option value="13125" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13125'?'selected':''; ?>>Quilicura</option>
					<option value="13126" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13126'?'selected':''; ?>>Quinta Normal</option>
					<option value="13127" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13127'?'selected':''; ?>>Recoleta</option>
					<option value="13128" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13128'?'selected':''; ?>>Renca</option>
					<option value="13129" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13129'?'selected':''; ?>>San Joaquín</option>
					<option value="13130" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13130'?'selected':''; ?>>San Miguel</option>
					<option value="13131" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13131'?'selected':''; ?>>San Ramón</option>
					<option value="13132" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13132'?'selected':''; ?>>Vitacura</option>
					<option value="13201" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13201'?'selected':''; ?>>Puente Alto</option>
					<option value="13202" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13202'?'selected':''; ?>>Pirque</option>
					<option value="13203" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13203'?'selected':''; ?>>San José de Maipo</option>
					<option value="13301" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13301'?'selected':''; ?>>Colina</option>
					<option value="13302" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13302'?'selected':''; ?>>Lampa</option>
					<option value="13303" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13303'?'selected':''; ?>>Tiltil</option>
					<option value="13401" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13401'?'selected':''; ?>>San Bernardo</option>
					<option value="13402" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13402'?'selected':''; ?>>Buin</option>
					<option value="13403" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13403'?'selected':''; ?>>Calera de Tango</option>
					<option value="13404" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13404'?'selected':''; ?>>Paine</option>
					<option value="13501" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13501'?'selected':''; ?>>Melipilla</option>
					<option value="13502" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13502'?'selected':''; ?>>Alhué</option>
					<option value="13503" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13503'?'selected':''; ?>>Curacaví</option>
					<option value="13504" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13504'?'selected':''; ?>>María Pinto</option>
					<option value="13505" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13505'?'selected':''; ?>>San Pedro</option>
					<option value="13601" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13601'?'selected':''; ?>>Talagante</option>
					<option value="13602" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13602'?'selected':''; ?>>El Monte</option>
					<option value="13603" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13603'?'selected':''; ?>>Isla de Maipo</option>
					<option value="13604" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13604'?'selected':''; ?>>Padre Hurtado</option>
					<option value="13605" <?php echo esc_attr( get_the_author_meta( 'comuna', $user->ID ) )=='13605'?'selected':''; ?>>Peñaflor</option>
				</select>
				<span class="description">Solo región <strong>Metropolitana de Santiago</strong></span>
			</td>
		</tr>
		<tr>
			<th><label for="ingreso">Es la persona que aporta el ingreso principal del hogar</label></th>
			<td>
			<?php //echo esc_attr( get_the_author_meta( 'ingreso', $user->ID ) ); ?>
				<input type="radio" id="test5" name="ingreso" class="check" required <?php echo esc_attr( get_the_author_meta( 'ingreso', $user->ID ) )=='si'?'checked':''; ?> />
      			<label for="test5" data-error="Seleccione respuesta" data-success="">Si</label>
      			<input type="radio" id="test6" name="ingreso" class="check" required <?php echo esc_attr( get_the_author_meta( 'ingreso', $user->ID ) )=='no'?'checked':''; ?> />
      			<label for="test6">No</label>
			</td>
		</tr>
		<tr>
			<th><label for="actividad_sostenedor">Actividad principal del sostenedor del hogar</label></th>
			<td>
				<select id="actividad_sostenedor" name="actividad_sostenedor" required>
			  		<option value="" disabled selected>Seleccione</option>
					<option value="1" <?php echo esc_attr( get_the_author_meta( 'actividad_sostenedor', $user->ID ) )=='1'?'selected':''; ?>>Trabajo Remuneradamente</option>
					<option value="2" <?php echo esc_attr( get_the_author_meta( 'actividad_sostenedor', $user->ID ) )=='2'?'selected':''; ?>>Estudiante</option>
					<option value="3" <?php echo esc_attr( get_the_author_meta( 'actividad_sostenedor', $user->ID ) )=='3'?'selected':''; ?>>Dueña de Casa</option>
					<option value="4" <?php echo esc_attr( get_the_author_meta( 'actividad_sostenedor', $user->ID ) )=='4'?'selected':''; ?>>Desempleado (buscando trabajo)</option>
					<option value="5" <?php echo esc_attr( get_the_author_meta( 'actividad_sostenedor', $user->ID ) )=='5'?'selected':''; ?>>Retirado, Jubilado, Pensionado</option>
					<option value="6" <?php echo esc_attr( get_the_author_meta( 'actividad_sostenedor', $user->ID ) )=='6'?'selected':''; ?>>Otro</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="actividad_principal">Actividad principal</label></th>
			<td>
				<select id="actividad_principal" name="actividad_principal" required>
					<option value="" disabled selected>Seleccione</option>
					<option value="1" <?php echo esc_attr( get_the_author_meta( 'actividad_principal', $user->ID ) )=='1'?'selected':''; ?>>Trabaja Remuneradamente</option>
					<option value="2" <?php echo esc_attr( get_the_author_meta( 'actividad_principal', $user->ID ) )=='2'?'selected':''; ?>>Estudiante</option>
					<option value="3" <?php echo esc_attr( get_the_author_meta( 'actividad_principal', $user->ID ) )=='3'?'selected':''; ?>>Dueña de Casa</option>
					<option value="4" <?php echo esc_attr( get_the_author_meta( 'actividad_principal', $user->ID ) )=='4'?'selected':''; ?>>Desempleado (buscando trabajo)</option>
					<option value="5" <?php echo esc_attr( get_the_author_meta( 'actividad_principal', $user->ID ) )=='5'?'selected':''; ?>>Retirado, Jubilado, Pensionado</option>
					<option value="6" <?php echo esc_attr( get_the_author_meta( 'actividad_principal', $user->ID ) )=='6'?'selected':''; ?>>Otro</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="educacion">Nivel Educacional</label></th>
			<td>
				<select id="educacion" name="educacion" required>
					<option value="" disabled selected>Seleccione</option>
					<option value="1" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='1'?'selected':''; ?>>Sin Educación</option>
					<option value="2" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='2'?'selected':''; ?>>Básica incompleta</option>
					<option value="3" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='3'?'selected':''; ?>>Básica completa</option>
					<option value="4" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='4'?'selected':''; ?>>Media incompleta</option>
					<option value="5" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='5'?'selected':''; ?>>Media completa</option>
					<option value="6" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='6'?'selected':''; ?>>Técnica superior incompleta</option>
					<option value="7" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='7'?'selected':''; ?>>Técnica superior completa</option>
					<option value="8" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='8'?'selected':''; ?>>Universitaria incompleta (1 a 3 años de estudio)</option>
					<option value="9" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='9'?'selected':''; ?>>Universitaria completa</option>
					<option value="10" <?php echo esc_attr( get_the_author_meta( 'educacion', $user->ID ) )=='10'?'selected':''; ?>>Post grado, magister, doctorado</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><label for="trabajo">Trabajo u Ocupación</label></th>
			<td>
				<select id="trabajo" name="trabajo" required>
					<option value="" disabled selected>Seleccione</option>
					<option value="1" <?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) )=='1'?'selected':''; ?>>Trabajos menores, ocasionales, informales (lavado/aseo)</option>
					<option value="2" <?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) )=='2'?'selected':''; ?>>Oficio menor / obrero no calificado/ jornalero / servicio doméstico con contrato</option>
					<option value="3" <?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) )=='3'?'selected':''; ?>>Obrero calificado / capataz / microempresario (taxi, kiosco, comercio menor o ambulante)</option>
					<option value="4" <?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) )=='4'?'selected':''; ?>>Empleado administrativo medio y bajo / Técnico especializado / Profesor primario o secundario</option>
					<option value="5" <?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) )=='5'?'selected':''; ?>>Ejecutivo medio, gerente, subgerente de empresa mediana o pequeña / Profesional independiente</option>
					<option value="6" <?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) )=='6'?'selected':''; ?>>Alto ejecutivo, Gerente General, Director o empresario propietario de grandes empresas</option>
				</select>
			</td>
		</tr>
	</table>
<?php 
}
//--
show_admin_bar( false );
remove_filter( 'the_excerpt', 'wpautop' );
?>