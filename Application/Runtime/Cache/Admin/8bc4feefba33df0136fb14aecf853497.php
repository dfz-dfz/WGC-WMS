<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<link rel="stylesheet" type="text/css" href="/Public/css/page.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>设计分包</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 设计分包 <span class="c-gray en">&gt;</span> 设计分包列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<input type="text" name="key" id="key" value="" placeholder="关键词名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="searchList()"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
	
	</span> 
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="150">项目名称</th>
					<th width="60">创建人</th>
					<th width="120">项目地址</th>
					<th width="40">图片</th>
					<th width="80">发布时间</th>
					<th width="80">截止时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody id="shejiMain">
				
			</tbody>
		</table>
		<div class="page b-page">
			<div class="unpage" style="margin:20px auto;width: 200px;text-align: center;">
				<a id="uppage" style="background:red;color:#fff;width: 70px;height: 30px;line-height: 30px;padding:4px 5px;cursor:pointer;margin-right: 20px;" onclick="uppage()">上一页</a>
				<a id="nextpage" style="background:red;color:#fff;width: 70px;height: 30px;line-height: 30px;padding:4px 5px;cursor:pointer;" onclick="nextpage()" id="nextpages">下一页</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>  
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
	var page = 1;
	
	$().ready(function(){
		repair_list();
	})
	
	function repair_list(page){
	
		$.post('http://wgcapp.wgc2013.com/index.php/Home/Designoffer/getLists', {
			page   :page
		}, function(ret) {
			
			if(ret.code == 200){
				var data = ret.message;
				var listHtml = '';
				for(var i in data){
					var price = (data[i].price == null || data[i].price == '') ? '未设定':data[i].price,
		            	name = data[i].name,
		            	address = (data[i].address == null || data[i].address == '') ? '未设定':data[i].address,
		            	project_name = (data[i].project_name == null || data[i].project_name == '') ? '未设定':data[i].project_name,//项目名称
		            	ps = (data[i].ps == null || data[i].ps == '') ? '未设定':data[i].ps,//备注
		            	send_uid = data[i].user_id,
		            	unit = data[i].unit,
		            	tell = data[i].tell,
		            	type = data[i].type,
		            	deadline = (data[i].deadline == null || data[i].deadline == '') ? '未设定':data[i].deadline,//截止时间
						addtime = _trans_php_time_to_str(data[i].addtime,2),//添加时间
						content = data[i].content,
		            	autoaddress = data[i].autoaddress,
		            	id = data[i].id,
						user_id = data[i].user_id,
						img = data[i].img;
						
					var photoArr = new Array();
		            	photoArr = img.split(',');

						listHtml += '<tr class="text-c">';
							listHtml += '<td>'+id+'</td>';
							listHtml += '<td>'+project_name+'</td>';
							listHtml += '<td class="text-l">'+name+'</td>';
							listHtml += '<td>'+address+'</td>';
							listHtml += '<td>';
							if(img != ''){
								for(var i in photoArr){
									listHtml += '<a href="http://wgcapp.wgc2013.com'+photoArr[i]+'" target="_blank">';
									listHtml += '<img src="http://wgcapp.wgc2013.com'+photoArr[i]+'" width="120" height="80" style="margin-right:10px;margin-bottom:10px;">';	
									listHtml += '</a>';
								}
							}else{
								listHtml += '<span>暂无缩略图</span>';
							}
							listHtml += '</td>';
							listHtml += '<td class="td-status">'+addtime+'</td>';
							listHtml += '<td class="td-status">'+deadline+'</td>';
							listHtml += '<td class="f-14 td-manage">';
								listHtml += '<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/index.php/Home/Designoffer/getList_del/id/'+id+'/user_id/'+user_id+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>';
							listHtml += '</td>';
						listHtml += '</tr>';
					
				}
				$('#shejiMain').html(listHtml);
				$('#nextpage').show();
			}else if(ret.code == 202){
				$('#nextpage').hide();
				$("#shejiMain").html('<div style="text-align:center;color:#999;font-size:20px;line-height:150px;">暂无数据</div>');
			}else{
				alert('网络连接失败，请检查网络');
				return false;
			}
		},'json');
	}
	
	//设计分包搜索
	function searchList(){
		var key = $('#key').val();
		$('.unpages').hide();
		$.post('http://wgcapp.wgc2013.com/index.php/Home/Designoffer/getLists_key', {
			key      : key
		}, function(ret) {
			if(ret.code == 200){
				var data = ret.message;
				var listHtml = '';
				for(var i in data){
					var price = (data[i].price == null || data[i].price == '') ? '未设定':data[i].price,
		            	name = data[i].name,
		            	address = (data[i].address == null || data[i].address == '') ? '未设定':data[i].address,
		            	project_name = (data[i].project_name == null || data[i].project_name == '') ? '未设定':data[i].project_name,//项目名称
		            	ps = (data[i].ps == null || data[i].ps == '') ? '未设定':data[i].ps,//备注
		            	send_uid = data[i].user_id,
		            	unit = data[i].unit,
		            	tell = data[i].tell,
		            	type = data[i].type,
		            	deadline = (data[i].deadline == null || data[i].deadline == '') ? '未设定':data[i].deadline,//截止时间
						addtime = _trans_php_time_to_str(data[i].addtime,2),//添加时间
						content = data[i].content,
		            	autoaddress = data[i].autoaddress,
		            	id = data[i].id,
						user_id = data[i].user_id,
						img = data[i].img;
						
					var photoArr = new Array();
		            	photoArr = img.split(',');

						listHtml += '<tr class="text-c">';
							listHtml += '<td>'+id+'</td>';
							listHtml += '<td>'+project_name+'</td>';
							listHtml += '<td class="text-l">'+name+'</td>';
							listHtml += '<td>'+address+'</td>';
							listHtml += '<td>';
							if(img != ''){
								for(var i in photoArr){
									listHtml += '<a href="http://wgcapp.wgc2013.com'+photoArr[i]+'" target="_blank">';
									listHtml += '<img src="http://wgcapp.wgc2013.com'+photoArr[i]+'" width="120" height="80" style="margin-right:10px;margin-bottom:10px;">';	
									listHtml += '</a>';
								}
							}else{
								listHtml += '<span>暂无缩略图</span>';
							}
							listHtml += '</td>';
							listHtml += '<td class="td-status">'+addtime+'</td>';
							listHtml += '<td class="td-status">'+deadline+'</td>';
							listHtml += '<td class="f-14 td-manage">';
								listHtml += '<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/index.php/Home/Designoffer/getList_del/id/'+id+'/user_id/'+user_id+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>';
							listHtml += '</td>';
						listHtml += '</tr>';
					
				}
				$('#shejiMain').html(listHtml);
				$('#nextpage').show();
			}else if(ret.code == 202){
				$('#nextpage').hide();
				$("#shejiMain").html('<div style="text-align:center;color:#999;font-size:20px;line-height:150px;">暂无数据</div>');
			}else{
				alert('网络连接失败，请检查网络');
				return false;
			}
		},'json');

		$('#sjfbList').css({
			height: 'auto',
			overflow: 'hidden'
		});

		$('#back_btn').css({
			display: 'block'
		});
	}
	
	function uppage(){
		if(page<1){
			page=1;
		}
		page--;
		repair_list(page);
	}

	function nextpage(){
		page++;
		repair_list(page);
	}

	
	function _trans_php_time_to_str(timestamp, n) {
		update = new Date(timestamp * 1000);
		//鏃堕棿鎴宠涔�1000
		year = update.getFullYear();
		month = (update.getMonth() + 1 < 10) ? ('0' + (update.getMonth() + 1)) : (update.getMonth() + 1);
		day = (update.getDate() < 10) ? ('0' + update.getDate()) : (update.getDate());
		hour = (update.getHours() < 10) ? ('0' + update.getHours()) : (update.getHours());
		minute = (update.getMinutes() < 10) ? ('0' + update.getMinutes()) : (update.getMinutes());
		second = (update.getSeconds() < 10) ? ('0' + update.getSeconds()) : (update.getSeconds());
		if (n == 1) {
			return (year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second);
		} else if (n == 2) {
			return (year + '-' + month + '-' + day);
		} else if (n == 3) {
			return (month + '-' + day);
		} else if (n == 4) {
			return (hour + ':' + minute + ':' + second);
		} else if (n == 5) {
			return (year + '-' + month + '-' + day + ' ' + hour + ':' + minute );
		} else {
			return 0;
		}
	}
</script> 
</body>
</html>