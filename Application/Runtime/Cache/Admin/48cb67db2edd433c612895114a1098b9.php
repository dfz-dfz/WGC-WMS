<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8"/>
<title>用户中心-材料采购</title>
<meta name="description" content="微工程，微工程APP，装修、材料、家具、饰品一站式服务，让装修更简单，价格更透明！！" />
<meta name="keywords" content="微工程，微工程，家居商城，微工程家居商城，微工程家居装修商城，办公室装修，写字楼装修，材料，装修材料，家居，办公家具，家居，家具，装修，装饰" />
<link rel="stylesheet" type="text/css" href="/themes/mall/jiaju/css/api.css"/>
<link type="text/css" href="/themes/mall/jiaju/styles/default/css/center.css" rel="stylesheet"  />
<link rel="stylesheet" type="text/css" href="/themes/mall/jiaju/css/aui.1.0.css"/>
<link rel="stylesheet" href="themes/mall/jiaju/styles/css/tel_list.css">
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<!-- <script type="text/javascript" src="www.wgc2013.com/themes/mall/jiaju/js/jquery-1.8.3.min.js"></script> -->
<script type="text/javascript">
	jQuery.support.cors = true;

</script>

</head>

<body style="background:#fff;">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <base href="http://www.wgc2013.com/" /> -->
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link type="text/css" href="themes/mall/jiaju/styles/default/css/main.css" rel="stylesheet"  />
<link type="text/css" href="themes/mall/jiaju/styles/css/global.css" rel="stylesheet"  />
<link type="text/css" href="http://www.wgc2013.com/themes/mall/jiaju/styles/default/css/catalog.css" rel="stylesheet"  />
<link type="text/css" href="http://www.wgc2013.com/themes/mall/jiaju/styles/default/css/footer.css" rel="stylesheet" />
<link type="text/css" href="themes/mall/jiaju/styles/css/style.css" rel="stylesheet"  />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="http://www.wgc2013.com/includes/libraries/javascript/ecmall.js" charset="utf-8"></script>
<script type="text/javascript" src="http://www.wgc2013.com/includes/libraries/javascript/cart.js" charset="utf-8"></script>
<script type="text/javascript" src="http://www.wgc2013.com/themes/mall/jiaju/styles/default/js/main.js" charset="utf-8"></script>

<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="http://www.wgc2013.com/themes/mall/jiaju/styles/default/js/hoverForIE6.js"></script>
<![endif]-->
<!--[if IE 8]>
<link type="text/css" href="themes/mall/jiaju/css/ie8.css" rel="stylesheet"  />
<![endif]-->
<script type="text/javascript">
var SITE_URL = "http://www.wgc2013.com";
var PRICE_FORMAT = '&yen;%s';
</script>
<script charset="utf-8" type="text/javascript" src="http://www.wgc2013.com/includes/libraries/javascript/jquery.plugins/jquery.validate.js" ></script><style type="text/css">
body{background:url('') no-repeat center top }
.mainnav{width:990px; overflow:hidden; margin:0 auto}
.STYLE1 {color: red}
</style>
<script type="text/javascript" src="http://www.wgc2013.com/themes/mall/jiaju/styles/default/js/hover.js"></script>
<script>

</script>
<style>
.meterial_buy_detail table tbody td{
	border-bottom: 1px solid #000;
	padding: 15px 0;
}
.meterial_buy_detail table thead tr{
	border-bottom: 1px solid #000;
}
.meterial_buy_detail table thead th{
	padding: 10px 0px;
}
.meterial_buy_detail table thead th span{
	border: none;
}
.meterial_buy_detail_share table tbody td{
	border-bottom: 1px solid #000;
	padding: 15px 0;
}
.meterial_buy_detail_share table thead tr{
	border-bottom: 1px solid #000;
}
.meterial_buy_detail_share table thead th{
	padding: 10px 0px;
}
.meterial_buy_detail_share table thead th span{
	border: none;
}
</style>
</head>
<body>
{include file=header.html}

<!-- 中部主要内容 -->
 <div class="container" style="overflow: hidden;width: 1200px;margin: 10px auto;">
 <!-- 左上的导航栏 -->
 	 {include file=companycenter.html}
<!-- 	 -->

 	<!-- 右边的内容 -->
 	<div class="container_right" style="width: 80%;border: 1px solid #cacaca;float: right;background-color: #f7f7f7;padding: 0 10px 10px 10px;">

		<!-- 预算报价 -->
		<div class="budget base_ui_public" style="/*display: none;*/position: relative;">
			<ul class="budget_ul user_public_ul">
 				<li class="change_bg_li" style="margin-right: 10px;">材料采购</li>
				<li style="margin-right: 10px;">采购列表</li>
				<li style="margin-right: 10px;">分享列表</li>
 			</ul>
 			<div class="budget_info base_info_public" style="overflow: hidden;padding-left: 15%;min-height: 250px;">
 			<!-- 预算报价 -->
 			<div class="budget_detail" style="position: relative;left: -16%;width: 115%;">
			<div style="overflow: hidden;margin-top: 10px;">
			<!-- 搜索框 -->
