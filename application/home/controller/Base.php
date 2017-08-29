<?php
namespace app\home\controller;

use think\Controller;
use think\Db;
use think\Session;

class Base extends Controller
{

	public $session_id;

	public $cateTree = array();

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
	
	/*
	 * 保存公告变量
	 */
	public function public_assign() {
		/*
		$tpshop_config = array();
		$tp_config = M('config')->cache(true,TPSHOP_CACHE_TIME)->select();
		foreach($tp_config as $k=>$v) {
			if ($v['name'] == 'hot_keywords') {
				$tpshop_config['hot_keywords'] = explode('|',$v['value']);
			}
			$tpshop_config[$v['inc_type'].'_'.$v['name']] = $v['value'];
		}
		$goods_category_tree = get_goods_category_tree();
		$this->cateTree = $goods_category_tree;
		$this->assign('goods_category_tree',$goods_category_tree);
		$brand_list = M('brand')->cache(true)->field('id,name,parent_cat_id,logo,is_hot')->where("parent_cat_id>0")->select();
		$this->assign('brand_list',$brand_list);
		$this->assign('tpshop_config',$tpshop_config);
		*/
	}

	public function ajaxReturn($data)
	{
		exit(json_encode($data));
	}
}


