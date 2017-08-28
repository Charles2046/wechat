<?php
require("isLogin.php");
require("../inc/function.php");
$title = $_POST['title'];
$cont = $_POST['cont'];
//$cont = mb_convert_encoding($cont, "utf-8", "gbk");
$action = $_POST['action'];

if (strlen($title) == 0 || strlen($cont) == 0 || strlen($action) == 0){
	die("参数错误");
}
echo $cont;
require("../inc/conn.php");
if ($action == "modify"){
	$id = $_POST['id'];
	$sql = "update news set title = '" . $title . "', content = '" . $cont . "' where id=" . $id . "";
}elseif ($action == "add") {
	$sql = "insert into news (title, content) values ('" . $title . "', '" . $cont . "')";
}
mysql_query($sql,$conn);
$rows = mysql_affected_rows();
if ($rows >= 1){
	alert("编辑成功");
	href("news.php");
}
mysql_close($conn);
?>