<?php
session_start();
if (!isset($_SESSION['email']) || strlen($_SESSION['email']) == 0){
	header('Location: login.php');
	exit();
}
?>