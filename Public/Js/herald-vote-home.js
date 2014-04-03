jQuery(document).ready(function($) {
	$('#submit_vote').click(function() {
	  var voteid = $('#vote_id').val();
	  // /var itemid = JSON.stringify($('input[name=userselect]:checked'));
	  //console.log(itemid);
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
	  //var iteminfo = JSON.stringify(values);
	  // /console.log(values);
	  // if(itemid == undefined){
	  // 	$('#remes').empty();
	  // 	var addhtml = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>您还未选择！</div>'
	  // 	$('#remes').append(addhtml);
	  // 	return;
	  // }
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
        if(result.type == 'success' && result.remain <= 0){
        	$('input[name=userselect]').hide('fast');
        }
      	// /console.log(data);
	    },
	    error: function(data){
	    	//console.log(data.error());
	    }
	  });
	});
});