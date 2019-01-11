<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
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
<!--/meta 作为公共模版分离出去-->

<title>提现信息修改</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>

<article class="page-container">
      
	  <form action="<?php echo U('withdrawals/upinfo',array('id'=>$info['id']));?>" method="post" id="up">
	  <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="user_name" disabled value="<?php echo ($info['user_name']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">提现单号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="tags" disabled value="<?php echo ($info['tags']); ?>">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>提现金额：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="money" disabled value="<?php echo ($info['money']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>提现平台：</label>
			<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" id="money" disabled value="<?php switch($info['pay_type']): case "1": ?>银行卡<?php break;?> 
						<?php case "2": ?>微信<?php break;?> 
						<?php case "3": ?>支付宝<?php break; endswitch;?>">	
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>提现状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
			<span class="select-box" style="width:817.5px">
			  <select class="select" size="1" name="status">
				<option value="1" <?php if($info['status'] == 1): ?>selected<?php endif; ?>>待处理</option>
				<option value="0" <?php if($info['status'] == 0): ?>selected<?php endif; ?>>已完成</option>0
			  </select>
			</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>提现时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="indate" disabled value="<?php echo (date('Y-m-d H:i:s',$info['add_time'])); ?>">
			</div>
		</div>
		
		<div class="row cl" style="margin-top:10px">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
			</div>
		</div>
	 </form>
		<!-- 底部跳转 -->
		
	
	
</article>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript">
<!--/请在上方写此页面业务相关的脚本-->

</script>
</body>
</html>