<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板</title>
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
$cid=$_GET["no"];
$_SESSION["cid1"]=$cid;
$what=$_SESSION["what"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
if(strpos($cid,'CC') !== false){ 
$sql = "SELECT * FROM coreclass WHERE cid='$cid' "; 
$result = mysqli_query($link,$sql);
while($class = mysqli_fetch_assoc($result)){
$_SESSION["cname"]=$class["cname"];
}
}else if(strpos($cid,'LI') !== false){
$sql = "SELECT * FROM socialclass WHERE cid='$cid' "; 
$result = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result)){
$_SESSION["cname"]=$class["cname"];
}
}else if(strpos($cid,'SC') !== false){
$sql = "SELECT * FROM socialclass WHERE cid='$cid' "; 
$result = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result)){
$_SESSION["cname"]=$class["cname"];
}
}else if(strpos($cid,'SO') !== false) {
$sql = "SELECT * FROM socialclass WHERE cid='$cid' "; 
$result = mysqli_query($link,$sql); 
while($class = mysqli_fetch_assoc($result)){
$_SESSION["cname"]=$class["cname"];
}
}

mysqli_close($link); 
echo "<li><a href='".$what."'>返回</a></li>";
echo "<li><a href='logout.php'>登出</a></li>";
echo "<li><a href='success.php'>回首頁</a></li>";
echo "</ul>";    
echo "</div>";  

echo"</div><div class='clear'></div>";      
echo "<div class='enterfield'>";
echo "<br/>";
echo "<form action='evaluation.php' method='post'>";
echo "內容：<input class='e' type='text' name='content' style = 'width:70%'/><br/>";
echo "推薦指數：<input class='e' type='text' name='score' style = 'width:70%'/><br/>";
echo "<input class='button' type='submit' value='提交'></div>";
echo "</form>";

?>

</div>
    
</div>
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

