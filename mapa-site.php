<?
$h1         = 'Mapa do site';
$title      = 'Mapa do site';
$desc       = 'O mapa do site com todos os atalhos para todas as páginas deste site. Qualquer dúvida estamos a disposição por email ou telefone. Clicando aqui';
$key        = 'atalho para as páginas do site, mapa do site';
$var        = 'Mapa do site';
include('inc/head.php');
?>
</head>
<body>
    <? include('inc/topo.php');?>
    <main>
        <div class="content">
            <section>
                <?=$caminho?>
                <div class="wrapper">
                    <h2>Navegue pelo site da <?=$nomeSite?>:</h2>
                    <ul class="sitemap">
                        <? include('inc/menu-top.php');?>
                    </ul>
                </div><!-- end wrapper -->
            </section>
        </div> <!-- end content -->
    </main>
    <? include('inc/footer.php');?>
    <script>
        $(document).ready(function(){
            if($('.sitemap i').length > 0){
                $('.sitemap i').each(function(){
                    $(this).remove();
                });
            }
        });
    </script>
</body>
</html>