<?php
require_once('conf/db.php');
 	@session_start();
 	if ($_SESSION['aut']!="root") {
 		echo "非法访问";
 		return;
 	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员</title>
</head>
<body>
	<center>
	<h1>文章管理</h1>
	<table cellspacing="0" border="1" cellpadding="10px">
		<tr>
    <th>文章标题</th>
    <th>文章作者</th>
    <th>操作</th>
  </tr>
 	
 	<?php
 	@session_start();
 	if ($_SESSION['aut']=="root") {
 		# code...
 	}
		
		
	
		$cxuser="SELECT * FROM `text`";
		$cxuserjg=mysql_query($cxuser);
		while ($row1 = mysql_fetch_array($cxuserjg)) {
			echo "<tr><th>".$row1['tittle']."</th>";
			echo "<th>".$row1['zz']."</th>";
			echo "<th><a href=\"xx.php?id=".$row1['id']."\">查看</a> | 
  				<a href=\"wzcz/delwz.php?id=".$row1['id']."\">删除</a></th></tr>";

		}
	?>
	</table>
	<hr>
	<h1>用户管理</h1>
	<table cellspacing="0" border="1" cellpadding="10px">
		<tr>
    <th>用户名</th>
    <th>用户权限</th>
    <th>操作</th>
  </tr>
 	
 	<?php
		@session_start();
		require_once('conf/db.php');
	
		$cxuser="SELECT * FROM `usergl`";
		$cxuserjg=mysql_query($cxuser);
		while ($row1 = mysql_fetch_array($cxuserjg)) {
			echo "<tr><th>".$row1['user']."</th>";
			echo "<th>".$row1['aut']."</th><th>";
			if ($row1['aut']=="admin") {
				echo "<a href=\"user/usergl.php?id=".$row1['id']."&type=qxadmin\">取消管理</a>";
			}else{
				echo "<a href=\"user/usergl.php?id=".$row1['id']."&type=admin\">设置管理</a>";
			}
			

			echo " | <a href=\"user/usergl.php?id=".$row1['id']."&type=del\">删除</a></th></tr>";

		}
	?>
	</table>
	</center>
</body>
</html>