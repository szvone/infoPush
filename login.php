<!DOCTYPE html>
<html lang="zh">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<meta charset="UTF-8">
	<title>登录</title>
	<style>
		body{
			
			font-family: "微软雅黑";
		}
		/*主界面*/
		#main{
			width: 300px;
			height: 160px;

			

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
<body>
<?php
	session_start();
	if (isset($_SESSION['id'])) {
		header('Refresh: 0; url=user\user.php');
	}
?>
	<div id="head"></div>
	<div id="main">
		<form action="user\login.php" method="post">
			<input type="text" name="user" placeholder="用户名" />
			<input type="password" name="pass" placeholder="密码" />
			<input type="submit" name="submit" value="登录系统" />
			<a href="register.php"><input type="button" value="注册账号" /></a>
			<a href="user\forget1.php"><input type="button" value="找回密码" /></a>
		</form>
	</div>
</body>
</html>