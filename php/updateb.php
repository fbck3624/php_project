<?php
$bid=$_POST["num"];
$content=$_POST["content"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$SQLUpdate="UPDATE board SET content='$content' WHERE bid='$bid'";
if($result=@mysqli_query($link,$SQLUpdate)){
	header("Location: success.php");
}
mysqli_close($link);
?>
