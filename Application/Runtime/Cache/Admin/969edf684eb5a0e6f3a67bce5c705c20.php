<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html ng-app="demo">
    <head>
        <meta charset="utf-8">
        <title>聊天</title>

        <link rel="stylesheet" type="text/css" href="/Public/JS/vendor/jqueryrebox/jquery-rebox-0.1.0.css"/>
        <link rel="stylesheet" type="text/css" href="/Public/css/RongIMWidget.css"/>
        <link rel="stylesheet" type="text/css" href="/Public/css/main.css"/>

    </head>
    <body ng-controller="main">
        <h2>当前用户：<?php echo ($_SESSION['wgcadmininfo']['rolename']); ?>—<?php echo ($_SESSION['wgcadmininfo']['name']); ?></h2><br/>
		 <label>账号ID：</label><input class="input" value='<?php echo ($userid); ?>' ng-model="targetId">
        <button class="btn" id='fasongxiaoxi' ng-click="setconversation()">发送消息</button><br/>
        <rong-widget></rong-widget>

    </body>

    <script src="/Public/JS/vendor/jquery-2.2.2.js"></script>
    <script src="/Public/JS/vendor/angular-1.4.8.js"></script>

    <!-- 融云IMLib -->
    <script src="//cdn.ronghub.com/RongIMLib-2.2.5.min.js"></script>
    <script src="//cdn.ronghub.com/RongEmoji-2.2.5.min.js"></script>
    <script src="//cdn.ronghub.com/Libamr-2.2.5.min.js"></script>
    <script src="//cdn.ronghub.com/RongIMVoice-2.2.5.min.js"></script>

    <!-- 上传插件 -->
   <script src="/Public/JS/vendor/plupload.full.min-2.1.1.js"></script>
    <script src="/Public/JS/vendor/qiniu-1.0.17.js"></script>

    <!-- 增强体验插件 -->
   <script src="/Public/JS/vendor/jqueryrebox/jquery-rebox-0.1.0.js"></script>

    <!-- IM插件 -->
    <script src="/Public/JS/js/RongIMWidget.js"></script>
    <script src="/Public/JS/common.js"></script>
    <!--<script src="/Public/JS/userone/index.js"></script>-->
	<script>
	var stgt=6;
	var stgId='<?php echo ($userid); ?>';
	var sak='<?php echo ($appkey); ?>';
	var stk='<?php echo ($token); ?>';
		function inits(tgt,tgId,ak,tk){
			var demo = angular.module("demo", ["RongWebIMWidget"]);

			demo.controller("main", ["$scope", "WebIMWidget", "$http", function($scope, WebIMWidget, $http) {

				$scope.targetType = tgt; 
				//1：PRIVATE私聊 2:DISCUSSION讨论组 3:GROUP群组 4:CHATROOM聊天室 5:CUSTOMER_SERVICE客服 6:SYSTEM系统消息
				//7:APP_PUBLIC_SERVICE应用内公众账号 8:PUBLIC_SERVICE公众账号
				//更多会话类型查看http://www.rongcloud.cn/docs/api/js/global.html#ConversationType
				$scope.targetId = tgId;

				//注意实际应用中 appkey 、 token 使用自己从融云服务器注册的。
				var config = {
					appkey: ak,
					token: tk,
					displayConversationList: true,
					style:{
						left:3,
						bottom:3,
						width:430
					},
					onSuccess: function(id) {
						$scope.user = id;
						document.title = '用户：' + id;
						console.log('连接成功：' + id);
					},
					onError: function(error) {
						console.log('连接失败：' + error);
					}
				};
				RongDemo.common(WebIMWidget, config, $scope);

			}]);
		}
		inits(stgt,stgId,sak,stk);
		
	</script>
	<script>
		$(document).ready(function(){
			$('#fasongxiaoxi').click();
		});	
	</script>
</html>