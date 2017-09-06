<?php
namespace app\admin\logic;

use think\Model;
use think\Db;

class ArticleCatLogic extends Model
{

	/*
	 * 获得指定分类下的子分类的数组
	 */
	public function article_cat_list($cat_id = 0, $selected = 0, $re_type = true, $level = 0)
	{
		static $res = NULL;
		if ($res === NULL) {
			$data = false;
			if ($data === false) {
				$cat_type = I('cat_type/d');
				$where = array();
				if ($cat_type != "") {
					$where['c.cat_type'] = $cat_type;
				}
				$res = DB::name('article_cat')->field('c.*, count(s.cat_id) as has_children')
					->alias('c')
					->join('__ARTICLE_CAT__ s', 's.parent_id = c.cat_id', 'LEFT')
					->where($where)
					->group('c.cat_id')
					->order('parent_id, sort_order')
					->select();
				//
			} else {
				$res = $data;
			}
		}
		if (empty($res) == true) {
			return $re_type ? '' : array();
		}
		$options = $this->article_cat_options($cat_id, $res);
		
		if ($level > 0) {
			if ($cat_id == 0) {
				$end_level = $level;
			} else {
				$first_item = reset($options);
				$end_level = $first_item['level'] + $level;
			}
			foreach ($options as $key => $val) {
				if ($val['level'] >= $end_level) {
					unset($options[$key]);
				}
			}
		}
		$pre_key = 0;
		foreach ($options as $key => $value) {
			$options[$key]['has_children'] = 1;
			if ($pre_key > 0) {
				if ($options[$pre_key]['cat_id'] == $options[$key]['parent_id']) {
					$options[$pre_key]['has_children'] = 1;
				}
			}
			$pre_key = $key;
		}
		if ($re_type == true) {
			$select = '';
			foreach ($options as $var) {
				$select .= '<option value="' . $var['cat_id'] . '" ';
				$select .= ($selected == $var['cat_id']) ? "selected='true'" : '';
				$select .= '>';
				if ($var['level'] > 0) {
					$select .= str_repeat('&nbsp;', $var['level'] * 4);
				}
				$select .= htmlspecialchars(addslashes($val['cat_name'])) . '</option>';
			}
			return $select;
		} else {
			foreach ($options as $key => $value) {
				
			}
			return $options;
		}
	}

	public function article_cat_options($spec_cat_id, $arr)
	{
		static $cat_options = array();
		if (isset($cat_options[$spec_cat_id])) {
			return $cat_options[$spec_cat_id];
		}
		if (! isset($cat_options[0])) {
			$level = $last_cat_id = 0;
			$options = $cat_id_array = $level_array = array();
			while (! empty($arr)) {
				foreach ($arr as $key => $value) {
					$cat_id = $value['cat_id'];
					if ($level == 0 && $last_cat_id == 0) {
						if ($value['parent_id'] > 0) {
							break;
						}
						$options[$cat_id] = $value;
						$options[$cat_id]['level'] = $level;
						$options[$cat_id]['id'] = $cat_id;
						$options[$cat_id]['name'] = $value['cat_name'];
						unset($arr[$key]);
						
						if ($value['has_children'] == 0) {
							continue;
						}
						
						$last_cat_id = $cat_id;
						$cat_id_array = array(
							$cat_id
						);
						$level_array[$last_cat_id] = ++ $level;
						continue;
					}
					if ($value['parent_id'] == $last_cat_id) {
						$options[$cat_id] = $value;
						$options[$cat_id]['level'] = $level;
						$options[$cat_id]['id'] = $cat_id;
						$options[$cat_id]['name'] = $value['cat_name'];
						unset($arr[$key]);
						
						if ($value['has_children'] > 0) {
							if (end($cat_id_array) != $last_cat_id) {
								$cat_id_array[] = $last_cat_id;
							}
							$last_cat_id = $cat_id;
							$cat_id_array[] = $cat_id;
							$level_array[$last_cat_id] = ++ $level;
						}
					} elseif ($value['parent_id'] > $last_cat_id) {
						break;
					}
				}
				$count = count($cat_id_array);
				if ($count > 1) {
					$last_cat_id = array_pop($cat_id_array);
				} elseif ($count == 1) {
					if ($last_cat_id != end($cat_id_array)) {
						$last_cat_id = end($cat_id_array);
					} else {
						$level = 0;
						$last_cat_id = 0;
						$cat_id_array = array();
						continue;
					}
				}
				if ($last_cat_id && isset($level_array[$last_cat_id])) {
					$level = $level_array[$last_cat_id];
				} else {
					$level = 0;
					break;
				}
			}
			$cat_options[0] = $options;
		} else {
			$options = $cat_options[0];
		}
		if (! $spec_cat_id) {
			return $options;
		} else {
			if (empty($options[$spec_cat_id])) {
				return array();
			}
			$spec_cat_id_level = $options[$spec_cat_id]['level'];
			foreach ($options as $key => $value) {
				if ($key != $spec_cat_id) {
					unset($options[$key]);
				} else {
					break;
				}
			}
			$spec_cat_id_array = array();
			foreach ($options as $key => $value) {
				if (($spec_cat_id_level == $value['level'] && $value['cat_id'] != $spec_cat_id) || ($spec_cat_id_level > $value['level'])) {
					break;
				} else {
					$spec_cat_id_array[$key] = $value;
				}
			}
			$cat_options[$spec_cat_id] = $spec_cat_id_array;
			return $spec_cat_id_array;
		}
	}
}