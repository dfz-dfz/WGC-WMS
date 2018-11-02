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
<title>图片文件夹展示</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 图库管理 <span class="c-gray en">&gt;</span> 文件夹 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l"> 
			<a href="/index.php/Admin/Gallery/adds"  class="btn btn-primary radius" style="margin-right:100px;">
				<i class="Hui-iconfont">&#xe63e;</i> 创建文件夹
			</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>1));?>"  class="btn btn-warning radius">餐饮</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>2));?>"  class="btn btn-warning radius">酒店</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>3));?>"  class="btn btn-warning radius">会所</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>4));?>"  class="btn btn-warning radius">商场</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>5));?>"  class="btn btn-warning radius">别墅</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>6));?>"  class="btn btn-warning radius">家居</a> 
			<a href="<?php echo U('Gallery/listss',array('tpid'=>7));?>"  class="btn btn-warning radius">办公空间</a>
		</span> 
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="portfolio-content">
		<ul class="cl portfolio-area">
			<?php if(empty($list)): ?><div style="width:100%;height:300px;text-align:center;line-height:300px;color:#999;font-size:0.75rem">暂无数据</div>
			<?php else: ?> 
			   <?php if(is_array($list)): foreach($list as $key=>$v): ?><li class="item">
						
						<div class="portfoliobox">
							<div style="width:100%;overflow:hidden">
								<div class="btn btn-danger radius" onClick="admin_start(this,'<?php echo ($v['id']); ?>')" style="width:60%;float:left;">删除</div>
								<div  style="float:right;">
									<?php if($v['tpid'] == 1): ?>餐饮
									<?php elseif($v['tpid'] == 2): ?>
										酒店
									<?php elseif($v['tpid'] == 3): ?>
										会所
									<?php elseif($v['tpid'] == 4): ?>
										商场
									<?php elseif($v['tpid'] == 5): ?>
										别墅
								   <?php elseif($v['tpid'] == 6): ?>
									   家居
									<?php elseif($v['tpid'] == 7): ?>
									   办公空间<?php endif; ?>
								</div>
							</div>
							<div style="font-size:12px;color:#999"><?php echo ($v['name']); ?> </div>
							<div class="picbox"style="height:100px;line-height:100px"><a href="<?php echo U('Gallery/lists',array('pid'=>$v['id']));?>" data-lightbox="gallery" data-title="<?php echo ($v['name']); ?>"><img style="height:80px;" src="/Public/images/Folder.png"></a></div>
							
						
					</li><?php endforeach; endif; endif; ?>
	 </ul>
	</div>
</div>
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 


<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> 

<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script>  
<script type="text/javascript" src="/Public/HUI/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> 


<script type="text/javascript">
$(function(){
	$.Huihover(".portfolio-area li");
});

function admin_start(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$.post("<?php echo U('Gallery/del');?>",{id:id,type:'wj'},function(data){
			
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
</html><!--