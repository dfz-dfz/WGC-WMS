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
						<option value="" class="banner"></option>
						<option value="4" class="header">首页广告1</option>
						<option value="5" class="header">首页广告2</option>
						<option value="6" class="header">首页广告3</option>
						<option value="7" class="header">首页广告4</option>
						<option value="8" class="header">首页广告5</option>
						<option value="9" class="header">首页广告6</option>
						<option value="" class="banner"></option>
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
						<option value="" class="banner"></option>
						<option value="20" class="information">热门职位1</option>
						<option value="21" class="information">热门职位2</option>
						<option value="22" class="information">热门职位3</option>
						<option value="23" class="information">热门职位4</option>
						<option value="24" class="information">热门职位5</option>
						<option value="25" class="information">热门职位6</option>
						<option value="26" class="information">热门职位7</option>
						<option value="27" class="information">热门职位8</option>
						<option value="" class="banner"></option>
						<option value="28" class="information">维修报价1</option>
						<option value="29" class="information">维修报价2</option>
						<option value="30" class="information">维修报价3</option>
						<option value="31" class="information">维修报价4</option>
						<option value="32" class="information">维修报价5</option>
						<option value="33" class="information">维修报价6</option>
						<option value="34" class="information">维修报价7</option>
						<option value="35" class="information">维修报价8</option>
						<option value="" class="banner"></option>
						<option value="36" class="information">材料采购1</option>
						<option value="37" class="information">材料采购2</option>
						<option value="38" class="information">材料采购3</option>
						<option value="39" class="information">材料采购4</option>
						<option value="40" class="information">材料采购5</option>
						<option value="41" class="information">材料采购6</option>
						<option value="42" class="information">材料采购7</option>
						<option value="43" class="information">材料采购8</option>
						<option value="" class="banner"></option>
						<option value="44" class="information">材料推广1</option>
						<option value="45" class="information">材料推广2</option>
						<option value="46" class="information">材料推广3</option>
						<option value="47" class="information">材料推广4</option>
						<option value="48" class="information">材料推广5</option>
						<option value="49" class="information">材料推广6</option>
						<option value="50" class="information">材料推广7</option>
						<option value="51" class="information">材料推广8</option>
						<option value="" class="banner"></option>
						<option value="52" class="information">材料询价1</option>
						<option value="53" class="information">材料询价2</option>
						<option value="54" class="information">材料询价3</option>
						<option value="55" class="information">材料询价4</option>
						<option value="56" class="information">材料询价5</option>
						<option value="57" class="information">材料询价6</option>
						<option value="58" class="information">材料询价7</option>
						<option value="59" class="information">材料询价8</option>
						<option value="" class="banner"></option>
						<option value="60" class="information">工价询价1</option>
						<option value="61" class="information">工价询价2</option>
						<option value="62" class="information">工价询价3</option>
						<option value="63" class="information">工价询价4</option>
						<option value="64" class="information">工价询价5</option>
						<option value="65" class="information">工价询价6</option>
						<option value="66" class="information">工价询价7</option>
						<option value="67" class="information">工价询价8</option>
						<option value="" class="banner"></option>
						<option value="68" class="information">设计分包1</option>
						<option value="69" class="information">设计分包2</option>
						<option value="70" class="information">设计分包3</option>
						<option value="71" class="information">设计分包4</option>
						<option value="72" class="information">设计分包5</option>
						<option value="73" class="information">设计分包6</option>
						<option value="74" class="information">设计分包7</option>
						<option value="75" class="information">设计分包8</option>
						<option value="" class="banner"></option>
						<option value="76" class="information">项目分包1</option>
						<option value="77" class="information">项目分包2</option>
						<option value="78" class="information">项目分包3</option>
						<option value="79" class="information">项目分包4</option>
						<option value="80" class="information">项目分包5</option>
						<option value="81" class="information">项目分包6</option>
						<option value="82" class="information">项目分包7</option>
						<option value="83" class="information">项目分包8</option>
						<option value="" class="banner"></option>
						<option value="84" class="information">建筑装饰公司1</option>
						<option value="85" class="information">建筑装饰公司2</option>
						<option value="86" class="information">建筑装饰公司3</option>
						<option value="87" class="information">建筑装饰公司4</option>
						<option value="88" class="information">建筑装饰公司5</option>
						<option value="89" class="information">建筑装饰公司6</option>
						<option value="" class="banner"></option>
						<option value="90" class="information">材料商1</option>
						<option value="91" class="information">材料商2</option>
						<option value="92" class="information">材料商3</option>
						<option value="93" class="information">材料商4</option>
						<option value="94" class="information">材料商5</option>
						<option value="95" class="information">材料商6</option>
						<option value="" class="banner"></option>
					</select>
					<div style="position:absolute;width:500px;height:auto;overflow:hidden;" id="explain"></div>
				</li>
				<li>
					<div>图&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;片：</div>
					<span class="btn-upload form-group">
					  <input class="input-text upload-url radius" type="text" name="pic" id="uploadfile-1" readonly style="width: 222px;"><a href="javascript:void();" class="btn btn-primary radius">浏览文件</a>
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
		if($('#show_type').val() >= 1 && $('#show_type').val() <= 3){
			$('#explain').html('在首页上面显示大广告');
		}else if($('#show_type').val() >= 4 && $('#show_type').val() <= 9){
			$('#explain').html('<a href="/Public/images/header_gg.jpg" target="_blank"><img src="/Public/images/header_gg.jpg" width="400"/></a>');
		}else if($('#show_type').val() >= 10 && $('#show_type').val() <= 19){
			$('#explain').html('<a href="/Public/images/message_gg.png" target="_blank"><img src="/Public/images/message_gg.png" width="400"/></a>');
		}else if($('#show_type').val() >= 20 && $('#show_type').val() <= 27){
			$('#explain').html('<a href="/Public/images/zhaopin_gg.png" target="_blank"><img src="/Public/images/zhaopin_gg.png" width="400"/></a>');
		}else if($('#show_type').val() >= 28 && $('#show_type').val() <= 35){
			$('#explain').html('<a href="/Public/images/weixiu_gg.png" target="_blank"><img src="/Public/images/weixiu_gg.png" width="400"/></a>');
		}else if($('#show_type').val() >= 36 && $('#show_type').val() <= 43){
			$('#explain').html('<a href="/Public/images/cailiaocaigou_gg.png" target="_blank"><img src="/Public/images/cailiaocaigou_gg.png" width="400"/></a>');
		}else if($('#show_type').val() >= 44 && $('#show_type').val() <= 51){
			$('#explain').html('<a href="/Public/images/cailiaotuiguang.png" target="_blank"><img src="/Public/images/cailiaotuiguang.png" width="400"/></a>');
		}else if($('#show_type').val() >= 52 && $('#show_type').val() <= 59){
			$('#explain').html('<a href="/Public/images/cailiaoxunjia.png" target="_blank"><img src="/Public/images/cailiaoxunjia.png" width="400"/></a>');
		}else if($('#show_type').val() >= 60 && $('#show_type').val() <= 67){
			$('#explain').html('<a href="/Public/images/gongjiaxunjia.png" target="_blank"><img src="/Public/images/gongjiaxunjia.png" width="400"/></a>');
		}else if($('#show_type').val() >= 68 && $('#show_type').val() <= 75){
			$('#explain').html('<a href="/Public/images/shejifenbao.png" target="_blank"><img src="/Public/images/shejifenbao.png" width="400"/></a>');
		}else if($('#show_type').val() >= 76 && $('#show_type').val() <= 83){
			$('#explain').html('<a href="/Public/images/xiangmufenbao.png" target="_blank"><img src="/Public/images/xiangmufenbao.png" width="400"/></a>');
		}else if($('#show_type').val() >= 74 && $('#show_type').val() <= 89){
			$('#explain').html('<a href="/Public/images/jianzhuzhuangshi.png" target="_blank"><img src="/Public/images/jianzhuzhuangshi.png" width="400"/></a>');
		}else if($('#show_type').val() >= 90 && $('#show_type').val() <= 95){
			$('#explain').html('<a href="/Public/images/cailiaoshang.png" target="_blank"><img src="/Public/images/cailiaoshang.png" width="400"/></a>');
		}else{
			$('#explain').html('');
		}
		
	});
</script> 
</body>
</html>