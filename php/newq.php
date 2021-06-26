<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增主題</title>
    <link rel="stylesheet" href="all3.css">

</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">

    <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
            <div class="headerlist">
                    <ul>
<?php
session_start();
$cid=$_SESSION["cid"];
echo "<li><a href='que.php?no=".$_SESSION["cid"]."'>返回</a></li>";
?>
<li><a href='success.php'>回首頁</a></li>
</ul>
</div>
<body>
<h1>填寫主題</h1>
<form action="inq.php" method="post">
<div class="word">
主題：<input class="e" type="text" name="content" style = "width:70%"/><br/>
<input class="button" type="submit" value="提交"/>
</div>
</form>

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
margin-top:3%;
}
.e{
    width:10px;
    padding:5px 15px; background:#ccc; border:0 none;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px;
}
.button{
    margin-top:3%;  
}
</style>
</body>
</html>