<!-- 			<div style="overflow: hidden;margin-top: 10px;">
			<input type="text" style="width: 265px;height: 30px;float: left;border: 1px solid #808080;border-radius: 0;" />

			<div style="float: left;">
				<a href="#" style="display: inline-block;width: 75px;height: 30px;line-height: 30px;font-size: 16px;color: #f3552d;border: 1px solid #808080; background-color: #facd89;">搜索</a>
				<a class="share_dinge" href="javascript:;" style="display: inline-block;width: 60px;height: 30px;line-height: 30px;font-size: 16px;color: #2d2a2a;font-weight: bold;letter-spacing: 4px; background-color: #facd89;border-radius: 5px;position: relative;left: 385px;text-decoration: none;">分享</a>
			</div>
			</div> -->
				<!-- 预算表格 -->
				<div class="budget_table" style="min-height: 480px;">
				<form action="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials" method="post" id="myform">	
				<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0" id="budget_table">
					<tbody>
						<tr class="thead" style="background-color: #eee;">
							<th style="width: 5%"><span style="border-left:  2px solid #bcbcbc">序号</span></th>
							<th style="width: 16%"><span>材料名称</span></th>
							<th style="width: 8%"><span>品牌</span></th>
							<th style="width: 10%"><span>型号</span></th>
							<th style="width: 10%"><span>需到货时间</span></th>
							<th style="width: 6%"><span>数量</span></th>
							<th style="width: 6%"><span>单位</span></th>
							<th style="width: 6%"><span>单价</span></th>
							<th style="width: 6%"><span>合计</span></th>
							<th style="width: 18%"><span style="border-right:  2px solid #bcbcbc">备注</span></th>
						</tr>
						<!-- <tr class="tmain">
							<td style="width: 5%"><span>1</span></td>
							<td style="width: 16%"><span>水泥</span></td>
							<td style="width: 8%"><span>石井</span></td>
							<td style="width: 10%"><span>120*600*200</span></td>
							<td style="width: 10%"><span>2018.12.31</span></td>
							<td style="width: 6%"><span>1000</span></td>
							<td style="width: 6%"><span>立方</span></td>
							<td style="width: 6%"><span>5000</span></td>
							<td style="width: 6%"><span>500000</span></td>
							<td style="width: 18%;border-right:2px solid #bcbcbc;"><span>1捆=10根，1根=3米</span></td>
						</tr> -->
					</tbody>
				</table>
				<div class="gongchen_total" style="width: 100%;height: 30px;border:  2px solid #979898;border-top: none;">
						<span class="add_table" style="width: 5.4%;border-left: none;border-right:  2px solid #979898;font-size: 20px;cursor: pointer;">+</span>
						<span style="width: 6.6%;margin-left: 61.6%;">总计：</span>
						<span style="width: 6.6%;"><textarea id="totals" style="height: 100%;border: none;text-align: center;" name="total" readonly="readonly"></textarea></span>
						<span id="all_total" style="width: 18%;">优惠价:<textarea style="width: 110px; height: 20px;border: none;text-align: center;" name="discount"></textarea></span>
					</div>
					<!-- 材料申购单位 -->
					<div class="meterial_buy">
						<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr class="thead" style="background-color: #eee;">
									<th style="width: 29%"><span style="border-left:  2px solid #bcbcbc">材料申购单位</span></th>
									<th style="width: 20%"><span>收货地址</span></th>
									<th style="width: 12%"><span>申购日期</span></th>
									
									<th style="width: 6%"><span>联系电话</span></th>
									<th style="width: 6%"><span>申购人</span></th>
									<th style="width: 18%"><span style="border-right:  2px solid #bcbcbc">备注</span></th>
								</tr>
								<tr class="tmain">
									<td style="width: 29%"><textarea name="office_name"></textarea></td>
									<td style="width: 20%"><textarea name="worker_address" style="overflow: visible;height: 100%;line-height: 20px;"></textarea></td>
									<td style="width: 12%"><textarea name="dateofpurchase" onclick="JTC.setday({minDate:getNowFormatDate(), maxDate:'2021-01-01', ranged: true})"></textarea><input type="hidden" id="userid" name="uid" value="<?php echo $_SESSION["user_info"]["user_id"];?>"/></td>
									
									<td style="width: 6%"><textarea name="tel" style="overflow: visible;height: 100%;line-height: 20px;"></textarea></td>
									<td style="width: 6%"><textarea name="sgperson"></textarea></td>
									<td style="width: 18%;border-right:  2px solid #bcbcbc"><textarea name="ps" style="overflow: visible;height: 100%;line-height: 20px;"></textarea></td>
								</tr>
<!-- 								<tr class="tmain">
									<td style="width: 29%"><textarea></textarea></td>
									<td style="width: 20%"><textarea style="overflow: visible;height: 100%;line-height: 20px;"></textarea></td>
									<td style="width: 12%"><textarea></textarea></td>
									
									<td style="width: 6%"><textarea style="overflow: visible;height: 100%;line-height: 20px;"></textarea></td>
									<td style="width: 6%"><textarea></textarea></td>
									<td style="width: 18%;border-right:  2px solid #bcbcbc"><textarea style="overflow: visible;height: 100%;line-height: 20px;"></textarea></td>
								</tr> -->
							</tbody>
						</table>
					</div>
					<div class="send_people" style="text-align: center;margin-top: 50px;">
						<!-- <a class="sender" href="javascript:;" style="width: 100px;height: 40px;font-size: 15px;font-weight: bold;background-color: #eb6100;border-radius: 5px;color: #fff;display: inline-block;line-height: 40px;text-align: center;margin: 0 30px;">接收人</a> -->
						<a class="share_btn" href="javascript:;" style="width: 100px;height: 40px;font-size: 15px;font-weight: bold;background-color: #eb6100;border-radius: 5px;color: #fff;display: inline-block;line-height: 40px;text-align: center;margin: 0 30px;" onclick="showUserList()">选择分享人</a>
					</div>
			<!-- 隐藏域 -->
					<input type="hidden" id="checker" name="power"/>

					</form>
				</div>
			<!-- 分享弹窗 -->
					<div class="confirm" style="display: none;">
