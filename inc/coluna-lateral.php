<aside class="aside--mod-1">
    <a href="<?=$url?>contato" class="aside__btn btn-orc" title="Solicite um orçamento">Solicite um orçamento</a>
    <div class="aside__menu">
        <h2><a href="<?=$url?>informacoes" title="Informações <?=$nomeSite?>">Informações</a></h2>
        <nav>
            <ul>
                <? include('inc/sub-menu.php');?>
            </ul>
        </nav>
    </div>
    <div class="aside__contact">
        <h2>Entre em contato</h2>
        <?php
        foreach ($fone as $key => $value) {?>
            <a rel="nofollow" title="Clique e ligue" href="tel:<?=$value[0].$value[1]?>"><i class="fa fa-<?=$value[2]?>" aria-hidden="true"></i> (<?=$value[0]?>) <strong><?=$value[1]?></strong></a>
            <? 
        }?>
    </div>
</aside>