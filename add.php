<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"?>                                                                                                
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  body{
       background-color: #1f1f1f;
       color: #fff;
       font-family: 'Arial', sans-serif;
       margin: 0;
       padding: 0;
  }
  .fixed-bottom-button {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        z-index: 100;
        }
</style>
<body align="center">
    <h1>新增帳號</h1><br>

    <table align="center">
    <form action="add2.php" method="POST">
    <td>  
    <table border="1" style="width:300px" >
      
    <tr>
        <td>帳號</td>
        <td><input type="text" name="acc" required></td>
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="text" name="pass" required></td>
    </tr>
    <tr>
        <td>姓名</td>
        <td><input type="text" name="name" required></td>
    </tr>
    <td></td>
    <td><input type="submit" value="新增"></td>
    </table>
</td>  
    </form>
   <div class="fixed-bottom-button">
  <input type="button" value="回首頁" onclick="location.href='index.php'">
</div>
</body>
</html>