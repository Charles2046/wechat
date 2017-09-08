<?php
namespace app\admin\model;

use think\Model;

class Spec extends Model
{

	public function afterSave($id)
	{
		$model = M("SpecItem");
		$post_items = explode(PHP_EOL, I('items'));
		foreach ($post_items as $key => $val) {
			$val = str_replace('_', '', $val);
			$val = str_replace('@', '', $val);
			$val = trim($val);
			if (empty($val)) {
				unset($post_items[$key]);
			} else {
				$post_items[$key] = $val;
			}
		}
		$db_items = $model->where("spec_id = $id")->getField('id,item');
		foreach ($post_items as $key => $val) {
			if (! in_array($val, $db_items)) {
				$dataList[] = array(
					'spec_id' => $id,
					'item' => $val
				);
			}
		}
		$dataList && $model->insertAll($dataList);
		foreach ($db_items as $key => $val) {
			if (! in_array($val, $post_items)) {
				M("SpecGoodsPrice")->where("`key` REGEXP '^{$key}_' OR `key` REGEXP '_{$key}_' OR `key` REGEXP '_{$key}$' OR `key` = '{$key}'")->delete();
				M("SpecItem")->where('id = ' . $key)->delete();
			}
		}
	}
}