<?php
namespace app\home\controller;

use think\Controller;

class Cache extends Controller
{
	public function index() {
		$dirs = array('Runtime');
		@mkdir('Runtime',0777,true);
		foreach($dirs as $value) {
			$this->mddirr($value);
		}
		echo '<div>清除成功</div>';
		
	}
	
	public function rmdirr($dirname) {
		if (!file_exists($dirname)) {
			return false;
		}
		if (is_file($dirname) || is_link($dirname)) {
			return unlink($dirname);
		}
		$dir = dir($dirname);
		if($dir){
			while (false !== $entry = $dir->read()) {
				if ($entry == '.' || $entry == '..') {
					continue;
				}
				//递归
				$this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
			}
		}
		$dir->close();
		return rmdir($dirname);
	}
}