<?php

$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
$problemID=$_POST["num"];
$sqldelete="DELETE FROM problem WHERE problemID='$problemID'";
$result=mysqli_query($link,$sqldelete);

header("Location: mproblem.php");

mysqli_close($link);


?>
