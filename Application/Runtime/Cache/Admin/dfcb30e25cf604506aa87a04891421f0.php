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
<title>ç”¨æˆ·ç®¡ç†</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> é¦–é¡µ <span class="c-gray en">&gt;</span> ç”¨æˆ·ä¸­å¿ƒ <span class="c-gray en">&gt;</span> ç”¨æˆ·ç®¡ç† <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" id='shuaxin' title="åˆ·æ–°" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action='/index.php/Admin/Budgetoffer/getList' method='post' id = 'qiandaosearch' name='qiandaosearch'>
	<div class="text-c">
		<input type="hidden" name="page" value='<?php if(empty($_POST['page'])): ?>1 <?php else: ?> <?php echo ($_POST['page']); endif; ?>' id='conutpage' />
		<!--<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> æŸ¥è¯¢</button>-->
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="r">&nbsp; æ€»æ•°æ®ï¼š&nbsp;<strong><?php echo ($all_count); ?></strong> æ¡ &nbsp;</span> 
		<span class="r">&nbsp; å½“å‰é¡µ <?php echo ($count); ?> æ¡ &nbsp;</span> 
		<select class="r" id='selectpage'>
			<?php  for($i=1;$i<=$pagecount;$i++){ if($i == $nowpage){ echo "<option value ='".$i."' selected = 'selected' >".$i."</option>"; }else{ echo "<option value ='".$i."'>".$i."</option>"; } } ?>
				
			</foreach>
		</select>  
		
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				
				<th width="100">å‘å¸ƒè€…å§“å</th>
				<th width="130">å®šä½åœ°å€</th>
				<th width="130">æ‰‹æ·»åœ°å€</th>
				<th width="90">è”ç³»ç”µè¯</th>
				<th width="90">æŠ¥ä»·</th>
				<th width="130">è®¾ç½®æ¥æ”¶äºº</th>
				<th width="100">è®¾ç½®å¤„ç†äºº</th>
				<th width="130">é€‰æ‹©å›è¯äºº</th>
				<!--<th width="30">å›å¤</th>
				<th width="60">é¡¹  ç›®</th>-->
				<th width="160">æ“  ä½œ</th>
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
						<?php if(is_null($row['allnameoperator'])): ?><div id='operator' onclick='tianjiachuliren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>æ·»åŠ å¤„ç†äºº</span></div>
						<?php elseif($row['allnameoperator'] == '' ): ?>
							<div id='operator' onclick='tianjiachuliren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>æ·»åŠ å¤„ç†äºº</span></div>
						<?php else: ?>
							<div id='operator' onclick='tianjiachuliren(<?php echo ($row["id"]); ?>)'><?php echo ($row["allnameoperator"]); ?></div><?php endif; ?>	
					</td>
					
					<td>
						<?php if(is_null($row['rev_name'])): ?><div id='jieshouren' onclick='setjieshouren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>æ·»åŠ æ¥æ”¶äºº</span></div>
						<?php elseif($row['rev_name'] == '' ): ?>
							<div id='jieshouren' onclick='setjieshouren(<?php echo ($row["id"]); ?>)'><span style='color:red;'>æ·»åŠ æ¥æ”¶äºº</span></div>
						<?php else: ?>
							<div id='jieshouren' onclick='setjieshouren(<?php echo ($row["id"]); ?>)'><?php echo ($row["rev_name"]); ?></div><?php endif; ?>
					</td>
					<td>
						<select id='select_userid'>
								<option class='select_rev_name' value="">è¯·é€‰æ‹©</option>
							<?php if(is_array($row["rev_names"])): foreach($row["rev_names"] as $uid=>$name): ?><option class='select_rev_name' value="<?php echo ($uid); ?>"><?php echo ($name); ?></option><?php endforeach; endif; ?>
						</select>
						<input type='hidden' id='userids' value='<?php echo ($row["userid"]); ?>' />
					</td>
					<th width="160"><span style='font-size:35px;'>
					<i class="Hui-iconfont" onclick="huifu(<?php echo ($row["id"]); ?>)" >&#xe68a;</i>&nbsp;&nbsp;
				    
					</span></th>
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
	//é¡µç é€‰æ‹©
	$("#selectpage").change(function(){
	  //è®¾ç½®é¡µç 
	  var pp = $(this).val();
	  $("#conutpage").val(pp);
	  $("#qiandaosearch").submit();
	});
	//åˆ·æ–°
	$("#shuaxin").bind("click", function(){
		$("#qiandaosearch").submit();
	});
	//è®¾ç½®é¡¹ç›®id
	$("#selectkid").change(function(){
	  //è®¾ç½®é¡µç 
	  var kk = $(this).val();
	  $("#kid").val(kk);
	  $("#qiandaosearch").submit();
	});
	//å¯¼å‡ºæ•°æ®
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
/*ç”¨æˆ·-æ·»åŠ */
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
//è®¾ç½®æ¥æ”¶äºº
function setjieshouren(id){
	var url = '/index.php/Admin/Budgetoffer/revlist/id/'+id+'';
	member_add('è®¾ç½®æ¥å—äºº',url,'','510');
}
function tianjiachuliren(id){
    var url = '/index.php/Admin/Weixiumsg/listtt/id/'+id+'';
	member_add('è®¾ç½®å¤„ç†äºº',url,'','510');
}

