<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>经艺工厂</title>
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
    <div class="box">
        <div class="header">
            <a href="javascript:;" onClick="javascript :history.back(-1);">
                <img src="/Public/long/images/back.png" alt="">
            </a>
            <span>
                <em>经艺工厂</em>
            </span>
        </div>
        <div class="pic">
            <img src="/Public/long/images/gongchang1.png" alt="" />
        </div>
        <div class="pic">
            <img src="/Public/long/images/gongchang2.png" alt="" />
        </div>
        <div class="pic">
            <img src="/Public/long/images/gongchang3.png" alt="" />
        </div>
    </div>

</body>

</html>