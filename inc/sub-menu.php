
  <?php
  include_once('inc/vetKey.php');
  foreach ($vetKey as $key => $vetor) {
    $strInfo = "
    <li>";
      $strInfo .= "
      <a href=\"".$url.$vetor['url']."\" title=\"".$vetor['key']."\">".$vetor['key']."</a>";
      $strInfo .= "
    </li>";
    echo $strInfo;
  }
  ?>
  