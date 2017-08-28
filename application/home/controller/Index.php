<?php
namespace app\home\controller;
use think\Controller;
use think\Config;

class Index extends Base {
	public function index()
	{
		if (isMobile() == true){
			header("Location: " . U('Mobile/Index/index'));
			exit;
		}
		
		return 'hello, world';
		
		//return $this->fetch();
	}
}
