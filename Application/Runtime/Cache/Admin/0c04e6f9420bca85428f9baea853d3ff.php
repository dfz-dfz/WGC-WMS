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
<title>工程头条列表</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 工程头条 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	
	<a class="btn btn-primary radius" data-title="添加案例" _href="/index.php/Admin/Headline/adds" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加工程头条</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>标题</th>
					<th width="120">缩略图</th>
					<th width="80">分类</th>
					<th width="80">来源</th>
					<th width="80">区域</th>
					<th width="120">更新时间</th>
					<th width="75">浏览次数</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><input type="checkbox" value="" name=""></td>
						<td><?php echo ($v['id']); ?></td>
						<td class="text-l"><u style="cursor:pointer" class="text-primary" title="查看"><?php echo ($v['title']); ?></u></td>
						<td><img src="<?php echo ($v['pic']); ?>" style="width:100px;height:100px;"/></td>
						<td>
						
							<a href="<?php echo U('Headline/listas',array('id'=>$v['id']));?>">
								<?php if($v['type'] == 10): ?>机电安装
								<?php elseif($v['type'] == 11): ?>
									建筑装修
								<?php elseif($v['type'] == 12): ?>
									消防
								<?php elseif($v['type'] == 13): ?>
									环保
								<?php elseif($v['type'] == 14): ?>
									材料
								<?php elseif($v['type'] == 15): ?>
							       家具
								<?php elseif($v['type'] == 52): ?>
							       资讯
								<?php elseif($v['type'] == 33): ?>
							       公司资质
							    <?php elseif($v['type'] == 34): ?>
							       设计师团队
								<?php elseif($v['type'] == 35): ?>
							       项目管理团队
								<?php elseif($v['type'] == 36): ?>
							       餐饮
								<?php elseif($v['type'] == 37): ?>
							       写字楼
								<?php elseif($v['type'] == 38): ?>
							       酒店
								<?php elseif($v['type'] == 40): ?>
							       汽车
								<?php elseif($v['type'] == 41): ?>
							       房地产
								<?php elseif($v['type'] == 42): ?>
							       家居
								<?php elseif($v['type'] == 43): ?>
							       专卖店
								<?php elseif($v['type'] == 44): ?>
							       政府
								<?php elseif($v['type'] == 45): ?>
							       外资
								<?php elseif($v['type'] == 52): ?>
							       公司案例
								<?php elseif($v['type'] == 53): ?>
							       公司简介
								<?php elseif($v['type'] == 27): ?>
							       设计规范
								<?php elseif($v['type'] == 28): ?>
							       施工规范
								<?php elseif($v['type'] == 29): ?>
									2.0R1版
								<?php elseif($v['type'] == 30): ?>
							       2020版
								<?php elseif($v['type'] == 31): ?>
							       装饰定额
								<?php elseif($v['type'] == 32): ?>
							       常见问题
								<?php elseif($v['type'] == 46): ?>
							       公司资质
								<?php elseif($v['type'] == 47): ?>
							       设计师团队
								<?php elseif($v['type'] == 48): ?>
							       项目管理团队
								<?php elseif($v['type'] == 49): ?>
							       家居
								<?php elseif($v['type'] == 50): ?>
							       别墅
								<?php elseif($v['type'] == 51): ?>
							       其他
								<?php elseif($v['type'] == 55): ?>
							       行业资讯
								<?php elseif($v['type'] == 56): ?>
							       猜你喜欢<?php endif; ?>
							</a>
						
						</td>
						<td><?php echo ($v['laiyuan']); ?></td>
						<td><?php echo ($v['city']); ?></td>
						<td><?php echo (date('Y-m-d H:i:s',$v['times'])); ?></td>
						<td></td>
						<td class="td-status"><span class="label label-success radius">已发布</span></td>
						<td class="f-14 td-manage">
							
							<a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php echo ($v['id']); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
							<a href="<?php echo U('Headline/bianji',array('id'=>$v['id']));?>">编辑</a>
						</td>
					</tr><?php endforeach; endif; ?>
				
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
	]
});

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*资讯-删除*/
function article_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.post("<?php echo U('Headline/del');?>",{id:id}, function(data) {
			if(data.status == 1){
				$(obj).parents("tr").remove();
				window.location.reload();
			}else{
				alert('删除失败！');
				window.location.reload();
			}
			
		},'json');
		
	});
}

/*资讯-审核*/
function article_shenhe(obj,id){
	layer.confirm('审核文章？', {
		btn: ['通过','不通过','取消'], 
		shade: false,
		closeBtn: 0
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布', {icon:6,time:1000});
	},
	function(){
		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
		$(obj).remove();
    	layer.msg('未通过', {icon:5,time:1000});
	});	
}
/*资讯-下架*/
function article_stop(obj,id){
	layer.confirm('确认要下架吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
		$(obj).remove();
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*资讯-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
		$(obj).remove();
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*资讯-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

</script> 
</body>
</html>