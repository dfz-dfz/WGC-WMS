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
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style type="text/css">
			.pages{
				margin:20px auto;
			}
			.pages a,.pages span {  
                display: inline-block;  
                padding: 2px 5px;  
                margin: 0 1px;  
                border: 1px solid #f0f0f0;  
                -webkit-border-radius: 3px;  
                -moz-border-radius: 3px;  
                border-radius: 3px;  
            }  
              
            .pages a,  
            .pages li {  
                display: inline-block;  
                list-style: none;  
                text-decoration: none;  
                color: #58A0D3;  
            }  
              
            .pages a.first,  
            .pages a.prev,  
            .pages a.next,  
            .pages a.end {  
                margin: 0;  
            }  
              
            .pages a:hover {  
                border-color: #50A8E6;  
            }  
              
            .pages span.current {  
                background: #50A8E6;  
                color: #FFF;  
                font-weight: 700;  
                border-color: #50A8E6;  
            } 

</style>
<title>优惠券管理</title>
</head>
<body>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 提现管理 <span class="c-gray en">&gt;</span> 提现列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		
		 <form action="<?php echo U('withdrawals/index');?>" method="post" style="margin-top:20px;">
		 <span class="select-box" style="width:600px">
			  <select class="select" size="1" name="pay_type">
				<option value="">请选择提现平台</option>
				<option value="1" <?php if($pay_type == 1): ?>selected<?php endif; ?>>银行卡</option>
				<option value="2" <?php if($pay_type == 2): ?>selected<?php endif; ?>>微信</option>
				<option value="3" <?php if($pay_type == 3): ?>selected<?php endif; ?>>支付宝</option>
			  </select>
		</span>
			 
			  <input class="btn btn-secondary radius" type="submit" value="搜索">
		 </form>
	 
	</div>
	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	
	<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="30">ID</th>
					<th width="80">账号</th>
					<th width="80">姓名</th>
					<th width="80">订单号</th>
					<th width="80">提现金额</th>
					<th width="50">提现平台</th>
					<th width="80">收款账号</th>
					<th width="60">提现状态</th>
					<th width="60">处理时间</th>
					<th width="60">提现时间</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="text-c">
						<td><?php echo ($v['id']); ?></td>
						<td><?php echo ($v['user_name']); ?></td>
						<td><?php echo ($v['name']); ?></td>
						<td><?php echo ($v['tags']); ?></td>
						<td><?php echo ($v['money']); ?></td>
						<td>
						<?php switch($v['pay_type']): case "1": ?>银行卡<?php break;?> 
						<?php case "2": ?>微信<?php break;?> 
						<?php case "3": ?>支付宝<?php break; endswitch;?>
						</td>
						<td><?php echo ($v['account']); ?></td>
						<td>
						<?php switch($v['status']): case "0": ?><b style="color:green">已完成</b><?php break;?> 
						<?php case "1": ?><b style="color:red">待处理</b><?php break; endswitch;?>
						</td>
						<td><?php echo (date('Y-m-d H:i:s',(isset($v['pay_time']) && ($v['pay_time'] !== ""))?($v['pay_time']):"")); ?></td>
						<td><?php echo (date('Y-m-d H:i:s',$v['add_time'])); ?></td>
						<td class="f-14 td-manage">
							<?php if($v['status'] == 1): ?><a style="text-decoration:none" href="<?php echo U('withdrawals/update',array('id'=>$v['id']));?>" title="修改">修改</a>
							<?php else: ?>
							订单已完成<?php endif; ?>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	 <div class="pages"><?php echo ($page); ?></div> 
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 

<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
</body>
</html>