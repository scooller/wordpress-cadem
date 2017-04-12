<ul class="side-nav" id="mobile-demo">
	<li><a href="<?php bloginfo('url'); ?>" target="_top" class="brand-logo"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem.svg" class=""></a></li>
<?php
	$menu_mobile=wp_get_nav_menu_items('mobile'); 
	foreach($menu_mobile as $item):
		$clases=$item->classes;
?>
	<li><a href="<?php echo $item->url; ?>" target="_top" class="<?php echo implode(' ',$clases) ?>"><?php echo $item->title; ?></a></li>
<?php endforeach; ?>
	<?php wp_nav_menu( array('theme_location' => 'general', 'container' => '', 'items_wrap' => '<ol id="%1$s" class="%2$s">%3$s</ol>', 'menu_class' => '' )); ?>
</ul> 
<!-- // -->
<div class="sidebar valign-wrapper hide-on-med-and-down">
	<a href="#modalvideo" class="modal-trigger btn-video">VIDEO</a>
	<?php wp_nav_menu( array('theme_location' => 'general', 'container' => '', 'items_wrap' => '<ol id="%1$s" class="%2$s">%3$s</ol>', 'menu_class' => 'valign' )); ?>
</div>
<div class="navbar-fixed">
<nav class="white">
	<div class="nav-wrapper">
		<a href="<?php bloginfo('url'); ?>" target="_top" class="brand-logo"><img src="<?php bloginfo('template_url'); ?>/img/logo-cadem.svg" class=""></a>
		<a href="#" data-activates="mobile-demo" class="button-collapse right black-text"><i class="material-icons icon-menu small"></i></a>
		<ul id="nav-mobile" class="hide-on-med-and-down right">
		<?php
			$menu_mobile=wp_get_nav_menu_items('mobile'); 
			foreach($menu_mobile as $item):
				$clases=$item->classes;
		?>
			<li><a href="<?php echo $item->url; ?>" target="_top" class="<?php echo implode(' ',$clases) ?>"><?php echo $item->title; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>	
</nav>
</div>  