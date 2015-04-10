<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站-修改微名片</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/eidtcard.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/Public/static/js/init.js"></script>
</head>
<body>

    
    <form target="ifrface" id="faceupform" enctype="multipart/form-data" method="POST" action="/index.php/Home/Member/changeFace?id=<?php echo $data[0]['id'];?>"> 
        <input type="file" name="face" id="addface" style="display:none" onchange="changefaceimgk()">
<!--        <input type="text" name="testajax" id=""  onchange="changefaceimg()">-->
        <input type="text" id="addfaceuserid" style="display:none" uid="<?php echo $data[0]['id'];?>">
        <input type="submit" id="submitbtnface" style="display: none">
    </form>
    <iframe name="ifrface" style="display: none"></iframe>

    <div class="container">
        <div class="header">
            <div class="mod-personal-edit">
                <div class="bg-personal-edit"><img src="/Public/static/images/poster-edit_02.jpg" alt=""/></div>
                <div class="box-personal-edit">
                    <div class="content-personal-edit">
                        <span class="poster-personal-edit"><img src="/Public/static/images/poster-regis.jpg" alt=""/></span>
                        <div class="group-btn-edit">
                            <span class="btn-personal-edit" id="changeface">更换头像</span>
                            <span class="btn-personal-edit">更换头像背景</span>
                            <span class="btn-personal-edit"><a href="/index.php/Home/Member/editpsw?id=<?php echo $_SESSION['user_id'];?>">修改密码</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <p class="tip-card-edit">（以下标注星号<span class="risk-tip">*</span>项目为必填项）</p>
            <form action="/index.php/Home/Member/edit?id=<?php echo $data[0]['id'];?>" method="post">
                <ul class="l-card-edit">
                    <li class="li-card-edit">id 是<?php echo $data[0]['id'];?>
                        <label class="label-card-edit">姓名<span class="risk-card-edit">*</span></label>
                        <span class="text-card-edit"><?php echo $data[0]['username'];?></span>
                        <input class="itxt-card-edit" name="username" type="text" value="<?php echo $data[0]['username'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">公司<span class="risk-card-edit">*</span></label>
                        <span class="text-card-edit"><?php echo $data[0]['company'];?></span>
                        <input class="itxt-card-edit" name="company" type="text" value="<?php echo $data[0]['company'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">职务<span class="risk-card-edit">*</span></label>
                        <span class="text-card-edit"><?php echo $data[0]['position'];?></span>
                        <input class="itxt-card-edit" name="position" type="text" value="<?php echo $data[0]['position'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">手机<span class="risk-card-edit">*</span></label>
                        <span class="text-card-edit"><?php echo $data[0]['mobile'];?></span>
                        <input class="itxt-card-edit" name="mobile" type="text" value="<?php echo $data[0]['mobile'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">性别</label>
                        <div class="box-sexbox-edit">
                            <div class="mod-checkbox-wz fr">
                                <span class="un-checkbox-wz" <?php echo ($data[0]['gender']=="女")?'style="display: none;"':'style="display: block;"';?>></span>
                                <span class="arrow-checkbox-wz" <?php echo ($data[0]['gender']=="女")?'style="display: block;"':'style="display: none;"';?>></span>
                                <input name="gender" value="女" type="radio" class="none hidden-checkbox" <?php echo ($data[0]['gender']=="女")?'checked="checked"':'';?>/>
                            </div>
                            <span class="sub-card-edit">女</span>
                            <div class="mod-checkbox-wz fr">
                                <span class="un-checkbox-wz" <?php echo ($data[0]['gender']=="男")?'style="display: none;"':'style="display: block;"';?>></span>
                                <span class="arrow-checkbox-wz" <?php echo ($data[0]['gender']=="男")?'style="display: block;"':'style="display: none;"';?>></span>
                                <input name="gender" value="男" type="radio" class="none hidden-checkbox" <?php echo ($data[0]['gender']=="男")?'checked="checked"':'';?>/>
                            </div>
                            <span class="sub-card-edit">男</span>
                        </div>
                    </li>

                    <li class="li-card-edit">
                        <label class="label-card-edit">从业年限</label>
                        <span class="text-card-edit"><?php echo $data[0]['workyear'];?>年</span>
                        <input class="itxt-card-edit" name="workyear" type="text" value="<?php echo $data[0]['workyear'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">行业</label>
                        <span class="text-card-edit"><?php echo $data[0]['business'];?></span>
                        <input class="itxt-card-edit" name="business" type="text" value="<?php echo $data[0]['business'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">所在城市</label>
                        <span class="text-card-edit"><?php echo $data[0]['city'];?></span>
                        <input class="itxt-card-edit" name="city" type="text" value="<?php echo $data[0]['city'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">所在地区</label>
                        <span class="text-card-edit"><?php echo $data[0]['area'];?></span>
                        <input class="itxt-card-edit" name="area" type="text" value="<?php echo $data[0]['area'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">微信号</label>
                        <span class="text-card-edit"><?php echo $data[0]['weixin'];?></span>
                        <input class="itxt-card-edit" name="weixin" type="text" value="<?php echo $data[0]['weixin'];?>" />
                    </li>
                    <li class="li-card-edit">
                        <label class="label-card-edit">公司地址</label>
                        <span class="text-card-edit t-row"><?php echo $data[0]['address'];?></span>
                        <input class="itxt-card-edit" name="address" type="text" value="<?php echo $data[0]['address'];?>" />
                    </li>
                    <li class="li-card-edit bb_none">
                        <label class="label-card-edit">邮箱</label>
                        <span class="text-card-edit"><?php echo $data[0]['email'];?></span>
                        <input class="itxt-card-edit" name="email" type="text" value="<?php echo $data[0]['email'];?>" />
                    </li>

                    <li class="intro-card-edit">
                        <span class="spm-card-edit"><img src="/Public/static/images/icon-person-edit_05.png" alt=""/></span>
                        <a class="link-intro-edit" href="javascript:void(0);">重新编辑</a>
                    </li>
                    <li class="subli-double-message">
                        <span class="cancel-double-message p-btn-cancel">取&nbsp;&nbsp;消</span>
                        <input class="submit-double-message p-btn-confirm" type="submit" value="保存修改"/>
                    </li>
                </ul>
            </form>
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
                <a href="/index.php/Home/Login/logout"><span class="text-li-tools">退出账户</span></a>
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
    <script type="text/javascript" src="/Public/static/js/menu.js"></script>
    <script type="text/javascript">
        $('.mod-checkbox-wz').click(function(){
            var $bx=$(this).children('.un-checkbox-wz'),
                $ched=$(this).children('.arrow-checkbox-wz'),
                $ckBox=$(this).children('.hidden-checkbox'),
                otherBx=$(this).siblings('.mod-checkbox-wz').find('.un-checkbox-wz'),
                otherChed=$(this).siblings('.mod-checkbox-wz').find('.arrow-checkbox-wz'),
                otherCkBox=$(this).siblings('.mod-checkbox-wz').find('.hidden-checkbox');
            if( $ched.is(':hidden') ){
                otherBx.show();
                otherChed.hide();
                otherCkBox.attr('checked',false);

                $bx.hide();
                $ched.show();
                $ckBox.attr('checked',true);

            }else{
                $bx.show();
                $ched.hide();
                $ckBox.attr('checked',false);
            }
        });
        $('.li-card-edit').click(function(){
            var $itxt=$(this).children('.itxt-card-edit');
            $('.itxt-card-edit').hide();
            if( $itxt[0]!=undefined ){
                $itxt.show();
            }
        });
        
        
        
        
(function(){  
    $("#changeface").click(function(){
        $("#addface").trigger("click");
    }); 



})();    





function ab(){
   
     var uid = $('#addfaceuserid').attr('uid');
           $.ajax({
            type:"POST",
            data:"",
            url:"/index.php/Home/Member/getNewFace?id="+uid,
            success:function(data)
            {
                
              abc();
             
                    $(".poster-personal-edit").html('<img src='+'"http://192.168.1.107/Uploads/'+data+'"/>');
                
                
               
            }

            });   
}
function  abc(){
    alert('<img src="/Public/static/images/poster-regis.jpg" alt=""/>');
}
function okk(){
    
}

function changefaceimgk(){
$("#submitbtnface").trigger("click"); 

    setTimeout(ab,3000);
  
    
}





    </script>
</body>
</html>