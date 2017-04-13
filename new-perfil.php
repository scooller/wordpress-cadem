<?php
/*if(isset($_POST['_token'])):
	$result=print_r($_POST,true);
	$result=json_encode($result);
	die($result);
endif;*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadem</title>
</head>

<body>
<section class="new-perfil">
	<main class="row" id="perfil-row">
		<ul class="tabs special tabs-fixed-width">
			<li class="tab col m3 s6"><a href="#datos" class="active">DATOS PERSONALES</a></li>
			<li class="tab col m3 s6"><a href="#actividad">ACTIVIDAD</a></li>
        </ul>
        <form id="nperfil" action="" enctype="application/x-www-form-urlencoded" method="post" class="tab-content" novalidate>
        	<input name="_token" type="hidden" value="ivl2ye5eqbuIBPZ4mmgMqT8FQzADlthFq2iaRzB1">
			<div id="datos" class="col s12">
				<div class="row"><div class="col m8 s12">
					<div class="input-field col m4 s12">
						<input id="nombres" type="text" name="nombres" class="validate" required required="" aria-required="true">
						<label for="nombres" data-error="Ingrese Nombre" data-success="">Nombre(s)</label>
					</div>
					<div class="input-field col m4 s6">
						<input id="apellido_p" type="text" name="apellidop" class="validate" required required="" aria-required="true">
						<label for="apellido_p" data-error="Ingrese Apellido" data-success="">Apellido Paterno</label>
					</div>
					<div class="input-field col m4 s6">
						<input id="apellido_m" type="text" name="apellidom" class="validate" required required="" aria-required="true">
						<label for="apellido_m" data-error="Ingrese Apellido" data-success="">Apellido Materno</label>
					</div>
					<div class="input-field col m8 s12">
						<input id="nacimiento" type="date" name="nacimiento" class="datepicker" required required="" aria-required="true">
						<label for="nacimiento" data-error="Ingrese Fecha Nacimiento" data-success="">Fecha Nacimiento</label>
					</div>
					<div class="input-field custom-radio col m4 s12">
						<span>Género</span>
						<label class="active" data-error="Seleccione respuesta" data-success="">
							<input name="sexo" type="radio" value="masculino" checked required />
							<i class="icon-male small" aria-hidden="true"></i>
							<div class="msj">Masculino</div>
						</label>
						<label>
							<input name="sexo" type="radio" value="femenino" required />
							<i class="icon-female small" aria-hidden="true"></i>
							<div class="msj">Femenino</div>
						</label>
					</div>
					<div class="input-field col m4 s12">
						<input id="rut" type="text" name="rut" class="validate" required maxlength="12">
						<label for="rut" data-error="Rut no valido" data-success="">Rut</label>
					</div>
					<div class="input-field col m4 s12">
						<input id="mail" type="email" name="email" class="validate" required required="" aria-required="true">
						<label for="mail" data-error="E-mail no valido" data-success="">Correo</label>
					</div>
					<div class="col m12 hide-on-small-only">&nbsp;</div>
					<div class="input-field col m4 s6">
						<select name="region" id="region" required>
							<option value="" disabled selected>Región</option>
						</select>
					</div>
					<div class="input-field col m4 s6">
						<select name="comuna" id="comuna" required>
						  <option value="" disabled selected>Comuna</option>
						</select>
					</div>
					<div class="input-field col m12 s12">
						<a href="#actividad" class="btn btn-black btn-tab">Continuar</a>
					</div>
				</div>
			</div></div>
			<div id="actividad" class="col s12">
				<div class="row"><div class="col m8 s12">
					<div class="col m4 s12">
						¿Es usted la persona que aporta el ingreso principal del hogar?
					</div>
					<div class="input-field col m2 s12">
						<input type="radio" id="test5" name="typeNY" class="check" required />
      					<label for="test5" data-error="Seleccione respuesta" data-success="">Si</label>
      					<input type="radio" id="test6" name="typeNY" class="check" required />
      					<label for="test6">No</label>
					</div>
					<div class="input-field col m6 s12">
						<select name="p1" required>
						  <option value="" disabled selected>¿Cuál es la actividad principal del sostenedor del hogar?</option>
						  <option value="1">Trabajo Remuneradamente</option>
						  <option value="2">Estudiante</option>
						  <option value="3">Dueña de Casa</option>
						  <option value="4">Desempleado (buscando trabajo)</option>
						  <option value="5">Retirado, Jubilado, Pensionado</option>
						  <option value="6">Otro</option>
						</select>
					</div>
					<div class="col m12 hide-on-small-only">&nbsp;</div>
					<div class="input-field col m6 s12">
						<input id="pass" type="text" name="password" class="validate" required required="" aria-required="true">
						<label for="pass" data-error="Ingrese contraseña valida" data-success="">Contraseña</label>
					</div>
					<div class="input-field col m6 s12">
						<input id="re_pass" type="text" name="confirmapassword" class="validate" required required="" aria-required="true">
						<label for="re_pass" data-error="Contraseña no coincide" data-success="">Confirma tu contraseña</label>
					</div>
					<div class="input-field col m6 s12">
						<a href="http://cademonline.cl/terminos-y-condiciones/" target="_blank"><i class="icon-contract" aria-hidden="true"></i> TÉRMINOS Y CONDICIONES</a>
						<input type="checkbox" name="terminos" id="terminos" />
						<label for="terminos" data-error="Debe aceptar terminos y condiciones" data-success="">Ok, Acepto.</label>
					</div>
					<div class="input-field col m12 s12">
						<button type="submit" class="btn btn-black">Enviar</button>
					</div>
				</div>				
			</div></div>
			
			
		</form>
		
		<div class="msj-final center">
			<h1><i class="icon-ok-circled"></i> GRACIAS POR UNIRTE A NUESTRA COMUNIDAD.</h1>
			<div class="txt">¡Gracias por pertenecer a nuestra red, ahora contesta<br>
			encuestas y estarás participando por increíbles premios!</div>
		</div>
	</main>
</section>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/onepage-scroll/1.3.1/jquery.onepage-scroll.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.0/jquery.form.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/onepage-scroll/1.3.1/onepage-scroll.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="fontello/css/fontello.css">
<?php 
	require_once('scss.inc.php');
	require_once('sass-compiler.php');
	SassCompiler::run("scss/", "css/");
?>
<link rel="stylesheet" href="css/style.css?<?php echo rand(); ?>">
<script src="js/jquery.rut.min.js"></script>
<script src="js/general.js?<?php echo rand(); ?>"></script>
</body>
</html>