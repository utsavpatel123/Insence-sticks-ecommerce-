<?php
require "../backend/generateOtp.php";

if(!isset($_SESSION['varify'])){
  header("location: ./forgetPassword.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <!------------
     Google Fonts
     ------------->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/forgetPassword.css">
</head>
<body>


<div class="forgetPassword" id="forgetPassword">

    <!----------------
      otp - start 
    ----------------->

    <div class="forgetPasswordContainer">
        <div class="container">
            <form action="../backend/generateOtp.php" method="POST">
            <h3>Enter Yout Otp</h3>     
            <input type="number" name="inputOtp" class="<?php if(isset($_REQUEST['wrongOtp'])){ echo 'otpError'; } else { echo ''; } ?>"  placeholder="OTP">  
            <div class="generateOtp">    
                <button id="btn" type="submit" name="submit" class="buttons">SUBMIT</button>
                <button type="submit" class="buttons" name="reGenerateOtp">RE-GENERATE OTP</button>
            </div>
        </form>
        </div>

    </div>
    <!----------------
       otp - End 
    ----------------->

</div>



    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>
</html>