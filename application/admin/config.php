<?php
return [
	'template' => [
		'type' => 'Think',
		'view_path' => './application/admin/view2/',
		'view_suffix' => 'html',
		'view_depr' => DS,
		'tpl_begin' => '{',
		'tpl_end' => '}',
		'taglib_begin' => '<',
		'taglib_end' => '>'
	],
	'view_replace_str' => [
		'__PUBLIC__' => '/public',
		'__ROOT__' => ''
		//'__STATIC__' => '',
	],
	'PAYMENT_PLUGIN_PATH' => PLUGIN_PATH . 'payment',
	'LOGIN_PLUGIN_PATH' => PLUGIN_PATH . 'login',
	'SHIPPING_PLUGIN_PATH' => PLUGIN_PATH . 'shipping',
	'FUNCTION_PLUGIN_PATH' => PLUGIN_PATH . 'function',
	'dispatch_error_tmpl' => 'public:dispatch_jump',
	'dispatch_success_tmpl' => 'public:dispatch_jump',
	'DATA_BACKUP_PATH' => 'public/upload/sqldata/',
	'DATA_BACKUP_PART_SIZE' => 20971520,
	'DATA_BACKUP_COMPRESS' => 0,
	'DATA_BACKUP_COMPRESS_LEVEL' => 9,
	'url_html_suffix' => ''
]?>