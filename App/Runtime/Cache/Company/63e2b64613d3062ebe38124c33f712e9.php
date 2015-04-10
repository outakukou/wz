<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>

</head>
<body>
<div class="container-blue">
    <span class="btn-reedit-company"><a href="/index.php/Company/Company/reedit2">重新编辑</a></span>
    <div class="mod-sub-article pt10">
        <span class="time-sub-article">2015年2月10日</span>
        <span class="praise-sub-article"><img src="/Public/static/images/icon-sub-company_06.png" alt=""/>2000</span>
        <span class="attention-sub-article"><img src="/Public/static/images/icon-sub-company_03.png" alt=""/>2000</span>
    </div>
    <div class="hd-article-wz">
        <h2 class="title-article-wz">公司名称：
            <?php echo $data['title'];?></h2>
    </div>
<!--    <div class="poster-article-wz"><img src="/Public/static/images/poster-company_03.jpg" alt=""/></div>
    <div class="bd-article-wz">
        <h3 class="title-bd-wz">公司概述：</h3>
        <p class="text-bd-wz">北京六十一秒科技有限公司是一家集聚各类互联网金融创新人才、顶级技术开发人才、创新策划人才共同打造的全新的新兴科技公司。公司依托互联网为载体，以专业化的技术、高尖端的科技产品，服务于广大企业及个人用户，作为一家资金雄厚、人脉广泛的高端专业互联网科技公司，六十一秒科技为企业提供APP设计与开发、WEB设计与开发、VI设计、用户界面设计和数字化营销策划等多种信息产品和服务,公司重视创新技术，结合市场所需,为了解决各行各业市场营销人员现在面临的各种销售难题而投巨资研发的一款营销神器-微站。这是一款基于移动终端的应用工具,让销售变得更简单高效。</p>
    </div>
    <div class="poster-article-wz"><img src="/Public/static/images/poster-company_06.jpg" alt=""/></div>
    <div class="bd-article-wz">
        <h3 class="title-bd-wz">企业文化：</h3>
        <p class="text-bd-wz">北京六十一秒科技有限公司是一家集聚各类互联网金融创新人才、顶级技术开发人才、创新策划人才共同打造的全新的新兴科技公司。公司依托互联网为载体，以专业化的技术、高尖端的科技产品，服务于广大企业及个人用户，作为一家资金雄厚、人脉广泛的高端专业互联网科技公司，六十一秒科技为企业提供APP设计与开发、WEB设计与开发、VI设计、用户界面设计和数字化营销策划等多种信息产品和服务,公司重视创新技术，结合市场所需,为了解决各行各业市场营销人员现在面临的各种销售难题而投巨资研发的一款营销神器-微站。这是一款基于移动终端的应用工具,让销售变得更简单高效。</p>
    </div>
    <div class="poster-article-wz"><img src="/Public/static/images/poster-company_08.jpg" alt=""/></div>-->
    <div class="bd-article-wz">
        <!--<h3 class="title-bd-wz">6+1优势：</h3>-->
        <!--<p class="text-bd-wz">人才优势、创新优势、团队优势、服务优势、行业优势、经验优势与品牌优势这七大优势，从而铸就六十一秒最卓越的企业形象。</p>-->
        <p class="text-bd-wz"><?php echo $data['contents'];?></p>
    </div>
    <span class="tcode-bd-card"><img src="/Public/static/images/tcode-card_03.jpg" alt=""/></span>
    <p class="tip-tcode-card">扫描二维码关注我</p>
</div>
<div class="mask-collect-wz none"></div>
<div class="box-collect-wz none">
    <div class="close-collect-wz">
        <span class="fork-collect-wz"><img src="/Public/static/images/fork-collect_03.png" alt=""/></span>
    </div>
    <div class="logo-collect-wz"><img src="/Public/static/images/logo-collect_03.png" alt=""/></div>
    <div class="intro-collect-wz">
        <p class="text-intro-collect">step1、点击右上角</p>
        <p class="text-intro-collect">step2、选择下拉菜单中的<span class="dotted-intro-collect"><img src="/Public/static/images/dotted-collect_07.png" alt=""/></span></p>
        <ul class="l-intro-collect">
            <li class="li-intro-collect">
                <span class="icon-li-cintro"><img src="/Public/static/images/icon-collect-share_11.png" alt=""/></span>
                <span class="text-li-cintro">分享给朋友</span>
            </li>
            <li class="li-intro-collect">
                <span class="icon-li-cintro"><img src="/Public/static/images/icon-collect-share_13.png" alt=""/></span>
                <span class="text-li-cintro">发送到朋友圈</span>
            </li>
            <li class="li-intro-collect">
                <span class="icon-li-cintro"><img src="/Public/static/images/icon-collect-share_16.png" alt=""/></span>
                <span class="text-li-cintro">收藏</span>
            </li>
        </ul>
        <p class="text-intro-collect">即可分享给好友或好友圈</p>
    </div>
    <div class="share-collect-wz">
        <h4 class="title-share-collect">分享到：</h4>
        <ul class="l-share-collect">
            <li class="li-share-collect">
                <span class="icon-li-share"><img src="/Public/static/images/icon-share-collect_03.png" alt=""/></span>
                <span class="text-li-share">qq好友</span>
            </li>
            <li class="li-share-collect">
                <span class="icon-li-share"><img src="/Public/static/images/icon-share-collect_05.png" alt=""/></span>
                <span class="text-li-share">qq空间</span>
            </li>
            <li class="li-share-collect br_none">
                <span class="icon-li-share"><img src="/Public/static/images/icon-share-collect_07.png" alt=""/></span>
                <span class="text-li-share">腾讯微博</span>
            </li>
            <li class="li-share-collect">
                <span class="icon-li-share"><img src="/Public/static/images/icon-share-collect_12.png" alt=""/></span>
                <span class="text-li-share">新浪微博</span>
            </li>
            <li class="li-share-collect">
                <span class="icon-li-share"><img src="/Public/static/images/icon-share-collect_13.png" alt=""/></span>
                <span class="text-li-share">人人网</span>
            </li>
            <li class="li-share-collect br_none">
                <span class="icon-li-share"><img src="/Public/static/images/icon-share-collect_15.png" alt=""/></span>
                <span class="text-li-share">更多</span>
            </li>
        </ul>
    </div>
