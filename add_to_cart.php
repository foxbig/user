<?php
include("db.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = (float) $_POST['price'];
    $buyer_id = $_SESSION['id'];  // 假設 $_SESSION['id'] 儲存的是買家的 ID
    
    // 將商品資料連同買家 ID 一起加入購物車
    $_SESSION['cart'][] = [
        'name' => $name,
        'price' => $price,
        'buyer_id' => $buyer_id  // 新增 buyer_id
    ];
}

header("Location: shop2.php");
exit;
?>
