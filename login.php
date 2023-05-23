<?php
session_start();
include 'conn.php';
$msg = '';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = $conn->prepare("SELECT * FROM `menbers` WHERE `email` = ? and password = ?");
    $sql->bind_param('ss',$email,$password);
    $sql->execute();
    $result = $sql->get_result();
    if ($result -> num_rows > 0){ 
        while ($row = $result -> fetch_assoc()){
            if( $row['status'] === 0){
                $msg = '<div style="background-color: red; padding: 15px; color: white; width: 300px">
                your account is not approved yet pls wait for an email comfirmation!
              </div>';

            }else{
             
              if($conn->query("UPDATE `menbers` SET `active_status`='1' WHERE `email` = '$email' ")==true){
                $_SESSION['id'] = $row['8_digit'];
                echo"<script>
                    window.alert('welcome!');
                    </script>";
                
                
                
            }else{
              $msg = ' <div style="background-color: red; padding: 15px; color: white; width: 300px">
                        sorry error occured!<br>pls  try again 
                    </div>';

            }
          }
    }
}else{
    $msg = ' <div style="background-color: red; padding: 15px; color: white; width: 300px">
                Wrong Details!<br>pls check and try again
            </div>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9ja Wives-Reign / Login</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="logo-div">
            <img src="./images/logo.png" alt="LOGO" >
        </div>
        <div class="form-div">
            <?=$msg;?>
            <form action="" method="post">
                
                <div class="input-div">
                    <label for="name">Enter Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-div">
                    <label for="name">Enter Password</label>
                    <input type="password" name="password" >
                </div>
               
                <div class="input-div">
                    <input type="checkbox" name="" id=""  class="checkbox" required> 
                    <label for="">keep me logged in</label>
                </div>
                <div class="btn-div">
                    <button class="btn white_btn" type="submit" name="login">Login</button>

                </div>
               
                <p>I don't have an account | <a href="signup.html">Signup</a></p>
                

            </form>
        </div>

    </div>
</body>
</html>