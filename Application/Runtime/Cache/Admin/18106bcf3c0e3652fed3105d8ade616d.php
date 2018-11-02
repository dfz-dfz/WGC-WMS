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

<title>分销商添加用户</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>

<article class="page-container">
      
	  
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名 ：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="<?php echo ($list['fenxiaoshang_name']); ?>" class="input-text" id="name" name="name">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>手机号码 ：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" value="" class="input-text"id="mobile" name="mobile">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>登陆密码 ：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" value="" class="input-text"id="password" name="password">
			</div>
		</div>
		
		
		
		<input type="hidden" id="fenxiaoshang_userid" value="<?php echo $_SESSION['wgcadmininfo']['fenxiaoshang_userid'];?>"/>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="tuijian();" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
			</div>
		</div>
	 
		<!-- 底部跳转 -->
		
	
	
</article>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript">
var mob = null,serverUrl = "http://wgcapp.59jiaju.com/",phone;
function refreshVerify() {
	var ts = Date.parse(new Date())/1000;
	var img = document.getElementById('verify_img');
	img.src = "/index.php?app=store&act=code&id="+ts;
}

// 手机号验证
function _checkPhone(phone) {

	var res = !!phone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[0-9]|18[0-9]|14[57])[0-9]{8}$/);
	return res;
	
}
//注册
function tuijian(){
	var name = $("#name");
	var fenxiaoshang_userid = $("#fenxiaoshang_userid");
   
	var mobile = $("#mobile");
	var password = $("#password");
	var vcode = $("#vcode");
	//验证码
	var post_mob = $("#post_mob").val();
	var post_code = $("#post_code").val();

	var sex = $("input[name=sex]:checked").val();
	if(name.val() == ''){
		name.focus();
		alert('请输入您的姓名');
		return false;
	  }
	  
	if(fenxiaoshang_userid.val() < 1){
		alert('您不是分销商，无权操作！');
		return false;
	}

	
	if(mobile.val() == ''){ 
		mobile.focus();
		alert('请输入手机号码');
		return false;
	}
	 
	if (!_checkPhone($.trim(mobile.val()))) {
		
		mobile.focus();
		alert('您输入的手机号码不正确');
		return false;
				 
	}else if(password.val() == ''){
		password.focus();
		alert('请输入登录密码');
		return false;
	
	}else{

		var url = serverUrl+"jingyi.php/Home/index/userreg";
		$.post(url,{name : name.val(),user_name : mobile.val(),password : password.val(),user_photo : '/Public/logo.png',fenxiaoshang_userid : fenxiaoshang_userid.val()},function(ret){
			
			if(ret.code == 200){
				var data = ret.data;
				window.location.href = "/index.php/Admin/User/userCate.html";	
			}else if(ret.code == 203){
			
				alert('注册失败,账号已存在');
				return false;
			}else if(ret.code == 205){
			
				alert('验证码错误！');
				return false;
			
			}else{
			
				alert('注册失败，请检查网络连接');
				return false;
			
			}
			
		
		},"json");
	}
	
}
</script>

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>