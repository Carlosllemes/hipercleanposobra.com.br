<div class="owl-carousel owl-theme centralizar owl-demo">

    

    <?php

    for ($i = 1; $i <= 48; $i++) {

    $i < 10 ? $zero = 0 : $zero = "";

    echo "

    <div class=\"item\"><a href=\"".$url."imagens/clientes/cliente-$zero".$i.".jpg\" target=\"iframe-gallery\"><img src=\"".$url."imagens/clientes/cliente-$zero".$i.".jpg\" alt=\"".$h1."\" title=\"".$h1."\"  /></a></div>

    ";

    }

    ?>

</div>