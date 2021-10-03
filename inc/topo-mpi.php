<div class="topo-contato">
	<div class="wrapper">
		<div class="grid">
			<div class="col-6">
				<span>Entre em contato com um de nossos especialistas!</span>
			</div>
			<div class="col-6">
                <a href="Tel:<?=$fone[0][1]?>" title="Faça seu orçamento agora mesmo" class="btn btn-white lightbox" data-src="#modal-form-contato">Faça seu orçamento agora mesmo</a>
				<?if(isset($whatsapp)):?><a href="https://web.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>" target="_blank" rel="nofollow" title="Faça seu orçamento por Whatsapp" class="btn btn-whatsapp">Faça seu orçamento por Whatsapp</a><?endif?>
			</div>
		</div>
	</div>
</div>
<header id="scrollheader">
    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <a rel="nofollow" href="<?=$url?>" title="Voltar a página inicial">
                    <img src="<?=$url?>imagens/logo.png" alt="<?=$nomeSite?>" title="<?=$nomeSite?>">
                </a>
            </div>
            <nav id="menu">
                <ul>
                    <? include('inc/menu-top.php');?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="clear"></div>
</header>
<div id="header-block"></div>

<?include('inc/form-scripts.php');?>
<?include('inc/form-post.php');?>

<div style="display: none;" id="modal-form-contato">
    <h2>Entre em contato</h2>
    <hr>
    <form enctype="multipart/form-data" method="post" class="form orcamento-topo">
        <label>Nome: <span>*</span> </label>
        <input onKeyUp="UcWords(this)" type="text" name="nome" value="<?php
        if (isset($post['nome'])): echo $post['nome'];
        endif;
        ?>" required/>
        <label>E-mail: <span>*</span> </label>
        <input onKeyUp="minusculas(this)" type="text" name="email" value="<?php
        if (isset($post['email'])): echo $post['email'];
        endif;
        ?>" required/>
        <label>Telefone: <span>*</span> </label>
        <input type="text" name="telefone" value="<?php
        if (isset($post['telefone'])): echo $post['telefone'];
        endif;
        ?>" required/>
        <label>Mensagem: <span>*</span> </label>
        <textarea name="mensagem" rows="5" required><?php
        if (isset($post['mensagem'])): echo $post['mensagem'];
        endif;
        ?></textarea>
        <div class="g-recaptcha" data-sitekey="<?= $siteKey; ?>"></div>
        <span class="bt-submit">
            <input type="submit" name="EnviaContato" value="Enviar" class="ir" />
        </span>
    </form>
</div>