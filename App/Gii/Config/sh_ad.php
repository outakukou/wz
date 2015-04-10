<?php
return array(
	'tableName' => 'sh_ad',  // 数据库中的表名
	'moduleName' => 'Ad',    // 代码生成到的模块
	'moduleCnName' => '广告',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '广告',
		'insertFields' => "array('ad_name','ad_type','ad_link','ad_code')",     // 允许添加的表单字段
	'updateFields' => "array('id','ad_name','ad_type','ad_link','ad_code')",    // 允许修改的表单中的字段
	'validate' => "
							array('ad_name', 'require', '广告名称不能为空！', 1, 'regex', 3),
							array('ad_type', 'require', '广告类型不能为空！', 1, 'regex', 3),
									",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'ad_name' => array(
			'text' => '广告名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'ad_type' => array(
			'text' => '广告类型',
						'type' => 'radio',
			'tip' => '请选择一个',
			'radioOptionValue' => array(
							'图片' => '图片',
							'图片轮换' => '图片轮换',
							'代码' => '代码',
							'文字' => '文字',
						),
						'class' => 'required',
		),
				'img_url' => array(
			'text' => '图片广告的图片',
						'type' => 'file',
			'tip' => '请上传一张图片',
						'class' => 'required',
		),
				'ad_link' => array(
			'text' => '广告的链接地址',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
			'ad_code' => array(
			'text' => '代码/文字',
			'type' => 'text',
			'tip' => '',
			'class' => 'required',
		),
			),
	'search' => array(
				array('ad_name', 'normal', '', 'like'),
				array('ad_type', 'normal', '', '='),
			),
);