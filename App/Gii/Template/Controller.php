namespace <?php echo $config['moduleName']; ?>\Controller;
class <?php echo $tpName; ?>Controller extends \Home\Controller\IndexController {
	public function add()
	{
		// 判断是否是表单提交
		if(IS_POST)
		{
			$model = D('<?php echo $tpName; ?>');
			if($model->create(I('post.'), 1))
			{
				if($id = $model->add())
				{
					$this->success('操作成功！', U('lst'));
					exit;
				}
				else 
				{
					$error = $model->getError();
					if($error)
						$this->error($error);
					if(APP_DEBUG)
					{
						echo '失败，调试SQL：'.$model->getLastSql().',错误原因：'.mysql_error();
						exit;
						
					}
					else
						$this->error('操作失败，请重试！');
				}
			}
			else 
			{
				$err = $model->getError();
				$this->error($err);
			}
		}
		$this->display();
	}
	public function edit($id)
	{
		if(IS_POST)
		{
			$model = D('<?php echo $tpName; ?>');
			if($model->create(I('post.'), 2))
			{
				if($model->save() !== FALSE)
				{
					$this->success('操作成功！', U('lst'));
					exit;
				}
				else 
				{
					$error = $model->getError();
					if($error)
						$this->error($error);
					if(APP_DEBUG)
					{
						echo '失败，调试SQL：'.$model->getLastSql().',错误原因：'.mysql_error();
						exit;
						
					}
					else
						$this->error('操作失败，请重试！');
				}
			}
			else 
			{
				$err = $model->getError();
				$this->error($err);
			}
		}
		$model = M('<?php echo $tpName; ?>');
		$data = $model->find($id);
		$this->assign('data', $data);
		$this->display();
	}
	public function del($id)
	{
		$model = D('<?php echo $tpName; ?>');
		$model->delete($id);
		$this->success('删除成功！', U('lst'));
		exit;
	}
	public function bdel()
	{
		$delid = I('post.delid');
		if($delid)
		{
			$delid = implode(',', $delid);
			$model = D('<?php echo $tpName; ?>');
			$model->delete($delid);
			$this->success('删除成功！', U('lst'));
			exit;
		}
		else 
			$this->error('必须选中删除的记录！');
	}
	public function lst()
	{
		$model = D('<?php echo $tpName; ?>');
		$data = $model->search();
		$this->assign(array(
			'data' => $data['data'],
			'page' => $data['page'],
		));
		$this->display();
	}
}