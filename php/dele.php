<?php

$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
$eid=$_GET["no"];
echo $eid;
$sqldelete="DELETE FROM evaluation WHERE eid='$eid'";
$result=mysqli_query($link,$sqldelete);

header("Location: success.php");
?>
