<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>問題回報</title>
    <link rel="stylesheet" href="all3.css">

</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">

    <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
<div class="word">
<?php
session_start();
$id=$_SESSION["id1"];
$name1=$_POST["name1"];
$name2=$_POST["name2"];
date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d");
$link=@mysqli_connect('localhost','root','imdb201907','class');
	mysqli_query($link, 'SET CHARACTER SET utf8');
	//mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$sqli="INSERT INTO problem (uid,problemtype,problem,time1) values ('$id','$name1','$name2','$date')";
	if (mysqli_query($link,$sqli)) {
		echo "回報成功";

	}else{
		echo "回報失敗，請稍後在試一次";
	}
	
	mysqli_close($link);
	echo "<a href='success.php'>，回首頁</a>"."</div>";
?>
<style>
.toptitle{
font-family: PingFang TC, Semibold, Microsoft JhengHei, Arial;
color: #fff;
font-size: 22px;
}
form,a{
font-family: PingFang TC, Semibold, Microsoft JhengHei, Arial;
color: #fff;
font-size: 20px;
}.word{
margin-top:5%;
float:left;
width:80%;
margin-left:10%;
font-size:20px;
color:white
}

</style>


</div>
</body>
</html>
