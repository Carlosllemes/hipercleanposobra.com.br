<script>
$(document).ready(function(){
	var altura = document.getElementById('scrollheader');
	if (altura !== null) {
		altura = altura.offsetHeight;
		if($(window).width() > 765) window.onscroll = function() {Scroll()};
		function Scroll() {
			if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
			document.getElementById("scrollheader").className = "topofixo";
			document.getElementById("header-block").style.display = "block";
			document.getElementById("header-block").style.height = altura+"px";
			} else {
			document.getElementById("scrollheader").className = "";
			document.getElementById("header-block").style.display = "none";
			}
		}
	}
});
</script>