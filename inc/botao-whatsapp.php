<!-- ========== Acompanhamento Analytics =========== -->
<script>
    jQuery(document).ready(function ($) {
       jQuery('.whatsapp').on('click', function() {
         ga('send', 'event', 'Evento Whatsapp','Clique', 'Clique Whatsapp');
       });
    });
</script>
<!-- ========= /Acompanhamento Analytics =========== -->
<!-- ==================== Botão ==================== -->
<!-- DESKTOP -->

<?php
$simbolos = array('-','+','(',')','.',);
$ddd = str_replace($simbolos, '', $ddd);
$whatsapp = str_replace($simbolos, '', $whatsapp);
?>
<a target="_blank" title="Whatsapp <?=$nomeSite?>" class="whatsapp whats-desk" href="https://web.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>">
<img src="<?=$url?>imagens/icones/whatsapp.png" alt="Whatsapp <?=$nomeSite?>" title="Whatsapp <?=$nomeSite?>"></a>
<!-- MOBILE -->
<a target="_blank" title="Whatsapp <?=$nomeSite?>" class="whatsapp whats-mobile" href="https://api.whatsapp.com/send?phone=55<?=$whatsapp?>&text=<?=rawurlencode("Olá! Gostaria de mais informações sobre as ofertas da ".$nomeSite." - ".$slogan)?>">
<img src="<?=$url?>imagens/icones/whatsapp.png" alt="Whatsapp <?=$nomeSite?>" title="Whatsapp <?=$nomeSite?>"></a>
<!-- =================== /Botão ==================== -->