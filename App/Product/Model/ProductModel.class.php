<?php
namespace Product\Model;
use Think\Model;

class ProductModel extends Model {

    protected $_validate = array(
        array('title', 'require', '标题不能为空！', 1, 'regex', 3),
    );

    protected function _before_insert(&$data, $option) {


       $data['addtime'] = date("Y-m-d H-i-s");
       
        $http = strstr($data['link'],'http');
       if($http == false){
           $data['link'] = "http://".$data['link'];
       }
       
        if (isset($_FILES['mpic'])&& $_FILES['mpic']['error']==0) {
         
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3 * 1024 * 1024;
            $upload->exts = array('gif', 'png', 'jpg', 'jpeg', 'ejpeg', 'bmp'); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'Product/'; // 设置附件上传（子）目录
          
            $info = $upload->uploadOne($_FILES['mpic']);  //上传文件后,返回值中包含了--图片路径和名称.拼接起来就可以使用他制作缩略图
            
            
            $data['mpic'] = $info['savepath'].$info['savename'];
            $data['lstpic'] = $info['savepath']."lst_".$info['savename'];
            $data['dtlpic'] = $info['savepath']."dtl_".$info['savename'];
            $image = new \Think\Image();
            
            $image->open(IMG_URL_HD . $data['mpic']);
            
            $image->thumb(294,568)->save(IMG_URL_HD . $data['dtlpic']);
            $image->open(IMG_URL_HD . $data['mpic']);
            $image->thumb(106,148)->save(IMG_URL_HD . $data['lstpic']);
            
        }

       
       
       
        
    }

    protected function _before_delete($data) {



            $sql = "select mpic,lstpic,dtlpic from wei_product where id =({$data['where']['id']})";
            $img = $this->query($sql);
            unlink(IMG_URL_HD . $img['mpic']);
            unlink(IMG_URL_HD . $img['lstpic']);
            unlink(IMG_URL_HD . $img['dtlpic']);
           

    }

    public function _before_update(&$data, $option) {
        if (isset($_FILES['mpic'])&& $_FILES['mpic']['error']==0) {
         
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3 * 1024 * 1024;
            $upload->exts = array('gif', 'png', 'jpg', 'jpeg', 'ejpeg', 'bmp'); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'Product/'; // 设置附件上传（子）目录
          
            $info = $upload->uploadOne($_FILES['mpic']);  //上传文件后,返回值中包含了--图片路径和名称.拼接起来就可以使用他制作缩略图
            
            
            $data['mpic'] = $info['savepath'].$info['savename'];
            $data['lstpic'] = $info['savepath']."lst_".$info['savename'];
            $data['dtlpic'] = $info['savepath']."dtl_".$info['savename'];
            $image = new \Think\Image();
            
            $image->open(IMG_URL_HD . $data['mpic']);
            
            $image->thumb(294,568)->save(IMG_URL_HD . $data['dtlpic']);
            $image->open(IMG_URL_HD . $data['mpic']);
            $image->thumb(106,148)->save(IMG_URL_HD . $data['lstpic']);
            
        }
    }

    protected function _after_insert($data) {


          
          
        }
    

}
