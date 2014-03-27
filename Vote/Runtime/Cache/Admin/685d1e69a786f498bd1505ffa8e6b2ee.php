<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>先声投票</title>
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/bootstrap.css" />
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
</body>
</html>