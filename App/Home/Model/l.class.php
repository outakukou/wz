<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model 
{

	
	public function _before_insert(&$data, $option)
	{
                $password = $_SESSION['password'];
		$data['password'] = md5($password . C('MD5_KEY'));
                $data['mobile'] = $_SESSION['mobile'];
                
                $data['regtime'] = date('Y-m-d H:i:s',time());
               
                
	}
	public function _before_update(&$data, $option)
	{
		
		
		
		
	}
	public function login()
	{
		$loginname = I('post.loginname');
		$password = I('post.password');

		if($loginname && $password )
		{

	   		// 验证用户名是否存在
	   		$user = $this->where("mobile='$loginname'")->find();
	   		if($user)
	   		{
	   			
	   			if($user['password'] != md5($password . C('MD5_KEY')))
	   			{
	   				$this->error = '密码不正确！';
   					return FALSE;	
	   			}
	   			/************* 登录成功 ********************/
	   			// 以下两荐要和配置文件中变量名匹配，否则 TP中的RBAC无法验证权限
	   			session('user_id', $user['id']);  // 保存用户的id在session中
	   			session('mobile', $user['mobile']);
	   			session('email', $user['email']);
	   			return $user;
	   		}
	   		else 
	   		{
	   			$this->error = '手机或邮箱不存在！';
   				return FALSE;	
	   		}
		}
		else 
		{
			$this->error = '用户名密码不能为空！';
   			return FALSE;	
		}
	}
	protected function _after_insert($data, $option)
	{
		$roleId = I('post.role_id');
		if($roleId)
		{
			$ruModel = M('RoleUser');
			// 循环表单中提交的多个角色的ID，循环插入到表中
			foreach ($roleId as $k => $v)
			{
				$ruModel->add(array(
					'role_id' => $v,
					'user_id' => $data['id'],
				));
			}
		}
	}
	protected function _before_delete($data)
	{
		$ruModel = M('RoleUser');
		// 如果是批量删除
		if(is_array($data['where']['id']))
			$ruModel->where("user_id IN({$data['where']['id'][1]})")->delete();
		else 
			$ruModel->where('user_id='.$data['where']['id'])->delete();
	}
	// 管理员退出的业务逻辑
	public function logout()
	{
		session('user_id',null);
	}
	// 获取当前管理员所拥有的所有的权限
	public function getPrivilege()
	{
		// 取出当前登录的管理员的ID
		$userId = $_SESSION['user_id'];
		// 如果是超级管理员就从节点表是取出所有启用的前两级权限
		if(isset($_SESSION['iamroot']))
		{
			// 先取出所有顶级的节点
			$sql = 'SELECT id,title,name FROM sh_node WHERE status=1 AND level=1';
			$data = $this->query($sql);
			// 循环每个顶级节点取出二级的并放到children中
			foreach ($data as $k => $v)
			{
				$sql = 'SELECT id,title,name FROM sh_node WHERE status=1 AND level=2 AND pid='.$v['id'];
				$data[$k]['children'] = $this->query($sql);
			}
			return $data;
		}
		else 
		{
			// 如果不是超级管理员就执行SQL，根据当前管理员的ID取出这个管理员所拥有的权限
		    $sql = "select node.id,node.name,node.title from sh_role as role,sh_role_user as user,sh_access as access ,sh_node as node where user.user_id='$userId' and user.role_id=role.id and ( access.role_id=role.id  or (access.role_id=role.pid and role.pid!=0 ) ) and role.status=1 and access.node_id=node.id and node.level=1 and node.status=1";
	        $data = $this->query($sql);
	        foreach ($data as $k => $v)
	        {
	        	$sql = "select node.id,node.name,node.title from sh_role as role,sh_role_user as user,sh_access as access ,sh_node as node where user.user_id='{$userId}' and user.role_id=role.id and ( access.role_id=role.id  or (access.role_id=role.pid and role.pid!=0 ) ) and role.status=1 and access.node_id=node.id and node.level=2 and node.pid={$v['id']} and node.status=1";
		        $data[$k]['children'] = $this->query($sql);
	        }
	        return $data;
		}
	}

        public function search($id){
            return $this->where("id='$id'")->find();
        }
}


















