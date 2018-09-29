<?php

$user=$_POST['user'];
$pass=$_POST['pass'];


require_once('../conf/db.php');

$dlsql="SELECT *  FROM `usergl` WHERE `user` LIKE '$user' AND `pass` LIKE '$pass'";
$dljg=mysql_query($dlsql);
$dljgjg=mysql_fetch_array($dljg);
if($dljgjg['pass']==""){
	echo "<script> alert(\"账号或密码错误\"); </script>";
	header('Refresh: 0; url=..\login.php');
}else{
	echo "<script> alert(\"登录成功\"); </script>";

	session_start();

	$_SESSION['user']=$user;
	$_SESSION['id']=$dljgjg['id'];
	$_SESSION['aut']=$dljgjg['aut'];
	
	
	header('Refresh: 0; url=..');
}

?>