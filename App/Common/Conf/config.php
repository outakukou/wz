<?php
return array(
	'DB_TYPE' => 'mysql',
	'DB_HOST' => '127.0.0.1',
	'DB_NAME' => 'weizhan',
	'DB_USER' => 'root',
	'DB_PWD' => 'hao',
	'DB_PREFIX' => 'wei_',
	// 接收到的数据使用函数过滤一下，应用于I函数
	'DEFAULT_FILTER' => 'trim,removeXSS',
//	'DEFAULT_FILTER' => 'trim,strip_tags',
	// 图片相关配置
	'MAX_UPLOAD_FILESIZE' => '3M',
	'ALLOW_UPLOAD_FILETYPE' => array('gif','png','jpg','jpeg','ejpeg','bmp'),
	/************ RBAC相关配置 *********************/
	'RBAC_ROLE_TABLE' => 'sh_role',
	'RBAC_USER_TABLE' => 'sh_role_user',
	'RBAC_ACCESS_TABLE' => 'sh_access',
	'RBAC_NODE_TABLE' => 'sh_node',
	'USER_AUTH_MODEL' => 'User',           // 管理员模型的名字
	'USER_AUTH_KEY' => 'user_id',           // 在SESSION中用来保存管理员ID的变量名是什么
	'USER_AUTH_TYPE' => '2',   // 2：每次检查权限时都现查数据库 ， <>2登录时把权限存到SESSION中，之后直接读SESSION不读数据库了， 效果：2：改过权限之后，马上生效  <>2.改过权限之后需要重新登录新的权限才会生效
	'ADMIN_AUTH_KEY' => 'iamroot',    // 超级管理员的变量名标识，TP会检查SESSION中是否有这个变量，如果有就认为是超级管理员就拥有所有的权限
	'USER_AUTH_ON' => TRUE,           // 是否启用RBAC
	'REQUIRE_AUTH_MODULE' => '',          // 哪些控制器需要验证权限
	'NOT_AUTH_MODULE' => '',              // 不需要验证权限的控制器
	'REQUIRE_AUTH_ACTION' => '',            // 哪些方法需要验证
	'NOT_AUTH_ACTION' => '',               // 哪些方法不需要验证权限
	'GUEST_AUTH_ON' => FALSE,              // 是否允许匿名
	'USER_AUTH_GATEWAY' => '/Home/Login/login',             // 登录的地址是什么
	/*************************** md5加密的密钥 *********************************/
	'MD5_KEY' => '!343!169fd$fd_fds=+43>?lg',
    /************开启trace 跟踪***********/
    'SHOW_PAGE_TRACE' => true,
    
);