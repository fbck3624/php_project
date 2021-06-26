<?php
session_start();
$qid=$_GET["no"];
$cid=$_SESSION["cid"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
$sqldelete="DELETE FROM question WHERE qid='$qid'";
if($result=mysqli_query($link,$sqldelete)){
header("Location: que.php?no=".$_SESSION["cid"]);
}
mysqli_close($link);
?>