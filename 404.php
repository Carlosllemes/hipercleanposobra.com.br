<?php
$h1         = 'Erro 404: Página não encontrada';
$title      = 'Erro 404: Página não encontrada';
$desc       = 'Erro 404: Página não encontrada - Navegue pelo menu do nosso site e encontre o que está procurando, escolha abaixo a página que deseja visualizar.';
$key        = '';
$var        = 'Página não encontrada';

include('inc/head.php');
?>
</head>
<body>

<?php include('inc/topo.php');?>
<div class="wrapper">
    
    <main>
    <div class="content">
        <section class="page-404">
            
            <?=$caminho?>
            <h1><?=$h1?></h1>
            
            <article class="full">
                
                <p class="msg-404">Ops! Página não encontrada.<br><br>
                    
                    Navegue pelo site da <?=$nomeSite?> e encontre o que está procurando, escolha abaixo a página que deseja visualizar.
                </p>
                
                <div class="menu-404">
                    <h2>O que deseja fazer?</h2>
                    <br>
                    <a rel="nofollow" title="Voltar a página inicial" href="<?=$url;?>" >Voltar a página inicial</a>
                    <br><br>
                    <a rel="nofollow" title="Ver O Mapa do site" href="<?=$url;?>mapa-site" >Ver O Mapa do site</a>
                    <br><br>
                </div>
                
                
            </article>
            
        </section>
    </div>
    </main>
    </div><!-- .wrapper -->
    <?php include('inc/footer.php');?>
</body>
</html>