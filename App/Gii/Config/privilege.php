<?php
return array(
	'tableName' => 'sh_privilege',  // 数据库中的表名
	'moduleName' => 'Rbac',    // 代码生成到的模块
	'tableCnName' => '权限',
	'insertFields' => "array('pri_name','parent_id','module_name','controller_name','action_name')",     // 允许添加的表单字段
	'updateFields' => "array('id','pri_name','parent_id','module_name','controller_name','action_name')",    // 允许修改的表单中的字段
	'validate' => "array('pri_name', 'require', '权限名称不能为空！', 1, 'regex', 3),
					array('pri_name', '', '权限名称已经存在！', 1, 'unique', 3),
					array('module_name', 'require', '模块名不能为空！', 1, 'regex', 3),
					array('controller_name', 'require', '控制器名不能为空！', 1, 'regex', 3),
					array('action_name', 'require', '方法名不能为空！', 1, 'regex', 3),",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
		'parent_id' => array(
			'text' => '上级权限',
			'type' => 'select',
			'dataSource' => array(
								'$_selData=M(\'Privilege\')->select();',
								'id',
								'pri_name'
							),
			'tip' => '选择上级权限',
			'class' => '',
		),
		'pri_name' => array(
			'text' => '权限名称',
			'type' => 'text', 
			'tip' => '输入权限名字', 
			'class' => 'required',
		),
		'module_name' => array(
			'text' => '模块名称',
			'type' => 'text', 
			'tip' => '', 
			'class' => 'required',
		),
		'controller_name' => array(
			'text' => '控制器名称',
			'type' => 'text', 
			'tip' => '', 
			'class' => 'required',
		),
		'action_name' => array(
			'text' => '方法名称',
			'type' => 'text', 
			'tip' => '', 
			'class' => 'required',
		),
	),
	'search' => array(
	),
);