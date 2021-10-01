<div class="barra_doutor">
  <form class="none">
    <input type="hidden" class="j_base" value="<?= BASE; ?>"/>
  </form>
  <div class="wrapper">
    <?php
    //CARRINHO
    include('inc/cart-bar.inc.php');
    //PESQUISA
    include('inc/search-bar.inc.php');
    //IDIOMAS
    include('inc/idiomas-bar.inc.php');
    ?>  
  </div>
</div>
<div class="clear"></div>