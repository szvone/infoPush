<?php
@session_start();
if($_SESSION['aut']!="admin"){
	echo "error";
	return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发布文章</title>
	
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
			background: url("/favicon.ico");
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
		#main input[type=text1]{
			width: auto;
			display: block;
			margin: auto;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			display:inline;
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
			left: 735px;
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

		.kuang2{
			width: auto;
			display: block;
			margin: auto;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			display:inline;
			border-radius: 5px;
		}



	</style>
	<script>  
    function elsefl()
    {  
        if(document.getElementById("fl").value =="elsefl")
    		document.getElementById("zdyfl").style.display="";  
        else  
    		document.getElementById("zdyfl").style.display="none";  
    }  
</script>
</head>
<body background="bg.png">


	<?php 
		@session_start();
		if(isset($_SESSION['id'])){

		}else{
			echo "请先登录";
			header('Refresh: 1; url=login.php');
			return;
		}
		require_once('dh.php');
		require_once('conf/db.php'); 
		require_once('bjq.php');
		
		$cx = "SELECT * FROM `fl`"." ORDER BY id asc";
		$jg=mysql_query($cx);

	?>
<div id="head"></div>
<div id="main">
	
	<div id="section">
	<form action="update\update.php" method="POST">
		<div class="kuang"><label for="title" style="color:gray;">文章标题：</label><input type="text" required="required" name="tittle" id="title"></div>
		<div class="kuang"><label for="zt" style="color:gray;">内容描述：</label><input type="text" required="required" name="zt" id="zt"></div>

		<div class="kuang">

		<span style="color:gray;">文章分类：</span>
		<select name="fl" class="kuang2" id="fl" onchange='elsefl()'>
		
			<?php
				
				while ($row = mysql_fetch_array($jg)) {
					echo "<option value=\"".$row['fl_name']."\">".$row['fl_name']."</option>";
				}
			?>
		<option value = "elsefl">自定义分类</option>
		</select>

		<input type='text1' style='display:none;' id='zdyfl' name='zdyfl'>
		</div>
		


		<div class="kuang">
		<label for="cjbjq" style="color:gray;">文章内容：</label><br>&nbsp;<textarea name="a" id="cjbjq" style="width:800px;height:500px;"></textarea>
		</div>
		
		<input type="submit" name="tj" value="发布" style="width:80px;height:50px">
		<input type="reset" name="cz" value="重写" style="width:80px;height:50px">
	</form>
	</div>
	<br>
</div>



</body>
</html>