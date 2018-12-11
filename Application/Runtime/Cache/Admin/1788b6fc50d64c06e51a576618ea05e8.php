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
		<form action="/index.php/Admin/Advertising/advertising" method="post">
		
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
						<td>
							<?php if(($v['show_type'] == 1)): ?>banner1
								<?php elseif(($v['show_type'] == 2)): ?>banner2
								<?php elseif(($v['show_type'] == 3)): ?>banner3
								<?php elseif(($v['show_type'] == 4)): ?>首页广告1
								<?php elseif(($v['show_type'] == 5)): ?>首页广告2
								<?php elseif(($v['show_type'] == 6)): ?>首页广告3
								<?php elseif(($v['show_type'] == 7)): ?>首页广告4
								<?php elseif(($v['show_type'] == 8)): ?>首页广告5
								<?php elseif(($v['show_type'] == 9)): ?>首页广告6
								<?php elseif(($v['show_type'] == 10)): ?>行业资讯1
								<?php elseif(($v['show_type'] == 11)): ?>行业资讯2
								<?php elseif(($v['show_type'] == 12)): ?>行业资讯3
								<?php elseif(($v['show_type'] == 13)): ?>行业资讯4
								<?php elseif(($v['show_type'] == 14)): ?>行业资讯5
								<?php elseif(($v['show_type'] == 15)): ?>行业资讯6
								<?php elseif(($v['show_type'] == 16)): ?>行业资讯7
								<?php elseif(($v['show_type'] == 17)): ?>行业资讯8
								<?php elseif(($v['show_type'] == 18)): ?>行业资讯9
								<?php elseif(($v['show_type'] == 19)): ?>行业资讯10
								<?php elseif(($v['show_type'] == 20)): ?>热门职位1
								<?php elseif(($v['show_type'] == 21)): ?>热门职位2
								<?php elseif(($v['show_type'] == 22)): ?>热门职位3
								<?php elseif(($v['show_type'] == 23)): ?>热门职位4
								<?php elseif(($v['show_type'] == 24)): ?>热门职位5
								<?php elseif(($v['show_type'] == 25)): ?>热门职位6
								<?php elseif(($v['show_type'] == 26)): ?>热门职位7
								<?php elseif(($v['show_type'] == 27)): ?>热门职位8
								<?php elseif(($v['show_type'] == 28)): ?>维修报价1
								<?php elseif(($v['show_type'] == 29)): ?>维修报价2
								<?php elseif(($v['show_type'] == 30)): ?>维修报价3
								<?php elseif(($v['show_type'] == 31)): ?>维修报价4
								<?php elseif(($v['show_type'] == 32)): ?>维修报价5
								<?php elseif(($v['show_type'] == 33)): ?>维修报价6
								<?php elseif(($v['show_type'] == 34)): ?>维修报价7
								<?php elseif(($v['show_type'] == 35)): ?>维修报价8
								<?php elseif(($v['show_type'] == 36)): ?>材料采购1
								<?php elseif(($v['show_type'] == 37)): ?>材料采购2
								<?php elseif(($v['show_type'] == 38)): ?>材料采购3
								<?php elseif(($v['show_type'] == 39)): ?>材料采购4
								<?php elseif(($v['show_type'] == 40)): ?>材料采购5
								<?php elseif(($v['show_type'] == 41)): ?>材料采购6
								<?php elseif(($v['show_type'] == 42)): ?>材料采购7
								<?php elseif(($v['show_type'] == 43)): ?>材料采购8
								<?php elseif(($v['show_type'] == 44)): ?>材料推广1
								<?php elseif(($v['show_type'] == 45)): ?>材料推广2
								<?php elseif(($v['show_type'] == 46)): ?>材料推广3
								<?php elseif(($v['show_type'] == 47)): ?>材料推广4
								<?php elseif(($v['show_type'] == 48)): ?>材料推广5
								<?php elseif(($v['show_type'] == 49)): ?>材料推广6
								<?php elseif(($v['show_type'] == 50)): ?>材料推广7
								<?php elseif(($v['show_type'] == 51)): ?>材料推广8
								<?php elseif(($v['show_type'] == 52)): ?>材料询价1
								<?php elseif(($v['show_type'] == 53)): ?>材料询价2
								<?php elseif(($v['show_type'] == 54)): ?>材料询价3
								<?php elseif(($v['show_type'] == 55)): ?>材料询价4
								<?php elseif(($v['show_type'] == 56)): ?>材料询价5
								<?php elseif(($v['show_type'] == 57)): ?>材料询价6
								<?php elseif(($v['show_type'] == 58)): ?>材料询价7
								<?php elseif(($v['show_type'] == 59)): ?>材料询价8
								<?php elseif(($v['show_type'] == 60)): ?>工价询价1
								<?php elseif(($v['show_type'] == 61)): ?>工价询价2
								<?php elseif(($v['show_type'] == 62)): ?>工价询价3
								<?php elseif(($v['show_type'] == 63)): ?>工价询价4
								<?php elseif(($v['show_type'] == 64)): ?>工价询价5
								<?php elseif(($v['show_type'] == 65)): ?>工价询价6
								<?php elseif(($v['show_type'] == 66)): ?>工价询价7
								<?php elseif(($v['show_type'] == 67)): ?>工价询价8
								<?php elseif(($v['show_type'] == 68)): ?>设计分包1
								<?php elseif(($v['show_type'] == 69)): ?>设计分包2
								<?php elseif(($v['show_type'] == 70)): ?>设计分包3
								<?php elseif(($v['show_type'] == 71)): ?>设计分包4
								<?php elseif(($v['show_type'] == 72)): ?>设计分包5
								<?php elseif(($v['show_type'] == 73)): ?>设计分包6
								<?php elseif(($v['show_type'] == 74)): ?>设计分包7
								<?php elseif(($v['show_type'] == 75)): ?>设计分包8
								<?php elseif(($v['show_type'] == 76)): ?>项目分包1
								<?php elseif(($v['show_type'] == 77)): ?>项目分包2
								<?php elseif(($v['show_type'] == 78)): ?>项目分包3
								<?php elseif(($v['show_type'] == 79)): ?>项目分包4
								<?php elseif(($v['show_type'] == 80)): ?>项目分包5
								<?php elseif(($v['show_type'] == 81)): ?>项目分包6
								<?php elseif(($v['show_type'] == 82)): ?>项目分包7
								<?php elseif(($v['show_type'] == 83)): ?>项目分包8
								<?php elseif(($v['show_type'] == 84)): ?>建筑装饰公司1
								<?php elseif(($v['show_type'] == 85)): ?>建筑装饰公司2
								<?php elseif(($v['show_type'] == 86)): ?>建筑装饰公司3
								<?php elseif(($v['show_type'] == 87)): ?>建筑装饰公司4
								<?php elseif(($v['show_type'] == 88)): ?>建筑装饰公司5
								<?php elseif(($v['show_type'] == 89)): ?>建筑装饰公司6
								<?php elseif(($v['show_type'] == 90)): ?>材料商1
								<?php elseif(($v['show_type'] == 91)): ?>材料商2
								<?php elseif(($v['show_type'] == 92)): ?>材料商3
								<?php elseif(($v['show_type'] == 93)): ?>材料商4
								<?php elseif(($v['show_type'] == 94)): ?>材料商5
								<?php elseif(($v['show_type'] == 95)): ?>材料商6
								<?php else: ?> 其他<?php endif; ?>
						</td>
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