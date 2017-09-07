<?php
namespace app\admin\controller;

use think\AjaxPage;
use think\Controller;
use think\Url;
use think\Config;
use think\Page;
use think\Verify;
use think\Db;

class Index extends Base
{

	public function index()
	{
		$this->pushVersion();
		$act_list = session('act_list');
		//var_dump($act_list);
		if ($act_list == NULL) {
			$act_list = 'all';
		}
		$menu_list = getMenuList($act_list);
		$this->assign('menu_list', $menu_list);
		$admin_info = getAdminInfo(session('admin_id'));
		$order_amount = M('order')->where("order_status = 0 and (pay_status = 1 or pay_code = 'cod')")->count();
		$this->assign('order_amount', $order_amount);
		$this->assign('admin_info', $admin_info);
		$this->assign('menu', getMenuArr());
		return $this->fetch();
	}

	public function welcome()
	{
		$this->assign('sys_info', $this->get_sys_info());
	}

	public function get_sys_info()
	{
		$sys_info['os'] = PHP_OS;
	}

	public function pushVersion()
	{
		if (! empty($_SESSION['isset_push'])) {
			return false;
		}
	}

	public function changeTableVal()
	{
		$table = I('table');
		$id_name = I('id_name');
	}

	public function about()
	{
		return $this->fetch();
	}
}