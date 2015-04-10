<?php
namespace Company\Model;
use Think\Model;

class CompanyModel extends Model {

    protected $_validate = array(
        array('goods_title', 'require', '名称不能为空！', 1, 'regex', 3),
    );

    protected function _before_insert(&$data, $option) {
//        $data['goods_desc'] = str_replace($data,vbCrlf, "<br/>" );
//         $data['goods_desc'] = nl2br($data['goods_desc']);
//        echo char_textarea($data['goods_desc']);exit;
       
//        echo $data['goods_desc'];
       $data['goods_desc'] = str_replace(chr(32),"&nbsp;",$data['goods_desc']);
        $data['goods_desc'] = nl2br($data['goods_desc']);
                
//         $data['goods_desc'] = str_replace($data['goods_desc'],'','&nbsp');
                
        
    }

    protected function _before_delete($data) {

//        var_dump($data);exit;
        if (is_array($data['where']['id'])) {

//            $img = $this->field('pic')->where("id IN({$data['where']['id'][1]} )")->select();
            $sql = "select * from ao_jingbei_pic where jingbei_id in({$data['where']['id'][1]})";
//            echo $sql;exit;
            $img = $this->query($sql);
//            var_dump($img);exit;
            foreach ($img as $k => $v) {
                unlink(IMG_URL_HD . $v['pic']);
            }
            $sql = "delete from ao_jingbei_pic where jingbei_id in({$data['where']['id'][1]})";
            $this->execute($sql);
            
        } else {

//            $img = $this->field('pic')->find($data['where']['id']);
            $sql = "select * from ao_jingbei_pic where jingbei_id =({$data['where']['id']})";
//            echo $sql;exit;
            $img = $this->query($sql);
//            var_dump($img);exit;
            foreach($img as $k=>$v){
                unlink(IMG_URL_HD . $v['pic']);
            }
            
        }
    }

    public function _before_update(&$data, $option) {
        //存在了图片这个字段.并且这个图片上传的错误--是没有的.就可以删除旧图片了
        if (isset($_FILES['[pic]'])) {


            $upload = new \Think\Upload(); //直接实例化时. think前加斜杆,表示在根目录下.
            //把最大字节-->M兆转成字节 1024×1024-->赋值给upload的属性maxSize
            $upload->maxSize = 3 * 1024 * 1024;
//            上传前 定义2个名称
            //指定图片保存的启动路径Path-->用定义好的./Uploads/
            $upload->rootPath = './Uploads/';
            //指定图片保存的保存路径Path-->用模块名 如Goods
            $upload->savePath = 'Company/';
            //$info['logo']['savepath'] ---->日期 2014-11-16

//            上传后 获得2个名称
            $info = $upload->upload();

            //$info['logo']['savename'];---->随机名
            //$info有值了-->就是成功了-->才拼接..否则报错.

            //$data是属于tenno模型里面的.所以,收集的数据只有tenno表的
            $id =I('post.id');//$data['id']只能通过post接收到id的值.
           
            if ($info){
                    $model = M('JingbeiPic');
                    foreach($info as $k=>$v){
                        $model->add(array(
                            'id'=>null,
                            'jingbei_id'=>$id,
                            'pic'=>$v['savepath'].$v['savename'],
                        )); 
                    }

                
            }else{
                $this->error = $upload->getError(); //上传对象,取得错误,交给model属性
                return false;
            }
        }
    }

    protected function _after_insert($data) {

        if (isset($_FILES['jqimg'])) {
         
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 6 * 1024 * 1024;
            $upload->exts = array('gif', 'png', 'jpg', 'jpeg', 'ejpeg', 'bmp'); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = 'Jingbei/'; // 设置附件上传（子）目录
            // 上传文件 
            $info = $upload->upload(array('jqimg' => $_FILES['jqimg']));
            
            //上传多张图片.所以是array数组,交给upload方法.自定义个键

            if ($info) {

                $SceneryModel = M('JingbeiPic');
                foreach ($info as $k => $v) {
                    $SceneryModel->add(array(
                        'jingbei_id' => $data['id'],
                        'pic' => $v['savepath'] . $v['savename'],
                    ));
                    
                }
            } else {
                // 把错误信息放到这个模型中，然后在控制器中通过$model->getError()方法获取这个错误信息
                $this->error = $upload->getError();
                return FALSE;
            }
        }
    }

}
