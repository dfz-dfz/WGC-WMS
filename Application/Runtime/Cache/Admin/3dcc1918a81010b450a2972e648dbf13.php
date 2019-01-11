<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
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
<script type="text/javascript" src="/Public/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>内部管理-成员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 内部管理 <span class="c-gray en">&gt;</span> 成员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">成员列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="100">Userid</th>
				<th width="150">登录名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th>头像</th>
				<th>职位</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
					<td><?php echo ($v['id']); ?></td>
					<td><?php echo ($v['user_id']); ?></td>
					<td><?php if($v['user_id'] == $new_id['user_id']): ?><span style="margin-right:10px;color:red;font-size:22px;">(群主)-</span><?php endif; echo ($v['name']); ?></td>
					<td><?php echo ($v['user_name']); ?></td>
					<td><?php echo ($v['email']); ?></td>
					<td><img src="http://wgcapp.59jiaju.com<?php echo ($v['userphoto']); ?>" style="width:50px;height:50px;"/></td>
					<td><?php echo ($v['zhiwei']); ?></td>
					<td class="td-manage">
						<!--<?php if($v['user_id'] != $new_id['user_id']): ?><a title="移除成员" href="javascript:;" onclick="admin_del('<?php echo ($v['intermid']); ?>','<?php echo ($new_id['group_id']); ?>',<?php echo ($v['user_id']); ?>)" class="ml-5" style="text-decoration:none"><i style="font-size:18px;" class="Hui-iconfont">&#xe6e2;</i></a><?php endif; ?>-->
						<a title="设置为群主" href="javascript:;" onclick="admin_qz('<?php echo ($v['intermid']); ?>','<?php echo ($new_id['group_id']); ?>',<?php echo ($v['user_id']); ?>)" class="ml-5" style="text-decoration:none"><i style="font-size:18px;" class="Hui-iconfont">&#xe68f;</i></a>
						<a title="移除成员" href="javascript:;" onclick="admin_del('<?php echo ($v['intermid']); ?>','<?php echo ($new_id['group_id']); ?>',<?php echo ($v['user_id']); ?>)" class="ml-5" style="text-decoration:none"><i style="font-size:18px;" class="Hui-iconfont">&#xe6e2;</i></a>
					</td>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	<div class="page b-page"><?php echo ($page); ?></div>
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(intermid,id,user_id){
	layer.confirm('确认要移除该成员吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		window.location.href = '/index.php/Admin/Xiangmu/nebu_user_del/intermid/'+intermid+'/group_id/'+id+'/user_id/'+user_id;
		
	});
}
/*管理员-设置为群主*/
function admin_qz(intermid,group_id,user_id){
	layer.confirm('确认要设置为群主吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		window.location.href = '/index.php/Admin/Xiangmu/neibu_user_qz/intermid/'+intermid+'/group_id/'+group_id+'/user_id/'+user_id;
		
	});
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
</script>
</body>
</html>