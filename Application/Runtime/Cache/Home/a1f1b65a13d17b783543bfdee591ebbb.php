<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>公司案例列表</title>
    <link rel="stylesheet" type="text/css" href="/Public/gz/css/aui.css" />
</head>
<body>


    <div class="aui-content aui-margin-b-15">
        <ul class="aui-list aui-media-list">
            <li class="aui-list-header">
                公司案例
            </li>
		
		<?php if(is_array($lists)): foreach($lists as $key=>$v): ?><a href="<?php echo U('Undex/content',array('id'=>$v['id']));?>"> 
		             
				<li class="aui-list-item">
				  <tr>
				   <td><?php echo ($v['id']); ?></td>
					<div class="aui-media-list-item-inner">
						<div class="aui-list-item-media">
						    <td><img src="<?php echo ($v['pic']); ?>"></td>
						</div>
						
						<div class="aui-list-item-inner">
							 
							<div class="aui-list-item-text">
							  
								<div class="aui-list-item-title">案例标题</div>
								      <td><?php echo ($v['title']); ?></td>
								<div class="aui-list-item-right"></div>
							</div>
							<div class="aui-list-item-text">
								     <td><?php echo (htmlspecialchars_decode($v['content'])); ?></td>
							</div>
							<div class="aui-info aui-margin-t-5" style="padding:0">
								<div class="aui-info-item"></div>
								<td><?php echo (date('Y-m-d H:i:s',$v['times'])); ?></td>					
							</div>
						</div>
					
					  </tr>
					</div>
					
				</li>
			 </a><?php endforeach; endif; ?>	
		     
        </ul>
    </div>
</body>
<script type="text/javascript" src="/Public/gz/js/api.js" ></script>
</html>