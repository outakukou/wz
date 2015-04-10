<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/login.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>
</head>
<body>
    <div class="container-login">
        <header class="header">
            <div class="logo"><img src="/Public/static/images/logo-regg_03.png" alt=""/></div>
            <div class="poster-page"><img src="/Public/static/images/poster_07.png" alt=""/></div>
        </header>
        <div class="main">
            <form action="" method="" name="">
                <ul class="l-form-login">
                    <li class="error-form-login">请输入正确的用户名及密码</li>
                    <li class="li-form-login">
                        <input class="itxt-form-login" name="" type="text" value="" placeholder="请输入手机号/邮箱" />
                    </li>
                    <li class="li-form-login">
                        <input class="itxt-form-login" name="" type="password" placeholder="请输入您的密码" />
                    </li>
                    <li class="li-forget-login">
                        <a class="link-forget-login" href="forget.html">忘记密码？</a>
                    </li>
                    <li class="submit-form-login">
                        <input class="btn-submit-login" type="submit" value="登入" />
                    </li>
                    <li class="submit-form-login">
                        <a class="link-regis-login" href="/index.php/Home/Manager/regis">注册</a>
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