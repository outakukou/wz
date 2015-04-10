<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心 - 添加推荐位 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="/Public/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Js/jquery.validate.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Js/validate_zh_cn.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="/index.php/Recommend/RecommendPos/lst">推荐位列表</a></span>
    <span class="action-span1"><a href="#">管理中心</a></span>
    <span id="search_id" class="action-span1"> - 添加推荐位 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form name="dataForm" method="POST" action="/index.php/Recommend/RecommendPos/add" enctype="multipart/form-data" >
        <table cellspacing="1" cellpadding="3" width="100%">
                    <tr>
                <td class="label">推荐位名称</td>
                <td>
                                    <input type="text" name="pos_name" class="required" />
                                请输入                                	<span class="require-field">*</span>
                                </td>
            </tr>
                      <tr>
                <td class="label">推荐位的类型</td>
                <td>
                                	<input type="radio" name="pos_type" value="商品" checked="checked" />商品                                	<input type="radio" name="pos_type" value="商品分类"  />商品分类                                请选择一个                                	<span class="require-field">*</span>
                                </td>
            </tr>
                      <tr>
                <td colspan="2" align="center"><br />
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>

<div id="footer"></div>
</body>
</html>
<script>
$("form[name=dataForm]").validate();
</script>