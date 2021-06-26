<?php
session_start();
$rid=$_GET["no"];
$cid=$_SESSION["cid"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
$sqldelete="DELETE FROM reply WHERE rid='$rid'";
if($result=mysqli_query($link,$sqldelete)){
header("Location: discuss.php?no=".$_SESSION["qid"]);
}
mysqli_close($link);
?>