<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>回報問題彙整</title>
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
	$link=@mysqli_connect('localhost','root','imdb201907','class');
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>編號</td>";
	echo "<td>學號</td>";
	echo "<td>問題類型</td>";
	echo "<td>內容</td>";
	echo "<td>時間</td>";
	echo "<td>刪除</td>";	
	echo "</tr>";

	
	$re="SELECT * FROM problem";
	$result= @mysqli_query($link,$re);
	mysqli_query($link, 'SET CHARACTER SET utf8');
	mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
	$result = mysqli_query($link,$re);
	$sql="SELECT COUNT(problemID) as c FROM problem WHERE problemtype='學分'";
	$sql1="SELECT COUNT(problemID) as c FROM problem WHERE problemtype='系統'";
	$sql2="SELECT COUNT(problemID) as c FROM problem WHERE problemtype='修課名單'";
	$result1= @mysqli_query($link,$sql);
	$result2= @mysqli_query($link,$sql1);
	$result3= @mysqli_query($link,$sql2);
	$aa=mysqli_fetch_assoc($result1);
	$bb=mysqli_fetch_assoc($result2);
	$cc=mysqli_fetch_assoc($result3);
	 while($row=@mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>".$row["problemID"]."</td><td>".$row["uid"]."</td><td>".$row["problemtype"]."</td><td>".$row["problem"]."</td><td>".$row["time1"]."</td>";
		echo "<td>"."<form action='pdel.php' method='post'>
    	<input type='hidden' name='num' value='".$row["problemID"]."'>
    	<input type='submit' name='send' value='刪除'>
    	</form>"."</td>";
    	
		echo "</tr>";
	}
	echo "</table>";
	echo "<div class='total'>";
	echo "<h2>";
        echo "問題統計:";
        echo "學分".$aa["c"]."個";
        echo "，系統".$bb["c"]."個";
        echo "，課名單".$cc["c"]."個";
        echo "<h2>";
	echo "</div>";
	
	echo "</div>"; 
                echo "<div class='contentright2'>" ;

        echo "<ul class='course'>";

        echo "<li><a href='success.php'>首頁</a></li>";
        echo "<li><a href='logout.php'>登出</a></li>";
                echo "</ul>";
         echo "</div>";

	echo "</div>";
	echo "<div class='contentright2'>" ;             
		
 	 
echo "</div>";   
echo "</div><div class='clear'></div>"; 
echo "</div>"; 


	mysqli_close($link);
	?>


