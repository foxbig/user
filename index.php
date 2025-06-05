<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("db.php")?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>動漫登入</title>
</head>
<style>
        body{
            background-image: url("前端照片/調查兵團2.jpg");
            background-size: contain;
            background-repeat: no-repeat;/* 不重複背景圖 */
            background-attachment: fixed;/* 背景圖片固定 */
            background-position: center;/* 圖片居中 */
            background-size: cover; /* 背景圖片覆蓋整個頁面 */
            
        }
        .tab{
            background-color: whitesmoke;
            width: 300px;
            height: 100px;
        }
   </style>
<body align="center">
    <h1><font color="black">登入</font></h1>
    <br>
    <br>
    <br>
    <br>
    <form action="login.php" method="post">
        
    <table align="center" border="1" class="tab">
<tr>
    <td><font color="red">帳號</font></td>
    <td><input type="text" name="acc" required></td>
    
</tr>    
<tr>
    <td><font color="red">密碼</font></td>
    <td><input type="password" name="pass" required></td>
    
</tr> 
<tr>
    <td><input type="button" value="註冊" style="background-color:#23f207;" onclick=location.href="add.php"></td>
    <td><input type="submit" value="登入"></td>
    
</tr>
</table>
</form>
</body>
</html>