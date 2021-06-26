<?php

$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
$vnum=$_POST["num"];
$sqldelete="DELETE FROM mvote WHERE vnum='$vnum'";
$result=mysqli_query($link,$sqldelete);

header("Location: delvote.php");




/*mysqli_query($link, 'SET CHARACTER SET utf8');	
$sql = "SELECT * FROM mvote"; 
$result1 = mysqli_query($link,$sql);
echo "<br/>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."投票題目"."</td>";
echo "<td>"."發布日期"."</td>";
echo "</tr>";
while($vote=@mysqli_fetch_assoc($result1)){
	echo "<tr>";
    echo "<td>".$vote['voteissue']."</td>";
  	echo "<td>".$vote['date']."</td>";
  	echo "</tr>";

}*/
//echo "</table>";
mysqli_close($link);


?>
