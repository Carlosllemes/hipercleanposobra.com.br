<script>
	$(document).ready(function() {
	
	$(".quick_view").fancybox({
	baseClass: 'quick-view-container',
	infobar: false,
	buttons: false,
	thumbs: false,
	margin: 0,
	touch: {
	vertical: false
	},
	animationEffect: false,
	transitionEffect: "slide",
	transitionDuration: 500,
	baseTpl: '<div class="fancybox-container" role="dialog">' +
			'<div class="quick-view-content">' +
					'<div class="quick-view-carousel">' +
							'<div class="fancybox-stage"></div>' +
					'</div>' +
					'<div class="quick-view-aside"></div>' +
					'<button data-fancybox-close class="quick-view-close">X</button>' +
			'</div>' +
	'</div>',
	onInit: function (instance) {
	/*
	#1 Create bullet navigation links
	=================================
	*/
	var bullets = '<ul class="quick-view-bullets">';
			for (var i = 0; i < instance.group.length; i++) {
			bullets += '<li><a data-index="' + i + '" href="javascript:;"><span>' + (i + 1) + '</span></a></li>';
			}
	bullets += '</ul>';
	$(bullets).on('click touchstart', 'a', function () {
	var index = $(this).data('index');
	$.fancybox.getInstance(function () {
	this.jumpTo(index);
	});
	})
	.appendTo(instance.$refs.container.find('.quick-view-carousel'));
	/*
	#2 Add product form
	===================
	*/
	var $element = instance.group[instance.currIndex].opts.$orig;
	var form_id = $element.data('qw-form');
	instance.$refs.container.find('.quick-view-aside').append(
	// In this example, this element contains the form
	$('#' + form_id).clone(true).removeClass('hidden')
	);
	},
	beforeShow: function (instance) {
	/*
	Mark current bullet navigation link as active
	*/
	instance.$refs.container.find('.quick-view-bullets')
	.children()
	.removeClass('active')
	.eq(instance.currIndex)
	.addClass('active');
	}
	});
	});
</script>