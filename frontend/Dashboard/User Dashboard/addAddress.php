<?php
require "../../../backend/login.php";
require "./userAuthentication.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/userAddress.css">

</head>

<body>



    <!----------------------
     Dashboard Header - start 
    ------------------------>
    <?php require "../../dashboardHeader.php"; ?>
    <!---------------------
     Dashboard Header - End 
    ---------------------->



    <!------------------
     Dashboard  - start 
    ------------------->
    <div class="dashboardContainer" id="dashboardContainer">

        <!-------------------------- 
        dashboard left side - start
        --------------------------->
        <?php require "./userLeftSideLinks.php"; ?>
        <!-------------------------- 
        dashboard left side - End
        --------------------------->

        <!-------------------------- 
        dashboard Right side - start
        --------------------------->

        <div class="rightSide">
<!-------------------
Address Popup - start
-------------------->
<div class="addressPopup" id="addressPopup">
        <div class="container">
            <form action="../../../backend/dashboard/userDashboard/addAddressUserDashboard.php" method="POST">
                <div class="formBox" id="firstInfoBox">
                    <h3>Welcome</h3>
                    <input type="text" name="firstName" placeholder="First Name..">
                    <input type="text" name="middleName" placeholder="Mid Name..">
                    <input type="text" name="lastName" placeholder="Last Name..">
                    <div class="redio">
                        Male<input type="radio" value="male" name="gender">
                        Female<input type="radio" value="female" name="gender">
                    </div>

                    <select name="addressType">
                        <option value="shipping">shipping</option>
                        <option value="billing">billing</option>
                    </select>

                    <div class="button"><br>
                        <button type="button" class="buttons" id="buttonNextFirst">Next</button>
                    </div>
                </div>
                <div class="formBox" id="secondInfoBox">
                    <h3>Welcome</h3>
                    <input type="email" name="email" placeholder="Email.." required>
                    <input type="number" name="phone" placeholder="phone..">
                    <input type="text" name="addressLine1" placeholder="Address_Line1..">
                    <input type="text" name="addressLine2" placeholder="Address_Line2..">
                    <div class="button"><br>
                        <button type="button" class="buttons" id="buttonPrevFirst">Prev</button>
                        <button type="button" class="buttons" id="buttonNextsecond">Next</button>
                    </div>
                </div>
                <div class="formBox" id="thirdInfoBox">
                    <h3>Welcome</h3>
                    <input type="number" name="pincode" placeholder="Pincode..">
                    <input type="date" name="dob" placeholder="date of birth..">
                    <input type="text" name="city" placeholder="City..">
                    <input type="text" name="state" placeholder="State..">
                    <input type="text" name="country" placeholder="Country..">
                    <div class="button"><br>
                        <button type="button" class="buttons" id="buttonPrevSecond">Prev</button>
                        <button type="submit" class="buttons" name="submit" id="submitButton">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-------------------
    Address Popup - End
    -------------------->

    </div>
    <!------------------
     Dashboard  - End 
    ------------------->


    <!---------
     Custom Js  
    ----------->
    <script src="./Assets/js/addAddress.js"></script>
    <script src="./Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>