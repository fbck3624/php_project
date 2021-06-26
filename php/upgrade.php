<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改成績</title>
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
$uid=$_GET["no"];
echo "<form action='grade.php' method='post'>";
echo "<div class='word'>";
echo "學號：<input class='e' type='text' value='$uid' name='uid' style = 'width:90%'/><br/>";
echo "小考：<input class='e' type='text' name='grade' style = 'width:90%'/><br/>";
echo "期中：<input class='e' type='text' name='medium' style = 'width:90%'/><br/>";
echo "期末：<input class='e' type='text' name='final' style = 'width:90%'/><br/>";
echo "<input class='button' type='submit' value='提交'/>";
echo "</form>";
echo "</div>";
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
