<?php
function alert($title){
	echo "<script type='text/javascript'>alert('$title');</script>";
}

function href($url){
	echo "<script type='text/javascript'>window.location.href='$url';</script>";
}
?>