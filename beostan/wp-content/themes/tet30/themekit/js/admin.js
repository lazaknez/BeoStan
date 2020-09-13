(function($){
	$(document).ready(function(){
		$('#redux_save').on('click', function(){
			var self = this;
			setTimeout(function(){
				$.redux.ajax_save($(self));
			}, 1000);
		});
	});
})(jQuery);