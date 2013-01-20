jQuery(function($) {
	$('.div_form').center('body');
	$(window).resize(function() {
		$('.div_form').center('body');
	});
});
// center plugin
(function($){
	$.fn.center = function(parent, position, options) {
		return this.each(function () {
			var self = $(this);
			self.css('position', (position != null) ? position : 'absolute');
			
			if (parent == null)
			{
				width = self.parent().outerWidth();
				height = self.parent().outerHeight();
			}
			else
			{
				width = $(parent).outerWidth();
				height = $(parent).outerHeight();
			}
			
			if (self.parent().is('body')) {
				width = $(window).outerWidth();
				height = $(window).outerHeight();
			}
 
			dwidth = self.outerWidth();
			dheight = self.outerHeight();
 
			if (options == 'width' || options == 'all' || options == null) {
				self.css('left', (width - dwidth) / 2);
			}
 
			if (options == 'height' || options == 'all' || options == null) {
				self.css('top', (height - dheight) / 2);
			}
		});
	};
})(jQuery);
