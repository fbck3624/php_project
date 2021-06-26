<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>使用者介面</title>
    <link rel="stylesheet" href="all2.css">
    
</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">
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
<?php
session_start();
$id1=$_SESSION["id1"];
$id=$_SESSION["id"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");

$sql = "SELECT DISTINCT cid,cname,pass FROM people WHERE uid='$id1'";
$sql1 = "SELECT DISTINCT cid,cname,pass FROM mustclass WHERE uid='$id1'";
$sql2 = "SELECT DISTINCT cid,cname,pass FROM science WHERE uid='$id1'";
$sql3 = "SELECT DISTINCT cid,cname,pass FROM social WHERE uid='$id1'";
$sql4 = "SELECT DISTINCT core.cid,core.cname,core.pass,coreclass.type FROM core JOIN coreclass WHERE coreclass.cid=core.cid AND uid='$id1'";
$sql5 = "SELECT DISTINCT cid,cname,pass FROM choose WHERE uid='$id1'";
$count=0;
if(isset($_SESSION["login1"])){
$result1 = mysqli_query($link,$sql1); 
$a=0;

echo "<div class='billboard'>";
echo "<h2>系上學分(必修)</h2>";

echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."已修過必修"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result1)){
if($class["pass"]=='P'){
   echo "<tr>";
   echo "<td>".$class['cname']."</td>";
   $a=$a+3;
   echo "</tr>";
}
}echo "</table>";
echo "</div>";
echo "<div class='scoredata'>";
    echo "<p>目前學分：</p><div class='score'>".$a."</div>";
    if($a>=72){
      echo "<p>已達規定門檻(72學分)</p>";
      $count=$count+1;
   }else{
      echo "<p>未達規定門檻(72學分)</p>";
   }
echo "</div>";

echo "</div>";
 
$result5 = mysqli_query($link,$sql5);
$b=0; 

echo "<div class='billboard'>";
echo "<h2>系上學分(選修)</h2>";

echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."已修過選修"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result5)){
    if($class["pass"]=='P'){
      echo "<tr>";
      echo "<td>".$class['cname']."</td>";
      $b=$b+3;
      echo "</tr>";
   }
}echo "</table>";
echo "</div>";
echo "<div class='scoredata'>";
    echo "<p>目前學分：</p><div class='score'>".$b."</div>";
    if($a>=24){
      echo "<p>已達規定門檻(24學分)</p>";
      $count=$count+1;
   }else{
      echo "<p>未達規定門檻(24學分)</p>";
   }
echo "</div>";

echo "</div>";

$result = mysqli_query($link,$sql);      
$c=0;

echo "<div class='billboard'>";
echo "<h2>通識學分(博雅人文)</h2>";

echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."已修過博雅人文"."</td>";
echo "</tr>";
   while($class = mysqli_fetch_assoc($result)){
      if($class["pass"]=='P'){
        echo "<tr>";
        echo "<td>".$class['cname']."</td>";
        $c=$c+2;
        echo "</tr>";
     }
  }echo "</table>";
echo "</div>";
echo "<div class='scoredata'>";
    echo "<p>目前學分：</p><div class='score'>".$c."</div>";
    if($c>=2){
      echo "<p>已達規定門檻(至少修過一次)</p>";
      $count=$count+1;
   }else{
      echo "<p>未達規定門檻(至少修過一次)</p>";
   }
echo "</div>";
echo "</div>";
 
$d=0;
$result2 = mysqli_query($link,$sql2); 

echo "<div class='billboard'>";
echo "<h2>通識學分(博雅自然)</h2>";

echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."已修過博雅自然"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result2)){
   if($class["pass"]=='P'){
     echo "<tr>";
     echo "<td>".$class['cname']."</td>";
     $d=$d+2;
     echo "</tr>";
  }
}echo "</table>";
echo "</div>";
echo "<div class='scoredata'>";
    echo "<p>目前學分：</p><div class='score'>".$d."</div>";
    if($d>=2){
      echo "<p>已達規定門檻(至少修過一次)</p>";
      $count=$count+1;
   }else{
      echo "<p>未達規定門檻(至少修過一次)</p>";
   }
