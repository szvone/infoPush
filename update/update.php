<?php
    $bktitle=$_POST['tittle'];
    $bkzt=$_POST['zt'];
    $bkfl=$_POST['fl'];
    $bkzw=$_POST['a'];
    require_once('../conf/db.php'); 
    session_start();
    if ($bkfl=="elsefl") {
      $bkfl=$_POST['zdyfl'];
      $flsql="INSERT INTO `$dbname`.`fl` (`id`, `fl_name`) VALUES (NULL, '$bkfl');";
      $flsqljg=@mysql_query($flsql);
    }

    $xrsql="INSERT INTO `".$dbname."`.`text` (`id`, `tittle`, `zt`, `nr`, `fl`, `video`, `time`, `zz`) VALUES (NULL, '".$bktitle."', '".$bkzt."', '".mysql_real_escape_string($bkzw)."', '".$bkfl."', 'update/', CURRENT_TIMESTAMP, '". $_SESSION['user'] ."');";
    if ($bktitle != "") {
      $dljg=mysql_query($xrsql);
   
      if ($dljg=="1") {
        echo "<script> alert(\"发布成功！\"); </script>";
        header('Refresh: 0; url=..');
      }else{
        echo "<script> alert(\"发布失败,无法写入数据库！\"); </script>";
        echo $xrsql;
         //header('Refresh: 0; url=..');
      }
    }
    
   
?>