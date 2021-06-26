<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>討論區</title>
    <link rel="stylesheet" href="all3.css">
    
</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">
    <div class="wrap">             
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a> 
            <div class="headerlist">
            </div>  
       
        </div><div class="clear"></div>
        <div class="content2">
            
            <div class="billboard3">
                
<?php
session_start();
//$_SESSION["cid"]=$_GET["no"];
$cid=$_SESSION["cid"];
$id1=$_SESSION["id1"];
$id=$_SESSION["id"];
$qid=$_GET["no"];
$_SESSION["qid"]=$qid;
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
$sql1 = "SELECT * FROM question WHERE qid='$qid' "; 
$result1 = mysqli_query($link,$sql1);
$cl = mysqli_fetch_assoc($result1);
//echo "歡迎來到".$cl["cname"]."的討論區";
//$_SESSION["cname"]=$cl["cname"];
echo "<h2>";
echo $cl['id'];
echo '&nbsp;&nbsp;&nbsp;';
echo $cl['question'];
echo '&nbsp;&nbsp;&nbsp;';
echo $cl['date'];
echo "</h2>";
echo "<form action='indiscuss.php' method='post'>";
echo "<textarea Cols='90' rows='2' name='name2' style = 'width:400'></textarea><br/>";
echo "<input class='r' type='submit' value='回復主題'><br/>";
echo "</form>";
echo "<div class='billboardlist'>";
if(isset($_SESSION["login1"])){
$sql = "SELECT * FROM reply WHERE qid='$qid' "; 
$result = mysqli_query($link,$sql); 
	echo "<br/>";
	/*echo "<table border='1'>";
	echo "<tr>";
	echo "<td>"."姓名"."</td>";
	echo "<td>"."內容"."</td>";
	echo "<td>"."刪除"."</td>";
	echo "</tr>";*/
while($class = mysqli_fetch_assoc($result)){

        if($id1==$class["id"]){
         echo "</br>";
         echo "</br>";
         echo "<p class='ss ss2'>";
         echo "<a href='dediscuss.php?no=".$class["rid"]."'>"."刪除 "."</a>";
         echo $class['id'];
         echo '&nbsp;&nbsp;&nbsp;';
           echo $class['reply'];
           echo '&nbsp;&nbsp;&nbsp;';
           echo $class['date'];
           echo '&nbsp;&nbsp;&nbsp;';
           
           echo "</p>";
           echo "</br>";  

        }else{
         echo "<p class='box u-tri'>";
         echo $class['id'];
         echo '&nbsp;&nbsp;&nbsp;';
           echo $class['reply'];
           echo '&nbsp;&nbsp;&nbsp;';
           echo $class['date'];
           echo '&nbsp;&nbsp;&nbsp;';
           echo " ";
           echo "</p>";
           echo "</br>";          
        }

}
echo "<br/>";
echo "</div>";        
echo "</div>";
echo "<div class='contentright2'>" ;              
    
echo "<ul class='course'>";        

mysqli_close($link); 
echo "<li><a href='who.php?no=".$_SESSION["cid"]."'>"."修課名單"."</a></li>";
echo "<li><a href='cc.php?no=".$_SESSION["cid"]."'>"."成績"."</a></li>"; 
echo "<li><a href='que.php?no=".$_SESSION["cid"]."'>返回</a></li>";
echo "<li><a href='success.php'>首頁</a></li>";
echo "<li><a href='logout.php'>登出</a></li>";



   echo "</ul>";
 echo "</div>";  
echo "</div>";   
echo "</div><div class='clear'></div>"; 
echo "</div>"; 
}



elseif(isset($_SESSION["login"])){
  $sql = "SELECT * FROM reply WHERE qid='$qid' "; 
$result = mysqli_query($link,$sql);
	echo "<br/>";
	/*echo "<table border='1'>";
	echo "<tr>";
	echo "<td>"."姓名"."</td>";
	echo "<td>"."內容"."</td>";
	echo "<td>"."刪除"."</td>";
	echo "</tr>";*/
while($class = mysqli_fetch_assoc($result)){
   if($id==$class["id"]){
      echo "</br>";
      echo "</br>";
      echo "<p class='ss ss2'>";
    echo "<a href='dediscuss.php?no=".$class["rid"]."'>"."刪除 "."</a>";      
      echo $class['id'];
      echo '&nbsp;&nbsp;&nbsp;';
        echo $class['reply'];
        echo '&nbsp;&nbsp;&nbsp;';
        echo $class['date'];
        echo '&nbsp;&nbsp;&nbsp;';
        echo "</p>";
        echo "</br>";  

     }else{
      echo "<p class='box u-tri'>";
      echo $class['id'];
      echo '&nbsp;&nbsp;&nbsp;';
        echo $class['reply'];
        echo '&nbsp;&nbsp;&nbsp;';
        echo $class['date'];
        echo '&nbsp;&nbsp;&nbsp;';
        echo "<a href='dediscuss.php?no=".$class["rid"]."'>"."刪除</a>";
        echo "</p>";
        echo "</br>";          
     }

}

   echo "<br/>";
   echo "</div>";        
	echo "</div>";
	echo "<div class='contentright2'>" ;              
		 
	echo "<ul class='course'>";        

   mysqli_close($link); 
echo "<li><a href='who.php?no=".$_SESSION["cid"]."'>"."修課名單"."</a></li>";
echo "<li><a href='cc.php?no=".$_SESSION["cid"]."'>"."成績"."</a></li>"; 
echo "<li><a href='que.php?no=".$_SESSION["cid"]."'>返回</a></li>";
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

?>