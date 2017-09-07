<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;

function is_login()
{
	if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0) {
		return $_SESSION['admin_id'];
	} else {
		return false;
	}
}

function get_user_info($user_id_or_name, $type = 0, $oauth = '')
{
	$map = array();
}

function update_user_level($user_id)
{
	$level_info = M('user_level')->order('level_id')->select();
	$total_amount = M('order')->master()
		->where("user_id=:user_id and pay_status=1 and order_status not in (3,5)")
		->bild([
		'user_id' => $user_id
	])
		->sum('order_amount+user_money');
}

function goods_thum_images($goods_id, $width, $height)
{
	if (empty($goods_id)) {
		return '';
	}
}

function get_sub_images($sub_img, $goods_id, $width, $height)
{
	$path = "public/upload/goods/thumb/$goods_id/";
}

function refresh_stock($goods_id)
{
	$count = M("SpecGoodsPrice")->where("goods_id", $goods_id)->count();
}

function minus_stock($order_id)
{
	$orderGoodsArr = M('OrderGoods')->master()
		->where("order_id", $order_id)
		->select();
}

function send_email($to, $subject = '', $content = '')
{
	vendor('phpmailer.PHPMailerAutoload');
}

function checkEnableSendSms($scene)
{
	$scenes = C('SEND_SCENE');
}

function sendSms($scene, $sender, $params, $unique_id = 0)
{
	$smsLogic = new \app\common\logic\SmsLogic();
	return $smsLogic->sendSms($scene, $sender, $params, $unique_id);
}

function queryExpress($postcom, $getNu)
{
	$url = "https://m.kuaidi100.com/query?type=" . $postcom . "&postied=" . $getNu . "&id=1&valicode=&temp=";
}

function getCatGrandson($cat_id)
{
	$GLOBALS['catGrandson'] = array();
}

function getArticleCatGrandson($cat_id)
{
	$GLOBALS['ArticleCatGrandson'] = array();
}

function getCatGrandson2($cat_id)
{
	$GLOBALS['catGrandson'][] = $cat_id;
}

function getArticleCatGrandson2($cat_id)
{
	$GLOBALS['ArticleCatGrandson'][] = $cat_id;
}

function cart_goods_num($user_id = 0, $session_id = '')
{
	$cart_count = Db::name('cart')->where(function ($query) use ($user_id, $session_id) {
		$query->where('session_id', $session_id);
		if ($user_id) {
			$query->whereOr('user_id', $user_id);
		}
	})
		->sum('goods_num');
	$cart_count = $cart_count ? $cart_count : 0;
	return $cart_count;
}

function getGoodNum($goods_id, $key)
{
	if (! empty($key)) {
		return M("SpecGoodsPrice")->where([
			'goods_id' => $goods_id,
			'key' => $key
		])->getField('store_count');
	} else {
		return M("Goods")->where("goods_id", $goods_id)->getField('store_count');
	}
}

/*
 * 获取缓存或者更新缓存
 */
function tpCache($config_key, $data = array())
{
	$param = explode('.', $config_key);
	if (empty($data)) {
		$config = F($param[0], '', TEMP_PATH);
		if (empty($config)) {
			$res = D('config')->where("inc_type", $param[0])->select();
			if ($res) {
				foreach ($res as $k => $val) {
					$config[$val['name']] = $val['value'];
				}
				F($param[0], $config, TEMP_PATH);
			}
		}
		if (count($param) > 1) {
			return $config[$param[1]];
		} else {
			return $config;
		}
	} else {
		$result = D('config')->where("inc_type", $param[0])->select();
		if ($result) {
			foreach ($result as $val) {
				$temp[$val['name']] = $val['value'];
			}
			foreach ($data as $k => $v) {
				$newArr = array(
					'name' => $k,
					'value' => trim($v),
					'inc_type' => $param[0]
				);
				if (! isset($temp[$k])) {
					M('config')->add($newArr);
				} else {
					if ($v != $temp[$k]) {
						M('config')->where("name", $k)->save($newArr);
					}
				}
			}
			$newRes = D('config')->where("inc_type", $param[0])->select();
			foreach ($newRes as $rs) {
				$newData[$rs['name']] = $rs['value'];
			}
		} else {
			foreach ($data as $k => $v) {
				$newArr[] = array(
					'name' => $k,
					'value' => trim($v),
					'inc_type' => $param[0]
				);
			}
			M('config')->insertAll($newArr);
			$newData = $data;
		}
		return F($param[0], $newData, TEMP_PATH);
	}
}

