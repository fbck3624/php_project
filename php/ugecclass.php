<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>通識課程</title>
    <link rel="stylesheet" href="all.css">

</head>
<body>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">
    <form action="check.php" method="post">
    <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
            <div class="headerlist">
                <ul>
                    <li><a href="logout.php">登出</a></li>
                    <li><a href="success.php">回首頁</a></li>
                </ul>
            </div>

        </div><div class="clear"></div>
        <div class="content">
<div class="toptitle">選 修 課 程</div>
<ul class="tabledata">

<?php
session_start();
if(isset($_SESSION["login1"])){
	echo "<li><a href='core.php'>"."核心通識"."</a>"."</li>";
	echo "<li><a href='people.php'>"."人文通識"."</a>"."</li>";
	echo "<li><a href='science.php'>"."自然通識"."</a>"."</li>";
	echo "<li><a href='social.php'>"."社會通識"."</a>"."</li>";
	
}
else if(isset($_SESSION["login"])){
	echo "<li><a href='core.php'>"."核心通識"."</a>"."</li>";
	echo "<li><a href='people.php'>"."人文通識"."</a>"."</li>";
	echo "<li><a href='science.php'>"."自然通識"."</a>"."</li>";
	echo "<li><a href='social.php'>"."社會通識"."</a>"."</li>";
}
else{
	echo "Illegal acess to webpage<br/>";
	echo "<a href='login.html'> back to login</a>";
}
?>
</ul>
</div>
</body>
</html>
