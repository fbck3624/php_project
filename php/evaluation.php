<?php
session_start();
$cid=$_SESSION["cid1"];
$cname=$_SESSION["cname"];
$id=$_SESSION["id1"];
$content=$_POST["content"];
$score=$_POST["score"];
$what=$_SESSION["what"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$sqlcreate="INSERT into evaluation(cname,cid,content,uid,score) VALUES('$cname','$cid','$content','$id','$score')";

if($result=mysqli_query($link,$sqlcreate)){
	/*echo "新增成功<br/>";
	echo "1秒後將回到首頁";
	header("refresh:1;url=success.php");*/
	header("Location: $what");
}

mysqli_close($link); 
?>
