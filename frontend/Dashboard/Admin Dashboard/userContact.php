<?php

require "../../../backend/connection.php";
require "./adminAuthentication.php";

$query = "SELECT * FROM `contact`";
$select = mysqli_query($con, $query);

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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/userContact.css">

</head>

<body>

    <!----------------------
     Dashboard Header - start 
    ------------------------>
    <?php require "../../dashboardHeader.php"; ?>
    <!---------------------
     Dashboard Header - End 
    ---------------------->


    <div id="dashboardContainer">

    <!-------------------------- 
        dashboard left side - start
        --------------------------->
        <?php require "./leftSideLinks.php"; ?>
        <!-------------------------- 
        dashboard left side - End
        --------------------------->

        <!-------------------------- 
        dashboard Right side - start
        --------------------------->
        <div class="rightSide">
            <div class="userContactBox">
                <ul>
                    <li id="headerOflist">

                        <div class="name">Name</div>
                        <div>Email</div>
                        <div class="number">Phone Number</div>
                        <div class="message">Message</div>
                        <div class="message">Delete</div>
                    </li>

                    <?php
                    while ($row = mysqli_fetch_array($select)) {
                        ?>

                    <li class="userMessage">
                        <div class="name">
                            <?php echo $row['fullName'] ?>
                        </div>
                        <div class="emailAndHover">
                            <div class="hoverEmail">
                                <?php echo $row['email'] ?>
                            </div>
                            <div class="email">
                                <?php echo $row['email'] ?>
                            </div>
                        </div>
                        <div class="number">
                            <?php echo $row['phone'] ?>
                        </div>
                        <div class="message">
                            <?php echo $row['message'] ?>
                        </div>
                        <div class="deleteMsg">
                            <a href="../../../backend/dashboard/adminDashboard/deleteUserContactMsg.php?id=<?php echo $row['id'] ?> "
                                style="color:black">
                                <i style='font-size:18px' class="fas deleteUserBtn">&#xf2ed;</i>
                            </a>
                        </div>
                    </li>

                    <?php } ?>
                </ul>
            </div>
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
    <script src="./Assets/js/userContact.js"></script>
    <script src="../../Assets/js/common.js"></script>
    <script src="./Assets/js/commonAdminDashboard.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>