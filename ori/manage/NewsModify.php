<?php
require("isLogin.php");
$nid = $_GET['id'];
if (strlen($nid) == 0){
	alert ("参数错误");
	href("news.php");
}
require("../inc/conn.php");
$sql = "select * from news where Id = " . $nid . "";
$result = mysql_query($sql);
while ($rows = mysql_fetch_array($result)){
	$title = $rows['title'];
	$cont = $rows['content'];
}
mysql_close($conn);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改新闻</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
require("header.php");
?>
<div class="container">
<form action="saveNews.php" name="form1" id="table1" method="post"
	role="form">
<table class="table table-triped table-hover table-bordered">
	<tr>
		<td>标题</td>
		<td><input name="title" size="80" value="<?php echo $title; ?>"
			class="form-control" /></td>
	</tr>
	<tr>
		<td>内容</td>
		<td><textarea name="cont" rows="12" class="form-control"><?php echo $cont; ?> </textarea></td>
	</tr>
	<tr>
		<td><input type="hidden" name="action" value="modify" /> <input
			type="hidden" name="id" value="<?php echo $nid; ?>" /></td>
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
