<?php

namespace app\admin\controller;

use think\Page;
use app\admin\logic\ArticleCatLogic;
use think\Db;

class Article extends Base
{
	private $article_system_id = array(1,2,3,4,5);
	private $article_main_system_id = array(1,2);
	private $article_top_system_id = array(1);
	private $article_able_id = array(1);
	public function _initialize()
	{
		parent::_initialize();
		$this->assign('article_top_system_id', $this->article_top_system_id);
		$this->assign('article_system_id', $this->article_system_id);
		$this->assign('article_main_system_id', $this->article_main_system_id);
		$this->assign('article_able_id', $this->article_able_id);
	}
	
	public function categoryList()
	{
		$ArticleCat = new ArticleCatLogic();
		$cat_list = $ArticleCat->article_cat_list(0,0,false);
		$type_arr = array('系统默认','系统帮助','系统公告');
		$this->assign('type_arr', $type_arr);
		$this->assign('cat_list', $cat_list);
		return $this->fetch('categoryList');
		
		
	}
}