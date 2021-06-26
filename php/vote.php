<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投票</title>
    <link rel="stylesheet" href="all3.css">

</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">

    <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
            <div class="headerlist">
                    <ul>
<li><a href='logout.php'>登出</a></li>
<li><a href='success.php'>回首頁</a></li>
</ul>
</div>
<?php
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
session_start();
$num=$_POST["num"];
$sql = "SELECT * FROM mvote where vnum='$num'"; 

mysqli_query($link, 'SET CHARACTER SET utf8');
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$result=mysqli_query($link,$sql);
$vote = @mysqli_fetch_assoc($result);
$sqll = "SELECT * FROM voteoption WHERE vnum='$num'"; 
$resultl=mysqli_query($link,$sqll);
$sql1 = "SELECT * FROM uvote WHERE vnum='$num'"; 
$result1=mysqli_query($link,$sql1);
$opt=mysqli_fetch_array($result1);
if(isset($_SESSION["login1"]) ){
$_SESSION["vnum"]=$vote['vnum'];
echo "<div class='word'>";
echo "<form action='c.php' method='post'>";

echo $vote['voteissue'];
  while($voteoption=mysqli_fetch_array($resultl)){
	echo "<input type='radio' name=value value=".$voteoption['onum'].">".$voteoption['content'];
	}
echo "</br>";
echo "<input class='button' type='submit'><br/>";
echo "</div>";
echo "</form>";
}
else if(isset($_SESSION["login"])){
	$_SESSION["vnum"]=$vote['vnum'];
echo "<form action='c.php' method='post'>";
echo "<div class='word'>";
echo $vote['voteissue'];
  while($voteoption=mysqli_fetch_array($resultl)){
	
	echo "<input type='radio' name=value value=".$voteoption['onum'].">".$voteoption['content'];
	}

echo "<input class='button' type='submit'><br/>";
echo "</div>";
echo "</form>";
}

else{
	echo "Illegal acess to webpage<br/>";
	echo "<a href='login.html'> back to login</a>";
}
mysqli_close($link);
?>
</div>
<style>
.toptitle{
font-family: PingFang TC, Semibold, Microsoft JhengHei, Arial;
color: #fff;
font-size: 22px;
}
form{
font-family: PingFang TC, Semibold, Microsoft JhengHei, Arial;
color: #fff;
font-size: 20px;
}
.word{
float:left;
width:80%;
margin-left:10%;
margin-top:2%;
}
.e{
    
    width:10px;
    padding:5px 15px; background:#ccc; border:0 none;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px;
margin-top:1%;
}
.button{
    margin-top:3%;  
}
</style>

</body>
</html>
