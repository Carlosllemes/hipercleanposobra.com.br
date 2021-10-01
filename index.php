<?php
$h1         = 'Home';
$title      = 'Home';
$desc       = 'Home';
$key        = 'uuuuuuuuuu, jjjjjjjjjjjj, lllllllllll';
$var        = 'Home';
include('inc/head.php');
include('inc/fancy.php');
?>
</head>
<body>

<style>
<?php
		include('css/owl.carousel.css');
		include('css/owl.theme.css');
?>
</style>
<script>
<?php
		include('js/owl.carousel.js');
		include('js/slide-carousel.js');
?>
</script>


<?php include('inc/topo.php'); ?>
<?php include('inc/fancy.php'); ?>
<main>
	<div class="content">
		<section>
			<div class="wrapper">
				<div class="col-6">
					<img src="<?=$url?>imagens/banner-1-limpeza-pos-obra-em-sp.png" alt="<?=$h1?>" title="<?=$h1?>">
				</div>
				<div class="col-6">
					<iframe style="width:100%; height:400px; border-radius:10px;" src="https://www.youtube.com/embed/vNfPykQl_ko" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<div class="clear"></div>
				<hr>
				<br><br>
				<div class="empresa-index">
					<h1><?=$nomeSite." - ".$slogan?></h1>
					<p>Consiste num minucioso trabalho de eliminação de sujeiras, respingos e manchas de tinta e excesso de rejuntes deixados durante a obra. <br>
						É muito comum construtora, arquitetos e mesmo particulares, enfrentarem o problema da sujeira ao final da obra. <br>
						Para arquitetos, engenheiros e construtoras, entregar ao seu cliente um projeto lindo, porém sujo, é desmerecer o seu próprio trabalho.
					Para o cliente final que aguardou meses a construção ou reforma do seu imóvel, estressar-se com a limpeza ou correr o risco...</p>
					<p><a class="btn" href="<?=$url?>empresa" title="Empresa de limpeza pos obra">Saiba mais <?=$slogan?></a></p>
				</div>
				<div class="servios-index">
					<h2 class="txtcenter">Conheça nossos serviços</h2>
					<div class="col-4">
						<div class="col-12 card">
							<h2>Limpeza pré Mudança</h2>
							<a href="<?=$url?>imagens/servicos/empresa-limpeza-pos-obra-em-sp-01.jpg" class="lightbox" title="escrever_aqui">
							<img src="<?=$url?>imagens/servicos/empresa-limpeza-pos-obra-em-sp-01.jpg" alt="<?=$h1?>" title="<?=$h1?>"></a>
							<p>Hiper Clean sempre visando melhorias na prestação de serviços aos clientes se preocupando com o meio ambiente e a sustentabilidade efetua</p>
						</div>
					</div>
					<div class="col-4">
						<div class="col-12 card">
							<h2>Limpeza de Fachadas</h2>
							<a href="<?=$url?>imagens/servicos/empresa-limpeza-pos-obra-em-sp-02.jpg" class="lightbox" title="escrever_aqui">
							<img src="<?=$url?>imagens/servicos/empresa-limpeza-pos-obra-em-sp-02.jpg" alt="<?=$h1?>" title="<?=$h1?>"></a>
							<p class="txtcenter">Lavagem e limpeza de fachada, vidros e letreiros, dando vida e cara nova estabelecimento, uso de lavadora de alta pressão na limpeza.</p>
						</div>
					</div>
					<div class="col-4">
						<div class="col-12 card">
							<h2>Limpeza de Carpetes</h2>
							<a href="<?=$url?>imagens/servicos/empresa-limpeza-pos-obra-em-sp-03.jpg" class="lightbox" title="escrever_aqui">
							<img src="<?=$url?>imagens/servicos/empresa-limpeza-pos-obra-em-sp-03.jpg" alt="<?=$h1?>" title="<?=$h1?>"></a>
							<p class="txtcenter">O piso de carpete é muito decorativo, absorve sons e torna os ambientes aconchegantes, tendo na aspiração diária a base da sua manutenção.</p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="wrapper">
					<div class="carousel-index">
						<hr>
						<h2 class="txtcenter">Galeria</h2>
						<div class="owl-carousel owl-theme centralizar owl-demo">
							<?php
							for ($i = 1; $i <= 8; $i++) {
							$i < 10 ? $zero = 0 : $zero = "";
							echo "
							<div class=\"item\"><a class=\"lightbox\" href=\"".$url."imagens/antes-depois/empresa-limpeza-pos-obra-sp-$zero".$i.".png\"><img src=\"".$url."imagens/antes-depois/empresa-limpeza-pos-obra-sp-$zero".$i.".png\" alt=\"".$h1."\" title=\"".$h1."\"  /></a></div>
							";
							}
							?>
						</div>
					</div>
					
					<br class="clear">
				</div>
				<div class="wrapper">
					
					<div class="carousel-index">
						<hr>
						<h2 class="txtcenter">Nossos Clientes</h2>
						<div class="owl-carousel owl-theme centralizar owl-demo2">
							<?php
							for ($i = 1; $i <= 8; $i++) {
							$i < 10 ? $zero = 0 : $zero = "";
							echo "
							<div class=\"item\"><a class=\"lightbox\" href=\"".$url."imagens/clientes/cliente-limpeza-pos-obra-em-sp-$zero".$i.".png\"><img src=\"".$url."imagens/clientes/cliente-limpeza-pos-obra-em-sp-".$zero.$i.".png\" alt=\"".$h1."\" title=\"".$h1."\"  /></a></div>
							";
							}
							?>
						</div>
					</div>
					
					<br class="clear">
				</div>
			</section>
		</div>
	</main>
	<?php include('inc/footer.php'); ?>
	<link rel="stylesheet" href="<?=$url?>nivo/nivo-slider.css" type="text/css" media="screen">
	<script  src="<?=$url?>nivo/jquery.nivo.slider.js"></script>
	<script>
	$(window).load(function() {
	$('#slider').nivoSlider({
		effect: 'fade',
		pauseTime: 3000,
		directionNav: true,
		controlNav: false
	});
	});
	</script>
</body>
</html>