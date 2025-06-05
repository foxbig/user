<?php
include("db.php");

$id = $_SESSION["id"];
$name = $_SESSION["name"];
$acc = $_SESSION["acc"];
$type = $_SESSION["type"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  body{
       background-color: #1f1f1f;
       color: #fff;
       font-family: 'Arial', sans-serif;
       margin: 0;
       padding: 0;
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
<body>
  <table align="center">
    <tr>
      <td>名稱:</td>
      <td><?php echo$name; ?></td>
    </tr>
    <tr>
      <td>帳號:</td>
      <td><?php echo$acc;?></td>
    </tr>
    <tr>
      <td>權限稱號:</td>
      <td>
        <?php
       if($type=='a'){
        echo"管理員";
       }elseif($type=='p'){
        echo"賣家會員";
       }else{
        echo"普通會員";
       }
       ?>
      </td>
    </tr>
  </table>
<?php
    $sql="SELECT commodity.seller_id users.type FROM commodity left join users on commodity.seller_id = users.id";
    $res=mysqli_query($link,$sql);
    
    

?>

     
<div class="fixed-bottom-button">
  <input type="button" value="回首頁" onclick="location.href='main.php'">
</div>
</body>
</html>