var demo = angular.module("demo", ["RongWebIMWidget"]);

demo.controller("main", ["$scope", "WebIMWidget", "$http", function($scope, WebIMWidget, $http) {

    $scope.targetType = 6; 
	//1：PRIVATE私聊 2:DISCUSSION讨论组 3:GROUP群组 4:CHATROOM聊天室 5:CUSTOMER_SERVICE客服 6:SYSTEM系统消息
    //7:APP_PUBLIC_SERVICE应用内公众账号 8:PUBLIC_SERVICE公众账号
	//更多会话类型查看http://www.rongcloud.cn/docs/api/js/global.html#ConversationType
    $scope.targetId = '{$Think.session.admininfo.user_id}';

    //注意实际应用中 appkey 、 token 使用自己从融云服务器注册的。
    var config = {
        appkey: 'x18ywvqfx3ibc',
        token: "Fw56aA5JqGBT4n8KIgiB9+Kn3PNuIUJM+56i0FZ7xOr8tVpMdFv18lDLiFystekIuj6DkmLSVzhF3cMvLUaWJg==",
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