<?php if (!defined('THINK_PATH')) exit(); session_save_path("D:/amp/session"); session_start(); function random($length = 6 , $numeric = 0) { PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000); if($numeric) { $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1)); } else { $hash = ''; $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz'; $max = strlen($chars) - 1; for($i = 0; $i < $length; $i++) { $hash .= $chars[mt_rand(0, $max)]; } } return $hash; } $_SESSION['send_code'] = random(6,1);?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
<title>注册</title>
<link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
<link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
<link type="text/css" rel="stylesheet" href="/Public/static/css/login.css"/>



</head>
<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
<script language="javascript">
	function get_mobile_code(){
        $.post('/index.php/Home/Sms/sendnum', {mobile:jQuery.trim($('#mobile').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
            alert(jQuery.trim(unescape(msg)));
			if(msg=='提交成功'){
				RemainTime();
			}
        });
	};
	var iTime = 59;
	var Account;
	function RemainTime(){
		document.getElementById('zphone').disabled = true;
		var iSecond,sSecond="",sTime="";
		if (iTime >= 0){
			iSecond = parseInt(iTime%60);
			iMinute = parseInt(iTime/60)
			if (iSecond >= 0){
				if(iMinute>0){
					sSecond = iMinute + "分" + iSecond + "秒";
				}else{
					sSecond = iSecond + "秒";
				}
			}
			sTime=sSecond;
			if(iTime==0){
				clearTimeout(Account);
				sTime='获取手机验证码';
				iTime = 59;
				document.getElementById('zphone').disabled = false;
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		document.getElementById('zphone').value = sTime;
	}	
</script>
<body>



    <div class="container-login">
        <div class="header">
            <div class="logo"><img src="/Public/static/images/logo-regg_03.png" alt=""/></div>
            <div class="poster-page"><img src="/Public/static/images/poster_07.png" alt=""/></div>
        </div>
        <div class="main">
            <form action="/index.php/Home/Reg/validate" method="post" name="formUser">
            <!--<form action="/index.php/Home/Member/before_add" method="post" name="formUser">-->
                <ul class="l-form-login">
                    <li class="error-form-login">请输入有效的手机号</li>
                    <li class="li-form-login">
                        <input class="itxt-form-login" name="mobile" type="text" id='mobile' value="" placeholder="请输入手机号" />
                    </li>
                    <li class="li-form-login">
                        <input class="itxt-get-login" name="mobile_code" type="text" value="" placeholder="请输入您的验证码" />
                        <!--<button class="btn-get-login">获取验证码</button>-->
                        <input class="btn-get-login" id="zphone" type="button" onClick="get_mobile_code();" value="获取验证码"></input>
                        
                    </li>

                    <li class="submit-form-login">
                        <input class="btn-submit-regis" type="submit" value="确定" />
                    </li>
                </ul>
            </form>
        </div>
        <footer class="footer">
            <p class="txt-footer-login">请扫二维码关注我们的公众号<br />了解我们的最新动态及功能</p>
        </footer>
    </div>


</body>
</html>