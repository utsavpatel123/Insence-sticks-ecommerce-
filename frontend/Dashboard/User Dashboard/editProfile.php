<?php

require "../../../backend/connection.php";
require "../../../backend/login.php";
require "./userAuthentication.php";


if (isset($_SESSION['email'])) {

      $email = $_SESSION['email'];
      $password = $_SESSION['password'];
    $selectUsersData = "SELECT `firstName`, `middleName`, `lastName`, `gender`, `dateOfBirth`, `number`, `email`, `address`, `pincode`, `city`, `state`, `country` FROM `usersdata` where email = '$email' AND password = '$password'";

     $queryUserData = mysqli_query($con, $selectUsersData);

    }

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
    <link rel="stylesheet" href="./Assets/css/editProfile.css">

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

                <?php
                while ($row = mysqli_fetch_array($queryUserData)) {
                ?>
            <!-- Edit profile page-->
            <div class="editProfile" id="editProfile">
                    <form action="../../../backend/dashboard/userDashboard/userEditProfile.php" method="post">
                        <h2>Edit Profile</h2>
                        <div class="names">
                            <div>
                                <p>First Name</p>
                                <input type="text" value="<?php echo  $row['firstName']; ?>" name="firstName" placeholder="Ex. First Name">
                            </div>
                            <div>
                                <p>Middle Name</p>
                                <input type="text" value="<?php echo  $row['middleName']; ?>" name="midName" placeholder="Ex. Middle Name">
                            </div>
                            <div>
                                <p>Last Name</p>
                                <input type="text" value="<?php echo  $row['lastName']; ?>" name="lastName" placeholder="Ex. Last Name">
                            </div>
                        </div>
                        <div class="emailContact">
                            <div>
                                <p>Email</p>
                                <input type="email" value="<?php echo $row['email']; ?>" name="email" placeholder="Email">
                            </div>
                            <div>
                                <p>Phone Number</p>
                                <input type="text" value="<?php echo $row['number']; ?>" name="number" placeholder="Phone">
                            </div>
                        </div>
                        <div class="birthAgeAndGender">
                            <div>
                                <p>Date Of Birth</p>    
                                <input type="text" value="<?php echo $row['dateOfBirth']; ?>" name="dateOfBirth" placeholder="Date of Birth">
                            </div>
                            <div>
                                <p>Gender</p>
                                <input type="text" value="<?php echo $row['gender']; ?>" name="gender" placeholder="Gender">
                            </div>
                        </div>
                        <div class="zipAndCity">
                            <div>
                                <p>Pincode</p>
                                <input type="number" value="<?php echo $row['pincode']; ?>" name="pincode" placeholder="pin Code">
                            </div>
                            <div>
                                <p>City</p>
                                <input type="text" value="<?php echo $row['city']; ?>" name="city" placeholder="City">
                            </div>
                        </div>
                        <div class="stateAndCountry">
                            <div>
                                <p>State</p>
                                <input type="text" value="<?php echo $row['state']; ?>" name="state" placeholder="State">
                            </div>
                            <div>
                                <p>Country</p>
                                <input type="text" value="<?php echo $row['country']; ?>" name="country" placeholder="Country">
                            </div>
                        </div>
<br>
                        <button type="submit" name="submit" class="buttons">submit</button>
                    </form>
            </div>
                <?php
                }
                ?>
        </div>
        <!-------------------------- 
        dashboard Right side - End
        --------------------------->

    </div>
    <!------------------
     Dashboard  - End 
    ------------------->





    <!---------
     Custom Js  
    ----------->
    <script src="../../Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>