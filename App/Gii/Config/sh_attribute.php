<?php
return array(
	'tableName' => 'sh_attribute',  // 数据库中的表名
	'moduleName' => 'Goods',    // 代码生成到的模块
	'moduleCnName' => '商品',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '属性',
	'insertFields' => "array('attr_name','attr_type','attr_option_value')",     // 允许添加的表单字段
	'updateFields' => "array('id','attr_name','attr_type','attr_option_value')",    // 允许修改的表单中的字段
	'validate' => "
							array('attr_name', 'require', '属性名称不能为空！', 1, 'regex', 3),
							array('attr_name', '', '属性名称已经存在！', 1, 'unique', 3),
							array('attr_type', 'require', '属性的类型不能为空！', 1, 'regex', 3),
				",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
			'attr_name' => array(
			'text' => '属性名称',
			'type' => 'text',
			'tip' => '请输入',
			'class' => 'required',
		),
			'attr_type' => array(
			'text' => '属性的类型',
			'type' => 'radio',
			'tip' => '请选择一个',
			'radioOptionValue' => array(
							'可选' => '可选',
							'唯一' => '唯一',
			),
			'class' => 'required',
		),
			'attr_option_value' => array(
			'text' => '可选值',
			'type' => 'text',
			'tip' => '如果属性是可选的，那么可选值有哪些，多个值用，隔开',
			'class' => 'required',
		),
			),
	'search' => array(
		array('attr_name', 'normal', '', 'like'),
	),
);