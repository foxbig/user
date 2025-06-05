<?php

include("db.php");

$c_name = $_POST["c_name"];
$money = $_POST["money"];
$id = $_SESSION["id"];
$seller_id = $id;
$category = $_POST["category"];

$image = $_FILES["img"];
$targetDir = "shopimg/";

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if ($image["error"] === UPLOAD_ERR_OK) {
    $tmpName = $image["tmp_name"];
    $fileName = basename($image["name"]);
    $targetFile = $targetDir . $fileName;
    $check = getimagesize($tmpName);

    if ($check !== false) {
        if (move_uploaded_file($tmpName, $targetFile)) {
            // ✅ 寫入資料庫（根據你的實際欄位名調整）
            $sql = "INSERT INTO `commodity`(`c_id`, `img`, `c_name`, `money`, `seller_id`, `category`) VALUES (null, '$fileName', '$c_name', '$money', '$seller_id', '$category')";
            $res = mysqli_query($link, $sql);

            if ($res) {
                echo "<script>alert('商品新增成功')</script>";
            } else {
                echo "<script>alert('資料庫寫入失敗：" . mysqli_error($link) . "')</script>";
            }
            echo "<script>location.href='main.php'</script>";
        } else {
            echo "<script>alert('上傳失敗：無法移動檔案。')</script>";
            echo "<script>location.href='main.php'</script>";
        }
    } else {
        echo "<script>alert('檔案不是圖片。')</script>";
        echo "<script>location.href='main.php'</script>";
    }
} else {
    echo "<script>alert('上傳錯誤，錯誤代碼：" . $image["error"] . "')</script>";
    echo "<script>location.href='main.php'</script>";
}
?>
