<div class="social">
	<a rel="nofollow" class="social-icons" href="mailto:<?=$emailContato?>" target="_blank" title="Envie um E-mail"><i class="fa fa-envelope fa-x3"></i></a>
	<?php if(isset($urlTwitter)):?>
		<a rel="nofollow" class="social-icons" href="<?=$urlTwitter?>" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($urlInstagram)):?>
		<a rel="nofollow" class="social-icons" href="<?=$urlInstagram?>" target="_blank" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($urlLinkedIn)):?>
		<a rel="nofollow" class="social-icons" href="<?=$urlLinkedIn?>" target="_blank" title="Linked In"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
	<?php endif ?>
	<?php if(isset($urlYouTube)):?>
		<a rel="nofollow" class="social-icons" href="<?=$urlYouTube?>" target="_blank" title="Youtube"><i class="fa fa-youtube-play fa-x3"></i></a>
	<?php endif ?>
	<?php if(isset($paginaFacebook)):?>
		<a rel="nofollow" class="social-icons" href="https://www.facebook.com/<?=$paginaFacebook?>" target="_blank" title="Visite nossa página no Facebook"><i class="fa fa-facebook fa-x3"></i></a>
	<?php endif ?>
</div>