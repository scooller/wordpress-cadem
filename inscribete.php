<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadem</title>
</head>

<body>
<section class="inscripcion">
	<main class="row" id="inscripcion-row">
		<ul class="tabs special tabs-fixed-width">
			<li class="tab col m3 s6"><a href="#test1" class="active">DATOS PERSONALES</a></li>
			<li class="tab col m3 s6"><a href="#test2">ACTIVIDAD</a></li>
			<li class="tab col m3 s6"><a href="#test3">BIENES</a></li>
			<li class="tab col m3 s6"><a href="#test4">CONTACTO</a></li>
        </ul>
        <form action="" enctype="application/x-www-form-urlencoded" method="post" class="tab-content">
			<div id="test1" class="col s12">
				<div class="row"><div class="col m8 s12">
					<div class="input-field col m4 s6">
						<input id="nombres" type="text" name="nombres" class="validate" required>
						<label for="nombres">Nombres</label>
					</div>
					<div class="input-field col m4 s6">
						<input id="apellido_p" type="text" name="apellido_p" class="validate" required>
						<label for="apellido_p">Apellido Paterno</label>
					</div>
					<div class="input-field col m4 s6">
						<input id="apellido_m" type="text" name="apellido_m" class="validate" required>
						<label for="apellido_m">Apellido Materno</label>
					</div>
					<div class="input-field col m12 s6">
						<input id="nacimiento" type="date" name="nacimiento" class="datepicker" required>
						<label for="nacimiento">Fecha Nacimiento</label>
					</div>
					<div class="input-field col m6 s12">
						<input id="n_cedula" type="text" name="n_cedula" class="validate" required>
						<label for="n_cedula">N° Cédula de Identidad</label>
					</div>
					<div class="input-field custom-radio col m6 s12">
						<span>Género</span>
						<label class="active">
							<input name="sexo" type="radio" value="male" checked />
							<i class="icon-male small" aria-hidden="true"></i>
							<div class="msj">Masculino</div>
						</label>
						<label>
							<input name="sexo" type="radio" value="female" />
							<i class="icon-female small" aria-hidden="true"></i>
							<div class="msj">Femenino</div>
						</label>
					</div>
					<div class="input-field col m6 s12">
						<select>
						  <option value="" disabled selected>Nacionalidad</option>
						  <option value="1">Option 1</option>
						  <option value="2">Option 2</option>
						  <option value="3">Option 3</option>
						</select>
					</div>
					<div class="input-field col m3 s6">
						<select>
						  <option value="" disabled selected>Región</option>
						  <option value="1">Option 1</option>
						  <option value="2">Option 2</option>
						  <option value="3">Option 3</option>
						</select>
					</div>
					<div class="input-field col m3 s6">
						<select>
						  <option value="" disabled selected>Comuna</option>
						  <option value="1">Option 1</option>
						  <option value="2">Option 2</option>
						  <option value="3">Option 3</option>
						</select>
					</div>
				</div>
			</div></div>
			<div id="test2" class="col s12">
				<div class="row"><div class="col m8 s12">
					<div class="col m6 s12">
						¿Es usted la persona que aporta el ingreso principal del hogar?
					</div>
					<div class="input-field col m6 s12">
						<input type="radio" id="test5" name="ingreso" class="check" />
      					<label for="test5">Si</label>
      					<input type="radio" id="test6" name="ingreso" class="check" />
      					<label for="test6">No</label>
					</div>
					<div class="input-field col m6 s12">
						<select>
						  <option value="" disabled selected>¿Cual es el nivel educacional del sostenedor?</option>
						  <option value="1">Option 1</option>
						  <option value="2">Option 2</option>
						  <option value="3">Option 3</option>
						</select>
					</div>
					<div class="col m6 hide-on-small-only" style="height: 81px;">&nbsp;</div>
					<div class="input-field col m6 s12">
						<select>
						  <option value="" disabled selected>¿Cuál es la actividad principal del sostenedor del hogar?</option>
						  <option value="1">Option 1</option>
						  <option value="2">Option 2</option>
						  <option value="3">Option 3</option>
						</select>
					</div>
				</div>				
			</div></div>
			<div id="test3" class="col s12">
				<div class="row"><div class="col m8 s12">
				<h4 class="title">¿Cuál de los siguientes bienes,<br>
				servicios o plataformas tienes?</h4>
				<ul>			
					<li><input type="checkbox" id="bienes1" />
						<label for="bienes1"><i class="icon-wifi" aria-hidden="true"></i> ACCESO A INTERNET DESDE EL HOGAR</label></li>
     				<li><input type="checkbox" id="bienes2" />
						<label for="bienes2"><i class="icon-contract" aria-hidden="true"></i> CONTRATO DE PLAN PARA TELÉFONO INTELIGENTE</label></li>
					<li><input type="checkbox" id="bienes3" />
						<label for="bienes3"><i class="icon-domestic" aria-hidden="true"></i> SERVICIO DOMÉSTICO</label></li>
					<li><input type="checkbox" id="bienes4" />
						<label for="bienes4"><i class="icon-credit" aria-hidden="true"></i> CUENTA CORRIENTE (NO CONSIDERA CUENTA RUT BANCO ESTADO)</label></li>
					<li><input type="checkbox" id="bienes5" />
						<label for="bienes5"><i class="icon-isapre" aria-hidden="true"></i> PLAN DE ISAPRE</label></li>
					<li><input type="checkbox" id="bienes6" />
						<label for="bienes6"><i class="icon-house" aria-hidden="true"></i> SUBSIDIO O BENEFICIO DEL ESTADO (INGRESO ÉTICO, PROGRAMA PUENTE, ENTRE OTROS)</label></li>
					</ul>
				</div></div>
			</div>
			<div id="test4" class="col s12">
				<div class="input-field col m4 s6">
					<input id="mail" type="email" name="nombres" class="validate" required>
					<label for="mail">Correo</label>
				</div>
				<div class="input-field col m4 s6">
					<input id="fono_fijo" type="text" name="nombres" class="validate" required>
					<label for="fono_fijo">Teléfono Red Fija</label>
				</div>
				<div class="input-field col m4 s6">
					<input id="fono_cel" type="text" name="nombres" class="validate" required>
					<label for="fono_cel">Teléfono Celular</label>
				</div>
				<div class="input-field col m4 s6">
					<input id="pass" type="text" name="nombres" class="validate" required>
					<label for="pass">Contraseña</label>
				</div>
				<div class="input-field col m4 s6">
					<input id="re_pass" type="text" name="nombres" class="validate" required>
					<label for="re_pass">Confirma tu contraseña</label>
				</div>
				<div class="input-field col m8 s6">
					<input type="checkbox" id="terminos" />
					<i class="icon-contract" aria-hidden="true"></i> <label for="terminos">Ok, Acepto.</label>
				</div>
			</div>
		</form>
	</main>
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