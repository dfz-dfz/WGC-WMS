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
<title>经艺装饰</title>
</head>
  <style>
   .list{
        white:100px;height:80px;
   }
  .lis{
      font-size:20px;
  }
  </style>
<body>
	<thead>
	  <div>工程案例</div>
	</thead>
<tbody>

<?php if(is_array($list)): foreach($list as $key=>$v): ?><td>
		<?php if($v['type'] == 2): ?></br>
		<hr>
		    
			<!-- <div class="list">新闻公众号</div>　　 -->
		<?php elseif($v['type'] == 3): ?></br>
		<hr>
		    <p><img class="list" src="/Public/admin/imgas/jd.jpg"></p>
				     <div class="lis"> 餐饮连锁</div>
		<?php elseif($v['type'] == 4): ?></br>
	    <hr>
		    <p><img class="list" src="/Public/admin/imgas/jy.jpg"></p>
					<div class="lis">教育连锁</div>　
		<?php elseif($v['type'] == 5): ?></br>
		<hr>
		 <p><img class="list" src="/Public/admin/imgas/jiudian.jpg" ></p>
					<div class="lis">酒店连锁</div>　
		<?php elseif($v['type'] == 6): ?></br>
		<hr>
		 <p><img class="list" src="/Public/admin/imgas/bangong.jpg" ></p>
					<div class="lis">办公空间</div>　
		<?php elseif($v['type'] == 7): ?></br>
		<hr>
		 <p><img class="list" src="/Public/admin/imgas/dichan.jpg" ></p>
					<div class="lis">地产楼盘</div>　
		<?php elseif($v['type'] == 8): ?></br>
		<hr>
		 <p><img class="list" src="/Public/admin/imgas/fuzhuang.jpg" ></p>
    			   <div class="lis">服装专卖</div>　　　<?php endif; ?>						
     </td>
	 <td class="text-l"><a href="<?php echo U('home/Undex/content',array('id'=>$v['id']));?>"><span style="cursor:pointer" class = "text-primary" title="查看"><?php echo ($v['title']); ?></span>　
	  <img src="<?php echo ($v['pic']); ?>" style="width:80px;height:80px;"/></a>
	</td><?php endforeach; endif; ?>  
 </tbody>

<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>