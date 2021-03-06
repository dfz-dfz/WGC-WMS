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
<style>
	#yuwu_list tr td {
		text-align:center;
	}
</style>
<title>业务信息</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 业务信息 <span class="c-gray en">&gt;</span> 业务信息列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<input type="text" name="key" id="key" value="" placeholder="关键词名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="list()"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
	
	</span>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="150">公司名称</th>
					<th width="60">类别</th>
					<th width="60">职位</th>
					<th width="120">联系电话</th>
					<th width="60">他人联系</th>
					<th width="120">公司电话</th>
					<th width="120">QQ</th>
					<th width="120">地址</th>
					<th width="120">跟进人</th>
					<th width="120">备注</th>
					<th width="120">发布时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody id="yuwu_list">
			
			</tbody>
		</table>
		<div class="unpages" id="unpage" style="margin:50px auto;width: 200px;text-align: center;">
			<a id="uppage" style="background:red;color:#fff;width: 70px;height: 30px;line-height: 30px;padding:4px 5px;cursor:pointer;margin-right: 20px;" onclick="uppage()">上一页</a>
			<a id="nextpage" style="background:red;color:#fff;width: 70px;height: 30px;line-height: 30px;padding:4px 5px;cursor:pointer;" onclick="nextpage()">下一页</a>
		</div>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>  
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
	var page = 1;
	$(function(){
		list();
	});
	function list(page){
		var key = $('#key').val();
		$.post('http://wgcapp.wgc2013.com/jingyi.php/Home/yewu/yewu_list_admin',{
			page : page,
			key : key
		},function(ret){
			var listHtml = "";
			$("#search_back").hide();
			if(ret.status == 200){
				$("#listnext").show();
				$("#nullslist").hide();
				var data = ret.retData;
				for(var i in data){
				
					var addtime = _trans_php_time_to_str(data[i].addtime,2),
						company = data[i].company,
						companytel = data[i].companytel,
						dizhi   = data[i].dizhi,
						genjinren = data[i].genjinren,
						id      = data[i].id,
						othertel= data[i].othertel,
						ps      = data[i].ps,
						qq      = data[i].qq,
						tel     = data[i].tel,
						type    = data[i].type,
						userid  = data[i].userid,
						zhiwei  = data[i].zhiwei,
						userid = data[i].userid;
						
						listHtml +=		'<tr class="thead" style="background-color: #fff;">';
						listHtml +=		'<td><span>'+id+'</span></td>';
						listHtml +=		'<td><span>'+company+'</span></td>';
						listHtml +=		'<td><span>'+type+'</span></td>';
						listHtml +=		'<td><span>'+zhiwei+'</span></td>';
						listHtml +=		'<td><span>'+tel+'</span></td>';
						listHtml +=		'<td><span>'+othertel+'</span></td>';
						listHtml +=		'<td><span>'+companytel+'</span></td>';
						listHtml +=		'<td><span>'+qq+'</span></td>';
						listHtml +=		'<td><span>'+dizhi+'</span></td>';
						listHtml +=		'<td><span>'+genjinren+'</span></td>';
						listHtml +=		'<td><span>'+ps+'</span></td>';
						listHtml +=		'<td><span>'+addtime+'</span></td>';
						listHtml +=		'<td><a title="删除" href="http://wgcapp.wgc2013.com/jingyi.php/Home/yewu/yewu_list_del/id/'+id+'/userid/'+userid+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a></td>';
						listHtml +=		'</tr>';
				}
				$("#yuwu_list").html(listHtml);
				$('#nextpage').show();
			}else if(ret.status == 202){
				$('#nextpage').hide();
				$("#yuwu_list").html('暂无消息');
				if(types == 1){
					$("#listnext").hide();
					$("#yuwu_list").html("")
				}else if(types == 0){
					$("#yuwu_list").html("")
					$("#nullslist").show();
				}
			}
		},'json')
	}
	
	function uppage(){
		page--;
		if(page<=1){
			page=1;
		}
		list(page);
	}

	function nextpage(){
		page++;
		list(page);
	}
	
	function _trans_php_time_to_str(timestamp, n) {
		update = new Date(timestamp * 1000);
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