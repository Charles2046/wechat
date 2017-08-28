<?php
return [
	'template'	=>[
		'type'				=> 'Think',
		'viewpath'		=> './template/pc/default/',
		'view_suffix'	=> 'html',
		'view_depr'		=> DS,
		'tpl_begin'		=> '{',
		'tpl_end'			=> '}',
		'taglib_begin'	=> '<',
		'taglib_end'		=> '>',
		'default_theme'	=> 'default',
	],
	'view_replace_str'	=> [
		'__PUBLIC__'	=> '/public',
		'__STATIC__'		=> '/template/pc/default/static',
		'__ROOT__'		=> ''
	]
];
?>