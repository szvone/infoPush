<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>安装程序</title>
</head>
<body>

	
	
	<?php
	
	if (file_exists("vone.key")) {
			echo "程序已安装，如需再次安装，请删除主目录下的vone.key文件";
			return;
		}

	if (isset($_GET['install'])) {
		header("Content-type: text/html; charset=utf-8");
		if ($_POST['sqlip'] !="" && $_POST['sqlname']!="" && $_POST['sqluser']!="" && $_POST['sqlpass']!="") {
			
		}else{
			echo "安装失败，请填写完整所有信息";
			header('Refresh: 1; url=install.php');
			return;
		}

		$lj=@mysql_connect($_POST['sqlip'],$_POST['sqluser'],$_POST['sqlpass']);
		$db=@mysql_select_db($_POST['sqlname']);
		if ($db) {
			$sql1="CREATE TABLE IF NOT EXISTS `pl` (
 					 `id` int(11) NOT NULL AUTO_INCREMENT,
 					 `plnr` text NOT NULL,
					  `plsj` datetime NOT NULL,
 					 `plyh` text NOT NULL,
 					 `wzid` int(11) NOT NULL,
 					 PRIMARY KEY (`id`)
					) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;";
			$sql2="CREATE TABLE IF NOT EXISTS `text` (
  					`id` int(11) NOT NULL AUTO_INCREMENT,
  					`tittle` text NOT NULL,
  					`zt` text NOT NULL,
  					`nr` text NOT NULL,
  					`fl` text NOT NULL,
 					`video` text NOT NULL,
 					`time` datetime NOT NULL,
  					`zz` text NOT NULL,
  					PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=34 ;";
			$sql3="CREATE TABLE IF NOT EXISTS `usergl` (
  					`id` int(11) NOT NULL AUTO_INCREMENT,
  					`user` varchar(20) NOT NULL,
  					`pass` varchar(20) NOT NULL,
  					`question` varchar(50) NOT NULL,
  					`answer` varchar(50) NOT NULL,
  					`name` varchar(20) NOT NULL,
  					`sex` int(10) NOT NULL,
  					`address` varchar(50) NOT NULL,
  					`tel` varchar(50) NOT NULL,
  					`qq` varchar(20) NOT NULL,
 					 `mail` varchar(50) NOT NULL,
 					 `aut` varchar(50) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;";

			$sql4="CREATE TABLE IF NOT EXISTS `fl` (
  					`id` int(11) NOT NULL AUTO_INCREMENT,
  					`fl_name` text NOT NULL,
  					PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=6 ;";
			$sql5="INSERT INTO `".$_POST['sqlname']."`.`fl` (`id`, `fl_name`) VALUES (NULL, '默认分类');";
			$jg1=mysql_query($sql1);
			$jg2=mysql_query($sql2);
			$jg3=mysql_query($sql3);
			$jg4=mysql_query($sql4);
			$jg5=mysql_query($sql5);
			if ($jg1=="1" && $jg2=="1" && $jg3=="1" && $jg4=="1" && $jg5=="1") {

				$php="<?php\n";
				
				$php.="\$ip=\"".$_POST['sqlip']."\";\n";
				$php.="\$sqluser=\"".$_POST['sqluser']."\";\n";
				$php.="\$sqlpass=\"".$_POST['sqlpass']."\";\n";
				$php.="\$dbname=\"".$_POST['sqlname']."\";\n";
				$php.="header(\"Content-type: text/html; charset=utf-8\");\n";
				$php.="\$lj=@mysql_connect(\$ip,\$sqluser,\$sqlpass);\n";
				$php.="\$db=@mysql_select_db(\$dbname);\n";
				$php.="mysql_query(\"set names 'utf8' \");\n";

				$php.="if(\$db){\n";
					//echo \"数据库链接成功\";
				$php.="}else{\n";
				$php.="	echo \"数据库链接失败\";\n";
				$php.="	return;\n";
				$php.="}\n";
				$php.="?>\n";

				$dbconf = fopen("conf/db.php", "w");
				fwrite($dbconf, $php);
				fclose($dbconf);
				echo "安装程序成功执行<br>";


				$rootsql="INSERT INTO `".$_POST['sqlname']."`.`usergl` (`id`, `user`, `pass`, `question`, `answer`, `name`, `sex`, `address`, `tel`, `qq`, `mail`, `aut`) VALUES (NULL, '".$_POST['adminuser']."', '".$_POST['adminpass']."', '', '', '', '', '', '', '', '', 'root');";
				$jg1=mysql_query($rootsql);
				if ($jg1=="1") {
					echo "超级管理员账号创建成功";
				}else{
					echo "超级管理员账号创建失败";
				}

				$install="本文件用作防止恶意安装，如需重新安装，请删除本文件！";
				$key = @fopen("vone.key", "w");
				@fwrite($key, $install);
				@fclose($key);

				header('Refresh: 1; url=index.php');

			}else{
				echo "安装失败";
				header('Refresh: 1; url=install.php');
			}

		}else{
			echo "数据库链接失败，请检查所填信息是否有误";
			header('Refresh: 1; url=install.php');
		}
		}
	
	?>

	
	
	<h1 align="center">博客程序安装</h1>

	<form action="install.php?install=1" method="post">
	<table border="1" cellpadding="10" cellspacing="0" align="center">
	<tr>
	<th>数据库地址：</th>
	<th><input type="" name="sqlip" value="localhost"></th>
	</tr>
	<tr>
	<tr>
	<th>数据库名：</th>
	<th><input type="" name="sqlname" value=""></th>
	</tr>
	<tr>
	<th>数据库账号：</th>
	<th><input type="" name="sqluser" value="root"></th>
	</tr>
	<tr>
	<th>数据库密码：</th>
	<th><input type="" name="sqlpass" value=""></th>
	</tr>
	<tr>
	<th>超级管理员账号：</th>
	<th><input type="" name="adminuser" value=""></th>
	</tr>
	<tr>
	<th>超级管理员密码：</th>
	<th><input type="" name="adminpass" value=""></th>
	</tr>
	<tr>
	<th colspan="2">
	<input type="submit" value="安装程序">
	</th>
	</tr>
	</table>
	</form>
	



	
</body>
</html>