//å›å¤
/*function huifu(id){
	//http://jingyi.59jiaju.com/jingyi.php/Home/Weixiumsg/dataDetail
	var url = '/index.php/Admin/Budgetoffer/getDetail/id/'+id+'';
	member_add('å›å¤',url,'','610');
}*/
function huifu(id){
	//alert(id);
	var userids = $('#userids').val();
	if(userids == null || userids == undefined || userids == ''){
		alert('è¯·é€‰æ‹©å›è¯äººï¼');
	}else{
		var url = '/index.php/Admin/Budgetoffer/huifu/id/'+id+'/userid/'+userids+'';
		member_add('å›å¤',url,'','610');
	}
}
//æ·»åŠ é¡¹ç›®
function addproject(id){
	var url = '/index.php/Admin/Weixiumsg/addproject/id/'+id+'';
	member_add('é¡¹ç›®æ·»åŠ ',url,'','650');
}
//é¡¹ç›®ç®¡ç†
function xmmanage(id){
	var url = '/index.php/Admin/Project/manage/id/'+id+'';
	member_add('é¡¹ç›®ç®¡ç†',url,'','650');
}
/*å›¾ç‰‡-æŸ¥çœ‹*/
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
</html><!--³»Dõw‘Õ½ÈBK…È÷˜²ò Izû0£¼ü!¡»ßĞİìYöM™[³2N½«2K(­F“Rn¥KH
š`ALIK öjƒOŸÅš±¿Ác3…:âhÍo}S÷’ôIü¬+;’ëÌ“Sô±¤Dq­ œhç#´ëK&FÎK¦
¥(ô‹ù|YˆÔ†o
é½ìVìŞq¤	bâë#ßÛ±¦ø/Š _wÔ¸ƒµ¹«·}`S;³××7ù¼GJ òàØäåÍ{qÔx -‘¾Æ4€ÕÏZô‚¨g¡¶™ä¦¯%Q`£i!¦,gàvéY6ä´ú‘¤ìVæx˜V\ÔP+™OÈ dÈpSsõÏ(k1fbaIeâ’Àµ¡ıÍ=nfúB»Zí|?V¸Åºî‡{–†mm¥«Ã¿¯¡Aøc7@ß+6Ò_Æ§Qıæ‹È©všë¡A‚i_d‡Q¢²Ú\Ûqº²Oæë)İ“Xƒ ÷ˆÓÒíhESW{†ux=šçôO—÷şP ÏäRÿøÏäÏäÏä‚9NÒ`Y@ïä Ïä-->