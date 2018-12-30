<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/admin/lib/html5.js"></script>
<script type="text/javascript" src="/Public/admin/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/css/page.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>无活找工</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 无活找工 <span class="c-gray en">&gt;</span> 无活找工列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<form action="<?php echo U('Baojia/wuhuozhaogong');?>" method="post">
		<input type="text" name="key" id="key" value="<?php echo ($key); ?>" placeholder="关键词名称" style="width:250px" class="input-text">
		<button class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
	
	</span>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="60">姓名</th>
					<th width="60">年龄</th>
					<th width="60">工种</th>
					<th width="180">目前所在地</th>
					<th width="120">联系方式</th>
					<th width="40">发布时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody id="wuhuozhaogong">
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
					<td><?php echo ($v['id']); ?></td>
					<td style="color:red;font-weight:600;"><?php echo ($v['name']); ?></td>
					<td><?php echo ($v['age']); ?></td>
					<td><?php echo ($v['postion']); ?></td>
					<td><?php echo ($v['xiangxi']); ?></td>
					<td><?php echo ($v['phone_tel']); ?></td>
					<td><?php echo (date('Y-m-d : H:i:s',$v['addtime'])); ?></td>
					<td class="f-14 td-manage">
					<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/jingyi.php/Home/Jymember/getqiuzhi_del/id/<?php echo ($v['id']); ?>/user_id/<?php echo ($v['user_id']); ?>" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>
					</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
		<div class="page b-page"><?php echo ($page); ?></div>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>  
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>

</body>
</html>