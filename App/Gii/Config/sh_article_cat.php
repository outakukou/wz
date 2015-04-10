<?php
return array(
	'tableName' => 'sh_article_cat',  // 数据库中的表名
	'moduleName' => 'ArticleCat',    // 代码生成到的模块
	'moduleCnName' => '',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '文章分类',
		'insertFields' => "array('cat_name','cat_type')",     // 允许添加的表单字段
	'updateFields' => "array('id','cat_name','cat_type')",    // 允许修改的表单中的字段
	'validate' => "
							array('cat_name', 'require', '分类名称不能为空！', 1, 'regex', 3),
									array('cat_type', 'require', '分类的类型不能为空！', 1, 'regex', 3),
									",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'cat_name' => array(
			'text' => '分类名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'cat_type' => array(
			'text' => '分类的类型',
						'type' => 'radio',
			'tip' => '请选择一个',
			'radioOptionValue' => array(
							'帮助' => '帮助',
							'快讯' => '快讯',
						),
						'class' => 'required',
		),
			),
	'search' => array(
				array('id', 'normal', '', '='),
				array('cat_name', 'normal', '', '='),
				array('cat_type', 'normal', '', '='),
			),
);