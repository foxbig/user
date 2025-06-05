<?php
include("db.php");
$acc=$_POST["acc"];
$pass=$_POST["pass"];
$name=$_POST["name"];

$sql="INSERT INTO `users`(`id`, `name`, `acc`, `pass`,`type`) VALUES (null,'$name','$acc','$pass','u')";

 $res=mysqli_query($link,$sql);

if($res){
    echo "<script>location.href='index.php'</script>";
}else{
    echo "<script>location.href='index.php'</script>";
}
?>