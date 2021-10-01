<?php
$h1         = 'Limpeza pós Obra em SP';
$title      = 'Limpeza pós Obra em SP';
$desc       = '<?=$auto_desc?>';
$key        = 'uuuuuuuuuu, jjjjjjjjjjjj, lllllllllll';
$var        = 'Limpeza pós Obra em SP';
include('inc/head.php');
?>
</head>
<body>
<?php include('inc/topo.php');?>
<?php include('inc/fancy.php');?>
<main>
    <div class="content">
        <section>
            <?=$caminhoBreadServicos?>
            <div class="wrapper">
                
                <article>
                     <ul class="gallery">
                        <?php
                        $pasta='servicos';
                        $img='limpeza-pos-incendio-em-sp';
                        $nimg='7';
                        for ($i = 1; $i <= $nimg; $i++) {
                        $i < 10 ? $zero = 0 : $zero = "";
                        echo "
                        <li>
                            <a href=\"".$url."imagens/".$pasta."/".$img."-$zero".$i.".jpg\" data-fancybox=\"group1\" class=\"lightbox\" title=\"".$h1."\" data-caption=\"".$h1."\">
                                
                                <img src=\"".$url."imagens/".$pasta."/".$img."-$zero".$i.".jpg\" alt=\"".$h1."\" title=\"".$h1."\"/>
                            </a>
                        </li>
                        ";
                        }
                        ?>
                    </ul>
                    <h2>Limpeza pós Incêndio – Limpeza pós Obra em SP</h2>
<h3>Remoção de pó e fuligem em toda área minuciosamente!</h3>

<p>Limpeza e lustração de todos os espelhos (vidros paredes duplas de vidros guarda corpo Box parte interna e externa havendo acesso) remoção de sujidades janelas trilhos venezianas caixilhos locais de difícil acesso e cantos,luminárias persianas lareira esp/tomada portas batentes dobradiças suíte quartos e quarto de empregada sacadas Hall de entrada e social deck painéis ar condicionado parte externa ventilador de teto área gourmet churrasqueira Home. Para peito havendo acesso.</p>
<p>Higienização e desinfecção de cozinha copadispensa coifas sifão banheirosbanheiras pia cuba vaso sanitário lavabo spajacuzziôfuro área de serviço tanque lustração em torneiras e registros.</p>
<p>Remoção de pó em paredes e teto em toda área.Remoção de foligem e mal cheiro de fumaça em paredes e teto em toda área (após esta limpeza será necessário pintar as paredes deixamos todas prontas para pintura)</p>
<p>Limpeza e remoção de pó incrustações sujidade sem causar dano superfície.</p>

<p>Limpeza e higienização limpeza de fuligem do closet armários de cozinha planejados gabinetes prateleiras balcão gavetas removendo todas, e remoção de etiquetas. Deixando-as como antes do incêndio. (Senão estiver danificado)</p>

<p>Esta higienização de planejada serve para não deixar odor dentro de locais fechados. <br>
    Deixando os planejados pronto para guarda tudo. !!!</p>

<p>Lavagem de quintal corredores escadas garagem pedras goiás mosaicos pedra portuguesa. <br>
    Uso de enceradeira industrial e lavadora de alta pressão!!!!</p>
                </article>
                <?php include('inc/coluna-lateral-servicos.php');?>
            </div>
        </section>
    </div>
</main>
<?php include('inc/footer.php');?>
</body>
</html>