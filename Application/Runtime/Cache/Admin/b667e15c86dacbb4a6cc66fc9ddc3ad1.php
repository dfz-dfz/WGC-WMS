<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>我的项目-新建维修项目</title>
    <link rel="stylesheet" type="text/css" href="/Public/admin/apicloud/api.css"/>
    <!--拓展AUI字体图标-->
	<link rel="stylesheet" type="text/css" href="/Public/admin/apicloud/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/apicloud/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/apicloud/aui.1.0.css" />
    <style>
    	body{
    		background:#FFFFFF;
    	}
    	.aui-list-item-input{
    		background:#FFFFFF;
    		padding-top: 11px !important;
    	}
    	
    </style>
</head>
<body>
	<div class="aui-content aui-margin-b-15">
        <ul class="aui-list aui-form-list">
			<li>
				<div class="aui-content-padded" style="width:75%;margin:0 auto;padding-top:1.0rem;padding-buttom:1.0rem" onclick="check()">
				  <div class="aui-btn aui-btn-danger aui-btn-block" >确定发布</div>
			    </div>
			</li>
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">项目管理员：</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="请输入手机号码" id="manageman">
                    </div>
                </div>
            </li>
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">维修名称：</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="维修名称" id="prj_name">
                    </div>
                </div>
            </li>
            <li class="aui-list-item">
                <div class="aui-list-item-inner"onclick="FromName()">
                    <div class="aui-list-item-label">地址：</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="地址"id="address">
                    </div>
             
                </div>
            </li>
            
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">开工时间：</div>
                    <div class="aui-list-item-input">
						<input type="text" placeholder="开工时间" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd',minDate:'2016-01-01',maxDate:'2050-12-31'})" id="start_time"  />
					</div>
                </div>
            </li>
            
           
            
            
            <!--<li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">工期：</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="工期"id="finish_time">
                    </div>
                </div>
            </li>-->
            
            
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">维修造价：</div>
                    <div class="aui-list-item-input">
                    	<input type="hidden" placeholder="工期" value="1" id="finish_time">
                        <input type="text" placeholder="10"id="pre_price"style="width: 200px;float:left"><span style="margin-top: 15px;float:left">元</span>
                    </div>
                </div>
            </li>
            
        </ul>
        
        
       
        <div class="aui-form"style="border-bottom: 1px solid #c8c7cc;">
           
            
            <div class="aui-input-row">
               	<i class="aui-input-addon  aui-iconfont aui-icon">备注:</i>
                <textarea id="prj_desc"class="aui-input" placeholder="请填写备注内容"></textarea>
            </div>
           
           	<!--<div class="aui-input-row  winu-center-all winu-clear-both winu-min-height winu-width-100">
				<div class="user-pic winu-border-radius-50 winu-position-relative" id="newphoto" >
					<img class="winu-border-radius-50" id="myphoto" src="/Public/admin/apicloud/add.jpg" onclick="selectPic();" style="margin:5px;max-width:100px;height:100px;"/>
				</div>
			</div>-->
        </div>
        
        
      <!--
		<ul class="aui-list aui-list-in">
            <li class="aui-list-header">
                	公司管理员
            </li>
        </ul>
        <section class="aui-grid">
		    <div class="aui-row">
		        
		        
				<span id="lists_mg"></span>
				
				
				<div class="aui-col-xs-4" id="" onclick="openLiao('1','add')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/add1.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
			
				<div class="aui-col-xs-4" id="" onclick="openLiao('1','del')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/del.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
				
		    </div>
		</section>
        
         <ul class="aui-list aui-list-in">
            <li class="aui-list-header">
                	负责人
            </li>
        </ul>
        <section class="aui-grid">
		    <div class="aui-row">
		     
		     	<span id="lists_cm"></span>
				<div class="aui-col-xs-4" id="" onclick="openLiao('2','add')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/add1.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
			
				<div class="aui-col-xs-4" id="" onclick="openLiao('2','del')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/del.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
				
		    </div>
		</section>
		
		
		
		<ul class="aui-list aui-list-in">
            <li class="aui-list-header">
                	甲方负责人
            </li>
        </ul>
        <section class="aui-grid">
		    <div class="aui-row">
		     
		     	<span id="lists_jl"></span>
				<div class="aui-col-xs-4" id="" onclick="openLiao('3','add')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/add1.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
			
				<div class="aui-col-xs-4" id="" onclick="openLiao('3','del')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/del.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
				
		    </div>
		</section>
		
		
		<ul class="aui-list aui-list-in">
            <li class="aui-list-header">
                	材料商管理员
            </li>
        </ul>
        <section class="aui-grid">
		    <div class="aui-row">
		     
		     	<span id="lists_cl"></span>
				<div class="aui-col-xs-4" id="" onclick="openLiao('4','add')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/add1.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
			
				<div class="aui-col-xs-4" id="" onclick="openLiao('4','del')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/del.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
				
		    </div>
		</section>
	
	   <ul class="aui-list aui-list-in">
            <li class="aui-list-header">
                	岗位异动负责人
            </li>
        </ul>
        <section class="aui-grid">
		    <div class="aui-row">
		     
		     	<span id="lists_mane"></span>
				<div class="aui-col-xs-4" id="" onclick="openLiao('6','add')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/add1.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
			
				<div class="aui-col-xs-4" id="" onclick="openLiao('6','del')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/del.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
				
		    </div>
		</section>
	
		<ul class="aui-list aui-list-in">
            <li class="aui-list-header">
                	成员
            </li>
        </ul>
        <section class="aui-grid">
		    <div class="aui-row">
		     
		     	<span id="lists_xm"></span>
				<div class="aui-col-xs-4" id="" onclick="openLiao('5','add')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/add1.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
			
				<div class="aui-col-xs-4" id="" onclick="openLiao('5','del')">
				    <img class="aui-img-object" src="/Public/admin/apicloud/del.png" style="width: 48px;height:48px;">
				    <div class="aui-grid-label"></div>
				</div>
				
		    </div>
		</section>-->
			
		
		
        
    </div>
    
    
    
