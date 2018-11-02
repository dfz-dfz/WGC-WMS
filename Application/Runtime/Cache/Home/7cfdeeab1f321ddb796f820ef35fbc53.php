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
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/Public/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/static/h-ui.admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/aui.css" rel="stylesheet" type="text/css" />
<link href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />

<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title><?php echo ($user['title']); ?></title>
<meta name="keywords" content="<?php echo ($user['describe']); ?>" />
        <meta name="description" content="<?php echo ($user['describe']); ?>"/>
</head>
<style type="text/css">
   *{
    margin:0px;
	padding:0px;
   }
   
   .aui-content{
	text-align:center;
   }
   
   img{
     max-width: 100%;
   }
   
   .cla{
       max-width: 100%;
	   margin-bottom:20px;
	   margin-top:-10px;
       text-align:center;
       font-size:25px;
   }
   .cla a{
       width:250px;
       margin:3px auto;
	   border:2px solid #B22222;
	   background:#B22222;
	   color:#fff;
	   border-radius:10px;
       text-align:center;
       font-size:25px;
	   display:inline-block;
   }
   
</style>
<body>
<!-- 分享页面 -->
	<div class="aui-content aui-padded-l-10 aui-padded-r-10">
	    <?php echo (htmlspecialchars_decode($user['content'])); ?>
		
	</div>
	<div class="cla">
	     <a  href="<?php echo U('Fenx/center');?>">点击下载微工程app</a>
	</div>
	   <!-- <?php echo (date('Y-m-d H:i:s',$user['times'])); ?> -->
		
		
		
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>