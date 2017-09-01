<?php

function convert_arr_key($arr, $key_name)
{
	$arr2 = array();
	foreach ($arr as $key => $val) {
		$arr2[$val[$key_name]] = $val;
	}
	return $arr2;
}

function encrypt($str)
{
	return md5(C("AUTH_CODE") . $str);
}

function get_arr_column($arr, $key_name)
{
	$arr2 = array();
	foreach ($arr as $key => $val) {
		$arr2[] = $val[$key_name];
	}
	return $arr2;
}

function parse_url_param($str)
{
	$data = array();
	$str = explode('?', $str);
	$str = end($str);
	$parameter = explode('&', $str);
	foreach ($parameter as $val) {
		$tmp = explode('=', $val);
		$data[$tmp[0]] = $tmp[1];
	}
	return $data;
}

function array_sort($arr, $keys, $type = 'desc')
{
	$key_value = $new_array = array();
	foreach ($arr as $k => $v) {
		$key_value[$k] = $v[$keys];
	}
	if ($type == 'asc') {
		asort($key_value);
	} else {
		arsort($key_value);
	}
	reset($key_value);
	foreach ($key_value as $k => $v) {
		$new_array[$k] = $arr[$k];
	}
	return $new_array;
}

function array_multi2single($array)
{
	static $result_array = array();
	foreach ($array as $value) {
		if (is_array($value)) {
			array_multi2single($value);
		} else {
			$result_array[] = $value;
		}
	}
	return $result_array;k
}

function friend_date($time)
{
	if (!$time) {
		return false;
	}
	$fdate = '';
	$d = time() - intval($time);
	$ld = $time - mktime(0, 0, 0, 0, 0, date('Y'));
	$md = $time - mktime(0, 0, 0, date('m'), 0, date('Y'));
	$byd = $time - mktime(0, 0, 0, date('m'), date('d') -2, date('Y'));
	$yd = $time - mktime(0, 0, 0,date('m'), date('d') -1, date('Y'));
	$dd = $time - mktime(0, 0, 0,date('m'), date('d'), date('Y'));
	$td = $time - mktime(0, 0, 0,date('m'), date('d') + 1, date('Y'));
	$atd = $time - mktime(0, 0, 0,date('m'), date('d') + 2, date('Y'));
	if ($d == 0) {
		$fdate = '刚刚';
	} else {
		switch($d) {
			case $d < $atd:
				$fdate = date('Y年m月d日', $time);
				break;
			case $d < $td:
				$fdate = '后天' . date('H:i', $time);
				break;
			case $d < 0:
				$fdate = '明天' . date('H:i', $time);
				break;
			case $d < 60:
				$fdate = $d . '秒前';
				break;
			case $d < 3600:
				$fdate = floor($d / 60) . '分钟前';
				break;
			case $d < $dd:
				$fdate = floor($d / 3600) . '小时前';
				break;
			case $d < $yd:
				$fdate = '昨天' . date('H:i', $time);
				break;
			case $d < $byd:
				$fdate = '前天' . date('H:i', $time);
				break;
			case $d < $md:
				$fdate = date('m月d日 H:i', $time);
				break;
			case $d < $ld:
				$fdate = date('m月d日', $time);
				break;
			default:
				$fdate = date('Y年m月d日', $time);
				break;
		}
	}
	return $fdate;
}

function arrayRes($status, $info, $url = "")
{
	return array(
		"status" => $status,
		"info" => $info,
		"url" => $url
	);
}

function get_id_val($arr, $key_name, $key_name2)
{
	$arr2 = array();
	foreach ($arr as $key => $val) {
		$arr2[$val[$key_name]] = $val[$key_name2];
	}
	return $arr2;
}

function serverIP()
{
	return gethostbyname($_SERVER["SERVER_NAME"]);
}

function recurse_copy($src, $dst)
{
	$now = time();
	$dir = opendir($src);
	@mkdir($dst);
	while (false !== $file = readdir($dir)) {
		if (($file != '.') && ($file != '..')) {
			if (is_dir($src . '/' . $file)) {
				recurse_copy($src . '/' . $file, $dst . '/' . $file);
			} else {
				if (file_exists($dst . DIRECTORY_SEPARATOR . $file)) {
					if (!is_writeable($dst . DIRECTORY_SEPARATOR . $file)) {
						exit($dst . DIRECTORY_SEPARATOR . $file . '不可写');
					}
					@unlink($dst . DIRECTORY_SEPARATOR . $file);
				}
				if (file_exists($dst . DIRECTORY_SEPARATOR . $file)) {
					@unlink($dst . DIRECTORY_SEPARATOR . $file);
				}
				$copyrt = copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
				if (!$copyrt) {
					echo 'copy ' . $dst . DIRECTORY_SEPARATOR . $file . ' failed<br />';
				}
			}
			closedir($dir);
		}
	}
}









/**
 * 判断当前访问的用户是 PC端 还是 手机端 返回true 为手机端 false 为PC 端
 *
 * @return boolean * 是否移动端访问访问
 *         *
 *         * @return bool
 *        
 */
function isMobile()
{
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
		return true;
	
	// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset($_SERVER['HTTP_VIA'])) {
		// 找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	// 脑残法，判断手机发送的客户端标志,兼容性有待提高
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array(
			'nokia',
			'sony',
			'ericsson',
			'mot',
			'samsung',
			'htc',
			'sgh',
			'lg',
			'sharp',
			'sie-',
			'philips',
			'panasonic',
			'alcatel',
			'lenovo',
			'iphone',
			'ipod',
			'blackberry',
			'meizu',
			'android',
			'netfront',
			'symbian',
			'ucweb',
			'windowsce',
			'palm',
			'operamini',
			'operamobi',
			'openwave',
			'nexusone',
			'cldc',
			'midp',
			'wap',
			'mobile'
		);
		// 从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
			return true;
	}
	// 协议法，因为有可能不准确，放到最后判断
	if (isset($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}
