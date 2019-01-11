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
<script type="text/javascript" src="/Public/HUI/static/lib/html5.js"></script>
<script type="text/javascript" src="/Public/HUI/static/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/HUI/static/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/css/style.css" />
<script type="text/javascript" src="/Public/laydate/laydate.js"></script> <!-- 改成你的路径 -->
<!--[if IE 6]>
<script type="text/javascript" src="/Public/HUI/static/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>考勤列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 考勤管理 <span class="c-gray en">&gt;</span> 考勤列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!--<div class="text-c"> 日期范围：
		
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name=""/>
		
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>-->
	<div class="text-c">
	<form action="<?php echo U('Kaoqing/index');?>" method="post">
	<input type="text" id="test1" style="width:180px" placeholder="请选择日期范围" class="input-text" name="time" value="<?php echo ($time); ?>">
	<button type="submit" class="btn btn-success" id="" name="">搜索</button>
	</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a href="/index.php/Admin/Kaoqing/export" class="btn btn-danger radius">
				 下载内部考勤
			</a> 
			<a href="/index.php/Admin/Kaoqing/exports" class="btn btn-danger radius">
				 下载项目考勤
			</a> 
		</span> 
		<span class="r" style="margin:0 20px;">
			内部考勤共有数据：<strong><?php echo count($list); ?></strong> 条
		</span> 
		
		<span class="r">
			项目考勤共有数据：<strong><?php echo count($qd); ?></strong> 条
		</span> 
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">考勤列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">编号</th>
				<th width="80">姓名</th>
				<th width="30">性别</th>
				<th width="100">职位</th>
				<th>手机</th>
				<th width="130">签到时间</th>
				<th width="100">签到地址</th>
				<th width="80">签退时间</th>
				<th width="100">签退地址</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td><?php echo ($v['id']); ?></td>
					<td><?php echo ($v['name']); ?></td>
					<td><?php echo ($v['sex']); ?></td>
					<td><?php echo ($v['zhiwei']); ?></td>
					<td><?php echo ($v['mobile']); ?></td>
					<td><?php echo ($v['to_date']); ?> <?php echo ($v['in_time']); ?></td>
					<td><?php echo ($v['out_adress']); ?></td>
					<td><?php echo ($v['out_time']); ?></td>
					<td><?php echo ($v['out_adress']); ?></td>
				</tr><?php endforeach; endif; ?>
			
			
		</tbody>
	</table>
</div>
<script type="text/javascript" src="/Public/HUI/static/lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="/Public/HUI/static/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> 
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
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
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
//执行一个laydate实例 日期插件
laydate.render({
  elem: '#test1' //指定元素
  ,range: '~'
  ,done: function(value, date, endDate){
    console.log(value); //得到日期生成的值，如：2017-08-18
    console.log(date); //得到日期时间对象：{year: 2017, month: 8, date: 18, hours: 0, minutes: 0, seconds: 0}
    console.log(endDate); //得结束的日期时间对象，开启范围选择（range: true）才会返回。对象成员同上。
  }
});
</script>
</body>
</html>