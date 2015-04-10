<?php
return array(
	'tableName' => 'sh_category',  // 数据库中的表名
	'moduleName' => 'Goods',    // 代码生成到的模块
	'tableCnName' => '商品分类',
	'insertFields' => "array('cat_name','parent_id','price_section','search_attr_id')",     // 允许添加的表单字段
	'updateFields' => "array('id','cat_name','parent_id','price_section','search_attr_id')",    // 允许修改的表单中的字段
	'validate' => "
							array('cat_name', 'require', '分类名称不能为空！', 1, 'regex', 3),
							array('cat_name', '', '分类名称已经存在！', 1, 'unique', 3),
							array('parent_id', '/^\d+$/', '上级分类必须是一个整数！', 2, 'regex', 3),
							array('price_section', '/^\d+$/', '价格区间必须是一个整数！', 2, 'regex', 3),
							",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'cat_name' => array(
			'text' => '分类名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'parent_id' => array(
			'text' => '上级分类',
						'type' => 'select',
						'dataSource' => array(
								'$_selData=M(\'Category\')->select();',
								'id',
								'cat_name'
							),
			'tip' => '选择上级分类',
						'class' => '',
		),
				'price_section' => array(
			'text' => '价格区间',
						'type' => 'text',
			'tip' => '请输入',
						'class' => '',
		),
				'search_attr_id' => array(
			'text' => '筛选属性',
						'type' => 'text',
			'tip' => '请输入',
						'class' => '',
		),
			),
	'search' => array(),
);