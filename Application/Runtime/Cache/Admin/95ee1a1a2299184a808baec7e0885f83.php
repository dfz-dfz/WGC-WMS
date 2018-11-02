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
<title>用户详细资料</title>
</head>
<body>
<div class="page-container">
	
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">资料统计</th>
			
		</thead>
		<tbody>
		</tbody>
	</table>
	<br>
	<br>
	<p class="c-black">    姓名：<?php echo ($list['name']); ?></p>
	<p class="c-black">    职位：<?php echo ($list['postion']); ?></p>
	<p class="c-black">    性别：<?php echo ($list['sex']); ?></p>
	<p class="c-black">    邮箱：<?php echo ($list['email']); ?></p>
	<p class="c-black">    工价：<?php echo ($list['gy_type']); ?></p>
	<p class="c-black">    年龄：<?php echo ($list['nianling']); ?></p>
	<p class="c-black">    工龄：<?php echo ($list['bumen']); ?></p>
	<p class="c-black">    籍贯：<?php echo ($list['huji']); ?></p>
	<p class="c-black">  身份证：<?php echo ($list['shenfenzheng']); ?></p>
	<p class="c-black">做过的项目：<?php echo ($list['gz_jingyan']); ?></p>
	<p class="c-black">求职意向：<?php echo ($list['intension']); ?></p>
	<p class="c-black">    特长：<?php echo ($list['skill']); ?></p>
	<p class="c-black">    手机：<?php echo ($list['mobile']); ?></p>
	<p class="c-black">培训状态：
		<?php if($list['beteach'] == 0 ): ?>未培训
		<?php elseif($list['beteach'] == 1): ?>
			已培训
		<?php elseif($list['beteach'] == 2): ?>
			不确定<?php endif; ?>
	</p>
	<p class="c-black">培训内容：<?php echo ($list['teachcontent']); ?></p>
	<p class="c-black">工作经验：<?php echo ($list['job_exp']); ?></p>
	<p class="c-black">工作经历：<?php echo ($list['job_live']); ?></p>
	<p class="c-black">毕业学校：<?php echo ($list['graduate']); ?></p>
	
	<p class="c-black">    学历：<?php echo ($list['education']); ?></p>
	<p class="c-black">  推荐人：
		<?php if($list['tuijian_id'] == 0 ): ?>没有推荐人
		<?php else: ?>
			<?php echo ($list['tuijian_id']); endif; ?>
	</p>
	<p class="c-black">    认证：
		<?php if($list['authentication'] == 0 ): ?>未认证
		<?php elseif($list['authentication'] == 1): ?>
			已认证<?php endif; ?>
	</p>
	
	
	<p class="c-black">注册时间：<?php echo (date('Y-m-d H:i:s',$list['regtime'])); ?></p>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>
			<br>
			Copyright &copy;2017 经艺装饰设计工程有限公司 v1.0 All Rights Reserved.<br>
			本后台系统由<a href="http://www.59jiaju.com/" target="_blank" title="经艺装饰设计工程有限公司">经艺装饰设计工程有限公司</a>提供技术支持
		</p>
	</div>
</footer>
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 

</body>
</html><!--`