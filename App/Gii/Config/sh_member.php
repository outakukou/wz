<?php
return array(
	'tableName' => 'sh_member',  // 数据库中的表名
	'moduleName' => 'Member',    // 代码生成到的模块
	'moduleCnName' => '',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '会员',
		'insertFields' => "array('username','password','email','mobile','jyz','face','addtime')",     // 允许添加的表单字段
	'updateFields' => "array('id','username','password','email','mobile','jyz','face','addtime')",    // 允许修改的表单中的字段
	'validate' => "
							array('username', 'require', '用户名不能为空！', 1, 'regex', 3),
									array('password', 'require', '密码不能为空！', 1, 'regex', 3),
									array('email', 'require', 'email不能为空！', 1, 'regex', 3),
									array('email', 'email', 'email格式不正确！', 1, 'regex', 3),
									array('jyz', '/^\d+$/', '经验值，根据这个字段来计算这个用户的级别，获取方式当用户买了一件商品时，就获取相应的经验值必须是一个整数！', 2, 'regex', 3),
							array('addtime', 'require', '注册时间不能为空！', 1, 'regex', 3),
									",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'username' => array(
			'text' => '用户名',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'password' => array(
			'text' => '密码',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'email' => array(
			'text' => 'email',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'mobile' => array(
			'text' => '手机号',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'jyz' => array(
			'text' => '经验值，根据这个字段来计算这个用户的级别，获取方式当用户买了一件商品时，就获取相应的经验值',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'face' => array(
			'text' => '头像',
						'type' => 'file',
			'tip' => '请上传一张图片',
						'class' => 'required',
		),
				'addtime' => array(
			'text' => '注册时间',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
			),
	'search' => array(
				array('id', 'normal', '', '='),
				array('username', 'normal', '', '='),
				array('password', 'normal', '', '='),
				array('email', 'normal', '', '='),
				array('mobile', 'normal', '', '='),
				array('jyz', 'normal', '', '='),
				array('face', 'normal', '', '='),
				array('addtime', 'normal', '', '='),
			),
);