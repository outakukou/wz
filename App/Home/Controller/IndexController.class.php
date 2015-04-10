<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;

class IndexController extends BaseController {

    public function index(){
        

        $model = D('Member');
       
        $info = $model->search($_SESSION['user_id']);
        $this->assign('info',$info);
        
        $this->display();
    }

}