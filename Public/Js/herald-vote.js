jQuery(document).ready(function($) {
	$('#addmoreitem').click(function() {
		var lastid = $('#vote-item div:last-child>input').attr('id');
		
		for(var i = 1; i < 5; i++){
			var addId = Number(lastid)+Number(i);
			var addHtml = '<div class="input-group"><input type="text" name="vote_item_name['+addId+']" class="form-control" id="'+addId+'" placeholder="选项'+addId+'"><input type="hidden" name="vote_item_attach['+addId+']" id="vote_item_attach_'+addId+'"><div class="input-group-btn"><button type="button" class="btn btn-default uploadevent" tabindex="-1" data-toggle="modal" data-target="#model_upload" id="add_attach_'+addId+'">添加附件</button></div></div>';
			

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

$(document).ready(function(){
  $("#votepostuploader").uploadFile({
    url:"/herald_vote/index.php/Admin/Index/addVotePost/",
    allowedTypes:"jpg,png,gif,jpeg",
    showAbort:true,
    showPreivew:true,
    fileName:"vote_post",
    dragDrop:false,
    onSuccess:function(files,data,xhr,pd){
    	var uploadid = $('#uploadid').val();
    	var inputid = '#vote_item_attach_'+uploadid;
    	var btnid = '#add_attach_'+uploadid;
      $(inputid).val(data);
      $(btnid).html('添加成功').removeClass('btn-default').removeAttr('data-target').addClass('btn-success');
		}
  });

  $('#vote_post_name').click(function() {
  	$('#uploadid').val(0);
  });

  $('body').on('click','.uploadevent', function() {
    var upid = $(this).parent('div').parent('div').children('input[type=text]').attr('id');
    console.log($(this).parent('div'));
    $('#uploadid').val(upid);
  });

  // $('.uploadevent').click(function() {
  // 	var upid = $(this).parent('div').parent('div').children('input[type=text]').attr('id');
  // 	console.log($(this).parent('div'));
  //   $('#uploadid').val(upid);
  // });
  $('.delete_vote').click(function() {
  	var delid = $(this).attr('id');
  	$.ajax({
  		url: '/herald_vote/index.php/Admin/Index/deleteVote/',
  		type: 'post',
  		data: {'vote_id': delid},
  		success:function(data){
  			$('#vote_info_tr_'+delid).hide("slow");
  		},
  	})
  });
});