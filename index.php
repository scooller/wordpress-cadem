<?php get_header(); ?>
<!-- modal Video -->
<div id="modalvideo" class="modal">
	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="icon-cancel-circle"></i></a>
    <div class="modal-content">
<?php
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => 89));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
?>
		<div class="video-container"><?php the_content(); ?></div>
<?php
endwhile; endif;
wp_reset_postdata();
?>
    </div>    
</div>
<!-- modal Encuesta -->
<div id="modalencuesta" class="modal">
    <div class="modal-content">
    	<form id="encuestaDestacada" action="http://cademonline.cl/cadempanel/app/public">
			<h4 class="title">INGRESA TU RUT<p><small>Antes de contestar ingresa tus datos para ver si eres parte de nuestra comunidad. ¡Gracias!</small></p></h4>			
			<div class="row">
				<div class="col s12">
				  Tu Rut:
				  <div class="input-field inline">
					<input id="rut2" type="text" maxlength="12" class="validate">
				  </div>
				</div>
			</div>
			<button type="submit" class="btn btn-black">Enviar</button>
		</form>
    </div>    
</div>
<!-- // -->
<div class="main" id="fullpage">
	<section class="color-1 section" id="section-1">		
	<main class="valign-wrapper">
		<h6 class="sub-title" data-anim="fadeInLeft">Bienvenidos</h6>
		<div class="valign"><div class="big" data-anim="fadeInLeft">
		<?php
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => 65));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
?>
		<?php the_content(); ?>
<?php
endwhile; endif;
wp_reset_postdata();
?>
		</div>
		<p><a href="<?php echo get_permalink(72) ?>" class="btn-large btn-black btn-page" data-section="section.color-1" data-class="new-perfil" data-anim="fadeInUp"><i class="material-icons icon-angle-right right small" aria-hidden="true"></i> Inscríbete</a></p>
		</div>
	</main>
	</section>
	<!-- // -->
