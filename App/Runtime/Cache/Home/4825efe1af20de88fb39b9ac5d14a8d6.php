<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/namecard.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="pro-header-index">
            <div class="mask-header-index"></div>
            <div class="box-header-index">
                <div class="content-pro-index">
                    <span class="lbs-pro-index"><a class="link-lbs-index" href="">（地图定位）</a></span>
                    <div class="poster-pro-index"><img src="/Public/static/images/poster-regis.jpg" alt=""/></div>
                    <h3 class="name-pro-index"><?php echo $data['username'];?></h3>
                    <h4 class="position-pro-index"><?php echo $data['position'];?></h4>
                    <dl class="dl-pro-index">
                        <dt class="dt-pro-index">公司：</dt>
                        <dd class="dd-pro-index"><?php echo $data['company'];?></dd>
                        <dt class="dt-pro-index">手机号：</dt>
                        <dd class="dd-pro-index"><?php echo $data['mobile'];?></dd>
                        <dt class="dt-pro-index">微信号：</dt>
                        <dd class="dd-pro-index"><?php echo $data['weixin'];?></dd>
                        <dt class="dt-pro-index">行业：</dt>
                        <dd class="dd-pro-index"><?php echo $data['business'];?></dd>
                        <dt class="dt-pro-index">邮箱：</dt>
                        <dd class="dd-pro-index"><?php echo $data['email'];?></dd>
                        <dt class="dt-pro-index">公司地址：</dt>
                        <dd class="dd-pro-index"><?php echo $data['address'];?></dd>
                    </dl>
                </div>
            </div>
            <div class="bg-pro-index"><img src="/Public/static/images/bg-pro-big_02.jpg" alt=""/></div>
        </div>
    </div>
    <div class="main">
        <div class="mod-card">
            <div class="hd-card">
                <h3 class="title-hd-card">个人介绍</h3>
            </div>
            <div class="bd-card">
                <ul class="l-bd-card">
                    <li class="li-bd-card">
                        <h3 class="title-bd-card">履历一：2010年荣获XXX奖项</h3>
                        <span class="img-bd-card"><img src="/Public/static/images/certi-card_03.jpg" alt=""/></span>
                    </li>
                    <li class="li-bd-card">
                        <h3 class="title-bd-card">履历二：2000年荣获XXX奖项</h3>
                        <span class="img-bd-card"><img src="/Public/static/images/certi-card_06.jpg" alt=""/></span>
                    </li>
                </ul>
                <span class="tcode-bd-card"><img src="/Public/static/images/tcode-card_03.jpg" alt=""/></span>
                <p class="tip-tcode-card">扫描二维码关注我</p>
            </div>
        </div>
    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>