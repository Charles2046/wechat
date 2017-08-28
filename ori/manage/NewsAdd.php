<?php
require("isLogin.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>添加新闻</title>
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
<form action="NewsSave.php" name="form1" method="post">
<table class="table table-striped table-hover table-bordered">
	<tr>
		<td>标题</td>
		<td><input name="title" size="80" class="form-control" /></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><textarea name="cont" rows="15" class="form-control"></textarea></td>
	</tr>
	<tr>
		<td><input type="hidden" name="action" value="add" /></td>
		<td><input type="submit" class="btn btn-primary" /></td>
	</tr>
</table>
</form>
</div>
<?php
require("footer.php");
?>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