<?php
$query = new WP_Query(array('post_type' => 'premio', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order'));
$premios = array();
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$title=get_the_title( $ID );
	$color=get_field('color', $ID );
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$desc=get_the_content( );
	array_push($premios,array('id'=>$ID,'title'=>$title,'color'=>$color,'img'=>$img[0],'desc'=>$desc));
endwhile; endif;
wp_reset_postdata();
?>
	<section class="color-2 section" id="section-2" style="background-image: url(<?php echo $premios[0]['img'] ?>)">
	<main>

		<div class="row">
		<div class="col m7 s12">		
			<h6 class="sub-title" data-anim="fadeInLeft">Premios</h6>
			<div class="tab-tabs">
				<div class="valign" data-anim="fadeIn">
					<div class="big"><p>Estos son los <b>premios</b> que <b>podrás ganar</b> contestando nuestras encuestas</p></div>
				<ul id="tabs" class="tabs linear">
					<?php $n=0;foreach($premios as $premio): ?>
				  	<li class="tab col s3"><a href="#award-cont-<?php echo $premio['id'] ?>"<?php echo $n==0?' class="active"':'';?>><?php echo $premio['title'] ?></a></li>
				  	<?php $n++;endforeach; ?>
				</ul>				
				</div>
			</div>		
		</div>
		<div class="col m5 s12"><div class="valign-wrapper">
			<div class="valign" data-anim="fadeInRight">
			<div class="tab-cont">
				<?php $n=0;foreach($premios as $premio): ?>
				<div id="award-cont-<?php echo $premio['id'] ?>" class="col s12" data-color="<?php echo $premio['color'] ?>" data-img="<?php echo $premio['img'] ?>">
					<img src="<?php echo $premio['img'] ?>" style="display: none">
					<?php echo $premio['desc'] ?>
				</div>
				<?php $n++;endforeach; ?>				
				</div>
			</div></div>
		</div>
		</div>
	</main>
	</section>
	<!-- // -->
	<section class="color-3 section" id="section-3">
<?php
$query = new WP_Query(array('post_type' => 'encuesta', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'menu_order'));
$encuestas = array();
$enc_name = array();
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$title=get_the_title( $ID );
	$users=get_field('usuarios', $ID );
	$desc=get_the_content( );
	array_push($enc_name,$title);
	array_push($encuestas,array('id'=>$ID,'title'=>$title,'users'=>$users,'desc'=>$desc));
endwhile; endif;
wp_reset_postdata();
?>
	<main>
		<div class="row">
			<div class="sub-title" data-anim="fadeInDown">
				<div class="col s6">
					<h6>Ganadores</h6>
				</div>
				<div class="col s12"><form id="searchwin">			
					<div class="input-group">
						<input type="search" id="search-input" placeholder="Busca tu encuesta" class="autocomplete">
						<button type="submit" class="sufix"><i class="material-icons icon-search"></i></button>
					</div>
					<span>*Ingresa aquí el nombre de la encuesta que participaste</span>
				</form></div>
			</div>
		<div class="col m6 s12 txt">			
			<div class="valign-wrapper"><div class="valign" style="z-index: 99;">
				<div class="big" data-anim="fadeIn"><p><b>Busca aquí</b> si eres uno de los <b>ganadores</b></p></div>
				<div class="input-field" data-anim="fadeInLeft">
					<select class="black-select" id="select-ganadores">
						<option value="" disabled selected>Selecciona Encuesta</option>
						<?php $n=0;foreach($encuestas as $encuesta): ?>
				  			<option value="<?php echo $encuesta['id'] ?>"><?php echo $encuesta['title'] ?></option>
				  		<?php $n++;endforeach; ?>				
					</select>
				</div>
			</div></div>
		</div>
		<div class="col m6 s12">
			<div class="valign-wrapper"><div class="valign">
			<div class="center-align">
				<ul class="collection with-header" data-anim="fadeInRight">					
				
				</ul>
			</div>
			  
			</div></div>
		</div>
	</main>
	<script>
	function autocompleteInit(){
		//autocomplete
		$('input.autocomplete').autocomplete({
			data: {
				"<?php echo implode('": null,"',$enc_name); ?>": null
			},
			limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
		});
	};
	</script>
	</section>
	<!-- // -->
<?php
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => 67));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$desc=get_the_content( );
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
endwhile; endif;
wp_reset_postdata();
?>
	<section class="color-4 section" id="section-4" style="background-image: url(<?php echo $img[0]; ?>)">
		<main>
			<div class="row">
			<div class="col m12 s12">
				<h6 class="sub-title" data-anim="fadeInLeft">Encuesta Destacada</h6>
				<div class="valign-wrapper"><div class="valign" >
					<?php echo $desc; ?>
					<p><a href="<?php the_field('url',$ID); ?>" target="_blank" class="btn-large btn-black btn-purple" data-anim="fadeInUp"><i class="material-icons icon-angle-right right small" aria-hidden="true"></i> Contesta aquí</a></p>			
				</div></div>
			</div>
		</main>
	</section>
	<!-- // -->
	<section class="color-5 section" id="section-5">
<?php
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => 69));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
		$title=get_the_title( $ID );
		$desc=get_the_content( );
