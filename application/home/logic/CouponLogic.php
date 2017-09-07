<?php
namespace app\home\logic;

use think\Model;
use think\Db;

class CouponLogic extends Model
{

	public function getCouponMoney($user_id, $coupon_id)
	{
		if ($coupon_id == 0) {
			return 0;
		}
	}

	public function getCouponMoneyByCode($couponCode, $orderMoney)
	{
		$couponList = M('CouponList')->where("code", $couponCode)->find();
	}
}