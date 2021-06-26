<?php
session_start();
$vnum=$_SESSION["v"];
echo $vnum;
$voteissue=$_POST["voteissue"];
$opt1=$_POST["opt1"];
$opt2=$_POST["opt2"];
$link=mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");
mysqli_query($link, 'SET CHARACTER SET utf8');	

$SQLUpdate="UPDATE mvote SET voteissue='$voteissue' WHERE vnum='$vnum'";
$s="SELECT onum FROM voteoption WHERE vnum='$vnum' LIMIT 1";
$sq="SELECT onum FROM voteoption WHERE vnum='$vnum' ORDER BY onum DESC LIMIT 1";
$a=@mysqli_query($link,$s);
$b=@mysqli_query($link,$sq);
$vote = mysqli_fetch_assoc($a);
$vote1 = mysqli_fetch_assoc($b);
$c=$vote["onum"];
$d=$vote1["onum"];
$sql="UPDATE voteoption SET content='$opt1' WHERE vnum='$vnum' AND onum='$c' ";
$sql1="UPDATE voteoption SET content='$opt2' WHERE vnum='$vnum' AND onum='$d'";
if($result=@mysqli_query($link,$SQLUpdate)){
	if($result1=@mysqli_query($link,$sql)){ 
		if($result2=@mysqli_query($link,$sql1)){
	echo "修改成功";
	header("Location: mvote.php");
}
}
}
else{
	echo "失敗";
	echo "<a href='success.php'>首頁</a>"."<br/>";
}
@mysqli_close($link);

?>
