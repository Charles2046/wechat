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
	
	public function category()
	{
		$ArticleCat = new ArticleCatLogic();
		$act = I('get.act', 'add');
		$cat_id = I('get.cat_id/d');
		$parent_id = I('get.parent_id/d');
		if ($cat_id) {
			$cat_info = D('article_cat')->where('cat_id=' . $cat_id)->find();
			$parent_id = $cat_info['parent_id'];
			$this->assign('cat_info', $cat_info);
		}
		$cats = $ArticleCat->article_cat_list(0, $parent_id, true);
		$this->assign('act', $act);
		$this->assign('cat_select', $cats);
		return $this->fetch();
	}
	
	public function articleList()
	{
		$Article = M('Article');
	}
	
	public function article()
	{
		$ArticleCat = new ArticleCatLogic();
	}
	
	private function initEditor()
	{
		$this->assign("URL_upload", U('Admin/Ueditor/imageUp', array('savepath'=>'article')));
		$this->assign("URL_fileUp", U('Admin/Ueditor/fileUp', array('savepath'=>'article')));
		$this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp', array('savepath'=>'article')));
		$this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage', array('savepath'=>'article')));
		$this->assign("URL_imageManager", U('Admin/Ueditor/imageManager', array('savepath'=>'article')));
		$this->assign("URL_imageUp", U('Admin/Ueditor/imageUp', array('savepath'=>'article')));
		$this->assign("URL_getMovie", U('Admin/Ueditor/getMovie', array('savepath'=>'article')));
		$this->assign("URL_Home", "");
	}
	
	public function categoryHandle()
	{
		$data = I('post.');
	}
	
	public function articleHandle()
	{
		$date = I('post.');
	}
	
	public function link()
	{
		$act = I('get.act', 'add');
	}
	
	public function linkList()
	{
		$Ad = M('friend_link');
	}
	
	public function linkHandle()
	{
		$data = I('post.');
	}
}