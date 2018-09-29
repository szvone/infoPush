<?php 
	require_once('../conf/db.php');  
	if (isset($_POST['user']) && isset($_POST['newpass']) && isset($_POST['answer'])) {
		
		$sql="SELECT * FROM `usergl` WHERE `user` LIKE '".$_POST['user']."' AND `answer` LIKE '".$_POST['answer']."'";

		$jg=mysql_query($sql);
		$jgjg=mysql_fetch_array($jg);
		if ($jgjg['user']=="") {
			
			echo "<script> alert(\"密保信息错误\"); </script>";
			header('Refresh: 0; url=forget1.php');
			return;
		}else{
			$sql2="UPDATE `".$dbname."`.`usergl` SET `pass` = '".$_POST['newpass']."' WHERE `usergl`.`id` = ".$jgjg['id'].";";
			mysql_query($sql2);
			echo "<script> alert(\"修改成功\"); </script>";
			header('Refresh: 0; url=login.php');
		}
	}else{
		echo "<script> alert(\"非法访问\"); </script>";
		header('Refresh: 0; url=forget1.php');
	}
?>