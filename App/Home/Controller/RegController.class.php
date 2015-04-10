<?php
namespace Home\Controller;
use Think\Controller;

class RegController extends Controller{

    public function validate(){
        
        if($_POST){
	//echo '<pre>';print_r($_POST);print_r($_SESSION);
            if($_POST['mobile']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])){
                echo '<html>';
                echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
                echo "<script>alert('手机或验证码不正确!');  history.back();</script>"; 
                echo '</html>';
                exit;



            }else{
//                    $_SESSION['mobile'] = '';
//                    $_SESSION['mobile_code'] = '';
//                    $moble = $_SESSION['mobile'];
                    $_SESSION['mobile_status'] = "0";
//                    header("Location:".__MODULE__."/Member/add"); 
                    header("Location:".__MODULE__."/Member/before_add"); 
//                    $this->success('操作成功！', U('Member/add'),2);

            }
        }
    

    }

   

}