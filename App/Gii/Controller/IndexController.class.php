<?php
namespace Gii\Controller;
use Think\Controller;
class IndexController extends Controller 
{
	public function index()
	{
		if(IS_POST)
		{
			/**************** 加载配置文件并根据配置生成代码 **************/
			$type = I('post.type');
			if($type == 2)
			{
				$this->makeConfigFile();
				exit;
			}
			$configName = I('post.configName');
			if(!$configName)
				$this->error('配置文件名称不能为空！');
			if(!file_exists('./App/Gii/Config/'.$configName))
				$this->error('配置文件不存在！');
			$config = include('./App/Gii/Config/'.$configName);
			// 表名转成tp中的名字
			$tpName = $this->_dbName2TpName($config['tableName']);
			// 1.生成对应模块的目录结构
			$moduleDir = './App/'.$config['moduleName'];
			$cDir = './App/'.$config['moduleName'].'/Controller';
			$mDir = './App/'.$config['moduleName'].'/Model';
			$vDir = './App/'.$config['moduleName'].'/View';
			$v1Dir = './App/'.$config['moduleName'].'/View/'.$tpName;
			if(!is_dir($moduleDir))
				mkdir($moduleDir, 0777);
			if(!is_dir($cDir))
				mkdir($cDir, 0777);
			if(!is_dir($mDir))
				mkdir($mDir, 0777);
			if(!is_dir($vDir))
				mkdir($vDir, 0777);
			if(!is_dir($v1Dir))
				mkdir($v1Dir, 0777);
			// 2. 在view目录下生成对应的表单add.html
			ob_start();
			include('./App/Gii/Template/add.html');
			$str = ob_get_clean();
			file_put_contents($v1Dir.'/add.html', $str);
			// 3. 生成控制器文件
			ob_start();
			include('./App/Gii/Template/Controller.php');
			$str = ob_get_clean();
			file_put_contents($cDir.'/'.$tpName.'Controller.class.php', "<?php\r\n".$str);
			// 4. 生成模型文件
			ob_start();
			include('./App/Gii/Template/Model.php');
			$str = ob_get_clean();
			file_put_contents($mDir.'/'.$tpName.'Model.class.php', "<?php\r\n".$str);
			// 5. 生成lst.html页面
			ob_start();
			include('./App/Gii/Template/lst.html');
			$str = ob_get_clean();
			file_put_contents($v1Dir.'/lst.html', $str);
			// 6. 生成edit.html页面
			ob_start();
			include('./App/Gii/Template/edit.html');
			$str = ob_get_clean();
			file_put_contents($v1Dir.'/edit.html', $str);
			/*************************** 把生成代码对应的节点添加到节点表 ******************************/
			$nodeModel = M('Node');
			// 1. 判断节点表中有没有当前模块的节点
			$node = $nodeModel->field('id')->where("name='{$config['moduleName']}' AND level=1")->find();
			// 添加第一级的模块：如果没有模块节点
			if(!$node)
			{
				$node['id'] = $nodeModel->add(array(
					'name' => $config['moduleName'],             // 要生成控制器的名字
					'title' => $config['moduleCnName'].'管理',
					'status' => 1,
					'level' => 1,
					'pid' => 0,
				));
			}
				// 添加第二级的控制器：如果已经有这个节点，直接把生成的控制器加到这个节点下
				$newNodeId = $nodeModel->add(array(
					'name' => $tpName,             // 要生成控制器的名字
					'title' => $config['tableCnName'].'列表',
					'status' => 1,
					'level' => 2,
					'pid' => $node['id'],
				));
				// 添加第三级的方法：再添加这个方法中方法的节点
				$nodeModel->add(array(
					'name' => 'add',             // 要生成控制器的名字
					'title' => '添加',
					'status' => 1,
					'level' => 3,
					'pid' => $newNodeId,
				));
				$nodeModel->add(array(
					'name' => 'edit',             // 要生成控制器的名字
					'title' => '修改',
					'status' => 1,
					'level' => 3,
					'pid' => $newNodeId,
				));
				$nodeModel->add(array(
					'name' => 'del',             // 要生成控制器的名字
					'title' => '删除',
					'status' => 1,
					'level' => 3,
					'pid' => $newNodeId,
				));
				$nodeModel->add(array(
					'name' => 'bdel',             // 要生成控制器的名字
					'title' => '批量删除',
					'status' => 1,
					'level' => 3,
					'pid' => $newNodeId,
				));
				$nodeModel->add(array(
					'name' => 'lst',             // 要生成控制器的名字
					'title' => '列表',
					'status' => 1,
					'level' => 3,
					'pid' => $newNodeId,
				));
			$this->success('代码生成成功！');
			exit;
		}
		$this->display();
	}
	private function _dbName2TpName($tableName)
	{
		// 算法：sh_table_name_image  ==>  TableNameImage
		$tableName = explode('_', $tableName);
		unset($tableName[0]);
		// 对数组中的每一个元素都使用ucfirst函数处理一下
		$tableName = array_map('ucfirst', $tableName);
		return implode($tableName);
	}
	// 根据表名生成配置文件
	public function makeConfigFile()
	{
		// 生成一个空模型，执行SQL
		$db = M();
		$tableName = I('post.configName');
		$tableName = explode(',', $tableName);
		foreach ($tableName as $___v)
		{
			// 取出表的信息
			$_tableInfo = $db->query("show table status WHERE Name LIKE '$___v'");
			$_tableInfo = $_tableInfo[0];
			// 取出表的字段
			$_tableFields = $db->query("SHOW FULL FIELDS FROM $___v");
			$tpName = $this->_dbName2TpName($___v);
			ob_start();
			include('./App/Gii/Template/config.php');
			$str = ob_get_clean();
			file_put_contents('./App/Gii/Config/'.$___v.'.php', "<?php\r\n".$str);
		}
		$this->success('成功！');
		exit;
	}
}