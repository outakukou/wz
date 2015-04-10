<?php
namespace Activity\Controller;

class ActivityController extends \Home\Controller\IndexController{
   
    public function lst(){

         $model = D('Company');
         $user_id = $_SESSION['user_id'];
         $data = $model->where('user_id='.$user_id)->find();
       
    
//        var_dump($data);exit;
        
         $this->assign(array(
              'data'=>$data,

         ));

        $this->display();
    }
    public function reedit(){
        
//        $uid = $_GET['uid'];
        $uid = $_SESSION['user_id'];
         $model = D('Company');
         
        $data = $model->where('user_id='.$uid)->find();

        
         $this->assign(array(
              'data'=>$data,

         ));

        $this->display();
    }
    public function reedit2(){
        
        if(IS_POST){
            $model = D('Company');
            $data=  I('post.');
            $title = $data['title'];
            $type = $data['type'];
            $newstr = $data['contents'];
            $addtime  = date('Y-m-d H:i:s');
            $user_id = $_SESSION['user_id'];
                
             $sql = "replace into `wei_company` (`type`,`title`,`user_id`,`contents`,`addtime`)values('$type','$title','$user_id','$newstr','$addtime');";                            

                          if($model->execute($sql)){

                              $this->success('操作成功',U(introco));exit;
                          }else{
                              echo $model->getError();exit;
                              $this->error('操作失败,请重试!');
                          };     

                
        }
        
        
        $uid = $_SESSION['user_id'];
        $model = D('Company');
        $data = $model->where('user_id='.$uid)->find();

         $this->assign(array(
              'data'=>$data,
         ));

        $this->display();
    }
    public function add(){
        if(IS_POST){
            $model = D('Jingbei');
            if($model->create()){
                if($model->add()){
                    $this->success("操作成功",U("lst"));
                    exit;//如果不退出.还会接着dispaly这个页面,在下面.
                }else{
                     if(APP_DEBUG){

                      echo '执行失败,调试SQL:'.$model->getLastSql().'错误原因:'.mysql_error();
                      exit;
                                }else {
                                         $this->error('操作失败,请重试!');
                                }
                }
                
            }else{
               $err = $model->getError();
               $this->error($err);
            }
        }
        $this->display();
    }
    public function edit(){
        
        if($_POST){

          $model = D('Company');
         
            if( isset($_SESSION['user_id'])){
                
                $data = I('post.');
                $type = $data['type'];
                $title = $data['title'];
                $addtime  = date('Y-m-d H:i:s');
                $user_id = $_SESSION['user_id'];

               
                if (isset($_FILES['pic'])) {
                            $upload = new \Think\Upload(); 
                            $upload->maxSize = 3 * 1024 * 1024;
                            $upload->rootPath = './Uploads/'; //根路径
                            $upload->savePath = 'Company/'; //保存路径

                            $picinfo = $upload->upload();
                            
                          
                            $smpic = $picinfo['savepath']."sm568_".$picinfo['savename'];
                            $img = new \Think\Image();
                            $smpicarr = array();
                            foreach($picinfo as $k=>$v){
                                $img->open(IMG_URL_HD.$v['savepath'].$v['savename']);
                                $img->thumb(568, 294)->save(IMG_URL_HD.$v['savepath']."sm568_".$v['savename']);
                                $smpicarr[] = $v['savepath']."sm568_".$v['savename'];
                            }
                            
                            

                            $newpic = array();
                            $newpicimg = array();
                            foreach($smpicarr as $k=>$v){
                                $newpic[$k] =IMG_URL .$v;
                            }
                            foreach($newpic as $k=>$v){
                               $newpicimg[$k] = "<br/><img src=$v><br/>";
                            }

                            $desc = $data['desc'];
                            $contents = '';


                            $num = count($desc)>count($newpicimg)?count($desc):count($newpicimg);
                            $num2 = count($desc);
                            $newarr = array();
                            $newstr = '';
                            static $kk = 0;                    
                            for($i=0;$i<$num;$i++){
                                    $newarr[] .= $newpicimg[$i];
                            }
                            for($ii=0;$ii<$num;$ii++){

                                    for($iii=$kk;$iii<$num2;$iii++){

                                        $newstr .= $newarr[$ii].$desc[$iii];
                                        break;
                                    }
                                    $kk++;
                            }


                                       
                            $sql = "replace into `wei_company` (`type`,`title`,`user_id`,`contents`,`addtime`)values('$type','$title','$user_id','$newstr','$addtime');";                            
//                            $model->execute($sql);  
//                            echo $model->getLastSql();exit;
                          if($model->execute($sql)){

                              $this->success('操作成功',U(introco));exit;
                          }else{
                              echo $model->getError();exit;
                              $this->error('操作失败,请重试!');
                          }; 


                    }else{
                       $this->error('请登录后操作!');
                    }

            
            }
                echo 'nopost';exit;
                $model = D('Jingbei');
                $sql ="select * from ao_jingbei where id=({$id})";
                $data = $model->query($sql);
                $this->assign(array(
                    'data'=>$data ,
                ));

                $this->display();
        
        }
    }
//public function editadd(){
//    
//       
//        if($_POST){
//            
//            $model = D('Jingbei');
//            $model->create();
//            
//            if($model->save() !==false){
//                //保存成功,返回影响行数.没有修改.直接保存.返回0
//                $this->success('操作成功',U('lst'));
//                exit;
//            }else{
//                echo $model->getError();
//                exit;
//            }
//            
//        }
//
//        $model = D('company');
//        $data = $model->select();
//        $this->assign(array(
//            'data'=>$data ,
//        ));
// 
//   
//        $this->display();
//        
//    }
  public function del($id){
        $model = D('Jingbei');
        $result = $model->delete($id);
        if($result){
            $this->success('删除成功!',U('lst'));
            exit;
        }
        
    }
  public function ajaxDel()
	{
		$id = I('get.id');
//                echo $id;exit;
		$model = M("JingbeiPic");
		// 先查出这个图片的路径 
		$info = $model->find($id);
		// 从硬盘删除掉图片
		@unlink(IMG_URL_HD . $info['pic']);
		// 把数据库中的记录也删除掉
		$model->delete($id);
  }

  public function link(){
      $this->display();
  }
    public function picdesc(){
        $model = D('company');
        $user_id = $_SESSION['user_id'];
        
        $data = $model->where('user_id='.$user_id)->find();
//        var_dump($data);exit;
        $this->assign($data);
        $this->display();
  }
}

