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
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">
			.pages{
				margin:20px auto;
			}
			.pages a,.pages span {  
                display: inline-block;  
                padding: 2px 5px;  
                margin: 0 1px;  
                border: 1px solid #f0f0f0;  
                -webkit-border-radius: 3px;  
                -moz-border-radius: 3px;  
                border-radius: 3px;  
            }  
              
            .pages a,  
            .pages li {  
                display: inline-block;  
                list-style: none;  
                text-decoration: none;  
                color: #58A0D3;  
            }  
              
            .pages a.first,  
            .pages a.prev,  
            .pages a.next,  
            .pages a.end {  
                margin: 0;  
            }  
              
            .pages a:hover {  
                border-color: #50A8E6;  
            }  
              
            .pages span.current {  
                background: #50A8E6;  
                color: #FFF;  
                font-weight: 700;  
                border-color: #50A8E6;  
            } 

</style>
<title>优惠券管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 优惠券管理 <span class="c-gray en">&gt;</span> 优惠券列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		
		 <form action="<?php echo U('Coupons/index');?>" method="post" style="margin-top:20px;">
			  <input type="text" style="width:60%;" id="keyword" name="company" class="input-text" value="<?php echo ($company); ?>" placeholder="请输入公司名称"/>
			  <input class="btn btn-secondary radius" type="submit" value="搜索">
		 </form>
	 
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="50">ID</th>
					<th width="80">发布优惠券公司名称</th>
					<th width="80">发布者名称</th>
					<th width="80">优惠券价格</th>
					<th width="50">优惠券数量</th>
					<th width="80">优惠券有效期</th>
					<th width="80">有效联系电话</th>
					<th width="80">优惠券被领取数量</th>
					<th width="80">优惠券类型</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><?php echo ($v['id']); ?></td>
						<td><?php echo ($v['company']); ?></td>
						<td><?php echo ($v['user_name']); ?></td>
						<td><?php echo ($v['price']); ?></td>
						<td><?php echo ($v['number']); ?></td>
						<td><?php echo ($v['indate']); ?></td>
						<td><?php echo ($v['phone']); ?></td>
						<td><?php echo ($v['counts']); ?></td>
						<td><?php echo ($v['type']); ?></td>
						
						<td class="f-14 td-manage">
						<a style="text-decoration:none" href="<?php echo U('Coupons/update',array('id'=>$v['id']));?>" title="修改">修改</a>
							|<a style="text-decoration:none" href="<?php echo U('Coupons/del',array('id'=>$v['id']));?>" title="删 除">删 除</a>
							
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	 <div class="pages"><?php echo ($page); ?></div> 
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 

<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>