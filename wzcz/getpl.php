<?php
	@session_start();
	require_once('../conf/db.php');
	$pagesize=5;
		//取得记录总数$zs
	$sql="select count(*) from pl WHERE `wzid` = ". $_GET['wzid'];
	$zs = mysql_query($sql);
	$myrow = mysql_fetch_array($zs);
	$numrows=$myrow[0];
	//计算总页数
	$pages=intval($numrows/$pagesize);
	if ($numrows%$pagesize){
		$pages++;
	}
	//设置页数
	if (isset($_GET['p'])){
		$page=intval($_GET['p']);
	}else{
		//设置为第一页 
		$page=1;
	}

	//计算记录偏移量
	$offset=$pagesize*($page - 1);
	//读取指定记录数
	$cx2 = "SELECT * FROM `text` WHERE `id` = ". $_GET['wzid'] ;
	$jg2 = mysql_query($cx2);
	$row2 = mysql_fetch_array($jg2);

	$cx = "SELECT * FROM `pl` WHERE `wzid` = ". $_GET['wzid'] ." ORDER BY id DESC limit $offset,$pagesize";

	$jg = mysql_query($cx);
	$sc="";
	while ($row = mysql_fetch_array($jg)) {
		$sc.= "<div class=\"kuang\"><p>" . $row['plnr'] . "</p><div id=\"plsj\">";
  		$sc.= "来自：" . $row['plyh'] . "<br>";
  		$sc.= "评论时间：". $row['plsj'];
  		if (isset($_SESSION['user'])) {
  			if ($row['plyh']==$_SESSION['user'] || $row2['zz']== $_SESSION['user'] ) {  
  			$did="id=".$row['id']."&id2=".$_GET['wzid'];
  			$sc.= "&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"wzcz/delpl.php?".$did."\">删除评论</a>";
  			}
  		}
  		$sc.= "</div></div>";
	}
	if ($sc=="") {
		echo "没有评论啦";
	}else{
		echo $sc;
	}

?>