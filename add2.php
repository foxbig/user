<?php
include("db.php");

// 取得表單資料
$acc = $_POST["acc"];
$pass = $_POST["pass"];
$name = $_POST["name"];

// 檢查帳號是否已存在
$check_sql = "SELECT * FROM `users` WHERE `acc` = '$acc'";
$check_result = mysqli_query($link, $check_sql);

// 如果帳號已存在
if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('此帳號已被使用，請使用其他帳號'); location.href='index.php';</script>";
    exit();
}

// 如果帳號尚未存在，插入新使用者
$insert_sql = "INSERT INTO `users`(`id`, `name`, `acc`, `pass`, `type`) 
               VALUES (NULL, '$name', '$acc', '$pass', 'u')";
$res = mysqli_query($link, $insert_sql);

if ($res) {
    echo "<script>alert('新增帳號成功'); location.href='index.php';</script>";
} else {
    echo "<script>alert('新增失敗，請稍後再試'); location.href='index.php';</script>";
}
?>
