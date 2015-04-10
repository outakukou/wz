<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function login()
	{
		if(IS_POST)
		{//控制器仅判断如果是提交.就委派model去收集数据.--返回TRUE FALSE就行
			$model = D('Member');
			if( $model->login()!==FALSE)
			{       
                                
				$this->success('登录成功！', U('Home/Index/index'));
				exit;
			}
			else 
			{
				$error = $model->getError();
				$this->error($error);	
			}
		}
		$this->display();
	}

	public function logout()
	{
		session('user_id',null);
		redirect(U('login'));
	}
}