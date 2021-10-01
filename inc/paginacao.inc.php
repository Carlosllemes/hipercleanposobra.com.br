<?php 
$PerPage = filter_input(INPUT_GET, 'perpage', FILTER_VALIDATE_INT);
$PerPage = (!empty($PerPage) || isset($PerPage) ? $PerPage : MIN_PER_PAGE);
$Page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$Pager = new Pager(RAIZ . Check::AmmountURL($URL) . "&perpage={$PerPage}&page=");
$Pager->ExePager($Page, $PerPage);
?>

<form class="formpages" method="post">

  <div class="col-12-sm col-7">
    <div class="col-8">
      <input type="search" name="busca" class="form-control" required placeholder="Pesquisar..."/>                 
    </div>
    <div class="col-4">                    
      <button type="submit" name="pesquisar" value="Pesquisar" class="btn btn-success"><i class="fa fa-search"></i> Pesquisar</button>          
    </div>
  </div>

  <div class="col-12-sm col-5 viewpages"> 
    <label class="col-3">Exibir</label>
    <div class="col-5">
      <select name="PerPage" class="j_change" data-url="<?= RAIZ . Check::AmmountURL($URL); ?>">
        <?php for ($mult = 1; $mult <= MULTIPLO_PAGE; $mult++): ?>
          <option value="<?= $mult * MIN_PER_PAGE; ?>" <?php
          if (isset($PerPage) && $PerPage == ($mult * MIN_PER_PAGE)): echo 'selected="selected"';
          endif;
          ?>><?= $mult * MIN_PER_PAGE; ?></option>
                <?php endfor; ?>
      </select>                      
    </div>
    <label class="col-md-4">Por página</label>
  </div>

</form>
<div class="clear"></div>
<hr>