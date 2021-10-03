<div class="social">
	<?php if(isset($urlTwitter)):?>
		<a rel="nofollow" class="social__icons twitter" href="<?=$urlTwitter?>" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($urlInstagram)):?>
		<a rel="nofollow" class="social__icons instagram" href="<?=$urlInstagram?>" target="_blank" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($urlLinkedIn)):?>
		<a rel="nofollow" class="social__icons linkedin" href="<?=$urlLinkedIn?>" target="_blank" title="Linked In"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($urlYouTube)):?>
		<a rel="nofollow" class="social__icons youtube" href="<?=$urlYouTube?>" target="_blank" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($paginaFacebook)):?>
		<a rel="nofollow" class="social__icons facebook" href="https://www.facebook.com/<?=$paginaFacebook?>" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<?php endif ?>
</div>