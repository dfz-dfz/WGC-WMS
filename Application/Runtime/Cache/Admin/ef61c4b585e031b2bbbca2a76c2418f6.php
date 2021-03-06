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
<title>材料采购</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 材料采购 <span class="c-gray en">&gt;</span> 材料采购列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 
		<input type="text" name="key" id="key" value="" placeholder="关键词名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit" onclick="cai_select()"><i class="Hui-iconfont">&#xe665;</i> 查找</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<span class="l">
	
	</span>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			
			<thead>
				<tr class="text-c">
					<th width="40">ID</th>
					<th width="120">材料名称</th>
					<th width="60">材料品牌</th>
					<th width="60">型号</th>
					<th width="120">材料描述</th>
					<th width="120">公司名称</th>
					<th width="40">添加时间</th>
					<th width="120">操作</th>
				</tr>
			</thead>
		
			<tbody id="weixiuMain">
				
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
	var serverUrl = "http://wgcapp.59jiaju.com/",
		page = 1,
		kehus = '<?php echo $_SESSION['wgcadmininfo']['kehu'];?>';

	$(function(){
		jQuery.support.cors = true;
		cai_select(page);
	});

	//分页
	function uppage(){
		if(page<1){
			page=1;
		}
		page--;
		cai_select(page);
	}

	function nextpage(){
		page++;
		cai_select(page);
	}

	//材料列表
	function cai_select(page){
		var key = $('#key').val();
		if(page == 1){
			$('#uppage').hide();
		}else{
			$('#uppage').show();
		}

		$.post("http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list_index",{
			page : page,
			cai_type :2,
			key : key
		},function(ret){
			var listHtml = '';
			if(ret.status == 200){
					page++;
					var data = ret.retData;
					   for(var i in data){
					var j = parseInt(i)+1;
							var pid = data[i].pid,
								m_name = (data[i].m_name == '' || data[i].m_name == null)?'-':data[i].m_name,
								brand  = (data[i].brand == '' || data[i].brand == null)?'-':data[i].brand,
								size   = (data[i].size == '' || data[i].size == null) ? '-':data[i].size,
								expire_time = data[i].expire_time,
								number = data[i].number,
								danwei = data[i].danwei,
								danjia = (data[i].danjia == '' || data[i].danjia == null) ? '-':data[i].danjia,
								heji   = (data[i].heji == '' || isNaN(data[i].heji)) ? '无':data[i].heji,
								introduce = data[i].introduce,
								office_name = (data[i].office_name == '' || data[i].office_name == null)?'-':data[i].office_name,
								introduce = data[i].introduce,
								addtime = _trans_php_time_to_str(data[i].atime,2),
								userid = data[i].userid,
								id = data[i].id,
								kehu = data[i].kehu;
							
							if(kehus == kehu){
								listHtml += '<tr class="text-c">';
									listHtml += '<td>'+id+'</td>';
									listHtml += '<td>'+m_name+'</td>';
									listHtml += '<td class="text-l">'+brand+'</td>';
									listHtml += '<td class="text-l">'+size+'</td>';
									listHtml += '<td class="text-l">'+introduce+'</td>';
									listHtml += '<td class="text-l">'+office_name+'</td>';
									listHtml += '<td class="text-l">'+addtime+'</td>';
									listHtml += '<td class="f-14 td-manage">';
										listHtml += '<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list_del/pid/'+pid+'/userid/'+userid+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>';
									listHtml += '</td>';
								listHtml += '</tr>';
							}else if(kehus == '微工程'){
								listHtml += '<tr class="text-c">';
									listHtml += '<td>'+id+'</td>';
									listHtml += '<td>'+m_name+'</td>';
									listHtml += '<td class="text-l">'+brand+'</td>';
									listHtml += '<td class="text-l">'+size+'</td>';
									listHtml += '<td class="text-l">'+introduce+'</td>';
									listHtml += '<td class="text-l">'+office_name+'</td>';
									listHtml += '<td class="text-l">'+addtime+'</td>';
									listHtml += '<td class="f-14 td-manage">';
										listHtml += '<a title="删除" onclick="return confirm("确定删除?")" href="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list_del/pid/'+pid+'/userid/'+userid+'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont" style="font-size:18px;">&#xe609;</i></a>';
									listHtml += '</td>';
								listHtml += '</tr>';
							}
				   
						 }
				
				$("#weixiuMain").html(listHtml);
				$('#nextpage').show();
				
				if($('tbody tr').length == 0){
					$('#nextpage').hide();
					$("#weixiuMain").html('<div style="border: none;width:100px;height:100px;margin:50px auto;font-size:20px;color:#999;line-height:50px;" class="empty">暂无数据</div>');
				}
			}else if(ret.status == 202){
				$('#nextpage').hide();
				$("#weixiuMain").html('<div style="border: none;width:100px;height:100px;margin:50px auto;font-size:20px;color:#999;line-height:50px;" class="empty">暂无数据</div>');
			}else{
				return false;
			
			}
			
		
		},"json");

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