endwhile; endif;
wp_reset_postdata();
?>
		<main>
			<div class="row">
			<div class="col m7 s12">
				<h6 class="sub-title" data-anim="fadeInLeft">Invita a un amigo</h6>
				<div class="valign-wrapper"><div class="valign">
					<h2 class="big" data-anim="fadeInLeft"><?php echo $title; ?></h2>
					<p><a href="#" class="btn-large btn-black btn-share" data-anim="fadeInLeft"><i class="material-icons icon-angle-right right small" aria-hidden="true"></i> invítalos</a>
					<div class="share">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_bloginfo('url')); ?>" target="_blank"><i class="icon-facebook-1"></i></a>
						<a href="https://twitter.com/share/?text=<?php echo urlencode(get_bloginfo('description')); ?>&url=<?php echo urlencode(get_bloginfo('url')); ?>&via=cademonline" target="_blank"><i class="icon-twitter"></i></a>
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_bloginfo('url')); ?>&title=<?php echo urlencode(get_bloginfo('name')); ?>&summary=<?php echo urlencode(get_bloginfo('description')); ?>" target="_blank"><i class="icon-linkedin"></i></a>
						<!--<a href="https://plus.google.com/share?<?php echo urlencode(get_bloginfo('url')); ?>" target="_blank"><i class="icon-gplus"></i></a>-->
					</div>
					</p>
				</div></div>
			</div>
			<div class="col m5 s12">
			<div class="valign-wrapper">
			<?php echo $desc; ?>
			</div>
			</div>
		</main>
	</section>
	<!-- // 
	<section class="color-6 section">
		<main>
			<div class="row">
				<div class="col m7 s12">
					<h6 class="sub-title" data-anim="fadeInLeft">Tu Perfil</h6>
					<div class="valign-wrapper"><div class="valign">
						<h2 class="big" data-anim="fadeInLeft"><strong>Bienvenid@</strong><br>
						Ya eres parte de Cadem Online</h2>
						<p><a href="#" class="btn-large btn-black" data-anim="fadeInLeft"><i class="material-icons icon-angle-right right small" aria-hidden="true"></i> tu perfil</a></p>
					</div></div>
				</div>
				<div class="col m5 s12">
				<div class="valign-wrapper"><div class="valign" data-anim="fadeInRight">
					Aquí podrás actualizar tus datos, revisar qué encuestas has contestado y qué otras puedes contestar
				</div></div>
				</div>
			</div>
		</main>
	</section>
	 // -->
	<section class="color-6 section" id="section-6">
		<main>
<?php
$query = new WP_Query(array('post_type' => 'page', 'post_status' => 'publish', 'p' => 31));
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
?>
			<div class="row">
			<div class="col m6 s12">
				<h6 class="sub-title" data-anim="fadeInLeft">Qué es Cadem Online</h6>
				<div class="valign-wrapper"><div class="valign" data-anim="fadeInLeft">
					<h2 class="big"><?php the_title(); ?></h2>
				</div></div>
			</div>
			<div class="col m6 s12">
			<div class="valign-wrapper"><div class="valign" data-anim="fadeInRight">
				<?php the_content(); ?>
			</div></div>
			</div>
<?php
endwhile; endif;
wp_reset_postdata();
?>
		</main>
	</section>
	<!-- // -->
	<section class="color-7 section" id="section-7">
<?php
$query = new WP_Query(array('post_type' => 'faqs', 'post_status' => 'publish', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'menu_order'));
$faqs = array();
$contents = array();
if ( $query->have_posts() ): while ( $query->have_posts() ): $query->the_post(); $ID=$post->ID;
	$img=wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full' );
	$title=get_the_title( $ID );
	$link=get_permalink( $ID );
	$desc=get_the_content( );
	array_push($contents,$desc);
	array_push($faqs,array('id'=>$ID,'title'=>$title,'desc'=>$desc,'img'=>$img[0],'link'=>$link));
endwhile; endif;
wp_reset_postdata();
?>
		<main>
			<div class="row">
			<div class="col m5 s12">
				<h6 class="sub-title" data-anim="fadeInLeft">Preguntas Frecuentes</h6>
				<div class="valign-wrapper"><div class="valign" style="z-index: 99;">
					<div class="input-field" data-anim="fadeInLeft">
				  		<select class="black-select select-jump">
				  		<?php $n=0;foreach($faqs as $faq): ?>
				  			<option value="<?php echo $n ?>"<?php echo $n==0?' selected':'';?>><?php echo $faq['title'] ?></option>
				  		<?php $n++;endforeach; ?>
						</select>
					</div>
				</div></div>
			</div>
			<div class="col m7 s12">
			<div class="valign-wrapper"><div class="valign" data-anim="fadeInRight">
				<div class="grande">
					<h6 class="title">¿Cómo participar?</h6>
					<p>Para ser parte de Cadem Online debes registrarte <a href="#">aquí</a>. Una vez que estés registrado, nosotros te enviaremos una invitación por email con un link a la encuesta para que la contestes.</p>
				</div>
			</div></div>
			</div>
		</main>
