<?php
namespace app\admin\controller;

use think\controller;

class Index extends Base {
	public function index() {
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
		if (!empty($_SESSION['isset_push'])) {
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