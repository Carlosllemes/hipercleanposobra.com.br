<?php if (WIDGET_CART): ?>
  <div class="col-<?= (WIDGET_LANG ? '4' : '8'); ?> col-12-sm">    
    <a href="<?= RAIZ; ?>/carrinho" rel="nofollow" title="Carrinho de orçamento">
      <div class="carrinho-top">
        <i class="fa fa-shopping-cart"></i>
        <span class="j_contCart"></span> iten(s) para orçamento
      </div>
    </a>
  </div>

  <div class="modalBg">
    <div class="alertCart j_message">
      <h2>Item adicionado ao orçamento</h2>
      <p></p>
      <hr>
      <button class="j_closeBox" title="Continuar orçamento"><i class="fa fa-cart-arrow-down" ></i> Continuar</button>
      <a rel="nofollow" href="<?= RAIZ; ?>/carrinho" title="Carrinho de orçamento" class="btn_orc"></a>
    </div>
  </div>
<?php endif; ?>
