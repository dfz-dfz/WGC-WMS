<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="utf-8">
	<title>登录页面</title>
	<meta name="keywords" content="我购科技有限公司" />
	<meta name="description" content="我购科技有限公司">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- The styles -->
	<link  href="/Public/bootstrap/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="/Public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/Public/bootstrap/css/charisma-app.css" rel="stylesheet">
	<link href="/Public/bootstrap/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='/Public/bootstrap/css/fullcalendar.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='/Public/bootstrap/css/chosen.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/uniform.default.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/colorbox.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/jquery.noty.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/noty_theme_default.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/elfinder.min.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/elfinder.theme.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/opa-icons.css' rel='stylesheet'>
	<link href='/Public/bootstrap/css/uploadify.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="/Public/bootstrap/img/favicon.ico">
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>欢迎使用后台管理系统</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						请输入你的用户名和密码.
					</div>
					<form class="form-horizontal" id='userform' action="/index.php/Admin/Admin/checkuser" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="identifier" id="username" type="text" value="<?php echo ($think["session"]["wgcadmininfo"]["user_name"]); ?>" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="credential" id="password" type="password" value="<?php echo ($think["session"]["wgcadmininfo"]["credential"]); ?>" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember">
								<?php if(empty($_SESSION['wgcadmininfo']['rememberme'])): ?><input type="checkbox" name='rememberme' id="remember" />记住密码
								<?php else: ?> 
									<input type="checkbox" name='rememberme' id="remember" checked="checked" />记住密码<?php endif; ?>
							</label>
							</div>
							<div class="clearfix"></div>
							<input type='hidden' name='storeid' value='b65e2727ec76202a16d7fd77dfa8a2de' />
							<p class="center span5">
							<input type='button' id='longinchck' class="btn btn-primary" value='登录'></input>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="/Public/bootstrap/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="/Public/bootstrap/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="/Public/bootstrap/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="/Public/bootstrap/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="/Public/bootstrap/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="/Public/bootstrap/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="/Public/bootstrap/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="/Public/bootstrap/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="/Public/bootstrap/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="/Public/bootstrap/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="/Public/bootstrap/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="/Public/bootstrap/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="/Public/bootstrap/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="/Public/bootstrap/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="/Public/bootstrap/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="/Public/bootstrap/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='/Public/bootstrap/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='/Public/bootstrap/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="/Public/bootstrap/js/excanvas.js"></script>
	<script src="/Public/bootstrap/js/jquery.flot.min.js"></script>
	<script src="/Public/bootstrap/js/jquery.flot.pie.min.js"></script>
	<script src="/Public/bootstrap/js/jquery.flot.stack.js"></script>
	<script src="/Public/bootstrap/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="/Public/bootstrap/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="/Public/bootstrap/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="/Public/bootstrap/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="/Public/bootstrap/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="/Public/bootstrap/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="/Public/bootstrap/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="/Public/bootstrap/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="/Public/bootstrap/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="/Public/bootstrap/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="/Public/bootstrap/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="/Public/bootstrap/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="/Public/bootstrap/js/charisma.js"></script>
	
		
</body>
<script>
$(document).ready(function(){
	$('#longinchck').bind("click", function(){
		var username = $("#username").val();
		var password = $("#password").val();
		
		if(username == ''){
			alert('请输入登录账户');
			$("#username").focus();
			return false;
		}else if(password == ''){
			alert('请输入登录密码');
			$("#password").focus();
			return false;
		}else{
			$("#userform").submit();
		
			/*$.post("/index.php/Admin/Admin/checkuser",
			  {
				username : username,
				password : password
			  },
			  function(data,status){
				alert("Data: " + data + "\nStatus: " + status);
			  });*/
		}
	});
});
 
</script>
</html>