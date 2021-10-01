<div class="colpadding_none">  
  <script>
    function openAba(evt, AbaName) {
      // Declare all variables
      var i, tabcontent, tablinks;

      // Get all elements with class="tabcontent" and hide them
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Get all elements with class="tablinks" and remove the class "active"
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the current tab, and add an "active" class to the button that opened the tab
      document.getElementById(AbaName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  </script>
  <?php
  $Read->ExeRead(TB_PRODUTO, "WHERE user_empresa = :emp AND prod_status = :stats AND prod_name = :nm", "emp=" . EMPRESA_CLIENTE . "&stats=2&nm={$lastCategory}");
  if (!$Read->getResult()):
    WSErro("Desculpe, mas não foi encontrando o conteúdo relacionado a esta página, volte mais tarde", WS_INFOR, null, "Aviso!");
  else:
    foreach ($Read->getResult() as $dados):
      extract($dados);
      ?>
      <div class="col-12 col-m-12">

        <div class="col-<?= (WIDGET_CART ? '6' : '12'); ?> col-m-12">  
          <a href="<?= RAIZ . '/doutor/uploads/' . $prod_cover; ?>" data-fancybox-group="group-img" class="lightbox" title="<?= $prod_title; ?>"><?= Check::Image('doutor/uploads/' . $prod_cover, $prod_title, 'capaProd', 500, 520); ?></a>
        </div>

        <?php if (WIDGET_CART): ?>
          <div class="col-6 col-m-12">
            <?php include('inc/produto-inc-cart.php'); ?>
          </div>
        <?php endif; ?>

        <div class="clear"></div>
        <div class="col-12">
          <div class="owl-carousel owl-theme">
            <?php
            $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND user_empresa = :emp AND cat_parent IN(:cat)", "id={$prod_id}&emp=" . EMPRESA_CLIENTE . "&cat={$cat_parent}");
            if ($Read->getResult()):
              foreach ($Read->getResult() as $gallery):
                extract($gallery);
                ?>
                <div class="item">    
                  <a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" data-fancybox="group-img" class="lightbox" title="<?= $prod_title; ?>"><?= Check::Image('doutor/uploads/' . $gallery_file, $prod_title, null, 300, 200); ?></a>
                </div>
                <?php
              endforeach;
            endif;
            ?>
          </div>
          <span class="pull-right"><small><i>Clique na imagem para ampliar.</i> </small><i class="fa fa-search-plus"></i></span>
          <a class="fancybox" data-fancybox-group="group-img"></a>  
        </div>
      </div>

      <div class="clear"></div>

      <div class="col-12">

        <div class="tab">
          <button class="tablinks active" onclick="openAba(event, 'desc')">Descrição</button>
          <button class="tablinks" onclick="openAba(event, 'down')">Download</button>          
        </div>

        <div id="desc" class="htmlchars tabcontent" style="display: block;">
          <?= $prod_content; ?>
        </div>     

        <div id="down" class="htmlchars tabcontent">
          <?php if ($url_relation != 0): ?>
            <div class="catalogo">                          
              <?php
              $Read = new Read;
              $url_relation = explode(',', trim($url_relation, ','));
              foreach ($url_relation as $urlsr):
                $Read->ExeRead(TB_DOWNLOAD, "WHERE dow_id = :id AND user_empresa = :emp ORDER BY dow_title ASC", "id={$urlsr}&emp=" . EMPRESA_CLIENTE);
                if (!$Read->getResult()):
                  ?>
                  <h3>Não existem Downloads para este item.</h3>
                <?php else : ?>
                  <h3>Downloads disponíveis para este produto</h3>
                  <?php
                  foreach ($Read->getResult() as $downs):
                    ?>       
                    <!--<div class="col-4 col-m-12">-->
                    <a href="<?= RAIZ . "/doutor/uploads/" . $downs['dow_file']; ?>" title="<?= $downs['dow_title']; ?>" class="btn" target="_blank"><i class="fa fa-file-pdf-o"></i> <?= $downs['dow_title']; ?></a>                
                    <!--</div>-->
                    <?php
                  endforeach;
                endif;
              endforeach;
              ?>
            </div>
          <?php endif; ?>
        </div>

      </div>

      <?php
    endforeach;
  endif;

  include('inc/itens-relacionados.inc.php');
  ?>
</div>