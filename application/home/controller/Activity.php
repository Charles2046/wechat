<?php
namespace app\home\controller;

use app\home\logic\CartLogic;
use app\home\logic\GoodsLogic;
use think\AjaxPage;
use think\Controller;
use think\Url;
use think\Config;
use think\Page;
use think\Verify;
use think\Db;

class Activity extends Base
{

	public function group()
	{}

	public function group_list()
	{}

	public function pre_sell_list()
	{}

	public function pre_sell()
	{}

	public function promoteList()
	{}

	public function flash_sale_list()
	{}

	public function ajax_flash_sale()
	{}

	public function coupon_list()
	{}

	public function get_coupon()
	{}
}