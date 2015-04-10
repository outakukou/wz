<?php
return array(
	'tableName' => 'sh_member_level',  // 数据库中的表名
	'moduleName' => 'Member',    // 代码生成到的模块
	'moduleCnName' => '会员',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '会员级别',
	'insertFields' => "array('level_name','bottom_num','top_num','rate')",     // 允许添加的表单字段
	'updateFields' => "array('id','level_name','bottom_num','top_num','rate')",    // 允许修改的表单中的字段
	'validate' => "
							array('level_name', 'require', '级别名称不能为空！', 1, 'regex', 3),
							array('bottom_num', 'require', '积分下限不能为空！', 1, 'regex', 3),
							array('bottom_num', '/^\d+$/', '积分下限必须是一个整数！', 2, 'regex', 3),
							array('top_num', 'require', '积分上限不能为空！', 1, 'regex', 3),
							array('top_num', '/^\d+$/', '积分上限必须是一个整数！', 2, 'regex', 3),
							array('rate', '1,100', '折扣率必须是1-100之间的数字 ！', 1, 'between', 3),
							",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'level_name' => array(
			'text' => '级别名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'bottom_num' => array(
			'text' => '积分下限',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'top_num' => array(
			'text' => '积分上限',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'rate' => array(
			'text' => '折扣率，100代表10折，95代表95折',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
			),
	'search' => array(),
);