<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我发布的博客</title>
<style>
	body{
			
			font-family: "微软雅黑";
		}
		/*主界面*/
		#main{
			width: 1000px;
			height: auto;

			

			background: -moz-linear-gradient(#252525, #0a0a0a);
			background: -o-linear-gradient(#252525, #0a0a0a);
			background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#252525), to(#0a0a0a));
			background: -webkit-linear-gradient(#252525, #0a0a0a);
			-webkit-box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 10px;
			-moz-box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 10px;
			box-shadow: rgba(0, 0, 0, 0.4) 0px 1px 10px;

			margin: auto;
			margin-top: -30px;
			background: white;

			padding-top: 40px;
		}
		/*头像*/
		#head{
			width: 70px;
			height: 70px;
			border: 1px solid #C1C1C1;
			border-radius: 50%;
			background: url("../favicon.ico");
			background-size: 100%;
			margin: auto;
			margin-top: 30px;
			position: relative;
			z-index: 1;
			box-shadow: 0px 0px 8px #B9A9A9;
		}
		/*输入框*/
		#main input{
			width: 80%;
			
			margin: auto;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			border-radius: 5px;
		}
		a{
			text-decoration: none;
		}
		/*按钮*/
		.button{
			color: white;
			width: 75px;
			height: 35px;
			position: relative;
			right: -250px;
			background: #4080C4;
			border: none;
			border-radius: 10px;
			display:inline;
		}
		
		
		.kuang2{
			width: 80%;

			display: block;
			margin: auto;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			border-radius: 5px;
		}


		#center{
			align:center;
		}

		#cz{
			display:inline;
		}
		
		.md-page{
			padding: 20px 0;
			text-align: center;
		}
		.md-page a{
			margin: 0 5px;
			padding: 2px 7px;
			border: 1px solid #ccc;
			background: #f3f3f3;
			text-decoration: none;
			color: #428bca;
		}
		.md-page span{
			margin: 0 5px;
			padding: 2px 7px;
			border: 1px solid #ccc;
			background: #f3f3f3;
			text-decoration: none;
			color: #428bca;
		}
		.md-page input{
			margin: 0 5px;
			padding: 2px 7px;
			border: 1px solid #ccc;
			background: #f3f3f3;
			text-decoration: none;
			color: #428bca;
		}
		.md-page a:hover{
			background: #e4e4e4;
			border: 1px solid #908f8f;
		}
		.md-page .current{
			margin: 0 5px;
			padding: 2px 7px;
			background: #f60;
			border: 1px solid #fe8101;
			color: #fff;
		}

		p .title1{
			font-size: 50px;
			color: green;
		}
	</style>
</head>
<body>

	<?php
		session_start();
		require_once('../dh.php');
		
	?>

	<h1 align="center">搜索结果</h1>
	

	<div id="head"></div>
	<div id="main">
	<?php
				
		require_once('../conf/db.php');
		if ($_GET['scan']=="0") {
			$cx = "SELECT * FROM `text` WHERE `tittle` LIKE '%".$_GET['gjz']."%'"." ORDER BY id DESC";
		}elseif ($_GET['scan']=="1") {
			$cx = "SELECT * FROM `text` WHERE `nr` LIKE '%".$_GET['gjz']."%'"." ORDER BY id DESC";
		}elseif ($_GET['scan']=="2") {
			$cx = "SELECT * FROM `text` WHERE `zz` LIKE '".$_GET['gjz']."'"." ORDER BY id DESC";
		}else{
			echo "<p align=\"center\">未找到相关记录</p><br>";
			return;
		}
		
		$jg=mysql_query($cx);


		$pagesize=10;//设定每一页显示的记录数
		//取得记录总数$zs
		$zs = mysql_num_rows($jg);
		//取得总页数$pages
		$pages=intval($zs/$pagesize);
		if ($zs%$pagesize){
			$pages++;
		}

		if (isset($_GET['page'])){
			$page=intval($_GET['page']);
		}else{
			//设置为第一页 
			$page=1;
		}

		$offset=$pagesize*($page - 1);

		
		if ($_GET['scan']=="0") {
			$cxsql = "SELECT * FROM `text` WHERE `tittle` LIKE '%".$_GET['gjz']."%'"." ORDER BY id DESC limit $offset,$pagesize";
		}elseif ($_GET['scan']=="1") {
			$cxsql = "SELECT * FROM `text` WHERE `nr` LIKE '%".$_GET['gjz']."%'"." ORDER BY id DESC limit $offset,$pagesize";
		}elseif ($_GET['scan']=="2") {
			$cxsql = "SELECT * FROM `text` WHERE `zz` LIKE '".$_GET['gjz']."'"." ORDER BY id DESC limit $offset,$pagesize";
		}else{
			echo "<p align=\"center\">未找到相关记录</p><br>";
			return;
		}

		$cxjg=mysql_query($cxsql);

	while ($row = mysql_fetch_array($cxjg)) {
		echo "<div class=\"kuang2\">";
		echo "<a style=\"font-size: 25px;font-weight:bold;color:black;\" href=\"..\xx.php?id=".$row['id']."\">" . $row['tittle'] . "</a>";
		echo "<p style=\"font-size: 15px;color:gray;\">" . $row['zt'] . "</p>";
  		echo "<span style=\"color:blue;\">作者：" . $row['zz']."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color:red;\">发布时间：".$row['time']."</span>";
  		echo "</div>";
  		
	}
	if ($zs=="0") {
		echo "<p align=\"center\">未找到相关记录</p>";
	}
	?>

<br>
</div>
<div class="md-page">
	<?php
	if ($zs>$pagesize) {
		$nextp = $page + 1;
		$lastp = $page - 1;
			if ($page=="1") {				
				echo "<a class=\"current\" href=\"scan.php?page=1\">首页</a>";
				echo "<a class=\"next\" href=\"scan.php?page=".$nextp."\">下一页</a>";
				echo "<a class=\"next\" href=\"scan.php?page=$pages\">尾页</a>";
			}elseif ($page==$pages) {
				echo "<a class=\"next\" href=\"scan.php?page=1\">首页</a>";	
				echo "<a class=\"next\" href=\"scan.php?page=".$lastp."\">上一页</a>";
				echo "<a class=\"current\" href=\"scan.php?page=$pages\">尾页</a>";
			}else{
				echo "<a class=\"next\" href=\"scan.php?page=1\">首页</a>";	
				echo "<a class=\"next\" href=\"scan.php?page=".$lastp."\">上一页</a>";
				echo "<a class=\"current\" href=\"scan.php?page=$page\">$page</a>";
				echo "<a class=\"next\" href=\"scan.php?page=".$nextp."\">下一页</a>";
				echo "<a class=\"next\" href=\"scan.php?page=$pages\">尾页</a><br><br>";
				echo "<form action=\"scan.php\" method=\"get\">";
				echo "<span>共".$pages."页，跳转到：</span>";
				echo "<input type=\"text\" name=\"page\" value=\"$page\" style=\"width:20px;\"><input type=\"submit\" value=\"跳转\"></from>";

				
			}
	}
		

			

		?>
</div>
</table>
</body>
</html>