namespace <?php echo $config['moduleName']; ?>\Model;
use Think\Model;
class <?php echo $tpName; ?>Model extends Model 
{
	protected $insertFields = <?php echo $config['insertFields']; ?>;
	protected $updateFields = <?php echo $config['updateFields']; ?>;
	protected $_validate = array(<?php echo $config['validate']; ?>);
	
	public function search()
	{
		$where = 1;
		<?php foreach ($config['search'] as $k => $v): 
			if($v[1] == 'normal'): ?>
				$<?php echo $v[0]; ?> = I('get.<?php echo $v[0]; ?>');
				if($<?php echo $v[0]; ?>)
					<?php if($v[3] == 'like'): ?>
						$where .= " AND <?php echo $v[0]; ?> LIKE '%$<?php echo $v[0]; ?>%'";
					<?php else : ?>
						$where .= " AND <?php echo $v[0]; ?> <?php echo $v[3]; ?> '$<?php echo $v[0]; ?>'";
					<?php endif; ?>
			<?php elseif(strpos($v[1], 'between') === 0) : 
				// 如果要搜索的是一个区间范围，如价格从xx到xx那么就要循环两个区间接收开始和结束的值
				$_arr = explode(',', $v[2]);
				foreach ($_arr as $k1 => $v1): ?>
					$<?php echo $v1; ?> = I('get.<?php echo $v1; ?>');
					if($<?php echo $v1; ?>)
						$where .= " AND <?php echo $v[0]; ?> <?php echo $k1 == 0 ? '>' : '<'; ?> '$<?php echo $v1; ?><?php if($v[1] == 'betweenTime' && $k1 == 1) echo ' 23:59:59'; ?>'";
		<?php endforeach;endif;endforeach; ?>
		/****************** 排序：拼排序的字符串 *********************/
		$ob = I('get.ob', 'id');   // 接收排序的字段，默认是id
		$ow = I('get.ow', 'asc');  // 接收排序的方式，默认是升序
		// 限制排序字段只能是id或者price
		if(!in_array($ob, array('id', 'price')))
			$ob = 'id';
		// 限制排序方式只能是asc或者desc
		if(!in_array($ow, array('asc', 'desc')))
			$ow = 'asc';
		/***************** 翻页 ******************************/
		// 先取出总的记录数
		$totalRecord = $this->where($where)->count();
		// 生成翻页对象
		$page = new \Think\Page($totalRecord, 10);
		// 指定上一页下一页的显示汉字，默认是>>和<<
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		// 生成页面中用来翻的字符串
		$pageString = $page->show();
		// 根据前面构造的where、order和limit变量构造SQL语句并查询数据库返回数据
		$data = $this->where($where)->order("$ob $ow")->limit($page->firstRow.','.$page->listRows)->select();
		// 返回数据和翻页的字符串
		return array(
			'data' => $data,
			'page' => $pageString,
		);
	}
	public function _before_insert(&$data, $option)
	{
		<?php 
		// 循环配置文件中所有配置了的字段，判断有没有图片类型的字段
		foreach ($config['fields'] as $k => $v):
			if($v['type'] == 'file'):
		?>
			// 判断用户是否上传了图片
			if(isset($_FILES['<?php echo $k; ?>']) && $_FILES['<?php echo $k; ?>']['error'] == 0)
			{
				// 从配置文件中取出允许上传的图片的类型
				$auf = C('ALLOW_UPLOAD_FILETYPE');
				// 从配置文件中取出图片的最大尺寸
				$muf = C('MAX_UPLOAD_FILESIZE');
				// 从php.ini中读出系统对图片的硬限制
				$umf = ini_get('upload_max_filesize');
				// 实际的限制应该是以上两项中小者
				$maxFileSize = (int)min($muf, $umf);
				// 插入数据库之前先上传logo图片
				$upload = new \Think\Upload();// 实例化上传类
			    $upload->maxSize = $maxFileSize * 1024 * 1024;
			    $upload->exts = $auf;// 设置附件上传类型
			    $upload->rootPath = './Uploads/'; // 设置附件上传根目录
			    $upload->savePath = '<?php echo $config['moduleName']; ?>/'; // 设置附件上传（子）目录
			    // 上传文件 
			    $info = $upload->upload();
			    if($info)
			    {
			    	$data['<?php echo $k; ?>'] = $info['<?php echo $k; ?>']['savepath'] . $info['<?php echo $k; ?>']['savename'];
			    	<?php if(isset($v['thumb']) && $v['thumb']): ?>
			    		$image = new \Think\Image(); 
			    		$image->open(IMG_URL_HD . $info['<?php echo $k; ?>']['savepath'] . $info['<?php echo $k; ?>']['savename']);
			    		<?php 
			    			// 循环生成每个缩略图
			    		foreach ($v['thumb'] as $k1 => $v1): ?>
			    			// 先拼出缩略图的名字
			    			$thumbName = $info['<?php echo $k; ?>']['savepath'] . 'thumb<?php echo $k1; ?>_' . $info['<?php echo $k; ?>']['savename'];
			    			// 生成缩略图
			    			$image->thumb(<?php echo $v1[1]; ?>,<?php echo $v1[2]; ?>)->save(IMG_URL_HD . $thumbName);
			    			// 生成完之后存到数据库中
			    			$data['<?php echo $v1[0]; ?>'] = $thumbName;
			    		<?php endforeach; ?>
			    	<?php endif; ?>
			    }
			   	else 
			   	{
			   		// 把错误信息放到这个模型中，然后在控制器中通过$model->getError()方法获取这个错误信息
			   		$this->error = $upload->getError();
			   		return FALSE;
			   	}
			}
		<?php endif;endforeach; ?>
	}
	public function _before_update(&$data, $option)
	{
		<?php 
		// 循环配置文件中所有配置了的字段，判断有没有图片类型的字段
		foreach ($config['fields'] as $k => $v):
			if($v['type'] == 'file'):
		?>
			// 判断用户是否上传了图片
			if(isset($_FILES['<?php echo $k; ?>']) && $_FILES['<?php echo $k; ?>']['error'] == 0)
			{
				<?php // 找出这个图片对应几个路径路径
					$oldImageFields = array('old_'.$k);
					// 找出有没有缩略图
					if(isset($config['fields'][$k]['thumb']) && $config['fields'][$k]['thumb'])
					{
						foreach ($config['fields'][$k]['thumb'] as $k1 => $v1)
						{
							$oldImageFields[] = 'old_'.$v1[0];
						}
					}
					// 循环每一个旧图并删除
					foreach ($oldImageFields as $k1 => $v1)
					{
						echo "@unlink(IMG_URL_HD . I('post.$v1'));\r\n";
					}
				?>
				// 从配置文件中取出允许上传的图片的类型
				$auf = C('ALLOW_UPLOAD_FILETYPE');
				// 从配置文件中取出图片的最大尺寸
				$muf = C('MAX_UPLOAD_FILESIZE');
				// 从php.ini中读出系统对图片的硬限制
				$umf = ini_get('upload_max_filesize');
				// 实际的限制应该是以上两项中小者
				$maxFileSize = (int)min($muf, $umf);
				// 插入数据库之前先上传logo图片
				$upload = new \Think\Upload();// 实例化上传类
			    $upload->maxSize = $maxFileSize * 1024 * 1024;
			    $upload->exts = $auf;// 设置附件上传类型
			    $upload->rootPath = './Uploads/'; // 设置附件上传根目录
			    $upload->savePath = '<?php echo $config['moduleName']; ?>/'; // 设置附件上传（子）目录
			    // 上传文件 
			    $info = $upload->upload();
			    if($info)
			    {
			    	$data['<?php echo $k; ?>'] = $info['<?php echo $k; ?>']['savepath'] . $info['<?php echo $k; ?>']['savename'];
			    	<?php if(isset($v['thumb']) && $v['thumb']): ?>
			    		$image = new \Think\Image(); 
			    		$image->open(IMG_URL_HD . $info['<?php echo $k; ?>']['savepath'] . $info['<?php echo $k; ?>']['savename']);
			    		<?php 
			    			// 循环生成每个缩略图
			    		foreach ($v['thumb'] as $k1 => $v1): ?>
			    			// 先拼出缩略图的名字
			    			$thumbName = $info['<?php echo $k; ?>']['savepath'] . 'thumb<?php echo $k1; ?>_' . $info['<?php echo $k; ?>']['savename'];
			    			// 生成缩略图
			    			$image->thumb(<?php echo $v1[1]; ?>,<?php echo $v1[2]; ?>)->save(IMG_URL_HD . $thumbName);
			    			// 生成完之后存到数据库中
			    			$data['<?php echo $v1[0]; ?>'] = $thumbName;
			    		<?php endforeach; ?>
			    	<?php endif; ?>
			    }
			   	else 
			   	{
			   		// 把错误信息放到这个模型中，然后在控制器中通过$model->getError()方法获取这个错误信息
			   		$this->error = $upload->getError();
			   		return FALSE;
			   	}
			}
		<?php endif;endforeach; ?>
	}
	protected function _before_delete($data)
	{
		<?php // 先找出所有的图片字段
		$imageFields = array();  // 表中所有图片的字段名称
		foreach ($config['fields'] as $k => $v)
		{
			if($v['type'] == 'file')
			{
				// 把字段名存到数组中
				$imageFields[] = $k;
				// 再循环有没有缩略图的字段
				if(isset($v['thumb']) && $v['thumb'])
				{
					foreach ($v['thumb'] as $k1 => $v1)
					{
						$imageFields[] = $v1[0];
					}
				}
			}
		}
		// 如果有图片字段，就转成一个字符串
		if($imageFields)
		{
			$imageFields_string = implode(',', $imageFields);
		?>
			if(is_array($data['where']['id']))
			{
				$image = $this->field('<?php echo $imageFields_string; ?>')->where("id IN({$data['where']['id'][1]})")->select();
				foreach ($image as $k => $v)
				{
					<?php foreach ($imageFields as $k => $v): ?>
					@unlink(IMG_URL_HD . $v['<?php echo $v; ?>']);
					<?php endforeach; ?>
				}
			}
			else 
			{
				$info = $this->field('<?php echo $imageFields_string; ?>')->find($data['where']['id']);
				<?php foreach ($imageFields as $k => $v): ?>
				@unlink(IMG_URL_HD . $info['<?php echo $v; ?>']);
				<?php endforeach; ?>
			}
		<?php } ?>
	}
}













