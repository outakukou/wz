<?php
return array(
	'tableName' => 'sh_type',  // 数据库中的表名
	'moduleName' => 'Goods',    // 代码生成到的模块
	'moduleCnName' => '商品',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '商品类型',
	'insertFields' => "array('type_name')",     // 允许添加的表单字段
	'updateFields' => "array('id','type_name')",    // 允许修改的表单中的字段
	'validate' => "
				array('type_name', 'require', '类型名称不能为空！', 1, 'regex', 3),
				array('type_name', '', '类型名称已经存在！', 1, 'unique', 3),
				",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
			'type_name' => array(
			'text' => '类型名称',
			'type' => 'text',
			'tip' => '请输入',
			'class' => 'required',
		),
			),
	'search' => array(
				array('type_name', 'normal', '', 'like'),
	),
);