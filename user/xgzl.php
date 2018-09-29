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
		#main input[type=text]{
			width: 60%;	
		}
		#main input[type=email]{
			width: 60%;	
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
		
			
			echo "<form action=\"xiugai.php\" method=\"post\">";
			echo "<div class=\"kuang\">用户名：".$dljgjg['user']."</div>";
			echo "<div class=\"kuang\">姓名：<input required=\"required\" type=\"text\" name=\"name\" value=\"".$dljgjg['name']."\"></div>";

			if ($dljgjg['sex']=="1") {
				echo "<div class=\"kuang\">性别：<input type=\"radio\" name=\"sex\" checked value=\"1\" >男";
				echo "<input type=\"radio\" name=\"sex\" value=\"0\" >女</div>";
			}else{
				echo "<div class=\"kuang\">性别：<input type=\"radio\" name=\"sex\" value=\"1\" >男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<input type=\"radio\" name=\"sex\" value=\"0\" checked>女</div>";
			}

			
			echo "<div class=\"kuang\">地址：<input required=\"required\" type=\"text\" name=\"add\" value=\"".$dljgjg['address']."\"></div>";
			echo "<div class=\"kuang\">电话：<input required=\"required\" pattern=\"[0-9]{11}\" title=\"请输入正确的电话号码\" type=\"text\" name=\"tel\" value=\"".$dljgjg['tel']."\"></div>";
			echo "<div class=\"kuang\">Q Q ：&nbsp;<input required=\"required\" pattern=\"[0-9]{5,11}\" title=\"请输入正确的QQ号码\" type=\"text\" name=\"qq\" value=\"".$dljgjg['qq']."\"></div>";
			echo "<div class=\"kuang\">邮箱：<input required=\"required\" type=\"email\" name=\"mail\" value=\"".$dljgjg['mail']."\"></div>&nbsp;";


			
			echo "<div><a href=\"xgzl.php\"><button class=\"button\">修改资料</button></a></div>";
			echo "</form>";
		}else{
			echo "<script> alert(\"请先登录\"); </script>";
			header('Refresh: 0; url=..\login.php');
			return;
		}

		?>


	<br>		
	</div>
</body>
</html>