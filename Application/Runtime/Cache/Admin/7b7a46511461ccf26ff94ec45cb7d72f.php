<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<style>
	ul li {
		margin-bottom:10px;
	}
	li div {
		font-size:20px;
		width:100px;
		text-align:right;
		display:inline-block;
	}
	li input {
		height:26px;
		width:300px;
	}
	input{border:#999 solid 1px;}
	.submit{width:100px;height:30px;border:1px solid red;color:#fff;background:red;font-size:14px;margin:50px 0 0 280px;padding: 2px 14px;cursor:pointer;}
	#show_type{padding-left: 15px;height:26px;width:304px;position:relative;}
</style>
<title>广告管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 广告管理 <span class="c-gray en">&gt;</span> 广告管理 </nav>
<div class="page-container">
	<div class="text-c"> 
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	<div class="mt-20" style="height:auto;overflow:hidden;">
		<form action="<?php echo U('Advertising/addForm');?>" method="post" enctype="multipart/form-data">
			<ul style="width:500px;padding:0 100px;">
				<li>
					<div>公司名称：</div>
					<input type="text" id="company_name" name="company_name">
				</li>
				<li>
					<div>公司网址：</div>
					http://<input type="text" id="company_url" name="company_url" placeholder="www.wgc2013.com" style="width:258px;">
				</li>
				<li>
					<div>显示区域：</div>
					<select id="show_type" name="show_type">
						<option value="0">--请选择--</option>
						<option value="1" class="banner">banner1</option>
						<option value="2" class="banner">banner2</option>
						<option value="3" class="banner">banner3</option>
						<option value="4" class="header">首页广告1</option>
						<option value="5" class="header">首页广告2</option>
						<option value="6" class="header">首页广告3</option>
						<option value="7" class="header">首页广告4</option>
						<option value="8" class="header">首页广告5</option>
						<option value="9" class="header">首页广告6</option>
						<option value="10" class="information">行业资讯1</option>
						<option value="11" class="information">行业资讯2</option>
						<option value="12" class="information">行业资讯3</option>
						<option value="13" class="information">行业资讯4</option>
						<option value="14" class="information">行业资讯5</option>
						<option value="15" class="information">行业资讯6</option>
						<option value="16" class="information">行业资讯7</option>
						<option value="17" class="information">行业资讯8</option>
						<option value="18" class="information">行业资讯9</option>
						<option value="19" class="information">行业资讯10</option>
						<option value="">···</option>
					</select>
					<div style="position:absolute;width:500px;height:auto;overflow:hidden;" id="explain"></div>
				</li>
				<li>
					<div>图&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;片：</div>
					<span class="btn-upload form-group">
					  <input class="input-text upload-url radius" type="text" name="pic" id="uploadfile-1" readonly style="width: 209px;"><a href="javascript:void();" class="btn btn-primary radius"><i class="iconfont">&#xf0020;</i> 浏览文件</a>
					  <input type="file" multiple name="pic" class="input-file">
					</span>
				</li>
				<input type="hidden" id="userid" name="userid" value="">
			</ul>
			<input type="submit" value="提交" class="submit"/>
		</form>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>  
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
	$('#show_type').click(function(){
		if($('#show_type').val() == 1 || $('#show_type').val() == 2 || $('#show_type').val() == 3){
			$('#explain').html('在首页上面显示大广告');
		}else if($('#show_type').val() == 4 || $('#show_type').val() == 5 || $('#show_type').val() == 6 || $('#show_type').val() == 7 || $('#show_type').val() == 8 || $('#show_type').val() == 9){
			$('#explain').html('<img src="/Public/images/header_gg.jpg" width="400"/>');
		}else if($('#show_type').val() == 10 || $('#show_type').val() == 11 || $('#show_type').val() == 12 || $('#show_type').val() == 13 || $('#show_type').val() == 14 || $('#show_type').val() == 15 || $('#show_type').val() == 16 || $('#show_type').val() == 17 || $('#show_type').val() == 18){
			$('#explain').html('<img src="/Public/images/message_gg.png" width="400"/>');
		}else{
			$('#explain').html('');
		}
		
	});
</script> 
</body>
</html>