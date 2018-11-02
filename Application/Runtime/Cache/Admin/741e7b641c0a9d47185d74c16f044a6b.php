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
<style type="text/css">
.b-page {
    background: #fff;
    box-shadow: 0px 1px 2px 0px #E2E2E2;
}
.page {
    width: 90%;
    padding: 30px 15px;
    background: #FFF;
    text-align: right;
    overflow: hidden;
}
.page .first,
.page .prev,
.page .current,
.page .num,
.page .current,
.page .next,
.page .end {
    padding: 1px 8px;
    margin: 0px 5px;
    display: inline-block;
    color: #008CBA;
    border: 1px solid #F2F2F2;
    border-radius: 5px;
}
.page .first:hover,
.page .prev:hover,
.page .current:hover,
.page .num:hover,
.page .current:hover,
.page .next:hover,
.page .end:hover {
    text-decoration: none;
    background: #F8F5F5;
}
.page .current {
    background-color: #008CBA;
    color: #FFF;
    border-radius: 5px;
    border: 1px solid #008CBA;
}
.page .current:hover {
    text-decoration: none;
    background: #008CBA;
}
.page .not-allowed {
    cursor: not-allowed;
}
</style>
<title>通讯录</title>
</head>
<body>
<div class="page-container">
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="9" scope="col">注册人员（<?php echo ($count); ?>）</th>
			</tr>
			<tr class="text-c">

				<th>编号</th>
				<th>头像</th>
				<th>姓名</th>
				<th>手机号码</th>
				<th>工种</th>
				<th>备注</th>
				<th>注册时间</th>
				<th>操作</th>
				<th>详情</th>
				 
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($info)): foreach($info as $key=>$v): ?><tr class="text-c">
					<th><?php echo ($v['user_id']); ?></th>
					<th><a target="_blank" href="http://wgcapp.59jiaju.com/<?php echo ($v['userphoto']); ?>"><img style="width:40px;height:40px;" src="http://wgcapp.59jiaju.com/<?php echo ($v['userphoto']); ?>"/></a></th>
					<th><?php echo ($v['name']); ?></th>
					<th><?php echo ($v['user_name']); ?></th>
					<th><?php echo ($v['zhiwei']); ?></th>
					<th><?php echo htmlspecialchars_decode($v['beizhu']);?></th>
					<th><?php echo (date("Y-m-d H:i",$v['regtime'])); ?></th>
					<th><a style="color:red" href="<?php echo U('Maillist/beizhu',array('id'=>$v['user_id']));?>">添加备注</a></th>
					<th><?php echo ($v['$select']); ?></th>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	<div class="page b-page"><?php echo ($page); ?></div>
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