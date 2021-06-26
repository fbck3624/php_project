<?php
session_start();
$cid=$_SESSION["cid"];
$uid=$_POST["uid"];
$grade=$_POST["grade"];
$medium=$_POST["medium"];
$final=$_POST["final"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$g=$grade+$medium+$final;
if (($g/3)>60) {
	$pass='P';
}
else{
	$pass='F';
}
$SQLUpdate="UPDATE mustclass SET pass='$pass',grade='$grade',medium='$medium',final='$final' WHERE uid='$uid' AND cid='$cid' ";
if($result=@mysqli_query($link,$SQLUpdate)){
  header("Location: mclass.php");
}
else{
	echo "失敗";
	echo "<a href='success.php'>首頁</a>"."<br/>";
}
@mysqli_close($link);

?>
