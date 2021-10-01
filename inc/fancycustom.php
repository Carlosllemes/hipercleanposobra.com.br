<script>
$(document).ready(function() {
	$('[data-fancybox="cl-group"]').fancybox({
	baseClass: 'fancybox-custom-layout',
	infobar: false,
	thumbs: {
	hideOnClose: false
	},
	touch: {
	vertical: false
	},
	buttons: [
	'close',
	'thumbs',
	'share'
	],
	animationEffect: "fade",
	transitionEffect: false,
	idleTime: false,
	gutter: 0,
	caption: function (instance) {
	return '<h3>teste</h3><p>interiors, exteriors, and the humans that inhabit them.</p><p><a href="https://unsplash.com/collections/curated/162" target="_blank">unsplash.com</a></p>';
	}
	});
	$('[data-fancybox="cl-group2"]').fancybox({
	baseClass: 'fancybox-custom-layout',
	infobar: false,
	thumbs: {
	hideOnClose: false
	},
	touch: {
	vertical: false
	},
	buttons: [
	'close',
	'thumbs',
	'share'
	],
	animationEffect: "fade",
	transitionEffect: false,
	idleTime: false,
	gutter: 0,
	caption: function (instance) {
	return '<h3>teste2</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eum sapiente adipisci culpa architecto, eveniet delectus nisi ab cupiditate illo, optio suscipit aperiam in, dolore nulla ex fugit hic voluptas.</p><p><a href="https://unsplash.com/collections/curated/162" target="_blank">unsplash.com</a></p>';
	}
	});
	});
</script>