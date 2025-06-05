<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增商品</title>
    <style>
        body {
            background-color: #1f1f1f;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        table {
            margin: auto;
            border-collapse: collapse;
            background-color: #2a2a2a;
        }
        td {
            padding: 10px;
        }
        input[type="text"], input[type="file"] {
            width: 100%;
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
</head>
<body>
    <h1>新增商品</h1><br>

    <form action="add_shop2.php" method="post" enctype="multipart/form-data">
        <table border="1" style="width:400px">
            <tr>
                <td>商品名</td>
                <td><input type="text" name="c_name" required></td>
            </tr>
            <tr>
                <td>圖片</td>
                <td><input type="file" name="img" accept="image/*" required></td>
            </tr>
            <tr>
                <td>賣價</td>
                <td><input type="text" name="money" required></td>
            </tr>
            <tr>
                <td>分類</td>
                <td>
                <select name="category" required>
                    <option value="">-- 請選擇分類 --</option>
                    <option value="clothing">書本</option>
                    <option value="electronics">吊飾</option>
                    <option value="other">其他</option>
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="新增"></td>
            </tr>
        </table>
    </form>
    
<div class="fixed-bottom-button">
  <input type="button" value="回首頁" onclick="location.href='main.php'">
</div>

</body>
</html>
