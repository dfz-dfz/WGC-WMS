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

<title>优惠券信息修改</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>

<article class="page-container">
      
	  <form action="<?php echo U('Coupons/upinfo',array('id'=>$info['id']));?>" method="post" id="up">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">优惠券ID：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="id" name="id" disabled value="<?php echo ($info['id']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">发布优惠券公司名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="company" disabled value="<?php echo ($info['company']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>发布者名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="username" disabled value="<?php echo ($info['user_name']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="price" name="price" value="<?php echo ($info['price']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券数量：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="number" name="number" value="<?php echo ($info['number']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券有效期：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="indate" name="indate" value="<?php echo ($info['indate']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>有效联系电话：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="phone" name="phone" value="<?php echo ($info['phone']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券类型：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="type" name="type" value="<?php echo ($info['type']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券最低额度：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="minimum" name="minimum" value="<?php echo ($info['minimum']); ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>优惠券描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea type="text" class="textarea radius" id="content" name="content"><?php echo ($info['content']); ?></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red"></span>优惠券发布时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" id="addtime" value="<?php echo ($info['addtime']); ?>">
			</div>
		</div>
		<div class="row cl" style="margin-top:10px">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="tuijian()" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
			</div>
		</div>
	 </form>
		<!-- 底部跳转 -->
		
	
	
</article>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript">
<!--/请在上方写此页面业务相关的脚本-->
	function tuijian(){
	var price = $("#price").val();
	var number = $("#number").val();
	var indate = $("#indate").val();
	var phone = $("#phone").val();
	var type = $("#type").val();
	if(price == '' || number == '' || indate == '' || phone == '' || type == ''){
		alert('必填字段不能为空！');
		return false;
	}else{
		$("#up").submit();
	}
	
}
</script>
</body>
</html>