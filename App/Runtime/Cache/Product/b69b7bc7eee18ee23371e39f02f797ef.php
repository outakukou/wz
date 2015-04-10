<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" />
    <title>61微站</title>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/module.css"/>
    <link type="text/css" rel="stylesheet" href="/Public/static/css/list.css"/>
    <script type="text/javascript" src="/Public/static/js/jquery-2.1.3.min.js"></script>
</head>
<body style="background:#e7f6f9;">
    <a href="/index.php/Product/Product/add">添加产品</a>
    <div class="container-blue">
        <ul class="l-list">
<!--            当前访客ip是--<?php echo $clientip;?>-->
            <?php foreach($data as $k=>$v):?>
            <li class="li-list">
                <div class="mod-li-list">
                    <span class="poster-li-list"><img src="<?php echo IMG_URL . $v['lstpic'];?>" alt=""/></span>
                    <h3 class="title-li-list"><span class="fwb">标题：</span><?php echo $v['title'];?></h3>
                    <p class="text-li-list"><span class="fwb">内容：</span><?php echo $v['content'];?></p>
                    <span class="more-li-list"><a class="link-li-list" href="/index.php/Product/Product/detail?id=<?php echo $v['id'];?>">（了解更多）</a></span>
                    
                </div>
                <div class="mod-sub-article ptb2">
                    <span class="time-sub-article"><?php echo addymd($v['addtime']);?></span>
                    <a href="javascript:void(0);" class="dianzan" idd="<?php echo $v['id'];?>"> <span class="praise-sub-article" >
                            <img src="/Public/static/images/icon-sub-company_06.png" alt=""/>
                            <span><?php echo $v['click_good'];?></span>
                        </span></a>
                    <span class="attention-sub-article"><img src="/Public/static/images/icon-sub-company_03.png" alt=""/><?php echo $v['click'];?></span>
                    
                </div>
            </li>
            <?php endforeach;?>

        </ul>
    </div>



<script type="text/javascript">    
(function(){  
    $(".dianzan").click(function(){
      var id = $(this).attr('idd');
      var self=$(this);
        
            $.ajax({
            type:"POST",
            url:"/index.php/Product/Product/ajaxZan?id="+id,
            success:function(data)
            {
                self.find("span span").text(data);
            }

            })


    }); 
    
    
    $.ajax({
    type : "get",
    url : "/index.php/Product/Product/lst",
    dataType : "jsonp",
    jsonp: "callback",
    jsonpCallback:"success_jsonpCallback",
    success : function(json){
        alert('success');
        alert(json);
    },
    error:function(){
        alert('fail');
    }
});
    
    
    

})();



</script>
</body>
</html>