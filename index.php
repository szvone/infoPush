<?php
	if (file_exists("vone.key")) {
			
		}else{
			header('Refresh: 0; url=install.php');
		}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />  
	<meta charset="UTF-8" />
	<title>信息发布平台</title>

	<link rel="stylesheet" href="stage.css" />
	
	<style type="text/css">
	input[type="text"]{
			width: 30%;
			display: block;
			margin: 10px 5px;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			display:inline;
			border-radius: 5px;
		}
	input[type="submit"]{
			color: white;
			width: 80px;
			height: 35px;
			position: relative;
			display:inline;
			background: #4080C4;
			border: none;
			border-radius: 10px;
		}
	button{
			color: white;
			width: 80px;
			height: 35px;
			position: relative;
			display:inline;
			background: #4080C4;
			border: none;
			border-radius: 10px;
		}
	.kuang{
			width: auto;
			display: block;
			margin: 10px 0px;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			display:inline;
			border-radius: 5px;
		}
	.kuang3{
			width: auto;
			display: block;
			margin: 10px 10px;
			padding: 18px;

			margin-top: 10px;
			border: 2px solid #DCD8D8;
			display:inline;
			border-radius: 12px;
		}	
	.flxz{
			width: auto;
			display: block;
			margin: 10px 5px;
			padding: 8px;
			margin-top: 10px;
			border: 2px solid #DCD8D8;
			display:inline;
			border-radius: 15px;
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

		.kuang2{
			width: 80%;
			align:center;
			padding: 8px;
			border: 2px solid #DCD8D8;
			border-radius: 12px;
			color: black;
		}

		.xzkuang {
			background: #f60;
			width: 80%;
			align:center;
			padding: 8px;
			border: 2px solid #DCD8D8;
			border-radius: 12px;
			color: white;
		}

	</style>
	<script type="text/javascript">
		function jump(targ,selObj,restore){ //v3.0
 			eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
 			if (restore) selObj.selectedIndex=0;
			}
	</script>
</head>
<body>
	<div id="main">
		<div id="header">
			<h1 align="center">信息发布平台</h1>
			
		</div>
	
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
		function getimg($str){
  				$begin='<img src="';
  				$end='" ';
                $b = mb_strpos($str,$begin) + mb_strlen($begin);
                $e = mb_strpos($str,$end) - $b;

                return mb_substr($str,$b,$e);
        }


		require_once('conf/db.php');
		
		if (isset($_GET['fl'])) {
			$fl="&fl=".$_GET['fl'];
			$flsql=" WHERE `fl` LIKE '".$_GET['fl']."'";
			$flname=$_GET['fl'];
		}else{
			$fl="";
			$flsql="";
			$flname="全部文章";
		}

		//设定每一页显示的记录数
		$pagesize=5;
		//取得记录总数$zs
		$zs = mysql_query("select count(*) from text$flsql");
		$myrow = mysql_fetch_array($zs);
		$numrows=$myrow[0];
		//计算总页数
		$pages=intval($numrows/$pagesize);
		if ($numrows%$pagesize){
			$pages++;
		}
		//设置页数
		if (isset($_GET['page'])){
			$page=intval($_GET['page']);
		}else{
			//设置为第一页 
			$page=1;
		}

		//计算记录偏移量
		$offset=$pagesize*($page - 1);
			//读取指定记录数
		$rs=mysql_query("select * from text$flsql order by id desc limit $offset,$pagesize");





		//获取分类列表
		$rs_fl=mysql_query("select * from fl order by id asc");
	?>

	<div id="show">
			
			

			<div class="right">
				<div class="sidebar">
					<div class="title">用户信息</div>
					<div class="content">
						
						<?php
							//设置分类


							@session_start();
							if (isset($_SESSION['id'])) {

								$dlqrsql="SELECT * FROM `usergl` WHERE `id` LIKE '".$_SESSION['id']."'";
								$dljg=mysql_query($dlqrsql);
								$dljgjg=mysql_fetch_array($dljg);


								echo "<p>用户名：".$_SESSION['user']."<br>";
								if ($dljgjg['sex']=="1") {
									echo "性别：男<br>";
								}else{
									echo "性别：女<br>";
								}

								echo "QQ：".$dljgjg['qq']."<br>";
								echo "电子邮件：".$dljgjg['mail']."<br>";
								
								$wzslsql="SELECT * FROM `text` WHERE `zz` LIKE '".$_SESSION['user']."'";
								$wzcxjg=mysql_query($wzslsql);
								$wzsl=mysql_num_rows($wzcxjg);
								echo "发布文章数量：".$wzsl."<br>";

								$plslsql="SELECT * FROM `pl` WHERE `plyh` LIKE '".$_SESSION['user']."'";
								$plcxjg=mysql_query($plslsql);
								$plsl=mysql_num_rows($plcxjg);
								echo "发布评论数量：".$plsl."<br>";


								echo "<center>";
								if ($_SESSION['aut']=="admin") {
									echo "<a href=\"send.php\"><button>发布信息</button></a><a href=\"wzcz/mylist.php\"><button>管理文章</button></a>";
								}
								
								if ($_SESSION['aut']=="root") {
									echo "<a href=\"admin.php\"><button>管理网站</button></a>";
								}else{
									echo "<a href=\"user\user.php\"><button>个人资料</button></a>";
								}
								
								echo "
									<a href=\"user\loginout.php\"><button>退出登录</button></a>";
								echo "</center>";
							}else{
							echo "<center><p>您还未登录系统</p>
								<a href=\"login.php\"><button>登录</button></a>
								<a href=\"register.php\"><button>注册</button></a>
								</center>";
							}
						?>

					</div>
				</div>

			
				<div class="sidebar">
					<div class="title">搜索文章</div>
					
					<div class="content">
						<form action="wzcz\scan.php" method="get">
						<input type="text" name="gjz" placeholder="关键字" style="width:20%">
						
						<select name="scan" class="kuang">
						<option value="0">标题</option>
						<option value="1">内容</option>
						<option value="2">作者</option>
						</select>
						
						<input type="submit" value="搜索">
						</form>
					</div>
				</div>

				<div class="sidebar">
					<div class="title">文章分类</div>
					<div class="content">
					<center><a class="kuang2" href="index.php">全部文章</a>
					<a class="kuang2" href="index.php?fl=默认分类">默认分类</a></center><br>
					<center><p class="kuang2" style="width:80%">当前查看：<?php echo $flname; ?></p></center><br>
					<center><span class="kuang3">更多分类：
				<select name="scan" class="flxz" onchange="jump('parent',this,0)">
					
			<?php
				while ($row_fl = mysql_fetch_array($rs_fl)) {
					echo "<option value=\"index.php?fl=".$row_fl['fl_name']."\">".$row_fl['fl_name']."</option>";
				}

			?>
				</select>
					</span></center>
					<br>
					</div>
					
				</div>

			</div>
			<div class="left">
				

				<?php
				
				while ($row = mysql_fetch_array($rs)) {
					echo "<div class=\"article\">";
					
					$imgid=getimg($row['nr']);
					if ($imgid != "") {
						//echo "<img src=\"".$imgid."\" align=\"right\" height=\"100px\" width=\"auto\">";
					}
					
					
					if (isPhone()) {
						echo "<h1 class=\"title\"><a href=\"mxx.php?id=".$row['id']."\">". $row['tittle'] ."</a></h1>";
					}else{
						echo "<h1 class=\"title\"><a href=\"xx.php?id=".$row['id']."\" target='_blank'>". $row['tittle'] ."</a></h1>";
					}
					
					$plslsql="SELECT * FROM `pl` WHERE `wzid` LIKE '".$row['id']."'";
					$plcxjg=mysql_query($plslsql);
					$plsl=mysql_num_rows($plcxjg);
					
					echo "<div class=\"content\">";
					echo "<p>".$row['zt']."</p>";
					echo "</div>";

					echo "<div class=\"date\">";
					echo "		发表于 " . $row['time']."&nbsp;&nbsp;评论数量：$plsl";
					echo "</div>";
					echo "</div>";
				}
				?>

				

				

			</div>
		</div>
		<div class="md-page">
		
		<?php
		if ($numrows>$pagesize) {
			$nextp = $page + 1;
		$lastp = $page - 1;
			if ($page=="1") {				
				echo "<a class=\"current\" href=\"index.php?page=1$fl\">首页</a>";
				echo "<a class=\"next\" href=\"index.php?page=".$nextp."$fl\">下一页</a>";
				echo "<a class=\"next\" href=\"index.php?page=$pages$fl\">尾页</a>";
			}elseif ($page==$pages) {
				echo "<a class=\"next\" href=\"index.php?page=1$fl\">首页</a>";	
				echo "<a class=\"next\" href=\"index.php?page=".$lastp."$fl\">上一页</a>";
				echo "<a class=\"current\" href=\"index.php?page=$pages$fl\">尾页</a>";
			}else{
				echo "<a class=\"next\" href=\"index.php?page=1$fl\">首页</a>";	
				echo "<a class=\"next\" href=\"index.php?page=".$lastp."$fl\">上一页</a>";
				echo "<a class=\"current\" href=\"index.php?page=$page$fl\">$page</a>";
				echo "<a class=\"next\" href=\"index.php?page=".$nextp."$fl\">下一页</a>";
				echo "<a class=\"next\" href=\"index.php?page=$pages$fl\">尾页</a><br><br>";
				echo "<span><form action=\"index.php\" method=\"get\">";
				echo "共".$pages."页，跳转到：";
				echo "<input type=\"text\" name=\"page\" value=\"$page\" style=\"width:20px;\"><input type=\"submit\" value=\"跳转\"></from></span>";

				
			}
		}
		

		?>
		
		 


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