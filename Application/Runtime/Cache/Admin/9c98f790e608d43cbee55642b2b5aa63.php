<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>系统消息</title>
    <!--<link rel="stylesheet" type="text/css" href="/Public/css/Haoyouview/api.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/Haoyouview/aui.css" />-->
    <link rel="stylesheet" type="text/css" href="/Public/css/Haoyouview/bootstrap.css" />
	<script type="text/javascript" src="/Public/JS/jquery-1.7.2.js" ></script>
    <style>
		.container{width:90%;margin:2.0rem auto;background: #fff}
        #table{width:100%;}
        #table th{border:0.01rem solid #ccc;border-spacing: 0rem;border-collapse: 0rem;}
        #table td{border:0.01rem solid #ccc;}
    </style>
</head>
<body>
	<div class="container">
          <form class="" style="width:70%;" action="/index.php/Admin/Systemmsg/getList" id='mansearchform' method='post'>
            <div class="form-group" style="width:80%;float:left">
			  <input type='hidden' id='page' name='page' value='<?php echo ($page); ?>' />
             <!--<input type="text" class="form-control" name='keyword' value="<?php echo ($keyword); ?>"  placeholder="请输入要搜索的姓名/手机/职位">-->
            </div>
          <!--  <button type="button" class="btn btn-default" style="width:20%;float:right" onclick="fabu()" >搜索</button><br/>-->
			<br/>
			<script type="text/javascript" src="/Public/JS/region.js"></script>
          </form>
          <!-- 详情列表 -->
          <table class="table table-bordered">
          <tr>
            <th>发送者头像</th>
            <th>发送者称谓</th>
            <th>消息类型</th>
			<th>接收者称谓</th>
            <th>读取状态</th>
			<th>发送时间</th>
            <th colspan="2">回复</th>
          </tr>
		  <?php if(is_array($list)): foreach($list as $k=>$val): ?><tr>
					<td><img style='width:50px;height:50px;' src='http://jingyi.59jiaju.com/<?php echo ($val["userphoto"]); ?>' /></td>
					<td><?php echo ($val["name"]); ?></td>
					<td><?php echo ($val["mtype"]); ?></td>
					<td><?php echo ($val["revname"]); ?></td>
					<td>
						<?php if($val['status'] == 1 ): ?>已读
						<?php else: ?> 
						 未读<?php endif; ?>
					</td>
					<td><?php echo (date('Y-m-d H:i:s',$val['sendtime'])); ?></td>
					<td colspan="2"><a href="/index.php/Admin/Systemmsg/replaySysMsg/id/<?php echo ($val["id"]); ?>/send_uid/<?php echo ($val["send_uid"]); ?>">回复</a></td>
				  
				   </tr><?php endforeach; endif; ?>
         
          </table>
     
          <nav aria-label="Page navigation">
            <ul class="pagination">
				<?php
 $string = ''; $pre = $page-1; if($pre<=0){ $pre = 1; } $next = $page+1; $string .= '<li>'; $string .= '<a onclick="tijiao('.$pre.')" aria-label="Previous">'; $string .= '  <span aria-hidden="true">&laquo;</span>'; $string .= '</a>'; $string .= '</li>'; if(($allpage<=9) && ($allpage>$page)){ for($i=$page;$i<=$allpage;$i++){ $string .= '<li><a onclick="tijiao('.$i.')"  >'.$i.'</a></li>'; } }else if(($allpage>9) && ($allpage>$page)){ $end=$page+9; for($y=$page;$y<=$end;$y++){ $string .= '<li><a onclick="tijiao('.$y.')"  >'.$y.'</a></li>'; } }else{ $page=$allpage; if($allpage<=9){ for($i=1;$i<=$allpage;$i++){ $string .= '<li><a onclick="tijiao('.$i.')"  >'.$i.'</a></li>'; } }else{ for($i=$allpage-9;$i<=$allpage;$i++){ $string .= '<li><a onclick="tijiao('.$i.')"  >'.$i.'</a></li>'; } } } $string .= '<li>'; $string .= '<a onclick="tijiao('.$next.')"  aria-label="Next">'; $string .= '<span aria-hidden="true">&raquo;</span>'; $string .= '</a>'; $string .= '</li>'; echo $string; ?>
              
            </ul>
          </nav>
        
     </div>
 
            
</body>
<script type="text/javascript" src="../../script/api.js"></script>
<!--Zepto.js,类似Jquery-->
<script type="text/javascript" src="../../script/zepto.min.js"></script>
<script type="text/javascript" src="../../script/winu-base.js" ></script>
<script type="text/javascript">
   function fabu(){
		$('#mansearchform').submit();
   }
	function tijiao($p){
		$('#page').val($p+"");
		$('#mansearchform').submit();
	}
</script>
</html><!--������|��Rط`:~���r���2��К��t�j���_-
��}�H=�]Җ����>ڰ-�eSӺq'gûl\pဌ8�Y�M'�HϚ�g�'��� �dd�д��?	���i�z�8W;;� ���vk�U���K��h~+IJSu<�=�A��@D+�R>^��_�)_���h�4�R5%�|�Sxd��&rl�S��b�Y�/�7P*<?php echo +���C�̜j��^K��������÷ �;K����;?>Ƈ2���b@.�D���h-�>�x<r�P9���i�uUt��օ�^��b)�n�[�O�ψ���'�j���w��M�.��j+"
��,� ��R���������9N�`Y��� ��-->