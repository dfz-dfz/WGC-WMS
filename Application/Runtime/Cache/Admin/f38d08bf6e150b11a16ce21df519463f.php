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
	.mainnav {
		background-color: #fff;
	}
	.menu{
		border: none;
	}
	.line{
		border: none;
	}

.content {
	width: auto;
	height: auto;
	overflow: hidden;
	padding: 20px;
}

.content .content_ul {
	width: 100%;
}

.content_ul li {
	width: 100%;
	height: auto;
	overflow: hidden;
}

.tab_head ul {
	height: 50px;
	line-height: 50px;
	border-bottom: 1px solid #e1e1e1;
    font-size: 18px;
    font-weight: 600;
}
.tab_head ul li{
	text-align: center;
}


.tab_head ul,
.tab_content ul {
	width: 100%;
}

.tab_head ul li,
.tab_content ul li {
	width: 12.5%;
	float: left;
}

.tab_content ul {
	padding: 10px 0;
	
}
.tab_content ul li{
	text-align: center;
	
}
/*分页导航*/
.page_list {
	height: 20px;
	width: 600px;
	margin-left: auto;
	margin-right: auto;
}

.page_list ul {
	width: 100%;
}

.page_list ul li {
	float: left;
	border: 1px solid #e1e1e1;
	margin-right: 4px;
	text-align:center;
}

.page_list .ft {
	width: 8%;
}

.page_list .un {
	width: 9%;
}

.page_list .num {
	width: 4%;
}

.page_list .current {
	background-color: #fe552e;
}
.wages_custom input{
		width: 290px;
	}
	.current{
		border:none;
		color: #000;
		font-size: 12px;
	}
	.content ul{
		text-indent: 0;
	}
	.content{
		font-size: 12px;

	}
