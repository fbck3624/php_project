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
            </div>  
       
        </div><div class="clear"></div>
        <div class="content2">
            
            <div class="billboard3">
                <h2>討 論 版</h2>
                <div class="billboardlist">
<?php
session_start();
//$_SESSION["cid"]=$_GET["no"];
$cid=$_SESSION["cid"];
$id1=$_SESSION["id1"];
$id=$_SESSION["id"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 

mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	
$sql = "SELECT * FROM question WHERE cid='$cid'";
$result = mysqli_query($link,$sql);
if(isset($_SESSION["login1"])){
	echo "<br/>";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>"."發布人"."</td>";
	echo "<td>"."主題"."</td>";
	echo "<td>"."日期"."</td>";
	echo "<td>"."刪除"."</td>";
	echo "</tr>";
		while($vote = mysqli_fetch_assoc($result)){
    	echo "<tr>";
    	echo "<td>".$vote['id']."</td>";
    	echo "<td>"."<a href='discuss.php?no=".$vote['qid']."'>".$vote['question']."</a>"."</td>";
    	//echo "<td>".$vote['question']."</td>";
    	echo "<td>".$vote['date']."</td>";
    	if($id1==$vote["id"]){
           echo "<td>"."<a href='deq.php?no=".$vote["qid"]."'>"."刪除</a>"."</td>";
        }else{
           echo "<td>"."/"."</td>";
        }
  		echo "</tr>";
    }
	echo "</table>";
	echo "</div>";        
	echo "</div>";
	echo "<div class='contentright2'>" ;              
		 
	echo "<ul class='course'>";        
			 
	echo "<li><a href='success.php'>首頁</a></li>";
	echo "<li><a href='logout.php'>登出</a></li>"; 
	echo "<li><a href='newq.php'>"."新增主題"."</a></li>";
		echo "</ul>";
	 echo "</div>";  
echo "</div>";   
echo "</div><div class='clear'></div>"; 
echo "</div>"; 
    echo "<br/>";
    

}
elseif(isset($_SESSION["login"])){
	echo "";
	echo "<br/>";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>"."發布人"."</td>";
	echo "<td>"."主題"."</td>";
	echo "<td>"."日期"."</td>";
	echo "<td>"."刪除"."</td>";
	echo "</tr>";
		while($vote = mysqli_fetch_assoc($result)){
    	echo "<tr>";
    	echo "<td>".$vote['id']."</td>";
    	echo "<td>"."<a href='discuss.php?no=".$vote['qid']."'>".$vote['question']."</a>"."</td>"."<br/>";
    	//echo "<td>".$vote['question']."</td>";
    	echo "<td>".$vote['date']."</td>";
    	echo "<td>"."<a href='deq.php?no=".$vote["qid"]."'>"."刪除</a>"."</td>";
  		echo "</tr>";
    }
	echo "</table>";
	echo "</div>";        
	echo "</div>";
	echo "<div class='contentright2'>" ;              
		 
	echo "<ul class='course'>";        
			 
	echo "<li><a href='success.php'>首頁</a></li>";
	echo "<li><a href='logout.php'>登出</a></li>"; 
	echo "<li><a href='newq.php'>"."新增主題"."</a></li>";
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