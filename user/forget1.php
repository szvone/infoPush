<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>找回密码</title>

	<style>
		body{
			
			font-family: "微软雅黑";
		}
		/*主界面*/
		#main{
			width: 300px;
			height: 110px;

			

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
			margin-top: 130px;
			position: relative;
			z-index: 1;
			box-shadow: 0px 0px 8px #B9A9A9;
		}
		/*输入框*/
		#main input{
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
		#main input[type=button]{
			color: white;
			width: 75px;
			height: 35px;
			position: relative;
			display:inline;
			right: -35px;
			background: #4080C4;
			border: none;
			border-radius: 10px;
		}
		

	</style>
</head>
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

	
	if (!isPhone()) {
		require_once('../dh.php'); 
	}


session_start();

?>
<body>
	<div id="head"></div>
	<div id="main">
		<form action="forget2.php" method="post">
			<input type="text" name="user" placeholder="用户名" required="required" pattern="[0-z]{5,11}" title="请输入正确的用户名格式（最少为5位最多为11位，不可用中文或特殊符号）"/>
			<input type="submit" name="submit" value="找回密码" />
			<a href="..\login.php"><input type="button" value="登录系统" /></a>
			<a href="..\register.php"><input type="button" value="注册账号" /></a>
		</form>
	</div>
</body>
</html>