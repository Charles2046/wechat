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
	],
	'FUNCTION_PLUGIN_PATH' => PLUGIN_PATH . 'function',
	'dispatch_error_tmpl' => 'public:dispatch_jump',
	'dispatch_success_tmpl' => 'public:dispatch_jump',
	'url_html_suffix' => ''
]?>