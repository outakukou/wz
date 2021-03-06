<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站-产品列表</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/list.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/bidding.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/Public/static/js/init.js"></script>
</head>
<body>
    <div class="container-blue">

        <div class="mod-bidding">
            <div class="hd-bidding">
                <a class="link-new-bidding" href="/index.php/Product/Product/picdesc">添加项目</a>
            </div>
                    <ul class="l-list pt0">
                        
                        <?php foreach($data as $k=>$v):?>
                       <li class="li-list">
                           <div class="mode-li-list">
              <?php if($v['type']=="链接"){ $href=$v['link']; $img = STATIC_IMG.'Images/productlist148-106.jpg'; }else{ $id = $v['id']; $newimg = IMG_URL . $v['lstpic']; $href="/index.php/Product/Product/detail?id=$id"; $img = $newimg; } ?>  
                               <span class="poster-li-list"><img src="<?php echo $img;?>" alt=""/></span>
                               <h3 class="title-li-list"><span class="fwb">标题：</span><?php echo $v['title'];?></h3>
                               <p class="text-li-list"><span class="fwb">内容：</span><?php echo $v['content'];?></p>
  
                               <span class="more-li-list"><a class="link-li-list" href="<?php echo $href;?>">（了解更多）</a></span>
                               
                           </div>
                           <div class="mod-sub-article ptb2">
                               <span class="time-sub-article"><?php echo addymd($v['addtime']);?></span>
                               <span class="praise-sub-article"><img src="/Public/static/images/icon-sub-company_06.png" alt=""/><?php echo $v['click_good'];?></span>
                               <span class="attention-sub-article"><img src="/Public/static/images/icon-sub-company_03.png" alt=""/><?php echo $v['click'];?></span>
                           </div>
                            <p class="tip-count-message">您有25条留言信息</p>
                                   <ul class="l-btn-message">
                                       <a href="/index.php/Product/Product/del?id=<?php echo $v['id'];?>"> <li class="li-btn-message ml0" onclick="return confirm('确定删除吗?');">删&nbsp;&nbsp;除</li></a>
                                       <a href="/index.php/Product/Product/totop?id=<?php echo $v['id'];?>"><li class="li-btn-message">置&nbsp;&nbsp;顶</li>
                                          
                                           <a  href="/index.php/Product/Product/edit?id=<?php echo $v['id']?>"> <li class="li-btn-message">修&nbsp;&nbsp;改</li></a>
                                       <li class="li-btn-message resume-btn-message mr0"><a class="link-btn-message" href="/weizhan/product-m-detail.html">查看留言</a></li>
                                   </ul>
                       </li>
                       <?php endforeach;?>
                        
                   </ul>


        </div>
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
                <a href="/weizhan/edit-card.html">
                    <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_03.png" alt=""/></span>
                    <span class="text-li-tools">修改微名片</span>
                </a>
            </li>
            <li class="li-set-tools feedback">
                <a href="/weizhan/feedback.html">
                    <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_06.png" alt=""/></span>
                    <span class="text-li-tools">意见反馈</span>
                </a>
            </li>
            <li class="li-set-tools about">
                <a href="/weizhan/about.html">
                    <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_08.png" alt=""/></span>
                    <span class="text-li-tools">关于微站</span>
                </a>
            </li>
            <li class="li-menu-tools">
                <div class="menu-set-tools">
                    <div class="item-set-tools product">
                        <a href="/weizhan/product-m-list.html">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_11.png" alt=""/></span>
                            <span class="text-set-tools">我的产品</span>
                        </a>
                    </div>
                    <div class="item-set-tools intro">
                        <a href="/weizhan/company-reedit.html">
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
                        <a href="/weizhan/bidding-message.html">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_18.png" alt=""/></span>
                            <span class="text-set-tools">我在招</span>
                        </a>
                    </div>
                    <div class="item-set-tools news">
                        <a href="/weizhan/news-m-list.html">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_21.png" alt=""/></span>
                            <span class="text-set-tools">最新资讯</span>
                        </a>
                    </div>
                    <div class="item-set-tools active">
                        <a href="/weizhan/active-m-list.html">
                            <span class="icon-set-tools"><img src="/Public/static/images/icon-set_22.png" alt=""/></span>
                            <span class="text-set-tools">活动中心</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="li-set-tools logout">
                <span class="icon-li-tools"><img src="/Public/static/images/icon-tools_25.png" alt=""/></span>
                <span class="text-li-tools">退出账户</span>
            </li>
        </ul>
        <div class="clear"></div>
        <ul class="l-tools-wz">
            <li class="li-tools-wz collect">
                <span class="icon-collect-tools"><img src="/Public/static/images/icon-tools_09.jpg" alt=""/></span>
                <span class="text-collect-tools">分享求收藏</span>
            </li>
            <li class="li-tools-wz index f_none">
                <a class="link-tools-wz" href="/weizhan">
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
    <script type="text/javascript" src="/Public/static/js/menu.js"></script>
</body>
</html>