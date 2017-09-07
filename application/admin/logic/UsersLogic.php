<?php
namespace app\admin\logic;

use think\Model;
use think\Db;

class UsersLogic extends Model
{

	public function detail($uid, $relation = true)
	{
		$user = M('users')->where(array(
			'user_id' => $uid
		))
			->relation($relation)
			->find();
		return $user;
	}

	public function updateUser($uid = 0, $data = array())
	{
		$db_res = M('users')->where(array(
			"user_id" => $uid
		))
			->data($data)
			->save();
		if ($db_res) {
			return array(
				1,
				"用户信息修改成功"
			);
		} else {
			return array(
				0,
				"用户信息修改失败"
			);
		}
	}

	public function addUser($user)
	{
		$user_count = Db::name('users')->where(function ($query) use ($user) {
			if ($user['email']) {
				$query->where('email', $user['email']);
			}
			if ($user['mobile']) {
				$query->whereOr('mobile', $user['mobile']);
			}
		})
			->count();
		if ($user_count > 0) {
			return array(
				'status' => - 1,
				'msg' => '账号已存在'
			);
		}
		$user['password'] = encrypt($user['password']);
		$user['reg_time'] = time();
		$user_id = M('users')->add($user);
		if (! $user_id) {
			return array(
				'status' => - 1,
				'msg' => '添加失败'
			);
		} else {
			$pay_points = tpCache('basic.reg_integral');
			if ($pay_points > 0) {
				accountLog($user_id, 0, $pay_points, '会员注册赠送积分');
			}
			return array(
				'status' => 1,
				'msg' => '添加成功'
			);
		}
	}
}