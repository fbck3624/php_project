<?php
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");

$sql = "SELECT * FROM 管理員資料"; 

mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$result = mysqli_query($link,$sql); 
$manager = mysqli_fetch_assoc($result);
?>
