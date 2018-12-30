<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/HUI/lib/html5.js"></script>
<script type="text/javascript" src="/Public/HUI/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/HUI/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/HUI/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<link href="/Public/HUI/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >
<title>图片展示</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图库管理 <span class="c-gray en">&gt;</span> 效果图片展示 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<form class="form form-horizontal" action="/index.php/Admin/Gallery/saveForm" method="post" id="form-article-add">
	<div class="page-container">
		<div class="cl pd-5 bg-1 bk-gray mt-20"> 
			<span class="l"> 
				<a href="/index.php/Admin/Gallery/add/pid/<?php echo ($pid); ?>"  class="btn btn-primary radius">
					<i class="Hui-iconfont">&#xe642;</i> 上传照片
				</a> 
				
				<input type="submit" value="提交修改" name="save" class="btn btn-warning radius"/> 
				 
			</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
		<div class="portfolio-content">
			<?php if(empty($list)): ?><div style="width:100%;height:300px;text-align:center;line-height:300px;color:#999;font-size:0.75rem">暂无数据</div>
				<?php else: ?>
					<ul class="cl portfolio-area">
					   <?php if(is_array($list)): foreach($list as $key=>$v): ?><li class="item">
								
								<div class="portfoliobox" style="height:180px;">
									<div style="width:100%;overflow:hidden">
									<div class="btn btn-danger radius" onClick="admin_start(this,'<?php echo ($v['id']); ?>')" style="width:40%;float:left;">删除</div>
									
									<a class="btn btn-danger radius" href="<?php echo U('Gallery/save',array('id'=>$v['id'],'pid'=>$v['pid']));?>" style="width:40%;float:right;">修改</a>	
									
									</div>
									<div class=""><?php echo ($v['name']); ?> </div>
									<div class="picbox"style="height:100px;"><a href="<?php echo ($v['path']); ?>" data-lightbox="gallery" data-title="<?php echo ($v['name']); ?>"><img style="width:100%;height:100%;" src="<?php echo ($v['path']); ?>"></a></div>
									
								</div>
							</li><?php endforeach; endif; ?>
				 </ul><?php endif; ?>
		</div>
	</div>
</form>
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/lightbox2/2.8.1/js/lightbox-plus-jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(function(){
	$.Huihover(".portfolio-area li");
});

function admin_start(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$.post("<?php echo U('Gallery/del');?>",{id:id,type:'zp'},function(data){
			
			if(data.status == 1){
				window.location.reload();
				layer.msg('删除成功!', {icon: 6,time:3000});
			
			}else{
				layer.msg('删除失败!', {icon: 5,time:3000});
			}
			
			
		},'json');
		//$(obj).remove();
		
	});
}
</script>
</body>
</html>