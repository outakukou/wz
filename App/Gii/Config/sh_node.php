<?php
return array(
	'tableName' => 'sh_node',  // 数据库中的表名
	'moduleName' => 'Adminuser',    // 代码生成到的模块
	'tableCnName' => '节点',
		'insertFields' => "array('name','status','pid')",     // 允许添加的表单字段
	'updateFields' => "array('id','name','status','pid')",    // 允许修改的表单中的字段
	'validate' => "
							array('name', 'require', '不能为空！', 1, 'regex', 3),
							array('status', '/^\d+$/', '必须是一个整数！', 2, 'regex', 3),
							array('pid', 'require', '不能为空！', 1, 'regex', 3),
							array('pid', '/^\d+$/', '必须是一个整数！', 2, 'regex', 3),
							",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
			'pid' => array(
				'text' => '上级节点',
				'type' => 'select',
				'dataSource' => array(
								'$_selData=M(\'Node\')->where("level<=2")->select();',
								'id',
								'name'
							),
				'tip' => '',
				'class' => 'required',
			),
				'name' => array(
			'text' => '节点名称',
						'type' => 'text',
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
			),
	'search' => array(),
);