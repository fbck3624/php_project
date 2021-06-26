<html>
<head>
<meta charset="utf-8" />
<title>新增投票處理中……</title>
</head>
<body>
<?php

session_start();
if(isset($_SESSION["login"])){

$vnum=$_POST["vnum"];
$voteissue=$_POST["voteissue"];
$opt1=$_POST["opt1"];
$opt2=$_POST["opt2"];

$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
@mysqli_select_db($link,"class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
$mnum=$_SESSION["mnum"];
$php=$vnum.".php";
$cnum="A001";
$sqlcreate="INSERT into mvote(mnum,cnum,vnum,date,voteissue) VALUES('$mnum','$cnum','$vnum','$date','$voteissue')";
if($result=mysqli_query($link,$sqlcreate)){
	echo "新增成功<br/>";
	echo "3秒後將回到投票頁面";
	header("refresh:3;url=mvote.php");
}
$sqlcreate1="INSERT into voteoption(vnum,content) VALUES ('$vnum','$opt1')";
$sqlcreate2="INSERT into voteoption(vnum,content) VALUES ('$vnum','$opt2')";
mysqli_query($link,$sqlcreate1);
mysqli_query($link,$sqlcreate2);
mysqli_close($link); 
}
else{
	echo "Illegal acess to webpage<br/>";
	echo "<a href='login.html'> back to login</a>";
}
?>
</body>
</html>
