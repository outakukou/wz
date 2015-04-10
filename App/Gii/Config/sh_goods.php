<?php
return array(
	'tableName' => 'sh_goods',  // 数据库中的表名
	'moduleName' => 'Goods',    // 代码生成到的模块
	'moduleCnName' => '商品',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '商品',
	'insertFields' => "array('type_id','cat_id','goods_name','market_price','shop_price','goods_desc','is_on_sale')",     // 允许添加的表单字段
	'updateFields' => "array('id','type_id','cat_id','goods_name','market_price','shop_price','goods_desc','is_on_sale')",    // 允许修改的表单中的字段
	'validate' => "
							array('type_id', '/^\d+$/', '商品类型的id必须是一个整数！', 1, 'regex', 3),
							array('cat_id', 'require', '商品所在主分类不能为空！', 1, 'regex', 3),
							array('cat_id', '/^\d+$/', '商品所在主分类必须是一个整数！', 2, 'regex', 3),
							array('goods_name', 'require', '商品名称不能为空！', 1, 'regex', 3),
									",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
				'cat_id' => array(
			'text' => '商品所在主分类',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'goods_name' => array(
			'text' => '商品名称',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'market_price' => array(
			'text' => '市场价格',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'shop_price' => array(
			'text' => '本店价格',
						'type' => 'text',
			'tip' => '请输入',
						'class' => 'required',
		),
				'logo' => array(
			'text' => 'logo',
						'type' => 'file',
			'tip' => '请上传一张图片',
						'class' => 'required',
		),
				'goods_desc' => array(
			'text' => '商品描述',
						'type' => 'html',
			'tip' => '',
						'class' => 'required',
		),
				'is_on_sale' => array(
			'text' => '是否上架',
						'type' => 'radio',
			'tip' => '请选择一个',
			'radioOptionValue' => array(
							'是' => '是',
							'否' => '否',
						),
						'class' => 'required',
		),
			),
	'search' => array(
				array('type_id', 'normal', '', '='),
				array('cat_id', 'normal', '', '='),
				array('goods_name', 'normal', '', 'like'),
				array('shop_price', 'betweenValue', 'sp,ep'),
				array('addtime', 'betweenTime', 'st,et', '添加时间'),
				array('is_on_sale', 'normal', '', '='),
	),
);