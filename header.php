<?php
// CACHE CONTROL
/*
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
*/
/*
header('Accept-Ranges: bytes');
$ExpStr = 'Expires: '.gmdate("D, d M Y H:i:s", time() + 14400) . " GMT"; // 14400 = 4 horas
header($ExpStr);
header("Cache-Control: maxage=14400");
header("Cache-Control: public, must-revalidate");
header("Cache-Control: public");
header("pragma: public");
header("Content-Transfer-Encoding:gzip;q=1.0,identity;q=0.5,*;q=0");
header("Cache-Control: cache");
header("Pragma: cache");
header('Content-Type: text/html; charset=iso-8859-1');*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php bloginfo(); ?></title>
    
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="googlebot" content="index" />
    <meta name="google" content="nositelinkssearchbox" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="" />
    <meta name="msvalidate.01" content="" />
    <meta property="og:title" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/fb-share.jpg"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php bloginfo('url'); ?>"/>
    <meta name="keywords" lang="es" content=""/>
         

    <!--<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_url'); ?>/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/favicon/favicon-16x16.png">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon/favicon.ico" type="image/x-icon">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/favicon/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.3/jquery.fullpage.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fontello/css/fontello.css">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?<?php echo rand(); ?>">
    <script type="text/javascript">
		var $blogurl= '<?php bloginfo('url'); ?>';
		var $ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
</head>

<body <?php body_class(); ?>>
<?php 
if(is_home()){
	get_template_part( 'nav', 'header' );
}
?>