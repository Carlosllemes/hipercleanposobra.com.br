<?php 

function organicThumbnails($pasta, $img, $qntd, $qntd_itens, $names, $url, $h1){

$data = '<div id="descricao-produto">  <!-- #descricao-produto INICIO ORGANIC TABS -->';

  //Monta a Navegação
  $tab_count = 1;// Não alterar
  $qntd_tabs = floor($qntd / $qntd_itens);
  $qntd % $qntd_itens >= 1 ? $qntd_tabs++ : $qntd_tabs = $qntd_tabs;
  for ($i=1; $i <= $qntd_tabs; $i++) {
    if($i == 1){
    $data .= "<ul class=\"nav\"> \n";
      }
      $data .= '<li class="nav-two"><a rel="nofollow" href="#tabs-'.$i.'" ';
        if ($i == 1) {$data .= 'class="current"';}
      $data .= ' title="'.$i.'">'.$i.'</a></li>'."\n";
      if ($i == $qntd_tabs) {
    $data .= "</ul>";
    }
  }

  //Monta o conteudo
  for ($i=1; $i <= $qntd; $i++) {
    $i < 10 ? $zero = 0 : $zero = "";
  
      //Verifica e organiza abertura da primeira Tab
      if ($i == 1) {
                $data .= "
                <div id=\"tabs-".$tab_count."\" "; if($i != 1){ $data .= "class=\"hide\"";} $data .=">
                  <ul class=\"thumbnails owl-carousel owl-theme centralizar\">
                    ";
                    $tab_count++;
      }

      $data .= "
      <li>
        <a href=\"".$url.$pasta.$img."-$zero".$i.".jpg\" data-fancybox-group=\"group1\" class=\"lightbox\" title=\"".$h1."\">
          
          <img src=\"".$url."inc/scripts/thumbs.php?w=200&amp;h=200&amp;zc=1&amp;imagem=".$url.$pasta.$img."-$zero".$i.".jpg\" alt=\"".$h1."\" title=\"".$h1."\"/>
        </a>";
        
        if (isset($names[$i])) {
        $data .= "<h2>".$names[$i]."</h2>";
        } elseif (isset($names["definir-pra-todos"])) {
        $data .= "<h2>".$names["definir-pra-todos"]."</h2>";
        }
        $data .= "
      </li>
      ";


      //Verifica e organiza abertura e fechamento das Tabs
      if ($i % $qntd_itens == 0 && $i != $qntd) {
                  $data .= "
                </ul>
              </div>
                <div id=\"tabs-".$tab_count."\" "; if($i != 1){ $data .= "class=\"hide\"";} $data .=">
                  <ul class=\"thumbnails owl-carousel owl-theme centralizar\">
              ";
              $tab_count++;
      } elseif ($i == $qntd){
                  $data .= "
                </ul>
              </div>
              ";
      }
  }

$data .= "</div><!-- #descricao-produto FIM ORGANIC TABS -->";


return $data;
}

?>