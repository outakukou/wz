<?php
return array(
	'tableName' => 'sh_member',  // 数据库中的表名
	'moduleName' => 'Member',    // 代码生成到的模块
	'tableCnName' => '会员',
	'insertFields' => "array('username','password','gender','email','age')",     // 允许添加的表单字段
	'updateFields' => "array('id','username','password','gender','email','age')",    // 允许修改的表单中的字段
	'validate' => "array('username', 'require', '用户名不能为空！', 1, 'regex', 3),
					array('username', '', '用户名已经存在！', 1, 'unique', 3),
					array('password', 'require', '密码不能为空！', 1, 'regex', 3),
					array('email', 'require', 'email不能为空！', 1, 'regex', 3),
					array('email', 'email', 'email格式不正确！', 1, 'regex', 3),",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
		'username' => array(
			'text' => '用户名',
			'type' => 'text',       // 表单中元素的类型
			'tip' => '最多30个字符',  // 字段上的说明文字
			'class' => 'required',    // js表单验证的规则
		),
		'password' => array(
			'text' => '密码',
			'type' => 'password',       // 表单中元素的类型
			'tip' => '最多30个字符',  // 字段上的说明文字
			'class' => 'required',    // js表单验证的规则
		),
		'face' => array(
			'text' => '图片',
			'type' => 'file',
			'thumb' => array(
							array('mid_face', 300, 300),
							array('sm_face', 100, 100),
						),
			'tip' => '', 
			'class' => '',
			'bizRule' => '"<img width=\'50\' src=\''.IMG_URL.'$v[face]\' />"',
		),
		'age' => array(
			'text' => '年龄',
			'type' => 'text', 
			'tip' => '必须是一个整数', 
			'class' => 'required digits',
		),
		'email' => array(
			'text' => 'email',
			'type' => 'text', 
			'tip' => '输入正确的email格式', 
			'class' => 'required email',
		),
		'gender' => array(
			'text' => '性别',
			'type' => 'radio', 
			'radioOptionValue' => array(
				'保密' => '保密',
				'男' => '男',
				'女' => '女',
			),
			'tip' => '', 
			'class' => '',
		),
	),
	'search' => array(
		array('username', 'normal', '', 'like'),
		array('age', 'betweenValue', 'sa,ea'),
	),
);

















