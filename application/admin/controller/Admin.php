<?php
namespace app\admin\controller;

use think\Page;
use think\Verify;
use think\Db;
use think\Session;

class Admin extends Base {
	public function index() {
		
	}
	
	public function login() {
		return $this->fetch();
	}
	
	public function logout() {
		session_unset();
		session_destroy();
		session::clear();
		$this->success("退出成功",U('Admin/Admin/login'));
	}
}