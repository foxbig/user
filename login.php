<?php
include("db.php");
$acc=$_POST["acc"];
$pass=$_POST["pass"];

$sql="SELECT * FROM `users` WHERE `acc` = '$acc'";

$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0){
    $sql="SELECT * FROM `users` WHERE `acc` = '$acc' and `pass` = '$pass'";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $_SESSION['id']=$row['id'];
            $_SESSION['acc']=$row['acc'];
            $_SESSION['name']=$row['name'];
            $_SESSION['type']=$row['type'];
                 header("location:main.php"); 
            
        }
        }else{
         header("location:index.php"); 
    }
    }else{
         header("location:index.php"); 
    }



?>