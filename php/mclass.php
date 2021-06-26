<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的課程</title>
    <link rel="stylesheet" href="all.css">
</head>
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
<div class="toptitle">我 的 課 程</div>
<ul class="tabledata">
<?php
session_start();
$id1=$_SESSION["id1"];
$id=$_SESSION["id"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8'); 
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");

$sql = "SELECT DISTINCT cid,cname FROM people WHERE uid='$id1'";
$sql1 = "SELECT DISTINCT cid,cname FROM mustclass WHERE uid='$id1'";
$sql2 = "SELECT DISTINCT cid,cname FROM science WHERE uid='$id1'";
$sql0 = "SELECT DISTINCT cid,cname FROM choose WHERE uid='$id1'";
$sql3 = "SELECT DISTINCT cid,cname FROM social WHERE uid='$id1'";
$sql4 = "SELECT DISTINCT cid,cname FROM core WHERE uid='$id1'";
$sql5 = "SELECT DISTINCT cid,cname FROM pclass WHERE mid='$id'";
$sql50 = "SELECT DISTINCT cid,cname FROM choose WHERE mid='$id'";
$sql6 = "SELECT DISTINCT cid,cname FROM mustclass WHERE mid='$id'";
$sql7 = "SELECT DISTINCT cid,cname FROM scienceclass WHERE mid='$id'";
$sql8 = "SELECT DISTINCT cid,cname FROM socialclass WHERE mid='$id'";
$sql9 = "SELECT DISTINCT cid,cname FROM coreclass WHERE mid='$id'";
if(isset($_SESSION["login1"])){
$result = mysqli_query($link,$sql1); 
while($class = mysqli_fetch_assoc($result)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}
$result0 = mysqli_query($link,$sql0); 
while($class = mysqli_fetch_assoc($result0)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";
   echo "<br/>";
}
$result1 = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result1)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";
 
}
$result2 = mysqli_query($link,$sql2); 
while($class = mysqli_fetch_assoc($result2)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}

$result3 = mysqli_query($link,$sql3); 
while($class = mysqli_fetch_assoc($result3)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}

$result4 = mysqli_query($link,$sql4); 
while($class = mysqli_fetch_assoc($result4)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}
}
else if(isset($_SESSION["login"])){
  $result5 = mysqli_query($link,$sql5); 
while($class = mysqli_fetch_assoc($result5)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}
  $result50 = mysqli_query($link,$sql50); 
while($class = mysqli_fetch_assoc($result50)){
   //echo $class["cname"];
   echo "<a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a>";
   echo "<br/>";
}
$result6 = mysqli_query($link,$sql6); 
while($class = mysqli_fetch_assoc($result6)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}
$result7 = mysqli_query($link,$sql7); 
while($class = mysqli_fetch_assoc($result7)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}

$result8 = mysqli_query($link,$sql8); 
while($class = mysqli_fetch_assoc($result8)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}

$result9 = mysqli_query($link,$sql9); 
while($class = mysqli_fetch_assoc($result9)){
   //echo $class["cname"];
   echo "<li><a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a></li>";

}
}
else{
   echo "Illegal acess to webpage<br/>";
   echo "<a href='login.html'> back to login</a>";
}
mysqli_close($link); 

?>
</ul>
</div>
</body>
</html>

