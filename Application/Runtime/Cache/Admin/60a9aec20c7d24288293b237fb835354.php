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

<title>新增广告</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
      
<article class="page-container">
  
	<form class="form form-horizontal" enctype="multipart/form-data" action="/index.php/Admin/Cailiaoshang/addForm" method="post" id="form-article-add">
		<div class="aui-content aui-margin-b-15">
	    <ul class="aui-list aui-form-list">
    	<li class="aui-list-item">
		
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">姓名：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text input-text radius size-L" placeholder="姓名" value="<?php echo ($v['cname']); ?>" name="name">
				</div>
			</div>
		
		
        </li>
        <li class="aui-list-item">
			<div class="row cl">
				<label class="form-label col-xs-4 col-sm-3">职位：</label>
				<div class="formControls col-xs-8 col-sm-9">
					<input type="text" class="input-text input-text radius size-L" placeholder="职位" value="<?php echo ($v['title']); ?>" name="title">
				</div>
			</div>
            
        </li>
	      <li class="aui-list-item">
	            
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">公司名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" class="input-text input-text radius size-L" placeholder="公司名称" value="<?php echo ($v['office_name']); ?>" name="office_name">
					</div>
				</div>
	        </li>
	        <li class="aui-list-item">
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">手机号码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						 <input type="text" class="input-text input-text radius size-L" placeholder="手机号码" value="<?php echo ($v['mobile']); ?>" name="mobile">
					</div>
				</div>
				
	        </li>
	        <li class="aui-list-item">
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">公司电话：</label>
					<div class="formControls col-xs-8 col-sm-9">
						  <input type="text" class="input-text input-text radius size-L" placeholder="公司电话" value="<?php echo ($v['tel']); ?>" name="tel">
					</div>
				</div>
			
	        </li>
	        <li class="aui-list-item">
	            
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">传真：</label>
					<div class="formControls col-xs-8 col-sm-9">
						 <input type="text" class="input-text input-text radius size-L" placeholder="传真" value="<?php echo ($v['fax']); ?>" name="fax">
					</div>
				</div>
	        </li>
	        <li class="aui-list-item">
	            
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">邮箱：</label>
					<div class="formControls col-xs-8 col-sm-9">
						 <input type="text" class="input-text input-text radius size-L" placeholder="电子邮箱" value="<?php echo ($v['cemail']); ?>" name="email">
					</div>
				</div>
	        </li>
	        <li class="aui-list-item">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">网址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						 <input type="text" class="input-text input-text radius size-L" placeholder="网址" value="<?php echo ($v['web']); ?>" name="web">
					</div>
				</div>
	            
	        </li>
	        
	        <li class="aui-list-item">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">经营范围：</label>
					<div class="formControls col-xs-8 col-sm-9">
						  <textarea class="textarea radius" placeholder="经营范围" name="businessscope"><?php echo ($v['businessscope']); ?></textarea>
					</div>
				</div>
	            
	        </li>
	        
	        <li class="aui-list-item">
	            
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">材料描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						  <textarea class="textarea radius" placeholder="材料描述" name="description"><?php echo ($v['description']); ?></textarea>
					</div>
				</div>
	        </li>
	        
	        <li class="aui-list-item">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">材料类别：</label>
					<div class="formControls col-xs-8 col-sm-9">
						  <span class="select-box">
							  <select class="select" size="1" name="type">
								<option value="1"<?php if($v['id'] == 1): ?>selected<?php endif; ?>>厨房设备</option>
								<option value="2"<?php if($v['id'] == 2): ?>selected<?php endif; ?>>瓷砖石材</option>
								<option value="3"<?php if($v['id'] == 3): ?>selected<?php endif; ?>>板材</option>
								<option value="4"<?php if($v['id'] == 4): ?>selected<?php endif; ?>>家具</option>
								<option value="5"<?php if($v['id'] == 5): ?>selected<?php endif; ?>>门窗</option>
								<option value="6"<?php if($v['id'] == 6): ?>selected<?php endif; ?>>家饰</option>
								<option value="7"<?php if($v['id'] == 7): ?>selected<?php endif; ?>>地板</option>
								<option value="8"<?php if($v['id'] == 8): ?>selected<?php endif; ?>>卫浴洁具</option>
								<option value="9"<?php if($v['id'] == 9): ?>selected<?php endif; ?>>五金管件</option>
								<option value="10"<?php if($v['id'] == 10): ?>selected<?php endif; ?>>油漆涂装</option>
								<option value="14"<?php if($v['id'] == 14): ?>selected<?php endif; ?>>消防</option>
								<option value="15"<?php if($v['id'] == 15): ?>selected<?php endif; ?>>防水涂料</option>
								<option value="16"<?php if($v['id'] == 16): ?>selected<?php endif; ?>>电气</option>
								<option value="17"<?php if($v['id'] == 17): ?>selected<?php endif; ?>>给排水</option>
								<option value="18"<?php if($v['id'] == 18): ?>selected<?php endif; ?>>智能化</option>
								<option value="19"<?php if($v['id'] == 19): ?>selected<?php endif; ?>>环评</option>
								<option value="20"<?php if($v['id'] == 20): ?>selected<?php endif; ?>>钢材</option>
								<option value="21"<?php if($v['id'] == 21): ?>selected<?php endif; ?>>饰面板</option>
								<option value="22"<?php if($v['id'] == 22): ?>selected<?php endif; ?>>粘合剂</option>
								<option value="23"<?php if($v['id'] == 23): ?>selected<?php endif; ?>>定制加工</option>
								<option value="24"<?php if($v['id'] == 24): ?>selected<?php endif; ?>>暖通空调</option>
								<option value="25"<?php if($v['id'] == 25): ?>selected<?php endif; ?>>不锈钢制品 </option>
								<option value="13"<?php if($v['id'] == 13): ?>selected<?php endif; ?>>其它种类</option>
							  </select>
							</span>
						</div>
					</div>
				</div>
	        </li>
	        
			<!--默认显示时间 ：30分钟-->	        
	        
	        <li class="aui-list-item">
               
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3">公司地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						  <input type="text" class="input-text input-text radius size-L" style="font-size:0.7rem" placeholder="公司地址" value="<?php echo ($v['addr']); ?>" name="addr">
					</div>
				</div>
            </li>
            

	      </ul>
	      
	 </div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="hidden" value="<?php echo ($v['id']); ?>" name="id">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				
			</div>
		</div>
	 
		<!-- 底部跳转 -->
	</form>
       
