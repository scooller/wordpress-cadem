<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadem</title>
</head>

<body>
<section class="perfil">	
	<main id="perfil-row"><div class="carousel carousel-slider">
	<div class="carousel-item valign-wrapper">
		<h6 class="sub-title">Perfil</h6>
		<div class="center valign">
			<h2 class="title"><i class="icon-male"></i> Hola, <span>Juan Pérez Ayala</span></h2>
			<button type="button" class="waves-effect waves-light btn-large btn-black" data-slide="2">ENCUESTAS RESPONDIDAS</button> 
			<button type="button" class="waves-effect waves-light btn-large btn-black" data-slide="3"><i class="icon-pencil circle"></i> ACTUALIZAR DATOS</button> 
			<button type="button" class="waves-effect waves-light btn-large btn-black" data-slide="4">RESPONDER ENCUESTAS</button>
		</div>
	</div>
	<div class="carousel-item valign-wrapper">		
		<h6 class="sub-title"><a href="#" data-slide="1">Tu Perfil</a> / Encuestas Respondidas</h6>
		<div class="valign"><div class="row">
			<div class="col m6">
				<h5 class="title"><i class="icon-male"></i> Hola, <span>Juan Pérez Ayala</span></h5>
				<ul class="box">
					<li><a href="#">Estudio Compra Online</a></li>
					<li><a href="#">Evaluación diseño de envase</a></li>
					<li><a href="#">Estudio Pack Test</a></li>
					<li><a href="#">Evaluación Guiones</a></li>
					<li><a href="#">Evaluación de Campañas Gráficas</a></li>
					<li><a href="#">Estudio Publicidad</a></li>
					<li><a href="#">Analisis del la Política Chilena</a></li>
				</ul>
			</div>
		</div></div>
	</div>
	<div class="carousel-item valign-wrapper">
		<h6 class="sub-title"><a href="#" data-slide="1">Tu Perfil</a> / Encuestas Respondidas</h6>
		<div class="valign"><div class="row">
			<div class="col m6">
				<h5 class="title"><i class="icon-male"></i> Hola, <span>Juan Pérez Ayala</span></h5>
				<form>
				<div class="col s12">
					<span>Nombre y Apellidos:</span>
					<div class="input-field inline">
					  <input placeholder="" id="first_name" type="text" class="validate" value="Juan Pérez Ayala" disabled>					  
					</div>
				</div>
				<div class="col s12">
					<span>Celular:</span>
					<div class="input-field inline">
					  <input placeholder="" id="first_name" type="tel" class="validate" value="96754321" disabled>					  
					</div>
				</div>
				<div class="col s12">
					<span>Región:</span>
					<div class="input-field inline">
					  <input placeholder="" id="first_name" type="text" class="validate" value="Metropolitana Santiago" disabled>					  
					</div>
				</div>
				<div class="col s12">
					<span>Comuna:</span>
					<div class="input-field inline">
					  <input placeholder="" id="first_name" type="text" class="validate" value="Providencia" disabled>					  
					</div>
				</div>
				<div class="col s12">
					<span>País:</span>
					<div class="input-field inline">
					  <input placeholder="" id="first_name" type="text" class="validate" value="Chile" disabled>					  
					</div>
				</div>
				<div class="col s12">
					<span>Mail:</span>
					<div class="input-field inline">
					  <input placeholder="" id="first_name" type="email" class="validate" value="juanito.perez@gmail.com" disabled>					  
					</div>
				</div>
					<button type="button" class="waves-effect waves-light btn-large btn-black" id="btn-modifica">MODIFICAR</button>
				</form>
			</div>
		</div></div>
	</div>
	<div class="carousel-item valign-wrapper">
	</div>
	</div></main>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/onepage-scroll/1.3.1/jquery.onepage-scroll.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/onepage-scroll/1.3.1/onepage-scroll.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="fontello/css/fontello.css">
<?php 
	require_once('scss.inc.php');
	require_once('sass-compiler.php');
	SassCompiler::run("scss/", "css/");
?>
<link rel="stylesheet" href="css/style.css?<?php echo rand(); ?>">
<script src="js/general.js"></script>
</body>
</html>