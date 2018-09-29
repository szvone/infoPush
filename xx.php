<?php
	@session_start();
	require_once('conf/db.php');
	require_once('dh.php'); 
	$cxwz="SELECT * FROM `text` WHERE `id` = " . $_GET['id'];

	$cxjg=mysql_query($cxwz);
	$cx=mysql_fetch_array($cxjg);
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title><?php echo $cx['tittle']; ?></title>
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
		#main input[type=submit]{
			color: white;
			width: 75px;
			height: 35px;
			position: relative;
			
			background: #4080C4;
			border: none;
			border-radius: 10px;
			display:inline;
		}
		#main input[type=reset]{
			color: white;
			width: 75px;
			height: 35px;
			position: relative;
			display:inline;
			left: 735px;
			background: #4080C4;
			border: none;
			border-radius: 10px;
		}
		
		.kuang{
			width: 80%;
			display: block;
			margin: auto;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			border-radius: 5px;
		}
		.kuang img{
			height: auto;
			max-width:50%;
		}

		
		

	</style>
	<script type="text/javascript" src="editor/examples/jquery.js"></script>
	<script type="text/javascript">
		var i = 2;//设置当前页数 
		function getpl(){
    	$.post("wzcz/getpl.php?p="+i+"&wzid=<?php echo $_GET['id']; ?>",function(data,status){
      			i++;
      			if (data=="没有评论啦") {
      				document.getElementById("jz"). innerHTML = data;
      			}else{
      				document.getElementById("pl"). innerHTML += data;
      			}
    		});
  };
		
		

	</script>
</head>
<body>




<div id="head"></div>
<div id="main">

	<?php 
	
	
	

	

	echo "<h1 align=\"center\">".$cx['tittle']."</h1>";
	echo "<p align=\"center\">作者：".$cx['zz']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分类：".$cx['fl']."</p>";
	echo "<p align=\"center\">".$cx['time']."</p>";
	echo "<hr>";
	echo "<div class=\"kuang\" >".$cx['nr']."</div>";
	echo "<hr>";


	$cxsql = "SELECT * FROM `pl` WHERE `wzid` = ". $_GET['id'] ." ORDER BY id DESC limit 0,5";
	$jg = mysql_query($cxsql);

	echo "<div id=\"pl\">";

	while ($row = mysql_fetch_array($jg)) {
		echo "<div class=\"kuang\"><p>" . $row['plnr'] . "</p>";
  		echo "来自：" . $row['plyh'] . "<br>";
  		echo "评论时间：". $row['plsj'];
  		if (isset($_SESSION['user'])) {
  			if ($row['plyh']==$_SESSION['user'] || $cx['zz']==$_SESSION['user']) {  
  			$sc="id=".$row['id']."&id2=".$_GET['id'];
  			echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"wzcz/delpl.php?".$sc."\">删除评论</a>";
  			}
  		}
  		echo "</div>";
	}
	echo "</div>";
	if(mysql_num_rows($jg)=="0"){
		echo "<div class=\"kuang\"><center>暂时还没有评论哦</center></div>";
	}else{
		echo "<center><div class=\"kuang\"><a style=\"color:gray;\" id=\"jz\" href=\"javascript:void(0);\" onclick=\"getpl()\">查看更多</a></div></center>";
	}

	


	

		echo "<div class=\"kuang\">";
		if (isset($_SESSION['user'])) {
			echo "<center><form action=\"wzcz/pl.php\" method=\"POST\">
			<p>评论内容：<input name=\"nr\" >";
			echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET['id'] . "\">"; 
		
			echo "<input type=\"submit\" name=\"tj\" value=\"评论\" style=\"width:80px;height:40px\"></p></form></center>";
		}else{
			echo "<center>登录后才可评论</center>";
		}

		echo "</div>";
	?>
<br>
</div>
</div>
<footer style="text-align:center;width:100%;padding-top:15px;color:#AAA;">
        
        <a style="color:#AAA;" href="index.php">首页</a> | 
        
		<?php 
			if (isset($_SESSION['id'])) {
				echo "<a style=\"color:#AAA;\" href=\"user\user.php\">".$_SESSION['user']."</a> | 
        		<a style=\"color:#AAA;\" href=\"user\loginout.php\">退出登录</a>";
			}else{
				echo "<a style=\"color:#AAA;\" href=\"login.php\">登录</a> | 
        		<a style=\"color:#AAA;\" href=\"register.php\">注册</a>";
			}
		?>
        

     
	</footer>
</body>
</html>