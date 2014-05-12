<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>先声投票</title>
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/sb-admin.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="/herald_vote/Public/Css/style-admin.css" />
</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="#">先声投票</a>
	  </div>

	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav side-nav">
	      <li><a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-dashboard"></i> 我发起的投票</a></li>
	      <li><a href="<?php echo U('Admin/Index/myjoin');?>"><i class="fa fa-bar-chart-o"></i> 我参与的投票</a></li>
	      <li><a href="<?php echo U('Admin/Index/publish');?>"><i class="fa fa-table"></i> 发布投票</a></li>
	    </ul>

	    <ul class="nav navbar-nav navbar-right navbar-user">
	      <li class="dropdown user-dropdown">
	      	<?php if($loginuserinfo == true): ?><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;<?php echo ($loginuserinfo[1]); ?><b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="javascript:void(0);" class="logout"><i class="fa fa-power-off"></i>&nbsp;登出</a></li>
		        </ul><?php endif; ?>
	      </li>
	    </ul>
	  </div>
	</nav>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>我发起的投票 <small>Statistics Overview</small></h1>
      <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active"><i class="fa fa-edit"></i> Create</li>
      </ol>
    </div>
  </div><!-- /.row -->

  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped tablesorter">
          <thead>
            <tr class="success">
              <th>投票主题 <i class="fa fa-sort"></i></th>
              <th>限投票数 <i class="fa fa-sort"></i></th>
              <th>投票状态 <i class="fa fa-sort"></i></th>
              <th>更多操作 <i class="fa fa-sort"></i></th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($voteinfo)): $i = 0; $__LIST__ = $voteinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="notice" id="vote_info_tr_<?php echo ($vo["id"]); ?>">
                <td><a href="http://herald.seu.edu.cn/herald_vote/index.php/home/index/voteitem/voteid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["topic"]); ?></a></td>
                <td><?php echo ($vo["limit"]); ?></td>
                <td><?php echo ($vo["state"]); ?></td>
                <td><button class="btn btn-danger delete_vote" id="<?php echo ($vo["id"]); ?>">删除</button></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- <footer>
	<hr>
	<center>
		<p>&copy; 2001-2014 <a href="http://herald.seu.edu.cn">herald.seu.edu.cn</a> All rights reserved.

</p>
	</center>
</footer> -->
</div><!-- /#wrapper -->
<script type="text/javascript" src="/herald_vote/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/datepicker.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/fileupload.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/bootstrap.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/tablesorter.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/tabls.js"></script>
<script type="text/javascript" src="/herald_vote/Public/Js/logout.js"></script>

<script type="text/javascript" src="/herald_vote/Public/Js/herald-vote.js"></script>
</body>
</html>