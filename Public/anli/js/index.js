

$(function() {

    // 页面滑动时候键盘收起
    $(window).on("touchstart", function(){

        $("input").blur();

    });






    // 键盘弹出键盘，最底部的电话预约隐藏否则出现

    var winHeight = $(window).height(); //获取当前页面高度

    $(window).resize(function(){

        var thisHeight =$(this).height();

        if(winHeight - thisHeight >50){

            $("#tel").css("display","none");//窗口发生改变(大),故此时键盘弹出 //当软键盘弹出，在这里面操作

        }else{

            $("#tel").css("display","block");//窗口发生改变(小),故此时键盘收起 //当软键盘收起，在此处操作

        }
    });




    // 表单验证

    /************************  失焦判断  **********************************/
    $("input").blur(function(){
        $(".spa").css("color","#BD362F")
        if($(this).is("#username")){             //姓名判断
            var na=/^[\u4E00-\u9FA5]{2,4}$/
            if($("#username").val()!=""){
                if(!(na.test($("#username").val()))){
                    $(".spa1").text("请输入2-4个汉字");
                    $(this).css("border","1px solid #BD362F")
                    return false;
                }else if(na){
                    $(".spa1").text("");
                    return true;
                }
            }else{
                $(".spa1").text("");
            }
        }
        if($(this).is("#userphone")){            //手机号判断
            var ph=/^1[3|5|7|8|][0-9]{9}$/
            if($("#userphone").val()!=""){
                if(!(ph.test($("#userphone").val()))){
                    $(".spa2").text("请输入正确手机号");
                    $(this).css("border","1px solid #BD362F")
                    return false;
                }else if(ph){
                    $(".spa2").text("");
                    return true;
                }
            }else{
                $(".spa2").text("");
            }
        }

        if($(this).is("#useraddress")){            //地址判断
            var ad=/^(?=.*?[\u4E00-\u9FA5])[\dA-Za-z\u4E00-\u9FA5]{8,32}/;
            if($("#useraddress").val()!=""){
                if(!(ad.test($("#useraddress").val()))){
                    $(".spa3").text("请输入正确地址");
                    $(this).css("border","1px solid #BD362F")
                    return false;
                }else if(ad){
                    $(".spa3").text("");
                    return true;
                }
            }else{
                $(".spa3").text("");
            }
        }
    })
    /********************** 聚焦提示 ************************/
    $("input").focus(function(){
        if($(this).is("#username")){
            $(".spa1").text("2-4个汉字").css("color","#aaa")
            $(this).css("border","1px solid #aaa")
        }
        if($(this).is("#userphone")){
            $(".spa2").text("11位手机号码").css("color","#aaa")
            $(this).css("border","1px solid #aaa")
        }
        if($(this).is("#useraddress")){
            $(".spa3").text("最少8个字符（汉字、字母和数字）").css("color","#aaa")
            $(this).css("border","1px solid #aaa")
        }
    })
    /*********************** 提交验证 ***************************/
    $("#sub").click(function(){
        var na=/^[\u4E00-\u9FA5]{2,4}$/;   //姓名正则
        var ph=/^1[3|5|7|8|][0-9]{9}$/;    //手机号正则
        var ad=/^(?=.*?[\u4E00-\u9FA5])[\dA-Za-z\u4E00-\u9FA5]{8,32}/;     //地址正则
        if(na.test($("#username").val())&&ph.test($("#userphone").val())&&ad.test($("#useraddress").val())){
            return true;
        }else{
            if($("#username").val()==""){
                $(".spa1").text('请你填写用户名')
            }
            if($("#userphone").val()==""){
                $(".spa2").text('请你填写手机号')
            }
            if($("#useraddress").val()==""){
                $(".spa3").text('请你填写地址')
            }
            return false;
        }
    })













});





