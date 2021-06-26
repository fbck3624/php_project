<?php
session_start();
if(isset($_SESSION["login"])){
$value=$_POST["value"];
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
$id=$_SESSION["id"];
$vnum=$_SESSION["vnum"];
$sqlcreate="INSERT into uvote(unum,vnum,onum,date) VALUES('$id','$vnum','$value','$date')";
$result=mysqli_query($link,$sqlcreate);
header("Location: uvote.php");
mysqli_close($link);
}
else if(isset($_SESSION["login1"])){
$value=$_POST["value"];
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
$id=$_SESSION["id1"];
$vnum=$_SESSION["vnum"];
$sqlcreate="INSERT into uvote(unum,vnum,onum,date) VALUES('$id','$vnum','$value','$date')";
$result=mysqli_query($link,$sqlcreate);
header("Location: uvote.php");
mysqli_close($link);
}
else{
	echo "Illegal acess to webpage<br/>";
	echo "<a href='login.html'> back to login</a>";
}
?>
