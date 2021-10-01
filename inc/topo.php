<header id="scrollheader">
    <div class="topo show-mobile">
        <div class="wrapper">
            <!-- TOPO MOBILE -->
            <div class="flex-top-icons">
                <!-- INSERIR MANUALMENTE OS LINKS DAS DEMIAS MÍDIAS SOCIAIS, CASO NECESSÁRIO -->
                <a rel="nofollow" href="tel:<?=$fone[0][0].$fone[0][1]?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
                <a rel="nofollow" href="mailto:<?=$emailContato?>" target="_blank" title="Envie um E-mail"><i class="fa fa-envelope"></i></a>
                <!-- <a rel="nofollow" class="social-icons" href="https://www.facebook.com/<?=$paginaFacebook?>" target="_blank" title="Visite nossa página no Facebook"><i class="fa fa-facebook"></i></a>
                <a rel="nofollow" class="social-icons" href="https://www.youtube.com/channel/UCBfrClUws-DXWDcibzZVFLg" target="_blank" title="Youtube"><i class="fa fa-youtube-play"></i></a> -->
            </div>
            <!-- END TOPO MOBILE -->
        </div>
    </div>
    <div class="wrapper">
        <div class="logo"><a rel="nofollow" href="<?=$url?>" title="Voltar a página inicial"><img src="<?=$url?>imagens/logo-limpeza-pos-obra-em-sp.png" alt="<?=$slogan." - ".$nomeSite?>" title="<?=$slogan." - ".$nomeSite?>"></a></div>
        <div class="right">
            <?php
                foreach ($fone as $key => $value) {
                    echo "<a rel=\"nofollow\" title=\"Clique e ligue\" class=\"tel hide-mobile\" href=\"tel:$value[0]$value[1]\"><i class=\"fa fa-$value[2]\" aria-hidden=\"true\"></i> $value[0] <strong>$value[1]</strong></a>";
                }
            ?>
            <div class="barra-busca2">
                <div class="wrapper">
                    <form action="mapa-site" method="post">
                        <input type="search" name="busca" class="busca" placeholder="Buscar..." required>
                        <input type="submit" class="btn" value="Buscar">
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <nav id="menu">
        <div class="wrapper">
            <ul >
                <?php include('inc/menu-top.php');?>
            </ul>
        </div>
    </nav>
    <div class="clear"></div>
</header>
<div id="header-block"></div>