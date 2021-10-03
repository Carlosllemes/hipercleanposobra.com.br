<header id="scrollheader">
        <div class="wrapper">
            <div class="d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a rel="nofollow" href="<?=$url?>" title="Voltar a página inicial">
                        <img src="<?=$url?>imagens/logo.png" alt="<?=$nomeSite?>" title="<?=$nomeSite?>">
                    </a>
                </div>
                <div class="contact hide-mobile">
                    <? include('inc/canais.php');?>
                    <div class="tel">
                        <?php
                        foreach ($fone as $key => $value) {?>
                            <a rel="nofollow" title="Clique e ligue" href="tel:<?=$value[0].$value[1]?>"><i class="fa fa-<?=$value[2]?>" aria-hidden="true"></i> (<?=$value[0]?>) <strong><?=$value[1]?></strong></a>
                            <? if($key >= 2) break;
                        }?>
                    </div>
                </div>
            </div>
            <div class="contact show-mobile">
                <div class="d-flex align-items-center justify-content-center mb-5">
                    <? include('inc/canais.php');?>
                    <?php
                    foreach ($fone as $key => $value) {
                        echo "<a rel=\"nofollow\" title=\"Clique e ligue\" href=\"tel:$value[0]$value[1]\"><i class=\"fa fa-$value[2]\" aria-hidden=\"true\"></i></a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="menu-search">
            <div class="wrapper">
                <div class="d-flex align-items-center justify-content-between">
                    <nav id="menu">
                        <ul>
                            <? include('inc/menu-top.php');?>
                        </ul>
                    </nav>
                    <div class="search">
                        <form action="1-apagar-busca-sitemap" method="post" class="search__form">
                            <input type="search" name="busca" placeholder="Search..." class="search__box" required>
                            <input type="submit" class="search__button" value="">
                            <i class="fa fa-1x fa-search search__icon"></i>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <div id="header-block"></div>