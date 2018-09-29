<?php
function isPhone() { 
			if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) { return true; } 
			if (isset($_SERVER['HTTP_VIA'])) { 
			if(stristr($_SERVER['HTTP_VIA'], "wap")) { return true; } } 
			if (isset($_SERVER['HTTP_USER_AGENT'])) { $clientkeywords = array ( 'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'phone', ); 
			if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) { return true; } } 
			if (isset($_SERVER['HTTP_ACCEPT'])) { if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) { return true; } } 
			return false; 
		}
	session_start();
	if (isset($_SESSION['id'])) {
		require_once('../conf/db.php');
		$cxsql="SELECT * FROM `pl` WHERE `id` = ".$_GET['id'];
		$jg = mysql_query($cxsql);
		$jg1=mysql_fetch_array($jg);

		$cxsql2="SELECT * FROM `text` WHERE `id` = ".$_GET['id2'];
		$jg2 = mysql_query($cxsql2);
		$jg12=mysql_fetch_array($jg2);

		if ($jg1['plyh']==$_SESSION['user'] || $jg12['zz']==$_SESSION['user'] || $_SESSION['aut']=="admin") {
			$delsql="DELETE FROM `".$dbname."`.`pl` WHERE `pl`.`id` = ".$_GET['id'];
			mysql_query($delsql);
			echo "<script> alert(\"删除成功！\"); </script>";
		}else{
			echo "<script> alert(\"非法访问！\"); </script>".$jg12['zz'];
		}
		if (isPhone()) {
			header('Refresh: 0; url=..\mxx.php?id='.$jg1['wzid']);
		}else{
			header('Refresh: 0; url=..\xx.php?id='.$jg1['wzid']);
		}
		
	}else{
		echo "<script> alert(\"对不起，您还没有登录！\"); </script>";
		header('Refresh: 0; url=..\xx.php?id='.$jg1['wzid']);
	}
?>