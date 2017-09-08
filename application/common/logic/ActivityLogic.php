<?php
namespace app\common\logic;

use think\Model;
use think\Db;

class ActivityLogic extends Model
{

	public function getGroupBuyList($sort_type = '', $page_index = 1, $page_size = 20)
	{
		$groups = array();
		return $groups;
	}

	public function getCouponList($atype, $user_id, $p = 1)
	{
		$coupon_list = '';
		return $coupon_list;
	}
	
	public function getCouponQuery($queryType, $user_id, $type = 0, $orderBy = null)
	{
		$where['l.uid'] = $user_id;
	}
	
	public function getUserCouponNum($user_id, $type = 0, $orderBy = null)
	{
		$query = $this->getCouponQuery(0, $user_id, $type, $orderBy);
		return $query->count();
	}
	
	public function getUserCouponList($firstRow, $listRows, $user_id, $type = 0, $orderBy = null)
	{
		$query = $this->getCouponQuery(1, $user_id, $type, $orderBy);
		return $query->limit($firstRow, $listRows)->select();
	}
	
	public function getCouponCenterList($cat_id, $user_id, $p = 1)
	{
		$cur_time = time();
	}
	
	public function getCouponTypes($p = 1, $num = null)
	{
		$result = '';
		return $result;
	}
	
	public function get_coupon($id, $user_id)
	{
		return $return;
	}
	
	public function getActivitySimpleInfo(&$goods, $user)
	{
		return $activity;
	}
	
	public function getGoodsPromSimpleInfo($user, &$goods)
	{
		return $activity;
	}
	
	public function getOrderPromSimpleInfo($user, $goods)
	{
		$cur_time = time();
	}
}