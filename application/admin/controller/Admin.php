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

	public function modify_pwd()
	{
		$admin_id = I('admin_id/d', 0);
	}

	public function admin_info()
	{
		$admin_id = I('get.admin_id/d', 0);
	}

	public function adminHandle()
	{
		$data = I('post.');
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
					'msg' => '验证码错误',
				), JSON_UNESCAPED_UNICODE));
			}
			$condition['user_name'] = I('post.username/s');
			$condition['password'] = I('post.password/s');
			if (!empty($condition['user_name']) && !empty($condition['password'])) {
				$condition['password'] = encrypt($condition['password']);
				echo encrypt($condition['password']);
				$admin_info = M('admin')->join(PREFIX . 'admin_role', PREFIX . 'admin.role_id=' . PREFIX . 'admin_role.role_id', 'INNER')
					->where($condition)
					->find();
				var_dump($admin_info);
				if (is_array($admin_info)) {
					session('admin_id', $admin_info['admin_id']);
					session('act_list', $admin_info['act_list']);
					M('admin')->where("admin_id = " . $admin_info['admin_id'])->save(array(
						'last_login' => time(),
						'last_ip' => request()->ip()
					));
					session('last_login_time', $admin_info['last_login']);
					session('last_login_ip', $admin_info['last_ip']);
					adminLog('后台登录');
					$url = session('from_url') ? session('from_url') : U('Admin/Index/index');
					exit(json_encode(array(
						'status' => 1,
						'url' => $url
					)));
				} else {
					exit(json_encode(array(
						'status' => 0,
						'msg' => '账号密码不正确',
					), JSON_UNESCAPED_UNICODE));
				}
			} else {
				exit(json_encode(array(
					'status' => 0,
					'msg' => '请填写账号密码',
				), JSON_UNESCAPED_UNICODE));
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

	public function role()
	{
		$list = D('admin_role')->order('role_id desc')->select();
		$this->assign('list', $list);
		return $this->fetch();
	}

	public function role_info()
	{
		$role_id = I('get.role_id/d');
		$detail = array();
		if ($role_id) {
			$detail = M('admin_role')->where("role_id", $role_id)->find();
			$detail['act_list'] = explode(',', $detail['act_list']);
			$this->assign('detail', $detail);
		}
		$right = M('system_menu')->order('id')->select();
		foreach ($right as $val) {
			if (! empty($detail)) {
				$val['enable'] = in_array($val['id'], $detail['act_list']);
			}
			$modules[$val['group']][] = $val;
		}
		$group = array(
			'system' => '系统设置',
			'content' => '内容管理',
			'goods' => '商品中心',
			'member' => '会员中心',
			'order' => '订单中心',
			'marketing' => '营销推广',
			'tools' => '插件工具',
			'count' => '统计报表'
		);
		$this->assign('group', $group);
		$this->assign('modules', $modules);
		return $this->fetch();
	}

	public function roleSave()
	{
		$data = I('post.');
	}

	public function roleDel()
	{
		$role_id = I('post.role_id/d');
	}

	public function log()
	{
		$p = I('p/d', 1);
	}

	public function supplier()
	{
		$supplier_count = DB::name('suppliers')->count();
	}

	public function supplier_info()
	{
		$suppliers_id = I('get.suppliers_id/d', 0);
	}

	public function supplierHandle()
	{
		$data = I('post.');
	}
}