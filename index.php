<?php
define('APP_DEBUG', TRUE);
// TP把生成的目录结构放到哪
define('APP_PATH','./App/');
// 图片前面的路径-浏览器用（绝对路径）
define('IMG_URL', 'http://192.168.1.112/Uploads/');
define('STATIC_IMG','http://192.168.1.112/Public/');
// 图片在硬盘上的路径（相对路径）Image类open打开.默认从根目录开始查找
define('IMG_URL_HD', './Uploads/');

require './ThinkPHP/ThinkPHP.php';