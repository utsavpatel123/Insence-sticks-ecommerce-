<?php
require "../backend/generateOtp.php";

if (!isset($_SESSION['varify'])) {
    header("location: ./forgetPassword.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    </head>

    <body>

        <div class="forgetPassword" id="forgetPassword">
            <div class="forgetPasswordContainer">

                <?php if (isset($_REQUEST['passwordError'])) { ?>
                    <div class="errorMessage">
                        <?php echo $_REQUEST['passwordError']; ?>
                    </div>
                <?php } ?>
                <?php if (isset($_REQUEST['eupdateErrormpty'])) { ?>
                    <div class="errorMessage">
                        <?php echo $_REQUEST['updateError']; ?>
                    </div>
                <?php } ?>
                <?php if (isset($_REQUEST['redirectError'])) { ?>
                    <div class="errorMessage">
                        <?php echo $_REQUEST['redirectError']; ?>
                    </div>
                <?php } ?>
                <?php if (isset($_REQUEST['emptyError'])) { ?>
                    <div class="errorMessage">
                        <?php echo $_REQUEST['emptyError']; ?>
                    </div>
                <?php } ?>
                <div class="container">
                    <form action="../backend/generateOtp.php" method="post">
                        <h3>Enter Paasword</h3>
                        <input type="password" name="newPassword" placeholder="New password">
                        <input type="password" name="conformpassword" placeholder="Conform password"><br>
                        <button type="submit" class="buttons">Submit</button>
                    </form>
                </div>
            </div>

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