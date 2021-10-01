<div class="clear"></div>
<footer>
	<div class="wrapper">
		<div class="col-4">
			<div class="contact-footer">
				<h2>Contatos</h2>
				<h3>Unidade 1 - São Paulo</h3>
				<address>
					<span><?=$nomeSite." - ".$slogan?></span>
					<?=$rua." - ".$bairro?> <br>
					<?=$cidade." - ".$UF." - ".$cep?>
				</address>
				<a target="_blank" title="Whatsapp <?=$nomeSite?>" class="whatsapp whats-desk" href="https://web.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>"><a rel="nofollow" href="mailto:<?=$emailContato?>" target="_blank" title="Envie um E-mail"><i class="fa fa-whatsapp"></i> (11) 94854-9780</a>

				<br>
<hr>

				<h3>Unidade 2 - Itanhaém </h3>
				<address>
					<span><?=$nomeSite." - ".$slogan?></span>
					<?=$rua2." - ".$bairro2?> <br>
					<?=$cidade2." - ".$UF2." - ".$cep2?>
				</address>
				<a target="_blank" title="Whatsapp <?=$nomeSite?>" class="whatsapp whats-desk" href="https://web.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>"><a rel="nofollow" href="mailto:<?=$emailContato?>" target="_blank" title="Envie um E-mail"><i class="fa fa-whatsapp"></i> (13) 98851-6171</a>

				<br>
			</div>
		</div>
		<div class="col-6">
			<div class="menu-footer">
				<nav>
					<ul>
						<li><a href="<?=$url;?>pagina-inicial" title="Página Inicial">Página Inicial</a></li>
						<li><a href="<?=$url;?>sobre-nos" title="Sobre Nós">Sobre Nós</a></li>
						<li><a href="<?=$url;?>servicos" title="Serviços">Serviços</a></li>
						<li><a href="<?=$url;?>clientes" title="Clientes">Clientes</a></li>
						<li><a href="<?=$url;?>antes-depois" title="Antes e Depois">Antes e Depois</a></li>
						<!-- <li><a href="<?=$url;?>portfolio" title="Portfólio">Portfólio</a></li> -->
						<!-- <li><a href="<?=$url;?>blog" title="Blog">Blog</a></li> -->
						<!-- <li><a href="<?=$url;?>unidades" title="Unidades">Unidades</a></li> -->
						<li><a href="<?=$url;?>contato" title="Contato">Contato</a></li>
						<li><a href="<?=$url?>mapa-site" title="Mapa do site <?=$nomeSite?>">Mapa do site</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<?php include('inc/canais.php');?>
		<br class="clear">
	</div>
</footer>
<div class="copyright-footer">
	<div class="wrapper">
		Copyright © 2017 - Hiper Clean - Todos os Direitos Reservados | Criado por Robert Frost
		
	</div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166881859-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166881859-1');
</script>

<?php if(isset($whatsapp) && !empty($whatsapp)) { include 'botao-whatsapp.php';} ?>



