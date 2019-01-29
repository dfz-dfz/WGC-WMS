<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title>微工程</title>
<meta name="keywords" content="微工程">
<meta name="description" content="微工程">

</head>
<body>

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> 
			<a class="logo navbar-logo f-l mr-10 hidden-xs" href="javascript:;">
				<?php if($wgcadmininfo['fenxiaoshang_name'] == '' ): ?>微工程
				<?php else: ?>
					<?php echo ($wgcadmininfo["fenxiaoshang_name"]); endif; ?>管理系统
			</a> 
		<span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>【<a href="http://wgc2013.com" target="_blank">网站首页</a>】</li>
					<li><?php echo ($wgcadmininfo["rolename"]); ?></li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">
					 <?php echo ($wgcadmininfo["name"]); ?>
					
					<i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="/index.php/Admin/Admin/logout">退出</a></li>
						</ul>
					</li>
					<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">0</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>规则管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Guize/index');?>" data-title="职位列表" href="javascript:void(0)">规则列表</a></li>
				</ul>
			</dd>
			<dt><i class="Hui-iconfont">&#xe613;</i>职位管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Position/index');?>" data-title="职位列表" href="javascript:void(0)">职位列表</a></li>
				</ul>
			</dd>
			<dt><i class="Hui-iconfont">&#xe613;</i> 提现管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('withdrawals/index');?>" data-title="提现列表" href="javascript:void(0)">提现列表</a></li>
				</ul>
			</dd>
			<dt><i class="Hui-iconfont">&#xe613;</i> 优惠券管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('coupons/usershenhe');?>" data-title="用户资质审核" href="javascript:void(0)">用户资质审核</a></li>
				</ul>
				<ul>
					<li><a _href="<?php echo U('coupons/companyshenhe');?>" data-title="公司资质审核" href="javascript:void(0)">公司资质审核</a></li>
				</ul>
				<ul>
					<li><a _href="<?php echo U('coupons/index');?>" data-title="优惠券列表" href="javascript:void(0)">优惠券列表</a></li>
				</ul>
				<ul>
					<li><a _href="<?php echo U('coupons/options');?>" data-title="优惠券设置" href="javascript:void(0)">优惠券设置</a></li>
				</ul>
				<ul>
					<li><a _href="<?php echo U('coupons/ziyuan');?>" data-title="资源扣费设置" href="javascript:void(0)">资源扣费设置</a></li>
				</ul>
			</dd>
			<dt><i class="Hui-iconfont">&#xe613;</i> 功能管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Status/index');?>" data-title="功能列表" href="javascript:void(0)">功能列表</a></li>
				</ul>
			</dd>
			<dt><i class="Hui-iconfont">&#xe613;</i> 通讯录管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('maillist/index');?>" data-title="通讯录列表" href="javascript:void(0)">通讯录列表</a></li>
				</ul>
			</dd>
			<dt class="">
				<dt><i class="Hui-iconfont">&#xe613;</i> 家装管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			</dt>
			<dd style="display: none;">
				<ul>
					<li><a _href="/index.php/Admin/Homedecoration/getList.html" data-title="家装列表" href="javascript:void(0)">家装列表</a></li>
				</ul>
			</dd>
			<dt class="">
				<dt><i class="Hui-iconfont">&#xe613;</i> 公装管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			</dt>
			<dd style="display: none;">
				<ul>
					<li><a _href="/index.php/Admin/Workdecoration/getList.html" data-title="公装列表" href="javascript:void(0)">公装列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-product">
			
			<?php if($wgcadmininfo['fenxiaoshang_name'] == '' ): ?><dt class="">
					<i class="Hui-iconfont Hui-iconfont-fenlei"></i> 栏目管理<i class="Hui-iconfont menu_dropdown-arrow"></i>
				</dt>
			
			<dd style="display: none;">
				<ul>
					<li><a _href="/index.php/Admin/Category/tree.html" data-title="栏目树" href="javascript:void(0)">栏目树</a></li>
				</ul>
			</dd><?php endif; ?>
			<dt class="">
				<i class="Hui-iconfont Hui-iconfont-xiaoxi1"></i> 即时通讯<i class="Hui-iconfont menu_dropdown-arrow"></i>
			</dt>
			<dd style="display: none;">
				<ul>
					<li><a _href="/index.php/Admin/Instantmsg/getList.html" data-title="即时通讯" href="javascript:void(0)">即时通讯</a></li>
					<li><a _href="/index.php/Admin/Systemmsg/sendSysMsg.html" data-title="系统消息" href="javascript:void(0)">系统消息</a></li>
					
					<li><a _href="/index.php/Admin/maillist/index.html" data-title="通讯录" href="javascript:void(0)">通讯录</a></li>
				</ul>
			</dd>
			
			<dt class="">
				<i class="Hui-iconfont Hui-iconfont-fenlei"></i> 网盘管理<i class="Hui-iconfont menu_dropdown-arrow"></i>
			</dt>
			<dd style="display: none;">
				<ul>
					<li><a _href="/index.php/Admin/Wangpanpc/document.html" data-title="网盘管理" href="javascript:void(0)">网盘管理</a></li>
					<!--<li><a _href="/index.php/Admin/Wangpanpc/picture.html" data-title="图片" href="javascript:void(0)">图片</a></li>
					<li><a _href="/index.php/Admin/Wangpanpc/video.html" data-title="视频" href="javascript:void(0)">视频</a></li>
					<li><a _href="/index.php/Admin/Wangpanpc/note.html" data-title="笔记" href="javascript:void(0)">笔记</a></li>-->
				</ul>
			</dd>
			
			<dt class="">
				<i class="Hui-iconfont Hui-iconfont-fenlei"></i> 工价管理<i class="Hui-iconfont menu_dropdown-arrow"></i>
			</dt>
			<dd style="display: none;">
				<ul>
					<li><a _href="<?php echo U('Laborprice/index');?>" data-title="工价管理" href="javascript:void(0)">工价管理</a></li>
				</ul>
			</dd>
			
			
			
			<dt>
				<i class="Hui-iconfont Hui-iconfont-money"></i> 设计报价<i class="Hui-iconfont menu_dropdown-arrow"></i>
			</dt>
			<dd style="">
				<ul>
					<li><a _href="/index.php/Admin/Designoffer/getList.html" data-title="报价列表" href="javascript:void(0)">报价列表</a></li>
				</ul>
			</dd>
			<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dt class="">
				<i class="Hui-iconfont Hui-iconfont-money"></i> 预算报价<i class="Hui-iconfont menu_dropdown-arrow"></i>
			</dt><?php endif; ?>
			<dd style="display: none;">
				<ul>
					<li><a _href="/index.php/Admin/Budgetoffer/getList.html" data-title="预算列表" href="javascript:void(0)">预算列表</a></li>
				</ul>
			</dd>
			<?php if($wgcadmininfo['fenxiaoshang_name'] == '' ): ?><dt>
				<i class="Hui-iconfont Hui-iconfont-money"></i> 预约管理<i class="Hui-iconfont menu_dropdown-arrow"></i>
			</dt>
			<dd style="">
				<ul>
					<li><a _href="/index.php/Admin/Makeanappointment/lists.html" data-title="列表" href="javascript:void(0)">列表</a></li>
				</ul>
			</dd><?php endif; ?>
		</dl>
		<?php  ?>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<!--<li><a _href="<?php echo U('Ad/index');?>" data-title="广告列表" href="javascript:void(0)">广告列表</a></li>
					<li><a _href="<?php echo U('Projectcase/index');?>" data-title="工程案例" href="javascript:void(0)">工程案例</a></li>-->
					<li><a _href="<?php echo U('Headline/index');?>" data-title="工程头条" href="javascript:void(0)">工程头条</a></li>
					<?php if(($_SESSION['wgcadmininfo']['kehu'] == '材料商')): ?><li><a _href="<?php echo U('Headline/index_cls');?>" data-title="产品推荐" href="javascript:void(0)">产品推荐</a></li><?php endif; ?>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 材料商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Cailiaoshang/index');?>" data-title="材料商管理" href="javascript:void(0)">材料商管理</a></li>
				</ul>
			</dd>
		</dl>
		<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 材料询价管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Jicai/index');?>" data-title="材料询价管理" href="javascript:void(0)">材料询价列表</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 招聘管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Zhaopin/index');?>" data-title="招聘管理" href="javascript:void(0)">招聘列表</a></li>
				</ul>
			</dd>
		</dl>
		<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 案例管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Gallery/listss');?>" data-title="效果图列表" href="javascript:void(0)">效果图</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		<?php if($wgcadmininfo['fenxiaoshang_name'] == '' ): ?><dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i> 分销商管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo U('Fenxiangshang/listss');?>" data-title="分销商列表" href="javascript:void(0)">分销商列表</a></li>
					</ul>
				</dd>
			</dl>
		
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 材料商申请管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Cailiaoshang/cailiaoshang');?>" data-title="材料商管理" href="javascript:void(0)">材料商申请列表</a></li>
				</ul>
			</dd>
		</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 企业集采报名<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Cailiaoshang/jicaibaoming');?>" data-title="企业集采报名列表" href="javascript:void(0)">企业集采报名</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		
		<?php if(($wgcadmininfo['fenxiaoshang_name'] != '' ) or ($user_id == '10000') or ($user_id == '100001') or ($user_id == '100002') or ($user_id == '100003') or ($user_id == '100004') or ($user_id == '100005') or ($user_id == '100006') or ($user_id == '100007')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>考勤管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Kaoqing/index');?>" data-title="考勤列表" href="javascript:void(0)">考勤列表</a></li>
					<li><a _href="<?php echo U('Kaoqing/qingjia');?>" data-title="请假查询" href="javascript:void(0)">请假列表</a></li>
					<li><a _href="<?php echo U('Kaoqing/waichu');?>" data-title="外出查询" href="javascript:void(0)">外出列表</a></li>
				</ul>
			</dd>
			
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>财务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Kaoqing/baoxiao',array('type'=>1));?>" data-title="报销列表" href="javascript:void(0)">报销列表</a></li>
					<li><a _href="<?php echo U('Kaoqing/baoxiao',array('type'=>2));?>" data-title="请款列表" href="javascript:void(0)">请款列表</a></li>
				</ul>
			</dd>
			
		</dl>
		<?php if($_SESSION['wgcadmininfo']['fenxiaoshang_name'] == '' ): ?><dl id="menu-picture">
				<dt><i class="Hui-iconfont">&#xe613;</i>公众号<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
				<dd>
					<ul>
						<li><a _href="<?php echo U('Publisignal/listss');?>" data-title="公众号案例" href="javascript:void(0)">公众号案例</a></li>
						<li><a _href="<?php echo U('Publisignal/news');?>" data-title="公众号案例" href="javascript:void(0)">公众号新闻列表</a></li>
					</ul>
				</dd>
				
			</dl><?php endif; ?>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('User/index');?>" data-title="用户列表" href="javascript:void(0)">用户列表</a></li>
					<li><a _href="<?php echo U('User/userVip');?>" data-title="会员申请列表" href="javascript:void(0)">会员申请列表</a></li>
					<li><a _href="<?php echo U('User/tuijian');?>" data-title="推荐用户列表" href="javascript:void(0)">推荐用户列表</a></li>
				</ul>
			</dd>
		</dl>
		
		
		<!--管理工具-->
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>内部管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Xiangmu/neibu');?>" data-title="内部管理列表" href="javascript:void(0)">内部管理列表</a></li>
				</ul>
			</dd>
			
		</dl>
		<?php if($_SESSION['wgcadmininfo']['fenxiaoshang_name'] == '微工程' ): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>维修派单<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Weixiumsg/getList');?>" data-title="维修列表" href="javascript:void(0)">维修列表</a></li>
				</ul>
			</dd>
			
		</dl><?php endif; ?>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>维修项目管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Xiangmu/weixiu');?>" data-title="维修列表" href="javascript:void(0)">维修列表</a></li>
				</ul>
			</dd>
			
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>项目管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Xiangmu/xiangmu');?>" data-title="项目列表" href="javascript:void(0)">项目列表</a></li>
					
					<!--<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="进度列表" href="javascript:void(0)"></a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="请款列表" href="javascript:void(0)">请款列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="审批列表" href="javascript:void(0)">审批列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="质检列表" href="javascript:void(0)">质检列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="材料申购列表" href="javascript:void(0)">材料申购列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="安检列表" href="javascript:void(0)">安检列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="隐蔽报验列表" href="javascript:void(0)">隐蔽报验列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="招聘列表" href="javascript:void(0)">招聘列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="招工列表" href="javascript:void(0)">招工列表</a></li>
					<li><a _href="<?php echo U('Xiangmu/xiangmu_');?>" data-title="安全列表" href="javascript:void(0)">安全列表</a></li>-->
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>维修报价管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/baojia');?>" data-title="报价列表" href="javascript:void(0)">报价列表</a></li>
				</ul>
			</dd>
		</dl>
		<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>主材定价管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/zhucai');?>" data-title="主材列表" href="javascript:void(0)">主材列表</a></li>
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>辅材定价管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/fucai');?>" data-title="辅材列表" href="javascript:void(0)">辅材列表</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>材料采购管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/user_material_purchase_admin');?>" data-title="材料采购列表" href="javascript:void(0)">材料采购发布</a></li>
					<li><a _href="<?php echo U('Baojia/cailiaocaigou');?>" data-title="材料采购列表" href="javascript:void(0)">材料采购列表</a></li>
				</ul>
			</dd>
		</dl>
		<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>业务信息管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/yewuxinxi');?>" data-title="业务信息列表" href="javascript:void(0)">业务信息列表</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>设计分包管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/shejifenbao');?>" data-title="设计分包列表" href="javascript:void(0)">设计分包列表</a></li>
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>材料推广管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/cailiaotuiguang');?>" data-title="材料推广列表" href="javascript:void(0)">材料推广列表</a></li>
				</ul>
			</dd>
		</dl>
		<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>广告管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Advertising/add');?>" data-title="上传广告" href="javascript:void(0)">上传广告</a></li>
					<li><a _href="<?php echo U('Advertising/index');?>" data-title="广告管理" href="javascript:void(0)">广告管理</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>无活找工管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/wuhuozhaogong');?>" data-title="无活找工列表" href="javascript:void(0)">无活找工列表</a></li>
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>招工管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/zhaogong');?>" data-title="招工列表" href="javascript:void(0)">招工列表</a></li>
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>项目分包管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/xiangmufenbao');?>" data-title="项目分包列表" href="javascript:void(0)">项目分包列表</a></li>
				</ul>
			</dd>
		</dl>
		
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>集采价格管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/cailiaoxunjia');?>" data-title="集采价格列表" href="javascript:void(0)">集采价格列表</a></li>
				</ul>
			</dd>
		</dl>
		<?php if(($_SESSION['wgcadmininfo']['kehu'] == '微工程')): ?><dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>工价询价管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Baojia/gongjiaxunjia');?>" data-title="工价询价列表" href="javascript:void(0)">工价询价列表</a></li>
				</ul>
			</dd>
		</dl><?php endif; ?>
		<!---管理工具end-->
		
		
		
		<!-- <dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i>客服会话<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a _href="<?php echo U('Advertisement/chat_list');?>" data-title="用户列表" href="javascript:void(0)">会话列表</a></li>
					<li><a _href="<?php echo U('Advertisement/message_list');?>" data-title="通讯列表" href="javascript:void(0)">通讯录</a></li>
				</ul>
			</dd>
			
		</dl> --><?php endif; ?>
	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="/index.php/Admin/Index/welcome">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="/index.php/Admin/Index/welcome"></iframe>
		</div>
	</div>
</section>
<script type="text/javascript" src="/Public/HUI/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/HUI/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/HUI/static/h-ui.admin/js/H-ui.admin.js"></script> 

</body>
</html>