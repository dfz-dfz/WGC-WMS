<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>广告管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<form action="/index.php/Admin/Advertising/weixiu" method="post">
		
			<input type="text" name="key" value="<?php echo ($key); ?>" placeholder="关键词名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
	
	</span> 
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="150">公司名称</th>
					<th width="120">图片</th>
					
					<th width="60">公司网址</th>
					<th width="40">显示位置</th>
					<th width="40">是否显示</th>
					<th width="60">发布时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			
			<tbody>
			
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><?php echo ($v['id']); ?></td>
						<td><?php echo ($v['company_name']); ?></td>
						<td><img src="<?php echo ($v['pic']); ?>" width="120" height="50"/></td>
						
						<td><?php echo ($v['company_url']); ?></td>
						<td><?php echo ($v['show_type']); ?></td>
						<td>
							<?php if(($v['show'] == 1)): ?>显示
								<?php else: ?> 不显示<?php endif; ?>
						</td>
						<td><?php echo (date('Y-m-d : H:i:s',$v['addtime'])); ?></td>
						<td class="td-status"><?php echo ($v['status']); ?>
							<a href="javascript:(void)">
								<?php if(($v['show'] == 1)): ?><a style="color:red;padding-right:50px;"  href="<?php echo U('Advertising/setStatus',array('id'=>$v['id'],'show'=>2));?>">关闭</a>
									<?php else: ?> <a style="color:red;padding-right:50px;"  href="<?php echo U('Advertising/setStatus',array('id'=>$v['id'],'show'=>1));?>">显示</a><?php endif; ?>
							</a>
							<a href="<?php echo U('Advertising/del',array('id'=>$v['id']));?>" style="color:red;">删除</a>
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
<script type="text/javascript">

</script> 
</body>
</html>