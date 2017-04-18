<?php 
/* Template Name: New Perfil */
get_header(); ?>
<section class="new-perfil">
	<main class="row" id="perfil-row">
		<ul class="tabs special tabs-fixed-width">
			<li class="tab col m3 s6"><a href="#datos" class="active">DATOS PERSONALES</a></li>
			<li class="tab col m3 s6"><a href="#actividad">ACTIVIDAD</a></li>
        </ul>
        <form id="nperfil" action="<?php echo admin_url('admin-ajax.php'); ?>" enctype="application/x-www-form-urlencoded" method="post" class="tab-content" novalidate>
        	<input name="action" type="hidden" value="new_user">
        	<input name="_token" type="hidden" value="ivl2ye5eqbuIBPZ4mmgMqT8FQzADlthFq2iaRzB1">
			<div id="datos" class="col s12">
				<div class="row"><div class="col m8 s12">
					<div class="input-field col m5 s12">
						<input id="nombres" type="text" name="nombres" class="validate" required required="" aria-required="true">
						<label for="nombres" data-error="Ingrese Nombre" data-success="">Nombre(s)</label>
					</div>
					<div class="input-field col m5 s12">
						<input id="apellidos" type="text" name="apellidos" class="validate" required required="" aria-required="true">
						<label for="apellidos" data-error="Ingrese Apellidos" data-success="">Apellidos</label>
					</div>
					<div class="input-field col m8 s12">
						<input id="nacimiento" type="date" name="nacimiento" class="datepicker" required required="" aria-required="true">
						<label for="nacimiento" data-error="Ingrese Fecha Nacimiento" data-success="">Fecha Nacimiento</label>
					</div>
					<div class="input-field custom-radio col m4 s12">
						<span>Género</span>
						<label class="active" data-error="Seleccione respuesta" data-success="">
							<input name="sexo" type="radio" value="1" checked required />
							<i class="icon-male small" aria-hidden="true"></i>
							<div class="msj">Masculino</div>
						</label>
						<label>
							<input name="sexo" type="radio" value="2" required />
							<i class="icon-female small" aria-hidden="true"></i>
							<div class="msj">Femenino</div>
						</label>
					</div>
					<div class="input-field col m4 s12">
						<input id="rut" type="text" name="rut" class="validate" required maxlength="12">
						<label for="rut" data-error="Rut no valido" data-success="">Rut</label>
					</div>
					<div class="input-field col m6 s12">
						<input id="mail" type="email" name="email" class="validate" required required="" aria-required="true">
						<label for="mail" data-error="E-mail no valido" data-success="">Correo</label>
					</div>
					<div class="col m12 hide-on-small-only">&nbsp;</div>
					<div class="input-field col m10 s12">
						<select name="region" id="region" required>
							<option value="" disabled selected>Región</option>
							<option value="15">Arica y Parinacota</option>
							<option value="1">Tarapacá</option>
							<option value="2">Antofagasta</option>
							<option value="3">Atacama</option>
							<option value="4">Coquimbo</option>
							<option value="5">Valparaíso</option>
							<option value="13">Metropolitana de Santiago</option>
							<option value="6">Del Libertador Gral. Bernardo O’Higgins</option>
							<option value="7">Del Maule</option>
							<option value="8">Del Biobío</option>
							<option value="9">De la Araucanía</option>
							<option value="14">De Los Ríos</option>
							<option value="10">De Los Lagos</option>
							<option value="11">De Aisén del Gral. Carlos Ibáñez del Campo</option>
							<option value="12">De Magallanes y de la Antártica Chilena</option>
						</select>
					</div>
					<div class="input-field col m10 s12 comunas">
						<select id="comunas" name="comunasel" required disabled>
							<option value="" disabled selected>Comuna</option>
							<option value="13101">Santiago</option><option value="13102">Cerrillos</option><option value="13103">Cerro Navia</option><option value="13104">Conchalí</option><option value="13105">El Bosque</option><option value="13106">Estación Central</option><option value="13107">Huechuraba</option><option value="13108">Independencia</option><option value="13109">La Cisterna</option><option value="13110">La Florida</option><option value="13111">La Granja</option><option value="13112">La Pintana</option><option value="13113">La Reina</option><option value="13114">Las Condes</option><option value="13115">Lo Barnechea</option><option value="13116">Lo Espejo</option><option value="13117">Lo Prado</option><option value="13118">Macul</option><option value="13119">Maipú</option><option value="13120">Ñuñoa</option><option value="13121">Pedro Aguirre Cerda</option><option value="13122">Peñalolén</option><option value="13123">Providencia</option><option value="13124">Pudahuel</option><option value="13125">Quilicura</option><option value="13126">Quinta Normal</option><option value="13127">Recoleta</option><option value="13128">Renca</option><option value="13129">San Joaquín</option><option value="13130">San Miguel</option><option value="13131">San Ramón</option><option value="13132">Vitacura</option><option value="13201">Puente Alto</option><option value="13202">Pirque</option><option value="13203">San José de Maipo</option><option value="13301">Colina</option><option value="13302">Lampa</option><option value="13303">Tiltil</option><option value="13401">San Bernardo</option><option value="13402">Buin</option><option value="13403">Calera de Tango</option><option value="13404">Paine</option><option value="13501">Melipilla</option><option value="13502">Alhué</option><option value="13503">Curacaví</option><option value="13504">María Pinto</option><option value="13505">San Pedro</option><option value="13601">Talagante</option><option value="13602">El Monte</option><option value="13603">Isla de Maipo</option><option value="13604">Padre Hurtado</option><option value="13605">Peñaflor</option>
						</select>
					</div>
					<div class="input-field col m12 s12">
						<a href="#actividad" class="btn btn-black btn-tab">Continuar</a>
					</div>
				</div>
			</div></div>
			<div id="actividad" class="col s12">
				<div class="row"><div class="col m8 s12">
					<div class="col m8 s6">
						¿Es usted la persona que aporta el ingreso principal del hogar?
					</div>
					<div class="input-field col m4 s6">
						<input type="radio" id="typeNY5" name="typeNY" class="check" value="si" required />
      					<label for="typeNY5" data-error="Seleccione respuesta" data-success="">Si</label>
      					<input type="radio" id="typeNY6" name="typeNY" class="check" value="no" required />
      					<label for="typeNY6">No</label>
					</div>					
					<!-- new preguntas -->
					<!-- SI -->
					<div class="input-field col m12 s12 chkSi">
						<select name="p3" required disabled>
						  	<option value="" disabled selected>¿Cuál es tu actividad principal?</option>
						  	<option value="1">Trabaja Remuneradamente</option>
							<option value="2">Estudiante</option>
							<option value="3">Dueña de Casa</option>
							<option value="4">Desempleado (buscando trabajo)</option>
							<option value="5">Retirado, Jubilado, Pensionado</option>
							<option value="6">Otro</option>
						</select>
					</div>
					<div class="input-field col m12 s12 chkSi">
						<select name="p5" required disabled>
						  	<option value="" disabled selected>¿Cuál es el tu nivel educacional?</option>
						  	<option value="1">Sin Educación</option>
							<option value="2">Básica incompleta</option>
							<option value="3">Básica completa</option>
							<option value="4">Media incompleta</option>
							<option value="5">Media completa</option>
							<option value="6">Técnica superior incompleta</option>
							<option value="7">Técnica superior completa</option>
							<option value="8">Universitaria incompleta (1 a 3 años de estudio)</option>
							<option value="9">Universitaria completa</option>
							<option value="10">Post grado, magister, doctorado</option>
						</select>
					</div>
					<div class="input-field col m12 s12 chkSi">
						<select name="p6" required disabled>
					  		<option value="" disabled selected>¿Cuál es tu trabajo u ocupación?</option>
					  		<option value="1">Trabajos menores, ocasionales, informales (lavado/aseo)</option>
							<option value="2">Oficio menor / obrero no calificado/ jornalero / servicio doméstico con contrato</option>
							<option value="3">Obrero calificado / capataz / microempresario (taxi, kiosco, comercio menor o ambulante)</option>
							<option value="4">Empleado administrativo medio y bajo / Técnico especializado / Profesor primario o secundario</option>
							<option value="5">Ejecutivo medio, gerente, subgerente de empresa mediana o pequeña / Profesional independiente</option>
							<option value="6">Alto ejecutivo, Gerente General, Director o empresario propietario de grandes empresas</option>
						</select>
					</div>
					<!-- NO -->	
					<div class="input-field col m12 s12 chkNo">
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
					<div class="input-field col m12 s12 chkNo">
						<select name="p4" required disabled>
						  	<option value="" disabled selected>¿Cuál es el nivel educacional del sostenedor del hogar?</option>
						  	<option value="1">Sin Educación</option>
							<option value="2">Básica incompleta</option>
							<option value="3">Básica completa</option>
							<option value="4">Media incompleta</option>
							<option value="5">Media completa</option>
							<option value="6">Técnica superior incompleta</option>
							<option value="7">Técnica superior completa</option>
							<option value="8">Universitaria incompleta (1 a 3 años de estudio)</option>
							<option value="9">Universitaria completa</option>
							<option value="10">Post grado, magister, doctorado</option>
						</select>
					</div>
					<div class="input-field col m12 s12 chkNo">
						<select name="p6" required disabled>
					  		<option value="" disabled selected>¿Cuál es el trabajo u ocupación del sostenedor del hogar?</option>
					  		<option value="1">Trabajos menores, ocasionales, informales (lavado/aseo)</option>
							<option value="2">Oficio menor / obrero no calificado/ jornalero / servicio doméstico con contrato</option>
							<option value="3">Obrero calificado / capataz / microempresario (taxi, kiosco, comercio menor o ambulante)</option>
							<option value="4">Empleado administrativo medio y bajo / Técnico especializado / Profesor primario o secundario</option>
							<option value="5">Ejecutivo medio, gerente, subgerente de empresa mediana o pequeña / Profesional independiente</option>
							<option value="6">Alto ejecutivo, Gerente General, Director o empresario propietario de grandes empresas</option>
						</select>
					</div>
					<!-- // -->
					<div class="col m12 hide-on-small-only">&nbsp;</div>
					<div class="input-field col m6 s12">
						<input id="pass" type="password" name="password" class="validate" required required="" aria-required="true">
						<label for="pass" data-error="Ingrese contraseña valida" data-success="">Contraseña</label>
					</div>
					<div class="input-field col m6 s12">
						<input id="re_pass" type="password" name="confirmapassword" class="validate" required required="" aria-required="true">
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
<?php get_footer(); ?> 