<?php
namespace Home\Controller;
use Think\Controller;
class ManagerController extends Controller{
    
    public function regis()
	{
		if(IS_POST)
		{
			$model = D('Manager');
			if($model->login() === TRUE)
			{
				$this->success('登录成功！', U('Home/Member/lst'));
//                                var_dump($_SESSION['mg_id']);
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
        public function regis2(){
            $this->display();
        }
	// 生成验证码的图片
//	public function getImg()
//	{
////                echo 1;exit;
//            $config=array( 
//                'length'    =>  3,
//                'imageH'    =>  46,               // 验证码图片高度
//                'imageW'    =>  220,               // 验证码图片宽度
//                'fontttf'   =>  '1.ttf',              // 验证码字体，不设置随机获取
//                );
//		$Verify = new \Think\Verify($config);
//
//		$Verify->entry();
//
//                
//	}
	public function getImg()
	{


		$captcha = new \Think\Captcha();

		$captcha->generateCode(); //生成验证码
		$_SESSION['captcha'] = $captcha->getCode();

                
	}
        
        
	public function logout()
	{
//		$model = D('Adminuser/User');
//		$model->logout();
//		redirect(U('login'));
//        unset($_SESSION['mg_id']);
            session(null);
        $this->redirect("Manager/login");
//        echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.html">';
//        header("location:Admin/Manager/login");
//        $this->success(U('Admin/Manager/login'));
//        header("javascript:parent.window.location.href='__CONTROLLER__/login'");
//        <a href="javascript:parent.window.location.href= '../Index.aspx ';">
// exit('top.location.href="Admin/Manager/login"');
            
	}
        public function login(){
                
            if(IS_POST){
                $model = D('Member');
                $model->field($model)->find();
                if(3){
                    
                }else{
                    $this->error("此手机号未注册,请注册!",U('login'));
                }
                
            }
            
            
            $this->display();
        }
}

