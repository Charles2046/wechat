<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>首页</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css"  rel="stylesheet" type="text/css" />
</head>

<body>
<?php
require("inc/head.php");
require("inc/conn.php")
?>
<hr />
<section>
<h3>新闻中心</h3>
</section>
<?php 
$sql = "select * from news";
$result = mysql_query($sql);
while ($rows = mysql_fetch_array($result)){
	echo "<article>";
	echo "<h4><a href='article.php?id=" . $rows['Id'] . "' title='" . $rows['title'] . "'>" . $rows['title'] . "</a></h4>";
	echo "<p><a href='article.php?id=" . $rows['Id'] . "'>" . mb_substr($rows['content'], 1,100,'utf-8') . "</a></p>";
	echo "</article>";
}
?>
<hr />
<?php
require("inc/foot.php");
?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
