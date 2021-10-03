<?
$h1         = 'Clientes';
$title      = 'Clientes';
$desc       = 'Clientes - ';
$key        = 'uuuuuuuuuu, jjjjjjjjjjjj, lllllllllll';
$var        = 'Clientes';
include('inc/head.php');
?>
<!--STARTSCRIPTSHEADER-->
<!--ENDSCRIPTSHEADER-->
</head>
<body>
<? include('inc/topo.php');?>
<main>
	<div class="content">
		<section>
			<?=$caminho?>
			<!--STARTCOMPONENTS-->
			<div class="container">
				<div class="wrapper">
                    <h2 class="text-center">Alguns de <span class="title">nossos clientes</span></h2>
                    <?php for ($i = 1; $i <= 16; $i++){;?>
                        <?php if($i <= 9) {?>
                                <div class="col-4">
                            <a href="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-0<?=$i?>.png" class="lightbox">
                                <img class="m-5" src="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-0<?=$i?>.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>">
                            </a>
                                </div>
                        <?php }else{?>
                    <div class="col-4">
                            <a href="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-<?=$i?>.png" class="lightbox">
                                <img class="m-5" src="<?=$url?>imagens/clientes/cliente-limpeza-pos-obra-em-sp-<?=$i?>.png" alt="Imagem de <?=$nomeSite?>" title="Imagem de <?=$nomeSite?>">
                            </a>
                    </div>
                        <?php }?>
                    <?php }?>
				</div>
			</div>
			<!--ENDCOMPONENTS-->
		</section>
		</div> <!-- end content -->
	</main>
	<? include('inc/footer.php');?>
	<!--STARTSCRIPTSFOOTER-->
	<script><?include ('js/accordion.js');?></script>
	<!--ENDSCRIPTSFOOTER-->
</body>
</html>