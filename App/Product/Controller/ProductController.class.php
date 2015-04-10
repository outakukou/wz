<?php
namespace Product\Controller;

class ProductController extends \Home\Controller\IndexController{
   
  public function lst(){

        $model = D('Product');
//        $data = $model->order('id desc')->select();
        $data = $model->order('flag desc,toptime desc, id desc')->select();
//        get callback;
//        echo json_encode($data).;
        
      
//$callback = $_GET['callback'];
//echo $callback;
//echo 333;
//exit;
//echo $callback.'('.json_encode($data).')';
//exit;

//$data = $callback.'('.json_encode($data).')';
        
//        echo $data;
        

    
        $this->assign(array(
              'data'=>$data
         ));
        $this->display();
    }
public function editlist(){
        
        $model = D('Product');
        $data = $model->order('flag desc,toptime desc, id desc')->select();
        $this->assign(array(
              'data'=>$data
         ));
        $this->display();
    }
    public function producteditlist(){
        
        $model = D('Product');
        $data = $model->order('id desc')->select();
            
        $this->assign(array(
              'data'=>$data
         ));
        
        $this->display();
    }
    public function totop($id){
        
        $pid = I('get.id');
        $time = date('Y-m-d H:i:s');
        $sql ="update wei_product set `flag`=".'1,' ."  `toptime`='".$time."'".' where id ='.$pid;
        $model = D('product');
        $info = $model->execute($sql);
        $this->editlist();
        
    }
  public function add(){
        if(IS_POST){
            $model = D('Product');
            if($model->create()){
              
                if($model->add()){
                    $this->success("操作成功",U("editlist"));
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
  public function edit($id){
        if($_POST){
            
            $model = D('product');
            $model->create(I('post'));
            
            if($model->save() !==false){
                //保存成功,返回影响行数.没有修改.直接保存.返回0
                $this->success('操作成功',U('editlist'));
                exit;
            }else{
                echo $model->getError();
                exit;
            }
            
        }

        $model = D('product');
        $pid = I('get.id');
        $data = $model->find($pid);
//        var_dump($data);exit;
//        echo json_encode($data);
        echo $callback.json_encode($data);
        $info = $callback.json_encode($data);
//        exit;
              $this->assign(array(
            'info'=>$info
        ));
//      $this->assign(array(
//            'data'=>$data ,
//        ));
        $this->display();
        
    }

  public function del($id){
        $model = D('product');
        $result = $model->delete($id);
        if($result){
            $this->success('删除成功!',U('editlist'));
            exit;
        }
        
    }
  public function ajaxDel()
	{
		$id = I('get.id');
//                echo $id;exit;
		$model = D("product");
		// 先查出这个图片的路径 
		$info = $model->find($id);
		// 从硬盘删除掉图片
		@unlink(IMG_URL_HD . $info['pic']);

                
  }
  public function ajaxZan()
      {
              $id = I('get.id');
             
              $model = D('product');
              $sql = "update wei_product set click_good = click_good+1 where id=$id";
              //echo $sql;exit;
              $model->execute($sql);
              $data =  $model->field('click_good')->find($id);
//              echo json_encode($data);exit;
//              echo $data;exit;
//              return json_encode($data);
              echo $data['click_good'];
//              echo '<html><head><meta http-equiv="Content-type" content="text/html;charset=utf-8"></head>';
//              echo json_encode($data);
//              echo "</html>";
//              return $model->find($id);

      }
  public function detail($id){

            
      $model = D('product');

      $sql = "update wei_product set click = click +1 where id = $id";
//      echo $sql;exit;
      $model->execute($sql);
      $data = $model->find($id);
//      echo '<html><head><meta http-equiv="Content-type" Content="text/html:charset=utf-8"></head>';
//      var_dump($data);exit;
//      echo "</html>";
      $this->assign('data',$data);  
      
      $this->display();
  }
  public function testZan($id)
      {
              $clientip = $_SERVER['REMOTE_ADDR'];
              $clientip = bindec( decbin( ip2long($clientip))); 
              $zanmodel = D('zan');
              $pmodel = D('Product');
              $time = date('Y-m-d H:i:s');
              $sql = "select * from wei_zan where clientip = $clientip and product_id=$id";
              $info = $zanmodel->query($sql);
              if($info){
                  $this->error('不能重复点赞!',U('lst'),1);
              }else{
                  $zanmodel->add(array(
                      'clientip'=>$clientip,
                      'clicktime'=>$time,
                      'product_id'=>$id
                  ));
                  
                  $sql = "update wei_product set click_good = click_good+1 where id=$id";
                  $pmodel->execute($sql);

                $this->redirect('Product/lst', array('cate_id' => 2),1, '页面跳转中...');
              }
              
             

      }
}

