<?php
$h1         = 'Remover include css';
$title      = 'Remover include css';
$desc       = 'Remover include css - Esta página exclui uma session que torna os includes do css em link normal, dando a oportunidade de editar site no ar ou temporário.';
$key        = 'uuuuuuuuuu, jjjjjjjjjjjj, lllllllllll';
$var        = 'Remover include css';
include('inc/head.php');
unset($_SESSION["include"]);
?>
<script>
    $(window).load(function(){
        $('body').remove();
        window.location.replace("<?=$url?>");
    });
</script>
</head>
<body>
</body>
</html>