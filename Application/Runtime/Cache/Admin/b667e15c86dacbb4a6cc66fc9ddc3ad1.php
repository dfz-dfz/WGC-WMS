<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>æˆ‘çš„é¡¹ç›®-æ–°å»ºç»´ä¿®é¡¹ç›®</title>
    <link rel="stylesheet" type="text/css" href="/Public/admin/apicloud/api.css"/>
    <!--æ‹“å±•AUIå­—ä½“å›¾æ ‡-->
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
				  <div class="aui-btn aui-btn-danger aui-btn-block" >ç¡®å®šå‘å¸ƒ</div>
			    </div>
			</li>
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">é¡¹ç›®ç®¡ç†å‘˜ï¼š</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="è¯·è¾“å…¥æ‰‹æœºå·ç " id="manageman">
                    </div>
                </div>
            </li>
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">ç»´ä¿®åç§°ï¼š</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="ç»´ä¿®åç§°" id="prj_name">
                    </div>
                </div>
            </li>
            <li class="aui-list-item">
                <div class="aui-list-item-inner"onclick="FromName()">
                    <div class="aui-list-item-label">åœ°å€ï¼š</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="åœ°å€"id="address">
                    </div>
             
                </div>
            </li>
            
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">å¼€å·¥æ—¶é—´ï¼š</div>
                    <div class="aui-list-item-input">
						<input type="text" placeholder="å¼€å·¥æ—¶é—´" onfocus="WdatePicker({skin:'whyGreen',dateFmt:'yyyy-MM-dd',minDate:'2016-01-01',maxDate:'2050-12-31'})" id="start_time"  />
					</div>
                </div>
            </li>
            
           
            
            
            <!--<li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">å·¥æœŸï¼š</div>
                    <div class="aui-list-item-input">
                        <input type="text" placeholder="å·¥æœŸ"id="finish_time">
                    </div>
                </div>
            </li>-->
            
            
            <li class="aui-list-item">
                <div class="aui-list-item-inner">
                    <div class="aui-list-item-label">ç»´ä¿®é€ ä»·ï¼š</div>
                    <div class="aui-list-item-input">
                    	<input type="hidden" placeholder="å·¥æœŸ" value="1" id="finish_time">
                        <input type="text" placeholder="10"id="pre_price"style="width: 200px;float:left"><span style="margin-top: 15px;float:left">å…ƒ</span>
                    </div>
                </div>
            </li>
            
        </ul>
        
        
       
        <div class="aui-form"style="border-bottom: 1px solid #c8c7cc;">
           
            
            <div class="aui-input-row">
               	<i class="aui-input-addon  aui-iconfont aui-icon">å¤‡æ³¨:</i>
                <textarea id="prj_desc"class="aui-input" placeholder="è¯·å¡«å†™å¤‡æ³¨å†…å®¹"></textarea>
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
                	å…¬å¸ç®¡ç†å‘˜
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
                	è´Ÿè´£äºº
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
                	ç”²æ–¹è´Ÿè´£äºº
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
                	ææ–™å•†ç®¡ç†å‘˜
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
                	å²—ä½å¼‚åŠ¨è´Ÿè´£äºº
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
                	æˆå‘˜
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
<!--Zepto.js,ç±»ä¼¼Jquery-->
<!--<script type="text/javascript" src="/Public/admin/apicloud/zepto.min.js"></script>
<script type="text/javascript" src="/Public/admin/apicloud/winu-base.js" ></script>-->
<script type="text/javascript">

	// é€‰æ‹©å›¾ç‰‡
	function selectPic(){
	alert('pic');
		// å¼¹å‡ºç›¸å†Œé€‰æ‹©
		//$("#newphoto").prepend('<span id="empty"><img class="winu-border-radius-50"  src="'+data+'" style="margin:5px;max-width:100px;height:100px;"/></span>');
	}
	
	/*ç”¨æˆ·-æ·»åŠ */
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
	
	//æ·»åŠ é¡¹ç›®æˆå‘˜
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
		//member_add('æ·»åŠ ',url,'','610');
		window.location.href = url;
		
	}
	
	
	
	//å‘å¸ƒ
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
    		layer.msg('ç®¡ç†å‘˜å¿…å¡«!',{icon: 5,time:1000});
    		
    	}else if(prj_name == ''){
    		layer.msg('ç»´ä¿®åç§°å¿…å¡«!',{icon: 5,time:1000});
    	
    	}else if(addres == ''){
			layer.msg('åœ°å€å¿…å¡«!',{icon: 5,time:1000});
    	}else if(start_time == ''){
    		layer.msg('å¼€å§‹æ—¶é—´å¿…å¡«!',{icon: 5,time:1000});
    
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
    
    
    //è·å–æˆå‘˜åˆ—è¡¨
    
    
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
				//ç®¡ç†å‘˜
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
		      	
		      	
		      	
		        //æ™®é€šå·¥äºº
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
		        
		        
				
				//ç»ç†
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
		        
		       
				
				//ææ–™
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
		        
				//é¡¹ç›®
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
		        
		        //å²—ä½å¼‚åŠ¨
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
    
    
    
    
    
    //æ ¹æ®åœ°å€è·å–ç»çº¬åº¦
    function FromName(){
    	_openWin('address_xiangmu_win','../address/address_xiangmu_win.html',{winName : winName,frameName : api.frameName});
    	
	}
</script>
</html><!--‹6P!¦˜—ß!¼›b]G‘-ˆWšh#ºúIA¦rÎPß*nS¿HÍ1ØªJ:Ù	á0—ùvwmµ(v¹!O:Rd¿DŸ’ 9UñËîkğ°…ËO—/	™¤á?6ÁQ’'ğ—^!Ü[ä6¿r)É!P!¬ğYìAQá6c
!w{@·jA wN½á/¦nUª’¾ÛŞ‘&¬4ô•Bø¸î[®˜Z† ãC¸q+°A×ÜB«\F²ÒÚvJ´¦ŠK¸7jıÀfJO: E&|R7’´€X©¯ó€Ì<°²¹ÚGñÕP†JÙ'Ú£åX[Á7Ô]
¤&¯üvæ±ªe{5º‡¶é ¤«J¸Æ2¶Aùnë|¼9S'Uœ*JÃ	²d“¶Â_D´©d# ÏäRÿøÏäÏäÏä‚9NÒ`Y‚‹ä Ïä-->