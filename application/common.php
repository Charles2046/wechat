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
function is_login(){
    if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] > 0){
        return $_SESSION['admin_id'];
    }else{
        return false;
    }
}

/*
 * 获取缓存或者更新缓存
 */
function tpCache($config_key,$data=array()) {
	$param = explode('.', $config_key);
	if (empty($data)){
		$config = F($param[0],'',TEMP_PATH);
		if (empty($config)){
			$res = D('config')->where("inc_type",$param[0])->select();
			if ($res){
				foreach($res as $k=>$val){
					$config[$val['name']] = $val['value'];
				}
				F($param[0],$config,TEMP_PATH);
			}
		}
		if (count($param)>1){
			return $config[$param[1]];
		} else {
			return $config;
		}
	} else {
		$result = D('config')->where("inc_type",$param[0])->select();
		if ($result) {
			foreach ($result as $val) {
				$temp[$val['name']] = $val['value'];
			}
			foreach ($data as $k=>$v) {
				$newArr = array('name'=>$k,'value'=>trim($v),'inc_type'=>$param[0]);
				if (!isset($temp[$k])) {
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
			foreach ($data as $k=>$v) {
				$newArr[] = array('name'=>$k,'value'=>trim($v),'inc_type'=>$param[0]);
			}
			M('config')->insertAll($newArr);
			$newData = $data;
		}
		return F($param[0],$newData,TEMP_PATH);
	}
}

/*
 * 写入静态页面缓存
 */
function write_html_cache($html){
	$html_cache_arr = C('HTML_CACHE_ARR');
	$request = think\Request::instance();
	$m_c_a_str = $request->module().'_'.$request->controller().'_'.$request->action();
	$m_c_a_str = strtolower($m_c_a_str);
	foreach($html_cache_arr as $key=>$val){
		$val['mca'] = strtolower($val['mca']);
		if ($val['mca'] != $m_c_a_str) {
			continue;
		}
		$filename = $m_c_a_str;
		if (isset($val['p'])) {
			foreach($val['p'] as $k=>$v) {
				$filename.='_'.$_GET[$v];
			}
		}
		$filename.= '.html';
		\think\Cache::set($filename,$html);
	}
}

/*
 * 读取静态页面缓存
 */
function read_html_cache(){
	$html_cache_arr = C('HTML_CACHE_ARR');
	$request = think\Request::instance();
	$m_c_a_str = $request->module().'_'.$request->controller().'_'.$request->action();
	$m_c_a_str = strtolower($m_c_a_str);
	
	foreach($html_cache_arr as $key=>$val){
		$val['mca'] = strtolower($val['mca']);
		if ($val['mca'] != $m_c_a_str){
			continue;
		}
		$filename = $m_c_a_str;
		if (isset($val['p'])) {
			foreach($val['p'] as $k=>$v){
				$filename.='_'.$_GET[$v];
			}
		}
		$filename.= '.html';
		$html = \think\Cache::get($filename);
		if ($html){
			echo \think\Cache::get($filename);
			exit();
		}
	}
}