<p class="txtcenter"><a href="<?=$url?>contato" class="btn btn-orc" title="Solicite um orçamento" rel="nofollow">Solicite um orçamento</a></p>
<aside>
    <h2><a href="<?=$url?>servicos" title="Serviços <?=$nomeSite?>">Serviços</a></h2>
    <nav>
        <ul>
            <?php include('inc/sub-menu-servicos.php');?>
        </ul>
    </nav>
    <?php
    if(count($fone) > 1){
    echo "<h3>Entre em contato pelos telefones</h3>";
    } else {
    echo "<h3>Entre em contato pelo telefone</h3>";
    }
    ?>
    <p>
    <?php
        foreach ($fone as $key => $value) {
        echo "<a class=\"d-block my-1\" href=\"tel:$value[0]$value[1]\" title=\"Clique e Ligue\"><i class=\"fa fa-$value[2]\"></i> $value[0] <strong>$value[1]</strong></a>";
        }
    ?>
</aside>