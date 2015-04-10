<?php
return array(
	'tableName' => 'sh_article',  // 数据库中的表名
	'moduleName' => 'Article',    // 代码生成到的模块
	'moduleCnName' => '',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '文章',
		'insertFields' => "array('title','addtime','content')",     // 允许添加的表单字段
	'updateFields' => "array('id','title','addtime','content')",    // 允许修改的表单中的字段
	'validate' => "
							array('title', 'require', '标题不能为空！', 1, 'regex', 3),
									array('addtime', 'require', '添加时间不能为空！', 1, 'regex', 3),
									array('content', 'require', '文章内容不能为空！', 1, 'regex', 3),
									",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'title' => array(
			'text' => '标题',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'addtime' => array(
			'text' => '添加时间',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'content' => array(
			'text' => '文章内容',
						'type' => 'html',
			'tip' => '',
						'class' => 'required',
		),
			),
	'search' => array(
				array('id', 'normal', '', '='),
				array('title', 'normal', '', '='),
				array('addtime', 'normal', '', '='),
				array('content', 'normal', '', '='),
			),
);