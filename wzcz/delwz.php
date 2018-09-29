<?php
	session_start();
	if (isset($_SESSION['user'])) {
		$cxsql="SELECT * FROM `text` WHERE `id` = ".$_GET['id'];
		require_once('../conf/db.php');
		$jg = mysql_query($cxsql);
		$jg1=mysql_fetch_array($jg);
		if ($jg1['zz']==$_SESSION['user'] || $_SESSION['aut']=="root") {
			$delsql="DELETE FROM `".$dbname."`.`text` WHERE `text`.`id` = ".$_GET['id'];
			mysql_query($delsql);
			echo "<script> alert(\"删除成功\"); </script>";
			header('Refresh: 0; url=mylist.php');
		}else{
			echo "<script> alert(\"非法访问\"); </script>";
			header('Refresh: 1; url=..\index.php');
		}
	}

?>