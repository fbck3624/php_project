<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>自然通識</title>
    <link rel="stylesheet" href="all3.css">

</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">
    <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
            <div class="headerlist">
            </div>

        </div><div class="clear"></div>
        <div class="content">

            <div class="billboard">
                <h2>自然通識</h2>
                <div class="billboardlist">

<?php
session_start();
$id=$_SESSION["id1"];
$_SESSION["what"]='science.php';
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
if(isset($_SESSION["login1"])){
$sql = "SELECT  scienceclass.cname,scienceclass.cid,mdata.name FROM scienceclass JOIN mdata WHERE mdata.ID=scienceclass.mid";
$result = mysqli_query($link,$sql); 
echo "<br/>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."課程編號"."</td>";
echo "<td>"."課程名稱"."</td>";
echo "<td>"."授課教師"."</td>";
echo "<td>"."課程評價"."</td>";
echo "<td>"."填寫評價"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$class["cid"]."</td>";
    echo "<td>".$class['cname']."</td>";
  	echo "<td>".$class['name']."</td>";
  	echo "<td>"."<a href='score.php?no=".$class['cid']."'>"."評價"."</a>"."</td>";
  	echo "<td>"."<a href='write.php?no=".$class['cid']."'>"."填寫評價"."</a>"."</td>";
  	echo "</tr>";
   //echo $class["cid"];
   //echo $class["cname"];
}
echo "</table>";
echo "</div>";
echo "</div>";
echo "<div class='contentright'>" ;

echo "<ul class='course'>";

echo "<li><a href='ugecclass.php'>返回</a></li>";
echo "<li><a href='success.php'>首頁</a></li>";
echo "<li><a href='logout.php'>登出</a></li>";
    echo "</ul>";
 echo "</div>";
echo "</div>";
echo "</div><div class='clear'></div>";
echo "</div>";

}
else if(isset($_SESSION["login"])){
$sql = "SELECT  scienceclass.cname,scienceclass.cid,mdata.name FROM scienceclass JOIN mdata WHERE mdata.ID=scienceclass.mid";
$result = mysqli_query($link,$sql); 
echo "<br/>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."課程編號"."</td>";
echo "<td>"."課程名稱"."</td>";
echo "<td>"."授課教師"."</td>";
echo "<td>"."課程評價"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>".$class["cid"]."</td>";
    echo "<td>".$class['cname']."</td>";
  	echo "<td>".$class['name']."</td>";
  	echo "<td>"."<a href='score.php?no=".$class['cid']."'>"."評價"."</a>"."</td>";
  	echo "</tr>";
   //echo $class["cid"];
   //echo $class["cname"];
}
echo "</table>";
echo "</div>";
echo "</div>";
echo "<div class='contentright'>" ;

echo "<ul class='course'>";

echo "<li><a href='ugecclass.php'>返回</a></li>";
echo "<li><a href='success.php'>首頁</a></li>";
echo "<li><a href='logout.php'>登出</a></li>";
    echo "</ul>";
 echo "</div>";
echo "</div>";
echo "</div><div class='clear'></div>";
echo "</div>";

	}
else{
   echo "Illegal acess to webpage<br/>";
   echo "<a href='login.html'> back to login</a>";
}
mysqli_close($link); 

?>
