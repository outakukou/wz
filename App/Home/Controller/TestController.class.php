<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
	


	public function test(){

            echo "999";
            sleep(3);
            header("Location:http://www.baidu.com");
         

       
	}
        
        public function changeavatar(){
            
            $this->display();
        }
        public function upavatar(){
            
            
            if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0)
		{
			   // 从配置文件中取出允许上传的图片的类型
                            $auf = C('ALLOW_UPLOAD_FILETYPE');
                            // 从配置文件中取出图片的最大尺寸
                            $muf = C('MAX_UPLOAD_FILESIZE');
                            // 从php.ini中读出系统对图片的硬限制
                            $umf = ini_get('upload_max_filesize');
                            // 实际的限制应该是以上两项中小者
                            $maxFileSize = (int)min($muf, $umf);
                            // 插入数据库之前先上传logo图片
                            $upload = new \Think\Upload();// 实例化上传类
			    $upload->maxSize = $maxFileSize * 1024 * 1024;
			    $upload->exts = $auf;// 设置附件上传类型
			    $upload->rootPath = './Uploads/'; // 设置附件上传根目录
			    $upload->savePath = 'Avatar/'; // 设置附件上传（子）目录
			    // 上传文件 
			    $info = $upload->upload(array('avatar' => $_FILES['avatar']));
                            
                        
                            
			    if($info)
			    {
			    	// 先拼出缩略图的名字
                                
			    	$data['avatar'] = $info['avatar']['savepath'] . $info['avatar']['savename'];
			    	$data['sm_avatar'] = $info['avatar']['savepath'] . 'sm_'.$info['avatar']['savename'];
			    
			    	/*************　生成缩略图　***************/
			    	$image = new \Think\Image(); 
			    	$image->open(IMG_URL_HD . $info['avatar']['savepath'] . $info['avatar']['savename']);
			    
			    	$image->thumb(90, 90)->save(IMG_URL_HD . $data['sm_avatar']);
                                
                                 
                                
                                
                                $model = M('Avatar');
			    	$image = new \Think\Image(); 
			    	// 循环每张图片生成缩略图
			    	foreach ($info as $k => $v)
			    	{
			    		// 先拼缩略图和原图的名称
			    		$logo = $v['savepath'] . $v['savename'];
			    		$sm_logo = $v['savepath'] . 'sm_'.$v['savename'];
			    		$big_logo = $v['savepath'] . 'big_'.$v['savename'];
			    		$image->open(IMG_URL_HD . $logo);
			    		$image->thumb(350, 350)->save(IMG_URL_HD . $big_logo);
			    		$image->thumb(50, 50)->save(IMG_URL_HD . $sm_logo);
			    		// 存到表中
			    		$model->add(array(
			    			'logo' => $logo,
			    			'sm_logo' => $sm_logo,

			    			'id' => 1,
			    		));
			    	}
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
			    }
			   	else 
			   	{
			   		// 把错误信息放到这个模型中，然后在控制器中通过$model->getError()方法获取这个错误信息
			   		$this->error = $upload->getError();
			   		return FALSE;
			   	}
		}
        }
}