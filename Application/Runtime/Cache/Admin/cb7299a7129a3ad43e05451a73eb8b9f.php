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
<title>集采价格</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 集采价格 <span class="c-gray en">&gt;</span> 集采价格列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<input type="text" name="key" id="key" value="" placeholder="关键词名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="searchList()"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
	
	</span>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<th width="40">ID</th>
					<th width="90">材料名称</th>
					<th width="60">发布地址</th>
					<th width="60">材料品牌</th>
					<th width="60">材料描述</th>
					<th width="60">送货地址</th>
					<th width="60">公司名称</th>
					<th width="60">缩略图</th>
					<th width="90">发布时间</th>
					<th width="120">操作</th>
			</thead>
		
			<tbody id="cailiaoxunjia">
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
							<td><?php echo ($v['id']); ?></td>
							<td><?php echo ($v['m_name']); ?></td>
							<td class="text-l"><?php echo ($v['address']); ?></td>
							<td><?php echo ($v['brand']); ?></td>
							<td><?php echo ($v['m_introduce']); ?></td>
							<td><?php echo ($v['worker_address']); ?></td>
							<td><?php echo ($v['office_name']); ?></td>
							<td>
							<?php if(is_array($v['m_photo'])): foreach($v['m_photo'] as $key=>$i): ?><a href="http://wgcapp.wgc2013.com<?php echo ($i); ?>" target="_blank">
									<img onerror="src='http://wgcapp.wgc2013.com/Public/Uploads/nopic.png'" src="http://wgcapp.wgc2013.com<?php echo ($i); ?>" width="120" height="80" style="margin-right:10px;margin-bottom:10px;">	
									</a><?php endforeach; endif; ?>
							</td>
							<td class="td-status"><?php echo (date('Y-m-d : H:i:s',$v['addtime'])); ?></td>
							<td class="f-14 td-manage">
								<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/materialListe_user_del/id/<?php echo ($v['id']); ?>/user_id/<?php echo ($v['user_id']); ?>" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>
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