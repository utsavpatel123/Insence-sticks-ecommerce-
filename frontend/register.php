<?php
require "../backend/login.php";

if(isset($_SESSION['email'])){
    header("location: ./index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!------------
     Google Fonts
     ------------->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <!-----------
    Custom CSS 
    ----------->
    <link rel="stylesheet" href="./Assets/css/register.css">

</head>
<body>
    <!-- --------------------
    Header - start  
    --------------------- -->
    <?php
        require "header.php"
    ?>
    <!-- --------------------
    Header - End  
    --------------------- -->
    
    <!----------------
      Register - start 
    ----------------->  
     <div class="registerSection" id="registerSection">
          <?php if (isset($_REQUEST['registerError'])) { ?>
                   <div class="errorMessage">
                   <?php echo $_REQUEST['registerError']; ?>
               </div>
          <?php } ?>
          

          <?php if (isset($_REQUEST['error'])){ ?>
                <div class="errorMessage">
                <?php echo $_REQUEST['error']; ?>
                </div>
            <?php } ?>
        <div class="container">
            <form action="../backend/register.php" method="post">
                <div class="formBox" id="firstInfoBox">
                    <h3>Welcome</h3>
                    <input type="text" name="firstName" placeholder="FIRST NAME">
                    <input type="text" name="middleName" placeholder="MID NAME">
                    <input type="text" name="lastName" placeholder="LAST NAME">
                    
                    <div class="redio">
                    Male<input type="radio" value="male" name="gender">
                    Female<input type="radio" value="female" name="gender">
                    </div>
                    
                    <div class="button">
                        <button type="button" id="buttonNextFirst" class="buttons">Next</button>
                    </div>
                </div>
                <div class="formBox" id="secondInfoBox"> 
                <h3>Welcome</h3>  
                <input type="email" name="email" placeholder="EMAIL" required>
                <input type="text" name="password" placeholder="PASSWORD">
                <input type="number" name="phone" placeholder="PHONE">
                <input type="text" name="address" placeholder="ADDRESS">
                
                <div class="button">
                    <button type="button" id="buttonPrevFirst" class="buttons">Prev</button>
                    <button type="button" id="buttonNextsecond" class="buttons">Next</button>
                </div>
                </div>
                <div class="formBox" id="thirdInfoBox">
                <h3>Welcome</h3>
                <input type="number" name="pincode" placeholder="PINCODE">
                <input type="text" name="dob" placeholder="DATE OF BIRTH">
                <input type="text" name="city" placeholder="CITY">
                <input type="text" name="state" placeholder="STATE">
                <input type="text" name="country" placeholder="COUNTRY">
                <div class="button">
                    <button type="button" id="buttonPrevSecond" class="buttons">Prev</button>
                    <button type="submit" name="submit" id="submitButton" class="buttons">Submit</button>
                </div>
                </div>
            </form>

        </div>
     </div>
   
    <!----------------
       Register - End 
    ----------------->


    <!----------------
      Footer - start 
    ----------------->
    <?php
        require "footer.php"
    ?>
    <!---------------
      Footer - End 
    ----------------->


    <!---------
     Custom Js  
    ----------->
    <script src="./Assets/js/register.js"></script>
    <script src="./Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>
</html>