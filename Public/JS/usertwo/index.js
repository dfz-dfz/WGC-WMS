var demo = angular.module("demo", ["RongWebIMWidget"]);

demo.controller("main", ["$scope", "WebIMWidget", function($scope, WebIMWidget) {

    $scope.targetType = 1; //1：私聊 更多会话类型查看http://www.rongcloud.cn/docs/api/js/global.html#ConversationType
    $scope.targetId = '10000';

    var config = {
        appkey: 'x18ywvqfx3ibc',
        token: 'a6KX4SZ44nKyz7odKEfEvyHsoKJ4LLjWA07U+xT+kWST/e4aaMVIWQpMn4G0oIR/Q/1Efgl89eaOMzed2FyRomq56+Bk5fP6',
        style:{
            left:3,
            bottom:3,
            width:430
        },
        displayConversationList: true,
        onSuccess: function(id) {
            $scope.user = id;
            document.title = '用户：' + id;
            console.log('连接成功：' + id);
        },
        onError: function(error) {
            console.log("连接失败：" + error);
        }
    };

    RongDemo.common(WebIMWidget, config, $scope);

}]);