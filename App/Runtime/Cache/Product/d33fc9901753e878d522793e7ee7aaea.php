<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: brand_info.htm 14216 2008-03-10 02:27:21Z testyang $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加产品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>


    <form method="POST" action="/index.php/Product/Product/add"  enctype="multipart/form-data" >
                                           
        <table cellspacing="1" cellpadding="3" width="100%"  >
           
            
            <tr>
                <td class="label">标题</td>
                <td>
                    <input type="text" name="title"  maxlength="40" size='80'value="" />
                    <span class="require-field">*</span>
                </td>
            </tr>
           
                <tr><td  class="label" align='left'>内容</td>
                    <td align="left">
                    <textarea id="goods_desc" name="content" style="width: 580px; height:280px"></textarea>
                    </td>
                </tr>
           
             <tr>
                <td class="label">图片</td>
                <td>
                    <input type="file" name="mpic" />
                    
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


</body>
</html>