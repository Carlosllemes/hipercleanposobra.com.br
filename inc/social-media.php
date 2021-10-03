<?
    $twitter = $title;
    $twitter = str_replace(' ','%20',$twitter);
    $nomeSiteTwitter = $nomeSite;
    $nomeSiteTwitter = str_replace(' ', '%20', $nomeSiteTwitter);
?>
<p class="compartilhe">Gostou? compartilhe!</p>
<ul class="social-media">
    <li>
		<div class="fb-like" data-href="<?=$url.$urlPagina;?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
    </li>
    <li>
        <a rel="nofollow" class="bt-twitter" title="Recomende este conteudo no seu Twitter" href="http://twitter.com/intent/tweet?text=<?=$twitter."%20-%20".$nomeSiteTwitter?>&amp;url=<?=$url.$urlPagina?>" target="_blank">Tweetar</a>
    </li>
</ul>