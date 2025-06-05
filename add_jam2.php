<?php
include("db.php");

$jam_name=$_POST["jam_name"];
$jam=$_POST["jam"];

$image = $_FILES["img"];
$targetDir = "巨人/";

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
        $sql="INSERT INTO `jam`(`jam_id`, `jam_name`,`jam`,`jam_img`) VALUES (null,'$jam_name','$jam','$fileName')";            
        $res = mysqli_query($link, $sql);

            if ($res) {
                echo "<script>alert('歷代巨人新增成功')</script>";
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