<?php
	header("Content-type: text/html; charset=utf-8");
	session_start();
	if (isset($_SESSION['user'])) {
		require_once('../conf/db.php'); 
		$tj="INSERT INTO `".$dbname."`.`pl` (`id`, `plnr`, `plsj`, `plyh`, `wzid`) VALUES (NULL, '" . $_POST['nr'] . "', CURRENT_TIMESTAMP, '". $_SESSION['user'] ."', '". $_POST['id'] ."');";
		$pljg=mysql_query($tj);

		if ($pljg=="1") {
			echo "<script> alert(\"评论成功！\"); </script>";

		}else{
			echo "<script> alert(\"评论失败！\"); </script>";
		}
		header('Refresh: 0; url=../xx.php?id='.$_POST['id']);

	}else{
		echo "<script> alert(\"请先登录后再操作！\"); </script>";
		header('Refresh: 0; url=../xx.php?id='.$_POST['id']);
	}
	

?>