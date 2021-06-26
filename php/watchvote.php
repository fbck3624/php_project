<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <!-- 引入 echarts.js -->
    <script src="echarts.min.js"></script>
	<link rel="stylesheet" href="all.css">

</head>
<body background="https://i2.wp.com/www.nustm.org/wp-content/uploads/2017/06/background-image-html.jpg?fit=1920%2C1200">
 <div class="wrap">
        <div class="header">
            <a href="https://www.im.nuk.edu.tw/"><img class="logo" src="https://upload.cc/i1/2019/05/23/aReJ63.png" alt=""></a>
            <div class="headerlist">
                <ul>
                    <li><a href="logout.php">登出</a></li>
                    <li><a href="success.php">回首頁</a></li>
                </ul>
            </div>

        </div><div class="clear"></div>

    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 600px;height:400px;background-color: #FFFFFF;"></div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
<?php
session_start();
$vnum=$_POST["num"];
$link=@mysqli_connect("localhost","root","imdb201907") or die ("無法開啟Mysql資料庫連結"); 
mysqli_select_db($link, "class");

$sql = "SELECT * FROM mvote where vnum='$vnum'"; 

mysqli_query($link, 'SET CHARACTER SET utf8');	
mysqli_query($link,  "SET collation_connection = 'utf8_general_ci'");
$result = mysqli_query($link,$sql); 
$sql1 = "SELECT * FROM uvote WHERE vnum='$num'"; 
$result1=mysqli_query($link,$sql1);
$s="SELECT onum FROM voteoption WHERE vnum='$vnum' LIMIT 1";
$sq="SELECT onum FROM voteoption WHERE vnum='$vnum' ORDER BY onum DESC LIMIT 1";
$a=@mysqli_query($link,$s);
$b=@mysqli_query($link,$sq);
$vote = mysqli_fetch_assoc($a);
$vote1 = mysqli_fetch_assoc($b);
$c=$vote["onum"];
$d=$vote1["onum"];
$l="SELECT COUNT(uvote.unum) AS C,voteoption.content FROM uvote JOIN voteoption WHERE voteoption.onum=uvote.onum AND voteoption.vnum='$vnum' AND voteoption.onum='$c' ";
$ll="SELECT COUNT(uvote.unum) AS D,voteoption.content FROM uvote JOIN voteoption WHERE voteoption.onum=uvote.onum AND voteoption.vnum='$vnum' AND voteoption.onum='$d' ";
$r = mysqli_query($link,$l); 
$rr = mysqli_query($link,$ll); 
$v = mysqli_fetch_assoc($r);

$vv = mysqli_fetch_assoc($rr);
while($vote = mysqli_fetch_assoc($result)){
	$_SESSION["e"]=$vote["voteissue"];
	/*echo $_SESSION["e"];
echo "<br/>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>"."選項"."</td>";
echo "<td>"."票數"."</td>";
echo "</tr>";
echo "<tr>";*/
$_SESSION["a"]=$v["content"];
$_SESSION["b"]=$v["C"];
/*echo "<td>".$_SESSION["a"]."</td>";
echo "<td>".$_SESSION["b"]."</td>";
echo "</tr>";
echo "<tr>";*/
$_SESSION["c"]=$vv["content"];
$_SESSION["d"]=$vv["D"];
/*echo "<td>".$_SESSION["c"]."</td>";
echo "<td>".$_SESSION["d"]."</td>";
echo "</tr>";*/


}
//echo "</table>";

mysqli_close($link);



?>
        var option = {
            title: {
                text: '<?php session_start(); echo $_SESSION["e"]; ?>'
            },
            tooltip: {},
           /* legend: {
                data:['票數']
            },*/
            xAxis: {
                data: ['<?php session_start(); echo $_SESSION["a"]; ?>','<?php session_start(); echo $_SESSION["c"]; ?>']
            },
            yAxis: {},
            series: [{
               // name: '票數',
                type: 'bar',
                data: [<?php session_start(); echo $_SESSION["b"]; ?>, <?php session_start(); echo $_SESSION["d"]; ?>]
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
<style>
#main{
margin: 100px auto;
}

</style>
  </body>
</html>
