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
<title>用户管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户列表 <span class="c-gray en">&gt;</span> 用户列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<?php if($_SESSION['wgcadmininfo']['fenxiaoshang_name'] == '' ): ?><a class="btn btn-primary radius" href="/index.php/Admin/Advertisement/userCate">全部</a>
			<a class="btn btn-primary radius" href="/index.php/Admin/Advertisement/userCate/type/1">百胜</a>
			<a class="btn btn-primary radius" href="/index.php/Admin/Advertisement/userCate/type/2">汉堡王</a>
			<a class="btn btn-primary radius" href="/index.php/Admin/Advertisement/userCate/type/3">麦当劳</a>
			<a class="btn btn-primary radius" href="/index.php/Admin/Advertisement/userCate/type/4">太平洋咖啡</a><?php endif; ?>
		 <form action="<?php echo U('Advertisement/userCate');?>" method="post" style="margin-top:20px;">
			  <input type="text" style="width:60%;" id="keyword" name="keyword" class="input-text" value="<?php echo ($keyword); ?>"/>
			  <input type="hidden" style="width:60%;" name="action_name" value="<?php echo ($action_name); ?>"/>
			  <input class="btn btn-secondary radius" type="submit" value="搜索用户">
		 </form>
	 
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
		<?php if($wgcadmininfo['fenxiaoshang_name'] == '' ): ?><a class="btn btn-primary radius" data-title="添加成员" _href="/index.php/Admin/Advertisement/user_add" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加成员</a><?php endif; ?>
	</span> 
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="150">ID</th>
					<th width="100">姓名</th>
					<th width="100">工种</th>
					<th width="150">手机</th>
					<th width="50">年龄</th>
					<th width="50">工龄</th>
					<th width="100">余额</th>
					<th width="100">积分</th>
					<th width="50">性别</th>
					<th width="200">更新时间</th>
					<th width="75">分类</th>
					<th width="75">会员</th>
					<th width="60">推荐状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><input type="checkbox" value="" name=""></td> 
						<td><?php echo ($v['user_id']); ?></td>
						<td class="text-l"><u style="cursor:pointer" class="text-primary" title="查看"><a href="javascript:;" onClick="picture_edit('<?php echo ($v['name']); ?>','/index.php/Admin/Advertisement/user_show/id/<?php echo ($v['user_id']); ?>','<?php echo ($v['user_id']); ?>')"><?php echo ($v['name']); ?></a></u></td>
						<td><?php echo ($v['postion']); ?></td>
						<td><?php echo ($v['user_name']); ?></td>
						<td><?php echo ($v['nianling']); ?></td>
						<td><?php echo ($v['bumen']); ?></td>
						<td><a href="<?php echo U('Advertisement/yue',array('user_id'=>$v['user_id']));?>"><?php echo ($v['balance']); ?>元</a></td>
						<td>
						<a href="<?php echo U('Advertisement/jifen',array('user_id'=>$v['user_id']));?>"><?php echo ($v['jifen']); ?>分</a>
						
						</td>
						<td><?php echo ($v['sex']); ?></td>
						<td><?php echo (date('Y-m-d H:i:s',$v['regtime'])); ?></td>
						
						<td>
							<?php echo ($v['type']); ?>
						</td>
						<td>
							<?php if($v['is_user'] == 1): ?><i class="Hui-iconfont" style="font-size:1.75rem;color:green" title="会员特权">&#xe6cc;</i>
							<?php elseif($v['is_user'] == 2): ?>
								<i class="Hui-iconfont" style="font-size:1.75rem;color:red" title="待审核中">&#xe6b4;</i><?php endif; ?>
						</td>
						<td class="td-status">
							<?php if($v['pais'] == 1 ): ?><span class="label label-success radius">已推荐</span><?php endif; ?>
						</td>
						<td class="f-14 td-manage">
							<?php echo ($v['pai']); ?>
							
							<a style="text-decoration:none" href="<?php echo U('Advertisement/bianji_user',array('id'=>$v['user_id']));?>" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
							<a style="text-decoration:none" href="<?php echo U('Advertisement/password_user',array('id'=>$v['user_id']));?>" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
							<?php if($_SESSION['wgcadmininfo']['fenxiaoshang_name'] == '' ): if($v['fenxiaoshang'] == 1): ?><a style="text-decoration:none" href="<?php echo U('Advertisement/bianji_fxs_quxiao',array('id'=>$v['user_id']));?>" title="取消分销商"><i class="Hui-iconfont">&#xe631;</i></a>
								<?php else: ?>
								
									<a style="text-decoration:none" href="<?php echo U('Advertisement/bianji_fxs',array('id'=>$v['user_id']));?>" title="设置为分销商"><i class="Hui-iconfont">&#xe6d3;</i></a><?php endif; endif; ?>
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


/*设置推荐工人*/
function article_stop(obj,id){

	layer.confirm('确认要取消推荐工人吗？',function(index){
		$.post("<?php echo U('Advertisement/pai');?>",{id:id,pai : 0}, function(data) {
			if(data.status == 1){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,'+id+')" href="javascript:;" title="设置推荐工人"><i class="Hui-iconfont">&#xe603;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">'+data.content+'</span>');
				$(obj).remove();
				layer.msg(data.content,{icon: 1,time:1000});
			}else{
				layer.msg(data.content,{icon: 6,time:1000});
			}
			
		},'json');
	});
	
	
}

/*取消推荐工人*/
function article_start(obj,id){
	layer.confirm('确认要设置推荐工人吗？',function(index){
		$.post("<?php echo U('Advertisement/pai');?>",{id:id,pai : 1}, function(data) {
			if(data.status == 1){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,'+id+')" href="javascript:;" title="取消推荐工人"><i class="Hui-iconfont">&#xe6de;</i></a>');
				
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">'+data.content+'</span>');
				$(obj).remove();
				layer.msg(data.content,{icon: 1,time:1000});
			}else{
				layer.msg(data.content,{icon: 6,time:1000});
			}
			
		},'json');
		
	});
}
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
</script> 
</body>
</html><!--L