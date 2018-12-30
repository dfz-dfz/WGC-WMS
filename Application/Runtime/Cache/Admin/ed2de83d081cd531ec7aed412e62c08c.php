<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/HUI/lib/html5.js"></script>
<script type="text/javascript" src="/Public/HUI/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/HUI/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/HUI/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>项目子分类详细</title>
<style type="text/css">
li{overflow:hidden;height:auto;margin:10px 0;width:98%;border:1px solid #999;padding:1%;border-radius:5px;}
li .userleft{height:100%;overflow:hidden;width:5%;margin-right:1%;float:left;}
li .userleft img{height:80px;overflow:hidden;width:80px;}
li .userright{height:100%;overflow:hidden;width:92%;float:left;}
li .userright .name{border-bottom:1px dashed #ccc;height:30px;line-height:30px;overflow:hidden;width:100%;margin:0 auto;font-size:14px;color:#333;text-align:left;}
li .userright .content{height:auto;overflow:hidden;width:100%;margin:0 auto;font-size:16px;color:#333;text-align:left;padding:10px 0;}
li .userright .content img{height:auto;overflow:hidden;max-width:100%;margin:0 auto;}
li .userright .time{border-top:1px dashed #ccc;height:30px;line-height:30px;overflow:hidden;width:100%;margin:0 auto;font-size:16px;color:#999;text-align:left;}
</style>
</head>
<body>
<div class="page-container">
	
	<br>
	<br>
	<p class="c-black">    <span style="color:#666">项目名称：</span><?php echo ($list['prj_name']); ?></p>
	<p class="c-black">    <span style="color:#666">项目创建人：</span><?php echo ($list['uname']); ?></p>
	<p class="c-black">    <span style="color:#666">发布人：</span><?php echo ($list['jsr']); ?></p>
	<p class="c-black">    <span style="color:#666">地 址：</span><?php echo ($list['address']); ?></p>
	<p class="c-black">    <span style="color:#666">进度描述：</span><?php echo ($list['jindutxt']); ?></p>
	<p class="c-black">    <span style="color:#666">图 片：</span><?php echo ($list['Photo']); ?></p>
	<p class="c-black">    <span style="color:#666">接收人：</span><?php echo ($list['user_name']); ?></p>
	<br>
	<br>
	<p class="c-black">    <span style="color:#666">发布日期：</span><?php echo ($list['addtime']); ?></p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">回复列表</th>
			
		</thead>
		<tbody>
		</tbody>
	</table>
	<br>
	<ul>
		
		
		<?php if(is_array($retData)): foreach($retData as $key=>$v): ?><li>
			<div class="userleft"><img src="http://wgcapp.59jiaju.com<?php echo ($v['userphoto']); ?>"/></div>	
			<div class="userright">
				<p class="name">姓名：<?php echo ($v['name']); ?></p>
				<p class="content">
				
					<?php echo ($v['content']); ?>
					<?php echo ($v['pic']); ?>
				</p>
				<p class="time">回复时间：<?php echo (date('Y-m-d H:i:s',$v['addtime'])); ?></p>
			</div>	
		</li><?php endforeach; endif; ?>
	</ul>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>
			<br>
			Copyright &copy;2017 经艺装饰设计工程有限公司 v1.0 All Rights Reserved.<br>
			本后台系统由<a href="http://www.59jiaju.com/" target="_blank" title="经艺装饰设计工程有限公司">经艺装饰设计工程有限公司</a>提供技术支持
		</p>
	</div>
</footer>
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 

</body>
</html>