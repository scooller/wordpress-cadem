// Formulario
//--
function formInit(){
	if($('#nperfil').length){	
		$('.input-group input').keyup(function(){
			var label=$(this).parent('.input-group').find('label');
			if($(this).val()){
				label.hide();
			}else{
				label.show();
			}

		});	 
		$('.chkNo').hide();
		$('.chkSi').hide();
		$('input[name="typeNY"]').change(function(event){
			console.log($(this).val());
			if($(this).val()==1){
				$('.chkSi').show();
				$('.chkSi select').prop('disabled',false);
				$('.chkNo').hide();
				$('.chkNo select').prop('disabled',true);
			}else{
				$('.chkNo').show();
				$('.chkNo select').prop('disabled',false);
				$('.chkSi').hide();
				$('.chkSi select').prop('disabled',true);
			}
			$('select').material_select();
		});
		$('select[name="p1"]').change(function(event){
			var val=$(this).val();
			console.log($('select[name="p6"] option').eq(0));
			$('select[name="p6"]').material_select('destroy');
			if( val==1){
				$('select[name="p6"] option').eq(0).text('¿Cuál es tu trabajo u ocupación?');
			}else{
				$('select[name="p6"] option').eq(0).text('¿Cuál fue tu ultimo trabajo u ocupación?');
			}
			$('select[name="p6"]').material_select();
		});
		$('.comunas').hide();
		$('#region').change(function(event){
			console.log($(this).val())
			var val=$(this).val();
			$('.comunas select').material_select('destroy');
			if(val==13){
				$('.comunas').show();
				$('.comunas select').prop('disabled',false);			
			}else{
				$('.comunas').hide();
				$('.comunas select').prop('disabled',true);
			}
			$('.comunas select').material_select();
		});
		//--Initialization
		$('.tooltipped').tooltip({delay: 50});
		$('select').material_select();	
		$('.datepicker').pickadate({
			firstDay: true,
			selectMonths: true,
			selectYears: 60,
			min: new Date(1900,1,1),
			max: true,
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
			weekdaysShort: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
			today: 'Hoy',
			clear: 'Limpiar',
			close: 'Cerrar',
			labelMonthNext: 'Mes Siguiente',
			labelMonthPrev: 'Mes Anterior',
			labelMonthSelect: 'Seleccione Mes',
			labelYearSelect: 'Seleccione Año',
			formatSubmit: 'mm/dd/yyyy'
		});
		$('[data-slide]').click(function(event){
			event.preventDefault;
			var slide=$(this).data('slide');
			$('.carousel').carousel('set', slide-1);
			return false;
		});
		$('#btn-modifica').click(function(event){
			event.preventDefault;
			var form=$(this).parents('form');
			form.find('input').prop( "disabled", false );
			form.find('input').first().focus();
			return false;
		});		
		
		$("input#rut").rut({
			formatOn: 'keyup',
			minimumLength: 8,
			validateOn: 'change'
		});
		$("input#rut").rut().on('rutValido', function(e) {
			$(this).removeClass('valid');
			$(this).removeClass('invalid');
			$(this).addClass('valid');
		});
		$("input#rut").rut().on('rutInvalido', function(e) {
			$(this).removeClass('valid');
			$(this).removeClass('invalid');
			$(this).addClass('invalid');
		});
		//FORM
		
		$('#nperfil').ajaxForm({
			type: 'post',
			beforeSubmit:function (formData, jqForm, options){//Validador
				var $input='';
				var $return=true;
				var $extras='';
				for (var i=0; i < formData.length; i++) {
					$input=$('[name="'+formData[i].name+'"]');//transformar a Jquery
					//console.log($input);
					if($input.attr("required")){
						//console.log($input);
						console.log('val:'+$input.val());
						//--
						$input.removeClass('invalid');//quitar error
						if ($input.val()==='') { 
							$input.addClass('invalid');//agregar error
							$return=false; 
						}else if($input.attr('type')=='email'){
							if(!isEmail($input.val())){
								$extras+=', Ingrese Email Valido';
								$input.addClass('invalid');
								$return=false; 
							}
						}else if($input.attr('name')=='password'){//comparar contraseñas
							if($input.val()!==$('input[name="confirmapassword"]').val()){
								$input.addClass('invalid');
								$extras+=', Contraseña no corresponde';
								$('input[name="confirmapassword"]').addClass('invalid');
								$return=false; 
							}
						}
					}
				}
				if(!$return){
					Materialize.toast('Favor ingresar los datos correspondientes'+$extras);
					$('ul.tabs').tabs('select_tab', 'datos');
				}
				return $return;
			},
			success:function(responseText, statusText, xhr, $form)  {
				console.log(responseText);
				if(responseText=='Exito'){
					$('.tabs.special').hide();
					$('#nperfil').hide();
					$('.msj-final').show();	
					if($encuestaID !== ''){
						window.location.href = '/cadempanel/app/public/receive/rut/'+$url64+'/surveyid/'+$encuestaID;
						//$('#encuestaDestacada').submit();
						$encuestaID='';
					}
				}else{
					if(responseText==0){
						responseText='Ajax Error';
					}
					Materialize.toast(responseText, 4000);
				}
			}
		});
		//--
		$('.custom-radio input:radio').change(function(){
			console.log($(this).val());
			var parent=$(this).parents('.custom-radio');	
			parent.find('label.active').removeClass('active');
			$(this).parent('label').addClass('active');
		});
	}
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}