<?php
include "conn.php";
$email = $_GET['id'];
if(!isset($email)){
    header('location: signup.php');
}

$result = $conn->query("SELECT * FROM `menbers` WHERE `email` = $email");
$user = $result->fetch_assoc();

$name = $user['name'];
$email = $user['email'];
$token = $user['token'];


$body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="" style="text-align: center; border: 2px solid rgb(212, 182, 10); width: auto; padding: 20px; border-radius: 10px; background-color: rgba(255, 210, 8, 0.4);;">
        <div style="display: flex; justify-content: center; align-items: center; width: 100%; flex-direction: column;">
            <img src="./images/logo.png" alt="LOGO" width="345px" >
        </div>
        <div class="" style="text-align: left;">
            <h3>Hello <span>'.$name.'</span></h3>

        </div>
        
        <p>You have created an account on 9ja Wives-Reign you need to verify account</p>
        <h4>copy code to verify</h4>
        <h3 style="color: rgb(212, 182, 10);"><u>'.$token.'</u></h3>
       
        

    </div>
</body>
</html>';

$semail ='ezugwuemmanuel65@gmail.com';
$emailSubject = '9ja Wives-Reign';
$mailto = $email;
$headers = "From: $semail\r\n"; 
$headers .= "Content-type: text/html\r\n"; 
$success = mail($mailto, $emailSubject, $body, $headers);
     if($success){
      header("location: verify.php?id='$email'");
     }else{
         header('location: signup.php');
         
     }

   