.filesmore{
	overflow: hidden;
}


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
<script charset="utf-8" type="text/javascript" src="http://www.wgc2013.com/includes/libraries/javascript/jquery.plugins/jquery.validate.js" ></script><style type="text/css">
body{background:url('') no-repeat center top }
.mainnav{width:990px; overflow:hidden; margin:0 auto}
.STYLE1 {color: red}
</style>
</head>
<body>
 	<div class="container_right" style="width: 98%;border: 1px solid #cacaca;float: right;background-color: #f7f7f7;padding: 0 10px 10px 10px;">

		<div class="budget base_ui_public" style="/*display: none;*/position: relative;">
			<ul class="budget_ul user_public_ul">
 				<li class="change_bg_li" style="margin-right: 10px;">我的文档</li>
 				<li style="margin-right: 10px;">图片</li>
				<li style="margin-right: 10px;display: none;">笔记</li>
				<li style="margin-right: 10px;">视频</li>
				<li style="margin-right: 10px;">PDF</li>
				<li style="margin-right: 10px;">压缩包</li>
				<!--<li style="margin-right: 10px;">分享列表</li>-->
				<li id="addwenjian" style="float: right;background-color: #0092d2;color: #fff;cursor: pointer;">新建文件夹</li>
 			</ul>
 			<div class="company_info base_info_public" style="overflow: hidden;/*padding-left: 15%;*/min-height: 250px;">
 		
 			<div class="company_detail" style="position: relative;/*left: -16%;*//*width: 115%;*/">
			<div style="overflow: hidden;margin-top: 10px;">
		
			<div class="section" style="border: none;">
				<div id="filename" style="width:400px;height: 140px;position: absolute;top: 100px;left: 230px;background-color: #9e9e9e;display: none;z-index: 100;">
					<form action="http://wgcapp.wgc2013.com/jingyi.php/Home/Wangpan/Folder_add" method="post" id="fileform">
					<div style="margin-top: 20px;">
					<label for="newfile" style="text-align: left;">请输入文件夹名称：</label>
					<input id="newfile" name="filename" type="text" style="width: 80%;"/>
					</div>
					<div style="margin-top: 20px;">
						<a id="cancelfile" style="padding: 5px 20px;background-color: red;color: #fff;margin: 5px 20px;border-radius: 5px;border: 0;">取消</a>
						<a id="sure" style="padding: 5px 20px;background-color: red;color: #fff;margin: 5px 20px;border-radius: 5px;border: 0;">确认</a>
					</div>
					<input type="hidden" id="usid" name="userid"/>
					<input type="hidden" id="ftype" name="type"/>
					</form>
				</div>
			<!-- 我的文件 -->
			<div class="sect current wages_custom" style="border: none;position: relative;overflow: hidden;min-height: 300px;height: auto;">

				
				<div class="filelist">
					 <div class="filesmore">

					 </div>
				</div>
			</div>
			<!-- 自定工价 end -->
			
			<!-- 图片 -->
			<div class="sect current wages_pic" style="display:none;min-height: 300px;height: auto;overflow: hidden;display: none;">
				<div class="filelist_pic">
					<div class="filesmore">

					 </div>
				</div>

			</div>
			<!-- 笔记-->
 			<div class="sect current wages_txt" style="position: relative;min-height: 300px;display:none;height: auto;overflow: hidden;display: none;">
				<div class="filelist_txt">
					<div class="filesmore">

					 </div>

				</div>
			</div>
			<!-- 视频 -->
			<div class="sect current wages_vedio" style="border: none;position: relative;overflow: hidden;min-height: 300px;height: auto;display: none;">
				<div class="filelist_vedio">
					<div class="filesmore">

					 </div>

				</div>
			</div>
			<!-- PDF -->
			<div class="sect current wages_pdf" style="border: none;position: relative;overflow: hidden;min-height: 300px;height: auto;display: none;">
				<div class="filelist_pdf">
					<div class="filesmore">

					 </div>

				</div>
			</div>
			<!-- 压缩包 -->
			<div class="sect current wages_tar" style="border: none;position: relative;overflow: hidden;min-height: 300px;height: auto;display: none;">
				<div class="filelist_tar">
					<div class="filesmore">

					 </div>

				</div>
			</div>
			<!-- 分享列表 -->
			<div class="sect current wages_share" style="border: none;position: relative;overflow: hidden;min-height: 300px;height: auto;display: none;">
				<div class="filelist_share" style="min-height: 270px;">
					<div class="filesmore">

					 </div>

				</div>
				<!-- 分页 -->
				<div id="pagelist" style="margin: 10px auto;">
						<a id="pre" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="prepage()">上一页</a>
						<a id="next" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="nextpage()">下一页</a>
				</div>	
			</div>
			</div>
		</div>
			
			<!-- 工价列表 end -->
			
			<!-- 分享弹窗 -->
					<div class="confirm" style="display: none;">
							<div class="tel_con" style="display: block;display: block;width: 50%;margin: 10px auto;background-color: #fff;padding-top: 10px;padding-bottom: 10px;height: 400px;box-shadow: 5px 5px 5px;">
							<div class="quxiao" style="position: absolute;font-size: 20px;top: 0px;left: 690px;background-color: #9e9e9e;border-radius: 10px;width: 20px;height: 20px;line-height: 20px;cursor: pointer;">×</div>							
							<div class="confirm_head" style="margin-bottom: 10px;">
								<input type="text" id="search_text" placeholder="请输入搜索的联系人" />
								<input class="confirm_btn" type="button" onclick="UserSearch()" value="搜索" />
								<input id="back_btn" type="button" onclick="back()" value="返回" style="width: 40px;margin-top: 0px;height: 20px;display: none;"/>
							</div>
							<div style="overflow-y: scroll;height:300px;">
							<div class="getUserList" style="min-height:270px;">
								
							</div>
							<!--分页 -->
							<div>
								<a href="javascript:;" style="display: inline-block;width: 50px;background-color: #9c9393;color: #ffffff;height: 20px;line-height: 20px;margin-right:20px;" onclick="prepageUser()">上一页</a>
								<a href="javascript:;" style="display: inline-block;width: 50px;background-color: #9c9393;color: #ffffff;height: 20px;line-height: 20px;" onclick="nextpageUser()">下一页</a>							
							</div>
							</div>
							<div style="margin-top:30px;">
								<input class="confirm_btn" type="button"  value="确认分享" style="display: inline-block;width: 100px;height: 30px;line-height: 25px;font-size: 18px;border-radius: 5px;background-color: #f8c67b;color: #fff;" onclick="sharebox()"/>
							</div>
						</div>
						
					</div>
					</div>
					<!-- 分享弹窗 end -->
			</div>


			</div>
	</div>
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
<script type="text/javascript">
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
		swf: '/Public/lib/webuploader/0.1.5/Uploader.swf',
	
		// 文件接收服务端。
		server: '/Public/lib/webuploader/0.1.5/server/fileupload.php',
	
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
	
	//表单验证
	$("#form-admin-add").validate({
		rules:{
			logo:{
				required:true, 
			},
			title:{
				required:true, 
			},
			cid:{
				required:true,
			},
			stock:{
				required:true,
			},
			freight:{
				required:true,
			},
			company:{
				required:true,
			},
			deliverymode:{
				required:true,
			},
			AfterSaleService:{
				required:true,
			},
			colors:{
				required:true,
			},
			placeoforigin:{
				required:true,
			},
			material:{
				required:true,
			},
			company:{
				required:true,
			},
			weight:{
				required:true,
			},
			sellingprice:{
				required:true,
			},
			marketvalue:{
				required:true,
			},
			costprice:{
				required:true,
			},
			abbreviatedtitle:{
				required:true,
			},
			weburl:{
				required:true,
			}
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "<<?php echo U('Goods/add_form');?>>" ,
				success: function(data){
					if(data.status == 200){
						layer.msg(data.content,{icon:1,time:8000});
						var index = parent.layer.getFrameIndex(window.name);
						parent.location.reload();
						parent.$('.btn-refresh').click();
						parent.layer.close(index);
					}else{
						layer.msg(data.content,{icon:1,time:8000});
					}
					
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:8000});
				}
			});
			//var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			//parent.layer.close(index);
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

});

