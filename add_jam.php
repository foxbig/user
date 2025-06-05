<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增巨人</title>
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
    <h1>新增歷代巨人</h1><br>

    <form action="add_jam2.php" method="POST" enctype="multipart/form-data">
        <table border="1" style="width:400px">
          
            <tr>
                <td>巨人使用者名</td>
                <td><input type="text" name="jam_name" required></td>
            </tr>
            <tr>
                <td>圖片</td>
                <td><input type="file" name="img" accept="image/*" required></td>
            </tr>  
            <tr>
                <td>巨人</td>
                <td>
                <select name="jam" required>
                    <option value="">-- 請選擇分類 --</option>
                    <option value="女巨人">女巨人</option>
                    <option value="鎧之巨人">鎧之巨人</option>
                    <option value="車力巨人">車力巨人</option>
                    <option value="顎之巨人">顎之巨人</option>
                    <option value="獸之巨人">獸之巨人</option>
                    <option value="超大型巨人">超大型巨人</option>
                    <option value="戰槌巨人">戰槌巨人</option>
                    <option value="進擊的巨人">進擊的巨人</option>
                    <option value="始祖巨人">始祖巨人</option>
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
