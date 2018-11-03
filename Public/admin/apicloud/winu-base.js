window.serverUrl = "http://jingyi.59jiaju.com/";
window.uploadUrl = "http://jingyi.59jiaju.com/";
window.imgUrl = "http://jingyi.59jiaju.com/";
window.ImgsUrl = "http://jingyi.59jiaju.com";
// AC默认参数 BEGIN
window.openWinAnimationType = "movein";
window.openWinAnimationSubType = "from_right";
window.openWinAnimationDuration = 300;
window.openWinDelay = 300;
window.toastDuration = 4000;
window.toastLocation = "bottom";
window.showProgressAnimationType = "fade";
window.showProgressTitle = "努力加载中...";
window.showProgressText = "一会就好...";
window.ajaxTimeout = 30;
window.connectionType = 'unknown';
//设置客服
window.kefuId = 10000;
window.targetName = '在线客服-小婷',
//推送时间设定
window.showTime = 1000*120;
//推送播报次数限定
window.boNums = 3;
//推送播报次数限定
window.actionNums = 0;
//播报间隔时间
window.tstime = 1000*60*1;
//空数据180000
window.Emptys = '<div style="border: none;" class="empty"><img src="../../image/empty.png"/></div>';
window.Emptyss = '<div style="border: none;" class="empty"><img src="../image/empty.png"/></div>';
//扣取积分设定
window.capital = 10;

// APP默认参数 END
// 用户偏好设置的Key
window.userKey = "userInfo";

//禁止后退
function keyback(){
	api.addEventListener({
	    name : 'keyback'
	}, function (ret, err) { 
	 
	});
}



//选择查看对象
function power(p_id){
	
	_openWin('power_win','../power/index_win.html',{frameName : api.frameName,winName : api.winName,p_id : p_id});
}


//每日签到选择查看对象
function mrPower(){
	
	_openWin('power_mrPower_win','../power/mrPower_win.html',{frameName : api.frameName,winName : api.winName});
}

//==============================极光推送===========================================
//初始化推送服务
function ajpush_init(){
	var ajpush = api.require('ajpush');
	ajpush.init(function(ret) {
	    if (ret && ret.status){
	        ajpush_setListener();
	    }
	});
}

//推送签到
function ajpush_tuisong(thisUid,user_id,content){
	
	_ajax(serverUrl+ 'jingyi.php/Home/Jpush/push',"post", {
		values : {
			user_id : ""+user_id+"",
			content : content,
			thisUid : thisUid,
		}
	}, "json", function(ret) {
		
	});
}

//初始化推送服务
function ajpush_setListener(){
	var ajpush = api.require('ajpush');
	ajpush.setListener(
	    function(ret) {
	         var id = ret.id;
	         var title = ret.title;
	         var content = ret.content;
	         var extra = ret.extra;
	    }
	);
	
	//监听点击状态栏
	if(_isIOS()){
		api.addEventListener({
		    name: 'noticeclicked'
		}, function(ret, err) {//alert(JSON.stringify(ret));
		    if (ret && ret.value) {
		        var ajpush = ret.value;
		        var content = ajpush.content;
		        var extra = ajpush.extra;
		    }
		});
	}else{
		api.addEventListener({
		    name: 'appintent'
		}, function(ret, err) {//alert(JSON.stringify(ret));
		    if (ret && ret.appParam.ajpush) {
		        var ajpush = ret.appParam.ajpush;
		        var id = ajpush.id;
		        var title = ajpush.title;
		        var content = ajpush.content;
		        var extra = ajpush.extra;
		    }
		});
	}
}

//获取唯一的该设备的标识RegistrationID
function ajpush_getRegistrationId(user_id){
	var ajpush = api.require('ajpush');
	ajpush.getRegistrationId(function(ret) {
	    var registrationId = ret.id;
	    registration_id(user_id,registrationId);
	});
}

//绑定用户别名和标签。服务端可以指定别名和标签进行消息推送
function ajpush_bindAliasAndTags(){
	var ajpush = api.require('ajpush');
	var param = {alias:'myalias',tags:['tag1','tag2']};
	ajpush.bindAliasAndTags(param,function(ret) {
	       var statusCode = ret.statusCode;
	});
}

//更新极光推送用户唯一标识
function registration_id(user_id,push_id){
	_ajax(serverUrl+ 'jingyi.php/Home/Jymember/setRongID',"post", {
		values : {
			user_id : user_id,
			push_id : push_id,
		}
	}, "json", function(ret) {
	
	});
}

//获取群名字
function GroupNames(GroupId,_call){
	_ajax(serverUrl+ 'jingyi.php/Home/Index/getQunname',"post", {
		values : {
			groupid : GroupId,
		}
	}, "json", function(ret) {
		if(ret.status == 200){
			if ( typeof _call == "function") {
				_call(ret);
			}
		}else{
			_toast('获取失败！');
		}
		
	});
	
}


//==============================极光推送 and===========================================


//添加查看对象
function showUser_mrPower(userid){
	_ajax(serverUrl+ 'jingyi.php/Home/qiandao/getUnameByIds',"post", {
		values : {
			user_id : userid,
		}
	}, "json", function(ret) {
		if(ret.code == 200){
			_setStorage('power', userid);
			$("#power").val(ret.message);
		}else{
			_toast('获取失败！');
		}
		
	});
	
	_closeWins('power_mrPower_win');
}

//添加查看对象
function showUser_power(userid){
	_ajax(serverUrl+ 'jingyi.php/Home/qiandao/getUnameByIds',"post", {
		values : {
			user_id : userid,
		}
	}, "json", function(ret) {
		if(ret.code == 200){
			_setStorage('power', userid);
			$("#power").val(ret.message);
		}else{
			_toast('获取失败！');
		}
		
	});
	
	_closeWins('power_win');
}
//打开内置X5浏览器组件
	
function webBrowser(url){
	var browser = api.require('webBrowser');
	browser.openView({
	    url:url,
	    rect:{
	    	marginTop : $("#header").height(),
			marginBottom: $("#aui-footer").height()
		},
		progress:{
			color:'#F0F'
		}
	}, onBroserStateChange);
}

function onBroserStateChange(ret){

	var p = ret.title;;
	if(0 == ret.state){//BrowserView开始加载
	
		var url = ret.url;
		$('#title').html(url);
		
	}else if(1 == ret.state){//BrowserView加载进度发生变化
	
		$('#title').html(p);
		
	}else if(2 == ret.state){//BrowserView结束加载
	
		var url = ret.url;
		$('#title').html(url);
		
	}else if(3 == ret.state){//BrowserView标题发生变化
	
		$('#title').html(ret.title) ;
		
	}
	

}

