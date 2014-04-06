<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>先声投票</title>
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/style-home.css" />
</head>
<body>
	<header class="navbar navbar-default bs-docs-nav" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a href="../" class="navbar-brand">先声投票</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="http://herald.seu.edu.cn">先声首页</a>
					</li>
					<li>
						<a href="http://herald.seu.edu.cn/about/">关于我们</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
<div class="container">
	<div class="row">
	  <div class="col-md-8">
	  	<div class="vote-info-item">
				<h2 class="vote-topic"><span class="glyphicon glyphicon-stats"></span>&nbsp;<?php echo ($voteinfo["topic"]); ?></h2>
		  	<blockquote class="vote-description-block">
		  		<p class="vote-description"><?php echo ($voteinfo["description"]); ?></p>
		  		<div class="vote-owner">
		  			<span class="glyphicon glyphicon-user"></span>&nbsp;测试测
		  			<span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo ($voteinfo["expired_time"]); ?>&nbsp;
		  			<?php if($voteinfo.state): ?><span class="label label-success">正在进行</span>
		  			<?php else: ?>
		  				<span class="label label-danger">已结束</span><?php endif; ?>
		  		</div>
		  	</blockquote>
			</div>
			<br>
			<br>
			<input type="hidden" id="vote_id" value="<?php echo ($voteinfo["id"]); ?>">
			<input type="hidden" id="vote_limit" value="<?php echo ($voteinfo["limit"]); ?>">
			<input type="hidden" id="vote_diaplay_type" value="<?php echo ($voteinfo["displaytype"]); ?>">
			<div id="remes"></div>
			<?php switch($voteinfo["displaytype"]): case "text": if(is_array($voteinfo["voteitem"])): $i = 0; $__LIST__ = $voteinfo["voteitem"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><div class="row">
						  <div class="col-md-2 vote-item-name"><?php echo ($vi["name"]); ?></div>
						  <div class="col-md-8">
						  	<div class="progress">
								  <div class="progress-bar" id="pro_bar_<?php echo ($vi["id"]); ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($vi["resultcount"]); ?>%;">
								    <?php echo ($vi["resultcount"]); ?>%
								  </div>
								</div>
						  </div>
						  <div class="col-md-1" id="support_num_<?php echo ($vi["id"]); ?>"><?php echo ($vi["supportnum"]); ?></div>
						  <?php if($voteinfo["canvote"] == true): ?><div class="col-md-1">
							  	<div>
									  <label>
									  	<?php if($voteinfo["limit"] == 1): ?><input type="radio" name="userselect" value="<?php echo ($vi["id"]); ?>">
									  	<?php else: ?>
									  		<input type="checkbox" name="userselect" value="<?php echo ($vi["id"]); ?>"><?php endif; ?>
									  </label>
									</div>
							  </div><?php endif; ?>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<br>
					<br>
					<?php if($voteinfo["canvote"] == true): ?><button type="button" class="btn btn-success vote-btn" id="submit_vote">投票</button><?php endif; break;?>
				<?php case "picture": ?><div class="row">
						<?php if(is_array($voteinfo["voteitem"])): $i = 0; $__LIST__ = $voteinfo["voteitem"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4">
						    <div class="thumbnail">
						      <img src="/herald_vote/Uploads/<?php echo ($vi["attachment"]); ?>" alt="...">
						      <div class="caption">
						        <h3><?php echo ($vi["name"]); ?></h3>
						        <p><?php echo ($vi["description"]); ?></p>
						        <hr class="vote-divide">
						        <p>
						        	<?php if($voteinfo["canvote"] == true): ?><a href="javascript:void(0);" class="btn btn-primary vote-btn-pic" role="button" id="<?php echo ($vi["id"]); ?>">
							        		<span class="glyphicon glyphicon-thumbs-up"></span>
							        		&nbsp;顶起
							        	</a>
							        <?php else: ?>
							        	<a href="javascript:void(0);" class="btn btn-primary vote-btn-pic" role="button" id="<?php echo ($vi["id"]); ?>" disabled="disabled">
							        		<span class="glyphicon glyphicon-thumbs-up"></span>
							        		&nbsp;顶起
							        	</a><?php endif; ?>
						        	<span class="glyphicon glyphicon-align-right"></span>
						        	<span class="badge" id="support_num_<?php echo ($vi["id"]); ?>"><?php echo ($vi["supportnum"]); ?></span>
						        </p>
						      </div>
						    </div>
						  </div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div><?php break; endswitch;?>

	  </div>
	  <div class="col-md-3">
	  	<br>
	  	<br>
	  	<br>
	  	<h3>更多精彩投票...</h3>
	  	<br>
			<div class="list-group">
	  		<a href="" class="list-group-item">投票1</a>
	  		<a href="" class="list-group-item">投票2</a>
	  		<a href="" class="list-group-item">投票3</a>
	  		<a href="" class="list-group-item">投票4</a>
	  		<a href="" class="list-group-item">投票5</a>
	  	</div>
	  </div>
	</div>
</div>
<footer>
	<hr>
	<center>
		<p>&copy; 2001-2014 <a href="http://herald.seu.edu.cn">herald.seu.edu.cn</a> All rights reserved.

</p>
	</center>
</footer>

<script type="text/javascript" src="/herald_vote/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/bootstrap.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/herald-vote-home.js"></script>
</body>
</html>