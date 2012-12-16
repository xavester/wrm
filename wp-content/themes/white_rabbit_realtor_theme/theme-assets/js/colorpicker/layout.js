(function($){
	
	var initLayout = function() {

		$('.color_picker').ColorPicker({
			onShow: function (colpkr) {
				$init_color = ($(this).find('input').attr('value')).substring(1);
				$(this).ColorPickerSetColor($init_color);
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onSubmit: function (hsb, hex, rgb, el) {
				$('.colorpicker').fadeOut(500);
				return false;
			},
			onBeforeShow: function () {
				$temp = $(this).attr('id');
			},
			onChange: function (hsb, hex, rgb) {
				$('#' + $temp + ' div').css('backgroundColor', '#' + hex);
				$('.' + $temp + '_prev').css('backgroundColor', '#' + hex);
				$('#' + $temp + ' input').attr('value', '#' + hex);
			}
		});
	};
	
	EYE.register(initLayout, 'init');
	
})(jQuery)