(function () {
/*
    将相同代码拆出来方便维护
 */
window.RongDemo = {
    common: function (WebIMWidget, config, $scope) {
        WebIMWidget.init(config);

        WebIMWidget.setUserInfoProvider(function(targetId, obj) {//alert(11);
            obj.onSuccess({
                name: "用户：" + targetId
            });
        });

        WebIMWidget.setGroupInfoProvider(function(targetId, obj){//alert(12);
            obj.onSuccess({
                name:'群组：' + targetId
            });
        })

        $scope.setconversation = function () {//alert(13);
            if (!!$scope.targetId) {
                WebIMWidget.setConversation(Number($scope.targetType), $scope.targetId, "用户：" + $scope.targetId);
                WebIMWidget.show();
            }
        };

        $scope.customerserviceId = "KEFU145914839332836";
        $scope.setcustomerservice = function () {//alert(14);
            WebIMWidget.setConversation(Number(RongIMLib.ConversationType.CUSTOMER_SERVICE), $scope.customerserviceId);
            WebIMWidget.show();
        }

        $scope.show = function() {//alert(15);
            WebIMWidget.show();
        };

        $scope.hidden = function() {//alert(16);
            WebIMWidget.hidden();
        };

        WebIMWidget.show();
        

        // 示例：获取 userinfo.json 中数据，根据 targetId 获取对应用户信息
        // WebIMWidget.setUserInfoProvider(function(targetId,obj){
        //     $http({
        //       url:"/userinfo.json"
        //     }).success(function(rep){
        //       var user;
        //       rep.userlist.forEach(function(item){
        //         if(item.id==targetId){
        //           user=item;
        //         }
        //       })
        //       if(user){
        //         obj.onSuccess({id:user.id,name:user.name,portraitUri:user.portraitUri});
        //       }else{
        //         obj.onSuccess({id:targetId,name:"用户："+targetId});
        //       }
        //     })
        // });

        // 示例：获取 online.json 中数据，根据传入用户 id 数组获取对应在线状态
        // WebIMWidget.setOnlineStatusProvider(function(arr, obj) {
        //     $http({
        //         url: "/online.json"
        //     }).success(function(rep) {
        //         obj.onSuccess(rep.data);
        //     })
        // });
    }
}

})()