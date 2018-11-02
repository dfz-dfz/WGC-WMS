<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>汉堡王</title>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            .box {
                width: 100%;
            }

            .box .header {
                width: 100%;
                height: 8rem;
                line-height:8rem;
                text-align: center;
                background-color: #fff;
            }

            .box .header a {
                display: inline-block;
                width: 10rem;
                height: 100%;
                line-height:8rem;
                text-align: center;
                float: left;
            }

            .box .header a:hover {
                background-color: #c2c2c2;
            }

            .box .header a img{
                width: 30%;
                vertical-align: middle;
            }

            .box .header span {
                display: block;
                width: 20rem;
                height: 100%;
                margin: auto;
            }

            .box .header span em {
                font-style: normal;
                font-size: 3.5rem;
                color: #666;
            }

            .box .pic {
                margin-bottom: 0.8rem;
            }

            .box .pic img {
                width: 100%;
            }
        </style>
</head>

<body>
 <?php if(is_array($user)): foreach($user as $key=>$v): ?><!-- <?php echo ($v['id']); ?>  
	 <?php echo ($v['title']); ?>
	 <?php echo (htmlspecialchars_decode($v['content'])); ?>  
	 <?php echo (date('Y-m-d H:i:s',$v['times'])); ?>
	 -->


    <div class="box">
        <div class="header">
            <a href="<?php echo U('Undex/burgKing',array('id'=>$v['id']));?>" onClick="javascript :history.back(-1);">
                <!-- <img src="<?php echo ($v['pic']); ?>" alt="">  -->
      
            <span>
                <em>汉堡王</em>
            </span>
        </div>
        <div class="pic">
            <img src="/Public/anli/images/hanbaowang1.jpg" alt="" />
        </div>
        <div class="pic">
            <img src="/Public/anli/images/hanbaowang2.jpg" alt="" />
        </div>
        <div class="pic">
            <img src="/Public/anli/images/hanbaowang3.jpg" alt="" />
        </div>
        <div class="pic">
            <img src="/Public/anli/images/hanbaowang4.jpg" alt="" />
        </div>
        <div class="pic">
            <img src="/Public/anli/images/hanbaowang5.jpg" alt="" />
        </div>
    </div>
    </a><?php endforeach; endif; ?>
</body>

</html>