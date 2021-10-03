<!--SweetAlert Modal-->
<link rel="stylesheet" href="<?= $url; ?>js/sweetalert/css/sweetalert.css"/>
<!-- <script src="<?= $url; ?>js/sweetalert/js/sweetalert.min.js"></script> -->
<script>
	<?php include 'js/sweetalert/js/sweetalert.min.js'; ?>
</script>
<!--/SweetAlert Modal-->
<!--Máscara dos campos-->
<!-- <script src="<?= $url; ?>js/maskinput.js"></script> -->
<script>
	<?php include 'js/maskinput.js'; ?>
</script>
<script>
$(function () {
$('input[name="telefone"]').mask('(99) 99999-9999');
});
</script>

<script>
var Recaptcha;
$(window).on('scroll', function(e){
	if($(this).scrollTop() >= 50 && !Recaptcha){
		$("head").append("<script src='https://www.google.com/recaptcha/api.js'><\/script>");
		Recaptcha = true;
	}
});
</script>