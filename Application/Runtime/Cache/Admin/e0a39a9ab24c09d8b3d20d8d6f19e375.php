<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>首页</title>
        <style type="text/css">
            .iframe1,.iframe2 {
                margin: 0px;
                padding: 8px;
               // width: 45%;
                height: 650px;
                border:1px solid #090909;
                border-radius:3px;
            }
			.iframe1{
				width: 27%;
			}
			.iframe2{
				width: 68%;
			}
        </style>
    </head>
    <body>
        <iframe class='iframe1' src="/index.php/Admin/Instantmsg/searchman" frameborder="0"></iframe>
        <iframe class='iframe2' src="/index.php/Admin/Instantmsg/userone" frameborder="0" name="chat"></iframe>
    </body>
</html>