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
<link href="/Public/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />

<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<!-- 连接<a href="<?php echo U('Home/Undex/news',array('id'=>$v['id']));?>"></a> -->
<title>空白页</title>

</head>
<style type="text/css">
    *{
    margin:0px;
    padding:0px;
      }
	  
    ul li{float:left;}
   .neirong p {float:left;}
   
   .neirong img { 
	   width:200px;
	   height:200px;
	  margin-right:5px;
   }

</style>
<body>
	<div class="pd-20">
	   <?php if(is_array($nam)): foreach($nam as $key=>$v): ?><ul>
				 <!-- <td><?php echo ($v['id']); ?></td>  -->
				 <!-- <li class="title"><?php echo ($v['title']); ?></li> -->
				 <a href="<?php echo U('home/Undex/news',array('id'=>$v['id']));?>"><li class="neirong">        	       <?php echo (htmlspecialchars_decode($v['content'])); ?></li>
				 </a> 
				 <!-- <td><img src="<?php echo ($v['pic']); ?>"></td> -->
				 <!-- <td><?php echo (date('Y-m-d H:i:s',$v['times'])); ?></td> -->
			 </ul><?php endforeach; endif; ?>			 
	</div>
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>