</div>
<div class="mask-tools-wz none"></div>
<div class="box-tools-wz">
        <ul class="l-set-tools none">
            <li class="li-set-tools more">
                <span class="text-li-tools js-text-fork">更多</span>
                <span class="fork-li-tools fr"><img src="/Public/static/images/fork-tools_03.png" alt=""/></span>
            </li>
            <li class="li-set-tools edit">
                <!--<a href="/weizhan/edit-card.html">-->
                    <a href="/index.php/Home/Member/edit?id=<?php echo $_SESSION['user_id'];?>"> 
                    <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_03.png" alt=""/></span>
                    <span class="text-li-tools">修改微名片</span>
                </a>
            </li>
            <li class="li-set-tools feedback" >
                <a href="/weizhan/feedback.html">
                    <a href="/index.php/Feedback/Feedback/add"> <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_06.png" alt=""/></span>
                        <span class="text-li-tools">意见反馈</span></a>
                </a>
            </li>
            <li class="li-set-tools about" style="display: none">
                <a href="/weizhan/about.html">
                    <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_08.png" alt=""/></span>
                    <span class="text-li-tools">关于微站</span>
                </a>
            </li>
            <li class="li-menu-tools" style="display: block">
                <div class="menu-set-tools">
                    <div class="item-set-tools product">
                        <a href="/index.php/Product/Product/producteditlist">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_11.png" alt=""/></span>
                            <span class="text-set-tools">我的产品</span>
                        </a>
                    </div>
                    <div class="item-set-tools intro">
                        <a href="/index.php/Company/Company/reedit?uid=<?php echo $info['id'];?>">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_13.png" alt=""/></span>
                            <span class="text-set-tools">公司简介</span>
                        </a>
                    </div>
                    <div class="item-set-tools album">
                        <a href="javascript:void(0);">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_17.png" alt=""/></span>
                            <span class="text-set-tools">我的相册</span>
                        </a>
                    </div>
                    <div class="item-set-tools jobing">
                        <a href="javascript:void(0);">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_18.png" alt=""/></span>
                            <span class="text-set-tools">我在招</span>
                        </a>
                    </div>
                    <div class="item-set-tools news">
                        <a href="/index.php/News/Information/inforeditlist">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_21.png" alt=""/></span>
                            <span class="text-set-tools">最新资讯</span>
                        </a>
                    </div>
                    <div class="item-set-tools active">
                        <a href="javascript:void(0);">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_22.png" alt=""/></span>
                            <span class="text-set-tools">活动中心</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="li-set-tools logout" >
                <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_25.png" alt=""/></span>               
                <a href="/index.php/Company/Login/logout"><span class="text-li-tools">退出账户</span></a>
            </li>
        </ul>
        <div class="clear"></div>
        <ul class="l-tools-wz">
            <li class="li-tools-wz collect">
                <span class="icon-collect-tools"><img src="/Public/static/images/icon-tools_09.jpg" alt=""/></span>
                <span class="text-collect-tools">分享求收藏</span>
            </li>
            <li class="li-tools-wz index f_none">
                <a class="link-tools-wz" href="/">
                    <span class="icon-collect-tools"><img src="/Public/static/images/icon-tools_11.jpg" alt=""/></span>
                    <span class="text-collect-tools">首页</span>
                </a>
            </li>
            <li class="li-tools-wz more">
                 <span class="icon-collect-tools"><img src="/Public/static/images/icon-tools_13.jpg" alt=""/></span>
                    <span class="text-collect-tools">更多</span>
            </li>
        </ul>
    </div>
<script type="text/javascript" src="js/menu.js"></script>
</body>
</html>