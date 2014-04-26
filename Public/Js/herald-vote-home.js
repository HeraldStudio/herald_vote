jQuery(document).ready(function($) {
	$('#submit_vote').click(function() {
	  var voteid = $('#vote_id').val();
	  var displaytype = $('#vote_diaplay_type').val();
	  var values = {};
	  var key = -1;
	  $('input[name=userselect]:checked').each(function(index,value){
	  	values[index] = $(value).val();
	  	key = index;
	  });
	  if(key == -1){
	  	$('#remes').empty();
	  	var addhtml = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>您还未选择！</div>'
	  	$('#remes').append(addhtml);
	  	return;
	  }
	  if(key >= $('#vote_limit').val()){
	  	$('#remes').empty();
	  	var addhtml = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>您的选择超过了投票设定的数目，无法提交数据，请重新选择!</div>'
	  	$('#remes').append(addhtml);
	  	return;
	  }
	  ajax(voteid,values,displaytype);
	});
	$('.vote-btn-sub').click(function() {
		var voteid = $('#vote_id').val();
		var displaytype = $('#vote_diaplay_type').val();
		var values = {};
		values[0] = $(this).attr('id');
		ajax(voteid,values,displaytype);
	});
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

function ajax(voteid, values, displaytype){
	$.ajax({
  	url: '/herald_vote/index.php/Home/Index/vote',
  	type: 'post',
  	dataType: 'text',
  	data: {
  		'vote_id': voteid,
  		'item_info': values
    },
    success: function(data){
    	var result = JSON.parse(data);
    	var addhtml = '<div class="alert alert-'+result.type+' fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+result.content+'</div>'
      $('#remes').empty();
      $('#remes').append(addhtml);
      if(displaytype == "text"){
      	textresponse(result);
      }else{
				picresponse(result);
      }
    },
  });
}

function textresponse(result){
	if(result.type == 'success' && result.canvote == false){
			$('input[name=userselect]').hide('fast');
			$('#submit_vote').hide('fast');
		}
	if(result.type == 'success'){
		$.each(result.lastresult, function (index,value){
			$("#pro_bar_"+index).css({
				'width': Number(value)*100+'%',
			}).html(Number(value)*100+'%');
			$('input[name=userselect]:checked').each(function (){
				$(this).attr("checked",false);
			});
		});
		$.each(result.lastsupportnum, function (index, val) {
			 $("#support_num_"+index).html(val);
		});
	}
}

function picresponse(result){
	if((result.type == 'success' && result.canvote == false)||result.type == 'danger'){
		$(".vote-btn-sub").attr({
			"disabled": 'disabled'
		});
	}
	if(result.type == 'success'){
		$.each(result.lastsupportnum, function (index, val) {
			 $("#support_num_"+index).html(val);
		});
	}
	console.log(result.canvote);
}