<!-- 						<form class="confirm_" action="post" method="">
							<div class="share_text">
								<span>分享内容</span><span class="colon">:</span>
								<textarea name="" id="" cols="30" rows="10" placeholder="内容获取"></textarea>
							</div>
							<div class="share_sendee">
								<span style="letter-spacing: 5px;">接收人</span><span class="colon">:</span>
								<input type="text" placeholder="选择接收人">
							</div>
							<input class="share_btn" type="button" value="分享确认">
						</form> -->
							<div class="tel_con" style="display: block;display: block;width: 50%;margin: 10px auto;background-color: #fff;padding-top: 10px;padding-bottom: 10px;height: 435px;box-shadow: 5px 5px 5px;position:relative;">
							<div class="quxiao_tel" style="position: absolute;font-size: 20px;top: -8px;left: 450px;background-color: #9e9e9e;border-radius: 10px;width: 20px;height: 20px;line-height: 20px;">×</div>
							<div class="confirm_head" style="margin-bottom: 10px;text-align: center;">
								<input type="text" id="search_text" placeholder="请输入搜索的联系人" style="width:40%;height:30px;"/>
								<input class="confirm_btn" type="button" onclick="UserSearch()" value="搜索" style="width: 40px;margin-top: -15px;height: 20px;"/>
							</div>
							<div style="overflow-y: scroll;height:300px;">
							<div class="getUserList" style="min-height:270px;">
								
							</div>
							<!--分页 -->
							<div style="text-align: center;">
								<a href="javascript:;" style="display: inline-block;width: 50px;background-color: #9c9393;color: #ffffff;height: 20px;line-height: 20px;margin-right:20px;" onclick="prepageUser()">上一页</a>
								<a href="javascript:;" style="display: inline-block;width: 50px;background-color: #9c9393;color: #ffffff;height: 20px;line-height: 20px;" onclick="nextpageUser()">下一页</a>							
							</div>
							</div>
							<div style="margin-top:30px;text-align: center;">
								<input class="confirm_btn" type="button"  value="确认分享" style="display: inline-block;width: 100px;height: 30px;line-height: 25px;font-size: 18px;border-radius: 5px;background-color: #f8c67b;color: #fff;" onclick="sharebox()"/>
							</div>

						</div>
						
					</div>
			</div>
			</div>
			
			<!--采购列表 -->
 			<div class="budget_detail_list" style="position: relative;left: -16%;width: 115%;display:none;">
			<div style="overflow: hidden;margin-top: 10px;position: relative;">
			<!-- 搜索框 -->
			<div style="overflow: hidden;margin-top: 10px;">
			<input type="text" style="width: 265px;height: 30px;float: left;border: 1px solid #808080;border-radius: 0;" />

			<div style="float: left;">
				<a href="javascript:;" style="display: inline-block;width: 75px;height: 30px;line-height: 30px;font-size: 16px;color: #f3552d;border: 1px solid #808080; background-color: #facd89;" onclick="searchlist(spage,0)">搜索</a>
				<a id="backlist" href="javascript:;" style="display: inline-block;width: 75px;height: 30px;line-height: 30px;font-size: 16px;color: #f3552d;border: 1px solid #808080; background-color: #facd89;" onclick="caigou_list(page,0)">返回</a>
				<!-- <a class="share_dinge" href="javascript:;" style="display: inline-block;width: 60px;height: 30px;line-height: 30px;font-size: 16px;color: #2d2a2a;font-weight: bold;letter-spacing: 4px; background-color: #facd89;border-radius: 5px;position: relative;left: 385px;text-decoration: none;">分享</a> -->
			</div>
			</div>
				<!-- 预算表格 -->
				<div class="budget_table_list" style="min-height: 300px;">
							
				<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0" id="budget_list">
					<thead>
						<tr class="thead" style="background-color: #eee;">
							<th style="width: 5%"><span style="border-left:  2px solid #bcbcbc">序号</span></th>
							<th style="width: 16%"><span>材料名称</span></th>
							<th style="width: 8%"><span>品牌</span></th>
							<th style="width: 10%"><span>型号</span></th>
							<th style="width: 10%"><span>需到货时间</span></th>
							<th style="width: 6%"><span>数量</span></th>
							<th style="width: 6%"><span>单位</span></th>
							<th style="width: 6%"><span>单价</span></th>
							<th style="width: 6%"><span>合计</span></th>
							<th style="width: 10%"><span style="border-right:  2px solid #bcbcbc">备注</span></th>
							<th style="width: 8%"><span style="border-right:  2px solid #bcbcbc">操作</span></th>
						</tr>
						</thead>
						<tbody>

						<!-- <tr class="tmain">
							<td style="width: 5%"><span>1</span></td>
							<td style="width: 16%"><span>水泥</span></td>
							<td style="width: 8%"><span>石井</span></td>
							<td style="width: 10%"><span>120*600*200</span></td>
							<td style="width: 10%"><span>2018.12.31</span></td>
							<td style="width: 6%"><span>1000</span></td>
							<td style="width: 6%"><span>立方</span></td>
							<td style="width: 6%"><span>5000</span></td>
							<td style="width: 6%"><span>500000</span></td>
							<td style="width: 18%;border-right:2px solid #bcbcbc;"><span>1捆=10根，1根=3米</span></td>
						</tr> -->
					</tbody>
				</table>
				<div class="nullslist" style="width: 100%;"></div>
				</div>
					<div class="meterial_buy_detail" style="position: absolute;top:100px;left: 50px;background-color: #9e9e9e;display: none;opacity: 0.95;width: 845px;">
					<div class="quxiao" style="position: absolute;font-size: 20px;top: -15px;left: 99%;background-color: #9e9e9e;border-radius: 10px;width: 20px;height: 20px;line-height: 20px;cursor:default;">×</div>
						<table style="width: 100%;" border="1" cellspacing="0" cellpadding="0">
							<thead>
								<tr class="thead" style="">
									<th style="width: 29%"><span style="">材料申购单位</span></th>
									<th style="width: 20%"><span>收货地址</span></th>
									<th style="width: 12%"><span>申购日期</span></th>
									
									<th style="width: 6%"><span>联系电话</span></th>
									<th style="width: 6%"><span>申购人</span></th>
									<th style="width: 18%"><span style="">备注</span></th>
								</tr>
								</thead>
								<tbody>
								<!-- <tr class="tbody" style="background-color: #eee;">
									<th style="width: 29%"><span style="border-left:  2px solid #bcbcbc">材料申购单位</span></th>
									<th style="width: 20%"><span>收货地址</span></th>
									<th style="width: 12%"><span>申购日期</span></th>
									
									<th style="width: 6%"><span>联系电话</span></th>
									<th style="width: 6%"><span>申购人</span></th>
									<th style="width: 18%"><span style="border-right:  2px solid #bcbcbc">备注</span></th>
								</tr> -->
								</tbody>
						</table>
					</div>
				<!-- 分页 -->
				<div id="pagelist" style="margin: 10px auto;">
						<a id="pre" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="prepage()">上一页</a>
						<a id="next" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="nextpage()">下一页</a>
				</div>		
				<!-- 搜索分页 -->
				<div id="pagesearch" style="margin: 10px auto;display: none;"">
						<a id="searchpre" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="prespage()">上一页</a>
						<a id="searchnext" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="nextspage()">下一页</a>
				</div>				
			</div>
			</div>			
			<!--采购列表end -->
			<!-- 分享列表-->
 			<div class="message_list base_info_public" style="position: relative;display:none;left: -16%;width: 115%;">
				<div style="overflow: hidden;margin-top: 10px;">
				<!-- 搜索框 -->	
				<div class="table_lists_share" style="overflow: hidden;margin-top: 10px;min-height: 300px;">
						<div class="search_ys_list_share">
							<input type="text" style="width: 400px;height: 30px;" id="search_list_share" placeholder="请输入关键词">
							<label class="search_list" for="search_list_share" style="width: 50px;height: 30px;display:inline-block;position: relative;top: -8px;"><img src="/themes/mall/jiaju/images/search_button.jpg" alt="" style="width: 100%;height: 100%;" onclick="shareSearch(sharepage,0)"></label>
							<input type="button" value="取消" class="quxiao_btn_share" style="display: inline-block;padding:0;width: 50px;height: 30px;position: relative;top: -8px;cursor:pointer;line-height:30px;background-color: #ec6941;display:none;" />
						</div>
				<!-- 预算表格 -->
				<div class="budget_table_list_share" style="min-height: 300px;">
							
				<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0" id="budget_list_share">
					<thead>
						<tr class="thead" style="background-color: #eee;">
							<th style="width: 5%"><span style="border-left:  2px solid #bcbcbc">序号</span></th>
							<th style="width: 16%"><span>材料名称</span></th>
							<th style="width: 8%"><span>品牌</span></th>
							<th style="width: 10%"><span>型号</span></th>
							<th style="width: 10%"><span>需到货时间</span></th>
							<th style="width: 6%"><span>分享人</span></th>
							<th style="width: 6%"><span>单位</span></th>
							<th style="width: 6%"><span>单价</span></th>
							<th style="width: 6%"><span>合计</span></th>
							<th style="width: 15%"><span style="border-right:  2px solid #bcbcbc">备注</span></th>
							<th style="width: 3%"><span style="border-right:  2px solid #bcbcbc">操作</span></th>
						</tr>
						</thead>
						<tbody>

						<!-- <tr class="tmain">
							<td style="width: 5%"><span>1</span></td>
							<td style="width: 16%"><span>水泥</span></td>
							<td style="width: 8%"><span>石井</span></td>
							<td style="width: 10%"><span>120*600*200</span></td>
							<td style="width: 10%"><span>2018.12.31</span></td>
							<td style="width: 6%"><span>1000</span></td>
							<td style="width: 6%"><span>立方</span></td>
							<td style="width: 6%"><span>5000</span></td>
							<td style="width: 6%"><span>500000</span></td>
							<td style="width: 18%;border-right:2px solid #bcbcbc;"><span>1捆=10根，1根=3米</span></td>
						</tr> -->
					</tbody>
				</table>
				<div class="nullslists" style="width: 100%;"></div>
				</div>
					<div class="meterial_buy_detail_share" style="position: absolute;top:100px;left: 50px;background-color: #9e9e9e;display: none;opacity: 0.95;width: 845px;">
					<div class="quxiao_share" style="position: absolute;font-size: 20px;top: -15px;left: 99%;background-color: #9e9e9e;border-radius: 10px;width: 20px;height: 20px;line-height: 20px;cursor:default;">×</div>
						<table style="width: 100%;" border="1" cellspacing="0" cellpadding="0">
							<thead>
								<tr class="thead" style="">
									<th style="width: 29%"><span style="">材料申购单位</span></th>
									<th style="width: 20%"><span>收货地址</span></th>
									<th style="width: 12%"><span>申购日期</span></th>
									
									<th style="width: 6%"><span>联系电话</span></th>
									<th style="width: 6%"><span>申购人</span></th>
									<th style="width: 18%"><span style="">备注</span></th>
								</tr>
								</thead>
								<tbody>
								<tr class="tbody" style="background-color: #eee;">
									<th style="width: 29%"><span style="border-left:  2px solid #bcbcbc">材料申购单位</span></th>
									<th style="width: 20%"><span>收货地址</span></th>
									<th style="width: 12%"><span>申购日期</span></th>
									
									<th style="width: 6%"><span>联系电话</span></th>
									<th style="width: 6%"><span>申购人</span></th>
									<th style="width: 18%"><span style="border-right:  2px solid #bcbcbc">备注</span></th>
								</tr>
								</tbody>
						</table>
					</div>
				<!-- 分页 -->
				<div id="spagelist" style="margin: 10px auto;">
						<a id="spre" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="sprepage()">上一页</a>
						<a id="snext" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="snextpage()">下一页</a>
				</div>		
				<!-- 搜索分页 -->
				<div id="spagesearch" style="margin: 10px auto;display: none;display: none;">
						<a id="sharepre" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="sprespage()">上一页</a>
						<a id="sharenext" href="javascript:;" style="display: inline-block;width: 50px;height: 25px;line-height: 23px;border: 1px solid #eee;background-color: red;color:#fff;" onclick="snextspage()">下一页</a>
				</div>				
			</div>			
				</div>
				</div>

			</div>	
			<!--分享列表end -->	
			<!-- 分享框 -->


 				<!-- 点击人工弹框 -->

 				<!-- 点击主材弹框 -->

 				<!-- 辅材定额 -->

 			</div>
 			
			
		</div>
		
		
 		</div>
 		
 	</div>





