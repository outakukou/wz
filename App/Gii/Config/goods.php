<?php
return array(
	'tableName' => 'sh_goods',  // 数据库中的表名
	'moduleName' => 'Goods',    // 代码生成到的模块
	'tableCnName' => '商品',
	'insertFields' => "array('goods_name','price','goods_number','goods_desc')",     // 允许添加的表单字段
	'updateFields' => "array('id','goods_name','price','goods_number','goods_desc')",    // 允许修改的表单中的字段
	'validate' => "array('goods_name', 'require', '商品名称不能为空！', 1, 'regex', 3),
					array('goods_name', '', '商品名称已经存在！', 1, 'unique', 3),
					array('price', 'currency', '价格格式不正确！', 1, 'regex', 3),
					array('goods_number', '/^\d+$/', '商品库存量必须是整数！', 1, 'regex', 3),",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
		'goods_name' => array(
			'text' => '商品名称',
			'type' => 'text',       // 表单中元素的类型
			'tip' => '最多30个字符',  // 字段上的说明文字
			'class' => 'required',    // js表单验证的规则
		),
		'logo' => array(
			'text' => '图片',
			'type' => 'file', 
			'tip' => '', 
			'class' => '',
			'bizRule' => '"<img width=\'50\' src=\''.IMG_URL.'$v[logo]\' />"',
		),
		'price' => array(
			'text' => '价格',
			'type' => 'text', 
			'tip' => '必须是一个数字', 
			'class' => 'required number',
		),
		'goods_number' => array(
			'text' => '库存量',
			'type' => 'text', 
			'tip' => '必须是一个整数', 
			'class' => 'required digits',
		),
		'goods_desc' => array(
			'text' => '商品描述',
			'type' => 'html', 
			'tip' => '', 
			'class' => '',
		),
		'is_on_sale' => array(
			'text' => '是否上框',
			'type' => 'radio', 
			'radioOptionValue' => array(
				'1' => '是',
				'0' => '否',
			),
			'tip' => '', 
			'class' => '',
			'bizRule' => '$v[is_on_sale]==1?"是":"否"',                 // 显示时的事务逻辑
		),
	),
	'search' => array(
		array('goods_name', 'normal', '', 'like'),
		array('price', 'betweenValue', 'sp,ep'),
		array('addtime', 'betweenTime', 'st,et', '添加时间'),
	),
);