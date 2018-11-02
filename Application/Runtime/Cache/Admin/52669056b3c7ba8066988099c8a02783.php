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
<title>材料商列表</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 材料商管理 <span class="c-gray en">&gt;</span> 材料商列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<form action="/index.php/Admin/Cailiaoshang/index" method="post">
			<span class="select-box inline">
				<select name="type" class="select">
					<option value="1" <?php if($type == 1){echo "selected";}?>>姓名</option>
					<option value="2" <?php if($type == 2){echo "selected";}?>>公司名称</option>
					<option value="3" <?php if($type == 3){echo "selected";}?>>职位</option>
					<option value="4" <?php if($type == 4){echo "selected";}?>>手机号码</option>
				</select>
			</span>
			<input type="text" name="key" value="<?php echo ($key); ?>" placeholder="关键词名称" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
		</form>
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	
	</span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="50">姓名</th>
					<th width="50">职位</th>
					<th width="250">公司名称</th>
					<th width="80">手机</th>
					<th width="80">联系电话</th>
					<th width="60">邮箱</th>
					<th width="80">更新时间</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c"> 
						<td><?php echo ($v['cname']); ?></td>
						<td><?php echo ($v['title']); ?></td>
						<td><?php echo ($v['office_name']); ?></td>
						<td><?php echo ($v['mobile']); ?></td>
						<td><?php echo ($v['tel']); ?></td>
						<td class="td-status"><?php echo ($v['cemail']); ?></td>
						<td><?php echo (date('Y-m-d',$v['addtime'])); ?></td>
						
						
						<td class="f-14 td-manage">
							<a style="text-decoration:none" onClick="article_edit('<?php echo ($v['cname']); ?>','/index.php/Admin/Cailiaoshang/add/id/<?php echo ($v['id']); ?>','<?php echo ($v['id']); ?>')" href="javascript:;">编辑</a>|
							<a style="text-decoration:none" href="/index.php/Admin/Cailiaoshang/clsdel/id/<?php echo ($v['id']); ?>">删除</a>
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

/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}



/*设置会员*/
function article_start(obj,id){
	layer.confirm('确认要设置推荐工人吗？',function(index){
		$.post("<?php echo U('Advertisement/is_user');?>",{id:id,is_user : 1}, function(data) {
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
</html><!--y