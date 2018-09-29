<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
$q=$_POST['q'];
$a=$_POST['a'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$add=$_POST['add'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];
$mail=$_POST['mail'];

require_once('../conf/db.php');

$zcsql="INSERT INTO `".$dbname."`.`usergl` (`id`, `user`, `pass`, `question`, `answer`, `name`, `sex`, `address`, `tel`, `qq`, `mail`, `aut`) VALUES (NULL, '$user', '$pass', '$q', '$a', '$name', '$sex', '$add', '$tel', '$qq', '$mail', '0');";
$cxsql="SELECT *  FROM `usergl` WHERE `user` LIKE '$user'";

$cxjg=mysql_query($cxsql);
$cxjgjg=mysql_fetch_array($cxjg);
if($cxjgjg['user']==""){
	//echo "可以注册\n";
}else{
	echo "<script> alert(\"用户已存在，不允许注册\"); </script>";
	header('Refresh: 0; url=..\register.php');
	return;
}

$jg=mysql_query($zcsql);

if($jg){
	echo "<script> alert(\"注册成功！\"); </script>";
	header('Refresh: 0; url=..\index.php');
}

?>