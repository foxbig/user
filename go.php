<?php
include("db.php");
$id=$_SESSION['id']
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>賣出紀錄</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #f2f2f2; 
            padding: 20px; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            background: white; 
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
         }
        th, td { 
            padding: 12px; 
            border: 1px solid #ccc; 
            text-align: left; 
        }
        th { background-color: #444; 
            color: white; 
        }
        h1 { 
            text-align: center; 
        }
        .container { 
            max-width: 1000px; 
            margin: auto; 
            background: #fff; 
            padding: 20px; 
            border-radius: 10px; 
        }
        ul { 
            padding-left: 20px; 
        }
        .fixed-bottom-button {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        z-index: 100;
        }
        delete-button input {
            background-color: red;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-button input:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>📦 賣出紀錄</h1>
    <table>
        <tr>
            <th>姓名</th>
            <th>地址</th>
            <th>電話</th>
            <th>商品項目</th>
            <th>總金額</th>
            <th>訂單時間</th>
        </tr>
        <?php
        
        $result = mysqli_query($link, "SELECT * FROM orders WHERE `s_id`='$id' ORDER BY created_at DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            $items = json_decode($row['items'], true);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td><ul>";
            foreach ($items as $item) {
                echo "<li>" . htmlspecialchars($item['name']) . " - NT$" . htmlspecialchars($item['price']) . "</li>";
            }
            echo "</ul></td>";
            echo "<td>NT$" . htmlspecialchars($row['total']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td class='delete-button'>
                <form method='POST' action='delete_order.php' onsubmit=\"return confirm('確定要刪除這筆訂單嗎？');\">
                    <input type='hidden' name='order_id' value='" . intval($row['id']) . "'>
                    <input type='submit' value='刪除'>
                </form>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<div class="fixed-bottom-button">
  <input type="button" value="回首頁" onclick="location.href='main.php'">
   <input type="button" value="回商店" onclick="location.href='shop2.php'">
</div>
</body>
</html>