<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站-产品介绍</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/detail.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/dialog.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>
</head>
<body style="background:#e7f6f9;">
    <div class="container-blue">
        <div class="mod-sub-article pt10">
            <span class="time-sub-article"><?php echo addymd($data['addtime']);?></span>
            <span class="praise-sub-article"><img src="/Public/static/images/icon-sub-company_06.png" alt=""/><?php echo $data['click_good'];?></span>
            <span class="attention-sub-article"><img src="/Public/static/images/icon-sub-company_03.png" alt=""/><?php echo $data['click'];?></span>
        </div>
        <div class="hd-article-wz">
            <h2 class="title-article-wz">产品一：&nbsp;<?php echo $data['title'];?></h2>
        </div>
        <div class="poster-article-wz"><img src="<?php echo IMG_URL . $data['dtlpic'];?>" alt=""/></div>
        <div class="bd-article-wz">
            <h3 class="title-bd-wz">产品简介：</h3>
<!--            <p class="text-bd-wz">销售精英的必选神器！</p>-->
            <p class="text-bd-wz"><?php echo $data['content'];?></p>
        </div>
        <span class="box-enter-detail">
            <a class="blue-enter-detail js-btn-message" href="javascript:void(0);">留&nbsp;&nbsp;&nbsp;&nbsp;言</a>
        </span>
        <span class="tcode-bd-card"><img src="/Public/static/images/tcode-card_03.jpg" alt=""/></span>
        <p class="tip-tcode-card">扫描二维码关注我</p>
    </div>
    <div class="mask-dialog none"></div>
    <div class="dialog-message-product none">
        <form action="" class="js-form-message">
            <p class="tip-dialog-message">亲爱的用户，请在下框中留下您的信息<br />我们将在第一时间与您取得联系！</p>
            <ul class="l-dialog-message">
                <li class="li-dialog-message">
                    <label class="label-dialog-message">您的姓名</label>
                    <input class="itxt-dialog-message" type="text" />
                </li>
                <li class="li-dialog-message">
                    <label class="label-dialog-message">手&nbsp;&nbsp;机</label>
                    <input class="itxt-dialog-message" type="text" />
                </li>
                <li class="li-dialog-message">
                    <label class="label-dialog-message">留&nbsp;&nbsp;言</label>
                    <textarea class="textarea-dialog-message" name="" id=""></textarea>
                </li>
                <li class="subli-double-message">
                    <span class="cancel-double-message">取&nbsp;&nbsp;消</span>
                    <input class="submit-double-message" type="submut" value="确&nbsp;&nbsp;定"/>
                </li>
            </ul>
        </form>
    </div>
    <script type="text/javascript">
        (function(){
            $('.js-btn-message').click(function(){
                $('.mask-dialog').fadeIn();
                $('.dialog-message-product').fadeIn();
            });
            $('.cancel-dialog-message').click(function(){
                $('.mask-dialog').fadeOut();
                $('.dialog-message-product').fadeOut();
            });
            $('.submit-dialog-message').click(function(e){
                e.preventDefault();
                $('.mask-dialog').fadeOut();
                $('.dialog-message-product').fadeOut();
                $('.js-form-message').submit();
            });
        })();
    </script>
</body>
</html>