<script type="text/javascript">
var $preguntas=Array(
	'<?php echo implode("','",$contents) ?>'
);
</script>
	</section>
	<!-- // -->
	<section class="color-8 section" id="section-8">
		<main>
		<div class="row">
			<div class="col m7 s12">
				<h6 class="sub-title" data-anim="fadeInLeft">Contacto</h6>
				<div class="valign-wrapper"><div class="valign">
					<h2 class="big" data-anim="fadeIn"><strong>Escríbenos!</strong></h2>
					<?php
					if ( function_exists( 'ninja_forms_display_form' ) ) {
					  ninja_forms_display_form( 1 );
					}
					?>
					<!--<form enctype="application/x-www-form-urlencoded" method="post" data-anim="fadeInLeft">
						<div class="input-field">
							<i class="material-icons prefix left icon-usuario small" aria-hidden="true"></i><input placeholder="Nombre" id="nombre_" type="text" class="validate browser-default" required>
						</div>
						<div class="input-field">
							<i class="material-icons prefix left icon-mail small" aria-hidden="true"></i><input placeholder="Email" id="email_" type="email" class="validate browser-default" required>
						</div>
						<div class="input-field">
         					<i class="material-icons prefix left icon-paper-plane-empty small" aria-hidden="true"></i><textarea id="mensaje_" class="materialize-textarea browser-default" placeholder="Mensaje" required></textarea>
         				</div>
						<button class="btn btn-black" type="submit"><i class="material-icons icon-angle-right right small" aria-hidden="true"></i> Enviar</button>
					</form>-->
				</div></div>
			</div>
			<div class="col m5 hide-on-small-only">
				<div class="valign-wrapper"><div class="valign" data-anim="fadeIn">
					<p><i class="material-icons prefix left icon-pin small" aria-hidden="true"></i>
					<a href="https://goo.gl/maps/eVDabhBFzn72" target="_blank" title="Ver Google Map">Nueva de Lyon 145 Piso 2,<br>Providencia, Santiago Chile.</a></p>
					<p><i class="material-icons prefix left icon-mail small" aria-hidden="true"></i>
					<a href="mailto:Cademonline@cademonline.cl" title="Enviar Email a Cademonline@cademonline.cl">Cademonline@cademonline.cl</a><br>
					<a href="tel:+56224386500" title="Llamar a 224386500">562 2438 6500</a></p>
					<div class="rep"><em>Cadem Online es una plataforma de<br><a href="http://www.cadem.cl" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem-gris.svg" class="mini-logo svg"></a></em></div>
				</div></div>
			</div>
		</div>
		</main>
		<footer class="page-footer black" data-anim="fadeInUp">
			<div class="container"><div class="row">
				<div class="col s4">
					<a class="white black-text btn btn-double nav-click" href="#5" data-index="5">INVITA A TUS<br>AMIGOS Y GANA</a>
				</div>
				<div class="col s4 center-align" style="padding-top: 1vh;">
					<a href="<?php echo get_permalink(59) ?>" target="_blank" class="white-text link">Términos y condiciones</a>
				</div>
				<div class="col s4 right-align">
					<a href="http://www.cadem.cl" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem-gris.svg" class="mini-logo svg"></a>
					<a href="https://goo.gl/maps/eVDabhBFzn72" target="_blank" title="Ver Google Map" class="white-text"><i class="material-icons icon-pin small" aria-hidden="true"></i></a>
					<a href="mailto:Cademonline@cademonline.cl" class="white-text"><i class="material-icons icon-mail small" aria-hidden="true"></i></a>
				</div>
			</div></div>
		</footer>
	</section>
	<!-- // -->
</div>
<?php get_footer(); ?> 