(function( $ ){
    // 当domReady的时候开始初始化
    $(function() {
        var $wrap = $('.uploader-list-container'),

            // 图片容器
            $queue = $( '<ul class="filelist"></ul>' )
                .appendTo( $wrap.find( '.queueList' ) ),

            // 状态栏，包括进度和控制按钮
            $statusBar = $wrap.find( '.statusBar' ),

            // 文件总体选择信息。
            $info = $statusBar.find( '.info' ),

            // 上传按钮
            $upload = $wrap.find( '.uploadBtn' ),

            // 没选择文件之前的内容。
            $placeHolder = $wrap.find( '.placeholder' ),

            $progress = $statusBar.find( '.progress' ).hide(),

            // 添加的文件数量
            fileCount = 0,

            // 添加的文件总大小
            fileSize = 0,

            // 优化retina, 在retina下这个值是2
            ratio = window.devicePixelRatio || 1,

            // 缩略图大小
            thumbnailWidth = 110 * ratio,
            thumbnailHeight = 110 * ratio,

            // 可能有pedding, ready, uploading, confirm, done.
            state = 'pedding',

            // 所有文件的进度信息，key为file id
            percentages = {},
            // 判断浏览器是否支持图片的base64
            isSupportBase64 = ( function() {
                var data = new Image();
                var support = true;
                data.onload = data.onerror = function() {
                    if( this.width != 1 || this.height != 1 ) {
                        support = false;
                    }
                }
                data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                return support;
            } )(),

            // 检测是否已经安装flash，检测flash的版本
            flashVersion = ( function() {
                var version;

                try {
                    version = navigator.plugins[ 'Shockwave Flash' ];
                    version = version.description;
                } catch ( ex ) {
                    try {
                        version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                                .GetVariable('$version');
                    } catch ( ex2 ) {
                        version = '0.0';
                    }
                }
                version = version.match( /\d+/g );
                return parseFloat( version[ 0 ] + '.' + version[ 1 ], 10 );
            } )(),

            supportTransition = (function(){
                var s = document.createElement('p').style,
                    r = 'transition' in s ||
                            'WebkitTransition' in s ||
                            'MozTransition' in s ||
                            'msTransition' in s ||
                            'OTransition' in s;
                s = null;
                return r;
            })(),

            // WebUploader实例
            uploader;

        if ( !WebUploader.Uploader.support('flash') && WebUploader.browser.ie ) {

            // flash 安装了但是版本过低。
            if (flashVersion) {
                (function(container) {
                    window['expressinstallcallback'] = function( state ) {
                        switch(state) {
                            case 'Download.Cancelled':
                                alert('您取消了更新！')
                                break;

                            case 'Download.Failed':
                                alert('安装失败')
                                break;

                            default:
                                alert('安装已成功，请刷新！');
                                break;
                        }
                        delete window['expressinstallcallback'];
                    };

                    var swf = 'expressInstall.swf';
                    // insert flash object
                    var html = '<object type="application/' +
                            'x-shockwave-flash" data="' +  swf + '" ';

                    if (WebUploader.browser.ie) {
                        html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                    }

                    html += 'width="100%" height="100%" style="outline:0">'  +
                        '<param name="movie" value="' + swf + '" />' +
                        '<param name="wmode" value="transparent" />' +
                        '<param name="allowscriptaccess" value="always" />' +
                    '</object>';

                    container.html(html);

                })($wrap);

            // 压根就没有安转。
            } else {
                $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
            }

            return;
        } else if (!WebUploader.Uploader.support()) {
            alert( 'Web Uploader 不支持您的浏览器！');
            return;
        }

        // 实例化
        uploader = WebUploader.create({
            pick: {
                id: '#filePicker-2',
                label: '点击选择图片'
            },
            formData: {
                uid: 123
            },
            dnd: '#dndArea',
            paste: '#uploader',
            swf: '/Public/lib/webuploader/0.1.5/Uploader.swf',
            chunked: true,
			method : 'POST',
			fileNumLimit : 15,
			fileSizeLimit : 15,
            chunkSize: 512 * 1024,
            server: "http://wgcapp.wgc2013.com/upload.php",
            runtimeOrder: 'flash',
			fileVal:'gimg',
            accept: {
                 title: 'Images',
                 extensions: 'gif,jpg,jpeg,bmp,png',
                 mimeTypes: 'image/*'
            },
            // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
            disableGlobalDnd: true,
            fileNumLimit: 15,
            fileSizeLimit: 200 * 1024 * 1024,        // 200 M
            fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
        });
		
		// 文件上传成功，给item添加成功class, 用样式标记上传成功。
		uploader.on( 'uploadSuccess', function(file,response ) {
			//var str = JSON.stringify(response);  
			//var filepath = JSON.stringify(file);  
			
			
			var paths = response.path;
			// console.log("file"+file)
			// console.log("str"+response.path)

			var $ImgPath = $("#ImgPath").val();

			var ImgUrl = $ImgPath+','+paths;

			if(ImgUrl.substr(0,1) == ","){
				ImgUrl = ImgUrl.substr(1)
			}

			$("#ImgPath").val(ImgUrl);

			var vals = $("#ImgPath").val();

			
			
			$("#ImgPath").val(vals);
			console.log(vals);
			

			$("#gimg").append("<input type='hidden' value='"+response._raw+"' name='gimg[]'/>");
			$( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
		});
		
		

        // 拖拽时不接受 js, txt 文件。
        uploader.on( 'dndAccept', function( items ) {
            var denied = false,
                len = items.length,
                i = 0,
                // 修改js类型
                unAllowed = 'text/plain;application/javascript ';

            for ( ; i < len; i++ ) {
                // 如果在列表里面
                if ( ~unAllowed.indexOf( items[ i ].type ) ) {
                    denied = true;
                    break;
                }
            }

            return !denied;
        });

        uploader.on('dialogOpen', function() {
            console.log('here');
        });

        // uploader.on('filesQueued', function() {
        //     uploader.sort(function( a, b ) {
        //         if ( a.name < b.name )
        //           return -1;
        //         if ( a.name > b.name )
        //           return 1;
        //         return 0;
        //     });
        // });

        // 添加“添加文件”的按钮，
        uploader.addButton({
            id: '#filePicker2',
            label: '继续添加'
        });

        uploader.on('ready', function() {
            window.uploader = uploader;
        });

        // 当有文件添加进来时执行，负责view的创建
        function addFile( file ) {
            var $li = $( '<li id="' + file.id + '">' +
                    '<p class="title">' + file.name + '</p>' +
                    '<p class="imgWrap"></p>'+
                    '<p class="progress"><span></span></p>' +
                    '</li>' ),

                $btns = $('<div class="file-panel">' +
                    '<span class="cancel">删除</span>' +
                    '<span class="rotateRight">向右旋转</span>' +
                    '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
                $prgress = $li.find('p.progress span'),
                $wrap = $li.find( 'p.imgWrap' ),
                $info = $('<p class="error"></p>'),

                showError = function( code ) {
                    switch( code ) {
                        case 'exceed_size':
                            text = '文件大小超出';
                            break;

                        case 'interrupt':
                            text = '上传暂停';
                            break;

                        default:
                            text = '上传失败，请重试';
                            break;
                    }

                    $info.text( text ).appendTo( $li );
                };

            if ( file.getStatus() === 'invalid' ) {
                showError( file.statusText );
            } else {
                // @todo lazyload
                $wrap.text( '预览中' );
                uploader.makeThumb( file, function( error, src ) {
                    var img;

                    if ( error ) {
                        $wrap.text( '不能预览' );
                        return;
                    }

                    if( isSupportBase64 ) {
                        img = $('<img src="'+src+'">');
                        $wrap.empty().append( img );
                    } else {
                        $.ajax('/Public/lib/webuploader/0.1.5/server/preview.php', {
                            method: 'POST',
                            data: src,
                            dataType:'json'
                        }).done(function( response ) {
                            if (response.result) {
                                img = $('<img src="'+response.result+'">');
                                $wrap.empty().append( img );
                            } else {
                                $wrap.text("预览出错");
                            }
                        });
                    }
                }, thumbnailWidth, thumbnailHeight );

                percentages[ file.id ] = [ file.size, 0 ];
                file.rotation = 0;
            }

            file.on('statuschange', function( cur, prev ) {
                if ( prev === 'progress' ) {
                    $prgress.hide().width(0);
                } else if ( prev === 'queued' ) {
                    $li.off( 'mouseenter mouseleave' );
                    $btns.remove();
                }

                // 成功
                if ( cur === 'error' || cur === 'invalid' ) {
                    console.log( file.statusText );
                    showError( file.statusText );
                    percentages[ file.id ][ 1 ] = 1;
                } else if ( cur === 'interrupt' ) {
                    showError( 'interrupt' );
                } else if ( cur === 'queued' ) {
                    percentages[ file.id ][ 1 ] = 0;
                } else if ( cur === 'progress' ) {
                    $info.remove();
                    $prgress.css('display', 'block');
                } else if ( cur === 'complete' ) {
                    $li.append( '<span class="success"></span>' );
                }

                $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
            });

            $li.on( 'mouseenter', function() {
                $btns.stop().animate({height: 30});
            });

            $li.on( 'mouseleave', function() {
                $btns.stop().animate({height: 0});
            });

            $btns.on( 'click', 'span', function() {
                var index = $(this).index(),
                    deg;

                switch ( index ) {
                    case 0:
                        uploader.removeFile( file );
                        return;

                    case 1:
                        file.rotation += 90;
                        break;

                    case 2:
                        file.rotation -= 90;
                        break;
                }

                if ( supportTransition ) {
                    deg = 'rotate(' + file.rotation + 'deg)';
                    $wrap.css({
                        '-webkit-transform': deg,
                        '-mos-transform': deg,
                        '-o-transform': deg,
                        'transform': deg
                    });
                } else {
                    $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
                    // use jquery animate to rotation
                    // $({
                    //     rotation: rotation
                    // }).animate({
                    //     rotation: file.rotation
                    // }, {
                    //     easing: 'linear',
                    //     step: function( now ) {
                    //         now = now * Math.PI / 180;

                    //         var cos = Math.cos( now ),
                    //             sin = Math.sin( now );

                    //         $wrap.css( 'filter', "progid:DXImageTransform.Microsoft.Matrix(M11=" + cos + ",M12=" + (-sin) + ",M21=" + sin + ",M22=" + cos + ",SizingMethod='auto expand')");
                    //     }
                    // });
                }


            });

            $li.appendTo( $queue );
        }

        // 负责view的销毁
        function removeFile( file ) {
            var $li = $('#'+file.id);

            delete percentages[ file.id ];
            updateTotalProgress();
            $li.off().find('.file-panel').off().end().remove();
        }

        function updateTotalProgress() {
            var loaded = 0,
                total = 0,
                spans = $progress.children(),
                percent;

            $.each( percentages, function( k, v ) {
                total += v[ 0 ];
                loaded += v[ 0 ] * v[ 1 ];
            } );

            percent = total ? loaded / total : 0;


            spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
            spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
            updateStatus();
        }

        function updateStatus() {
            var text = '', stats;

            if ( state === 'ready' ) {
                text = '选中' + fileCount + '张图片，共' +
                        WebUploader.formatSize( fileSize ) + '。';
            } else if ( state === 'confirm' ) {
                stats = uploader.getStats();
                if ( stats.uploadFailNum ) {
                    text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+
                        stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                }

            } else {
                stats = uploader.getStats();
                text = '共' + fileCount + '张（' +
                        WebUploader.formatSize( fileSize )  +
                        '），已上传' + stats.successNum + '张';

                if ( stats.uploadFailNum ) {
                    text += '，失败' + stats.uploadFailNum + '张';
                }
            }

            $info.html( text );
        }

        function setState( val ) {
            var file, stats;

            if ( val === state ) {
                return;
            }

            $upload.removeClass( 'state-' + state );
            $upload.addClass( 'state-' + val );
            state = val;
			
            switch ( state ) {
                case 'pedding':
                    $placeHolder.removeClass( 'element-invisible' );
                    $queue.hide();
                    $statusBar.addClass( 'element-invisible' );
                    uploader.refresh();
                    break;

                case 'ready':
                    $placeHolder.addClass( 'element-invisible' );
                    $( '#filePicker2' ).removeClass( 'element-invisible');
                    $queue.show();
                    $statusBar.removeClass('element-invisible');
                    uploader.refresh();
                    break;

                case 'uploading':
                    $( '#filePicker2' ).addClass( 'element-invisible' );
                    $progress.show();
                    $upload.text( '暂停上传' );
                    break;

                case 'paused':
                    $progress.show();
                    $upload.text( '继续上传' );
                    break;

                case 'confirm':
                    $progress.hide();
                    $( '#filePicker2' ).removeClass( 'element-invisible' );
                    $upload.text( '开始上传' );

                    stats = uploader.getStats();
                    if ( stats.successNum && !stats.uploadFailNum ) {
                        setState( 'finish' );
                        return;
                    }
                    break;
                case 'finish':
                    stats = uploader.getStats();
                    if ( stats.successNum ) {
						layer.msg('上传成功',{icon:1,time:3000});
                    } else {
                        // 没有成功的图片，重设
                        state = 'done';
                        location.reload();
                    }
                    break;
            }

            updateStatus();
        }

        uploader.onUploadProgress = function( file, percentage ) {
            var $li = $('#'+file.id),
                $percent = $li.find('.progress span');

            $percent.css( 'width', percentage * 100 + '%' );
            percentages[ file.id ][ 1 ] = percentage;
            updateTotalProgress();
        };

        uploader.onFileQueued = function( file ) {
            fileCount++;
            fileSize += file.size;

            if ( fileCount === 1 ) {
                $placeHolder.addClass( 'element-invisible' );
                $statusBar.show();
            }

            addFile( file );
            setState( 'ready' );
            updateTotalProgress();
        };

        uploader.onFileDequeued = function( file ) {
            fileCount--;
            fileSize -= file.size;

            if ( !fileCount ) {
                setState( 'pedding' );
            }

            removeFile( file );
            updateTotalProgress();

        };

        uploader.on( 'all', function( type ) {
            var stats;
            switch( type ) {
                case 'uploadFinished':
                    setState( 'confirm' );
                    break;

                case 'startUpload':
                    setState( 'uploading' );
                    break;

                case 'stopUpload':
                    setState( 'paused' );
                    break;

            }
        });

        uploader.onError = function( code ) {
            alert( 'Eroor: ' + code );
        };

        $upload.on('click', function() {
            if ( $(this).hasClass( 'disabled' ) ) {
                return false;
            }

            if ( state === 'ready' ) {
                uploader.upload();
            } else if ( state === 'paused' ) {
                uploader.upload();
            } else if ( state === 'uploading' ) {
                uploader.stop();
            }
        });

        $info.on( 'click', '.retry', function() {
            uploader.retry();
        } );

        $info.on( 'click', '.ignore', function() {
            alert( 'todo' );
        } );

        $upload.addClass( 'state-' + state );
        updateTotalProgress();
    });

})( jQuery );



</script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$("#ftype").val(2)
		list();
		messagelist(spage,0);
		$(".user_yun_li").children().eq(1).css({
			"color" : "red"
		})

	});
	var sindex = '';
	//列表切换
	$(".budget_ul li:first").click(function(){
		window.location.href = "/index.php/Admin/Wangpanpc/document.html";
		// $("#ftype").val(2)
		sindex = '';
		list();
    })
	//图片
	$(".budget_ul li:eq(1)").click(function(){
		window.location.href = "/index.php/Admin/Wangpanpc/picture.html";
		sindex = 1;
		list();
    })
	//笔记
    $(".budget_ul li:eq(2)").click(function(){
		list();
    })
    //视频
    $(".budget_ul li:eq(3)").click(function(){
    	window.location.href = "/index.php/Admin/Wangpanpc/video.html";
		// $("#ftype").val(5)
		list();
		sindex = 3;
    })
    //PDF
    $(".budget_ul li:eq(4)").click(function(){
    	window.location.href = "/index.php/Admin/Wangpanpc/pdf.html";
		// $("#ftype").val(3)
		list();
		sindex = 4;
    })
    //压缩包
    $(".budget_ul li:eq(5)").click(function(){
    	window.location.href = "/index.php/Admin/Wangpanpc/zip.html";
		// $("#ftype").val(6)
		list();
		sindex = 5;
    })

	$(".share_btn").click(function(e){
		e.stopPropagation(); 
		$(".confirm").show();
	})
	$(".wages_list").click(function(){
		$(".confirm").hide();
		$(".wages_list").css("background-color","#fff")
	})

	//询价列表
