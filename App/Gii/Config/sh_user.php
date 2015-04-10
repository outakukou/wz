<?php
return array(
	'tableName' => 'sh_user',  // 数据库中的表名
	'moduleName' => 'Adminuser',    // 代码生成到的模块
	'moduleCnName' => '权限',    // 代码生成到的模块
	'tableCnName' => '管理员',
		'insertFields' => "array('username','realname','password','status')",     // 允许添加的表单字段
	'updateFields' => "array('id','username','realname','password','status')",    // 允许修改的表单中的字段
	'validate' => "
		array('username', 'require', '用户名不能为空！', 1, 'regex', 3),
		array('username', '', '用户名已经存在！', 1, 'unique', 3),
		array('realname', 'require', '真实姓名不能为空！', 1, 'regex', 3),
		array('password', 'require', '密码不能为空！', 1, 'regex', 3),
		array('status', '/^\d+$/', '是否启用：1：启用0：禁用必须是一个整数！', 2, 'regex', 3),
	",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'username' => array(
			'text' => '用户名',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'realname' => array(
			'text' => '真实姓名',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'password' => array(
			'text' => '密码',
						'type' => 'password',
			'tip' => '请输入',
						'class' => 'required',
		),
				'status' => array(
			'text' => '是否启用',
						'type' => 'radio',
						'radioOptionValue' => array(
							'1' => '启用',
							'0' => '不启用',
						),
			'tip' => '',
			'class' => 'required',
			'bizRule' => '$v[status]==1?"启用":"不启用";',
		),
		'is_supervisor' => array(
			'text' => '是否超级管理员',
						'type' => 'radio',
						'radioOptionValue' => array(
							'否' => '否',
							'是' => '是',
						),
			'tip' => '',
			'class' => 'required',
		),
			),
	'search' => array(
				array('username', 'normal', '', 'like'),
				array('realname', 'normal', '', 'like'),
			),
);