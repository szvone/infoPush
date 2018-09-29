<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title> 账号注册 </title>
	<style>
		body{
			
			font-family: "微软雅黑";
		}
		/*主界面*/
		#main{
			width: 300px;
			height: 510px;

			

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
			background: url("/favicon.ico");
			background-size: 100%;
			margin: auto;
			margin-top: 40px;
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
			width: 54px;
			height: 35px;
			position: relative;
			left: 225px;
			background: #4080C4;
			border: none;
			border-radius: 10px;
			display:inline;
		}
		
		.sex{
			width: 80%;
			display: block;
			margin: auto;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			border-radius: 5px;
			color: gray;
			font-size: 10px;
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
		require_once('dh.php'); 
	}
	
	if (isset($_SESSION['id'])) {
		header('Refresh: 0; url=user\user.php');
		return;
	}

 ?>

<form action="user\register.php" method="POST" accept-charset="UTF8">

  	
	
	<input type="user" name="user" required="required" pattern="[0-z]{5,11}" title="请输入正确的用户名格式（最少为5位最多为11位，不可用中文或特殊符号）" placeholder="登录账号">
	
	<input type="password" name="pass" required="required" pattern="[0-z]{5,11}" title="请输入正确的密码格式（最少为5位最多为11位，不可用中文或特殊符号）" placeholder="登录密码">
	
	<input type="" name="q" required="required" placeholder="密保问题">
	
	<input type="" name="a" required="required" placeholder="密保答案">
	
	<input type="" name="name" required="required" placeholder="真实姓名">
	
	
	<div class="sex">
	性别：<select name="sex">
			<option value="1">男</option>
			<option value="0">女</option>
			</select>
	</div>

	<input type="" name="add" required="required" placeholder="地址">

	<input type="" name="tel" required="required" maxlength="11" pattern="[0-9]{11}" title="请输入正确的电话号码" placeholder="联系电话">
	
	<input type="" name="qq" maxlength="11" required="required" pattern="[0-9]{5,11}" title="请输入正确的QQ号码" placeholder="QQ号码">
	
	<input type="email" name="mail" placeholder="邮箱">
	
	<input type="submit" value="注册">
 	
<footer style="text-align:center;width:100%;padding-top:15px;color:#AAA;">
      <div id="userinfo">
        <p><a style="color:#AAA;" href="index.php">首页</a> | <a style="color:#AAA;" href="login.php">登录</a> | <a style="color:#AAA;" href="register.php">注册</a></p>
      </div>
</footer>
    
</form>

</div>


</body>
</html>