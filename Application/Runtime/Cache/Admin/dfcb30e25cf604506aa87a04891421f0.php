<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<link href="/Public/admin/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" id='shuaxin' title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action='/index.php/Admin/Budgetoffer/getList' method='post' id = 'qiandaosearch' name='qiandaosearch'>
	<div class="text-c">
		<input type="hidden" name="page" value='<?php if(empty($_POST['page'])): ?>1 <?php else: ?> <?php echo ($_POST['page']); endif; ?>' id='conutpage' />
		<!--<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 查询</button>-->
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="r">&nbsp; 总数据：&nbsp;<strong><?php echo ($all_count); ?></strong> 条 &nbsp;</span> 
		<span class="r">&nbsp; 当前页 <?php echo ($count); ?> 条 &nbsp;</span> 
		<select class="r" id='selectpage'>
			<?php  for($i=1;$i<=$pagecount;$i++){ if($i == $nowpage){ echo "<option value ='".$i."' selected = 'selected' >".$i."</option>"; }else{ echo "<option value ='".$i."'>".$i."</option>"; } } ?>
				
			</foreach>
		</select>  
		
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				
				<th width="100">发布者姓名</th>
				<th width="130">定位地址</th>
				<th width="130">手添地址</th>
				<th width="90">联系电话</th>
				<th width="90">报价</th>
				<th width="130">设置接收人</th>
				<th width="100">设置处理人</th>
				<th width="130">选择回话人</th>
				<!--<th width="30">回复</th>
				<th width="60">项  目</th>-->
				<th width="160">操  作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $k=>$row): ?><tr class="text-c">
				
					<td><?php echo ($row["name"]); ?></td>
					<td><?php echo ($row["autoaddress"]); ?></td>
					<td><?php echo ($row["address"]); ?></td>
					<td><?php echo ($row["tel"]); ?></td>
					<td><?php echo ($row["bj_name"]); ?>-<?php echo ($row["unit"]); ?></td>
					
					<td>
						<?php if(is_null($row['allnameoperator'])): ?><div id='operator' onclick='tianjiachuliren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>添加处理人</span></div>
						<?php elseif($row['allnameoperator'] == '' ): ?>
							<div id='operator' onclick='tianjiachuliren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>添加处理人</span></div>
						<?php else: ?>
							<div id='operator' onclick='tianjiachuliren(<?php echo ($row["id"]); ?>)'><?php echo ($row["allnameoperator"]); ?></div><?php endif; ?>	
					</td>
					
					<td>
						<?php if(is_null($row['rev_name'])): ?><div id='jieshouren' onclick='setjieshouren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>添加接收人</span></div>
						<?php elseif($row['rev_name'] == '' ): ?>
							<div id='jieshouren' onclick='setjieshouren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>添加接收人</span></div>
						<?php else: ?>
							<div id='jieshouren' onclick='setjieshouren(<?php echo ($row["id"]); ?>)'><?php echo ($row["rev_name"]); ?></div><?php endif; ?>
					</td>
					<td>
						<select id='select_userid'>
								<option class='select_rev_name' value="">请选择</option>
							<?php if(is_array($row["rev_names"])): foreach($row["rev_names"] as $uid=>$name): ?><option class='select_rev_name' value="<?php echo ($uid); ?>"><?php echo ($name); ?></option><?php endforeach; endif; ?>
						</select>
						<input type='hidden' id='userids' value='<?php echo ($row["userid"]); ?>' />
					</td>
					<th width="160">
						<span style='font-size:35px;'>
							<i class="Hui-iconfont" onclick="huifu(<?php echo ($row["id"]); ?>)" >&#xe68a;</i>&nbsp;&nbsp;
						</span>
						<span style='font-size:35px;'>
							<i class="Hui-iconfont" onclick="deletes(<?php echo ($row["id"]); ?>)" >&#xe609;</i>&nbsp;&nbsp;
						</span>
					</th>
				</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	</div>
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/admin/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
	//页码选择
	$("#selectpage").change(function(){
	  //设置页码
	  var pp = $(this).val();
	  $("#conutpage").val(pp);
	  $("#qiandaosearch").submit();
	});
	//刷新
	$("#shuaxin").bind("click", function(){
		$("#qiandaosearch").submit();
	});
	//设置项目id
	$("#selectkid").change(function(){
	  //设置页码
	  var kk = $(this).val();
	  $("#kid").val(kk);
	  $("#qiandaosearch").submit();
	});
	//导出数据
	$("#daochu").bind("click", function(){
	   var url = "<?php
 echo U('Qiandao/daochu',array('datemin' => I('post.datemin',''),'datemax' => I('post.datemax',''),'mobile' => I('post.mobile',''),'kid'=>I('post.kid',75,'intval'),'page' => I('post.page',1,'intval'))); ?>";
	  window.location.href = url;
	});
	$(".select_rev_name").bind("click", function(){
		var myvalue = $(this).val();
		$('#userids').val(myvalue);
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
//设置接收人
function setjieshouren(id){
	var url = '/index.php/Admin/Budgetoffer/revlist/id/'+id+'';
	member_add('设置接受人',url,'','510');
}
function tianjiachuliren(id){
    var url = '/index.php/Admin/Weixiumsg/listtt/id/'+id+'';
	member_add('设置处理人',url,'','510');
}

//删除
function deletes(id){
	var r=confirm("是否确定删除!");
    if (r==true){
        x="你选择了\"确定\"!";
		window.location.href = '/index.php/Admin/Budgetoffer/deletes/id/'+id+'';
    }
    else{
        x="你选择了\"取消\"!";
    }
}

//回复
/*function huifu(id){
	//http://jingyi.59jiaju.com/jingyi.php/Home/Weixiumsg/dataDetail
	var url = '/index.php/Admin/Budgetoffer/getDetail/id/'+id+'';
	member_add('回复',url,'','610');
}*/
function huifu(id){
	//alert(id);
	var userids = $('#userids').val();
	if(userids == null || userids == undefined || userids == ''){
		alert('请选择回话人！');
	}else{
		var url = '/index.php/Admin/Budgetoffer/huifu/id/'+id+'/userid/'+userids+'';
		member_add('回复',url,'','610');
	}
}
//添加项目
function addproject(id){
	var url = '/index.php/Admin/Weixiumsg/addproject/id/'+id+'';
	member_add('项目添加',url,'','650');
}
//项目管理
function xmmanage(id){
	var url = '/index.php/Admin/Project/manage/id/'+id+'';
	member_add('项目管理',url,'','650');
}
/*图片-查看*/
function product_show(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
</script> 
</body>
</html>