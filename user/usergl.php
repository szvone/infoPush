<?php
	session_start();
	require_once('../conf/db.php');
	if ($_SESSION['aut'] == "root") {
		
		if ($_GET['type']=="del") {
			$cxuser="DELETE FROM `$dbname`.`usergl` WHERE `usergl`.`id` = ".$_GET['id'];
			$cxuserjg=mysql_query($cxuser);
			if ($cxuserjg=="1") {
				echo "<script> alert(\"删除成功\"); </script>";
				header('Refresh: 0; url=../admin.php');
			}else{
				echo "<script> alert(\"删除失败\"); </script>";
				header('Refresh: 0; url=../admin.php');
			}
		}elseif ($_GET['type']=="admin") {
			$cxuser="UPDATE `$dbname`.`usergl` SET `aut` = 'admin' WHERE `usergl`.`id` = ".$_GET['id'].";";
			$cxuserjg=mysql_query($cxuser);
			if ($cxuserjg=="1") {
				echo "<script> alert(\"设置成功\"); </script>";
				header('Refresh: 0; url=../admin.php');
			}else{
				echo "<script> alert(\"设置失败\"); </script>";
				header('Refresh: 0; url=../admin.php');
			}
		}elseif ($_GET['type']=="qxadmin") {
			$cxuser="UPDATE `$dbname`.`usergl` SET `aut` = '0' WHERE `usergl`.`id` = ".$_GET['id'].";";
			$cxuserjg=mysql_query($cxuser);
			if ($cxuserjg=="1") {
				echo "<script> alert(\"设置成功\"); </script>";
				header('Refresh: 0; url=../admin.php');
			}else{
				echo "<script> alert(\"设置失败\"); </script>";
				header('Refresh: 0; url=../admin.php');
			}
		}

	}else{
		echo "非法访问";
	}

?>