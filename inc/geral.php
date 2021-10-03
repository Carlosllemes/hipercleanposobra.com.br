<?
$dir = $_SERVER['SCRIPT_NAME']; 
$dir = pathinfo($dir);
$host = $_SERVER['HTTP_HOST'];
$http = $_SERVER['REQUEST_SCHEME'];
if ($dir["dirname"] == "/") {
	$url = $http."://".$host."/"; 
}else {
	$url = $http."://".$host.$dir["dirname"]."/"; 
}

$nomeSite			= 'Hiper Clean';
$slogan				= 'Limpeza pós Obra';
// $url				= 'http://localhost/www.testecarlos.com.br/';
// $url				= 'http://mpitemporario.com.br/projetos/www.testecarlos.com.br/';
$ddd				= '11';
// $ddd2			= '19';
$fone[0] 			= array($ddd,'1111-1111','phone');
$fone[1] 			= array($ddd,'2222-2222','whatsapp');
// $fone[2] 		= array($ddd,'3333-3333','whatsapp');
// $fone[3]	 		= array($ddd,'4444-4444','phone');
// $fone[4] 		= array($ddd,'4444-4444','phone');
//$whatsapp 		= $ddd.'11111-2222';
$emailContato		= 'carlos.lemes@doutoresdaweb.com.br';
$rua				= 'Rua João Fernandes Camisa Nova Júnior 854';
$bairro				= 'Jardim São Luís';
$cidade				= 'São Paulo';
$UF					= 'SP';
$cep				= 'CEP: 04552-060';
$latitude			= '-22.546052';
$longitude			= '-48.635514';
$mapa				= 'IFRAME_MAPA';
$idCliente			= 'ID_do_cliente_no_mpi_sistema';
$idAnalytics		= 'ID_do_Google_Analytics';
$senhaEmailEnvia	= '102030'; // colocar senha do e-mail mkt@dominiodocliente.com.br
$explode			= explode("/", $_SERVER['REQUEST_URI']);
$urlPagina 			= end($explode);
$urlPagina	 		= str_replace('.php','',$urlPagina);
$urlPagina 			== "index"? $urlPagina= "" : "";
$urlAnalytics = str_replace("http://www.", '', $url);
$urlAnalytics = str_replace("/", '', $urlAnalytics);
//reCaptcha do Google
$siteKey = '6Lfc7g8UAAAAAHlnefz4zF82BexhvMJxhzifPirv';
$secretKey = '6Lfc7g8UAAAAAKi8al32HjrmsdwoFoG7eujNOwBI';
//********************COM SIG APAGAR********************
//Gerar htaccess automático
$urlhtaccess = $url;
$schemaReplace = strpos($urlhtaccess, 'http://www.') === false ? 'http://' : 'http://www.';
$urlhtaccess = str_replace($schemaReplace, '', $urlhtaccess);
$urlhtaccess = rtrim($urlhtaccess,'/');
define('RAIZ', $url);
define('HTACCESS', $urlhtaccess);
include('inc/gerador-htaccess.php');
//********************FIM SIG APAGAR********************

// MENU

// Menu items (link, text, hasSubmenu, NULL [FontAwesome - ex: building])

$sigMenuPosition = false; //INSIRA A POSIÇÃO DO MENU DO SIG EM RELAÇÃO AOS DEMAIS ITENS (EX.: $sigMenuPosition = 3;)

// CASO MENU BRASMODULOS
// INSIRA OS ÍCONES NA ORDEM EM QUE OS ITENS DO SIG SÃO ADICIONADOS (EX.: ['home', 'cog', 'info'];)
// Exemplo: $sigMenuIcons = ['home', 'cog', 'wrench'];
$sigMenuIcons = [];
// FIM CASO MENU BRASMODULOS

$menu[0] = array('','Página Inicial', false, NULL);
 $menu[1] = array('sobre-nos','Sobre Nós', false, NULL);
 $menu[2] = array('servicos','Serviços', 'sub-menu', NULL);
 $menu[3] = array('clientes','Clientes', false, NULL);
 $menu[4] = array('antes-depois','Antes e Depois', false, NULL);
 $menu[4] = array('contato','Contato', false, NULL);
 // END MENU

//Pasta de imagens, Galeria, url Facebook, etc.
$pasta 				= 'imagens/informacoes/';
$author = ''; // Link do perfil da empresa no g+ ou deixar em branco

//Redes sociais
$paginaFacebook		= 'PAGINA_DO_FACEBOOK_DO_CLIENTE';
$urlInstagram		= 'URL_COMPLETA_INTAGRAM';
$urlYouTube			= 'URL_COMPLETA_YOUTUBE';
$urlLinkedIn		= 'URL_COMPLETA_LINKEDIN';
$urlTwitter			= 'URL_COMPLETA_TWITTER';

//Breadcrumbs
$caminho            = '
<div class="breadcrumb__container">
                <div class="wrapper">
                <div class="breadcrumb__row">
                <div id="breadcrumb">
                <div class="breadcrumb__column" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
                <a rel="home" itemprop="url" href="'.$url.'" title="Home">
                <span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home </span>
                </a>
                </div>
                <div class="breadcrumb__column" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
                <span itemprop="title">'.$h1.'</span>
                </div>
                </div>
                <h1>'.$h1.'</h1>
                </div>
                </div>
                </div>
';

// mpi breadcrumb
$caminho2            = '
<div class="breadcrumb__container">
                <div class="wrapper">
                <div class="breadcrumb__row">
                <div id="breadcrumb">
                <div class="breadcrumb__column" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
                <a rel="home" itemprop="url" href="'.$url.'" title="Home">
                <span itemprop="title"><i class="fa fa-home" aria-hidden="true"></i> Home </span>
                </a>
                </div>
                <div class="breadcrumb__column" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
                <a rel="home" itemprop="url" href="'.$url.'servicos" title="Serviços">
                <span itemprop="title">Serviços</span>
                </a>
                </div>
                <div class="breadcrumb__column" itemscope itemtype="http://data-vocabulary.org/Breadcrumb" >
                <span itemprop="title">'.$h1.'</span>
                </div>
                </div>
                <h1>'.$h1.'</h1>
                </div>
                </div>
                </div>
';
// end mpi breadcrumb

$prepos = array(' a ',' á ',' à ',' ante ',' até ',' após ',' de ',' desde ',' em ',' entre ',' com ',' para ',' por ',' perante ',' sem ',' sob ',' sobre ',' na ',' no ',' e ',' do ',' da ',' ','(',')','\'','"','.','/',':',' | ', ',, ');
$creditos			= 'Doutores da Web - Marketing Digital';
$siteCreditos		= 'www.doutoresdaweb.com.br';

$isMobile =  preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
?>
