<?php
include "conn.php";
$email = $_GET['id'];
/*if(!isset($email)){
    header('location: signup.php');
}
if(isset($_POST['resend'])){
    $token = rand(111111,999999);
    $sql = $conn->query("UPDATE `menbers` SET `token`='$token' WHERE `email`= $email");
    if($sql){
    header("location: email.php?id='$email'");
    }

}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9ja Wives-Reign</title>
    <style>
        body{
            display: flex;
            justify-content: center;
           align-items: flex-end;
           padding: 200px 0;
        }
        .input-div{
   width: 100%;

}
input{
    display: block;
    background-color: none;
    border: none;
    border-bottom: 2px solid rgba(224, 160, 20, 0.6);
    border-radius: 10px;
    width: 95%;
    padding: 10px;
    margin: 10px 0;

}


input:hover,
input:active,
input:focus{
    outline: none;
    border-bottom: 3px solid rgb(212, 182, 10);
    
}
.container{
    text-align: center;
    width: 100%;
    border: 2px solid gold;
    padding: 20px;
}
button{
    border: 0;
    color: gold;
    cursor: pointer;
    background: none;

}
@media (min-width: 40rem) {
    .container{
    text-align: center;
    width: 400px;
}
    
}
    </style>
</head>

<body>
   <div class="container">
        <form action="check.php" method="post" id="myForm">
            <div class="input-div">
                <p>We sent you a verification code. Please check you email and copy code to verify account.</p>
                <label for="name">Enter code</label>
                <input type="number" name="token" required id="myInput">
                <input type="hidden" name="email" value="<?=$email;?>">
            </div>
        </form>
        <form action="" method="post">
            <div class="" style="text-align: right;">
                <button type="submit" name="resend">Resend</button>
            </div>
        </form>
   </div>
    
</body>
</html>
<script>
    const form = document.querySelector('#myForm');
const input = document.querySelector('#myInput');

input.addEventListener('input', function() {
  if (input.value.length >= 6) {
    form.submit();
  }
});

</script>