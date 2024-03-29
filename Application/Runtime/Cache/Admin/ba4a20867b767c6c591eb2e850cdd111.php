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
<title>项目管理列表</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理工具 <span class="c-gray en">&gt;</span> 项目管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<form action="/index.php/Admin/Xiangmu/xiangmu" method="post">
		
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
					<th width="40">群组ID</th>
					<th width="40">群主ID</th>
					<th width="150">项目名称</th>
					<th width="60">创建人</th>
					<th width="120">地址</th>
					<th width="60">开始时间</th>
					<th width="60">完工时间</th>
					<th width="40">状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody>
			
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><?php echo ($v['prj_id']); ?></td>
						<td><?php echo ($v['group_id']); ?></td>
						<td><?php echo ($v['user_id']); ?></td>
						<td><?php echo ($v['prj_name']); ?></td>
						<td class="text-l"><u style="cursor:pointer" class="text-primary" title="查看"><?php echo ($v['uname']); ?></u></td>
						<td><?php echo ($v['address']); ?></td>
						<td><?php echo ($v['start_time']); ?></td>
						<td><?php echo ($v['expire_time']); ?></td>
						<td class="td-status"><?php echo ($v['status']); ?></td>
						<td class="f-14 td-manage">
							
							<a title="删除项目" href="javascript:;" onclick="admin_del('<?php echo ($v['prj_id']); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/bianji',array('id'=>$v['prj_id'],'kzq'=>xiangmu));?>" title="编辑"><i style="margin:0 5px;font-size:18px" class=" Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_qiandao',array('kid'=>$v['prj_id']));?>" title="签到列表"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe637;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_jindu',array('kid'=>$v['prj_id'],'type'=>1));?>" title="进度列表"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe621;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_qingkuan',array('kid'=>$v['prj_id'],'type'=>1));?>" title="请款列表"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe63a;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_qingkuan',array('kid'=>$v['prj_id'],'type'=>2));?>" title="审批列表"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe6ab;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_jindu',array('kid'=>$v['prj_id'],'type'=>2));?>" title="质检列表"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe6bd;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_cailiaoshengou',array('kid'=>$v['prj_id']));?>" title="材料申购"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe6cf;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_jindu',array('kid'=>$v['prj_id'],'type'=>4));?>" title="安检"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe624;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_baoyan',array('kid'=>$v['prj_id']));?>" title="隐蔽报验"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe654;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_zhaopin',array('kid'=>$v['prj_id'],'gtype'=>3));?>" title="招聘"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe6c3;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_zhaogong',array('kid'=>$v['prj_id'],'gtype'=>3,'type'=>2));?>" title="招工"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe6c1;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Xiangmu/xiangmu_user',array('kid'=>$v['prj_id']));?>" title="成员列表"><i style="margin:0 5px;font-size:18px" class="Hui-iconfont">&#xe62b;</i></a>
							
						</td>
					</tr><?php endforeach; endif; ?>
				
			</tbody>
		</table>
		<div class="page b-page"><?php echo ($page); ?></div>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
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
/*管理员-删除*/
function admin_del(prj_id){
	layer.confirm('确认要删除整个项目吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		window.location.href = '/index.php/Admin/Xiangmu/xiangmu_del/prj_id/'+prj_id;
		
	});
}
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
		$.post("<?php echo U('Advertisement/del');?>",{id:id}, function(data) {
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