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
<title>我的桌面</title>
</head>
<body>

<div class="page-container">
	<p>用户列表</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">统计<span style="color:red;font-size:22px;">（<?php echo count($user);?>）</span>人</th>
			</tr>
			<tr class="text-c">
				<th>编号</th>
				<th>姓名</th>
				<th>手机号</th>
				<th>职位</th>
				<th>注册时间</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($user)): foreach($user as $key=>$v): ?><tr class="text-c">
					<td><?php echo ($v['user_id']); ?></td>
					<td><?php echo ($v['name']); ?></td>
					<td><?php echo ($v['user_name']); ?></td>
					<td><?php echo ($v['zhiwei']); ?></td>
					<td><?php echo (date('Y-m-d H:i:s',$v['regtime'])); ?></td>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	
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