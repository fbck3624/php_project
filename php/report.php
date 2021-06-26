<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>回報問題</title>
    <link rel="stylesheet" href="report.css">
    
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
        </div>
        <div class="clear"></div>
        
        <div class="enterfield">
        <div class="reporttop">
        <form action="uproblem.php" method="post">
            <p>問 題 類 型 :</p>
            <select name="name1">
                    <option value="系統">系統</option>
                    <option value="學分">學分</option>
                    <option value="修課名單">修課名單</option>
            </select>
        </div>
        <div class="reportbot">
            <p>問 題 內 容 :</p>
            <textarea style="width:99%;height:150px;font-size:20px;font-family:cursive;" Cols="53" rows="10" name="name2"></textarea><br/>
            <input class="button" type="submit" value="送 出" style="cursor: pointer"><br/>
        </div>
    </form>
</div>
    
</div> 
</body>
</html>
    

