<?php
include "conn.php";
$token = $_POST["token"];
$email = $_POST['email'];

$sql = $conn->prepare("SELECT * FROM `menbers` WHERE `token` = ? ");
$sql->bind_param('s',$token);
$sql->execute();
$result = $sql->get_result();
if($result->num_rows > 0){
   /* $row = $result -> fetch_assoc();
    if($row['email'] === $email){*/
        if($conn->query("UPDATE `menbers` SET `status`='1' WHERE `email` = '$email' ")==true){
        header("location: login.php");
    }

    /*}else{
        header("location: signup.php");
    }*/
   
}else{
    
    header("location: verify.php?id='$email'");
}