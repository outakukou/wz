<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends Controller{
	public function add()
	{
		// 判断是否是表单提交
                 
		if(IS_POST && $_SESSION['mobile_status'] == 1)
		{    
			$model = D('Member');
			if($model->create(I('post.'), 1))
			{
                             
				if($id = $model->add())
				{
                                        $_SESSION['user_id'] = $id;
					$this->success('操作成功--！', U('Home/Index/index'));
                                       
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
//				$err = $model->getError();
//				$this->error($err);
                                
                                $err = $model->getLastSql();
				$this->error($err);
			}
		}
                
                $password = I('post.password');
                $_SESSION['password'] = $password;
                $mobile = $_SESSION['mobile'];
               
                
               
                 $_SESSION['mobile_status'] = 1;
		$this->display();
                
	}
	public function edit($id)
	{
		if(IS_POST)
		{
                        echo "<script>alert( 提交了);</script>";
			$model = D('Member');
			if($data = $model->create(I('post.'), 2))
			{
//                            var_dump($data);exit; 
				if($model->save() !== FALSE)
				{
					$this->success('操作成功！', U('Index/index'));
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
					else{
                                            $this->error('操作失败，请重试！');
                                        }
						
				}
			}
			else 
			{
				$err = $model->getError();
				$this->error($err);
			}
		}
//                 echo "<script>alert('no post edit page');</script>";
		$model = M('Member');
                $sql = "select * from `wei_member` where id = $id";
		$data = $model->query($sql);
//                echo "<html>";
//                echo '<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"></head>';
//                var_dump($data);
//                echo "</html>";
//                exit;
               
		$this->assign('data', $data);

		$this->display();
	}
	public function del($id)
	{
		if($id > 1)
		{
			$model = D('User');
			$model->delete($id);
			$this->success('删除成功！', U('lst'));
			exit;
		}
		else 
			$this->error('无法删除超级管理员!');
		
	}
	public function bdel()
	{
		$delid = I('post.delid');
		if($delid)
		{
			// 判断管理员中有没有1这个管理员
			foreach ($delid as $id)
			{
				if($id == 1)
					$this->error('超级管理员不能被删除！');
			}
			$delid = implode(',', $delid);
			$model = D('User');
			$model->delete($delid);
			$this->success('删除成功！', U('lst'));
			exit;
		}
		else 
			$this->error('必须选中删除的记录！');
	}
	public function lst()
	{
		$model = D('Member');
                $id = $_SESSION['user_id'];
		$data = $model->search($id);
		$this->assign('data',$data);
//                echo '<html>';
//                echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
//               var_dump($data);
//               echo "</html>";
//               exit;
		$this->display();
	}
        
        public function before_add(){
            
            $this->display();

        }
        public function editpsw($id){
            
                if(IS_POST){
                    $model = D('member');
                    $oldpwd = I('oldpwd');
                    $password = I('password');
                    $repassword = I('repassword');
                    $oldpwd = md5($oldpwd.C('MD5_KEY'));

                    if($data = $model->where("id=".$id)->find()){
                        
                        if($oldpwd != $data['password']){

                            $this->error("密码不正确");exit;
                        }else{
                               if(empty($password)||empty($repassword)){
                                    $this->error("密码不能为空");exit;
                               }else{
                                                               
                                        if($password != $repassword){
                                            $this->error("新密码不一致");exit;
                                        }else{
                                            $repassword = md5($password.C('MD5_KEY'));
                                            $sql = "update wei_member set password = ('$repassword') where id={$id};";
                                            if($model->execute($sql)){
                                                
                                                $this->success('数据修改成功',U("__ROOT__/index.php/Home/Member/edit?id=$id"));
                                            }else{
                                                $err = $model->getLastSql();
                                                echo $err;exit;
                                                $this->error("$err.数据插入异常,请重试!");
                                            }
                                         }
                                }
                        }

                    }else{
                            $err = $model->getError();
                            $this->error("该用户不存在",U('Index/index'));
                    }

                }

            $this->display();
        }

        
        public function changeFace($id){
          
                $model = D('member');

               $upload = new \Think\Upload();// 实例化上传类
               $upload->maxSize   =     3145728 ;// 设置附件上传大小
               $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
               $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
               $upload->savePath  =     'Member/'; // 设置附件上传（子）目录
               // 上传文件 
               $info   =   $upload->upload();
               if(!$info) {

                   $this->error($upload->getError());
                  
               }else{
                   
                    $oldsql = "select face,sm_face from wei_member where id = $id";
                    $oldpic = $model->query($oldsql);
                    foreach($oldpic[0] as $k=>$v){
                        @unlink(IMG_URL_HD .$v);
                    }

                   //上传文件后,必须返回保存的路径和保存名称---程序员才能使用他
                   //使用保存的路径--保存名称---拼接文件名--保存到数据库中.
                   $face = $info['face']['savepath'].$info['face']['savename'];
                   $sm_face = $info['face']['savepath']."sm132_".$info['face']['savename'];
                   
                   $img  = new \Think\Image();
                   $img->open(IMG_URL_HD .$face);
                   $img->thumb(132, 132)->save(IMG_URL_HD . $sm_face);
                   

                   $sql = "update wei_member set face = ('$face'),sm_face = ('$sm_face') where id = $id";
                   $model->execute($sql);
                   
                   
//                   echo json_decode($sm_face);
               }



            
        }
         public function getNewFace($id){
    
                $model = D('Member');
//                $sm_face = $model->field('sm_face')->find($id);
                $sql = "select sm_face from wei_member where id = $id";
                $sm_face = $model->query($sql);
                echo $sm_face[0]['sm_face'];
            }
}