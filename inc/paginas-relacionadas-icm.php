



<h2 class="related-posting-title text-center">Páginas <span class="title">Relacionadas</span></h2>
  <div class="grid grid-related-posting">
    <?
    $limit = 5;
    include('inc/vetKey.php');
    include('inc/classes/strFuncoes.class.php');
    $str = new strFuncoes();
    shuffle($vetKey);
    $strPalavra = implode(" ", $str->RetiraPreposicao($h1));
    $vetKey_PR = $str->buscaVetorAprox($strPalavra, $vetKey, $limit, $h1);
    for($i = 0; $i < sizeof($vetKey_PR); $i++){
    $imagens = glob("imagens/informacoes/".$vetKey[$vetKey_PR[$i]]["url"]."-{,[0-9]}[0-9].jpg", GLOB_BRACE);
      if(!empty($imagens)){
    ?>
        <div class="col-4">
          <a rel="nofollow" href="<?=$url.$vetKey[$vetKey_PR[$i]]['url']?>" title="<?=$vetKey[$vetKey_PR[$i]]['key']?>">
            <img src="<?=$url?>inc/scripts/thumbs.php?w=350&amp;h=160&amp;imagem=<?=$url.$imagens[0]?>" title="<?=$vetKey[$vetKey_PR[$i]]["key"]?>" alt="<?=$vetKey[$vetKey_PR[$i]]["key"]?>">
            <h2 itemprop="name"><?=$vetKey[$vetKey_PR[$i]]["key"]?></h2>
          </a>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <br class="clear" />