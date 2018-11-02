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
<title>会员申请列表</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户列表 <span class="c-gray en">&gt;</span> 会员申请列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	
	</span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
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
					<th width="100">积分</th>
					<th width="50">性别</th>
					<th width="200">更新时间</th>
					<th width="60">推荐状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><input type="checkbox" value="" name=""></td> 
						<td><?php echo ($v['user_id']); ?></td>
						<td class="text-l"><u style="cursor:pointer" class="text-primary" title="查看"><a href="javascript:;" onClick="picture_edit('<?php echo ($v['name']); ?>','/index.php/Admin/User/user_show/id/<?php echo ($v['user_id']); ?>','<?php echo ($v['user_id']); ?>')"><?php echo ($v['name']); ?></a></u></td>
						<td><?php echo ($v['postion']); ?></td>
						<td><?php echo ($v['user_name']); ?></td>
						<td><?php echo ($v['nianling']); ?></td>
						<td><?php echo ($v['bumen']); ?></td>
						<td><a href="<?php echo U('Advertisement/jifen',array('user_id'=>$v['user_id']));?>">积分<?php echo ($v['balance']); ?></a></td>
						<td><?php echo ($v['sex']); ?></td>
						<td><?php echo (date('Y-m-d H:i:s',$v['regtime'])); ?></td>
						
						<td class="td-status">
							<?php if($v['is_user'] == 2 ): ?><i class="Hui-iconfont" style="font-size:1.75rem;color:red" title="待审核中">&#xe6b4;</i><?php endif; ?>
						</td>
						<td class="f-14 td-manage">
							<a style="text-decoration:none" onClick="article_start(this,'<?php echo ($v['user_id']); ?>')" href="javascript:;"><i class="Hui-iconfont" style="font-size:1.75rem" title="设置通过">&#xe6cc;</i></a>
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



/*设置会员*/
function article_start(obj,id){
	layer.confirm('确认要设置推荐工人吗？',function(index){
		$.post("<?php echo U('User/is_user');?>",{id:id,is_user : 1}, function(data) {
			if(data.status == 1){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" href="javascript:;" title="取消推荐工人"><i class="Hui-iconfont">&#xe6b4;</i></a>');
				
				$(obj).remove();
				layer.msg(data.content,{icon: 1,time:1000});
			}else{
				layer.msg(data.content,{icon: 6,time:1000});
			}
			
		},'json');
		
	});
}
</script> 
</body>
</html>