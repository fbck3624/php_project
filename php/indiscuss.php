<?php
session_start();
$cid=$_SESSION["cid"];
$id1=$_SESSION["id1"];
$id=$_SESSION["id"];
$content=$_POST["name2"];
$cname=$_SESSION["cname"];
$qid=$_SESSION["qid"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
if(isset($_SESSION["login1"])){

$sqlcreate="INSERT into reply(qid,cid,id,reply,date) VALUES('$qid','$cid','$id1','$content','$date')";
$result=mysqli_query($link,$sqlcreate);
header("Location: discuss.php?no=".$_SESSION["qid"]);
}
else if(isset($_SESSION["login"])){
$sql = "SELECT * FROM mdata WHERE ID='$id' "; 
$result = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result)){
	$name=$class["name"];
}
$uid='NULL';
$sqlcreate="INSERT into reply(qid,cid,id,reply,date) VALUES('$qid','$cid','$id','$content','$date')";
$result=mysqli_query($link,$sqlcreate);
header("Location: discuss.php?no=".$_SESSION["qid"]);
}
else{
   echo "Illegal acess to webpage<br/>";
   echo "<a href='login.html'> back to login</a>";
}
mysqli_close($link); 
?>