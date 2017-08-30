<?php
namespace app\admin\controller;

use think\controller;

class Index extends Base {
	public function index() {
		return $this->fetch();
	}
}