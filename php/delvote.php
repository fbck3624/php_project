<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>刪除投票</title>
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
<?php
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");

$sql = "SELECT * FROM mvote"; 

mysqli_query($link, 'SET CHARACTER SET utf8');	
$sql = "SELECT * FROM mvote"; 
$result = mysqli_query($link,$sql);
echo "<br/>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."投票題目"."</td>";
echo "<td>"."發布日期"."</td>";
echo "<td>"."刪除"."</td>";
echo "</tr>";
while($vote=@mysqli_fetch_assoc($result)){
	echo "<tr>";
    echo "<td>".$vote['voteissue']."</td>";
  	echo "<td>".$vote['date']."</td>";
    echo "<td>"."<form action='d.php' method='post'>
    <input type='hidden' name='num' value='".$vote["vnum"]."'>
    <input type='submit' name='send' value='刪除'>
    </form>"."</td>";
  	echo "</tr>";

}
echo "</table>";
echo "</div>";
echo "<div class='contentright'>" ;                                               
echo "<ul class='course'>";        
echo "<li><a href='success.php'>首頁</a></li>";
echo "<li><a href='logout.php'>登出</a></li>"; 
echo "</ul>";
 echo "</div>";  
echo "</div>";   
echo "</div><div class='clear'></div>"; 
echo "</div>"; 
@mysqli_close($link);
?>

</body>
</html>
