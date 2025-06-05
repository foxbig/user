<?php
include("db.php");

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "購物車為空，無法結帳。";
    exit;
}

$buyer_id = $_SESSION['id'];  // 獲取當前登入用戶的買家ID
$total = 0;

// 將購物車中的商品按賣家分組
$orders_by_seller = [];
foreach ($_SESSION['cart'] as $item) {
    $orders_by_seller[$item['seller_id']][] = $item;  // 使用賣家ID來分組
    $total += $item['price'];
}

// 儲存每個賣家的訂單
foreach ($orders_by_seller as $seller_id => $items) {
    // 將商品資料轉換為JSON格式儲存
    $items_json = json_encode($items);
    $order_total = array_sum(array_column($items, 'price'));

    // 插入訂單資料
    $stmt = $link->prepare("INSERT INTO `orders` (`name`, `address`, `phone`, `items`, `total`, `created_at`, `s_id`, `buyer_id`) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)");
    $stmt->bind_param("ssssiii", $name, $address, $phone, $items_json, $order_total, $seller_id, $buyer_id);
    $stmt->execute();
    $stmt->close();
}

// 清空購物車
unset($_SESSION['cart']);

echo "<h2>結帳成功！</h2>";
echo "<p>感謝您的購買，總金額：NT$$total</p>";
?>

<a href="shop2.php">返回商店</a>