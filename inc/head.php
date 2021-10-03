<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<? include('inc/geral.php'); ?>
	<? include('inc/jquery.php'); ?>
	<?php
	
	$localhost = array('127.0.0.1', '::1');
	if(in_array($_SERVER['REMOTE_ADDR'], $localhost) || isset($_SESSION["include"])){
	echo "<script src='".$url."js/vendor/modernizr-2.6.2.min.js'></script>";
	echo "<script src='".$url."js/jquery.slicknav.js'></script>";
	echo "<link rel='stylesheet' type='text/css' href='css/normalize.css'>";
	echo "<link rel='stylesheet' type='text/css' href='css/style-base.css'>";
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
	echo "<link rel='stylesheet' type='text/css' href='css/fonts.css'>";
	echo "<link rel='stylesheet' type='text/css' href='css/font-awesome-local.css'>";
	}else{
	echo "<script>";
	include ($_SERVER['RAIZ']."js/vendor/modernizr-2.6.2.min.js");
	include ($_SERVER['RAIZ']."js/jquery.slicknav.js");
	echo "</script>";
	echo "<style>";
	include ($_SERVER['RAIZ']."css/fonts.css");
	include ($_SERVER['RAIZ']."css/normalize.css");
	include ($_SERVER['RAIZ']."css/style-base.css");
	include ($_SERVER['RAIZ']."css/style.css");
	include ($_SERVER['RAIZ']."css/font-awesome.css");
	echo "</style>";
	}
	?>
	
	<title><?=$title." - ".$nomeSite?></title>
	<base href="<?=$url?>">
	<?php
	$desc = strip_tags($desc);
	$desc = str_replace('  ', ' ', $desc);
	$desc = str_replace(' ,', ',', $desc);
	$desc = str_replace(' .', '.', $desc);
	if (mb_strlen($desc,"UTF-8") > 160) {
		$desc = mb_substr($desc, 0, 159);
		$finalSpace = strrpos($desc, " ");
		$desc = substr($desc, 0, $finalSpace);
		$desc .= ".";
	}else if (mb_strlen($desc,"UTF-8") < 140 && mb_strlen($desc,"UTF-8") > 130 ) {
		$desc .= "... Saiba mais.";
	}
	?>
	<meta name="description" content="<?=ucfirst($desc)?>">
	<meta name="keywords" content="<?=str_replace($prepos,', ', $h1).', '.$nomeSite?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="geo.position" content="<?=$latitude.";".$longitude?>">
	<meta name="geo.placename" content="<?=$cidade."-".$UF?>">
	<meta name="geo.region" content="<?=$UF?>-BR">
	<meta name="ICBM" content="<?=$latitude.";".$longitude?>">
	<meta name="robots" content="index,follow">
	<meta name="rating" content="General">
	<meta name="revisit-after" content="7 days">
	<link rel="canonical" href="<?=$url.$urlPagina?>">
	<?php
	if ( $author == '')
	{
		echo '<meta name="author" content="'.$nomeSite.'">';
	}
	else
	{
		echo '<link rel="author" href="'.$author.'">';
	}
	?>
	
	<link rel="shortcut icon" href="<?=$url?>imagens/favicon.png">
    <link rel="stylesheet" href="<?=$url?>js/sweetalert/css/sweetalert.css"/>
	<meta property="og:region" content="Brasil">
	<meta property="og:title" content="<?=$title." - ".$nomeSite?>">
	<meta property="og:type" content="article">
	<?php
	if (file_exists($url.$pasta.$urlPagina."-01.jpg")) {
	?>
	<meta property="og:image" content="<?=$url.$pasta.$urlPagina?>-01.jpg">
	<?php
	}
	?>
	<meta property="og:url" content="<?=$url.$urlPagina?>">
	<meta property="og:description" content="<?=$desc?>">
	<meta property="og:site_name" content="<?=$nomeSite?>">
	<!-- Desenvolvido por <?=$creditos." - ".$siteCreditos?> -->
	<?include('inc/header-scroll.php');?>