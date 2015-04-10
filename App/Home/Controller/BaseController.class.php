<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	//在这个控制器中进行验证
	public function __construct(){
		parent::__construct(); //显式调用父类的构造函数
		$this->checkLogin();

	}
//	验证方法
	public function checkLogin(){
            session_start();
		//判断session中是否有保存登录的标识符
               if( !isset($_SESSION['user_id'])){
                 
//                   echo 'nologin';
//        header("Location:__MODULE__/Manager/login");
//        header("Location:/Manager/login");
//         $this->success('成功', 'Index/index');
         $this->redirect('Home/Login/login');
//        header("Location:index.php?p=admin&c=privilege&a=login");
//                  Redirect('__MODULE__/Manager/login');
            }
	}

}