</body>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script>
<script type="text/javascript" src="/Public/admin/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/admin/apicloud/api.js"></script>
<!--Zepto.js,类似Jquery-->
<!--<script type="text/javascript" src="/Public/admin/apicloud/zepto.min.js"></script>
<script type="text/javascript" src="/Public/admin/apicloud/winu-base.js" ></script>-->
<script type="text/javascript">

	// 选择图片
	function selectPic(){
	alert('pic');
		// 弹出相册选择
		//$("#newphoto").prepend('<span id="empty"><img class="winu-border-radius-50"  src="'+data+'" style="margin:5px;max-width:100px;height:100px;"/></span>');
	}
	
	/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
	
	//添加项目成员
	function openLiao(type,action){
		var timestamp = <?php echo ($timsType); ?>;
		/*$.post("/index.php/Admin/Project/openLiao", { 
			"type" : type+"" ,
			"timestamp" : timestamp+"",
			"action" : action+""
			},
		   function(data){
			 alert(data.retData); // John
		   }, "json");*/
		var url = '/index.php/Admin/Project/openLiao/type/'+type+'/timestamp/'+timestamp+'/action/'+action+'';
		//member_add('添加',url,'','610');
		window.location.href = url;
		
	}
	
	
	
	//发布
    function check(){
		var id = <?php echo ($id); ?>;
		var manageman = $("#manageman").val();
    	var prj_name = $("#prj_name").val();
    	var addres = $("#address").val();
    	var start_time = $("#start_time").val();
    	//var finish_time = $("#finish_time").val();
    	var pre_price = $("#pre_price").val();
    	var expire_time = $("#expire_time").val();
    	//var prj_price = $("#prj_price");
    	var prj_desc = $("#prj_desc").val();
    	var timestamp = <?php echo ($timsType); ?>;
    	
    	if(manageman == ''){
    		layer.msg('管理员必填!',{icon: 5,time:1000});
    		
    	}else if(prj_name == ''){
    		layer.msg('维修名称必填!',{icon: 5,time:1000});
    	
    	}else if(addres == ''){
			layer.msg('地址必填!',{icon: 5,time:1000});
    	}else if(start_time == ''){
    		layer.msg('开始时间必填!',{icon: 5,time:1000});
    
    	}else{
			
			$.post("/index.php/Admin/Project/projectadd", { 
				"wid" : id+"",
				"manageman" : manageman+"",
				"prj_name" : prj_name+"",
				"address" : addres +"",
				"pre_price" :pre_price+"",
				"prj_quanty" : '0',
				"prj_price" : '0',
				"prj_desc" : prj_desc+"",
				"timsType" : timestamp+"",
				"status" : '2',
				//"finish_time" : finish_time+"",
				"start_time" : start_time+"",
				//"expire_time" : expire_time+"",
				"ptype" : '2'
				},
			   function(data){
				 alert(data.retData); // John
			   }, "json");
    	}
    	
    }
    
    
    //获取成员列表
    
    
    function getUserList() {
		api.ajax({
		    url: serverUrl+'jingyi.php/Home/Jymember/userpdetail',
		    method: 'post',
		    timeout: 60,
		    dataType: 'json',
		    charset: 'utf-8',
		    report: true,
		    data: {
		     	values: { 
	            	addtime : timestamp,
	        	},
		    },
		},function(ret, err){ 
			
			var code = ret.body.status;
			
			
			 
		    if (code == 200 ) {
		     
		       var mg = ret.body.retData.mg;
		       var cm = ret.body.retData.cm;
		       var jl = ret.body.retData.jl;
		       var cl = ret.body.retData.cl;
		       var xm = ret.body.retData.xm;
		       var yd = ret.body.retData.yd;
		       //api.alert({ msg: JSON.stringify(mg) });
				//管理员
				var lists_mg = '';
				for (var i in mg) {
		            var touid = mg[i].user_id,name = mg[i].name, imgUrl = uploadUrl+mg[i].userphoto;
		            lists_mg += '<div class="aui-col-xs-4">';
					lists_mg += '    <img class="aui-img-object" src="'+ imgUrl +'" style="width: 48px;height:48px;">';
					
					if(name_cm == null){
						lists_mg += '    <div class="aui-grid-label">'+touid+'</div>';
					}else{
						lists_mg += '    <div class="aui-grid-label">'+name+'</div>';
					}
					lists_mg += '</div>';
		            
		        }
		      	
		      	
		      	
		        //普通工人
		        var lists_cm = '';
				for (var i in cm) {
		            var touid_cm = cm[i].user_id,name_cm = cm[i].name, imgUrl_cm = uploadUrl+cm[i].userphoto;
		            
		            lists_cm += '<div class="aui-col-xs-4">';
					lists_cm += '    <img class="aui-img-object" src="'+ imgUrl_cm +'" style="width: 48px;height:48px;">';
					if(name_cm == null){
						lists_cm += '    <div class="aui-grid-label">'+touid_cm+'</div>';
					}else{
						lists_cm += '    <div class="aui-grid-label">'+name_cm+'</div>';
					}
					
					lists_cm += '</div>';
		            
		        }
		        
		        
				
				//经理
		        var lists_jl = '';
				for (var i in jl) {
		            var touid_cm = jl[i].user_id,name_cm = jl[i].name, imgUrl_cm = uploadUrl+jl[i].userphoto;
		            
		            lists_jl += '<div class="aui-col-xs-4">';
					lists_jl += '    <img class="aui-img-object" src="'+ imgUrl_cm +'" style="width: 48px;height:48px;">';
					if(name_cm == null){
						lists_jl += '    <div class="aui-grid-label">'+touid_cm+'</div>';
					}else{
						lists_jl += '    <div class="aui-grid-label">'+name_cm+'</div>';
					}
					
					lists_jl += '</div>';
		            
		        }
		        
		       
				
				//材料
		        var lists_cl = '';
				for (var i in cl) {
		            var touid_cm = cl[i].user_id,name_cm = cl[i].name, imgUrl_cm = uploadUrl+cl[i].userphoto;
		            
		            lists_cl += '<div class="aui-col-xs-4">';
					lists_cl += '    <img class="aui-img-object" src="'+ imgUrl_cm +'" style="width: 48px;height:48px;">';
					if(name_cm == null){
						lists_cl += '    <div class="aui-grid-label">'+touid_cm+'</div>';
					}else{
						lists_cl += '    <div class="aui-grid-label">'+name_cm+'</div>';
					}
					
					lists_cl += '</div>';
		            
		        }
		        
				//项目
		        var lists_xm = '';
				for (var i in xm) {
		            var touid_cm = xm[i].user_id,name_cm = xm[i].name, imgUrl_cm = uploadUrl+xm[i].userphoto;
		            
		            lists_xm += '<div class="aui-col-xs-4">';
					lists_xm += '    <img class="aui-img-object" src="'+ imgUrl_cm +'" style="width: 48px;height:48px;">';
					if(name_cm == null){
						lists_xm += '    <div class="aui-grid-label">'+touid_cm+'</div>';
					}else{
						lists_xm += '    <div class="aui-grid-label">'+name_cm+'</div>';
					}
					
					lists_xm += '</div>';
		            
		        }
		        
		        //岗位异动
		        var lists_mane = '';
				for (var i in yd) {
		            var touid_fr = yd[i].user_id,name_fr = yd[i].name, imgUrl_fr = uploadUrl+yd[i].userphoto;
		            
		            lists_mane += '<div class="aui-col-xs-4">';
					lists_mane += '    <img class="aui-img-object" src="'+ imgUrl_fr +'" style="width: 48px;height:48px;">';
					if(name_fr == null){
						lists_mane += '    <div class="aui-grid-label">'+touid_fr+'</div>';
					}else{
						lists_mane += '    <div class="aui-grid-label">'+name_fr+'</div>';
					}
					
					lists_mane += '</div>';
		            
		        }
		        
		        $("#lists_mg").html(lists_mg);
				$("#lists_cm").html(lists_cm);
				$("#lists_jl").html(lists_jl);
				$("#lists_cl").html(lists_cl);
				$("#lists_xm").html(lists_xm);
				$("#lists_mane").html(lists_mane);
				
		    }
		});	
	}
    
    
    
    
    
    //根据地址获取经纬度
    function FromName(){
    	_openWin('address_xiangmu_win','../address/address_xiangmu_win.html',{winName : winName,frameName : api.frameName});
    	
	}
</script>
</html>