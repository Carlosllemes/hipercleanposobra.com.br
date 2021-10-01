<script>
$(document).ready(function(){
	var altura = document.getElementById('scrollheader');
	var headerHeight = $('header').outerHeight(true);
	var scrollOffset = 50;
	var toggleHeader = false;
	if (altura !== null) {
		altura = altura.offsetHeight;
		if($(window).width() > 765) window.onscroll = function() {Scroll()};
		function Scroll() {
			if (document.body.scrollTop > headerHeight + scrollOffset || document.documentElement.scrollTop > headerHeight + scrollOffset) {
				if(!toggleHeader){
					$('header').hide();
					$('header').fadeIn('fast');
					toggleHeader = true;
				}
				document.getElementById("scrollheader").className = "topofixo";
				document.getElementById("header-block").style.display = "block";
				document.getElementById("header-block").style.height = altura+"px";
			} else {
				$('header').show();
				toggleHeader = false;
				document.getElementById("scrollheader").className = "";
				document.getElementById("header-block").style.display = "none";
			}
		}
	}
});
</script>