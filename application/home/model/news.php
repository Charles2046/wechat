<?php
namespace app\index\controller;

use think\Model;

class News extends Model {
	protected $tableName = 'news';
	protected $pk = 'Id';
}
