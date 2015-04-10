<?php
return array(
	'tableName' => 'sh_ad_pos',  // 数据库中的表名
	'moduleName' => 'Ad',    // 代码生成到的模块
	'moduleCnName' => '广告',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '广告位',
		'insertFields' => "array('pos_name','pos_width','pos_height')",     // 允许添加的表单字段
	'updateFields' => "array('id','pos_name','pos_width','pos_height')",    // 允许修改的表单中的字段
	'validate' => "
							array('pos_name', 'require', '广告位名称不能为空！', 1, 'regex', 3),
							array('pos_width', 'require', '宽不能为空！', 1, 'regex', 3),
							array('pos_width', '/^\d+$/', '宽必须是一个整数！', 2, 'regex', 3),
							array('pos_height', 'require', '高不能为空！', 1, 'regex', 3),
							array('pos_height', '/^\d+$/', '高必须是一个整数！', 2, 'regex', 3),
							",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'pos_name' => array(
			'text' => '广告位名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'pos_width' => array(
			'text' => '宽',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'pos_height' => array(
			'text' => '高',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
			),
	'search' => array(),
);