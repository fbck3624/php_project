<?php
session_start();
$id=$_SESSION["id1"];

$link=mysqli_connect("localhost","root","hzsh310147") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");

$sql = "SELECT * FROM people WHERE uid='$id'";
$sql1 = "SELECT * FROM mustclass WHERE uid='$id'";
$sql2 = "SELECT * FROM science WHERE uid='$id'";
$sql3 = "SELECT * FROM social WHERE uid='$id'";
$sql4 = "SELECT * FROM core WHERE uid='$id'";

$result = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result)){
   //echo $class["cname"];
   echo "<a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a>";
   echo "<br/>";
}

$result1 = mysqli_query($link,$sql1); 
while($class = mysqli_fetch_assoc($result1)){
   //echo $class["cname"];
   echo "<a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a>";
   echo "<br/>";
}
$result2 = mysqli_query($link,$sql2); 
while($class = mysqli_fetch_assoc($result2)){
   //echo $class["cname"];
   echo "<a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a>";
   echo "<br/>";
}

$result3 = mysqli_query($link,$sql3); 
while($class = mysqli_fetch_assoc($result3)){
   //echo $class["cname"];
   echo "<a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a>";
   echo "<br/>";
}

$result4 = mysqli_query($link,$sql4); 
while($class = mysqli_fetch_assoc($result4)){
   //echo $class["cname"];
   echo "<a href='cc.php?no=".$class['cid']."'>".$class["cname"]."</a>";
   echo "<br/>";
}
mysqli_close($link); 
echo "<a href='usuccess.php'>首頁</a>"."<br/>";
echo "<a href='logout.php'>logout</a>"."<br/>";
?>