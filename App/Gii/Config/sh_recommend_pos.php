<?php
return array(
	'tableName' => 'sh_recommend_pos',  // 数据库中的表名
	'moduleName' => 'Recommend',    // 代码生成到的模块
	'moduleCnName' => '推荐模块',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '推荐位',
	'insertFields' => "array('pos_name','pos_type')",     // 允许添加的表单字段
	'updateFields' => "array('id','pos_name','pos_type')",    // 允许修改的表单中的字段
	'validate' => "
		array('pos_name', 'require', '推荐位名称不能为空！', 1, 'regex', 3),
		array('pos_type', 'require', '推荐位的类型不能为空！', 1, 'regex', 3),
	",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'pos_name' => array(
			'text' => '推荐位名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'pos_type' => array(
			'text' => '推荐位的类型',
						'type' => 'radio',
			'tip' => '请选择一个',
			'radioOptionValue' => array(
							'商品' => '商品',
							'商品分类' => '商品分类',
						),
						'class' => 'required',
		),
			),
	'search' => array(),
);