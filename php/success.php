<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>使用者介面</title>
    <link rel="stylesheet" href="success.css">
    
</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">
    <form action="check.php" method="post">
    <div class="wrap">             
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a> 
            <?php
                session_start();
                $link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結");
                mysqli_select_db($link, "class");
                $sql = "SELECT mdata.name,board.cname,board.content,board.date,board.bid FROM board JOIN mdata ON board.mid=mdata.ID";
                mysqli_query($link, 'SET CHARACTER SET utf8');
                mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
                $result = mysqli_query($link,$sql);
                if(isset($_SESSION["login1"])){
                    echo "<div class='headerlist'>";
                        echo "<ul>";
                echo "<li><a href='logout.php'>"."登出"."</a></li>";
                echo "<li><a href='https://www.nuk.edu.tw/bin/home.php'>"."回首頁"."</a></li>";
                echo "</ul>";    
        echo "</div>";  
       
        echo "</div><div class='clear'></div>";
        echo "<div class='content'>";
            echo "<marquee direction='right' bgcolor='red' height=25><font color='white' style='cursor: pointer' size='5px'>"."歡迎使用者".$_SESSION["name1"]."回來"."</font></marquee>";
            echo "<div class='billboard'>";
                echo "<h2>"."✎ 佈 告 欄"."</h2>";
                echo "<div class='billboardlist'>";
                echo "<table border='1'>";
                echo "<tr>";
                echo "<td>"."發布人"."</td>";
                echo "<td>"."發布課程"."</td>";
                echo "<td>"."發布內容"."</td>";
                echo "<td>"."發布時間"."</td>";
                echo "</tr>";
                while($vote = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$vote['name']."</td>";
                echo "<td>".$vote['cname']."</td>";
                        echo "<td>".$vote['content']."</td>";
                        echo "<td>".$vote['date']."</td>";
                        echo "</tr>";
          }
                echo "</table>";
			                        
                echo "</div>";
               echo "<div class='vote'><a href='uvote.php'>"."投 票 +"."</a></div>";
            echo "</div>";
            echo "<div class='contentright'>";                 
            echo "<div class='studyscore'><a href='uinquire.php'>"."學 分 查 詢"."</a></div><div class='clear'></div>";  
            echo "<ul class='course'>";        
            echo "<h2>"." ✒ 課 程"."</h2>"; 
            echo "<li><a href='mclass.php'>"."我的課程"."</a></li>"; 
            echo "<li><a href='unclass.php'>"."必修課程"."</a></li>";   
            echo "<li><a href='umyclass.php'>"."選修課程"."</a></li>";         
            echo "<li><a href='ugecclass.php'>"."通識課程"."</a></li>";
            echo "<div class='return'><a href='report.php'>"."回 報 問 題"."</a></div>";
            echo "</ul>";

        }
        else if(isset($_SESSION["login"])){
            echo "<div class='headerlist'>";
            echo "<ul>";
    echo "<li><a href='logout.php'>"."登出"."</a></li>";
    echo "<li><a href='https://www.nuk.edu.tw/bin/home.php'>"."回首頁"."</a></li>";
    echo "</ul>";    
echo "</div>";  

echo "</div><div class='clear'></div>";
echo "<div class='content'>";
echo "<marquee direction='right' bgcolor='red' height=25><font color='white' style='cursor: pointer' size='5px'>"."歡迎管理者".$_SESSION["name"]."回來"."</font></marquee>";
echo "<div class='billboard'>";
    echo "<h2>"."✎ 佈 告 欄"."</h2>";
	    echo "<div class='billboardlist'>";            
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>"."發布人"."</td>";
            echo "<td>"."發布課程"."</td>";
            echo "<td>"."發布內容"."</td>";
            echo "<td>"."發布時間"."</td>";
	    echo "<td>"."修改"."</td>";
            echo "<td>"."刪除"."</td>";
            echo "</tr>";
            while($vote = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$vote['name']."</td>";
                echo "<td>".$vote['cname']."</td>";
                echo "<td>".$vote['content']."</td>";
                echo "<td>".$vote['date']."</td>";
		echo "<td>"."<a href='upboard.php?bid=".$vote['bid']."'>"."修改"."</a>"."</td>";
            echo "<td>"."<a href='delboard.php?bid=".$vote['bid']."'>"."刪除"."</a>"."</td>";
                echo "</tr>";
          }
         echo "</table>";
	 echo "</div>";
         
         echo "<div class='vote'><a href='mvote.php'>"."投 票 +"."</a></div>";
         echo "<div class='addb'><a href='createboard.html'>新增公佈欄</a></div>";
     echo "</div>";
     echo "<div class='contentright'>";                 
     echo "<div class='studyscore'><a href='#'>"."管 理 者"."</a></div><div class='clear'></div>";  
     echo "<ul class='course'>";        
     echo "<h2>"." ✑ 課 程"."</h2>"; 
     echo "<li><a href='mclass.php'>"."我的課程"."</a></li>"; 
     echo "<li><a href='unclass.php'>"."必修課程"."</a></li>";   
     echo "<li><a href='umyclass.php'>"."選修課程"."</a></li>";         
     echo "<li><a href='ugecclass.php'>"."通識課程"."</a></li>";
     echo "<div class='return'><a href='mproblem.php'>"."回 報 問 題"."</a></div>";
     echo "</ul>";
        
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
    <div class="footer">
        <p>Copyright © 2016. NUKIM.</p>
        <p>81148 高雄市楠梓區高雄大學路700號</p>
        <p>700, Kaohsiung University Rd., Nanzih District, , Kaohsiung 811, Taiwan, R.O.C.</p>
        <p>TEL: 07-591-9326 FAX: +886-7-5919328</p>
    </div>
</div> 
</form>
</body>
</html>


