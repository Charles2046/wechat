<?php
$email = $_POST['email'];
$pwd = md5($_POST['password']);

if (strlen($email) == 0 or strlen($pwd) == 0){
	die("参数不能为空");
}
require("../inc/conn.php");
$sql = "select * from admin";
$result = mysql_query("$sql");
while($row = mysql_fetch_array($result)){

	if ($row['email'] == $email && $row['password'] == $pwd){
		session_start(); 
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $row['username'];
		session_write_close();
		echo "<script>window.location='index.php';</script>";
	}
}
if (isset($_SESSION['email'])){}else{
	echo "<script language='javascript'>alert('您输入的管理员邮箱或密码错误，请重新输入！');history.back();</script>";  
	exit;  
}
?>