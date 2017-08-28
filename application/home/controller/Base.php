<?php
namespace app\home\controller;

use think\Controller;
use think\Session;

class Base extends Controller
{

	public $session_id;

	public $cataTree = array();

	/**
	 */
	public function _initialize()
	{
		Session::start();
		header("Cache-control: private");
		$this->session_id = session_id();
		define('SESSION_ID', $this->session_id);
		
		if (isMobile()) {
			cookie('is_mobile', '1', 3600);
		} else {
			cookie('is_mobile', '0', 3600);
		}
		$this->public_assign();
	}

	public function public_assign()
	{}

	public function ajaxReturn($data)
	{
		exit(json_encode($data));
	}
}


