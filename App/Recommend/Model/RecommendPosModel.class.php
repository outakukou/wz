<?php
namespace Recommend\Model;
use Think\Model;
class RecommendPosModel extends Model 
{
	protected $insertFields = array('pos_name','pos_type');
	protected $updateFields = array('id','pos_name','pos_type');
	protected $_validate = array(
		array('pos_name', 'require', '推荐位名称不能为空！', 1, 'regex', 3),
		array('pos_type', 'require', '推荐位的类型不能为空！', 1, 'regex', 3),
	);
	
	public function search()
	{
		$where = 1;
				/****************** 排序：拼排序的字符串 *********************/
		$ob = I('get.ob', 'id');   // 接收排序的字段，默认是id
		$ow = I('get.ow', 'asc');  // 接收排序的方式，默认是升序
		// 限制排序字段只能是id或者price
		if(!in_array($ob, array('id', 'price')))
			$ob = 'id';
		// 限制排序方式只能是asc或者desc
		if(!in_array($ow, array('asc', 'desc')))
			$ow = 'asc';
		/***************** 翻页 ******************************/
		// 先取出总的记录数
		$totalRecord = $this->where($where)->count();
		// 生成翻页对象
		$page = new \Think\Page($totalRecord, 10);
		// 指定上一页下一页的显示汉字，默认是>>和<<
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		// 生成页面中用来翻的字符串
		$pageString = $page->show();
		// 根据前面构造的where、order和limit变量构造SQL语句并查询数据库返回数据
		$data = $this->where($where)->order("$ob $ow")->limit($page->firstRow.','.$page->listRows)->select();
		// 返回数据和翻页的字符串
		return array(
			'data' => $data,
			'page' => $pageString,
		);
	}
	public function _before_insert(&$data, $option)
	{
			}
	public function _before_update(&$data, $option)
	{
			}
	protected function _before_delete($data)
	{
			}
}













