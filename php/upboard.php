<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更改布告欄</title>
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
$bid=$_GET["bid"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$sql = "SELECT * FROM board WHERE bid='$bid'"; 
$result = mysqli_query($link,$sql); 
echo "<form action='updateb.php' method='post'>";
while($vote = mysqli_fetch_assoc($result)){
echo "<div class='word'>";
echo "公佈欄內容：
      <input type='hidden' name='num' value='".$vote["bid"]."'>
      <input class='e' type='text' name='content' value='".$vote["content"]."' style = 'width:70%'/><br/>";
}
echo "<input class='button' type='submit' value='提交'/>";
echo "</div>";
echo "</form>";
mysqli_close($link);
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
