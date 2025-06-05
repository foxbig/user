<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // 防止 SQL injection
    $stmt = $link->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        // 成功刪除後導回訂單頁面
        header("Location: go.php");
        exit();
    } else {
        echo "刪除失敗：" . $stmt->error;
    }

    $stmt->close();
} else {
    echo "無效的請求";
}
?>