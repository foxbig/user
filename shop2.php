<?php
include("db.php");

$type = $_SESSION['type'];
$s_id = $_SESSION['id'];  // 買家ID

// 初始化購物車
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 加入購物車
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item = [
        'name' => $_POST['name'],
        'price' => (int)$_POST['price'],
        'seller_id' => $_POST['seller_id']  // 加入賣家ID
    ];
    $_SESSION['cart'][] = $item;
    header("Location: shop2.php");
    exit;
}

// 清空購物車
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header("Location: shop2.php");
    exit;
}

// 結帳
if (isset($_POST['checkout'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total = 0;

    // 按賣家ID分組
    $orders_by_seller = [];
    foreach ($_SESSION['cart'] as $item) {
        $orders_by_seller[$item['seller_id']][] = $item;
        $total += $item['price'];
    }

    // 為每個賣家生成一個訂單
    foreach ($orders_by_seller as $seller_id => $items) {
        $items_json = json_encode($items);
        $order_total = array_sum(array_column($items, 'price'));

        // 插入訂單資料，包括buyer_id
        $stmt = $link->prepare("INSERT INTO `orders` (`name`, `address`, `phone`, `items`, `total`, `created_at`, `s_id`, `buyer_id`) VALUES (?, ?, ?, ?, ?, NOW(), ?, ?)");
        $stmt->bind_param("ssssiii", $name, $address, $phone, $items_json, $order_total, $seller_id, $s_id);  // buyer_id 改為 $s_id
        $stmt->execute();
        $stmt->close();
    }

    // 清空購物車
    $_SESSION['cart'] = [];
    $success = "訂單已送出！感謝您的購買！";
}
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>巨人購物網站</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }

        /* Header */
        header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 2rem;
        }

        nav {
            background-color: #495057;
            text-align: center;
            padding: 15px;
        }

        nav a {
            color: white;
            margin: 0 20px;
            text-decoration: none;
            font-size: 1.1rem;
        }

        nav a:hover {
            color: #ffb74d;
            transition: color 0.3s;
        }

        /* Filter & Category */
        .category-filter {
            margin: 20px auto;
            text-align: center;
        }

        .category-filter label {
            font-size: 1.2rem;
            color: #333;
        }

        select {
            padding: 10px;
            font-size: 1rem;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        /* Product Container */
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .product {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            padding: 15px;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product h3 {
            margin: 15px 0;
            font-size: 1.3rem;
            color: #222;
        }

        .product p {
            font-size: 1.1rem;
            font-weight: bold;
            color: #e91e63;
        }

        .product button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product button:hover {
            background-color: #218838;
        }

        /* Cart Section */
        .cart {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }

        .cart h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 15px;
        }

        .cart ul {
            list-style-type: none;
            padding: 0;
        }

        .cart li {
            font-size: 1.2rem;
            margin: 10px 0;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .cart p {
            font-size: 1.4rem;
            font-weight: bold;
            margin-top: 20px;
        }

        .cart button {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cart button:hover {
            background-color: #c82333;
        }

        /* Checkout Section */
        .checkout {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px auto;
            max-width: 600px;
        }

        .checkout h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .checkout input {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .checkout button {
            width: 100%;
            padding: 12px;
            font-size: 1.2rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout button:hover {
            background-color: #0056b3;
        }

        /* Success Message */
        .message {
            font-size: 1.3rem;
            color: #28a745;
            text-align: center;
            margin-bottom: 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .category-filter {
                margin: 20px 10px;
            }

            .container {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<header><h1>巨人購物網站</h1></header>

<nav>
    <a href="main.php">首頁</a>
    <a href="buy.php">購買紀錄</a>
    <?php if ($_SESSION["type"] != "u"): ?>
    <a href="go.php">賣出紀錄</a>
    <a href="del_com.php">修改/刪除商品</a>
    <?php endif; ?>
</nav>

<div class="category-filter">
    <label>選擇分類：</label>
    <select id="categorySelect" onchange="filterProducts()">
        <option value="all">全部</option>
        <option value="clothing">書本</option>
        <option value="electronics">吊飾</option>
        <option value="other">其他</option>
    </select>
</div>

<section class="container" id="productList">
<?php
$result = mysqli_query($link, "SELECT * FROM commodity WHERE `seller_id` != '$s_id'");
while ($row = mysqli_fetch_assoc($result)) {
    echo '
    <div class="product" data-category="' . htmlspecialchars($row['category']) . '">
        <img src="shopimg/' . htmlspecialchars($row['img']) . '" alt="' . htmlspecialchars($row['c_name']) . '">
        <h3>' . htmlspecialchars($row['c_name']) . '</h3>
        <p>NT$' . htmlspecialchars($row['money']) . '</p>
        <form method="post">
            <input type="hidden" name="name" value="' . htmlspecialchars($row['c_name']) . '">
            <input type="hidden" name="price" value="' . htmlspecialchars($row['money']) . '">
            <input type="hidden" name="seller_id" value="' . htmlspecialchars($row['seller_id']) . '">
            <button type="submit" name="add_to_cart">加入購物車</button>
        </form>
    </div>';
}
?>
</section>

<section class="cart">
    <h2>🛒 購物車</h2>
    <ul>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            echo '<li>' . htmlspecialchars($item['name']) . ' - NT$' . $item['price'] . '</li>';
            $total += $item['price'];
        }
        ?>
    </ul>
    <p>總金額：NT$<?= $total ?></p>
    <form method="post">
        <button type="submit" name="clear_cart" class="btn-danger">清空購物車</button>
    </form>
</section>

<section class="checkout">
    <h2>結帳</h2>
    <?php if (!empty($success)) echo '<div class="message">' . $success . '</div>'; ?>
    <form method="post">
        <div class="form-group">
            <input type="text" name="name" placeholder="姓名" required>
            <input type="text" name="address" placeholder="地址" required>
            <input type="text" name="phone" placeholder="電話" required>
        </div>
        <input type="hidden" name="checkout" value="1">
        <div class="form-group">
            <button type="submit">確認結帳</button>
        </div>
    </form>
</section>

<footer><p>&copy; 多買沒優惠</p></footer>

<script>
function filterProducts() {
    const category = document.getElementById("categorySelect").value;
    const products = document.querySelectorAll(".product");
    products.forEach(p => {
        if (category === "all" || p.dataset.category === category) {
            p.style.display = "block";
        } else {
            p.style.display = "none";
        }
    });
}
</script>

</body>
</html>
