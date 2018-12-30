<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<title>用户中心-我的网盘-我的文档</title>
<meta name="description" content="微工程，微工程APP，装修、材料、家具、饰品一站式服务，让装修更简单，价格更透明！！" />
<meta name="keywords" content="微工程，微工程，家居商城，微工程家居商城，微工程家居装修商城，办公室装修，写字楼装修，材料，装修材料，家居，办公家具，家居，家具，装修，装饰" />
<link rel="stylesheet" type="text/css" href="http://wgc2013.com/themes/mall/jiaju/css/api.css"/>
<link rel="stylesheet" type="text/css" href="http://wgc2013.com/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="http://wgc2013.com/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="http://wgc2013.com/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />

<link rel="stylesheet" type="text/css" href="http://wgc2013.com/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="http://wgc2013.com/Public/static/h-ui.admin/css/style.css" />
<link href="http://wgc2013.com/Public/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="http://wgc2013.com/themes/mall/jiaju/styles/default/css/center.css" rel="stylesheet"  />
<link type="text/css" href="http://wgc2013.com/themes/mall/jiaju/styles/css/worker_quota_price.css" rel="stylesheet" />
<link rel="stylesheet" href="http://wgc2013.com/themes/mall/jiaju/styles/css/tel_list.css">
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	jQuery.support.cors = true;
</script>
<style>
	.divcl{width:100%;height:40px;border-bottom:1px solid #ccc;margin:20px auto;overflow:hidden}
	.divcl li{width:80px;height:30px;line-height:30px;color:#fff;text-align:center;float:left;margin:0 10px;}
	
	.divc2{width:100%;height:auto;border-bottom:1px solid #ccc;margin:20px auto;overflow:hidden}
	.divc2 li{border:1px solid #fff;width:12%;height:100px;line-height:30px;color:#fff;text-align:center;float:left;margin:10px;}
	
	.divc2 li:hover{border:1px solid #292929;-webkit-box-shadow:1px 1px 3px #292929;-moz-box-shadow:1px 1px 3px #292929;box-shadow:1px 1px 3px #292929;}
	.divc2{width:100%;height:720px;margin:20px auto;}
	
	.divc2 a img{width:50px;height:50px;margin:5px auto;}
	.divc2 li a p{width:100%;height:auto;color:#000;text-align:center;float:left;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
	.page{width:530px;height:40px;padding:10px 10px}
</style>


<link type="text/css" href="http://wgc2013.com/themes/mall/jiaju/styles/default/css/main.css" rel="stylesheet"  />
<link type="text/css" href="http://wgc2013.com/themes/mall/jiaju/styles/css/global.css" rel="stylesheet"  />
<link type="text/css" href="http://www.wgc2013.com/themes/mall/jiaju/styles/default/css/catalog.css" rel="stylesheet"  />
<link type="text/css" href="http://www.wgc2013.com/themes/mall/jiaju/styles/default/css/footer.css" rel="stylesheet" />
<link type="text/css" href="http://wgc2013.com/themes/mall/jiaju/styles/css/style.css" rel="stylesheet"  />
<script type="text/javascript" src="http://wgc2013.com/index.php?act=jslang"></script>
<script type="text/javascript" src="http://www.wgc2013.com/includes/libraries/javascript/ecmall.js" charset="utf-8"></script>
<script type="text/javascript" src="http://www.wgc2013.com/includes/libraries/javascript/cart.js" charset="utf-8"></script>
<script type="text/javascript" src="http://www.wgc2013.com/themes/mall/jiaju/styles/default/js/main.js" charset="utf-8"></script>
<script type="text/javascript">
var SITE_URL = "http://www.wgc2013.com";
var PRICE_FORMAT = '&yen;%s';
</script>

</head>
<body>
	<div class="divcl">
		<ul>
			<li><a href="<?php echo U('Wangpanpc/document',array('type'=>2));?>">我的文档</a></li>
			<li><a href="<?php echo U('Wangpanpc/document',array('type'=>1));?>">图片</a></li>
			<li><a href="<?php echo U('Wangpanpc/document',array('type'=>5));?>">视频</a></li>
			<li><a href="<?php echo U('Wangpanpc/document',array('type'=>3));?>">PDF</a></li>
			<li><a href="<?php echo U('Wangpanpc/document',array('type'=>6));?>">压缩包</a></li>
		</ul>
	</div>
	<div class="divc2">
	    <ul>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$infos): $mod = ($i % 2 );++$i;?><li>
				<a href="http://wgcapp.wgc2013.com<?php echo ($infos['dir']); ?>" target="_blank">
				<?php switch($infos["types"]): case "1": ?><img src="http://wgcapp.wgc2013.com<?php echo ($infos['dir']); ?>"/><?php break;?> 
				<?php case "2": ?><img src="http://wgc2013.com/themes/mall/jiaju/images/center/txt.png" alt="" style="width: 50%;height: 70px;"><?php break;?>
				<?php case "3": ?><img src="http://wgc2013.com/themes/mall/jiaju/images/center/pdf.png" alt="" style="width: 50%;height: 70px;"><?php break;?>
				<?php case "5": ?><img src="http://wgc2013.com/themes/mall/jiaju/images/center/mp4.png" alt="" style="width: 50%;height: 70px;"><?php break;?>
				<?php case "6": ?><img src="http://wgc2013.com/themes/mall/jiaju/images/center/zip.png" alt="" style="width: 50%;height: 70px;"><?php break;?>
				<?php default: endswitch;?>
				
				<p><?php echo ($infos['filename']); ?></p>
				</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		
	</div>
	<div class="page"><?php echo ($page); ?></div>

</body>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="http://wgc2013.com/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://wgc2013.com/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="http://wgc2013.com/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="http://wgc2013.com/Public/lib/form/jquery.form.min.js"></script>
<script type="text/javascript" src="http://wgc2013.com/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="http://wgc2013.com/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="http://wgc2013.com/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="http://wgc2013.com/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="http://wgc2013.com/Public/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="http://wgc2013.com/Public/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="http://wgc2013.com/Public/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="http://wgc2013.com/Public/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<!--表单验证-->
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!-- 多图片上传 -->
<script type="text/javascript" src="http://wgc2013.com/themes/mall/jiaju/js/JTimer_1.3.js"></script>


</html>