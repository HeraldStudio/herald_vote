jQuery(document).ready(function($) {
	$('#addmoreitem').click(function() {
		var lastid = $('#vote-item div:last-child>input').attr('id');
		
		for(var i = 1; i < 5; i++){
			var addId = Number(lastid)+Number(i);
			var addHtml = '<div class="form-group"><label for="vote-topic">选项'+addId+':</label><input type="text" name="vote_item[]" class="form-control" id="'+addId+'" placeholder="选项'+addId+'"></div>';
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
    $('#vote_limit_number_div').remove();
	});

	$('#vote_type2').click(function(){
		var divnum = $('#vote_limit_number_div');
		if(!divnum.length){
			var addHtml = '<div class="form-group" id="vote_limit_number_div"><br><label for="vote-topic">限投票数:</label><input type="text" name="vote_limit_number" class="form-control" placeholder="限投票数"></div>';
			$('#vote_num_more').append(addHtml);
		}
	});

	$('.vote-item-more-info').click(function() {
		alert('ss');
	});
});