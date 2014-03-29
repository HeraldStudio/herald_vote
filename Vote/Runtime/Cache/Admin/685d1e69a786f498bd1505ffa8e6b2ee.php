<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>先声投票</title>
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/style.css" />
</head>
<body>
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
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
	  <div class="col-md-3">
	  	<div class="list-group left-nav">
	  		<a href="#my-join" class="list-group-item">我参与的投票</a>
	  		<a href="#my-create" class="list-group-item">我发布的投票</a>
	  		<a href="#create" class="list-group-item">发布投票</a>
	  	</div>
	  </div>
	  <div class="col-md-9">
	  	<div class="right-content">
	  		<div id="my-join">
		  		<h1>我参与的投票</h1>
		  		<table class="table">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>First Name</th>
	              <th>Last Name</th>
	              <th>Username</th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr>
	              <td>1</td>
	              <td>Mark</td>
	              <td>Otto</td>
	              <td>@mdo</td>
	            </tr>
	            <tr>
	              <td>2</td>
	              <td>Jacob</td>
	              <td>Thornton</td>
	              <td>@fat</td>
	            </tr>
	            <tr>
	              <td>3</td>
	              <td>Larry</td>
	              <td>the Bird</td>
	              <td>@twitter</td>
	            </tr>
	          </tbody>
        	</table>
		  	</div>
		  	<hr>
		  	<div id="my-create">
		  		<h1>我发布的投票</h1>
		  		<table class="table">
	          <thead>
	            <tr>
	              <th>#</th>
	              <th>First Name</th>
	              <th>Last Name</th>
	              <th>Username</th>
	            </tr>
	          </thead>
	          <tbody>
	            <tr>
	              <td>1</td>
	              <td>Mark</td>
	              <td>Otto</td>
	              <td>@mdo</td>
	            </tr>
	            <tr>
	              <td>2</td>
	              <td>Jacob</td>
	              <td>Thornton</td>
	              <td>@fat</td>
	            </tr>
	            <tr>
	              <td>3</td>
	              <td>Larry</td>
	              <td>the Bird</td>
	              <td>@twitter</td>
	            </tr>
	          </tbody>
	        </table>
		  	</div>
		  	<hr>
		  	<div id="create">
		  		<h1>发布投票</h1>
		  		<div class="vote-create">
		  			<form role="form" class="vote-create-form">
		  					<div class="form-group">
							    <label for="vote-topic">投票主题:</label>
							    <input type="text" name="topic" class="form-control" id="vote-topic" placeholder="投票主题">
							  </div>
							  <div class="form-group">
							    <label for="vote-description">详细描述:</label>
							    <textarea name="description" id="vote-description" class="form-control" placeholder="详细描述" rows="3"></textarea>
							  </div>
							  <div class="form-group">
							    <label for="vote-post">添加海报</label>
							    <input type="file" id="vote-post">
							  </div>
							  <hr>
							  <div id="vote-item">
							  	<div class="form-group">
								    <label for="vote-topic">选项1:</label>
								    <input type="text" name="vote_item_1" class="form-control" id="1" placeholder="选项1">
								  </div>
								  <div class="form-group">
								    <label for="vote-topic">选项2:</label>
								    <input type="text" name="vote_item_2" class="form-control" id="2" placeholder="选项2">
								  </div>
								  <div class="form-group">
								    <label for="vote-topic">选项3:</label>
								    <input type="text" name="vote_item_3" class="form-control" id="3" placeholder="选项3">
								  </div>
								  <div class="form-group">
								    <label for="vote-topic">选项4:</label>
								    <input type="text" name="vote_item_4" class="form-control" id="4" placeholder="选项4">
								  </div>
							  </div>
							  <a href="javascript:void(0);" id="addmoreitem"><span class="glyphicon glyphicon-plus"></span>增加更多选项</a><br><br>
								<label for="vote-topic">截止日期:</label>
								<div class="input-group date">
  								<input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
								</div><br>
								<label for="vote-topic">可投选项:</label>
								<div class="radio">
								  <label>
								    <input class="vote-type" type="radio" name="vote_type" id="vote_type1" value="1" checked>
								    单选
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input class="vote-type" type="radio" name="vote_type" id="vote_type2" value="2">
								    多选
								  </label>
								</div>
								<button type="submit" class="btn btn-success">发布投票</button>
						</form>
		  		</div>
		  	</div>
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
<script type="text/javascript" src="/herald_vote/Public/Js/datepicker.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/herald-vote.js"></script>
</body>
</html>