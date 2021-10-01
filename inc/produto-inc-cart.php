<div class="htmlchars">
  <form class="j_Cart" method="post" enctype="multipart/form-data">
    <?php if (empty($prod_atributos) || $prod_atributos == " "): ?>
      <p><b><?= (!empty($prod_codigo) ? "Código: " . $prod_codigo : 'Não informado' ); ?></b></p>
      <hr>
      <input type="hidden" name="prod_id" value="<?= $prod_id; ?>"/> 
      <input type="hidden" name="prod_codigo" value="<?= $prod_codigo; ?>"/>  
      <input type="hidden" name="action" value="addCart"/>        
      <h2>Aplicação</h2>
      <label><input type="radio" name="prod_item" value="Padrão" required checked="checked"/>Padrão</label>
      <div class="clear"></div>
      <div class="col-12">
        <div class="col-4">
          <input type="number" value="1" min="1" name="prod_qtd" class="quantidade"/>
        </div>
        <div class="col-8">
          <input type="submit" value="Adicionar ao orçamento" name="addCart" class="btn_orc"/>        
        </div>
        <?php if (!empty($prod_preco) && $prod_preco != 0.00): ?>
          <div class="col-12">
            <?php if (!empty($prod_preco_old) && $prod_preco_old != 0.00): ?>
              <p class="valor_old">De: R$ <span><?= $prod_preco_old; ?></span></p>
            <?php endif; ?>
            <p class="valor">Valor: R$ <span><?= $prod_preco; ?></span></p>
          </div>
          <input type="hidden" name="prod_preco" value="<?= $prod_preco; ?>"/>
        <?php else: ?>
          <div class="col-12">
            <p class="sobconsulta">Preço Sob Consulta</p>
          </div>
        <?php endif; ?>
        <br class="clear"/>
        <br class="clear"/>
        <div class="col-12">
          <a href="<?= RAIZ; ?>/carrinho" rel="nofollow" title="Finalizar orçamento" class="btn_orc verde"><i class="fa fa-shopping-cart"></i> Finalizar orçamento</a>      
        </div>
      </div>
    <?php else: ?>   
      <p><b><?= (!empty($prod_codigo) ? "Código: " . $prod_codigo : 'Código não informado' ); ?></b></p>
      <hr>
      <input type="hidden" name="base" value="<?= BASE; ?>" class="j_base"/>
      <input type="hidden" name="prod_id" value="<?= $prod_id; ?>"/>
      <input type="hidden" name="prod_codigo" value="<?= $prod_codigo; ?>"/>      
      <input type="hidden" name="action" value="addCart"/>    
      <h2>Aplicação</h2>
      <?php
      $atributos = explode(",", $prod_atributos);
      foreach ($atributos as $keys):
        ?>
        <label><input type="radio" name="prod_item" value="<?= $keys; ?>" required/><?= $keys; ?></label>
        <?php
      endforeach;
      ?>  
      <div class="clear"></div>
      <div class="col-12">
        <div class="col-4">
          <input type="number" value="1" min="1" name="prod_qtd" class="quantidade"/>
        </div>
        <div class="col-8">
          <input type="submit" value="Adicionar ao orçamento" name="addCart" class="btn_orc"/>        
        </div>
        <?php if (!empty($prod_preco) && $prod_preco != 0.00): ?>
          <div class="col-12">
            <?php if (!empty($prod_preco_old) && $prod_preco_old != 0.00): ?>
              <p class="valor_old">De: R$ <span><?= $prod_preco_old; ?></span></p>
            <?php endif; ?>
            <p class="valor">Valor: R$ <span><?= $prod_preco; ?></span></p>
          </div>
          <input type="hidden" name="prod_preco" value="<?= $prod_preco; ?>"/>
        <?php else: ?>
          <div class="col-12">
            <p class="sobconsulta">Preço Sob Consulta</p>
          </div>
        <?php endif; ?>
        <br class="clear"/>
        <br class="clear"/>
        <div class="col-12">
          <a href="<?= RAIZ; ?>/carrinho" rel="nofollow" title="Finalizar orçamento" class="btn_orc verde"><i class="fa fa-shopping-cart"></i> Finalizar orçamento</a>      
        </div>
      </div>
    <?php endif; ?>
  </form>
</div>