var page =1,upage =1;;
	
	//分享
	function share(){
		//获取选择的内容的id值
		var $list = $("input[type='checkbox']");
	}
	
	//分享选择接收人
	function  showUserList(){
		var page = 1;
		uid= '<?php echo $_SESSION["user_info"]["user_id"];?>';
		$.ajax({
				type:"POST",
				url:'http://wgcapp.wgc2013.com/jingyi.php/Home/index/getAllMyRelative',
				data:{
						uid:'<?php echo $_SESSION["user_info"]["user_id"];?>',
		            	type:'PRIVATE',
		            	types:'user_list',
		            	page : page,
				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "JSON",
				success:function(ret){
					var html = '';
					var datas = ret.data;
					$('.getUserList').html("")
					if(ret.code == 200){
						page ++;
						for(var j in datas){
							var data = datas[j];
							var message = datas[j].message;
							html += '<div class="tel_list">'+data.zhiwei+'</div>';
							for(var i in message){
								var zhiwei = message[i].zhiwei,
									id     = message[i].id,
									touid = message[i].touid,
									name = message[i].name,
									names = message[i].user_name, 
									imgUrl = message[i].userphoto;
								html += '<ul>';
									html += '<li class="tel_li">';
										html += '<div class="check">';
											html += '<input name="tid" type="checkbox" value="'+touid+'" name="checkbox" />';
										html += '</div>';
										html += '<div class="head_img">';
											html += '<img src="'+url+imgUrl+'" alt=""/>';
										html += '</div>';
										html += '<div class="tel_data">';
											html += '<span>'+name+'</span>';
											html += '<span>'+names+'</span>';
										html += '</div>';
									html += '</li>';
								html += '</ul>';
							}
						}

						$('.getUserList').append(html);
						//获取数据id
								var arr = new Array();
				                $('input[name="id"]:checked').each(function(i){
				                    arr[i] = $(this).val();
				                });
				                var vals = arr.join(",");
					}else {
						alert('数据加载失败，请检查网络!');
					}
				},
				error:function(err){
					console.log("错误是");
					console.log(err);
				}
			});
	}

	//通讯录搜索
	function UserSearch(){
		var key_word = $('#search_text').val();

		if(key_word == ''){
			showUserList();
		}else{
			$.post(url+'jingyi.php/Home/index/searchMyRelatives', {
				uid : '<?php echo $_SESSION["user_info"]["user_id"];?>',
				type:'PRIVATE',
				types:'user_list',
	        	keyword : key_word,
			}, function(ret,err) {
				var datas = ret.data;
				var html = '';

				if(ret.code == 200){
					$('.getUserList').html('');
						page ++;
						for(var j in datas){
							var data = datas[j];
							var message = datas[j].message;
							html += '<div class="tel_list">'+data.zhiwei+'</div>';
							for(var i in message){
								var zhiwei = message[i].zhiwei,
									touid = message[i].touid,
									name = message[i].name,
									names = message[i].user_name, 
									imgUrl = message[i].userphoto;
								html += '<ul>';
									html += '<li class="tel_li">';
										html += '<div class="check">';
											html += '<input type="checkbox" value="'+touid+'" name="tid" />';
										html += '</div>';
										html += '<div class="head_img">';
											html += '<img src="'+url+imgUrl+'" alt=""/>';
										html += '</div>';
										html += '<div class="tel_data">';
											html += '<span>'+name+'</span>';
											html += '<span>'+names+'</span>';
										html += '</div>';
									html += '</li>';
								html += '</ul>';
							}
						}

					$('.getUserList').append(html);
					$('#back_btn').show();
				}else if(ret.code == 201){
					$('.getUserList').html('暂无数据');
				}else{
					alert('请检查网络连接');
					return false;
				}
			},'json');
		}
	}

	//确认分享
	function sharebox(){
		//获取数据id
		var arr = new Array();
		var tarry = new Array();
        $('input[name="id"]:checked').each(function(i){
            arr[i] = $(this).val();
        });
        var vals = arr.join(",");

        //获取通讯录id
  		$('input[name="tid"]:checked').each(function(j){
            tarry[j] = $(this).val();
        });
        var tvals = tarry.join(",");

        $.post('http://wgcapp.wgc2013.com/jingyi.php/Home/index/share',{
        	"type":10,
        	"arr":arr,
        	"tarry":tarry
        },function(ret){
        	if(ret.code == 200){
        		window.location.reload();
        	}
        },'json')
	}
	
	//通讯录分页控制

	function pageindexUser(pindex){
			//console.log(index)
			if(pindex < 1){
				pindex = 1;
				upage=1;
			}
		$('.getUserList').html("");
			uid= '<?php echo $_SESSION["user_info"]["user_id"];?>';
			$.ajax({
					type:"POST",
					url:'http://wgcapp.wgc2013.com/jingyi.php/Home/index/getAllMyRelative',
					data:{
							uid:'<?php echo $_SESSION["user_info"]["user_id"];?>',
			            	type:'PRIVATE',
			            	types:'user_list',
			            	page : pindex,
					},
					cache:false,
					crossDomain: true == !(document.all),
					dataType: "JSON",
					success:function(ret){
						console.log("成功");
						console.log(ret)
						var html = '';
						var datas = ret.data;
						$('.getUserList').html("")
						if(ret.code == 200){
							page ++;
							for(var j in datas){
								var data = datas[j];
								var message = datas[j].message;
								html += '<div class="tel_list">'+data.zhiwei+'</div>';
								for(var i in message){
									var zhiwei = message[i].zhiwei,
										id     = message[i].id,
										touid = message[i].touid,
										name = message[i].name,
										names = message[i].user_name, 
										imgUrl = message[i].userphoto;
									html += '<ul>';
										html += '<li class="tel_li">';
											html += '<div class="check">';
												html += '<input name="tid" type="checkbox" value="'+touid+'" name="checkbox" />';
											html += '</div>';
											html += '<div class="head_img">';
												html += '<img src="'+url+imgUrl+'" alt=""/>';
											html += '</div>';
											html += '<div class="tel_data">';
												html += '<span>'+name+'</span>';
												html += '<span>'+names+'</span>';
											html += '</div>';
										html += '</li>';
									html += '</ul>';
								}
							}

							$('.getUserList').append(html);
							//获取数据id
									var arr = new Array();
					                $('input[name="id"]:checked').each(function(i){
					                    arr[i] = $(this).val();
					                });
					                var vals = arr.join(",");
					                console.log(vals);
						}else {
							alert('数据加载失败，请检查网络!');
						}
					},
					error:function(err){
						console.log("错误是");
						console.log(err);
					}
				});

		}
	//下一页
	function nextpageUser(){
		
		pageindexUser(++upage);

		}
	//上一页
	function prepageUser(){
		pageindexUser(--upage);
	}
	$(".quxiao").click(function(){
		$(this).parent().parent().hide();
	})
	//返回检索列表
	function back(){
		$('#back_btn').hide();
		$('#search_text').val('');
		showUserList();
	}

	//日历插件
	   //获取当前日期
    function getNowFormatDate() {
        var date = new Date();
        var seperator1 = "-";
        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var strDate = date.getDate();
        if (month >= 1 && month <= 9) {
            month = "0" + month;
        }
        if (strDate >= 0 && strDate <= 9) {
            strDate = "0" + strDate;
        }
        var currentdate = year + seperator1 + month + seperator1 + strDate;
        return currentdate;
    }
		JTC.setDateRange(getNowFormatDate(), '2021-01-01', true);  //设置可选日期范围 
    	var timeclick = getNowFormatDate();
    	var addTimeDateForm = "JTC.setday({minDate:'"+timeclick+"',maxDate:'2021-01-01',ranged: true})";
  
	$("#come_time").click(function(){
		JTC.setDateRange(getNowFormatDate(), '2021-01-01', true);  //设置可选日期范围 
    	var timeclick = getNowFormatDate();
    	JTC.setday({minDate:timeclick,maxDate:'2021-01-01',ranged: true});
	})
	$("#end_time").click(function(){
		JTC.setDateRange(getNowFormatDate(), '2021-01-01', true);  //设置可选日期范围 
    	var timeclick = getNowFormatDate();
    	JTC.setday({minDate:timeclick,maxDate:'2021-01-01',ranged: true});
	})

		//时间转换
	function timestampToTime(timestamp) {
        var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
        Y = date.getFullYear() + '-';
        M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
        D = date.getDate() + ' ';
        h = date.getHours() + ':';
        m = date.getMinutes() + ':';
        s = date.getSeconds();
        return Y+M+D;
    }

    //点击新建文件
 $("#cancelfile").click(function(){
 	$("#filename").hide();
 })
 $("#addwenjian").click(function(){
 	$("#filename").show();
 })
$("#sure").click(function(){
	var uid = '<?php echo $_SESSION["user_info"]["user_id"];?>';
	$("#usid").val(uid);
	var vals = $("#newfile").val();
	if(vals){
		$("#fileform").submit();
	}else{
		alert("请输入文件名");
	}
	
})
	function list(){
		var types = $("#ftype").val();
		var page = 1;
		uid= '<?php echo $_SESSION["user_info"]["user_id"];?>';
		$.ajax({
				type:"POST",
				url:'http://wgcapp.wgc2013.com/jingyi.php/Home/Wangpan/Folder_list',
				data:{
					userid:'<?php echo $_SESSION["user_info"]["user_id"];?>',
	            	page : page,
	            	type : types
				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "JSON",
				success:function(ret){
					var listHtml = "";
					if(ret.code == 200){
						$(".nulls").hide();
						var data = ret.message;
						for(var i in data){
							var filepath = data[i].filepath,
								filename = data[i].filename,
								addtime  = data[i].addtime,
								id       = data[i].id;

							listHtml +=	'<div class="filelistson" style="width: 20%;float: left;height: auto;overflow: hidden;position:relative;cursor:pointer;">';
							listHtml += '<div class="cancels" style="text-align:right;position:absolute;left:85%;display:none;" onclick="shanchu('+id+')" title="删除"><img src="/themes/mall/jiaju/images/center/cancel1.png" alt="" style="width:20px;height:20px;cursor:pointer;"/></div>';
							listHtml += '<div class="renamefile" style="text-align:right;position:absolute;left:10px;display:none;" title="重命名"><img src="/themes/mall/jiaju/images/center/rename.png" alt="" style="width:20px;height:20px;cursor:pointer;"/></div>';
							listHtml += '<div onclick="enterfile('+id+','+types+')">';
							listHtml += '<img src="/themes/mall/jiaju/images/wenjiajia.png" alt="" style="width: 50%;height: 70px;"/>';
							listHtml += '<span style="display: block;">'+filename+'</span>';
							listHtml += '</div>';
							listHtml += '<div class="renamebox" style="display: none;"><input type="hidden" value="'+id+'"/><input class="rename" type="text" value="'+filename+'" style="width:75px;"/></div>';
							listHtml += '</div>';
						}
						
						if(types == 2){
							$(".filelist .filesmore").html(listHtml);
						}else if(types == 1){
							$(".filelist_pic .filesmore").html(listHtml);
						}else if(types == 4){
							$(".filelist_txt .filesmore").html(listHtml);
						}else if(types == 5){
							$(".filelist_vedio .filesmore").html(listHtml);
						}else if(types == 3){
							$(".filelist_pdf .filesmore").html(listHtml);
						}else if(types == 6){
							$(".filelist_tar .filesmore").html(listHtml);
						}
					}else if(ret.code == 202){
						$(".filelist").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						if(types == 2){
							$(".filelist").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}else if(types == 1){
							$(".filelist_pic").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}else if(types == 4){
							$(".filelist_txt").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}else if(types == 5){
							$(".filelist_vedio").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}else if(types == 3){
							$(".filelist_pdf").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}else if(types == 6){
							$(".filelist_tar").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}
					}
					},
					
				error:function(err){
					console.log("错误是");
					console.log(err);
				}
			});
	}	
//分享列表
var spage =1;
function messagelist(spage,typesindex){
	if(spage == 1){
		$("#pre").hide();
	}else{
		$("#pre").show();
	}
	var pid = '<?php echo $_GET["id"];?>';
		uid= '<?php echo $_SESSION["user_info"]["user_id"];?>';
		$.ajax({
				type:"POST",
				url:'http://wgcapp.wgc2013.com/jingyi.php/Home/Wangpan/file_share_list',
				data:{
					userid:'<?php echo $_SESSION["user_info"]["user_id"];?>',
	            	page : spage,
				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "JSON",
				success:function(ret){
					var listHtml = "";
					if(ret.code == 200){
						$("#next").show();
						$(".nulls").hide();
						var data = ret.message;
						for(var i in data){
							var filepath = data[i].filepath,
								addtime  = data[i].addtime,
								dir      = data[i].dir,
								types    = data[i].types,
								username = data[i].username,
								id       = data[i].id;
							var filename =(data[i].filename == null)?"未命名":filename = data[i].filename;
							listHtml +=	'<div class="filelistson" style="width: 20%;float: left;height: auto;overflow: hidden;position:relative;margin-top:15px;padding:10px 0;">';
							listHtml += '<div class="download" style="text-align:right;position:absolute;left:85%;display:none;" title="下载" onclick="download(\''+dir+'\',\''+types+'\')"><img src="/themes/mall/jiaju/images/center/xiazai.png" alt="" style="width:20px;height:20px;cursor:pointer;"/></div>';
							listHtml += '<span style="display: block;">分享人：'+username+'</span>';
							listHtml += '<img src="/themes/mall/jiaju/images/wenjian.png" alt="" style="width: 50%;height: 70px;"/>';
							listHtml += '<span style="display: block;">'+filename+'</span>';
							listHtml += '</div>';
						}
						$(".filelist_share .filesmore").html(listHtml);
					}else if(ret.code == 202){
						if(types == 0){
							$(".filelist_share").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}
						if(types == 1){
							$("#next").hide();
							$(".filelist_share .filesmore").html();	
							$(".filelist_share").html('<div class="nulls" style="font-size: 20px;color: #9e9e9e;width: 100%;text-align: center;margin-top:20px;">暂无列表</div>');
						}
						
					}
					},
					
				error:function(err){
					console.log("错误是");
					console.log(err);
				}
			});
}

//分享分页
function prepage(){
	if(spage == 1){
		spage=2;
	}
	messagelist(--spage,1)
}

function nextpage(){
	messagelist(++spage,1)
}

function shanchu(id){
	var uid = '<?php echo $_SESSION["user_info"]["user_id"];?>';
	window.location.href="http://wgcapp.wgc2013.com/jingyi.php/Home/Wangpan/Folder_del"+"/userid/"+uid+"/id/"+id;
}
function enterfile(id,types){
	var surl = "/index.php?app=search&act=user_yun_content"+sindex+"&id="+id+"&types="+types;
	// window.open(surl);
	window.location.href = surl;
}
function download(url,types){
	window.location.href = "http://wgcapp.wgc2013.com/jingyi.php/Home/Wangpan/file_download/path"+url+"/type/"+types;
}
//重命名
$(".filesmore").on('click','.renamefile',function(e){
	$(this).next().children().eq(1).hide();
	$(this).next().next().show();
	event.stopPropagation();
	var id = $(this).children().first().val();
	var vals = $(this).next().next().children().eq(1).val();
})
$(".filesmore").on('blur','.rename',function(){
	var id = $(this).prev().val();
	var vals = $(this).val();
	$(this).parent().hide();
	$(this).parent().prev().children().eq(1).show();
	$(this).parent().prev().children().eq(1).text(vals);
	$.ajax({
		type:"POST",
		url:'http://wgcapp.wgc2013.com/jingyi.php/Home/Wangpan/Folder_setField',
		data:{
			userid:'<?php echo $_SESSION["user_info"]["user_id"];?>',
			filename : vals,
			id  : id
		},
		cache:false,
		crossDomain: true == !(document.all),
		dataType: "JSON",
		success:function(ret){
			
		},
			
		error:function(err){
			console.log("错误是");
			console.log(err);
		}
	});
})
//鼠标移动背景更换
$(".filelist").on('mouseenter','.filelistson',function(){
	$(this).css('background-color','#9e9e9e');
	$(this).children().first().show();
	$(this).children().eq(1).show();
})
$(".filelist").on('mouseleave','.filelistson',function(){
	$(this).css('background-color','#fff');
	$(this).children().first().hide();
	$(this).children().eq(1).hide();
})
$(".filelist_pic").on('mouseenter','.filelistson',function(){
	$(this).css('background-color','#9e9e9e');
	$(this).children().first().show();
	$(this).children().eq(1).show();
})
$(".filelist_pic").on('mouseleave','.filelistson',function(){
	$(this).css('background-color','#fff');
	$(this).children().first().hide();
	$(this).children().eq(1).hide();
})
$(".filelist_vedio").on('mouseenter','.filelistson',function(){
	$(this).css('background-color','#9e9e9e');
	$(this).children().first().show();
	$(this).children().eq(1).show();
})
$(".filelist_vedio").on('mouseleave','.filelistson',function(){
	$(this).css('background-color','#fff');
	$(this).children().first().hide();
	$(this).children().eq(1).hide();
})
$(".filelist_pdf").on('mouseenter','.filelistson',function(){
	$(this).css('background-color','#9e9e9e');
	$(this).children().first().show();
	$(this).children().eq(1).show();
})
$(".filelist_pdf").on('mouseleave','.filelistson',function(){
	$(this).css('background-color','#fff');
	$(this).children().first().hide();
	$(this).children().eq(1).hide();
})
$(".filelist_tar").on('mouseenter','.filelistson',function(){
	$(this).css('background-color','#9e9e9e');
	$(this).children().first().show();
	$(this).children().eq(1).show();
})
$(".filelist_tar").on('mouseleave','.filelistson',function(){
	$(this).css('background-color','#fff');
	$(this).children().first().hide();
	$(this).children().eq(1).hide();
})
$(".filelist_share").on('mouseenter','.filelistson',function(){
	$(this).css('background-color','#9e9e9e');
	$(this).children().first().show();
	
})
$(".filelist_share").on('mouseleave','.filelistson',function(){
	$(this).css('background-color','#fff');
	$(this).children().first().hide();
	
})
</script>
</body>
</html>