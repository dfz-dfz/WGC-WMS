<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------



// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
//极光推送APP_KEY
define('APP_KEY','63c55a3a8cca474da3cb0aaf');
//WEB_DIR 网站根目录
define('WEB_DIR',__DIR__.'\\');
//WEB_PATH
define('WEB_ROOT','./');
// 创建一个后台入口文件
//define('BIND_MODULE','Admin');
//创建公共的IMG图片文件夹路径
define('IMG_DIR',WEB_DIR.'Public'.'\\'.'IMG'.'\\');
//创建公共的CSS样式文件夹路径
define('CSS_DIR',WEB_DIR.'Public'.'\\'.'CSS'.'\\');
//创建公共的JS插件文件夹路径
define('JS_DIR',WEB_DIR.'Public'.'\\'.'JS'.'\\');
//极光推送MASTER_SECRET
define('MASTER_SECRET','435d8388d9fb07e0462c2d0d');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';



// 亲^_^ 后面不需要任何代码了 就是如此简单