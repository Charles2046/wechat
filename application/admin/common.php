<?php

function adminLog($log_info)
{
	$add['log_time'] = time();
	$add['admin_id'] = session('admin_id');
	$add['log_info'] = $log_info;
	$add['log_ip'] = request()->ip();
	$add['log_url'] = request()->baseUrl();
	M('admin_log')->add($add);
}

function getAdminInfo($admin_id)
{
	return D('admin')->where("admin_id", $admin_id)->find();
}

function tpversion()
{
	if (! empty($_SESSION['isset_push'])) {
		return false;
	}
}

function navigate_admin()
{
	$navigate = include APP_PATH . 'admin/conf/navigate.php';
}

function downloadExcel($strTable, $filename)
{
	header("Content-type: application/vnd.ms-excel");
}

function format_bytes($size, $delimiter = '')
{
	$units = array(
		'B',
		'KB',
		'MB',
		'GB',
		'TB',
		'PB'
	);
	for ($i = 0; $size >= 1024 && $i < 5; $i ++) {
		$size /= 1024;
	}
	return round($size, 2) . $delimiter . $units[$i];
}

function getRegionName($regionId)
{
	$data = M('region')->where(array(
		'id' => $regionId
	))
		->field('name')
		->find();
	return $data['name'];
}

function getMenuList($act_list)
{
	$menu_list = getAllMenu();
	if ($act_list != 'all') {
		$right = M('system_menu')->where("id", "in", $act_list)
			->cache(true)
			->getField('right', true);
		foreach ($right as $val) {
			$role_right .= $val . ',';
		}
		$role_right = explode(',', $role_right);
		foreach ($menu_list as $k => $mrr) {
			foreach ($mrr['sub_menu'] as $j => $v) {
				if (! in_array($v['control'] . '@' . $v['act'], $role_right)) {
					unset($menu_list[$k]['sub_menu'][$j]);
				}
			}
		}
	}
	return $menu_list;
}

function getAllMenu()
{
	return true;
}

function getMenuArr()
{
	$menuArr = include APP_PATH . 'admin/conf/menu.php';
	$act_list = session('act_list');
	if ($act_list != 'all' && ! empty($act_list)) {
		$right = M('system_menu')->where("id in ($cat_list)")
			->cache(true)
			->getField('right', true);
	}
}

function respose($res)
{
	exit(json_encode($res));
}