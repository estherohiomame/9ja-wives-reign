<?php
include "conn.php";

if(isset($_POST['submit'])){
    $digit = rand(11111111,99999999);
    $token = rand(111111,999999);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];
    $marital_status = $_POST['marital_status'];

    $sql = $conn->prepare("INSERT INTO menbers(name,email,password,marital_status,token,phone,8_digit) VALUES (?,?,?,?,?,?,?)");
    $sql->bind_param('sssssss',$name,$email,$password,$marital_status,$token,$phone,$digit);

   
    if($sql->execute()){
        header("location: email.php?id='$email'");
    }else{
        $check = $conn->query("SELECT * FROM menbers WHERE email = '$email'");
       
        if($check->num_rows > 0){
            $msg = "<div style='background-color: rgb(247, 13, 13,0.5); padding: 10px; margin-bottom: 10px;'>
                Can't use email : Already used my another user
            </div>";
        }else{
            $msg = "<div style='background-color: rgb(247, 13, 13,0.5); padding: 10px; margin-bottom: 10px;'>
            Error occured : Pls try again
        </div>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9ja Wives-Reignsignup</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body >
    <div class="container">
        <div class="logo-div">
            <img src="./images/logo.png" alt="LOGO" >
        </div>
        <div class="form-div">
           <?=$msg;?>
            <form action="" method="post">
                <div class="input-div">
                    <label for="name">Enter Full Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="input-div">
                    <label for="name">Enter Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-div">
                    <label for="name">Enter Password</label>
                    <input type="password" name="password">
                </div>
                <div class="input-div">
                    <label for="name">Enter Phone Number</label>
                    <input type="tel" name="phone">
                </div>
                <div class="input-div">
                    <label for="name">Enter Home Country</label>
                    <input type="text" name="home" required>
                </div>
                <div class="input-div">
                    <label for="marital_status">Marrital Status</label>
                    <select name="marital_status" id="">
                        <option value="single">Single</option>
                        <option value="engaged">Engaged</option>
                        <option value="married">Married</option>
                    </select>
                </div>
                <div class="input-div">
                    <input type="checkbox" name="" id=""  class="checkbox" required> 
                    <label for="">I accept all the terms and condition</label>
                </div>
                <div class="btn-div">
                    <button class="btn white_btn" type="submit" name="submit">Signup</button>

                </div>
               
                <p>Already have an account | <a href="login.html">login</a></p>
                

            </form>
        </div>

    </div>
</body>
</html>