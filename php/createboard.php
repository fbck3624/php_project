<?php
$cid=$_POST["cid"];
$cname=$_POST["cname"];
$content=$_POST["content"];
session_start();
$value=$_POST["value"];
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
$id=$_SESSION["id"];
$sqlcreate="INSERT into board(mid,cid,date,content,cname) VALUES('$id','$cid','$date','$content','$cname')";

if($result=@mysqli_query($link,$sqlcreate)){

	header("Location:success.php");
}
mysqli_close($link);

?>
