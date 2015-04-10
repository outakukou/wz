<?php
namespace Home\Controller;
use Think\Controller;
class GoController extends Controller{
	


	public function go(){

        $haha = $_GET['mobile'];
        $password = $_GET['password'];
         echo "you mobile is--".$haha."<br/>"."password is =".$password;
         

       
	}

}