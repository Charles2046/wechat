<?php
namespace app\home\controller;
use think\Controller;
use think\Url;
use think\Config;
use think\Page;
use think\Verify;
use think\Image;
use think\Db;

class Index extends Base
{

	public function index()
	{
		if (isMobile() == true) {
			header("Location: " . U('Mobile/Index/index'));
			exit;
		}
		
		return $this->fetch();
		//return 'hello, world';
	}

	public function notice()
	{
		return $this->fetch();
	}

	public function qr_code_raw()
	{}

	public function qr_code()
	{}

	public function verify()
	{}

	function truncate_tables()
	{}

	public function ajax_favorite()
	{}
}
