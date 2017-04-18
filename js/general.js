// JavaScript Document
var $isMobile=false;
var $isIphone=false;
var $url64='';
var $encuestaID='';
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	$isMobile=true;
}
if( /iPhone|iPad|iPod/i.test(navigator.userAgent) ) {
	$isIphone=true;
}
var $fullPage;
var scrollSelect;
var $lastPage=0;
var $hover=true;
var $loader='<div class="valign-wrapper center-align" style="height: 100%;"><div class="valign" style="margin: 0 auto;"><div class="preloader-wrapper big active"> <div class="spinner-layer spinner-blue"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> <div class="spinner-layer spinner-red"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> <div class="spinner-layer spinner-yellow"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> <div class="spinner-layer spinner-green"> <div class="circle-clipper left"> <div class="circle"></div> </div><div class="gap-patch"> <div class="circle"></div> </div><div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div></div></div>';
var fpoptions={
	//Navigation
	navigation: false,
	autoScrolling: true,
	fitToSection: true,
	scrollBar: false,
	paddingTop: '0px',
	scrollingSpeed: 950,			
	//Custom selectors
	sectionSelector: '.section',
	slideSelector: '.slide',
/*
	dragAndMove: 'false',
	dragAndMoveKey: 'ZGVzYXJyb2xsb2plbGx5LmNvbV85UWhjMk55YjJ4c1QzWmxjbVpzYjNkU1pYTmxkQT09eGJJ',

	scrollOverflow: true,
	scrollOverflowReset: true,
	scrollOverflowResetKey: 'ZGVzYXJyb2xsb2plbGx5LmNvbV85UWhjMk55YjJ4c1QzWmxjbVpzYjNkU1pYTmxkQT09eGJJ',
*/
	responsiveWidth: 600,
	lazyLoading: false,
	easingcss3:'cubic-bezier(.63,.35,.41,1)',

	//events
	onLeave: function(index, nextIndex, direction){
		$('.sidebar li.active').removeClass('active');
		$('.sidebar li').eq(nextIndex-1).addClass('active');
		$('#mobile-demo ol li.active').removeClass('active');
		$('#mobile-demo ol li').eq(nextIndex-1).addClass('active');

		$.each($('section.color-'+index).find('[data-anim]'),function(index,val){
			$seccion=$(this);
			$anim=$seccion.data('anim');
			$seccion.removeClass('animated '+$anim);
			$anim=$anim.replace(/In/i, "Out");
			$seccion.addClass('animated '+$anim);
		});

	},
	afterLoad: function(anchorLink, index){
		$hover=true;
		$.each($('section.color-'+index).find('[data-anim]'),function(index,val){
			$seccion=$(this);
			$anim=$seccion.data('anim');
			$anim=$anim.replace(/In/i, "Out");	
			$seccion.removeClass('animated '+$anim);							
			$seccion.addClass('animated '+$seccion.data('anim'));
		});
		reSize(index);
	}
}
//--
$(function() {	
	if($(".sidebar > ol > li").length){
		$lastPage=$(".sidebar > ol > li").last().find('a').attr('href').replace('#','');
		//hover
		$( window ).mousemove(function( event ) {
			var XX=event.pageX;
			var wH=$(window).width();
			if(!$isMobile){
				if($hover){
					resta=wH/3;
					if(XX>(wH-resta)){
						$('.sidebar').addClass("hovered");
					}else{
						$('.sidebar').removeClass("hovered");					
					}
				}
				if(XX<(wH-resta)){
					$hover=true;
				}
			}
		});
	}
	$('[data-anim]').css('opacity',0);
	if($('#fullpage').length){		
		/*if($isMobile){
			fpoptions['fixedElements']='.navbar-fixed';
		}*/
		if(!$isIphone){
			$fullPage=$('#fullpage').fullpage(fpoptions);	
		}else{
			$('main').css('overflow','hidden');
			$('.page-footer').css('position','static');
			$.each($('section').find('[data-anim]'),function(index,val){
				$seccion=$(this);
				$anim=$seccion.data('anim');
				$anim=$anim.replace(/In/i, "Out");	
				$seccion.removeClass('animated '+$anim);							
				$seccion.addClass('animated '+$seccion.data('anim'));
			});
		}
	}
	reSize();
	if($isIphone){
		$.each($('.nav-click a'),function(index,val){
			var num=$(this).attr('href').replace('#','');
			$(this).attr('href','#section-'+num);
		});
		$.each($('a.nav-click'),function(index,val){
			var num=$(this).attr('href').replace('#','');
			$(this).attr('href','#section-'+num);
		});
	}
	$('a.nav-click').click(function(event){
		$('.sidebar ol > li.active,.side-nav ol > li.active').removeClass('active');
		$(this).parent('li').addClass('active');
		if(!$isIphone){
			event.preventDefault;
			var num=$(this).attr('href').replace('#','');			
			$.fn.fullpage.moveTo(num);
			return false;
		}
	});
	$('a.new-click').click(function(event){		
		console.log('CLICK');		
		if(!$isIphone){
			event.preventDefault;			
		}
		loadRegister();
		return false;
	});	
	$('select.select-jump').change(function(){
		var content=$(this).parents('section');
		var num=$(this).val();
		var title=$(this).find('option:selected').text();
		/*console.log($preguntas);
		console.log(num);
		console.log($preguntas[num]);*/
		content.find('.grande .title').empty().html(title);
		content.find('.grande p').empty().html($preguntas[num]);
	});
	$('.input-group input').keyup(function(){
		var label=$(this).parent('.input-group').find('label');
		if($(this).val()){
			label.hide();
		}else{
			label.show();
		}
		
	});
	$('ul.collection,.left-align,.grande').mousemove(function(){
		$hover=false;
		$('.sidebar').removeClass("hovered");
	}).mouseleave(function(){
		$hover=true;
	});
	$('.btn-share').click(function(event){
		event.preventDefault;
		$(this).hide();
		$('.color-5 .share').show();
		return false;
	});
	//cargar	
	$('a.btn-page').click(function(event){
		event.preventDefault;
		$(this).prop( "disabled", true );
		$url=$(this).attr('href');
		$section=$(this).data('section');
		$class=$(this).data('class');
		carga_page($(this),$url+' section > main',$($section),$class);
		return false;
	});
	$("section").click(function(event){
		$hover=!$hover;
		$('.sidebar').removeClass("hovered");
	});	
	$('#select-ganadores').change(function(){
		$("body").css("cursor", "progress");
		$("ul.collection").css("cursor", "progress");
		$('ul.collection').empty();
		var val=$(this).val();
		var jqxhr = $.ajax( {
			type : 'post',
			url: $ajaxurl,
			dataType: 'html',
			data: {action:'get_concursantes',p:val}
		}).done(function(response) {
			$('ul.collection').html(response);
			$("body").css("cursor", "default");
			$("ul.collection").css("cursor", "default");
		}).fail(function() {
			Materialize.toast('Error carga ganadores', 4000);
		});
	});
	$('#searchwin').submit(function(){
		$("body").css("cursor", "progress");
		$("ul.collection").css("cursor", "progress");
		$('ul.collection').empty();
		var val=$(this).find('input[type="search"]').val();
		var jqxhr = $.ajax( {
			type : 'post',
			url: $ajaxurl,
			dataType: 'html',
			data: {action:'get_concursantes',s:val}
		}).done(function(response) {
			$('ul.collection').html(response);
			$("body").css("cursor", "default");
			$("ul.collection").css("cursor", "default");
		}).fail(function() {
			Materialize.toast('Error carga ganadores', 4000);
		});
		return false;
    });
	$( ".svg" ).inlineSVG();
	//funciones de inicializacion para llamarlas por ajax
	init();
	if($isIphone){
		//$('body').css('display','block');
		//$('.section').css('display','block');
	}
});
$(window).load(function() {
	//formulario
	setTimeout(function(){
		$('#nf-form-1-cont #nf-field-1-wrap .nf-field-element').prepend('<i class="material-icons prefix left icon-usuario small" aria-hidden="true"></i>');
		$('#nf-form-1-cont #nf-field-2-wrap .nf-field-element').prepend('<i class="material-icons prefix left icon-mail small" aria-hidden="true"></i>');
		$('#nf-form-1-cont #nf-field-3-wrap .nf-field-element').prepend('<i class="material-icons prefix left icon-paper-plane-empty small" aria-hidden="true"></i>');
		console.log('carga');
	},1500);
});
$( window ).resize(function() {
	reSize();
})
function reSize(index){
	//console.log('reSize');
	var $hash = index;
	var $ancho=$(window).width()/3;
	var $menuH=$('.navbar-fixed nav').height();
	var $footerH=$('footer').height();
	var $menuIH=$('.navbar-fixed nav').innerHeight();
	var $footerIH=$('footer').innerHeight();
	//$hash = $hash.replace('#','');
	//--
	if($hash==($lastPage)){
		$('.sidebar').height($(window).height()-($menuH+$footerIH));
	}else{
		$('.sidebar').height($(window).height()-$menuH);		
	}
	$('.sidebar').css({'top':$menuIH});
	var $lastSection=$('body .section').last();	
	//--
	var $lastH=$(window).height()-($menuH+$footerIH);
	$lastSection.find('.fp-tableCell').height($lastH);
	$lastSection.find('.fp-tableCell > main').height($lastH+16);
	//
	$('.color-6 .fp-tableCell > .row > .col').height($('.color-6 .fp-tableCell > .row').height());
}
function init(){
	//--Initialization
	$('ul.tabs').tabs({
		onShow:function(current){
			//console.log(current);
			$color=$(current).data('color');
			$img=$(current).data('img');
			/*console.log($color);
			console.log($img);*/
			$('.color-2').css({backgroundImage:'url(' + $img + ')',backgroundColor:$color})
			//$('.color-2').css({backgroundImage:'none',backgroundColor:$color})
		}
	});
	$('.modal').modal();
	$('.tooltipped').tooltip({delay: 50});
	$('select').material_select();
	$(".button-collapse").sideNav({
		menuWidth: 300, // Default is 300
		edge: 'right', // Choose the horizontal origin
		closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		draggable: true // Choose whether you can drag to open on touch screens
    });
	
	/*
	
	Cargar encuesta destacada
	
	*/
	
	
	$('#encuestaDestacada').submit(function( event ) {
		event.preventDefault();
		var rutString = $(this).find('#rut2').val();
		var $btn = $(this);
		rutString = rutString.replace(/\./g, '');
		rutString = rutString.replace(/\-/g, '');
		$url64 = btoa(rutString);
		var $url = $btn.attr('action')+'/redirect/rut/'+$url64;
		$btn.find('[type="submit"]').prop( "disabled", true );
		console.log($url);
		var jqxhr = $.ajax( {
			type : 'get',
			url: $url,
			dataType: 'json'
		}).done(function(resp) {
			$btn.find('[type="submit"]').prop( "disabled", false );
			console.log(resp);
			if(resp.response){
				console.log('reEnviar');				
				var url = resp.url;
				url = url.replace(/\\/g, '');
				window.location.href = url;		
			}else{
				console.log('crear');
				$encuestaID=btoa(resp.surveyid);
				$('#modalencuesta').modal('close');
				Materialize.toast('Debes registrarte', 4000);
				loadRegister();
			}
		}).fail(function() {
			console.log('error');
			Materialize.toast('Error cargar encuesta', 4000);
		});
		return false;
	})
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
	$('i.circle').parent('.btn').css({paddingLeft:43});
	$('i.circle').parent('.btn-large').css({paddingLeft:43});	
	$('.btn-tab').click(function(event){
		event.preventDefault;
		$id=$(this).attr('href').replace('#', '');
		$('ul.tabs').tabs('select_tab', $id);
		return false;
	})
	$("input#rut2").rut({
		formatOn: 'keyup',
		minimumLength: 8,
		validateOn: 'change'
	});
	$("input#rut2").rut().on('rutValido', function(e) {
		$(this).removeClass('valid');
		$(this).removeClass('invalid');
		$(this).addClass('valid');
	});
	$("input#rut2").rut().on('rutInvalido', function(e) {
		$(this).removeClass('valid');
		$(this).removeClass('invalid');
		$(this).addClass('invalid');
	});
	//
	if(!$isMobile){
		$scrollSelect = window.setInterval(selectScroll, 800);
		function selectScroll(){
			if($('.select-wrapper ul.dropdown-content.active').length>0){
				console.log('active select');
				window.clearInterval($scrollSelect);
				$.fn.fullpage.setAllowScrolling(false);
			}		
		}	
		$('.black-select').change(function(){
			console.log('change select');
			$scrollSelect = window.setInterval(selectScroll, 800);
			$.fn.fullpage.setAllowScrolling(true);
		});
	}
	autocompleteInit();
	formInit();
}
function loadRegister(){
	if(!$isIphone){
		$.fn.fullpage.moveTo(1);
	}
	carga_page(false,$blogurl+'/new-perfil/ section > main',$('section.color-1'), 'new-perfil');
}
/*
Carga...
*/
function carga_page($btn,$url,$dom, $class){
	console.log('cargando...');
	$dom.empty().html($loader);
	$("body").css("cursor", "progress");
	$dom.load( $url, function( response, status, xhr ) {
		//console.log(response);
		init();
		$("body").css("cursor", "default");
		$dom.addClass($class);
		if($btn){
			$btn.prop( "disabled", false );
		}
		$('.carousel.carousel-slider').carousel({fullWidth: true});
	});
}