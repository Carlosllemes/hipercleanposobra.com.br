<?php include('contato-inc.php')?>
<div class="clear"></div>
    <footer>
        <div class="wrapper">
            <div class="grid">
                <div class="footer__institucional col-4">
                    <a href="<?=$url?>" title="<?=$nomeSite." ".$Slogan?>">
                        <img src="<?=$url?>imagens/logo-branco.png" alt="<?=$nomeSite." ".$Slogan?>" title="<?=$nomeSite." ".$Slogan?>" class="picture-center" width="220">
                    </a>
                    <p class="text-center small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolor error facere excepturi beatae, maiores. Suscipit dolor eveniet iusto culpa unde quos, voluptates sapiente ipsum perspiciatis similique possimus molestiae modi?</p>
                </div>
                <div class="footer__menu col-4">
                    <nav>
                        <ul>
                            <?php
                            foreach ($menu as $key => $value){
                                if($sigMenuPosition !== false && $key == $sigMenuPosition) include('inc/menu-footer-sig.php');
                                echo '
                                <li>
                                <a rel="nofollow" href="'.(strpos($value[0], 'http') !== false ? $value[0] : $url.$value[0]).'" title="'.($value[1] == 'Home' ? 'Página inicial' : $value[1]).'" '.(strpos($value[0], 'http') !== false ? 'target="_blank"' : "").'>'.$value[1].'</a>
                                </li>
                                ';
                            }
                            
                            ?>
                            <li><a href="<?=$url?>mapa-site" title="Mapa do site <?=$nomeSite?>">Mapa do site</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="footer__contact col-4">
                    <address>
                        <strong class="d-block"><?=$nomeSite?></strong>
                        <span class="d-block"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$rua." - ".$bairro?> <br> <?=$cidade."/".$UF." - ".$cep?></span>
                        <?php
                        foreach ($fone as $key => $value) {?>
                            <a class="d-block" rel="nofollow" title="Clique e ligue" href="tel:<?=$value[0].$value[1]?>">
                                <i class="fa fa-<?=$value[2]?>" aria-hidden="true"></i>
                                <?=$value[0].$value[1]?>
                            </a>
                            <?
                        }
                        ?>
                        <a class="d-block" rel="nofollow" href="mailto:<?=$emailContato?>" target="_blank" title="Envie um E-mail"><i class="fa fa-envelope" aria-hidden="true"></i> <?=$emailContato?></a>
                        
                        <? include('inc/canais.php');?>
                    </address>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </footer>
    <div class="copyright-footer">
        <div class="wrapper">
            Copyright © <?=$nomeSite?>. (Lei 9610 de 19/02/1998)
        </div>
    </div>
    <?php if(isset($whatsapp) && !empty($whatsapp)) { include 'botao-whatsapp.php';}
    
    ?>
    <?include('inc/LAB.php');?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?=$url?>js/sweetalert/js/sweetalert.min.js"></script>
<script src="<?=$url?>js/maskinput.js"></script>
<script>
    <?include ('js/fake-select.js');?>
</script>
<script>
    $(function () {
        $('input[name="telefone"]').mask('(00) 90000-0000');
        $('input[name="CEP"]').mask('00000-000');
        $('input[name="CPF"]').mask('000.000.000-00');
        $('input[name="CNPJ"]').mask('00.000.000/0000-00');
    });
</script>
