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
<script type="text/javascript" src="/Public/HUI/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p>登录次数：18 </p>
	<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
			
				<th>统计</th>
				<th>注册会员(人)</th>
				<th>客服(人)</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
			
				<td>总数</td>
				<td><a href="<?php echo U('Index/user',array('id'=>0));?>"><?php echo ($count); ?></a></td>
				<td><?php echo ($kf); ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-c">
				<td>今日</td>
				<td><a href="<?php echo U('Index/user',array('id'=>1));?>"><?php echo ($jinri); ?></a></td>
				<td>/</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td><a href="<?php echo U('Index/user',array('id'=>2));?>"><?php echo ($zuori); ?></a></td>
				<td>/</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td><a href="<?php echo U('Index/user',array('id'=>3));?>"><?php echo ($benzhou); ?></a></td>
				<td>/</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td><a href="<?php echo U('Index/user',array('id'=>4));?>"><?php echo ($benyue); ?></a></td>
				<td>/</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr> 
					<td class="text"><?php echo ($key); ?>：</td>
					<td class="input"><?php echo ($v); ?></td>
				 </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
			
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>
			<br>
			Copyright &copy;2018 我购科技有限公司 v1.0 All Rights Reserved.<br>
			本后台系统由<a href="http://www.59jiaju.com/" target="_blank" title="我购科技有限公司">我购科技有限公司</a>提供技术支持
		</p>
	</div>
</footer>
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 

</body>
</html>