{include file=footer.html}
<script type="text/javascript" src="/themes/mall/jiaju/js/JTimer_1.3.js"></script>
<script type="text/javascript">
	(function (){
		caigou_list(1,0);
		messagelist(1,0);
	}())

	var index = 0;
	var totalArray = [];
	var page = 1;
	$(".share_sure").click(function(e){
		e.stopPropagation(); 
		$(".share_form").show();
		$(".budget_info").css("background-color","#eee");
	})
	$(".budget_detail").click(function(){
		$(".share_form").hide();
		$(".budget_info").css("background-color","#fff");
	})
    	//点击预算列表切换
	$(".budget_ul li:first").click(function(){
    	$(this).addClass("change_bg_li")
    	$(".budget_ul li:last").removeClass("change_bg_li")
		$(".budget_ul li:eq(1)").removeClass("change_bg_li")
    	$(".budget_detail").show();
    	$(".budget_detail_list").hide();
		$(".message_list").hide();
    })

	$(".budget_ul li:eq(1)").click(function(){
    	$(this).addClass("change_bg_li")
    	$(".budget_ul li:last").removeClass("change_bg_li")
    	$(".budget_ul li:first").removeClass("change_bg_li")
    	$(".budget_detail_list").show();
    	$(".budget_detail").hide();
    	$(".message_list").hide();
    })

    $(".budget_ul li:last").click(function(){
    	$(this).addClass("change_bg_li")
    	$(".budget_ul li:first").removeClass("change_bg_li")
		$(".budget_ul li:eq(1)").removeClass("change_bg_li")
    	$(".budget_detail").hide();
    	$(".budget_detail_list").hide();
		$(".message_list").show();
    })
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
    //点击添加表格
    $(".add_table").click(function(){
    	index++;
    	var userid = '<?php echo $_SESSION["user_info"]["user_id"];?>';
    	var $html = '';
    	$html += '<tr class="tmain" id="t'+index+'_">';
		$html += '<td style="width: 5%"><textarea id="t_xh'+index+'"></textarea></td>';
		$html += '<td style="width: 16%"><textarea name="m_name[]"></textarea></td>';
		$html += '<td style="width: 8%"><textarea name="brand[]"></textarea></td>';
		$html += '<td style="width: 10%"><textarea name="size[]"></textarea></td>';
		$html += '<td style="width: 10%"><textarea name="expire_time[]" onclick="'+addTimeDateForm+'"></textarea></td>';
		$html += '<td style="width: 6%"><textarea id="t_sl'+index+'" name="number[]"></textarea></td>';
		$html += '<td style="width: 6%"><textarea name="danwei[]"></textarea></td>';
		$html += '<td style="width: 6%"><textarea id="t_dj'+index+'" name="danjia[]"></textarea></td>';
		$html += '<td style="width: 6%"><textarea id="t_hj'+index+'" name="heji[]" onclick="totalClick('+index+')" readonly="readonly"></textarea></td>';
		$html += '<td style="width: 18%;border-right:2px solid #bcbcbc;"><textarea name="introduce[]"></textarea><input type="hidden" id="userid" name="userid[]" value="'+userid+'"/></td>';
		$html += '</tr>';
    	$("#budget_table tbody").append($html);
    	 $("#t_xh"+index).text(index);
    	})

	function tijiao(){
		$("#myform").submit();
	}

	//材料采购列表
	function caigou_list(page,types){
		
		if(page == 1){
			
			$("#pre").hide();
		}else{
			$("#pre").show();
		}
		
		

		var url = "http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list";
					$.ajax({
				type:"POST",
				url:url,
				data:{
					user_id : '<?php echo $_SESSION["user_info"]["user_id"];?>',
					page    : page,
					

				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "json",
				success:function(ret){
					//console.log(ret)
					if(ret.status == 200){
						$("#pagesearch").hide();
						$("#pagelist").show();
						$("#backlist").hide();
						$("#next").show();
						$(".nullslist").html("")
						var listHtml = "";
						var data = ret.retData;
						for(var i in data){
							var j = parseInt(i)+1;
							var m_name = data[i].m_name;
							var brand  = data[i].brand;
							var size   = data[i].size;
							var expire_time = data[i].expire_time;
							var number = data[i].number;
							var danwei = data[i].danwei;
							var danjia = data[i].danjia;
							var heji   = data[i].heji;
							var introduce = data[i].introduce;
							var pid    = data[i].pid;

							var office_name = data[i].office_name;
							var worker_address = data[i].worker_address;
							var dateofpurchase = data[i].dateofpurchase;
							var tel = data[i].tel;
							var sgperson = data[i].sgperson;
							var ps = data[i].ps;

							listHtml += '<tr class="tmain">';
							listHtml += '<td style="width: 5%"><span>'+j+'</span></td>';
							listHtml += '<td style="width: 16%"><span>'+m_name+'</span></td>';
							listHtml += '<td style="width: 8%"><span>'+brand+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+size+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+expire_time+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+number+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danwei+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danjia+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+heji+'</span></td>';
							listHtml += '<td style="width: 15%;"><span>'+introduce+'</span></td>';
							listHtml += '<td style="width: 3%;border-right:2px solid #bcbcbc;"><a href="javascript:;" style="color:blue;" onclick="details('+pid+')">详情</a><a href="javascript:;" style="color:red;" onclick="shachu('+pid+')">删除</a></td>';
							listHtml += '</tr>';


						}
						$("#budget_list tbody").html(listHtml);
					}else if(ret.status == 202){
						if(types == 0){
							$("#next").hide();
							$(".nullslist").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
						}
						if(types == 1){
							$("#budget_list tbody").html("");
							$(".nullslist").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
							$("#next").hide();
						}
						if(types == 2){
							$("#budget_list tbody").html("");
							$(".nullslist").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
						}
					}
				},
				error:function(err){
					//console.log(err)
				}
			});
	}

//分享列表
var sharepage = 1;
function messagelist(sharepage,types){
		
		if(sharepage == 1){
			
			$("#spre").hide();
		}else{
			$("#spre").show();
		}
		
		

		var url = "http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_user_share";
					$.ajax({
				type:"POST",
				url:url,
				data:{
					user_id : '<?php echo $_SESSION["user_info"]["user_id"];?>',
					page    : sharepage,
					

				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "json",
				success:function(ret){
					//console.log(ret)
					if(ret.status == 200){
						$("#spagesearch").hide();
						$("#spagelist").show();
						$("#sbacklist").hide();
						$("#snext").show();
						$(".nullslists").html("")
						var listHtml = "";
						var data = ret.retData;
						for(var i in data){
							var j = parseInt(i)+1;
							var m_name = data[i].m_name;
							var brand  = data[i].brand;
							var size   = data[i].size;
							var expire_time = data[i].expire_time;
							var number = data[i].number;
							var danwei = data[i].danwei;
							var danjia = data[i].danjia;
							var heji   = data[i].heji;
							var introduce = data[i].introduce;
							var pid    = data[i].pid;
							var username = data[i].username;

							var office_name = data[i].office_name;
							var worker_address = data[i].worker_address;
							var dateofpurchase = data[i].dateofpurchase;
							var tel = data[i].tel;
							var sgperson = data[i].sgperson;
							var ps = data[i].ps;

							listHtml += '<tr class="tmain">';
							listHtml += '<td style="width: 5%"><span>'+j+'</span></td>';
							listHtml += '<td style="width: 16%"><span>'+m_name+'</span></td>';
							listHtml += '<td style="width: 8%"><span>'+brand+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+size+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+expire_time+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+username+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danwei+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danjia+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+heji+'</span></td>';
							listHtml += '<td style="width: 15%;"><span>'+introduce+'</span></td>';
							listHtml += '<td style="width: 3%;border-right:2px solid #bcbcbc;"><a href="javascript:;" style="color:blue;" onclick="detailshare('+pid+')">详情</a></td>';
							listHtml += '</tr>';


						}
						$("#budget_list_share tbody").html(listHtml);
						
					}else if(ret.status == 202){
						if(types == 0){
							$("#snext").hide();
							$(".nullslists").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
						}
						if(types == 1){
							$("#budget_list_share tbody").html("");
							$(".nullslists").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
							$("#snext").hide();
						}
						
					}
				},
				error:function(err){
					//console.log(err)
				}
			});
	}
//分享分页
//下一页
function snextpage(){
	
	messagelist(++sharepage,1);

	}
//上一页
function sprepage(){
		if(sharepage == 1){
			sharepage = 2;
		}
		messagelist(--sharepage,1);
	}

//搜索列表
var spage = 1;
function searchlist(spage,types){
		if(spage == 1){
			$("#searchpre").hide();
		}else{
			$("#searchpre").show();
		}
		
		var key = $("#search_list_share").val();

		var url = "http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list";
					$.ajax({
				type:"POST",
				url:url,
				data:{
					user_id : '<?php echo $_SESSION["user_info"]["user_id"];?>',
					page    : spage,
					key     : key

				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "json",
				success:function(ret){
					//console.log(ret)
					if(ret.status == 200){
						$("#pagesearch").show();
						$("#pagelist").hide();
						$("#backlist").show();
						$("#searchnext").show();
						$(".nullslist").html("")
						var listHtml = "";
						var data = ret.retData;
						for(var i in data){
							var j = parseInt(i)+1;
							var m_name = data[i].m_name;
							var brand  = data[i].brand;
							var size   = data[i].size;
							var expire_time = data[i].expire_time;
							var number = data[i].number;
							var danwei = data[i].danwei;
							var danjia = data[i].danjia;
							var heji   = data[i].heji;
							var introduce = data[i].introduce;
							var pid    = data[i].pid;

							var office_name = data[i].office_name;
							var worker_address = data[i].worker_address;
							var dateofpurchase = data[i].dateofpurchase;
							var tel = data[i].tel;
							var sgperson = data[i].sgperson;
							var ps = data[i].ps;

							listHtml += '<tr class="tmain">';
							listHtml += '<td style="width: 5%"><span>'+j+'</span></td>';
							listHtml += '<td style="width: 16%"><span>'+m_name+'</span></td>';
							listHtml += '<td style="width: 8%"><span>'+brand+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+size+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+expire_time+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+number+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danwei+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danjia+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+heji+'</span></td>';
							listHtml += '<td style="width: 15%;"><span>'+introduce+'</span></td>';
							listHtml += '<td style="width: 3%;border-right:2px solid #bcbcbc;"><a href="javascript:;" style="color:blue;" onclick="details('+pid+')">详情</a></td>';
							listHtml += '</tr>';


						}
						$("#budget_list tbody").html(listHtml);
					}else if(ret.status == 202){
						if(types == 0){

							$(".nullslist").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
						}
						if(types == 1){
							$("#budget_list tbody").html("");
							$(".nullslist").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
							$("#searchnext").hide();
						}
						
					}
				},
				error:function(err){
					//console.log(err)
				}
			});
	}


//搜索分页
function nextspage(){
	searchlist(++spage,1)
}
function prespage(){
	if(spage == 1){
		spage = 2;
	}
	searchlist(--spage,1)
}

//分享列表搜索
var sindex = 1;
function shareSearch(sindex,types){
		
		if(sindex == 1){
			
			$("#spre").hide();
		}else{
			$("#spre").show();
		}
		
		

		var url = "http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_user_share";
					$.ajax({
				type:"POST",
				url:url,
				data:{
					user_id : '<?php echo $_SESSION["user_info"]["user_id"];?>',
					page    : sindex,
					

				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "json",
				success:function(ret){
					//console.log(ret)
					if(ret.status == 200){
						$("#spagesearch").hide();
						$("#spagelist").show();
						$("#sbacklist").hide();
						$("#snext").show();
						$(".nullslists").html("")
						var listHtml = "";
						var data = ret.retData;
						for(var i in data){
							var j = parseInt(i)+1;
							var m_name = data[i].m_name;
							var brand  = data[i].brand;
							var size   = data[i].size;
							var expire_time = data[i].expire_time;
							var number = data[i].number;
							var danwei = data[i].danwei;
							var danjia = data[i].danjia;
							var heji   = data[i].heji;
							var introduce = data[i].introduce;
							var pid    = data[i].pid;
							var username = data[i].username;

							var office_name = data[i].office_name;
							var worker_address = data[i].worker_address;
							var dateofpurchase = data[i].dateofpurchase;
							var tel = data[i].tel;
							var sgperson = data[i].sgperson;
							var ps = data[i].ps;

							listHtml += '<tr class="tmain">';
							listHtml += '<td style="width: 5%"><span>'+j+'</span></td>';
							listHtml += '<td style="width: 16%"><span>'+m_name+'</span></td>';
							listHtml += '<td style="width: 8%"><span>'+brand+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+size+'</span></td>';
							listHtml += '<td style="width: 10%"><span>'+expire_time+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+username+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danwei+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+danjia+'</span></td>';
							listHtml += '<td style="width: 6%"><span>'+heji+'</span></td>';
							listHtml += '<td style="width: 15%;"><span>'+introduce+'</span></td>';
							listHtml += '<td style="width: 3%;border-right:2px solid #bcbcbc;"><a href="javascript:;" style="color:blue;" onclick="detailshare('+pid+')">详情</a></td>';
							listHtml += '</tr>';


						}
						$("#budget_list_share tbody").html(listHtml);
						
					}else if(ret.status == 202){
						if(types == 0){
							$("#snext").hide();
							$(".nullslists").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
						}
						if(types == 1){
							$("#budget_list_share tbody").html("");
							$(".nullslists").append('<div id="nulls" style="margin-top: 100px;text-align: center;font-size: 18px;">暂无数据！！！</div>');
							$("#snext").hide();
						}
						
					}
				},
				error:function(err){
					//console.log(err)
				}
			});
	}

	//分享搜索分页
function snextspage(){
	shareSearch(++sindex,1)
}
function sprespage(){
	if(sindex == 1){
		sindex = 2;
	}
	shareSearch(--sindex,1)
}	

function details(pid){
	var url = "http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list_content"
				$.ajax({
				type:"POST",
				url:url,
				data:{
					pid : pid,
					user_id: '<?php echo $_SESSION["user_info"]["user_id"];?>',
				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "json",
				success:function(ret){
					//console.log(ret)
					if(ret.status ==200){
						$(".meterial_buy_detail tbody").html("");
						var data = ret.retData;
						var listHtml = "";
						for(var i in data){
							var office_name = data[i].office_name;
							var worker_address = data[i].worker_address;
							var dateofpurchase = data[i].dateofpurchase;
							var tel = data[i].tel;
							var sgperson = data[i].sgperson;
							var ps = data[i].ps;

							listHtml +=	'<tr class="tbody" style="background-color: #eee;">';
							listHtml +=		'<td style="width: 29%"><span style="">'+office_name+'</span></td>';
							listHtml +=		'<td style="width: 20%"><span>'+worker_address+'</span></td>';
							listHtml +=		'<td style="width: 12%"><span>'+dateofpurchase+'</span></td>';	
							listHtml +=		'<td style="width: 6%"><span>'+tel+'</span></td>';
							listHtml +=		'<td style="width: 6%"><span>'+sgperson+'</span></td>';
							listHtml +=		'<td style="width: 18%"><span style="">'+ps+'</span></td>';
							listHtml +=	'</tr>';
						}
						$(".meterial_buy_detail tbody").append(listHtml)
						$(".meterial_buy_detail").show();
					}
				},
				error:function(err){
					//console.log(err)
				}
			});
}
//下一页
function nextpage(){
	
	caigou_list(++page,1);

	}
//上一页
function prepage(){
		if(page == 1){
			page = 2;
		}
		caigou_list(--page,1);
	}

	
	//分享
	$(".share_btn").click(function(e){
		e.stopPropagation;
		$(".confirm").show();
	})


	function share(){
		//获取选择的内容的id值
		var $list = $("input[type='checkbox']");
		console.log($list)
	}
	
	//分享选择接收人
	function  showUserList(){
		var page = 1;
		uid= '<?php echo $_SESSION["user_info"]["user_id"];?>';
		$('.getUserList').html("")
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
					//console.log("成功");
					//console.log(ret)
					var html = '';
					var datas = ret.data;
			
					if(ret.code == 200){
						//page ++;
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
				                //console.log(vals);
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

				                console.log(vals);

				                //获取通讯录id
				          		$('input[name="tid"]:checked').each(function(j){
				                    tarry[j] = $(this).val();
				                });
				                var tvals = tarry.join(",");
				                console.log(tvals)
				                $("#checker").val(tvals);
				                // $.post('http://wgcapp.wgc2013.com/jingyi.php/Home/index/share',{
				                // 	"type":1,
				                // 	"arr":arr,
				                // 	"tarry":tarry
				                // },function(ret){
				                // 	console.log(ret)
				                // 	if(ret.code == 200){

				                		
				                // 	}
				                // },'json')

				                $("#myform").submit();
	}
	
	//取消
$(".quxiao_tel").click(function(){
	$(this).parent().parent().hide();
})
//通讯录分页控制
var upage = 1;
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

  //统计合计并计算
  	function totalClick(i){
  		var num = parseInt($("#t_sl"+i).val());
  		var danjia = parseInt($("#t_dj"+i).val());

  		var heji = num * danjia;
  		//alert(num)
  		$("#t_hj"+i).val(heji);

  	}

  	$("#totals").unbind('click').click(function(){
  		newArray = [];
  		for(var i=1;i<=index;i++){
  			var heji = parseInt($("#t_hj"+i).val());
    		if(heji){
    			newArray.push(heji)
    		}
 		var totalAll = 0;
    	for(var j=0;j<newArray.length;j++){
    		//console.log(j);
  			totalAll = totalAll + newArray[j];
    		
    	}   
    	$("#totals").val(totalAll)		
  		}
  	})
  $(".quxiao").unbind('click').click(function(){
  	$(".meterial_buy_detail").hide();
  })
  $(".quxiao_share").unbind('click').click(function(){
  	$(".meterial_buy_detail_share").hide();
  })

//分享列表
// var sharepage = 1;
// 	function messagelist(sharepage,types){
// 	var url = 'http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_user_share';
// 	var key='';
// 	$.ajax({
// 				type:"POST",
// 				url:url,
// 				data:{
// 					key      : key,
// 			    	user_id  : '<?php echo $_SESSION["user_info"]["user_id"];?>',
// 			    	page     : sharepage,
			    	
// 				},
// 				cache:false,
// 				crossDomain: true == !(document.all),
// 				dataType: "json",
// 				success:function(ret){
// 					console.log("share"+ret)
// 					var listHtml = '';
// 					if(ret.status == 200){
// 						var listHtml = "";
// 						var data = ret.retData;
// 						for(var i in data){
// 							var j = parseInt(i)+1;
// 							var m_name = data[i].m_name;
// 							var brand  = data[i].brand;
// 							var size   = data[i].size;
// 							var expire_time = data[i].expire_time;
// 							var number = data[i].number;
// 							var danwei = data[i].danwei;
// 							var danjia = data[i].danjia;
// 							var heji   = data[i].heji;
// 							var introduce = data[i].introduce;
// 							var pid    = data[i].pid;
// 							var total  = data[i].total;
// 							var username = data[i].username;

// 							var office_name = data[i].office_name;
// 							var worker_address = data[i].worker_address;
// 							var dateofpurchase = data[i].dateofpurchase;
// 							var tel = data[i].tel;
// 							var sgperson = data[i].sgperson;
// 							var ps = data[i].ps;

// 							listHtml += '<tr class="tmain">';
// 							listHtml += '<td style="width: 5%"><span>'+j+'</span></td>';
// 							listHtml += '<td style="width: 16%"><span>'+m_name+'</span></td>';
// 							listHtml += '<td style="width: 8%"><span>'+brand+'</span></td>';
// 							listHtml += '<td style="width: 10%"><span>'+size+'</span></td>';
// 							listHtml += '<td style="width: 10%"><span>'+expire_time+'</span></td>';
// 							listHtml += '<td style="width: 6%"><span>'+username+'</span></td>';
// 							listHtml += '<td style="width: 6%"><span>'+danwei+'</span></td>';
// 							listHtml += '<td style="width: 6%"><span>'+danjia+'</span></td>';
// 							listHtml += '<td style="width: 6%"><span>'+heji+'</span></td>';
// 							listHtml += '<td style="width: 15%;"><span>'+introduce+'</span></td>';
// 							listHtml += '<td style="width: 3%;border-right:2px solid #bcbcbc;"><a href="javascript:;" style="color:blue;" onclick="detailshare('+pid+')">详情</a></td>';
// 							listHtml += '</tr>';


// 						}
// 						$("#budget_list_share tbody").html(listHtml);
						
// 					}
// 				},
// 				error:function(err){
// 					console.log(err)
// 				}
// 			});

// 	}

function detailshare(pid){
	var url = "http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_user_share_content"
				$.ajax({
				type:"POST",
				url:url,
				data:{
					pid : pid,
					
				},
				cache:false,
				crossDomain: true == !(document.all),
				dataType: "json",
				success:function(ret){
					//console.log(ret)
					if(ret.status ==200){
						$(".meterial_buy_detail_share tbody").html("");
						var data = ret.retData;
						var listHtml = "";
						for(var i in data){
							var office_name = data[i].office_name;
							var worker_address = data[i].worker_address;
							var dateofpurchase = data[i].dateofpurchase;
							var tel = data[i].tel;
							var sgperson = data[i].sgperson;
							var ps = data[i].ps;

							listHtml +=	'<tr class="tbody" style="background-color: #eee;">';
							listHtml +=		'<td style="width: 29%"><span style="">'+office_name+'</span></td>';
							listHtml +=		'<td style="width: 20%"><span>'+worker_address+'</span></td>';
							listHtml +=		'<td style="width: 12%"><span>'+dateofpurchase+'</span></td>';	
							listHtml +=		'<td style="width: 6%"><span>'+tel+'</span></td>';
							listHtml +=		'<td style="width: 6%"><span>'+sgperson+'</span></td>';
							listHtml +=		'<td style="width: 18%"><span style="">'+ps+'</span></td>';
							listHtml +=	'</tr>';
						}
						$(".meterial_buy_detail_share tbody").append(listHtml)
						$(".meterial_buy_detail_share").show();
					}
				},
				error:function(err){
					//console.log(err)
				}
			});
}

//删除
function shachu(pid){
	var uid = '<?php echo $_SESSION["user_info"]["user_id"];?>';
	var f = confirm("确认删除此采购信息吗？");
	if(f){
		window.location.href="http://wgcapp.wgc2013.com/jingyi.php/Home/Material/addmaterials_list_del/userid/"+uid+"/id/"+pid;
	}
}
</script>
</body>
</html>