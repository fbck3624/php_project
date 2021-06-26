<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增布告欄</title>
    <link rel="stylesheet" href="all3.css">

</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">

    <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
            <div class="headerlist">
                    <ul>
<li><a href='updatevote.php'>返回</a></li>
<li><a href='logout.php'>登出</a></li>
<li><a href='success.php'>回首頁</a></li>
</ul>
</div>

<?php
session_start();
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
$vnum=$_GET["no"];
$_SESSION["v"]=$vnum;
echo $_SESSION["v"];
$sql = "SELECT * FROM mvote WHERE vnum='$vnum'"; 
$result = mysqli_query($link,$sql); 
mysqli_query($link, 'SET CHARACTER SET utf8');	
$sql1="SELECT * FROM voteoption WHERE vnum='$vnum'";
$result1 = mysqli_query($link,$sql1); 
$row=@mysqli_fetch_assoc($result);
//$_SESSION['vnum']=$row['vnum'];
echo "<div class='word'>";
echo "<form action='updatev.php' method='post'>";
echo "投票主題：<input class='e' type='text' name='voteissue' style = 'width:86%'/><br/>";
echo "選項：<input class='e' type='text' name='opt1' style = 'width:90%'/><br/>";
echo "選項：<input class='e' type='text' name='opt2' style = 'width:90%'/><br/>";

echo "<input class='button' type='submit' value='提交'/>";
echo "</form>";
echo "</div>";
@mysqli_close($link);

?>

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


