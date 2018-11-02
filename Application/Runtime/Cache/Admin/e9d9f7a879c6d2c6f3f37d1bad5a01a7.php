<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/Public/HUI/favicon.ico" >
<LINK rel="Shortcut Icon" href="/Public/HUI/favicon.ico" />
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
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>系统消息推送</title>
<meta name="keywords" content="系统消息推送">
<meta name="description" content="系统消息推送">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<input type="hidden" value="0" id="type"/>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="标题" id="title" >
			</div>
		</div>
		<!--推送类别-->
		<div class="row cl" >
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>推送类别：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<div class="radio-box">
					<div class="iradio-blue">
					<input onclick="$('#xiamgmu').hide();$('#suoyou').show();$('#type').val(0);" type="radio" name="demo-radio1"style="width:20px;height:20px;" checked="checked"/>
					</div>
					<label for="radio-1" class="">全局推送</label>
				</div>
				
				<div class="radio-box">
					<div class="iradio-blue">
					<input onclick="$('#suoyou').hide();$('#xiamgmu').show();$('#type').val(1);" type="radio" name="demo-radio1" style="width:20px;height:20px;"/></div>
					<label for="radio-1" class="">项目推送</label>
				</div>
				
			</div>
		</div>
		
		<!--内部项目消息列表-->
		<div class="row cl" id="xiamgmu" style="display:none">
			<label class="form-label col-xs-4 col-sm-2">
			<span class="c-red">*</span>项目列表：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<span class="select-box">
				<select id='prj_id' class="select">
					<!--<option value ="0">所有</option>-->
					<?php if(is_array($project)): foreach($project as $k=>$vo): ?><option value ="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span> 
			</div>
		</div>
		
		<!--首页消息列表-->
		<div class="row cl" id="suoyou">
			<label class="form-label col-xs-4 col-sm-2">
			<span class="c-red">*</span>推送工种选择：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select id='gongzhong' class="select">
					<option value ="0">所有</option>
					<?php if(is_array($list)): foreach($list as $k=>$vo): ?><option value ="<?php echo ($vo["zhiwei"]); ?>"><?php echo ($vo["zhiwei"]); ?></option><?php endforeach; endif; ?>
				</select>
				</span> 
			</div>
		</div>
		
		
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<input onClick='tijiao()' class="btn btn-primary radius" type="button" value='发&nbsp;送'>
				<i class="Hui-iconfont">&#xe632;</i> 
			</input>
				<!--<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>-->
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/jquery.validation/1.14.0/messages_zh.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/HUI/lib/My97DatePicker/WdatePicker.js"></script>  
<script type="text/javascript" src="/Public/HUI/lib/My97DatePicker/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/ueditor/1.4.3/ueditor.config.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/ueditor/1.4.3/ueditor.all.min.js"> </script> 
<script type="text/javascript" src="/Public/HUI/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">

function tijiao(){
	var ue = UE.getEditor('editor');
	//获取html内容
	var hh 			= ue.getContent();
	var gongzhong	= $("#gongzhong").val();
	var prj_id		= $("#prj_id").val();
	var tt 			= $("#title").val();
	var type 		= $('#type').val();
	
	//alert(prj_id);alert(type);return false;
	//ajax 保存数据到服务器  alert(g);
	$.ajax({
		url:"http://wgcmanage.59jiaju.com/index.php/Admin/Systemmsg/sysMsgAdd",
		data:{'mtype':'公告','content':hh+"",'gongzhong':gongzhong+"",'prj_id':prj_id+"",'title':tt+"",'type':type+""},
		type:"post",
		dataType:"json",
		timeout:3000,
		async: false,
		beforeSend:function(XMLHttpRequest){
		},
		success:function(data,textStatus){
			var code = data.code;
			var message = data.message;
			switch(code){
				case 200:
					layer.msg(message+'',{icon:1,time:1000});
					window.location.reload();
					break;
				case 202:
					layer.msg(message+'',{icon:5,time:1000});
					break;
				default:
					layer.msg('未知错误',{icon:5,time:1000});
				
			}
		},
		complete: function(XMLHttpRequest, textStatus){
			//HideLoading();
			//alert("complete");
		},
		error:function(){
			layer.msg('网络错误',{icon:5,time:1000});
		}
	});	
	
  }
$(function(){
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
		swf: '/Public/HUI/lib/webuploader/0.1.5/Uploader.swf',
	
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