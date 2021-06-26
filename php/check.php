<?php
$id=$_POST["id"];
$pwd=$_POST["pwd"];
session_start();
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");

$sql = "SELECT * FROM manager"; 

mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$result = mysqli_query($link,$sql); 
$manager = mysqli_fetch_assoc($result);

mysqli_select_db($link, "class");

$sql1 = "SELECT * FROM user"; 

mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$resultt = mysqli_query($link,$sql1); 
$user = mysqli_fetch_assoc($resultt);

if($id==$manager["id"] && $pwd==$manager["pwd"]){
	$_SESSION["login"]="success";
	$_SESSION["id"]=$manager["id"];
	$_SESSION["mnum"]=$manager["num"];
	$_SESSION["name"]=$manager["name"];
	header("Location: success.php");
	}


else if($id==$user["id"] && $pwd==$user["pwd"]) {
	$_SESSION["login1"]="success1";
	$_SESSION["id1"]=$user["id"];
	$_SESSION["unum"]=$user["num"];
	$_SESSION["name1"]=$user["name"];
	header("Location: success.php");
}
else{
	$_SESSION["loginfail"]="fail";
	echo "帳號或者密碼錯誤";
	echo "3秒後將回到登入頁面";
	header("refresh:3;url=login.html");
	}
mysqli_close($link);
?>