echo "</div>";

echo "</div>";

$e=0;
$result3 = mysqli_query($link,$sql3); 

echo "<div class='billboard'>";
echo "<h2>通識學分(博雅社會)</h2>";

echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."已修過博雅社會"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result3)){
 if($class["pass"]=='P'){
   echo "<tr>";
   echo "<td>".$class['cname']."</td>";
   $e=$e+2;
   echo "</tr>";
}
}echo "</table>";
echo "</div>";
echo "<div class='scoredata'>";
    echo "<p>目前學分：</p><div class='score'>".$e."</div>";
    if($e>=2){
      echo "<p>已達規定門檻(至少修過一次)</p>";
      $count=$count+1;
   }else{
      echo "<p>未達規定門檻(至少修過一次)</p>";
   }
echo "</div>";
echo "</div>";


$f=0;
$u=0;
$v=0;
$w=0;
$x=0;
$y=0;
$z=0;
$result4 = mysqli_query($link,$sql4); 

echo "<div class='billboard'>";
echo "<h2>通識學分(核心)</h2>";

echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."已修過核心"."</td>";
echo "<td>"."種類"."</td>";
echo "</tr>";
while($class = mysqli_fetch_assoc($result4)){
   if($class["pass"]=='P'){
     echo "<tr>";
     if(strpos($class["type"],'思維') !== false){
     echo "<td>".$class['cname']."</td>";
     echo "<td>".$class['type']."</td>";
     $f=$f+3;
     $u=1;
  }else if(strpos($class["type"],'美學') !== false){
     echo "<td>".$class['cname']."</td>";
     echo "<td>".$class['type']."</td>";
     $f=$f+3;
     $v=1;
  }else if(strpos($class["type"],'公民') !== false){
     echo "<td>".$class['cname']."</td>";
     echo "<td>".$class['type']."</td>";
     $f=$f+3;
     $w=1;
  }else if(strpos($class["type"],'文化') !== false){
     echo "<td>".$class['cname']."</td>";
     echo "<td>".$class['type']."</td>";
     $f=$f+3;
     $x=1;
  }
  else if(strpos($class["type"],'科學') !== false){
     echo "<td>".$class['cname']."</td>";
     echo "<td>".$class['type']."</td>";
     $f=$f+3;
     $y=1;
  }else if(strpos($class["type"],'倫理') !== false){
     echo "<td>".$class['cname']."</td>";
     echo "<td>".$class['type']."</td>";
     $f=$f+3;
     $z=1;
  }
     echo "</tr>";
  }
}echo "</table>";
echo "</div>";
echo "<div class='scoredata'>";
    echo "<p>目前學分：</p><div class='score'>".$f."</div>";
    if(($u+$v+$w+$x+$y+$z)>=4){
      echo "<p>已達規定門檻(四個面向至少修過一次)</p>";
      $count=$count+1;
   }else{
      echo "<p>未達規定門檻(四個面向至少修過一次)</p>";
   }
echo "</div>";

echo "</div>";
 
if($count=4 AND $c+$d+$e+$f>=24){
   echo "<div class='total2'><h2>核心+博雅達到門檻(合計24學分)</h2></div>";
}
else{
   echo "<div class='total'><h2>核心+博雅未達到門檻(合計24學分)</h2></div>";
}

if($count=6 AND $a+$b+$c+$d+$e+$f>=128){
   echo "<div class='total2'><h2>已達畢業門檻";
   echo "，目前學分:".($a+$b+$c+$d+$e+$f)."</h2></div>";
}else{
   echo "<div class='total'><h2>未達畢業門檻";
   echo "，目前學分:".($a+$b+$c+$d+$e+$f)."</h2></div>";
}
 
}
else{
   echo "Illegal acess to webpage<br/>";
   echo "<a href='login.html'> back to login</a>";
}
mysqli_close($link); 


?>
</div>                
        </div>   
    </div><div class="clear"></div> 
</div> 
</body>
</html>

