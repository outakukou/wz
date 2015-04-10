<?php
namespace Home\Model;
use Think\Model;
class MovementModel extends Model{
    
public function searchherald()
	{
       
     
        /*         * **************** 排序：拼排序的字符串 ******************** */
//        $ob = I('get.ob', 'id');   // 接收排序的字段，默认是id
//        $ow = I('get.ow', 'asc');  // 接收排序的方式，默认是升序

        /*         * *************** 翻页 ***************************** */
        // 先取出总的记录数
        $heraldmodel = D('Herald'); 
        
        $totalRecord = $heraldmodel->count();
        
        // 生成翻页对象
        $page = new \Think\Page($totalRecord,6);
//        var_dump($page);exit;
        // 指定上一页下一页的显示汉字，默认是>>和<<
//        $page->setConfig('prev', '上一页');
//        $page->setConfig('next', '下一页');
        $page->setConfig('first', '首页');
        $page->setConfig('last','尾页');
//        $page->setConfig('$rollPage', '3');
//        $limit = $page->firstRow . ',' . $page->listRows;
        $data = $heraldmodel->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        // 生成页面中用来翻的字符串
        $pageString = $page->show();
        // 根据前面构造的where、order和limit变量构造SQL语句并查询数据库返回数据
//        $data = $this->limit($page->firstRow)->select();
//        $sql = "select * from herald limit ({})";
//        $data = $heraldmodel->query($sql);
        // 返回数据和翻页的字符串
//        echo 1;
//        echo $heraldmodel->getlastsql();
//        var_dump($data);exit;
        return array(
            'data' => $data,
            'page' => $pageString,
        );
    }
public function searchnews()
	{

        // 先取出总的记录数
        $heraldmodel = D('News'); 
        
        $totalRecord = $heraldmodel->count();
        
        // 生成翻页对象
        $page = new \Think\Page($totalRecord,6);
//        var_dump($page);exit;
        // 指定上一页下一页的显示汉字，默认是>>和<<
//        $page->setConfig('prev', '上一页');
//        $page->setConfig('next', '下一页');
        $page->setConfig('first', '首页');
        $page->setConfig('last','尾页');
//        $page->setConfig('$rollPage', '3');
//        $limit = $page->firstRow . ',' . $page->listRows;
        $data = $heraldmodel->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        // 生成页面中用来翻的字符串
//        var_dump($data);exit;
        $pageString = $page->show();
        // 根据前面构造的where、order和limit变量构造SQL语句并查询数据库返回数据
//        $data = $this->limit($page->firstRow)->select();
//        $sql = "select * from herald limit ({})";
//        $data = $heraldmodel->query($sql);
        // 返回数据和翻页的字符串
//        echo 1;
//        echo $heraldmodel->getlastsql();
//        var_dump($data);exit;
        return array(
            'data' => $data,
            'page' => $pageString,
        );
    }
    
    
public function searchtimelimit()
	{
       
     
        /*         * **************** 排序：拼排序的字符串 ******************** */
//        $ob = I('get.ob', 'id');   // 接收排序的字段，默认是id
//        $ow = I('get.ow', 'asc');  // 接收排序的方式，默认是升序

        /*         * *************** 翻页 ***************************** */
        // 先取出总的记录数
        $heraldmodel = D('Timelimit'); 
        
        $totalRecord = $heraldmodel->count();
        
        // 生成翻页对象
        $page = new \Think\Page($totalRecord,6);
//        var_dump($page);exit;
        // 指定上一页下一页的显示汉字，默认是>>和<<
//        $page->setConfig('prev', '上一页');
//        $page->setConfig('next', '下一页');
        $page->setConfig('first', '首页');
        $page->setConfig('last','尾页');
//        $page->setConfig('$rollPage', '3');
//        $limit = $page->firstRow . ',' . $page->listRows;
        $data = $heraldmodel->order("id desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        // 生成页面中用来翻的字符串
        $pageString = $page->show();
        // 根据前面构造的where、order和limit变量构造SQL语句并查询数据库返回数据
//        $data = $this->limit($page->firstRow)->select();
//        $sql = "select * from herald limit ({})";
//        $data = $heraldmodel->query($sql);
        // 返回数据和翻页的字符串
//        echo 1;
//        echo $heraldmodel->getlastsql();
//        var_dump($data);exit;
        return array(
            'data' => $data,
            'page' => $pageString,
        );
    }    
}


