<?php
namespace Home\Model;
use Think\Model;
class HomeadModel extends Model{
    

    
    protected  function _before_insert(&$data, $option){
        
       $upload = new \Think\Upload();// 实例化上传类
       
       $upload->maxSize = 3145728 ;// 设置附件上传大小
       $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
       $upload->rootPath = './Uploads/'; // 设置附件上传根目录
       $upload->savePath = 'Goods/'; // 设置附件上传（子）目录
       // 上传文件
       
       $info = $upload->upload();
                                                                                
       if($info){                                                   
                      $data['logo'] = $info['logo']['savepath'] . $info['logo']['savename'];
                      
                  }else{
//                      echo "he";exit;
		   		// 把错误信息放到这个模型中，然后在控制器中通过$model->getError()方法获取这个错误信息
		   		$this->error = $upload->getError();
		   		return FALSE;
		   	}
       }

       

    protected  function _before_delete($data){
//        $model = D(Goods);
//        var_dump($data);exit;
//        $this->delete($data['where']['id']);
//        $info = $this->where($data['where']['id'])->find();
//        可以直接把id传给find($id)方法.查找出一条数据.
//        $info['logo'] 存在数据表中的图片名.只是从Uploads里面的模块如Goods目录开始.
//        删除图片时.需要补全路径.补上硬盘路径.前部分:相对index.php入口文件.补上Uploads开始即可
//        显示一张图片.需要从http协议开始.
//        直接使用$this.都不用实例化模型了
//        $info = $this->find($data['where']['id']);
//        unlink(IMG_URL_HD . $info['logo']);
//        $info = $this->where(id=$id)->find();
            if(is_array($data['where']['id'])){               
                $imgs = $this->field('logo')->where("id in ({$data['where']['id'][1]})")->select();
                //只需要找到图片从Goods目录开始的路径名.连id都不需要了.
                foreach($imgs as $k=>$v){
                    unlink(IMG_URL_HD . $v['logo']);
                }
            }else{
                $img = $this->field('logo')->where($data['where']['id'])->find();
                unlink(IMG_URL_HD . $img['logo']);
            }
        
        
    }       
    
    public function _before_update(&$data,$option){
        //存在了图片这个字段.并且这个图片上传的错误--是没有的.就可以删除旧图片了
        if(isset($_FILES['logo']) && $_FILES['logo']['error']==0){
            $img = I('post.oldlogo');
            unlink(IMG_URL_HD . $img);
            
            //读取出配置文件 -->用大写C---常量 -->上传 最大 文件大小
            $maxc = C('UPLOAD_MAX_FILESIZE');
            //读取出php.ini中的 -->用ini_get()--设置 -->上传 最大 文件 大小
            $maxp = ini_get('upload_max_filesize');
            //自己定义个 常量-->图片类型
            $maxsize = (int)min($maxc,$maxp);
            $filetype = C('UPLOAD_ALLOW_TYPE');
            
            $upload = new \Think\Upload();//直接实例化时. think前加斜杆,标识在根目录下.
            //把最大字节-->M兆转成字节 1024×1024-->赋值给upload的属性maxSize
            $upload->maxSize = $maxsize*1024*1024;
//            上传前 定义2个名称
            //指定图片保存的启动路径Path-->用定义好的./Uploads/
            $upload->rootPath ='./Uploads/';
            //指定图片保存的保存路径Path-->用模块名 如Goods
            $upload->savePath ='Goods/';
            
//            上传后 获得2个名称
            $info = $upload->upload();
            //$info['logo']['savepath'] ---->日期 2014-11-16
            //$info['logo']['savename'];---->随机名
            //上传成功,$info有值了.才拼接..否则报错.
            if($info){
                 $data['logo'] = $info['logo']['savepath'] . $info['logo']['savename'];
            }else{
                $this->error = $upload->getError(); //上传对象,取得错误,交给model属性
                return false;
                
            }
            
        }
        
    }
}


