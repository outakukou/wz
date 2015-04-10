<?php
function removeXSS($val)
{
	static $obj = null;
	if($obj === null)
	{
		require('./HTMLPurifier/HTMLPurifier.includes.php');
		$obj = new HTMLPurifier();  
	}
	return $obj->purify($val);  
}

function addymd($timestamp){
    
        $timestamp = strtotime($timestamp);//把2015-03-16 16:30:20--datetime格式转换成时间戳
    	$timestamp = date('Y-m-d',$timestamp);//时间戳再转换成2015-03-16
	$timestamp = explode("-",$timestamp);//转换成数组
	$newstr = '';

	$newstr = $timestamp[0]."年".$timestamp[1]."月".$timestamp[2]."日";
        return $newstr;
}

function formatutf($str){
    $newstr = "";
    $newstr .="<hmtl>";
    $newstr .='<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"></head>';
    $newstr .=var_dump($str);
    $newstr .="</html>";
    
    return $newstr;
}