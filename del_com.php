<?php
include("db.php");


$seller_id = $_SESSION['id'];

// 刪除商品
if (isset($_GET['delete'])) {
    $c_id = (int)$_GET['delete'];

    // 查詢圖片檔名
    $stmt = $link->prepare("SELECT img FROM commodity WHERE c_id = ? AND seller_id = ?");
    $stmt->bind_param("ii", $c_id, $seller_id);
    $stmt->execute();
    $stmt->bind_result($img_filename);
    $stmt->fetch();
    $stmt->close();

    // 刪除圖片檔案
    if (!empty($img_filename)) {
        $image_path = "shopimg/" . $img_filename;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    // 刪除資料庫紀錄
    $stmt = $link->prepare("DELETE FROM commodity WHERE c_id = ? AND seller_id = ?");
    $stmt->bind_param("ii", $c_id, $seller_id);
    $stmt->execute();
    $stmt->close();

    header("Location: del_com.php");
    exit;
}

// 修改商品
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $c_id = (int)$_POST['c_id'];
    $name = $_POST['name'];
    $money = (int)$_POST['money'];
    $category = $_POST['category'];

    $stmt = $link->prepare("UPDATE commodity SET c_name = ?, money = ?, category = ? WHERE c_id = ? AND seller_id = ?");
    $stmt->bind_param("sisii", $name, $money, $category, $c_id, $seller_id);
    $stmt->execute();
    $stmt->close();
    $success = "商品已更新！";
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>修改/刪除商品</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2f2f2;
            padding: 2rem;
            margin: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 2rem;
        }
        .product-list {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .product {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 1.5rem 0;
        }
        .product:last-child {
            border-bottom: none;
        }
        .product img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 2rem;
        }
        form {
            flex: 1;
        }
        input, select, button {
            padding: 0.5rem;    /* 內邊距（上下左右）為 0.5rem */
            margin: 0.4rem 0;   /* 垂直外邊距 0.4rem，左右為 0 */
            width: 100%;        /* 寬度佔滿可用空間 */
            max-width: 350px;   /* 最大寬度限制為 350px，避免太寬 */
            font-size: 1rem;    /* 字體大小為 1rem（通常是 16px） */
        }
        .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 0.5rem;
            width: 150px;
        }
        .btn-primary {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            width: 150px;
        }
        .message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
        .form-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
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
<h2>修改 / 刪除商品</h2>

<?php if (!empty($success)) echo '<p class="message">' . $success . '</p>'; ?>

<div class="product-list">
<?php
$result = $link->query("SELECT * FROM commodity WHERE seller_id = $seller_id");
while ($row = $result->fetch_assoc()) {
    echo '
    <div class="product">
        <img src="shopimg/' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['c_name']) . '">
        <form method="post">
            <input type="hidden" name="c_id" value="' . $row['c_id'] . '">
            商品名稱：<br><input type="text" name="name" value="' . htmlspecialchars($row['c_name']) . '" required><br>
            價格：<br><input type="number" name="money" value="' . $row['money'] . '" required><br>
            分類：<br>
            <select name="category">
                <option value="clothing" '.($row['category']=='clothing'?'selected':'').'>書本</option>
                <option value="electronics" '.($row['category']=='electronics'?'selected':'').'>吊飾</option>
                <option value="other" '.($row['category']=='other'?'selected':'').'>其他</option>
            </select><br>
            <div class="form-buttons">
                <button type="submit" name="update" class="btn-primary">更新商品</button>
                <a href="?delete=' . $row['c_id'] . '" class="btn-danger" onclick="return confirm(\'確定要刪除這項商品嗎？\')">刪除商品</a>
            </div>
        </form>
    </div>';
}
?>
</div>
<div class="fixed-bottom-button">
    <table border="0">
        <tr>
  <td><input type="button" value="回首頁" onclick="location.href='main.php'"></td>
   <td><input type="button" value="回商店" onclick="location.href='shop2.php'"></td>
</tr>
</table>
</div>
</body>
</html>
