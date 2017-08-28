<?php
require("isLogin.php");
require("../inc/conn.php")
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文章中心</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
<h3><a href="NewsAdd.php" title="添加文章">添加文章</a></h3>
</div>
<div class="container">
<table class="table table-striped table-bordered table-hover">
	<tr>
		<th>ID</th>
		<th>标题</th>
		<th>操作</th>
	</tr>
	<?php
	$sql = "select * from news";
	$result = mysql_query($sql);
	while ($rows = mysql_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $rows['Id'] . "</td><td>" . $rows['title'] . "</td>";
		//<td>" . $rows['content'] . "</td>";
		echo "<td><a href='NewsModify.php?id=" . $rows['Id'] . "' title='修改'>修改</a>";
		echo " <a href='NewsDelete.php?id=" . $rows['Id'] . "' title='删除'>删除</a></td>";
		echo "</tr>";
	}
	mysql_close($conn);
	?>
</table>
</div>
	<?php
	require("footer.php");
	?>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
