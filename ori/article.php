<?php
$id = $_GET["id"];
if (strlen($id) == 0){
	die("Error");
}
require("inc/conn.php");
$result = mysql_query("select * from news where id = ".$id);
while($row = mysql_fetch_array($result)){
	$title = $row['title'];
	$cont = $row['content'];
	//$cont = mb_convert_encoding($row['content'], "utf-8", "gbk");  
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $title ?></title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css"  rel="stylesheet" type="text/css" />
</head>

<body>
<?php 
require("inc/head.php");
?>
<p>
<?php echo $cont ?></p>
<?php 
require("inc/foot.php");
?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



