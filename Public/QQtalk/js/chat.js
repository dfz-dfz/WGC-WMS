function message(){
	var a=$.blinkTitle.show();
	setTimeout(function(){$.blinkTitle.clear(a)},8e3)
	}
	$(document).ready(
	function(){
		function e(){
			function h(){-1!=g.indexOf("*#emo_")&&(g=g.replace("*#","<img src='img/").replace("#*",".gif'/>"),h())}
			var e=new Date,f="";f+=e.getFullYear()+"-",f+=e.getMonth()+1+"-",f+=e.getDate()+"  ",f+=e.getHours()+":",f+=e.getMinutes()+":",f+=e.getSeconds();
			var g=$("#textarea").val();
			sendmsg =g;
			var photo=$("#photo").val();
			var uname=$("#uname").val();
			var gongzhong=$("#gongzhong").val();
			//alert(gongzhong);
			h();
			var i="<div class='message clearfix'>";
			
					i +="<div class='user-logo'>";
					i +="<img style='width:50px;height:50px;' src='"+photo+"'/>";
					i +="</div>";
					
					i +="<div class='wrap-text'>";
					i +="<h5 class='clearfix'>"+uname+"</h5>";
					i +="<div>"+g+"</div>";
					i +="</div>";
					
					i +="<div class='wrap-ri'>";
					i +="<div clsss='clearfix'>";
					i +="<span>"+f+"</span>";
					i +="</div>";
					i +="</div>"
					
					i +="<div style='clear:both;'></div>";
				i +="</div>";
				
				null!=g&&""!=g?($(".mes"+a).append(i),$(".chat01_content").scrollTop($(".mes"+a).height()),$("#textarea").val(""),message()):alert("\u8bf7\u8f93\u5165\u804a\u5929\u5185\u5bb9!")
				//ajax 保存数据到服务器  alert(g);
				$.ajax({
					url:"http://wgcmanage.59jiaju.com/index.php/Admin/Systemmsg/sysMsgAdd",
					data:{'mtype':'公告','content':g+"",'gongzhong':gongzhong+""},
					type:"post",
					dataType:"json",
					timeout:3000,
					async: false,
					beforeSend:function(XMLHttpRequest){
					},
					success:function(data,textStatus){
						var code = data.code;
						var message = data.message;
						switch(code){
							case 200:
								//alert(message)
								break;
							case 202:
								alert(message);
								break;
							default:
								alert('未知错误');
							
						}
					},
					complete: function(XMLHttpRequest, textStatus){
						//HideLoading();
						//alert("complete");
					},
					error:function(){
						alert("网络错误");
					}
				});	
				
			}
				var a=3,b="img/head/2024.jpg",c="img/head/2015.jpg",d="\u738b\u65ed";
				$(".close_btn").click(function(){$(".chatBox").hide()}),
				$(".chat03_content li").mouseover(function(){$(this).addClass("hover").siblings().removeClass("hover")}).mouseout(function(){$(this).removeClass("hover").siblings().removeClass("hover")}),
				$(".chat03_content li").dblclick(function(){var b=$(this).index()+1;a=b,c="img/head/20"+(12+a)+".jpg",d=$(this).find(".chat03_name").text(),$(".chat01_content").scrollTop(0),$(this).addClass("choosed").siblings().removeClass("choosed"),$(".talkTo a").text($(this).children(".chat03_name").text()),$(".mes"+b).show().siblings().hide()}),
				$(".ctb01").mouseover(function(){$(".wl_faces_box").show()}).mouseout(function(){$(".wl_faces_box").hide()}),
				$(".wl_faces_box").mouseover(function(){$(".wl_faces_box").show()}).mouseout(function(){$(".wl_faces_box").hide()}),
				$(".wl_faces_close").click(function(){$(".wl_faces_box").hide()}),
				$(".wl_faces_main img").click(function(){var a=$(this).attr("src");$("#textarea").val($("#textarea").val()+"*#"+a.substr(a.indexOf("img/")+4,6)+"#*"),$("#textarea").focusEnd(),$(".wl_faces_box").hide()}),
				$(".chat02_bar img").click(function(){e()}),
				document.onkeydown=function(a){var b=document.all?window.event:a;return 13==b.keyCode?(e(),!1):void 0},
				$.fn.setCursorPosition=function(a){return 0==this.lengh?this:$(this).setSelection(a,a)},
				$.fn.setSelection=function(a,b){if(0==this.lengh)return this;if(input=this[0],input.createTextRange){var c=input.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select()}else input.setSelectionRange&&(input.focus(),input.setSelectionRange(a,b));return this},
				$.fn.focusEnd=function(){this.setCursorPosition(this.val().length)}}),
				function(a){a.extend({blinkTitle:{show:function(){
					var a=0,b=document.title;
					if(-1==document.title.indexOf("\u3010"))
						var c=setInterval(function(){a++,3==a&&(a=1),1==a&&(document.title="\u3010\u3000\u3000\u3000\u3011"+b),2==a&&(document.title="\u3010\u65b0\u6d88\u606f\u3011"+b)},500);return[c,b]},clear:function(a){a&&(clearInterval(a[0]),document.title=a[1])}}})}(jQuery);