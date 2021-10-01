<?
$usarZero = 'sim';
echo '<ul class="gallery">';
	for($i = 1; $i <= $quantia; $i++){
	if($usarZero == "sim"){
	if($i >= 10){ $zero = ""; } else { $zero = "0"; }
	}
	echo "
	<li>
		<a href=\"".$url.$pasta.$urlPagina."-".$zero.$i.".jpg\" data-fancybox=\"group1\" class=\"lightbox\" title=\"".$h1."\" data-caption=\"".$h1."\">
			<img src=\"".$url.$pasta.$urlPagina."-".$zero.$i.".jpg\" alt=\"".$h1."\" title=\"".$h1."\" itemprop=\"image\" />
		</a>
	</li>
	";
	}
echo '</ul>';
?>
<a class="fancybox" data-fancybox-group="group1"></a>