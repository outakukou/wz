<?php
namespace Home\Controller;
use Think\Controller;
class SmsController extends Controller{
    



public function Post($curlPost,$url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		$return_str = curl_exec($curl);
		curl_close($curl);
		return $return_str;
}
public function xml_to_array($xml){ //找到每个方法.前面公开权限.
	$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
	if(preg_match_all($reg, $xml, $matches)){
		$count = count($matches[0]);
		for($i = 0; $i < $count; $i++){
		$subxml= $matches[2][$i];
		$key = $matches[1][$i];
			if(preg_match( $reg, $subxml )){
				$arr[$key] = $this->xml_to_array( $subxml );//找到每个方法.--前面都要加上对象.$this
			}else{
				$arr[$key] = $subxml;
			}
		}
	}
	return $arr;
}
public function random($length = 6 , $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

    public function sendnum(){
    
            $mobile = $_POST['mobile'];
            $send_code = $_POST['send_code'];
            $mobile_code = $this->random(4,1);//写进类里面后..需要使用$this本对象.才能调得动方法了.

  
            if(empty($mobile)){
                    exit('手机号码不能为空');
            }

            if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
            //防用户恶意请求
            exit('请求超时，请刷新页面后重试');
            }
            
            
            if(!preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|18[0-9]{9}$/",$mobile)){    
                   
                //手机号码格式不对 
                echo "请输入正确的手机号码!"; 
                
                exit;
            }else{    
                  
                //验证通过 
                 $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
                $post_data = "account=cf_cf_keji61&password=keji61&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
                //密码可以使用明文密码或使用32位MD5加密
                $gets = $this->xml_to_array($this->Post($post_data, $target));

                if($gets['SubmitResult']['code']==2){
                        $_SESSION['mobile'] = $mobile;
                        $_SESSION['mobile_code'] = $mobile_code;
                }

                echo $gets['SubmitResult']['msg'];
                    
                    
            }
            
           


        }


}