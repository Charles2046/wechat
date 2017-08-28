<?php
require("inc/conn.php");
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新闻中心</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
require("inc/head.php");

$result = mysql_query("select * from news");

while($row = mysql_fetch_array($result)){
	echo "<h3><a href='article.php?id=".$row['Id']."' title='".$row['title']."'>".$row['title']."</a></h3>";
}

//$row = mysql_fetch_array($result);
//var_dump($row);
mysql_close($conn);

require("inc/foot.php");
?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
