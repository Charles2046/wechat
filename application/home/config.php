<?php
$home_config = [
	'dispatch_error_tmpl'	=> 'public:dispatch_jump',
	'dispatch_success_tmpl'	=> 'public:dispatch_jump',
];

$html_config = include_once 'html.php';
return array_merge($home_config,$html_config);
?>