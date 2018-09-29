<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>个人信息</title>
	<style>
		body{
			
			font-family: "微软雅黑";
		}
		/*主界面*/
		#main{
			width: 300px;
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
			margin-top: 20px;
			position: relative;
			z-index: 1;
			box-shadow: 0px 0px 8px #B9A9A9;
		}
		/*输入框*/
		#main .kuang{
			width: 80%;
			display: block;
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
		#main input[type=submit]{
			color: white;
			width: 75px;
			height: 35px;
			position: relative;
			right: -35px;
			background: #4080C4;
			border: none;
			border-radius: 10px;
			display:inline;
		}
		#main .button{
			color: white;
			width: 75px;
			height: 35px;
			position: relative;
			display:inline;
			right: -205px;
			background: #4080C4;
			border: none;
			border-radius: 10px;
		}
		
		body{
			color: gray;
			font-size: 10;
			font-family:微软雅黑;
		}

	</style>
</head>
<body>
	<div id="head"></div>
	<div id="main">
		<?php 
			@session_start();
			function isPhone() { 
			if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) { return true; } 
			if (isset($_SERVER['HTTP_VIA'])) { 
			if(stristr($_SERVER['HTTP_VIA'], "wap")) { return true; } } 
			if (isset($_SERVER['HTTP_USER_AGENT'])) { $clientkeywords = array ( 'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile', 'phone', ); 
			if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) { return true; } } 
			if (isset($_SERVER['HTTP_ACCEPT'])) { if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) { return true; } } 
			return false; 
		}

	
	if (!isPhone()) {
		require_once('../dh.php'); 
	}
			require_once('../conf/db.php'); 
			$dlqrsql="SELECT * FROM `usergl` WHERE `id` LIKE '".$_SESSION['id']."'";
			$dljg=mysql_query($dlqrsql);
			$dljgjg=mysql_fetch_array($dljg);
		
		if(isset($_SESSION['id'])){
		
			echo "<div class=\"kuang\">用户名：".$dljgjg['user']."</div>";
			echo "<div class=\"kuang\">真实姓名：".$dljgjg['name']."</div>";

			if ($dljgjg['sex']=="1") {
				echo "<div class=\"kuang\">性别：男</div>";
			}else{
				echo "<div class=\"kuang\">性别：女</div>";
			}

			echo "<div class=\"kuang\">地址：".$dljgjg['address']."</div>";
			echo "<div class=\"kuang\">联系电话：".$dljgjg['tel']."</div>";
			echo "<div class=\"kuang\">QQ：".$dljgjg['qq']."</div>";
			echo "<div class=\"kuang\">电子邮件：".$dljgjg['mail']."</div>";


			$wzslsql="SELECT * FROM `text` WHERE `zz` LIKE '".$_SESSION['user']."'";
			$wzcxjg=mysql_query($wzslsql);
			$wzsl=mysql_num_rows($wzcxjg);
			echo "<div class=\"kuang\">文章数量：".$wzsl."</div>";

			$plslsql="SELECT * FROM `pl` WHERE `plyh` LIKE '".$_SESSION['user']."'";
			$plcxjg=mysql_query($plslsql);
			$plsl=mysql_num_rows($plcxjg);
			echo "<div class=\"kuang\">评论数量：".$plsl."</div>&nbsp;";
			echo "<div><a href=\"xgzl.php\"><button class=\"button\">修改资料</button></a></div>";

		}else{
			echo "<script> alert(\"请先登录\"); </script>";
			header('Refresh: 0; url=..\login.php');
			return;
		}

		?>
	<br>		
	</div>
	<footer style="text-align:center;width:100%;padding-top:15px;color:#AAA;">
        
        <a style="color:#AAA;" href="..\index.php">首页</a> | 
        
		<?php 
			if (isset($_SESSION['id'])) {
				echo "<a style=\"color:#AAA;\" href=\"user.php\">".$_SESSION['user']."</a> | 
        		<a style=\"color:#AAA;\" href=\"loginout.php\">退出登录</a>";
			}else{
				echo "<a style=\"color:#AAA;\" href=\"login.php\">登录</a> | 
        		<a style=\"color:#AAA;\" href=\"register.php\">注册</a>";
			}
		?>
        

     
	</footer>
</body>
</html>