<?php
$nomeSite			= 'Hiper Clean';
$slogan				= 'Limpeza pós Obra';
$url 				='https://www.hipercleanposobra.com.br/';
$auto_desc = $h1 . ' - Limpeza pós Obra em SPA HIPER CLEAN | Limpeza pós Obra em SP entende que quando vende serviços em limpeza pós-obra, está participando ativamente de um sonho de nossos clientes ';
$ddd				= '11';
$ddd2			= '13';
$fone[0] 			= array($ddd,'94854-9780','whatsapp');
$fone[1] 			= array($ddd2,'98851-6171','phone');
// $fone[2] 		= array($ddd,'3333-3333','whatsapp');
// $fone[3]	 		= array($ddd,'4444-4444','phone');
// $fone[4] 		= array($ddd,'4444-4444','phone');
$whatsapp		= '1194854-9780';
$emailContato		= 'contato@hipercleanposobra.com.br';
$rua				= 'Rua João Fernandes Camisa Nova Júnior 854 ';
$bairro				= 'Jardim São Luís';
$cidade				= 'São Paulo';
$UF					= 'SP';
$cep				= 'CEP: 05844-000';
$latitude			= '-24.160488';
$longitude			= '-46.7529923';
$mapa				= '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14618.160093755778!2d-46.74152004531246!3d-23.6566385358991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce517bdefd64f9%3A0x9679cf297960140a!2sR.%20Jo%C3%A3o%20Fernandes%20Camisa%20Nova%20J%C3%BAnior%2C%20854%20-%20Jardim%20S%C3%A3o%20Lu%C3%ADs%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005844-000!5e0!3m2!1spt-BR!2sbr!4v1589648989361!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
// ENDERECO 2

$rua2				= 'Rua Padre Afonso Maria Ratisbone, 4882 ';
$bairro2				= 'Suarão';
$cidade2				= 'Itanhaém';
$UF2					= 'SP';
$cep2				= 'CEP: 11740-000';
$latitude2			= '-24.160488';
$longitude2			= '-46.7529923';
$mapa2				= '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14618.160097768085!2d-46.74152!3d-23.6566385!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce517bdefd64f9%3A0x9679cf297960140a!2sR.%20Jo%C3%A3o%20Fernandes%20Camisa%20Nova%20J%C3%BAnior%2C%20854%20-%20Jardim%20S%C3%A3o%20Lu%C3%ADs%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2005844-000!5e0!3m2!1spt-BR!2sbr!4v1589649427839!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';


$idAnalytics		= 'UA-166881859-1';
$senhaEmailEnvia	= '--'; // colocar senha do e-mail mkt@dominiodocliente.com.br
$explode			= explode("/", $_SERVER['PHP_SELF']);
$urlPagina 			= end($explode);
$urlPagina	 		= str_replace('.php','',$urlPagina);
$urlPagina 			== "index"? $urlPagina= "" : "";
$urlAnalytics = str_replace("https://www.", '', $url);
$urlAnalytics = str_replace("/", '', $urlAnalytics);
//reCaptcha do Google
$siteKey = '6LezgvgUAAAAAO9rEU7oKe-Ut4oO8NAdHVyoLAkU';
$secretKey = '6LezgvgUAAAAADVpagevf0aCJDvWMm9PVaGnhDUo';
//********************COM SIG APAGAR********************
$getURL = trim(strip_tags(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
$urlPagina = explode("/", $getURL);
$ContPag = sizeof($urlPagina);
$urlPagina = $urlPagina[0];
$urlPagina == "index" ? $urlPagina = "" : "";
//********************FIM SIG APAGAR********************

//Pasta de imagens, Galeria, url Facebook, etc.
$pasta 				= 'imagens/informacoes/';
$author = ''; // Link do perfil da empresa no g+ ou deixar em branco

//Redes sociais
 $paginaFacebook		= 'Hiper-Clean-Limpeza-P%C3%B3s-Obra-726900190732414/';
$urlInstagram		= 'https://www.instagram.com/hipercleanposobra/?hl=pt-br';
// $urlYouTube			= 'URL_COMPLETA_YOUTUBE';
// $urlLinkedIn			= 'URL_COMPLETA_LINKEDIN';
 // $urlTwitter			= 'https://twitter.com/FK_Consultoria';

//Breadcrumbs
$caminho 			= '
<div id="breadcrumb" itemscope itemtype="https://data-vocabulary.org/Breadcrumb" >
	<a rel="home" itemprop="url" href="'.$url.'" title="Home"><span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a> »
	<strong><span class="page" itemprop="title" >'.$h1.'</span></strong>
</div>
';
$caminho2	= '
<div id="breadcrumb" itemscope itemtype="https://data-vocabulary.org/Breadcrumb" >
	<a rel="home" href="'.$url.'" title="Home" itemprop="url"><span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a> »
	<div itemprop="child" itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
		<a href="'.$url.'informacoes" title="Informações" class="category" itemprop="url"><span itemprop="title"> Informações </span></a> »
		<div itemprop="child" itemscope itemtype="https://data-vocabulary.org/Breadcrubm">
			<strong><span class="page" itemprop="title" >'.$h1.'</span></strong>
		</div>
	</div>
</div>
';


$prepos = array(' a ',' á ',' à ',' ante ',' até ',' após ',' de ',' desde ',' em ',' entre ',' com ',' para ',' por ',' perante ',' sem ',' sob ',' sobre ',' na ',' no ',' e ',' do ',' da ',' ','(',')','\'','"','.','/',':',' | ', ',, ');
$creditos			= 'LGF';
$siteCreditos		= 'www.satisfacaojhonymc.com.br';
$caminhoBread 			= '
<div class="title-breadcrumb">
	<div class="wrapper">
		<div id="breadcrumb" itemscope itemtype="https://data-vocabulary.org/Breadcrumb" >
			<a rel="home" itemprop="url" href="'.$url.'" title="Home"><span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a> »
			<strong><span class="page" itemprop="title" >'.$h1.'</span></strong>
		</div>
		<h1>'.$h1.'</h1>
	</div>
</div>
';
$caminhoBreadServicos	= '
<div class="title-breadcrumb">
	<div class="wrapper">
		<div id="breadcrumb" itemscope itemtype="https://data-vocabulary.org/Breadcrumb" >
			<a rel="home" href="'.$url.'" title="Home" itemprop="url"><span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a> »
			<div itemprop="child" itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
				<a href="'.$url.'servicos" title="Serviços" class="category" itemprop="url"><span itemprop="title"> Serviços </span></a> »
				<div itemprop="child" itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
					<strong><span class="page" itemprop="title" >'.$h1.'</span></strong>
				</div>
			</div>
		</div>
		<h1>'.$h1.'</h1>
	</div>
</div>
';




$caminhoBread2	= '
<div class="title-breadcrumb">
	<div class="wrapper">
		<div id="breadcrumb" itemscope itemtype="https://data-vocabulary.org/Breadcrumb" >
			<a rel="home" href="'.$url.'" title="Home" itemprop="url"><span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a> »
			<div itemprop="child" itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
				<a href="'.$url.'informacoes" title="Informações" class="category" itemprop="url"><span itemprop="title"> Informações </span></a> »
				<div itemprop="child" itemscope itemtype="https://data-vocabulary.org/Breadcrumb">
					<strong><span class="page" itemprop="title" >'.$h1.'</span></strong>
				</div>
			</div>
		</div>
		<h1>'.$h1.'</h1>
	</div>
</div>
';




?>