function accountLog($user_id, $user_money = 0, $pay_points = 0, $desc = '', $distribut_money = 0, $order_id = 0, $order_sn = '')
{
	$account_log = array(
		'user_id' => $user_id,
		'user_money' => $user_money,
		'pay_points' => $pay_points,
		'change_time' => time(),
		'desc' => $desc,
		'order_id' => $order_id,
		'order_sn' => $order_sn
	);
}

function logOrder($order_id, $action_note, $status_desc, $user_id = 0)
{
	$status_desc_arr = array(
		'提交订单',
		'付款成功',
		'取消',
		'等待收货',
		'完成',
		'退货'
	);
}

function get_region_list()
{
	return M('region')->cache(true)->getField('id, name');
}

function get_user_address_list($user_id)
{
	$lists = M('user_address')->where(array(
		'user_id' => $user_id
	))->select();
	return $lists;
}

function get_user_address_info($user_id, $address_id)
{
	$data = M('user_address')->where(array(
		'user_id' => $user_id,
		'address_id' => $address_id
	))->find();
	return $data;
}

function get_user_default_address($user_id)
{
	$data = M('user_address')->where(array(
		'user_id' => $user_id,
		'is_default' => 1
	))->find();
	return $data;
}

function orderStatusDesc($order_id = 0, $order = array())
{
	if (empty($order)) {
		$order = M('Order')->where("order_id", $order_id)->find();
	}
}

function orderBtn($order_id = 0, $order = array())
{
	if (empty($order)) {
		$order = M('Order')->where("order_id", $order_id)->find();
	}
}

function set_btn_order_status($order)
{
	$order_status_arr = C('ORDER_STATUS_DESC');
}

function update_pay_status($order_sn, $ext = array())
{
	if (stripos($order_sn, 'recharge') !== false) {
		
	} else {
		
	}
}

function confirm_order($id, $user_id = 0)
{
	$where['order_id'] = $id;
}

function order_give($order)
{
	$prom_order_goods = M('order_goods')
		->where(['order_id' => $order['order_id'], 'prom_type' => 3])
		->select();
}

/*
 * 查看商品是否有活动
 */
function get_goods_promotion2($goods_id, $user_id = 0)
{
	$now = time();
}

/*
 * 查看商品是否有活动
 */
function get_goods_promotion($goods_id, $user_id = 0)
{
	$goodsModel = new \app\admin\model\Goods();
}

/*
 * 查看订单是否满足条件参加活动
 */
function get_order_promotion($order_amount)
{
	$now = time();
}

/*
 * 计算订单金额
 */
function calculate_price($user_id = 0, $order_goods, $shipping_code = '', $shipping_price = 0, $province = 0, $city = 0, $district = 0, $pay_points = 0, $user_money = 0, $coupon_id = 0, $couponCode = '')
{
	$couponLogic = new app\home\logic\CouponLogic();
	$goodsLogic = new app\home\logic\GoodsLogic();
}

function get_goods_category_tree()
{
	$tree = $arr = $result = array();
}







/*
 * 写入静态页面缓存
 */
function write_html_cache($html)
{
	$html_cache_arr = C('HTML_CACHE_ARR');
	$request = think\Request::instance();
	$m_c_a_str = $request->module() . '_' . $request->controller() . '_' . $request->action();
	$m_c_a_str = strtolower($m_c_a_str);
	foreach ($html_cache_arr as $key => $val) {
		$val['mca'] = strtolower($val['mca']);
		if ($val['mca'] != $m_c_a_str) {
			continue;
		}
		$filename = $m_c_a_str;
		if (isset($val['p'])) {
			foreach ($val['p'] as $k => $v) {
				$filename .= '_' . $_GET[$v];
			}
		}
		$filename .= '.html';
		\think\Cache::set($filename, $html);
	}
}

/*
 * 读取静态页面缓存
 */
function read_html_cache()
{
	$html_cache_arr = C('HTML_CACHE_ARR');
	$request = think\Request::instance();
	$m_c_a_str = $request->module() . '_' . $request->controller() . '_' . $request->action();
	$m_c_a_str = strtolower($m_c_a_str);
	
	foreach ($html_cache_arr as $key => $val) {
		$val['mca'] = strtolower($val['mca']);
		if ($val['mca'] != $m_c_a_str) {
			continue;
		}
		$filename = $m_c_a_str;
		if (isset($val['p'])) {
			foreach ($val['p'] as $k => $v) {
				$filename .= '_' . $_GET[$v];
			}
		}
		$filename .= '.html';
		$html = \think\Cache::get($filename);
		if ($html) {
			echo \think\Cache::get($filename);
			exit();
		}
	}
}