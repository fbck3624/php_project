<?php
session_start();
$cid=$_SESSION["cid"];
$id1=$_SESSION["id1"];
$id=$_SESSION["id"];
$content=$_POST["content"];
$cname=$_SESSION["cname"];
$qid=$_SESSION["qid"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
if(isset($_SESSION["login1"])){

$sqlcreate="INSERT into question(id,cid,cname,question,date) VALUES('$id1','$cid','$cname','$content','$date')";
$result=mysqli_query($link,$sqlcreate);
header("Location: que.php?no=".$_SESSION["cid"]);
}
else if(isset($_SESSION["login"])){
$sql = "SELECT * FROM mdata WHERE ID='$id' "; 
$result = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result)){
	$name=$class["name"];
}
$uid='NULL';
$sqlcreate="INSERT into question(id,cid,cname,question,date) VALUES('$id','$cid','$cname','$content','$date')";
$result=mysqli_query($link,$sqlcreate);
header("Location: que.php?no=".$_SESSION["cid"]);
}
else{
   echo "Illegal acess to webpage<br/>";
   echo "<a href='login.html'> back to login</a>";
}
mysqli_close($link); 
?>