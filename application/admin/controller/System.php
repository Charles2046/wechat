<?php
namespace app\admin\controller;

use app\admin\logic\GoodsLogic;
use think\Db;
use think\Cache;

class System extends Base
{
	public function index()
	{
		$group_list = [
			'shop_info' => '网站信息',
			'basic' => '基本设置',
			'sms' => '短信设置',
			'shopping' => '购物流程设置',
			'smtp' => '邮件设置',
			'water' => '水印设置',
			'distribut' => '分销设置',
			'push' => '推送设置',
			'oss' => '对象存储'
		];
	}
}