<?php
include("db.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = (float) $_POST['price'];
    $_SESSION['cart'][] = ['name' => $name, 'price' => $price];
}

header("Location:shop2.php");
exit;
?>
