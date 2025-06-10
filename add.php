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
        /* 設定元素為固定定位，這樣元素相對於視口固定，滾動頁面時不會移動 */
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        /* 將元素沿X軸（水平）移動50%的距離，通常用來水平居中元素 */
        text-align: center;
        z-index: 100;
        /* 設定元素的層疊順序為 100，數值越大，元素會顯示在其他元素的上層 */
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