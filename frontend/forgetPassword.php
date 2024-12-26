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
      Login - start 
    ----------------->


    

    <div class="forgetPasswordContainer">
    <?php if (isset($_REQUEST['otpMsg'])) { ?>
                    <div class="errorMessage">
                       <?php echo $_REQUEST['otpMsg']; ?>
                        </div>
                    <?php } ?>
    <?php if (isset($_REQUEST['emptyEmail'])) { ?>
                    <div class="errorMessage">
                       <?php echo $_REQUEST['emptyEmail']; ?>
                        </div>
                    <?php } ?>
    <?php if (isset($_REQUEST['wrongEmailMsg'])) { ?>
                    <div class="errorMessage">
                       <?php echo $_REQUEST['wrongEmailMsg']; ?>
                        </div>
                    <?php } ?>

        <div class="container">
            <form action="../backend/generateOtp.php" method="POST">
            <h3>Forget Password</h3> 
            <div class="byEmail">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="byPhoneNumber">
                <input type="number" name="number" placeholder="Phone Number">
            </div>
            <div class="generateOtp">    
                <button id="btn" type="button" class="buttons">BY NUMBER</button>
                <button type="submit" class="buttons">GENERATE OTP</button>
            </div>
        </form>
        </div>

    </div>
    <!----------------
       Login - End 
    ----------------->

</div>



    <!---------
     Custom Js  
    ----------->
    <script src="./Assets/js/forgetPassword.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>
</html>