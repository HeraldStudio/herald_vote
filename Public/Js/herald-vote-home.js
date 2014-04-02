jQuery(document).ready(function($) {
	$('#submit_vote').click(function() {
	  var voteid = $('#vote_id').val();
	  //var itemid = JSON.stringify($('input[name=userselect]:checked'));
	  //console.log(itemid);
	  var values = [];
	  $('input[name=userselect]:checked').each(function(index,value){
	  	values[index] = $(value).val();
	  });
	  if(values.length == 0){
	  	$('#remes').empty();
	  	var addhtml = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>您还未选择！</div>'
	  	$('#remes').append(addhtml);
	  	return;
	  }
	  var iteminfo = JSON.stringify(values);
	  //console.log(iteminfo);
	  // if(itemid == undefined){
	  // 	$('#remes').empty();
	  // 	var addhtml = '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>您还未选择！</div>'
	  // 	$('#remes').append(addhtml);
	  // 	return;
	  // }
	  $.ajax({
	  	url: '/herald_vote/index.php/Home/Index/vote',
	  	type: 'post',
	  	dataType: 'json',
	  	data: {
	  		'vote_id': voteid,
	  		'item_info': iteminfo
	    },
	    success: function(data){
	    	// var addhtml = '<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>投票成功，感谢您的参与！</div>'
      //   $('#remes').empty();
      //   $('#remes').append(addhtml);
      //   $('input[name=userselect]').hide('fast');
      console.log(data);
	    },
	    error: function(){
	    	console.log('errot');
	    }
	  });
	});
});