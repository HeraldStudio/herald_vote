jQuery(document).ready(function($) {
	$('.logout').click(function() {
		$.ajax({
			url: '/herald_vote/index.php/Home/Index/logout',
			type: 'post',
			dataType: 'text',
			success: function(a){
				history.go(0);
			}
		});
	});
});