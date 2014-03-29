jQuery(document).ready(function($) {
	$('#addmoreitem').click(function() {
		var lastid = $('#vote-item div:last-child>input').attr('id');
		
		for(var i = 1; i < 5; i++){
			var addId = Number(lastid)+Number(i);
			var addHtml = '<div class="form-group"><label for="vote-topic">选项'+addId+':</label><input type="text" name="vote_item_'+addId+'" class="form-control" id="'+addId+'" placeholder="选项'+addId+'"></div>';
			$('#vote-item').append(addHtml);
			if(addId == 20){
				$('#addmoreitem').css({
					display: 'none'
				});
			}
		}
	});

	$('.date').datepicker({
    format: "yyyy-mm-dd"
	});

	$('#vote_type1').click(function(){
    alert('ss');
	});

	$('#vote_type2').click(function(){
    alert('ss');
	});
});