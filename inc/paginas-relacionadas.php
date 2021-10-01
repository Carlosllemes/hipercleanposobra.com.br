
  <h2 class="related-posting-title">Veja também em nosso site:</h2>
  <ul class="related-posting">
    <?
    $limit = 3;
    include('inc/vetKey.php');
    include('inc/classes/strFuncoes.class.php');
    $str = new strFuncoes();
    shuffle($vetKey);
    $strPalavra = implode(" ", $str->RetiraPreposicao($h1));
    $vetKey_PR = $str->buscaVetorAprox($strPalavra, $vetKey, $limit, $h1);
    for($i = 0; $i < sizeof($vetKey_PR); $i++)
    {
      if (count($vetKey[$vetKey_PR[$i]]["url"]) == 0) continue;
      echo "<li class=\"row\" >";
      echo "<a rel=\"nofollow\" href=\"$url".$vetKey[$vetKey_PR[$i]]["url"]."\" title=\"".$vetKey[$vetKey_PR[$i]]["key"]."\">";
      echo "<img src=\"$url"."inc/scripts/thumbs.php?w=150&amp;h=150&amp;imagem=$url"."imagens/informacoes/".$vetKey[$vetKey_PR[$i]]["url"]."-01.jpg\" alt=\"".$vetKey[$vetKey_PR[$i]]["key"]."\" title=\"".$vetKey[$vetKey_PR[$i]]["key"]."\">";
      echo "</a>";
      echo "<h2 itemprop=\"name\">";
      echo "<a href=\"$url".$vetKey[$vetKey_PR[$i]]["url"]."\" title=\"".$vetKey[$vetKey_PR[$i]]["key"]."\">";
      echo $vetKey[$vetKey_PR[$i]]["key"];
      echo "</a>";
      echo "</h2>";
      echo "</li>";
    }
    ?>
  </ul>
  <br class="clear" />
  