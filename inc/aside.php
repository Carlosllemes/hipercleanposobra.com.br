<?php if (count($URL) > 1): ?> 
  <aside class="main-aside"> 
    <?php
    if(isset($paginaFacebook) && !empty($paginaFacebook) ){
    echo "
    <div class=\"fb-page\" data-href=\"http://www.facebook.com/$paginaFacebook\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"false\" data-show-posts=\"false\"><div class=\"fb-xfbml-parse-ignore\"><blockquote cite=\"http://www.facebook.com/$paginaFacebook\"><a href=\"http://www.facebook.com/$paginaFacebook\">$nomeSite</a></blockquote></div></div>
    ";
    }
    ?>

    <?php include 'inc/sub-menu-aside.php'; ?>
    
    <div class="clear"></div>
    <hr>
      
    <div class="callPhone">
      <?php
        if(isset(count($fone) > 1)){
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
      </p>
      
      <div class="clear"></div>
      <a href="<?= RAIZ; ?>/contato" title="Entre em contato" class="btn_orc j_event" data-category="<?= strtoupper(Check::GetLastCategory($URL)); ?>" data-event="Clicou entrar em contato" data-label="<?php Check::SetTitulo($arrBreadcrump, $URL); ?>" style="width: 100%;"><i class="fa fa-envelope"></i> Entre em contato</a>
    </div>
  </aside>
<?php endif; ?>
