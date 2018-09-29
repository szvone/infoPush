<?php
	//$id=$_GET['id'];
	//require_once('..\conf\db.php');
	//$outsql="UPDATE `test`.`usergl` SET `aut` = '0' WHERE `usergl`.`id` = ".$id.";";
	//$outjg=mysql_query($outsql);
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['user']);
	echo "<script> alert(\"退出成功\"); </script>";
	header('Refresh: 0; url=..');
?>