</article>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script>  
<script type="text/javascript" src="/Public/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/Public/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">

$(function(){
	var reload = "<?php echo $_GET['reload'] ?>";
	
	if(reload == 'ok'){
		alert('编辑成功');
		parent.location.reload();
	}
	
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	
	$list = $("#fileList"),
	$btn = $("#btn-star"),
	state = "pending",
	uploader;

	var uploader = WebUploader.create({
		auto: true,
		swf: 'lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: 'fileupload.php',
	
		// 选择文件的按钮。可选。
		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
		pick: '#filePicker',
	
		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
		resize: false,
		// 只允许选择图片文件。
		accept: {
			title: 'Images',
			extensions: 'gif,jpg,jpeg,bmp,png',
			mimeTypes: 'image/*'
		}
	});
	uploader.on( 'fileQueued', function( file ) {
		var $li = $(
			'<div id="' + file.id + '" class="item">' +
				'<div class="pic-box"><img></div>'+
				'<div class="info">' + file.name + '</div>' +
				'<p class="state">等待上传...</p>'+
			'</div>'
		),
		$img = $li.find('img');
		$list.append( $li );
	
		// 创建缩略图
		// 如果为非图片文件，可以不用调用此方法。
		// thumbnailWidth x thumbnailHeight 为 100 x 100
		uploader.makeThumb( file, function( error, src ) {
			if ( error ) {
				$img.replaceWith('<span>不能预览</span>');
				return;
			}
	
			$img.attr( 'src', src );
		}, thumbnailWidth, thumbnailHeight );
	});
	// 文件上传过程中创建进度条实时显示。
	uploader.on( 'uploadProgress', function( file, percentage ) {
		var $li = $( '#'+file.id ),
			$percent = $li.find('.progress-box .sr-only');
	
		// 避免重复创建
		if ( !$percent.length ) {
			$percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
		}
		$li.find(".state").text("上传中");
		$percent.css( 'width', percentage * 100 + '%' );
	});
	
	// 文件上传成功，给item添加成功class, 用样式标记上传成功。
	uploader.on( 'uploadSuccess', function( file ) {
		$( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
	});
	
	// 文件上传失败，显示上传出错。
	uploader.on( 'uploadError', function( file ) {
		$( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
	});
	
	// 完成上传完了，成功或者失败，先删除进度条。
	uploader.on( 'uploadComplete', function( file ) {
		$( '#'+file.id ).find('.progress-box').fadeOut();
	});
	uploader.on('all', function (type) {
        if (type === 'startUpload') {
            state = 'uploading';
        } else if (type === 'stopUpload') {
            state = 'paused';
        } else if (type === 'uploadFinished') {
            state = 'done';
        }

        if (state === 'uploading') {
            $btn.text('暂停上传');
        } else {
            $btn.text('开始上传');
        }
    });

    $btn.on('click', function () {
        if (state === 'uploading') {
            uploader.stop();
        } else {
            uploader.upload();
        }
    });
	
	var ue = UE.getEditor('editor');
	
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>