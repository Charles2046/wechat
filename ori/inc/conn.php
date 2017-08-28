<?php
$mysql_server_name = "localhost";
$mysql_username = 'root';
$mysql_password = 'mysql';
$mysql_database = 'web201705';

$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
if (!$conn){
	die("数据库连接失败");
}
@mysql_select_db($mysql_database, $conn) or die("选择的数据库不存在");
//mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
//mysql_default_charset('utf8');
?>