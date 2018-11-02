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
<title>材料推广</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 材料推广 <span class="c-gray en">&gt;</span> 材料推广列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<input type="text" name="key" id="key" value="" placeholder="关键词名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="search()"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="90">材料名称</th>
					<th width="60">发布地址</th>
					<th width="60">材料品牌</th>
					<th width="60">材料描述</th>
					<th width="60">商店地址</th>
					<th width="60">商店名称</th>
					<th width="60">缩略图</th>
					<th width="90">发布时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody class="list_show">
				
			</tbody>
		</table>
		<div class="page b-page">
			<div class="unpages" style="margin:20px auto;width: 200px;text-align: center;">
				<a id="uppages" style="background:red;color:#fff;width: 70px;height: 30px;line-height: 30px;padding:4px 5px;cursor:pointer;margin-right: 20px;" onclick="uppages()">上一页</a>
				<a id="nextpages" style="background:red;color:#fff;width: 70px;height: 30px;line-height: 30px;padding:4px 5px;cursor:pointer;" onclick="nextpages()" id="nextpages">下一页</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>  
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
	$().ready(function(){
		list();
	})
	
	var page = 1;
	function list(page,type){
		var url = 'http://wgcapp.wgc2013.com/jingyi.php/Home/Material/materialListe_user';
		$.post(url,{
			user_id:'',
			page : page,
	    	cai_type : 2,
	    	s_city   : '广州市',
	    	s_area   : '白云区',
	    	limit :10
		},function(ret){
			var listHtml = '';
			if(ret.code == 200){
				var data = ret.message;
				for(var i in data){
		            var id = data[i].id,
		            	userid = data[i].user_id,
		            	m_name=data[i].m_name,
		            	user_id = data[i].user_id,
		            	cai_type=data[i].cai_type,
		            	expire_time=data[i].expire_time,
		            	m_introduce=data[i].m_introduce,
		            	count=data[i].count,
		            	addtime = _trans_php_time_to_str(data[i].addtime,2),
		            	brand = data[i].brand,
		            	address = data[i].address,
		            	worker_address = data[i].worker_address,
		            	office_name = data[i].office_name,
		            	price       = data[i].price,
		            	tel         = (data[i].tel == "" || data[i].tel == null)?"暂无联系电话":data[i].tel,
		            	web         = (data[i].web == "" || data[i].web == null)?"暂无网址":data[i].web,
		            	qq          = (data[i].qq == "" || data[i].qq == null)?"暂无qq":data[i].qq,
		            	weixin      = (data[i].weixin == "" || data[i].weixin == null)?"暂无微信":data[i].weixin,
		            	m_photo = data[i].m_photo;
		            var photoArr = new Array();
		            	photoArr = m_photo.split(',');

						listHtml += '<tr class="text-c">';
							listHtml += '<td>'+id+'</td>';
							listHtml += '<td>'+m_name+'</td>';
							listHtml += '<td class="text-l">'+address+'</td>';
							listHtml += '<td>'+brand+'</td>';
							listHtml += '<td>'+m_introduce+'</td>';
							listHtml += '<td>'+worker_address+'</td>';
							listHtml += '<td>'+office_name+'</td>';
							listHtml += '<td>';
							if(m_photo != ''){
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
							listHtml += '<td class="f-14 td-manage">';
								listHtml += '<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/materialListe_user_del/id/'+id+'/user_id/'+userid+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>';
							listHtml += '</td>';
						listHtml += '</tr>';
						
				}
				$(".list_show").html(listHtml);
				$('#nextpages').show();
			}else if(ret.code == 202){
				if(type == 1){
					$('#nextpages').hide();
				}else if(type == 0){
					$(".list_show").html('<div style="text-align:center;color:#999;font-size:20px;line-height:150px;">暂无数据</div>');
				}
			}
		},'json')
	}
	
	function uppages(){
		if(page<1){
			page=1;
		}
		page--;
		list(page,1);
	}

	function nextpages(){
		page++;
		list(page,1);
	}


	function search(){
		$('#unpages').hide();
		$('#backList').show();
		var content = $('#key').val();
		if(content == ''){
			list(1,2);
			return false;
		}
		$.post('http://wgcapp.wgc2013.com/jingyi.php/Home/Material/materialListe_user_key', {
			user_id  : '',
	    	key      : content,
	    	cai_type : 2,
			limit :10
		}, function(ret) {
			var listHtml = '';
			if(ret.code == 200){
				var data = ret.message;
				for(var i in data){
		            var id = data[i].id,
		            	userid = data[i].user_id,
		            	m_name=data[i].m_name,
		            	user_id = data[i].user_id,
		            	cai_type=data[i].cai_type,
		            	expire_time=data[i].expire_time,
		            	m_introduce=data[i].m_introduce,
		            	count=data[i].count,
		            	addtime = _trans_php_time_to_str(data[i].addtime,2),
		            	brand = data[i].brand,
		            	address = data[i].address,
		            	worker_address = data[i].worker_address,
		            	office_name = data[i].office_name,
		            	price       = data[i].price,
		            	tel         = (data[i].tel == "" || data[i].tel == null)?"暂无联系电话":data[i].tel,
		            	web         = (data[i].web == "" || data[i].web == null)?"暂无网址":data[i].web,
		            	qq          = (data[i].qq == "" || data[i].qq == null)?"暂无qq":data[i].qq,
		            	weixin      = (data[i].weixin == "" || data[i].weixin == null)?"暂无微信":data[i].weixin,
		            	m_photo = data[i].m_photo;
		            var photoArr = new Array();
		            	photoArr = m_photo.split(',');

						listHtml += '<tr class="text-c">';
							listHtml += '<td>'+id+'</td>';
							listHtml += '<td>'+m_name+'</td>';
							listHtml += '<td class="text-l">'+address+'</td>';
							listHtml += '<td>'+brand+'</td>';
							listHtml += '<td>'+m_introduce+'</td>';
							listHtml += '<td>'+worker_address+'</td>';
							listHtml += '<td>'+office_name+'</td>';
							listHtml += '<td>';
							if(m_photo != ''){
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
							listHtml += '<td class="f-14 td-manage">';
								listHtml += '<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/materialListe_user_del/id/'+id+'/user_id/'+userid+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>';
							listHtml += '</td>';
						listHtml += '</tr>';
						
				}
				$(".list_show").html(listHtml);
				$('#nextpages').show();
			}else if(ret.code == 202){
				$('#nextpages').hide();
				$(".list_show").html('<div style="text-align:center;color:#999;font-size:20px;line-height:150px;">暂无数据</div>');
			}
		},'json');
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