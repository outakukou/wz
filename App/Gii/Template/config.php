return array(
	'tableName' => '<?php echo $___v; ?>',  // 数据库中的表名
	'moduleName' => '<?php echo $tpName; ?>',    // 代码生成到的模块
	'moduleCnName' => '',    // 模块的中文名-这个名字就是插入节点表时的模块节点名字
	'tableCnName' => '<?php echo $_tableInfo['Comment']; ?>',
	<?php
	$_fields_arr = array();
	foreach ($_tableFields as $k => $v)
	{
		if($v['Field'] == 'id')
			continue ;
		$_fields_arr[] = "'{$v['Field']}'";
	}
	$_fields_arr = implode(',', $_fields_arr);
	?>
	'insertFields' => "array(<?php echo $_fields_arr; ?>)",     // 允许添加的表单字段
	'updateFields' => "array('id',<?php echo $_fields_arr; ?>)",    // 允许修改的表单中的字段
	'validate' => "
		<?php foreach ($_tableFields as $k => $v): 
				if($v['Field'] == 'id')
					continue ;
				if($v['Null'] == 'NO' && $v['Default'] === null):
		?>
					array('<?php echo $v['Field']; ?>', 'require', '<?php echo $v['Comment']; ?>不能为空！', 1, 'regex', 3),
				<?php endif;
				if($v['Field'] == 'email'): ?>
					array('<?php echo $v['Field']; ?>', 'email', '<?php echo $v['Comment']; ?>格式不正确！', 1, 'regex', 3),
				<?php endif;
				if(strpos($v['Type'], 'int') !== FALSE): ?>
					array('<?php echo $v['Field']; ?>', '/^\d+$/', '<?php echo $v['Comment']; ?>必须是一个整数！', 2, 'regex', 3),
		<?php endif;endforeach; ?>
					",  // 模型中的表单验证规则
	'fields' => array(            // 表单中显示的字段
		<?php foreach ($_tableFields as $k => $v): 
				if($v['Field'] == 'id')
					continue ;
		?>
		'<?php echo $v['Field']; ?>' => array(
			'text' => '<?php echo $v['Comment']; ?>',
			<?php 
			if(preg_match('/(image|logo|face|img|pic)/', $v['Field'])): ?>
			'type' => 'file',
			'tip' => '请上传一张图片',
			<?php elseif($v['Type'] == 'text'): ?>
			'type' => 'html',
			'tip' => '',
			<?php elseif(strpos($v['Type'], 'enum') !== FALSE): ?>
			'type' => 'radio',
			'tip' => '请选择一个',
			'radioOptionValue' => array(
			<?php 
				$_arr = explode("','", $v['Type']);
				foreach ($_arr as $k1 => $v1):
					$_value = str_replace("enum('", '', $v1);
					$_value = str_replace("')", '', $_value);
			?>
				'<?php echo $_value; ?>' => '<?php echo $_value; ?>',
			<?php endforeach; ?>
			),
			<?php else: ?>
			'type' => 'text',
			'tip' => '请输入',
			<?php endif; ?>
			'class' => 'required',
		),
		<?php endforeach; ?>
	),
	'search' => array(
		<?php foreach ($_tableFields as $k => $v): ?>
		array('<?php echo $v['Field']; ?>', 'normal', '', '='),
		<?php endforeach; ?>
	),
);