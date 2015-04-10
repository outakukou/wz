<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
<title>61微站</title>
<link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
<link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
<link type="text/css" rel="stylesheet" href="/Public/static/css/login.css"/>
<script type="text/javascript" src="/Public/static/js/jquery.js"></script>








</head>


<body>





    <div class="container-login">
        <div class="header">
            <div class="logo"><img src="/Public/static/images/logo-regg_03.png" alt=""/></div>
            <div class="poster-page"><img src="/Public/static/images/poster_07.png" alt=""/></div>
        </div>
        <div class="main">
            <form action="/Public/reg.php" method="post" name="formUser">
                <ul class="l-form-login">
                    
                    <li class="li-form-login">
                        <input class="itxt-form-login" name="" type="password" placeholder="请输入您的密码" />
                    </li>
                    <li class="li-form-login">
                        <input class="itxt-form-login" name="" type="password" placeholder="请确认您的密码" />
                    </li>
                    <li class="submit-form-login">
                        <input class="btn-submit-regis" type="submit" value="创建微站" />
                    </li>
                </ul>
            </form>
        </div>
        <footer class="footer">
            <p class="txt-footer-login">请扫二维码关注我们的公众号<br />了解我们的最新动态及功能</p>
        </footer>
    </div>















<form action="/Public/reg.php" method="post" name="formUser">
	<table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
		<tr>
			<td align="right">手机<td>
		<input id="mobile" name="mobile" type="text" size="25" class="inputBg" /><span style="color:#FF0000"> *</span> 
        <input id="zphone" type="button" value=" 获取手机验证码 " onClick="get_mobile_code();"></td>
        </tr>
		<tr>
			<td align="right">验证码</td>
			<td><input type="text" size="8" name="mobile_code" class="inputBg" /></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td><input type="submit" value=" 注册 " class="button"></td>
		</tr>
	</table>
</form>











<script language="javascript">
	function get_mobile_code(){
      
        $.post('/Public/sms.php', {mobile:jQuery.trim($('#mobile').val()),send_code:<?php echo $_SESSION['send_code'];?>},
        function(msg) {
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









</body>
</html>