<?php
namespace app\admin\controller;

use think\Page;
use think\Verify;
use think\Db;
use think\Session;

class Admin extends Base
{

	public function index()
	{
		$list = array();
		$keywords = I('keywords/s');
		if (empty($keywords)) {
			$res = D('admin')->select();
		} else {
			$res = DB::name('admin')->where('user_name', 'like', '%' . $keywords . '%')
				->order('admin_id')
				->select();
		}
		$role = D('admin_role')->getField('role_id,role_name');
		if ($res && $role) {
			foreach ($res as $val) {
				$val['role'] = $role[$val['role_id']];
				$val['add_time'] = date('Y-m-d H:i:s', $val['add_time']);
				$list[] = $val;
			}
		}
		$this->assign('list', $list);
		return $this->fetch();
	}

	public function login()
	{
		if (session('?admin_id') && session('admin_id') > 0) {
			$this->error("您已登录", U('Admin/Index/index'));
		}
		if (IS_POST) {
			$verify = new Verify();
			if (! $verify->check(I('post.verify'), "admin_login")) {
				exit(json_encode(array(
					'status' => 0,
					'msg' => '验证码错误'
				)));
			}
			$condition['user_name'] = I('post.username/s');
			$condition['password'] = I('post.password/s');
			if (! empty($condition['user_name']) && ! empty($condition['password'])) {
				$condition['password'] = encrypt($condition['password']);
				$admin_info = M('admin')->join(PREFIX . 'admin_role', PREFIX . 'admin.role_id=' . PREFIX . 'admin_role.role_id', 'INNER')
					->where($condition)
					->find();
				if (is_array($admin_info)) {
					session('admin_id', $admin_info['admin_id']);
					session('act_list', $admin_info['act_list']);
					M('admin')->where("admin_id = ".$admin_info['admin_id'])->save(array('last_login'=>time(),'last_ip'=>request()->ip()));
					session('last_login_time',$admin_info['last_login']);
					session('last_login_ip',$admin_info['last_ip']);
					adminLog('后台登录');
					$url = session('from_url') ? session('from_url') : U('Admin/Index/index');
					exit(json_encode(array('status'=>1,'url'=>$url)));
				} else {
					exit(json_encode(array('status'=>0,'msg'=>'帐号账号密码不正确')));
				}
			} else {
				exit(json_encode(array('status'=>0,'msg'=>'请填写账号密码')));
			}
		}
		return $this->fetch();
	}

	public function logout()
	{
		session_unset();
		session_destroy();
		session::clear();
		$this->success("退出成功", U('Admin/Admin/login'));
	}

	public function prove()
	{
		$config = array(
			'fontSize' => 30,
			'length' => 4,
			'useCurve' => true,
			'useNoise' => false,
			'reset' => false
		);
		$Verify = new Verify($config);
		$Verify->entry("admin_login");
		exit();
	}
}