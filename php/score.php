<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>課程</title>
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
$_SESSION["no"]=$_GET["no"];
$no=$_SESSION["no"];
$what=$_SESSION["what"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
if(isset($_SESSION["login1"])){
$sql = "SELECT  * FROM evaluation WHERE cid='$no'";
$result = mysqli_query($link,$sql); 

echo "<li><a href='".$what."'>返回</a></li>";
echo "<li><a href='logout.php'>登出</a></li>";
echo "<li><a href='success.php'>回首頁</a></li>";
echo "</ul>";    
echo "</div>";  

echo"</div><div class='clear'></div>";
echo "<div class='content'>";

echo "<div class='billboard2'>";
echo "<h2>"."成 績"."</h2>";
echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."評價內容"."</td>";
echo "<td>"."推薦指數"."</td>";
echo "</tr>";
//if(strpos($no,'LI') !== false){ 
$count=0;
$grade=0;
while($class = mysqli_fetch_assoc($result)){
    echo "<tr>";	
    echo "<td>".$class["content"]."</td>";
    echo "<td>".$class["score"]."顆星"."</td>";
    $grade=$grade+$class["score"];
    $count=$count+1;
  	echo "</tr>"; 
  	
  }
  echo "</table>";
        echo "</div>";
    echo "</div>";
echo "<div class='avgscore'>平均推薦指數:".($grade/$count)."顆星</div>";
echo "<div class='clear'></div>";
echo "</div>";

}
else if(isset($_SESSION["login"])){
$sql = "SELECT  * FROM evaluation WHERE cid='$no'";
$result = mysqli_query($link,$sql); 
echo "<li><a href='".$what."'>返回</a></li>";
echo "<li><a href='logout.php'>登出</a></li>";
echo "<li><a href='success.php'>回首頁</a></li>";
echo "</ul>";    
echo "</div>";  

echo"</div><div class='clear'></div>";
echo "<div class='content'>";

echo "<div class='billboard2'>";
echo "<h2>"."成 績"."</h2>";
echo "<div class='billboardlist'>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."評價內容"."</td>";
echo "<td>"."分數"."</td>";
echo "<td>"."刪除評價"."</td>";
echo "</tr>";
//if(strpos($no,'LI') !== false){ 

while($class = mysqli_fetch_assoc($result)){

    echo "<tr>";	
    echo "<td>".$class["content"]."</td>";
    echo "<td>".$class["score"]."</td>";
    echo "<td>"."<a href='dele.php?no=".$class['eid']."'>"."刪除評價"."</a>"."</td>";
  	echo "</tr>"; 
  	
  }
  echo "</table>";
        echo "</div>";
    echo "</div><div class='clear'></div>";
echo "</div>";
	}

//}
else{
   echo "Illegal acess to webpage<br/>";
   echo "<a href='login.html'> back to login</a>";
}


mysqli_close($link); 
?>
      
</body>
</html>
