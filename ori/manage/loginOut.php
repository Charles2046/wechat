<?php
session_start(); 
$_SESSION['username'] = "";
session_write_close();
header('Location: login.php');
exit();
?>