//字节单位转换
function _bytesToSize(bytes) {
       if (bytes === 0) return '0 B';

        var k = 1024;

        sizes = ['B','KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        i = Math.floor(Math.log(bytes) / Math.log(k));

	return (Math.round((bytes / Math.pow(k, i))*100)/100) + ' ' + sizes[i]; 
       //toPrecision(3) 后面保留一位小数，如1.0GB                                                                                                                  //return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
}

// 解决状态栏重合
function _fixStatusBarNew(headerid) {
	var header = $api.byId(headerid);
	var systemType = api.systemType;
	var systemVersion = parseFloat(api.systemVersion);
	
	if (systemType == "ios" || (systemType == "android" && systemVersion >= 4.4)) {
		if (systemType == "android") {
			//header.style.paddingTop = "135px";
			//header.style.paddingTop = "30px";
			//header.style.paddingBottom = '5px';
		}
		$api.fixStatusBar(header);
	} else {
		$api.fixIos7Bar(header);
	}
	
}




// 继承拓展对象
function _extents(obj1, obj2) {
	for (var i in obj2) {
		if (obj1[i]) {
			continue;
		} else {
			obj1[i] = obj2[i];
		}
	}
}

// 手机号验证
function _checkPhone(phone) {
	var res = !!phone.match(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
	return res;
}
function _closeWin(){

	api.closeWin();
}

function _closeWins(name){
	api.closeWin({name:name}); 
}
// 打开新窗口
function _openWin(name, url, pageParam, bgColor, animateDirection, bounces, reload) {
	var _pageParam = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? api.pageParam : arguments[2];
	var _bgColor = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? 'rgba(0,0,0,0)' : arguments[3];
	var _animateDirection = ( typeof arguments[4] == "undefined" || arguments[4] == null) ? window.openWinAnimationSubType : arguments[4];
	var _bounces = ( typeof arguments[5] == "undefined" || arguments[5] == null) ? false : arguments[5];
	var _reload = ( typeof arguments[6] == "undefined" || arguments[6] == null) ? false : arguments[6];
	api.openWin({
		name : name,
		url : url,
		pageParam : _pageParam,
		bgColor : '#3498db',
		bounces : _bounces,
		scrollToTop : true,
		slidBackEnabled : true,
		animation : {
			type : window.openWinAnimationType,
			subType : _animateDirection,
			duration : window.openWinAnimationDuration
		},
		delay : api.systemType == "ios" ? 0 : window.openWinDelay,
		reload : true,
		allowEdit : false,
		slidBackEnabled : false,
		vScrollBarEnabled : false,
		hScrollBarEnabled : false
		
	});
}

// 打开新框架
function _openFrame(name, url, rect, pageParam, bgColor, bounces, reload, showProgress) {
	var __rect = {
		x : 0,
		y : 0,
		w : api.winWidth,
		y : api.winHeight,
		l : 0,
		t : 0,
		b : 0,
		r : 0
	};
	var _rect = ( typeof arguments[2] == "undefined" || arguments[2] == null || typeof arguments[2] != "object") ? __rect : arguments[2];
	var _pageParam = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? api.pageParam : arguments[3];
	var _bgColor = ( typeof arguments[4] == "undefined" || arguments[4] == null) ? 'rgba(0,0,0,0)' : arguments[4];
	var _bounces = ( typeof arguments[5] == "undefined" || arguments[5] == null) ? false : arguments[5];
	var _reload = ( typeof arguments[6] == "undefined" || arguments[6] == null) ? false : arguments[6];
	var _showProgress = ( typeof arguments[7] == "undefined" || arguments[7] == null) ? false : arguments[7];
	api.openFrame({
		name : name,
		url : url,
		rect : {
			x : typeof _rect.x != "number" ? __rect.x : _rect.x,
			y : typeof _rect.y != "number" ? __rect.y : _rect.y,
			w : typeof _rect.w != "number" ? __rect.w : _rect.w,
			h : typeof _rect.h != "number" ? __rect.h : _rect.h,
			marginLeft : typeof _rect.l != "number" ? __rect.l : _rect.l,
			marginTop : typeof _rect.t != "number" ? __rect.t : _rect.t,
			marginBottom : typeof _rect.b != "number" ? __rect.b : _rect.b,
			marginRight : typeof _rect.r != "number" ? __rect.r : _rect.r
		},
		//bgColor : _bgColor,
		progress : {
			type : 'page',
			color : '#45C01A',	
		},
		bgColor : '#fff',
		pageParam : _pageParam,
		scrollToTop : true,
		bounces : _bounces,
		showProgress : _showProgress,
		reload : false,
		vScrollBarEnabled : false,
		hScrollBarEnabled : false,
		allowEdit : true
	});
}

// 关闭当前窗口到新的窗口
function _closeToWin(name) {
	api.closeToWin({
		name : name,
		animation : {
			type : 'movein',
			subType : 'from_left',
			duration : 300
		}
	});
}

// 小提示
function _toast(msg, duration, location, _call) {
	var _duration = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? window.toastDuration : arguments[1];
	var _location = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? window.toastLocation : arguments[2];
	api.toast({
		msg : msg,
		duration : _duration,
		location : _location
	});
	if ( typeof _call == "function") {
		setTimeout(_call, duration);
	}
}

// 加载框
function _showProgress(title, text, modal, animationType) {
	var _title = ( typeof arguments[0] == "undefined" || arguments[0] == null) ? window.showProgressTitle : arguments[0];
	var _text = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? window.showProgressText : arguments[1];
	var _modal = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? true : arguments[2];
	var _animationType = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? window.showProgressAnimationType : arguments[3];
	api.showProgress({
		style : 'default',
		animationType : _animationType,
		title : _title,
		text : _text,
		//modal : _modal
		modal : false
	});
}

// 双击退出应用
function _twoClickCloseApp(_call) {
	//定义个时间戳
	var mkeyTime = new Date().getTime();

	_addEventListener('keyback', function(ret) {
		//如果当前时间减去标志时间大于2秒，说明是第一次点击返回键，反之为2秒内点了2次，则退出。
		if ((new Date().getTime() - mkeyTime) > 2000) {
			mkeyTime = new Date().getTime();
			_toast('再按一次退出程序', 2000);
		} else {
			if ( typeof _call == "function") {
				_call();
			}
			// 静默关闭,不弹出关闭提示窗口
			api.closeWidget({
				silent : true
			});
		}
	}, {});
}

function keyback(_call){
	api.addEventListener({
	    name: 'keyback'
	}, function(ret, err) {
	    if( typeof _call == "function") {
			_call();
		}
	});
}


// 下拉刷新
function _setRefreshHeaderInfo(_call, bgColor, textColor) {
	var _bgColor = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? '#f1f1f1' : arguments[1];
	var _textColor = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? '#999' : arguments[2];
	api.setRefreshHeaderInfo({
		visible : true,
		loadingImg : 'widget://image/refresh.png',
		bgColor : _bgColor,
		textColor : _textColor,
		textDown : '下拉刷新...',
		textUp : '松开刷新...',
		showTime : true
	}, function(ret, err) {
		if ( typeof _call == "function") {
			_call();
		}
	});
}

// 上拉加载
function _scrolltobottom(_call, threshold) {
	var _threshold = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? 0 : arguments[1];
	_addEventListener('scrolltobottom', _call, {
		threshold : _threshold
	});
}

// 获取偏好设置
function _getPrefs(key, _call) {
	api.getPrefs({
		key : key
	}, function(ret, err) {
		var v = ret.value;
		if ( typeof _call == "function") {
			_call(v);
		}
	});
}

// 设置偏好设置
function _setPrefs(key, value, _call) {
	api.setPrefs({
		key : key,
		value : value
	}, function(ret, err) {
		var v = ret.value;
		if ( typeof _call == "function") {
			_call();
		}
	});
}

// 移除偏好设置
function _removePrefs(key) {
	api.removePrefs({
		key : key
	});
}

// 设置存储
function _setStorage(key, value) {
	$api.setStorage(key, value);
}

// 获取存储
function _getStorage(key) {
	return $api.getStorage(key);
}

//获取当前时间和日期
function myDate(type){

	var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    
    if(type == 1){
    	var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate;
    }else if(type == 2){
    	var currentdate = date.getHours() + seperator2 + date.getMinutes()
            + seperator2 + date.getSeconds();
    
    }
    return currentdate;     
}

// 移除存储
function _removeStorage(key) {
	return $api.rmStorage(key);
}

// 异步请求
function _ajax(url, method, data, dataType, _call, headers, cache, timeout, tag) {

	var _data = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? {} : arguments[2];
	var _dataType = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? "json" : arguments[3];
	var _headers = ( typeof arguments[5] == "undefined" || arguments[5] == null) ? {} : arguments[5];
	var _cache = ( typeof arguments[6] == "undefined" || arguments[6] == null) ? false : arguments[6];
	var _timeout = ( typeof arguments[7] == "undefined" || arguments[7] == null) ? window.ajaxTimeout : arguments[7];
	var _tag = ( typeof arguments[8] == "undefined" || arguments[8] == null) ? '' : arguments[8];
	
	/*api.ajax({
		url : url,
		cache : _cache,
		tag : _tag,
		method : method,
		headers : _headers,
		timeout : _timeout,
		dataType : _dataType,
		returnAll : false,
		data : _data
	}, function(ret, err) {*/
	api.ajax({
	    url: url,
	    method: method,
	    data: _data,
	}, function(ret, err) {
		if (ret) {
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else {
			api.hideProgress();
			api.refreshHeaderLoadDone();
			_toast("连接错误，请检查网络是否连接");
			//_toast(err.msg);
			//api.alert({msg : ('错误码：' + err.code + '；错误信息：' + err.msg + '网络状态码：' + err.statusCode)});
		}

	});
}

// 解决状态栏重合
function _fixStatusBar(headerid, callback) {
	var header = $api.byId(headerid);
	var systemType = api.systemType;
	var systemVersion = parseFloat(api.systemVersion);
	if (systemType == "ios" || (systemType == "android" && systemVersion >= 4.4)) {
		if (systemType == "android") {
			header.style.paddingTop = '25px';
		}
		$api.fixStatusBar(header);
	} else {
		$api.fixIos7Bar(header);
	}
	var headerPos = $api.offset(header);
	if ( typeof callback == "function") {
		callback(headerPos);
	}
}


// 指定window或者frame执行脚本
function _execScript(winName, frmName, fnStr) {
	var _winName = ( typeof arguments[0] == "undefined" || arguments[0] == null) ? api.winName : arguments[0];
	var _frmName = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? api.frameName : arguments[1];
	var _fnStr = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? '' : arguments[2];
	api.execScript({
		name : _winName,
		frameName : _frmName,
		script : _fnStr
	});
}

// 广播事件
function _sendEvent(eventName, extra) {
	var _extra = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? {} : arguments[1];
	api.sendEvent({
		name : eventName,
		extra : _extra
	});
}

// 监听事件
function _addEventListener(eventName, _call, extra) {
	var _extra = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? {} : arguments[2];
	api.addEventListener({
		name : eventName,
		extra : _extra
	}, function(ret, err) {
		if ( typeof _call == "function") {
			_call(ret);
		}
	});
}

// 打开相册或相机
//library            //图片库
//camera            //相机
//album            //相册
//pic            //图片
//video        //视频
function _getPicture(_call, encodingType, mediaValue, destinationType, quality, targetWidth, targetHeight, saveToPhotoAlbum, allowEdit) {
	var _encodingType = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? "jpg" : arguments[1];
	var _mediaValue = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? "pic" : arguments[2];
	var _destinationType = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? "url" : arguments[3];
	var _quality = ( typeof arguments[4] == "undefined" || arguments[4] == null) ? 50 : arguments[4];
	var _targetWidth = ( typeof arguments[5] == "undefined" || arguments[5] == null) ? 320 : arguments[5];
	var _targetHeight = ( typeof arguments[6] == "undefined" || arguments[6] == null) ? 320 : arguments[6];
	var _saveToPhotoAlbum = ( typeof arguments[7] == "undefined" || arguments[7] == null) ? true : arguments[7];

	api.actionSheet({
		title : '您想要从哪里选取图片？',
		cancelTitle : '取消',
		buttons : ["拍照", "相册收藏"]
	}, function(ret, err) {
		if (ret.buttonIndex == 3) {
			return;
		}
		var sourceType = "album";
		if (ret.buttonIndex == 1) {
			sourceType = "camera";
		}

		api.getPicture({
			sourceType : sourceType,
			encodingType : _encodingType,
			destinationType : _destinationType,
			mediaValue : _mediaValue,
			quality : 50,
			targetWidth : _targetWidth,
			targetHeight : _targetHeight,
			saveToPhotoAlbum : _saveToPhotoAlbum
		}, function(ret, err) {
			if (ret) {
				if ( typeof _call == "function") {
					_call(ret.data);
				}
			} else {
				api.alert({
					msg : err.msg
				});
			}
		});
	});

}



// 打开相册或相机
//library            //图片库
//camera            //相机
//album            //相册
//pic            //图片
//video        //视频
function _getPicture_qiandao(_call, encodingType, mediaValue, destinationType, quality, targetWidth, targetHeight, saveToPhotoAlbum, allowEdit) {
	var _encodingType = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? "jpg" : arguments[1];
	var _mediaValue = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? "pic" : arguments[2];
	var _destinationType = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? "url" : arguments[3];
	var _quality = ( typeof arguments[4] == "undefined" || arguments[4] == null) ? 50 : arguments[4];
	var _targetWidth = ( typeof arguments[5] == "undefined" || arguments[5] == null) ? 520 : arguments[5];
	var _targetHeight = ( typeof arguments[6] == "undefined" || arguments[6] == null) ? 520 : arguments[6];
	var _saveToPhotoAlbum = ( typeof arguments[7] == "undefined" || arguments[7] == null) ? true : arguments[7];

	api.actionSheet({
		title : '您想要从哪里选取图片',
		
		cancelTitle : '取消',
		buttons : ["相册","拍照"]
	}, function(ret, err) {
		if (ret.buttonIndex == 1) {
			sourceType = "library";
		}
		
		if (ret.buttonIndex == 2) {
			sourceType = "camera";
		}

		api.getPicture({
			sourceType : sourceType,
			encodingType : _encodingType,
			destinationType : _destinationType,
			mediaValue : _mediaValue,
			quality : 40,
			//targetWidth : 1000,
			//targetHeight : 800,
			saveToPhotoAlbum : _saveToPhotoAlbum
		}, function(ret, err) {
			if (ret) {
				if ( typeof _call == "function") {
					_call(ret.data);
				}
			} else {
				api.alert({
					msg : err.msg
				});
			}
		});
	});

}

// 打开相册或相机
//library            //图片库
//camera            //相机
//album            //相册
//pic            //图片
//video        //视频
function _getPicture_xmqd(_call, encodingType, mediaValue, destinationType, quality, targetWidth, targetHeight, saveToPhotoAlbum, allowEdit) {
	var _encodingType = ( typeof arguments[1] == "undefined" || arguments[1] == null) ? "jpg" : arguments[1];
	var _mediaValue = ( typeof arguments[2] == "undefined" || arguments[2] == null) ? "pic" : arguments[2];
	var _destinationType = ( typeof arguments[3] == "undefined" || arguments[3] == null) ? "url" : arguments[3];
	var _quality = ( typeof arguments[4] == "undefined" || arguments[4] == null) ? 50 : arguments[4];
	var _targetWidth = ( typeof arguments[5] == "undefined" || arguments[5] == null) ? 520 : arguments[5];
	var _targetHeight = ( typeof arguments[6] == "undefined" || arguments[6] == null) ? 520 : arguments[6];
	var _saveToPhotoAlbum = ( typeof arguments[7] == "undefined" || arguments[7] == null) ? true : arguments[7];

	api.actionSheet({
		title : '您想要从哪里选取图片',
		cancelTitle : '取消',
		buttons : ["拍照",'相册获取']
	}, function(ret, err) {
		if (ret.buttonIndex == 1) {
			sourceType = "camera";
		}
		
		if (ret.buttonIndex == 2) {
			sourceType = "library";
		}

		api.getPicture({
			sourceType : sourceType,
			encodingType : _encodingType,
			destinationType : _destinationType,
			mediaValue : _mediaValue,
			quality : 40,
			//targetWidth : 1000,
			//targetHeight : 800,
			saveToPhotoAlbum : _saveToPhotoAlbum
		}, function(ret, err) {
			if (ret) {
				if ( typeof _call == "function") {
					_call(ret.data);
				}
			} else {
				api.alert({
					msg : err.msg
				});
			}
		});
	});

}

// 判断是否是IOS
function _isIOS() {
	return api.systemType == "ios" ? true : false;
}

// 滚动到底部
function _scrollToEnd() {
	document.getElementsByTagName('body')[0].scrollTop = document.getElementsByTagName('body')[0].scrollHeight;
}

// 设置frame显示隐藏状态
function _setFrameStatus(name, isHidden) {
	api.setFrameAttr({
		name : name,
		hidden : isHidden
	});
}

// 判断是否是正整数
function _isNumber(str) {
	var re = /^[0-9]*[1-9][0-9]*$/;
	return re.test(str)
}

// 是否是正浮点数
function _isDecimal(str) {
	var re = /^(([0-9]|([1-9][0-9]{0,9}))((\.[0-9]{1,2})?))$/;
	return re.test(str)
}

// 是否是日期格式
function _isDate(str) {
	var re = /^(?:(?:1[6-9]|[2-9][0-9])[0-9]{2}([-/.]?)(?:(?:0?[1-9]|1[0-2])\1(?:0?[1-9]|1[0-9]|2[0-8])|(?:0?[13-9]|1[0-2])\1(?:29|30)|(?:0?[13578]|1[02])\1(?:31))|(?:(?:1[6-9]|[2-9][0-9])(?:0[48]|[2468][048]|[13579][26])|(?:16|[2468][048]|[3579][26])00)([-/.]?)0?2\2(?:29))(\s+([01][0-9]:|2[0-3]:)?[0-5][0-9]:[0-5][0-9])?$/;
	return re.test(str)
}

// 清除缓存
function _SelectCache() {

	var size = api.getCacheSize({
	    sync: true
	});
	
	return _bytesToSize(size);
}

// 清除缓存
function _clearCache(size) {
	api.clearCache(function(ret, err) {
		_toast("已为您清除"+size+'缓存');
	});
}

// 退出登录
function _loginOut(_call) {
	_removePrefs(window.userKey, _call);
}

// 禁止返回
function _stopBack(_call) {
	_addEventListener('keyback', function(ret) {
		if ( typeof _call == "function") {
			_call(ret.data);
		}
	}, {});
}


//语音播放
function openyuyin(obj){
	var voicepath = obj.id;
	// 先停止所有播放
	api.stopPlay();
	$(".yuyin").css("background","#005DE6");
	_download(voicepath,function(ret){
		var percent = ret.percent;
	    if (ret.state == 1) {
	    	var savePath = ret.savePath;
	        //下载成功
	        obj.style.background = "red";
			api.startPlay({
				path : savePath
			}, function() {
				obj.style.background = "#005DE6";
			});
	    }
	});
}

// 文件下载
function _download(path,_call) {
	api.download({
	    url: path,
	    report: true,
	    cache: true,
	    allowResume: true
	}, function(ret, err) {
	    if (ret.state == 1) {
	    	//_toast('下载完成！');
	    	if ( typeof _call == "function") {
				_call(ret);
			}
	        //下载成功
	    }
	});
		
	
}

// 弹窗
function _alert(obj) {
	if ( typeof obj == "object") {
		api.alert({
			msg : JSON.stringify(obj)
		}, function(ret, err) {

		});
	} else {
		api.alert({
			msg : obj
		}, function(ret, err) {

		});
	}
}

// 根据出生日期算年龄
function ages(str) {
	var r = str.match(/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/);
	if (r == null)
		return false;
	var d = new Date(r[1], r[3] - 1, r[4]);
	if (d.getFullYear() == r[1] && (d.getMonth() + 1) == r[3] && d.getDate() == r[4]) {
		var Y = new Date().getFullYear();
		return (Y - r[1]);
	}
	return 0;
}

// 获取文件拓展名
function _getExt(fileName) {
	return fileName.substring(fileName.lastIndexOf('.') + 1);
}
 
// PHP时间戳转时间
function _trans_php_time_to_str(timestamp, n) {
	update = new Date(timestamp * 1000);
	//时间戳要乘1000
	year = update.getFullYear();
	month = (update.getMonth() + 1 < 10) ? ('0' + (update.getMonth() + 1)) : (update.getMonth() + 1);
	day = (update.getDate() < 10) ? ('0' + update.getDate()) : (update.getDate());
	hour = (update.getHours() < 10) ? ('0' + update.getHours()) : (update.getHours());
	minute = (update.getMinutes() < 10) ? ('0' + update.getMinutes()) : (update.getMinutes());
	second = (update.getSeconds() < 10) ? ('0' + update.getSeconds()) : (update.getSeconds());
	if (n == 1) {
		return (year + '-' + month + '-' + day + ' ' + hour + ':' + minute + ':' + second);
	} else if (n == 2) {
		return (year + '-' + month + '-' + day);
	} else if (n == 3) {
		return (month + '-' + day);
	} else if (n == 4) {
		return (hour + ':' + minute + ':' + second);
	} else if (n == 5) {
		return (year + '-' + month + '-' + day + ' ' + hour + ':' + minute );
	} else {
		return 0;
	}
}

// 生成guid,主要用于生成随机文件名
function _newGuid() {
	function S4() {
		return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
	}

	return (S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4());
}

// 获取当前的时间，拼接成2015-11-09这样的格式，主要用于对图片进行时间分类
function _getNowFormatDate() {
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
	var currentdate = year + seperator1 + month + seperator1 + strDate
	return currentdate;
}

// 图片压缩
// imageFilter:压缩对象
// imgsrc：源图片的路径
// quality：图片压缩质量，一般建议0.5
// scale：图片压缩比例，也是建议0.5
// ext：源图片拓展名
// callback：转换成功之后回调函数
function _imgCompress(imageFilter, imgsrc, quality, scale, ext, callback) {
	// 压缩文件的保存目录
	var savePath = api.cacheDir + "/" + _getNowFormatDate() + "/";
	// 压缩文件生成的随机文件名称
	var savename = _newGuid() + "." + ext;
	imageFilter.compress({
		img : imgsrc,
		quality : quality,
		scale : quality,
		save : {
			album : false,
			imgPath : savePath,
			imgName : savename
		}
	}, function(ret, err) {
		if (ret) {
			callback(savePath + savename);
		} else {
			alert(JSON.stringify(err));
		}
	});
}





// 上传图片
function _uploadImgs(data, _call) {
	_toast("上传中...", 10000);
	_ajax(window.serverUrl + "jingyi.php/Home/uploads/index", "post", {
		files : {
			"pic" : data
		}
	}, "json", function(ret) {
		if (ret.statu == 1) {
			_toast("上传成功!");
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else if (ret.statu == 0) {
			_toast("系统繁忙，请重新上传!");
		} else {
			_toast("非法参数!");
		}
	});
}

//获取用户字段
function showUsers(userId,fields,_call){

	_ajax(window.serverUrl + "jingyi.php/Home/Jymember/getUinf", "post", {
		values : {
			user_id : userId,
			fields : fields,
		}
	}, "json", function(ret) {
		if( typeof _call == "function") {
			_call(ret);
		}
	});
}

// 上传语音
function _uploadstartRecord(data,duration, _call) {
	_toast("上传中...", 10000);
	_ajax(window.serverUrl + "jingyi.php/Home/File/uploadVoice", "post", {
		files : {
			pic : data
		},
		values : {
			duration : duration
		}
	}, "json", function(ret) {
		if (ret.statu == 200) {
			_toast("录制成功!");
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else if (ret.statu == 202) {
			_toast("系统繁忙，请重新上传!");
		} else {
			_toast("非法参数!");
		}
	});
}

// 设置语音空格长度
function setVoiceLengths(duration) {
	var beisu = Math.ceil(parseInt(duration) / 4.0);
	var html = "";
	for (var i = 0; i < beisu; i++) {
		html += "&nbsp;&nbsp;&nbsp;";
	}
	return html;
}

// 上传图片
function _uploadImgsZS(data,uid,_call) {
	_toast("上传中...", 10000);
	_ajax(window.serverUrl + "jingyi.php/Home/uploads/zhengshu", "post", {
		files : {
			"pic" : data
		},
		values: {
            "uid" : uid,
        },
	}, "json", function(ret) {
		if (ret.statu == 1) {
			_toast("上传成功!");
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else if (ret.statu == 0) {
			_toast("系统繁忙，请重新上传!");
		} else {
			_toast("非法参数!");
		}
	});
}

// 上传图片
function _uploadImgsPhoto(data,uid,_call) {
	_toast("上传中...", 10000);
	_ajax(window.serverUrl + "jingyi.php/Home/uploads/index", "post", {
		files : {
			"pic" : data
		},
		values: {
            "uid" : uid,
        },
	}, "json", function(ret) {
		if (ret.statu == 1) {
			_toast("上传成功!");
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else if (ret.statu == 0) {
			_toast("系统繁忙，请重新上传!");
		} else {
			_toast("非法参数!");
		}
	});
}

// 上传图片
function _uploadImgs_qiandao(data,address,times, _call) {
	//_toast("上传中...", 10000);
	_showProgress();
	_ajax(window.serverUrl + "jingyi.php/Home/uploads/qiandao", "post", {
		files : {
			"pic" : data,
			
		},
		values: {
            "address" : address,
			"times" : times,
        },
		
	}, "json", function(ret) {
	
		api.hideProgress();
		if (ret.statu == 1) {
			_toast("上传成功!");
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else if (ret.statu == 0) {
			_toast("系统繁忙，请重新上传!");
		} else {
			_toast("非法参数!");
		}
	});
}


//项目描述图片上传
// 上传图片
function _uploadImgs_xiangmu(data,times, _call) {
	//_toast("上传中...", 10000);
	_showProgress();
	_ajax(window.serverUrl + "jingyi.php/Home/Jymember/prjImg", "post", {
		files : {
			"img" : data,
			
		},
		values: {
			"addtime" : times,
        },
		
	}, "json", function(ret) {
	
		api.hideProgress();
		if (ret.statu == 1) {
			_toast("上传成功!");
			if ( typeof _call == "function") {
				_call(ret);
			}
		} else if (ret.statu == 0) {
			_toast("系统繁忙，请重新上传!");
		} else {
			_toast("上传成功!");
		}
	});
}
// 添加长按方法
function addPress(obj, index) {
	// 获取目前长按的对象
	var hammertime = new Hammer(obj[0]);
	// 绑定长按对象
	hammertime.on("press", function(e) {
		api.confirm({
			title : '温馨提示',
			msg : '您确定要删除吗？',
			buttons : ['确定', '取消']
		}, function(ret, err) {
			if (ret.buttonIndex == 1) {
				// 移除自己
				$(obj).remove();
				api.toast({
					msg : '删除成功！'
				});
			}
		});
	});
}

//复制剪切板
function clipBoard(keyVlue){
	var clipBoard = api.require('clipBoard');
	clipBoard.set({
	    value: keyVlue
	}, function(ret, err) {
	    if (ret) {
	        _toast('复制成功');
	    } else {
	        _toast('复制失败');
	    }
	});
}



// 时间戳转时间
function _formatDate(timespan) {
	var now = new Date(timespan);
	var year = now.getFullYear();
	var month = now.getMonth() + 1;
	var date = now.getDate();
	var hour = now.getHours();
	var minute = now.getMinutes();
	var second = now.getSeconds();
	return year + "-" + month + "-" + date + "   " + hour + ":" + minute + ":" + second;
}

//获取当前时间
function newDate(){

	var myDate = new Date();
	//获取当前年
	var year=myDate.getFullYear();
	//获取当前月
	var month=myDate.getMonth()+1;
	//获取当前日
	var date=myDate.getDate(); 
	var h=myDate.getHours();       //获取当前小时数(0-23)
	var m=myDate.getMinutes();     //获取当前分钟数(0-59)
	var s=myDate.getSeconds();  
	
	var now=year+'年'+p(month)+"月"+p(date)+"日  "+p(h)+':'+p(m)+":"+p(s);
	
	return now;
}
function p(s) {
    return s < 10 ? '0' + s: s;
}
// 去除数组重复项
function _unique(arr) {
	var result = [], hash = {};
	for (var i = 0, elem; ( elem = arr[i]) != null; i++) {
		if (!hash[elem]) {
			result.push(elem);
			hash[elem] = true;
		}
	}
	return result;
}

//支付宝支付

function aliPay(amount,pay_sn,notifyURL,subject,body,type,payment_type){
		
	 var aliPay = api.require('aliPay');
	   
	   aliPay.config({
		    partner: '2088011610491412',
		    seller: '59jiaju@59jiaju.com',
		    rsaPriKey: 'MIICXQIBAAKBgQCjuFcBuM/kz1VJgNX4F9e/5vaAWiVFArqCpSa4TJP3W+XdHmMEXTu0LUKUQQQpNxLvOyEMkoMRR8764LPNhDxbZsngSgAP+m6chQEUbrWc0LFj+XoIwqEnlAZWdsnl5eesDtEJIqCy/1yIUVELTELWGhCY0sNIDTQR5dmlMxLIPwIDAQABAoGAFA//4X8jQrfBjMtT7R4G20ZTSLFDReyqrF3Om+EOdM53IZyap6tBKLgvI3nAJ8jO8i/9wcumchSpoYatoe6lcp+9baq576rfLOJOSOsuAmyr+Fp43B84rt+Edoj3odWkik8GOeR//R07j8QhIl1pqtCawnj41Y+bwZ4v7P7hYbECQQDOx+u4NZroXdsCOuk927t7fv63RiEtde0iy2xrWux6VXAffC5zui4b+JLgFknMNg7ZgYZUx9+vsuIScnqSXJn5AkEAyrCHpIPWnmQGaZYXghtFf7Uew/85yh81NUqo1/KZPXdEpqr8tEJuaIRYZZDezyJqSq1iYhSStwkZ1TPfFjJB9wJBAJhoYiTz3alHBBUwtpkRS65KfBM5bVrEgHQU22SFL6c7MdkC/nntz+5t2FOyGdKaRXerMAdtCkHF5zsRhaY6+oECQQCJOa778M5S+gFlZtqPmYsaBTPJGnizoSFS7TMW0QZymNb/x+/C0t8RH9kBGm3e6rvvxyc+pBMYnK7Cq5Wz317NAkBwcrHH4dx3pw9qnA+CrUPnsYNWaKoNvrC/gXOLP7Yru9R95KTvSJt4wNJ2ZhIwOhRg1cOxjmilb/Dq9XNTA0YJ',
		    rsaPubKey: 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCjuFcBuM/kz1VJgNX4F9e/5vaAWiVFArqCpSa4TJP3W+XdHmMEXTu0LUKUQQQpNxLvOyEMkoMRR8764LPNhDxbZsngSgAP+m6chQEUbrWc0LFj+XoIwqEnlAZWdsnl5eesDtEJIqCy/1yIUVELTELWGhCY0sNIDTQR5dmlMxLIPwIDAQAB',
		    notifyURL: 'http://jingyi.59jiaju.com/payreturn.php'
		}, function(ret, err) {
			if(ret.status){
			    aliPay.pay({
				    subject: subject,
				    body: subject,
				    amount: amount,
				    tradeNO: pay_sn
				}, function(ret, err) {
				    if(ret.statusCode == 6001){
			        	_toast('您已取消支付！');
			        }else if(ret.statusCode == 9000){
			        	Orders(amount,pay_sn,subject,body,type,payment_type,operator,operating,'');
		         	}else if(ret.statusCode == 4000){
			        	_toast('系统异常');
			        }else if(ret.statusCode == 4003){
			        	_toast('该用户绑定的支付宝账户被冻结或不允许支付');
			        }else if(ret.statusCode == 4006){
			        	_toast('订单支付失败');
			        }else{
			        	_toast(ret.code);
			        }
				});
			}
		});
	   
	   
		
		
		

} 



function Orders(amount,pay_sn,subject,body,type,payment_type,operator,operating,tomobile){
	var url = window.serverUrl+"jingyi.php/Home/Alipay/ordersubmit";
	_ajax(url,'post',{
		values:{
	    	userid : _getStorage('userinfo').user_id,
	    	payee_id : 0,
	    	type : type,
	    	body : body,
	    	total_amount : amount,
	    	subject:  subject,
	    	ordid : pay_sn, 
	    	ordstatus : 1,
	    	ordprice : amount,
	    	ordbuynum : 1,
	    	operator : operator,
	    	operating : operating,
	    	payment_type : payment_type,
	    	tomobile : tomobile,
		}
	},'json',function(ret){ 
		var data = ret.message;
		if(ret.code == 200){
			_toast('支付成功');
			_closeToWin('root');
		}else if(ret.code == 202){
			_toast('账号余额不足！');
			return false;
		}else if(ret.code == 204){
			_toast('请输入金额！');
			return false;
		}else if(ret.code == 205){
			_toast('收款用户不存在！');
			return false;
		}else{
			_toast('支付异常！');
		}
	});
}


function formatPhone(kahao) {
    return kahao.replace(/^(\d{2})\d+(\d{3})$/, "$1*************$2");
}

//判断当前是否连接网络
//connectionType 属性值
//unknown  未知
//ethernet  以太网
//wifi   wifi
//2g    2G网络
//g     3G网络
//4g    4G网络
//none   无网络

function connectionListener(){

	
	connectionType = api.connectionType;
	
    api.addEventListener({
            name : 'offline'
    }, function(ret, err) {
         connectionType = 'none';
    });
    
    api.addEventListener({
            name : 'online'
    }, function(ret, err) {
          connectionType = ret.connectionType;
    });

	return connectionType;
}

//关闭提示条
function offline(){

	$("#offline").hide();
}



//生成订单号
function CurentTime()
    { 
        var now = new Date();
        
        var year = now.getFullYear();       //年
        var month = now.getMonth() + 1;     //月
        var day = now.getDate();            //日
        
        var hh = now.getHours();            //时
        var mm = now.getMinutes();          //分
        var ss = now.getSeconds();           //秒
        
        var clock = year;
        
        if(month < 10)
            clock += "0";
        
        clock += month;
        
        if(day < 10)
            clock += "0";
            
        clock += day;
        
        if(hh < 10)
            clock += "0";
            
        clock += hh;
        if (mm < 10) clock += '0'; 
        clock += mm; 
         
        if (ss < 10) clock += '0'; 
        clock += ss; 
        return(clock); 
}

// 打开图片浏览
// imgs：需要预览的图片集合
// byId: 盒子ID
function showImg(byId) {
	
	// 为图片添加点击预览功能,排除添加按钮
	var listImg=document.getElementById(byId).getElementsByTagName("img");
	// 定义一个数组，存储需要预览的图片
	var browerImgs = [];
	var Index = 0;
	for(var i=0;i<listImg.length;i++)
	{
		// 将图片追加到数组中
		browerImgs.push(listImg[i].src);
		
	}
	
	imageBrowser.openImages({
		imageUrls : browerImgs,
		showList : false,
		activeIndex : Index
	});
	
	
}
//距离单位换算
function _distance(distance){
	var distance;
	if(distance < 1000){
    	distance = distance+"米";
	}else if(distance > 1000){
    	distance = (Math.round(distance/100)/10).toFixed(1) + "公里";
    }
    
    return distance;
}




//文字转语音
/*
 * 
 * xiaoyan：小燕-0
 * xiaoyu：小宇-1
 * catherine：凯瑟琳-2
 * henry：亨利-3
 * vimary：玛丽-4
 * vixy：小研-5
 * vixq：小琪-6
 * vixf：小峰-7
 * vixl：小梅-8
 * vixq：小莉-9
 * vixr：小蓉（四川话）-10
 * vixyun：小芸-11
 * vixk：小坤-12
 * vixqa：小强-13
 * vixying：小莹-14
 * vixx：小新-15
 * vinn：楠楠-16
 * vils：老孙-17
 */
function speech(title){
	var speechRecognizer = api.require('speechRecognizer');
	speechRecognizer.read({
	    readStr: title,
	    speed: 60,
	    volume: 60,
	    voice: 0,
	    rate: 16000,
	}, function(ret, err) {
	    if (ret.status) {
	        ret.speakProgress
	    } else {
	        _toast('语音权限被拒绝访问');
	    }
	});
}

function speechs(title,audioPath){
	var speechRecognizer = api.require('speechRecognizer');
	speechRecognizer.read({
	    readStr: title,
	    speed: 60,
	    volume: 60,
	    voice: 0,
	    rate: 16000,
	}, function(ret, err) {
	    if (ret.status) {
	    
	    } else {
	        _toast('语音权限被拒绝访问');
	    }
	    
	    
	});

}

//语音转文字
function speechRecognizer(audioPath){
	var speechRecognizer = api.require('speechRecognizer');
	speechRecognizer.record({
	    vadbos: 5000,
	    vadeos: 5000,
	    rate: 16000,
	    asrptt: 1,
	    audioPath: 'fs://res/msg.wav'
	}, function(ret, err) {
	    if (ret.status) {
	        api.alert({ msg: ret.wordStr });
	    } else {
	        _toast('语音权限被拒绝访问');
	    }
	});

}

//获取用户轨迹
function startLocation(){
	var bMap = api.require('bMap');
	bMap.getLocation({
	    accuracy: '1m',
	    autoStop: true,
	    filter: 1
	}, function(ret, err) {
	    if (ret.status) {
	        
	    } else {
	        _toast('定位失败，请打开GPS定位');
	    }
	});
}


//监听推送消息
function tuisongMessages(){
	//监听推送列表
	_addEventListener("tuisongMessages", function(ret) {
		if (ret && ret.value) {
			var msg = ret.value.data[0];
			
			
			//设置语音推送播报
			switch(msg.type){
				case '1': 
				 	var $title = ' 求职消息：'+msg.name+',求职岗位：'+msg.title+'。目前所在地：'+msg.xiangxi+'，要求薪资：面议';
				 break;
				case '2': 
				 	var $title = ' 招工消息：'+msg.name+',招聘岗位：'+msg.title+'。招聘人数：'+msg.renshu+'公司所在地：'+msg.xiangxi+'，要求薪资：面议';
				 break;
				case '3': 
				 	var $title = '有新工价信息发布了，名称是：'+msg.title+'，工价是：'+msg.xinzi+'。地址：'+msg.xiangxi;
				 break;
				 case '4': 
				 	var $title = '分包信息：'+msg.title+'，工程价是：'+msg.xinzi+'。地址：'+msg.xiangxi;
				 break;
			}
			
	       
	       	if(window.actionNums <= window.boNums){
	        	speech($title); 
			}
		}
	});
}

//获取推送消息
	function UserTuisong(){
	
		var bMap = api.require('bMap');
		var user_id = _getStorage('userinfo').user_id;
		bMap.getNameFromCoords({
		    lon: user_lon,
		    lat: user_lat
		}, function(ret, err) { 
		    if (ret.status) {
		    	var city = _getStorage('city')?_getStorage('city'):ret.city;
				_ajax(serverUrl+ 'jingyi.php/Home/Index/getJpMsg',"post", {
					values : {
					
							user_id : user_id,
							s_city : city,
					}
					
				}, "json", function(ret) { 
				
					if(ret.status == 200){
					    
						var data = ret.data.msg;
						
						var ee = _getStorage('send_viod').data;
						if(ee == ''){
							_setStorage('send_viod',{data:data});
							speech(data); 
						}else{
							if(ee == data){
								if(window.boNums >= 1){
									window.boNums--;
									speech(data); 
								}
							}else{
							 		speech(data); 
									_setStorage('send_viod',{data:data});
									window.boNums = 5;
								}
						}
    				}
				});
		    	
		    	
		    }
		});
	}



//============================定时上传获取轨迹====================

	//定时获取用户当前位置-并上传-轨迹
	var user_lon = 116.4021310000,user_lat = 39.9994480000;
	function UserLocations(){
		
		// 引入百度地图
		var bMap = api.require('bMap');
		bMap.open({
            x: 10,
            y: 60,
            w: 20,
            h: 20,
            fixedOn:'index_frame1'
        },function(ret,err){
        	bMap.close();
			bMap.getLocation({
                accuracy: '10m',
                autoStop: true,
                filter: 1
	        }, function(ret, err){
	        	 bMap.close();
	             if (ret.status) {
			    	user_lon = ret.lon;               //数字类型；经度
	    			user_lat = ret.lat;                //数字类型；纬度
	    			
	    			UserNameFromCoords(user_lon,user_lat);
	    			
			    }
	        });
	    });    
	        
		
	}
	//save_getLocation
	//根据经纬度获取城市
	function UserNameFromCoords(lons,lats){
		map = api.require('bMap');
		map.getNameFromCoords({
		    lon: lons,
		    lat: lats
		}, function(ret, err) {  
		    if (ret.status) {
		    
		    	var user_id = _getStorage('userinfo').user_id;
		    	var UserLon = ret.lon;
		    	var UserLat = ret.lat;
		    	var UserDddress = ret.address;
		    	
		    	
				_ajax(serverUrl+ 'jingyi.php/Home/Index/addguiji',"post", {
				
					values : {
					
							user_id : user_id,
							lon : UserLon,
							lat : UserLat,
							address : UserDddress,
					}
					
				}, "json", function(ret) { 
				
					if(ret.code == 200){
					
						var data = ret.data;
						var msgData = '';
						
					}else if(ret.code == 202){
						_toast('上传足迹失败！');
					}else{
						_toast('上传足迹失败,网络连接失败，请检查你的网络连接！');
					}
				
				});
		    	
		    	
		    }
		});
	}


//日期选择器
function UIActionSelector(frameName,_call){

	var UIActionSelector = api.require('UIActionSelector');
	UIActionSelector.open({
	    datas: 'widget://res/date.json',
	    layout: {
	        row: 4,
	        col: 3,
	        height: 30,
	        size: 16,
	        sizeActive: 20,
	        rowSpacing: 5,
	        colSpacing: 10,
	        maskBg: 'rgba(0,0,0,0.2)',
	        bg: '#fff',
	        color: '#999999',
	        colorActive: '#f00',
	        colorSelected: '#f00'
	    },
	    animation: true,
	    cancel: {
	        text: '取消',
	        size: 12,
	        w: 90,
	        h: 35,
	        bg: '#fff',
	        bgActive: '#ccc',
	        color: '#888',
	        colorActive: '#fff'
	    },
	    ok: {
	        text: '确定',
	        size: 12,
	        w: 90,
	        h: 35,
	        bg: '#fff',
	        bgActive: '#ccc',
	        color: '#888',
	        colorActive: '#fff'
	    },
	    title: {
	        text: '选择日期',
	        size: 14,
	        h: 44,
	        bg: '#eee',
	        color: '#333'
	    },
	    fixedOn: frameName
	}, function(ret, err) {
	    
    	if ( typeof _call == "function") {
			_call(ret);
		}
	    
	});
	
}

//===================================================融云=============

/////////////////////////===================================================================

var  rong = null, userJson = _getStorage('userinfo').user_id, userss = [],conversationType = [],  users = [], isFirst = true,ajpush = true,UIScrollPicture = null;


	// ~~~~~~~~~~~~~~~~~~~~~~融云对象方法 BEGIN~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		// 4.0 消息监听器，负责监听所有的消息
		function rong_onMsgListener() {
			var rong = api.require('rongCloud2');
			rong.setOnReceiveMessageListener(function(ret, err) {
			
				var senderUserId = ret.result.message.senderUserId;
				var text = setLastMsgText(ret.result.message);
				var targetId = ret.result.message.targetId;
				
				var indexConversationType = ret.result.message.conversationType;
				
				
					//insertNewData(ret.result.message);
					if(indexConversationType == "GROUP"){
						rong_xiangmugetTotalUnreadCount(targetId);
					}
					// 4.1 广播接收到消息了
					_sendEvent("receivedMsg", ret.result.message);
					// 判断是否首次获取，避免重复插入
					if (!isFirst) {
						// 发送者ID
						var rongID = ret.result.message.senderUserId;
						// 判断是否是单聊
						if (ret.result.message.conversationType == "PRIVATE") {
							rongID = ret.result.message.senderUserId;
						}else if (ret.result.message.conversationType == "GROUP") {// 判断是否是群聊
							rongID = ret.result.message.targetId;
							
						}
						
						// 判断该会话是否存在了，如果存在就上移并更新数据
						if ($("#msglist ul li[data-targetId='" + rongID + "']").size() > 0) {
							var $newMsg = $("#msglist ul li[data-targetId='" + rongID + "']");
							$newMsg.find(".msgnr").text(setLastMsgText(ret.result.message, false));
							$newMsg.find(".btime").text(_formatDate(ret.result.message.receivedTime));
							var $clone = $newMsg.clone();
							// 移除
							$newMsg.remove();
							// 在第一次插入
							$('#msglist ul').prepend($clone);
						} else {
							// 插入新的
							var msgObj = ret.result.message;
							
							
							getUserByID(rongID, msgObj);
						}
					}
					if (!isFirst) {
						// 状态栏提醒
						api.notification({
							vibrate : [300, 500],
							sound : 'default',
							light : false,
							notify : {
								title : '您有新消息',
								content : ret.result.message.content.text != undefined ? ret.result.message.content.text : "",
								updateCurrent : false,
								extra : JSON.stringify(ret.result.message)
							}
						}, function(ret, err) {
						});
					}
				
				
				//推送状态栏
				
				
				selectName(senderUserId,text,ret.result.message,ret.result.message.conversationType,targetId);
				
				// 之前调用 init 和 connect 的代码省略
				getUnreadCount(ret.result.message.targetId,indexConversationType);
				rong_getTotalUnreadCount();
				
				/*if(isFirst){
					rong_getConversationList();
				}else{
					getMessageList(ret.result);
					insertNewData(ret.result.message);//写入信息消息
					
				}*/
				
				//getMessageList(ret.result);
				//insertNewData(ret.result.message);//写入信息消息
				
				
			})
		}
		
		// 根据主键获取一个用户ID
		function getUserByID(userid, msgObj) {
			_ajax(window.serverUrl + "liao/GetUserByID/uid/" + userid, "get", {
			}, "json", function(ret) {
				msgObj.chatId = msgObj.senderUserId;
				msgObj.chatInfo = ret;
				msgObj.latestMessage = msgObj.content;
				msgObj.sentTime = msgObj.receivedTime;
				var _arr = [];
				_arr.push(msgObj);
				var interText = doT.template($("#msglistTpl").text());
				$("#msglist ul").prepend(interText(_arr));
			});
		}
		
		//获取来自某用户（某会话）的未读消息数
		function getUnreadCount(senderUserId,conversationType){
			var rong = api.require('rongCloud2');
			rong.getUnreadCount({
			    conversationType: conversationType,
			    targetId: senderUserId
			}, function(ret, err) {
				var resultCount = ret.result;
			  	
			    _sendEvent('getUnreadCount',{resultCount : resultCount,senderUserId : senderUserId});
			    
			})
		}
		
		//获取当前用户信息
		function selectName(senderUserId,content,message,conversationType,targetId){
	    	var userinfo = _getStorage('userinfo').user_id;
	  
			api.ajax({
			    url: serverUrl+'jingyi.php/Home/Jymember/udetailByid',
			    method: 'post',
			    timeout: 60,
			    dataType: 'json',
			    charset: 'utf-8',
			    report: true,
			    data: {
			     	values: { 
		            	user_id:senderUserId, 
		        	},
		
			    },
			},function(ret, err){
			
				var data = ret.body;
				
				/*if(content == '[语音消息]'){ 
					
					var audioPath = message.content.voicePath; //语音路径
					
					var duration = message.content.duration; //语音时间
					
					var newDuration = 1000 * duration + 5000;  
					
					//alert(JSON.stringify(message.content));
					//speechRecognizer(audioPath)
					
					setTimeout(function() { 
						// 开始播放
						api.startPlay({
							path : audioPath
						}, function() {
							
						});
						
					},newDuration);
									
						
					
					
					//speechs('好友：'+data.name+'发来消息，消息内容是：'+content,audioPath)
					
				}else if(content == '[位置消息]'){
				
					var poi = message.content.poi;
					speech('好友：'+data.name+'发来消息，消息内容,位置是：'+poi);
					
				}else{
				
					speech('好友：'+data.name+'发来消息，消息内容是：'+content);
					
				}*/
				
				
			    if (data.status == 200 ) {
			       
					// 状态栏提醒
					api.notification({
						vibrate : [300, 500],
						sound : 'default',
						light : false,
						//sound : 'widget://res/msg.wav',
						notify : {
							title : data.name,
							content : content != undefined ? content : "",
							updateCurrent : true,
							extra : data.name+','+senderUserId+','+conversationType+','+targetId,
						}
					}, function(ret, err) {
					
					
					});
				
			    } else {
					_toast('网络连接超时');
			    }
			});
				
	    }
	    
	    

		// 5.0 获取会话列表
		function rong_getConversationList() {
			var rong = api.require('rongCloud2');
			rong.getConversationList(function(ret, err) {
				if (ret) {
					// 渲染列表
					//getMessageList(ret.result);
					showMsgList(ret.result);
				}
			})
		}
		
		// 14、显示列表数据
		function showMsgList(msglist) {
			var user_id = _getStorage('userinfo').user_id;
			if (msglist && msglist.length > 0) {
				for (var i = 0; i < msglist.length; i++) {
					var msgObj = msglist[i];
					msgObj.latestMessage.extra = $api.strToJson(msgObj.latestMessage.extra);
					if (msgObj.conversationType == "PRIVATE") {
						
						// 判断是否只自己发的
						if (user_id == msgObj.senderUserId) {
							// 设置会话ID为targetID
							msgObj.chatId = msgObj.targetId;
							users.push(msgObj.targetId);
						} else {
							// 设置会话ID为targetID
							msgObj.chatId = msgObj.senderUserId;
							// 如果不是自己发的，则设置时间为接收时间
							msgObj.sentTime = msgObj.receivedTime;
							users.push(msgObj.senderUserId);
						}
					}else if (msgObj.conversationType == "GROUP") {// 是否是群
						
						// 设置会话ID为targetID
						msgObj.chatId = msgObj.targetId;
						users.push(msgObj.targetId);
					}
					
					//api.alert({ msg: JSON.stringify(users.toString()) });
					//api.alert({ msg: JSON.stringify(msglist) });
					// 获取用户会话信息
					getUsersInfo(users.toString(), msglist);
				}
				
			} else {
				api.refreshHeaderLoadDone();
			}
		}
		
		
		// 获取一组用户信息----
		function getUsersInfo(ids, msglist) {
			_ajax(window.serverUrl + "jingyi.php/Home/index/GetUsersInfo/ids/" + ids, "get", {
			}, "json", function(ret) {
				for (var i = 0; i < msglist.length; i++) {
					var msgObj = msglist[i];
					// 查询用户信息
					if(ret[i].conversationType == 'GROUP'){
						var query = Enumerable.From(ret).Where("$.touid==" + msgObj.chatId).ToArray();
					}else{
						var query = Enumerable.From(ret).Where("$.userid==" + msgObj.chatId).ToArray();
					}
					
					// 追加新属性
					msgObj.chatInfo = query[0];
				}
				
				var interText = doT.template($("#msglistTpl").text());
				$("#msglist ul").html(interText(msglist));
				// 设置不是首次获取数据了
				isFirst = false;
				api.hideProgress();
				api.refreshHeaderLoadDone();
			});
		}

		// 3、融云初始化并连接监听
		function rong_init() {
			// 初始化融云
			// 3.1
			var rong = api.require('rongCloud2');
			rong.init(function(ret, err) {
				if (ret.status == 'error') {
					_alert(err);
				}
			});
			// 3.2 监听融云连接状态
			// 监听连接状态
			//CONNECTED // 连接成功
			//CONNECTING // 连接中
			//DISCONNECTED // 断开连接
			//KICKED // 用户账户在其他设备登录，本机会被踢掉线
			//NETWORK_UNAVAILABLE // 网络不可用
			//SERVER_INVALID // 服务器异常或无法连接
			//TOKEN_INCORRECT // Token 不正确
			rong.setConnectionStatusListener(function(ret, err) {
				var statuMsg = "";
				var rong_statu = ret.result.connectionStatus;
				switch(rong_statu) {
					case "CONNECTED":
						statuMsg = "加载成功";
						
						break;
					case "CONNECTING":
						statuMsg = "连接中";
						break;
					case "DISCONNECTED":
						statuMsg = "断开连接";
						break;
					case "KICKED":
						statuMsg = "用户账户在其他设备登录，本机会被踢掉线";
						break;
					case "NETWORK_UNAVAILABLE":
						statuMsg = "网络不可用";
						break;
					case "SERVER_INVALID":
						statuMsg = "服务器异常或无法连接";
						break;
					case "TOKEN_INCORRECT":
						statuMsg = "Token 不正确";
						break;
					default:
						statuMsg = "未知错误";
						break;
				}
				_toast(statuMsg);
			});
			
			// 3.3 监听是否有消息进入
			rong_onMsgListener();
			// 3.4.1 连接
			rong_content();
		}

		// 3.4 连接融云
		function rong_content() {
			//var _token = _getStorage("token");alert(_token);
			if(_getStorage("token") != '' || _getStorage("token") != null) {
				rong.connect({
					token : _getStorage("token")
				}, function(ret, err) {
					if (ret.status == 'success') {
						
						// 获取会话列表
						rong_getConversationList();
						
						/*rong.getConversationList(function (ret, err) {api.alert({ msg: JSON.stringify(ret) });
                			//将获得的数据插入到容器中
                            //insertData(ret.result);
                        })*/
                        
					} else {
						_toast('网络连接失败，请检查网络');
					}
				});
			}
		}

		// 6.0 统一发送消息接口
		// @msgType：消息类型，文字，图片，语言，地图，天气
		// @conversationType：会话类型，单聊（PRIVATE），讨论组（DISCUSSION），群组（GROUP），聊天室（CHATROOM），客服（CUSTOMER_SERVICE），（SYSTEM）
		// @targetId：接受方ID，可以是用户 Id、讨论组 Id、群组 Id 或聊天室 Id
		// @content：发送内容
		// @extra：用户自定义数据,一般extra是用户+token组装的json字符串
		function rong_sendMsg(msgType, conversationType, targetId, content, extra) {
			var rong = api.require('rongCloud2');
			switch(msgType) {
				// 发送文字消息
				case "text":
					rong.sendTextMessage({
						conversationType : conversationType,
						targetId : targetId,
						text : content,
						extra : extra
					}, function(ret, err) {
						if (ret.status == 'prepare') {
							// 存储当前发送信息
							_setStorage((ret.result.message.messageId).toString(), ret);
							// 广播消息，发送准备中
							_sendEvent("sendMsgPrepare", ret.result.message);
						} else if (ret.status == 'success') {
							// 广播消息，发送成功
							_sendEvent("sendMsgSuccess", ret.result.message);
							// 设置发送会话
							sendMsgSuccessEnd(_getStorage((ret.result.message.messageId).toString()));
						} else if (ret.status == 'error') {
							// 广播消息，发送失败
							_sendEvent("sendMsgError", {
								errcode : err.code,
								messageId : ret.result.message.messageId
							});
						}
					});
					break;
				// 发送语音
				case "voice": 
					rong.sendVoiceMessage({
						conversationType : conversationType.toString(),
						targetId : targetId.toString(),
						voicePath : content.toString(),
						duration : extra,
						extra : extra.toString()
					}, function(ret, err) {
						if (ret.status == 'prepare') {
							// 存储当前发送信息
							_setStorage((ret.result.message.messageId).toString(), ret);
							// 广播消息，发送准备中
							_sendEvent("sendMsgPrepare", ret.result.message);
						} else if (ret.status == 'success') {
							// 广播消息，发送成功
							_sendEvent("sendMsgSuccess", ret.result.message);
							// 设置发送会话
							sendMsgSuccessEnd(_getStorage((ret.result.message.messageId).toString()));
						} else if (ret.status == 'error') {
							// 广播消息，发送失败
							_sendEvent("sendMsgError", {
								errcode : err.code,
								messageId : ret.result.message.messageId
							});
						}
					});
					break;
				// 发送图片
				case "image":
					rong.sendImageMessage({
						conversationType : conversationType,
						targetId : targetId,
						imagePath : content,
						extra : extra
					}, function(ret, err) {
						if (ret.status == 'prepare') {
							// 存储当前发送信息
							_setStorage((ret.result.message.messageId).toString(), ret);
							// 广播消息，发送准备中
							_sendEvent("sendMsgPrepare", ret.result.message);
						} else if (ret.status == 'progress') {
							// 广播消息，发送过程中
							_sendEvent("sendMsgProgress", ret.result.progress);
						} else if (ret.status == 'success') {
							// 广播消息，发送成功
							_sendEvent("sendMsgSuccess", ret.result.message);
							// 设置发送会话
							sendMsgSuccessEnd(_getStorage((ret.result.message.messageId).toString()));
						} else if (ret.status == 'error') {
							// 广播消息，发送失败
							_sendEvent("sendMsgError", {
								errcode : err.code,
								messageId : ret.result.message.messageId
							});
						}
					});
					break;
				// 发送图文
				case "richmsg":
					rong.sendRichContentMessage({
						conversationType : conversationType,
						targetId : targetId,
						title : extra.title,
						description : extra.description,
						imageUrl : content,
						extra : extra
					}, function(ret, err) {
						if (ret.status == 'prepare') {
							// 存储当前发送信息
							_setStorage((ret.result.message.messageId).toString(), ret);
							// 广播消息，发送准备中
							_sendEvent("sendMsgPrepare", ret.result.message);
						} else if (ret.status == 'success') {
							// 广播消息，发送成功
							_sendEvent("sendMsgSuccess", ret.result.message);
							// 设置发送会话
							sendMsgSuccessEnd(_getStorage((ret.result.message.messageId).toString()));
						} else if (ret.status == 'error') {
							// 广播消息，发送失败
							_sendEvent("sendMsgError", {
								errcode : err.code,
								messageId : ret.result.message.messageId
							});
						}
					});
					break;
				// 发送位置信息
				case "location":
				
				
					download();
				
					rong.sendLocationMessage({
						conversationType : conversationType,
						targetId : targetId,
						latitude : extra.lat,
						longitude : extra.lon,
						poi : extra.address,
						imagePath : 'fs:///locationtmp/location.jpg',
						extra : ''

					}, function(ret, err) {
						if (ret.status == 'prepare') {
							// 存储当前发送信息
							_setStorage((ret.result.message.messageId).toString(), ret);
							// 广播消息，发送准备中
							_sendEvent("sendMsgPrepare", ret.result.message);
						} else if (ret.status == 'progress') {
							// 广播消息，发送过程中
							_sendEvent("sendMsgProgress", ret.result.progress);
						} else if (ret.status == 'success') {
							// 广播消息，发送成功
							_sendEvent("sendMsgSuccess", ret.result.message);
							// 设置发送会话
							sendMsgSuccessEnd(_getStorage((ret.result.message.messageId).toString()));
						} else if (ret.status == 'error') {
						
							// 广播消息，发送失败
							_sendEvent("sendMsgError", {
								errcode : err.code,
								messageId : ret.result.message.messageId
							});
						}
					});
					break;
				// 发送命令消息（自定义消息)
				case "cmd":
					rong.sendCommandNotificationMessage({
						conversationType : conversationType,
						targetId : targetId,
						name : extra.name,
						data : extra
					}, function(ret, err) {
						if (ret.status == 'prepare') {
							// 存储当前发送信息
							_setStorage((ret.result.message.messageId).toString(), ret);
							// 广播消息，发送准备中
							_sendEvent("sendMsgPrepare", ret.result.message);
						} else if (ret.status == 'success') {
							// 广播消息，发送成功
							_sendEvent("sendMsgSuccess", ret.result.message);
							// 设置发送会话
							sendMsgSuccessEnd(_getStorage((ret.result.message.messageId).toString()));
						} else if (ret.status == 'error') {
							// 广播消息，发送失败
							_sendEvent("sendMsgError", {
								errcode : err.code,
								messageId : ret.result.message.messageId
							});
						}
					});
					break;
				default:
					break;
			}
		}

		// 7.0  获取最新消息记录
		// @conversationType：会话类型，单聊（PRIVATE），讨论组（DISCUSSION），群组（GROUP），聊天室（CHATROOM），客服（CUSTOMER_SERVICE），（SYSTEM）
		// @targetId：接受方ID，可以是用户 Id、讨论组 Id、群组 Id 或聊天室 Id
		function rong_getLatestMessages(conversationType, targetId) {
			var rong = api.require('rongCloud2');
			rong.getLatestMessages({
				conversationType : conversationType,
				targetId : targetId,
				count : 50
			}, function(ret, err) {
				// 广播事件，通知成功获取到数据
				_sendEvent("getNewMsgEnd", ret.result);
			})
		}

		// 16、 获取历史纪录
		// @conversationType：会话类型，单聊（PRIVATE），讨论组（DISCUSSION），群组（GROUP），聊天室（CHATROOM），客服（CUSTOMER_SERVICE），（SYSTEM）
		// @targetId：接受方ID，可以是用户 Id、讨论组 Id、群组 Id 或聊天室 Id
		// @oldestMessageId：最后消息id
		function rong_getHistoryMessages(conversationType, targetId, oldestMessageId) {
			var rong = api.require('rongCloud2');
			var count = 50;
			rong.getHistoryMessages({
				conversationType : 'PRIVATE',
				targetId : targetId,
				oldestMessageId : oldestMessageId,
				count : count,
			}, function(ret, err) {
				// 广播事件，通知成功获取到数据
				_sendEvent("getHistoryMsgEnd", ret.result);
			})
		}
		
		// 17、 获取历史纪录
		// @conversationType：会话类型，单聊（PRIVATE），讨论组（DISCUSSION），群组（GROUP），聊天室（CHATROOM），客服（CUSTOMER_SERVICE），（SYSTEM）
		// @targetId：接受方ID，可以是用户 Id、讨论组 Id、群组 Id 或聊天室 Id
		// @oldestMessageId：最后消息id
		function getHistoryMessages(conversationType, targetId) {
			var rong = api.require('rongCloud2');
			var count = 50;
			rong.getHistoryMessages({
				conversationType : conversationType,
				targetId : targetId,
				oldestMessageId : -1,
				count : count,
			}, function(ret, err) {
				// 广播事件，通知成功获取到数据
				_sendEvent("getHistoryMsgEnds", ret.result);
			})
		}


		// 20、退出登录
		function rong_logout() {
			var rong = api.require('rongCloud2');
			rong.logout(function(ret, err) {
				if (ret.status == 'error') {
					_alert(err);
				}
			});
		}

		// 22 断开连接
		function rong_disconnect() {
			var rong = api.require('rongCloud2');
			rong.disconnect(false);
		}

		// 23 加入群
		function rong_joinGroup(groupId, groupName) {
			var rong = api.require('rongCloud2');
			rong.joinGroup({
				groupId : groupId,
				groupName : groupName
			}, function(ret, err) {
				if (ret.status == 'success') {
					// 广播成功加入群事件
					_sendEvent("joinGroupSuccess");
				} else {
					// 广播加入群失败
					_sendEvent("joinGroupError");
				}
			})
		}

		

		// 25 退出群
		function rong_quitGroup(groupId) {
			var rong = api.require('rongCloud2');
			rong.quitGroup({
				groupId : groupId
			}, function(ret, err) {
				if (ret.status == 'success') {
					// 退出群
					_sendEvent("quitGroupSuccess");
				} else {
					// 删除会话成功
					_sendEvent("quitGroupError");
				}
			})
		}

		// 清除会话未读数
		function rong_clearMessagesUnreadStatus(conversationType, targetId) {
			var rong = api.require('rongCloud2');
			rong.clearMessagesUnreadStatus({
				conversationType : conversationType,
				targetId : targetId
			}, function(ret, err) {
			})
		}
		
		
		// 同步群组到融云
		function rong_syncGroup(groupId, groupName,portraitUrl) {
			var rong = api.require('rongCloud2');
			rong.syncGroup({
			    groups: [{
			        groupId: groupId,
			        groupName: groupName,
			        portraitUrl: window.ImgsUrl+portraitUrl
			    }]
			}, function(ret, err) {
			    if (ret.status == 'success'){
			       	_toast('创建成功！');
					_openWin('qun_win', '../html/tongxunlu/qun_win.html');
			    }else{
			       _toast('添加群失败');
			    }
			})
		}


		// 获取单聊未读消息
		function rong_getTotalUnreadCount() {
			var rong = api.require('rongCloud2');
			rong.getUnreadCountByConversationTypes({
			    conversationTypes: ['PRIVATE','GROUP','CUSTOMER_SERVICE','SYSTEM']
			}, function(ret, err) {
			    if (typeof(ret.result) == "undefined" || ret.result == "" || ret.result == '' || ret.result == null) { 
				   var result = 0;
				}else{
					var result = ret.result;
				}  
				
				api.sendEvent({
				    name: 'resultCount',
				    extra: {
				        resultCount: result,
				    }
				});

				api.setAppIconBadge({
				    badge: result
				});  
				
				$("#countM").html(result);
			})
		}
		
		
		// 获取项目未读消息
		function rong_xiangmugetTotalUnreadCount(group_id) {
			var rong = api.require('rongCloud2');
			rong.getUnreadCount({
			    conversationType: 'GROUP',
			    targetId : group_id,
			}, function(ret, err) {
			    if (typeof(ret.result) == "undefined" || ret.result == "" || ret.result == '' || ret.result == null) { 
				   var resultcount = 0;
				}else{
					var resultcount = ret.result;
				}  
				api.setAppIconBadge({
				    badge: resultcount
				}); 
				
				api.sendEvent({
				    name: 'xiangmugetresultCount',
				    extra: {
				        resultCount: {group_id : group_id, Count : resultcount},
				    }
				});
				
			})
		}
		
		/* rong.getUnreadCountByConversationTypes({
		    conversationTypes: ['PRIVATE']
		}, function(ret, err) {
		    api.toast({ msg: ret.result });
		})
		
		 //获取消息
	   function getTotalUnreadCount(){
			// 之前调用 init 和 connect 的代码省略
			rong.getTotalUnreadCount(function(ret, err) {
			    alert(ret.result);
			})
	    
	    }*/

		// ~~~~~~~~~~~~~~~~~~~~~~融云对象方法 END  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
		
		

		

		// 设置最后消息文本
		function setLastMsgText(msgObj, isConversationList) {
			// 获取消息类型
			var objectName = msgObj.objectName;
			var returnMsg = "";
			
			
			switch(objectName) {
				// 文本类型
				case "RC:TxtMsg":
					if (isConversationList) {
						returnMsg = msgObj.latestMessage.text;
					} else {
						returnMsg = msgObj.content.text;
					}
					break;
				// 语音类型
				case "RC:VcMsg":
					returnMsg = "[语音消息]";
					break;
				// 图片消息
				case "RC:ImgMsg":
					returnMsg = "[图片消息]";
					break;
				// 位置消息
				case "RC:LBSMsg":
					returnMsg = "[位置消息]";
					break;
			}
			
			
			return returnMsg;
		}

		// 融云发送信息成功后更新会话
		function sendMsgSuccessEnd(ret) {
			// 接收者ID
			var targetId = ret.result.message.targetId;
			// 判断该会话是否存在了，如果存在就上移并更新数据
			if ($("#msglist ul li[data-targetId='" + targetId + "']").size() > 0) {
				var $newMsg = $("#msglist ul li[data-targetId='" + targetId + "']");
				$newMsg.find(".msgnr").text(setLastMsgText(ret.result.message, false));
				var $clone = $newMsg.clone();
				// 移除
				$newMsg.remove();
				// 在第一次插入
				$('#msglist ul').prepend($clone);
			} else {
				// 插入新的
				var msgObj = ret.result.message;
				getUserByID(targetId, msgObj);
			}
			// 移除消息
			_removeStorage((ret.result.message.messageId).toString());
		}
		
		
		
		//保存一张定位图片
		function download(){
	           var fs = api.require('fs');
	           var path = 'fs://locationtmp'; // 手机文件目录
		       var filename = 'location.jpg'; // 图片文件名称
		       // 创建目录
		        fs.createDir({
		            path: path        // 创建文件夹
		        },function( ret, err ){        
		            fs.createFile({
					    path: path+'/'+filename
					});
		        });
	    }
	    
	    
	   


//----------------------------------------------

//获取来自apicloud的会话列表
function getMessageList(ret){
       // 重新加载会话
		//window.location.reload();
        //将获得的数据插入到容器中
     insertData(ret);
     
}


//插入数据
function insertData(data) {

        var msgData='';//初始化
        var myuserid = _getStorage('userinfo').user_id;//从本地数据获取我的用户ID，用来判断发送者是否为本地用户

      	
         
	       for(var i in data){
	       			
	                if(data[i].latestMessage.text && data[i].senderUserId){
	                        //两种情况，1当发送者等于本地用户时 2.当接收者等于本地用户时,只获取接受到的信息，不获取发送的信息
	                        if(data.senderUserId != myuserid){
	                        
	                                //当发送者不等于本地用户时
	                               
	                                
	                                if(data[i].conversationType == 'GROUP'){
	                                	//msgData += '<li id="messageBox_"'+data[i].targetId+'" class="aui-user-view-cell aui-img winu-clear-both winu-min-height" data-conversationType="'+data[i].conversationType+'" data-targetId="'+data[i].targetId+'" data-targetName="'+data[i].username+'">';
										//msgData += '<img class="aui-img-object aui-pull-left" id="photo_'+data[i].targetId+'" src="../../image/logo.png" style="width:48px;height:48px;">';
									}else if(data[i].conversationType == 'PRIVATE'){
										msgData += '<li id="messageBox_"'+data[i].senderUserId+'" class="aui-user-view-cell aui-img winu-clear-both winu-min-height" data-conversationType="'+data[i].conversationType+'" data-targetId="'+data[i].targetId+'" data-targetName="'+data[i].username+'">';
										msgData += '<img class="aui-img-object aui-pull-left" id="userphoto_'+data[i].senderUserId+'" src="../../image/logo.png" style="width:48px;height:48px;">';
									}
									
									msgData += '<div class="aui-img-body">';
									msgData += '<span>';
									
									if(data[i].conversationType == 'GROUP'){
										//msgData += '<span id="nickname_'+data[i].targetId+'">'+data[i].username+'</span>';
										//userss.push(data[i].targetId);
									}else if(data[i].conversationType == 'PRIVATE'){
										msgData += '<span id="nickname_'+data[i].senderUserId+'"></span>';
										
									}
									//alert(JSON.stringify(ret));//targetId
									if(data[i].conversationType == 'GROUP'){
									
									
										//msgData += '<em class="btime" id="messageTime_'+data[i].targetId+'">'+getDateDiff(data[i].receivedTime)+'</em></span>';
										//msgData += '<p class="aui-ellipsis-1 msgnr">';
										//msgData += '<p id="messageText_'+data[i].targetId+'">'+setLastMsgText(data[i],true)+'</span>';
									
									}else if(data[i].conversationType == 'PRIVATE'){
										msgData += '<em class="btime" id="messageTime_'+data[i].senderUserId+'">'+getDateDiff(data[i].receivedTime)+'</em></span>';
										msgData += '<p class="aui-ellipsis-1 msgnr">';
										msgData += '<p id="messageText_'+data[i].senderUserId+'">'+setLastMsgText(data[i],true)+'</span>';
									
										if(data[i].targetId == myuserid){
											userss.push(data[i].senderUserId);
										}else{
											userss.push(data[i].targetId);
										}
									}
									
									
									if(data[i].unreadMessageCount > 0){
										msgData += '<font class="aui-pull-right unread" style="background:red;color:#FFFFFF;"id="messageCount_"'+data[i].senderUserId+'">'+ data[i].unreadMessageCount + '</font>';
									}
									msgData += '</p>';
									msgData += '</div>';
									msgData += '</li>';
	                                
	                                
	                                
	                                conversationType.push(data[i].conversationType);
	                                
	                                
	                                isFirst = false;
	                        }
	                        
	                }
	        }
	       
	         $("#conversationList ul").append(msgData);
        	
	       	getUserInfos(userss);
	        
	        newMessage();//我的监听最新消息事件是从这里开始的，当会话列表全部处理完成后再开始监听最新消息*/
	       
        
}


/*//监听消息
function newMessage(){
        var mytoken = _getStorage("token");

        rong.init(function(ret, err){
                //alert(ret.status);
        });
        rong.setOnReceiveMessageListener(function (ret, err) {
                insertNewData(ret.result.message);//写入信息消息
        })
        rong.connect({
                    token: mytoken
            },function(ret, err){
            
            	
            
            }
        );
}*/



function insertNewData(data){
		
        var myuserid = _getStorage('userinfo').user_id;
        var senderUserId = data.senderUserId;
        //判断是否存在当前发送者的会话
        
        if(data.conversationType == 'GROUP'){
        	//var messageInfo = $("#messageBox_"+targetId);
        }else if(data.conversationType == 'PRIVATE'){
        	var messageInfo = $("#messageBox_"+senderUserId);
        }
        
        
       
        
        if(messageInfo){
        	if(data.conversationType == 'GROUP'){
        		 //如果存在更新发送时间及内容
               // var msgId = data.messageId;
               // $("#messageTime_"+targetId).html(getDateDiff(data.sentTime));
               // $("#messageText_"+targetId).html(setLastMsgText(data));
        	}else if(data.conversationType == 'PRIVATE'){
                //如果存在更新发送时间及内容
                var msgId = data.messageId;
                $("#messageTime_"+senderUserId).html(getDateDiff(data.sentTime));
                $("#messageText_"+senderUserId).html(setLastMsgText(data));
            }
              
               
        }else{
                //不存在插入
                var msgData = "";
                if(data.senderUserId != myuserid){
                        //当发送者不等于本地用户时
                      	if(data[i].conversationType == 'GROUP'){
							//msgData += '<li id="messageBox_"'+data[i].targetId+'" class="aui-user-view-cell aui-img winu-clear-both winu-min-height" data-conversationType="'+data[i].conversationType+'" data-targetId="'+data[i].targetId+'" data-targetName="'+data[i].username+'">';
							//msgData += '<img onclick="openUserszl('+data[i].senderUserId+')" class="aui-img-object aui-pull-left" id="photo_'+data[i].targetId+'" src="../../image/logo.png" style="width:48px;height:48px;">';
						}else if(data[i].conversationType == 'PRIVATE'){
							msgData += '<li id="messageBox_"'+data[i].senderUserId+'" class="aui-user-view-cell aui-img winu-clear-both winu-min-height" data-conversationType="'+data[i].conversationType+'" data-targetId="'+data[i].targetId+'" data-targetName="'+data[i].username+'">';
							msgData += '<img onclick="openUserszl('+data[i].senderUserId+')" class="aui-img-object aui-pull-left" id="userphoto_'+data[i].senderUserId+'" src="../../image/logo.png" style="width:48px;height:48px;">';
						}
						
						
						
						msgData += '<div class="aui-img-body">';
						msgData += '<span>';
						
						if(data[i].conversationType == 'GROUP'){
							//msgData += '<span id="nickname_'+data[i].targetId+'">'+data[i].username+'</span>';
							//msgData += '<em class="btime" id="messageTime_'+data[i].targetId+'">'+getDateDiff(data[i].receivedTime)+'</em></span>';
							//msgData += '<p class="aui-ellipsis-1 msgnr">';
							//msgData += '<p id="messageText_'+data[i].targetId+'">'+setLastMsgText(data[i],true)+'</span>';
						
							//userss.push(data[i].targetId);
						}else if(data[i].conversationType == 'PRIVATE'){
							msgData += '<span id="nickname_'+data[i].senderUserId+'"></span>';
							msgData += '<em class="btime" id="messageTime_'+data[i].senderUserId+'">'+getDateDiff(data[i].receivedTime)+'</em></span>';
							msgData += '<p class="aui-ellipsis-1 msgnr">';
							msgData += '<p id="messageText_'+data[i].senderUserId+'">'+setLastMsgText(data[i],true)+'</span>';
						
							userss.push(data[i].targetId);
						}
						
						
						
						
						
						
						
						if(data[i].unreadMessageCount > 0){
							msgData += '<font class="aui-pull-right unread" style="background:red;color:#FFFFFF;"id="messageCount_"'+data[i].senderUserId+'">'+ data[i].unreadMessageCount + '</font>';
						}
						msgData += '</p>';
						msgData += '</div>';
						msgData += '</li>';
                        
                        $("#conversationList").prepend(msgData);
                        getUserInfo(data.senderUserId);
                        
                    isFirst = false;    
                }
        }
        
        
        api.refreshHeaderLoadDone();
}



/*function getUserInfos(idss){
       
       var ids = idss.toString();
        
		var usersDatas;
        
   		_ajax(window.serverUrl + "jingyi.php/Home/index/GetUsersInfo/ids/" + ids+'/type/'+conversationType, "get", {
   		
		}, "json", function(ret) {
		
		
			if(ret){
				
              	for(var d in ret){
                        $("#userphoto_"+ret[d].userid).attr("src",ImgsUrl+ret[d].userphoto);
                        $("#photo_"+ret[d].userid).attr("src",ImgsUrl+ret[d].photo);
                        $("#nickname_"+ret[d].userid).html(ret[d].username);
                }
            }
            
			
		});
        
            
}*/
//处理时间戳
function getDateDiff(dateTimeStamp){
        var minute = 1000 * 60;
        var hour = minute * 60;
        var day = hour * 24;
        var halfamonth = day * 15;
        var month = day * 30;
        var now = new Date().getTime();
        var diffValue = now - dateTimeStamp;
        if(diffValue < 0){
                //若日期不符则弹出窗口告之
                //alert("结束日期不能小于开始日期！");
        }
        var monthC =diffValue/month;
        var weekC =diffValue/(7*day);
        var dayC =diffValue/day;
        var hourC =diffValue/hour;
        var minC =diffValue/minute;
        if(monthC>=1){
                result= parseInt(monthC) + "个月前";
        }else if(weekC>=1){
                result=parseInt(weekC) + "周前";
        }else if(dayC>=1){
                result=parseInt(dayC) +"天前";
        }else if(hourC>=1){
                result= parseInt(hourC) +"个小时前";
        }else if(minC>=1){
                result=parseInt(minC) +"分钟前";
        }else{
                result="刚刚";
        }
        return result;
}

//定位用户当前位置
function save_getLocation(){
	var bMap = api.require('bMap');
	
		bMap.getLocation({
                accuracy: '10m',
                autoStop: true,
                filter: 1
        }, function(ret, err){
           
			var _lons = ret.lon;
	       	var _lats = ret.lat;
	       	
	       	
	       	saveLonLats(_lons,_lats);
		   
        });

	
		
	
}

//更新用户经纬度
function saveLonLats(_lon,_lat){
	var user_id = _getStorage('userinfo').user_id;
	_ajax(serverUrl+ 'jingyi.php/Home/Jymember/updlonAndlat',"post", {
		values : {
				user_id : user_id,
				lon : _lon,
				lat : _lat,
		}		
	}, "json", function(ret) {  
		
		   //api.alert({ msg: JSON.stringify(ret) });
		
	});
}


//打开聊天历史记录按钮
function UIButton(targetId,conversationType,frameName){
	var button = api.require('UIButton');
	button.open({
	    rect: {
	        x: 20,
	        y: 100,
	        w: 40,
	        h: 40
	    },
	    corner: 5,
	    bg: {
	        normal: '#03a9f4',
	        highlight: '#03a9f4',
	        active: '#03a9f4'
	    },
	    title: {
	        size: 14,
	        highlight: '记录',
	        active: '记录',
	        normal: '记录',
	        highlightColor: '#fff',
	        activeColor: '#fff',
	        normalColor: '#fff',
	        alignment: 'center'
	    },
	    fixedOn: frameName,
	    fixed: true,
	    move: true
	}, function(ret, err) {
	    if (ret) {
	    	if(ret.eventType == 'click'){
	    		_openWin('messages_win','../tongxunlu/messages_win.html',{targetId : targetId,conversationType : conversationType});
	    	}
	    }
	});

}


//收藏
function addShoucang(id,f_type){
	_showProgress('收藏中','请等待...');
	_ajax(window.serverUrl+ 'jingyi.php/Home/Collection/collection',"post", {
		
		values : {
				user_id : _getStorage('userinfo').user_id,
				f_id : id,
				f_type : f_type,
		}
		
	}, "json", function(ret) {
		// 隐藏加载
		api.hideProgress();
		if(ret.code == 200){
		
			_toast('收藏成功！');
			return false;
			
		}else if(ret.code == 202){
			_toast('收藏失败！');
			return false;
			
		}else if(ret.code == 203){
			
			_toast('已收藏过了，无需重复收藏了！');
			return false;
		
		}else{
		
			_toast('网络连接失败，请检查网络！');
			return false;
			
		}
	});
}


//一键添加好友按钮
function UIButtonAddUser(user_id,id,frameName,frameNameW){
	var button = api.require('UIButton');
	button.open({
	    rect: {
	        x: frameNameW - 110,
	        y: 100,
	        w: 100,
	        h: 40
	    },
	    corner: 5,
	    bg: {
	        normal: '#03a9f4',
	        highlight: '#03a9f4',
	        active: '#03a9f4'
	    },
	    title: {
	        size: 14,
	        highlight: '一键添加好友',
	        active: '一键添加好友',
	        normal: '一键添加好友',
	        highlightColor: '#fff',
	        activeColor: '#fff',
	        normalColor: '#fff',
	        alignment: 'center'
	    },
	    fixedOn: frameName,
	    fixed: true,
	    move: true
	}, function(ret, err) {
	    if (ret) {
	    	if(ret.eventType == 'click'){
	    		
	    		api.confirm({
				    title: '系统提示',
				    msg: '确定要继续执行一键添加好友吗？',
				    buttons: ['确定', '取消']
				}, function(ret, err) {
				    var index = ret.buttonIndex;
				    
				    if(index == 1){
				    	_showProgress('添加中','请稍等...');
				    	_ajax(window.serverUrl+ 'jingyi.php/Home/Index/morefriendfree',"post", {
							values : {
									thisuid : user_id,
									p_id : id,
							}		
						}, "json", function(ret) {  
							api.hideProgress();
							if(ret.code == 200){
							   _toast('添加成功了！');
							}else{
								_toast('网络连接超时，请检查网络是否连接');
								return false;
							}
							
						});
				    }
				});
	    	}
	    }
	});

}
