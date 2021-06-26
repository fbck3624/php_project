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
        <div class="content">
            
            <div class="billboard">
                <h2>成 績</h2>
                <div class="billboardlist">
                        <?php
                        session_start();
                        $_SESSION["no"]=$_GET["no"];
                        $no=$_SESSION["no"];
                        $id=$_SESSION["id"];
                        $id1=$_SESSION["id1"];
                        $link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
                        
                        mysqli_select_db($link, "class");
                        mysqli_query($link, 'SET CHARACTER SET utf8');  
                        mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
                        $sql = "SELECT * FROM people JOIN udata WHERE people.uid=udata.id AND people.uid='$id1' AND people.cid='$no'";
                        $sql1 = "SELECT * FROM mustclass JOIN udata WHERE mustclass.uid=udata.id AND mustclass.uid='$id1' AND mustclass.cid='$no'";
                        $sql2 = "SELECT * FROM science JOIN udata  WHERE science.uid=udata.id AND science.uid='$id1' AND science.cid='$no'";
                        $sql3 = "SELECT * FROM social JOIN udata  WHERE social.uid=udata.id AND social.uid='$id1' AND social.cid='$no'";
                        $sql4 = "SELECT * FROM core JOIN udata WHERE core.uid=udata.id AND core.uid='$id1' AND core.cid='$no'";
                        $sql5 = "SELECT * FROM choose JOIN udata WHERE choose.uid=udata.id AND choose.uid='$id1' AND choose.cid='$no'";
                        $sqll = "SELECT * FROM people JOIN mdata  WHERE ID='$id' AND cid='$no'";
                        $sqll1 = "SELECT * FROM mustclass JOIN mdata WHERE ID='$id' AND cid='$no'";
                        $sqll2 = "SELECT * FROM science JOIN mdata  WHERE ID='$id' AND cid='$no'";
                        $sqll3 = "SELECT * FROM social JOIN mdata  WHERE ID='$id' AND cid='$no'";
                        $sqll4 = "SELECT * FROM core JOIN mdata WHERE ID='$id' AND cid='$no'";
                        $sqll5 = "SELECT * FROM choose JOIN mdata WHERE ID='$id' AND cid='$no'";
                        $result = mysqli_query($link,$sql);
                        $result1 = mysqli_query($link,$sql1);
                        $result2 = mysqli_query($link,$sql2);
                        $result3 = mysqli_query($link,$sql3);
                        $result4 = mysqli_query($link,$sql4); 
                        $result5 = mysqli_query($link,$sql5); 
                        $resultt = mysqli_query($link,$sqll);
                        $resultt1 = mysqli_query($link,$sqll1);
                        $resultt2 = mysqli_query($link,$sqll2);
                        $resultt3 = mysqli_query($link,$sqll3);
                        $resultt4 = mysqli_query($link,$sqll4); 
                        $resultt5 = mysqli_query($link,$sqll5); 
                        if(isset($_SESSION["login1"])){
                            echo "<br/>";
                            echo "<table border='1'>";
                            echo "<tr>";
                            echo "<td>"."學號"."</td>";
                            echo "<td>"."成績"."</td>";
                            echo "</tr>";
                            while($vote = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($result1)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($result2)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($result3)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                               $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($result4)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($result5)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";        
                            echo "</div>";
                            echo "<div class='contentright'>" ;              
                            
                            echo "<ul class='course'>";        
                                       
                            echo "<li><a href='mclass.php'>返回</a></li>";
                            echo "<li><a href='success.php'>首頁</a></li>";
                            echo "<li><a href='logout.php'>登出</a></li>"; 
                            echo "<li><a href='que.php?no=".$_SESSION["cid"]."'>"."討論區"."</a></li>";
                            echo "<li><a href='who.php?no=".$_SESSION["cid"]."'>"."修課名單"."</a></li>";
                                echo "</ul>";
                             echo "</div>";  
                        echo "</div>";   
                    echo "</div><div class='clear'></div>"; 
                echo "</div>"; 
                         
                        }
                        else if(isset($_SESSION["login"])){
                            echo "<br/>";
                            echo "<table border='1'>";
                            echo "<tr>";
                            echo "<td>"."學號"."</td>";
                            echo "<td>"."小考"."</td>";
                            echo "<td>"."期中考"."</td>";
                            echo "<td>"."期末考"."</td>";
                            echo "<td>"."修改成績"."</td>";
                            echo "</tr>";
                            while($vote = mysqli_fetch_assoc($resultt)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                echo "<td>"."<a href='upgrade.php?no=".$vote['uid']."'>"."修改"."</a>"."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($resultt1)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                echo "<td>".$vote['medium']."</td>";
                                echo "<td>".$vote['final']."</td>";
                                echo "<td>"."<a href='upgrade.php?no=".$vote['uid']."'>"."修改"."</a>"."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($resultt2)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                echo "<td>"."<a href='upgrade.php?no=".$vote['uid']."'>"."修改"."</a>"."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($resultt3)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                echo "<td>"."<a href='upgrade.php?no=".$vote['uid']."'>"."修改"."</a>"."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($resultt4)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                echo "<td>"."<a href='upgrade.php?no=".$vote['uid']."'>"."修改"."</a>"."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                  echo "</tr>";
                            }
                            while($vote = mysqli_fetch_assoc($resultt5)){
                                echo "<tr>";
                                echo "<td>".$vote['uid']."</td>";
                                echo "<td>".$vote['grade']."</td>";
                                echo "<td>"."<a href='upgrade.php?no=".$vote['uid']."'>"."修改"."</a>"."</td>";
                                $_SESSION["cid"]=$vote['cid'];
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";        
                            echo "</div>";
                            echo "<div class='contentright'>" ;              
                                 
                            echo "<ul class='course'>";        
                                     
                            echo "<li><a href='mclass.php'>返回</a></li>";
                            echo "<li><a href='success.php'>首頁</a></li>";
                            echo "<li><a href='logout.php'>登出</a></li>"; 
                            echo "<li><a href='que.php?no=".$_SESSION["cid"]."'>"."討論區"."</a></li>";
                            echo "<li><a href='who.php?no=".$_SESSION["cid"]."'>"."修課名單"."</a></li>";
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
 
</body>
</html>




