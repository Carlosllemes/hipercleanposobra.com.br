<?
$h1         = 'Erro 404: Página não encontrada';
$title      = 'Erro 404: Página não encontrada';
$desc       = 'Erro 404: Página não encontrada - Navegue pelo menu do nosso site e encontre o que está procurando, escolha abaixo a página que deseja visualizar.';
$key        = '';
$var        = 'Página não encontrada';
include('inc/head.php');
?>
</head>
<body>
    <? include('inc/topo.php');?>
    <main>
        <div class="content">
            <section class="page-404">
                <?=$caminho?>
                <div class="wrapper">
                    <h2 class="title-404">404</h2>
                    <p class="msg-404"><strong class="dark">Ops! Página não encontrada.</strong><br>
                        Navegue pelo site da <?=$nomeSite?> e encontre o que está procurando, <br class="hide-mobile"> escolha abaixo a página que deseja visualizar.
                    </p>
                    <div class="menu-404">
                        <h2 class="dark">O que deseja fazer?</h2>
                        <div class="my-5">
                            <a rel="nofollow" title="Voltar a página inicial" href="<?=$url;?>" >Voltar a página inicial</a>
                            <a rel="nofollow" title="Ver O Mapa do site" href="<?=$url;?>mapa-site" >Ver O Mapa do site</a>
                        </div>
                    </div>
                </div><!-- end wrapper -->
            </section>
        </div> <!-- end content -->
    </main>
    <? include('inc/footer.php');?>
</body>
</html>