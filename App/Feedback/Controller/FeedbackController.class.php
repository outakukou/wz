<?php
namespace Feedback\Controller;

class FeedbackController extends \Home\Controller\IndexController{
   
    public function lst(){
         $model = D('Jingbei');
         
        $data = $model->query("select t.id as id,t.goods_title,goods_desc,p.id as pid,p.pic from ao_jingbei as t left join ao_jingbei_pic as p on t.id=p.jingbei_id group by jingbei_id");
       
    
//        var_dump($data);exit;
        
         $this->assign(array(
              'data'=>$data,

         ));

        $this->display();
    }
    public function add(){
        if(IS_POST){
            $model = D('feedback');
            

            
            if($model->create(I('post.'))){

                if($model->add()){
                    $this->success("操作成功",U("Home/Index/index"));
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
    
    public function bdel(){
        $goodsId = I('post.delid');
//        var_dump($goodsId);exit;
        if($goodsId){
             $goodsId = implode(',',$goodsId); //转化成了 "4,5,6"字符串
             $model = D('Jingbei');
             
                 $model->delete($goodsId); //批量删除 "4,5,6"这几个id商品
                 $this->success('删除成功',U('lst')); //控制器提示成功
                 exit;
             
        }else{
            $this->error('请选择要删除的产品');//控制器提示失败
        }
        
        
    }
  public function del($id){
        $model = D('Jingbei');
        $result = $model->delete($id);
        if($result){
            $this->success('删除成功!',U('lst'));
            exit;
        }
        
    }

}

