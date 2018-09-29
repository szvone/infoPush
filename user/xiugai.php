<?php
@session_start(); 
require_once('../conf/db.php'); 
$sql="UPDATE `usergl` SET `name` = '".$_POST['name']."', `sex` = '".$_POST['sex']."', `address` = '".$_POST['add']."', `tel` = '".$_POST['tel']."', `qq` = '".$_POST['qq']."', `mail` = '".$_POST['mail']."' WHERE `usergl`.`id` = ".$_SESSION['id']."; ";
$xgjg=mysql_query($sql);
if ($xgjg=="1") {
	echo "<script> alert(\"修改成功！\"); </script>";
	header('Refresh: 0; url=user.php');
}else{
	echo "<script> alert(\"修改失败！\"); </script>";
	header('Refresh: 0; url=user.php');
}	
?>