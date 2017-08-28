<?php
require("isLogin.php");
require("../inc/function.php");

$nid = $_GET['id'];
if (strlen($nid) == 0){
	alert("参数错误");
	href("news.php");
}else{
	if (!is_numeric($nid)){
		alert("参数错误");
		href("news.php");
	}
}
require("../inc/conn.php");
$sql = "delete from news where id =" . $nid . "";
mysql_query($sql);
$rows = mysql_affected_rows();
if ($rows >= 1){
	alert("删除成功");
	href("news.php");
}
mysql_close($conn);

?>