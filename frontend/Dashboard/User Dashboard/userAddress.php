<?php

require "../../../backend/connection.php";
require "../../../backend/login.php";
require "./userAuthentication.php";

 
$userId = $_SESSION['email'];

$selectUserAddress = "SELECT  `id`, `firstName`, `middleName`, `lastName`, `email`, `phone`, `gender`, `addressOne`, `addressTwo`, `dateOfBirth`, `pincode`, `city`, `state`, `country`, `addressType` FROM `useraddress` WHERE userId = '$userId'";

$queryUserAddress = mysqli_query($con, $selectUserAddress);

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


    <!-------------------
    Address Popup for edit address - start
    -------------------->


    <?php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $query = "SELECT * FROM `useraddress` WHERE id = '$id'";

        $selectquery = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($selectquery)) {
    ?>
            <div <?php if (isset($_GET['id'])) {
                        echo "class='addressPopup removeEditUserAddressPopup'";
                    } else {
                        echo 'class="addressPopup"';
                    } ?> id="editAddressPopup">
                <div class="container">
                    <i class="fa-solid fa-xmark"></i>

                    <form action="../../../backend/dashboard/userDashboard/editUserAddress.php" method="POST">
                        <div class="formBox" id="firstInfoBox">
                            <h3>Edit Address</h3>
                            <input style="display: none;" type="text" value="<?php echo $row['id'] ?>" name="id">
                            <input type="text" value="<?php echo $row['firstName'] ?>" name="firstName" placeholder="First Name..">
                            <input type="text" value="<?php echo $row['middleName'] ?>" name="middleName" placeholder="Mid Name..">
                            <input type="text" value="<?php echo $row['lastName'] ?>" name="lastName" placeholder="Last Name..">
                            <div class="redio">
                                Male<input type="radio" value="male" <?php echo ($row['gender'] === 'male') ? 'checked' : ''; ?> name="gender">
                                Female<input type="radio" value="female" <?php echo ($row['gender'] === 'female') ? 'checked' : ''; ?> name="gender">
                            </div>

                            <select name="addressType">
                                <option value="shipping" <?php echo ($row['addressType'] === 'shipping') ? 'selected' : ''; ?>>shipping</option>
                                <option value="billing" <?php echo ($row['addressType'] === 'billing') ? 'selected' : ''; ?>>billing</option>
                            </select>

                            <div class="button">
                                <button type="button" id="buttonNextFirst" class="buttons">Next</button>
                            </div>
                        </div>
                        <div class="formBox" id="secondInfoBox">
                            <h3>Welcome</h3>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Email.." required>
                            <input type="number" name="phone" value="<?php echo $row['phone'] ?>" placeholder="phone..">
                            <input type="text" name="addressLine1" value="<?php echo $row['addressOne'] ?>" placeholder="Address_Line1..">
                            <input type="text" name="addressLine2" value="<?php echo $row['addressTwo'] ?>" placeholder="Address_Line2..">
                            <div class="button">
                                <button type="button" id="buttonPrevFirst" class="buttons">Prev</button>
                                <button type="button" id="buttonNextsecond" class="buttons">Next</button>
                            </div>
                        </div>
                        <div class="formBox" id="thirdInfoBox">
                            <h3>Welcome</h3>
                            <input type="number" name="pincode" value="<?php echo $row['pincode'] ?>" placeholder="Pincode..">
                            <input type="date" name="dob" value="<?php echo $row['dateOfBirth'] ?>" placeholder="date of birth..">
                            <input type="text" name="city" value="<?php echo $row['city'] ?>" placeholder="City..">
                            <input type="text" name="state" value="<?php echo $row['state'] ?>" placeholder="State..">
                            <input type="text" name="country" value="<?php echo $row['country'] ?>" placeholder="Country..">
                            <div class="button">
                                <button type="button" id="buttonPrevSecond" class="buttons">Prev</button>
                                <button type="submit" name="edit" id="submitButton" class="buttons">Submit</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        <?php } ?>
    <?php } ?>

    <!-------------------
    Address Popup for edit address - End
    -------------------->


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
        
            <div class="userContainer">
            <?php if (isset($_REQUEST['success'])) { ?>
                <div class="successMessage">
                    <?php echo $_REQUEST['success']; ?>
                </div>
            <?php } ?>
            <?php if (isset($_REQUEST['successUserAddressupdate'])) { ?>
                <div class="successMessage">
                    <?php echo $_REQUEST['successUserAddressupdate']; ?>
                </div>
            <?php } ?>
            <?php if (isset($_REQUEST['error'])) { ?>
                <div class="errorMessage">
                    <?php echo $_REQUEST['error']; ?>
                </div>
            <?php } ?>
            <?php if (isset($_REQUEST['errorMessage'])) { ?>
                <div class="errorMessage">
                    <?php echo $_REQUEST['errorMessage']; ?>
                </div>
            <?php } ?>
                <div class="tableDataContainer">  
                <div class='usersTable'>
                    <table id='table'>
                        <tr class="tableHeading">

                            <th>Your Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>gender</th>
                            <th>Address 1</th>
                            <th>Address 2</th>
                            <th>Address Type</th>
                            <th>Date of Birth</th>
                            <th>pincode</th>
                            <th>city</th>
                            <th>state</th>
                            <th>country</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
if ($queryUserAddress->num_rows > 0) {
    while ($row = mysqli_fetch_array($queryUserAddress)) {
        echo "<tr class='tableData'>";
        echo "<td>" . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['addressOne'] . "</td>";
        echo "<td>" . $row['addressTwo'] . "</td>";
        echo "<td>" . $row['addressType'] . "</td>";
        echo "<td>" . $row['dateOfBirth'] . "</td>";
        echo "<td>" . $row['pincode'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "<td><a href='./userAddress.php?id=" . $row['id'] . "' class='editButton'><i style='font-size:18px' class='fas editUserBtn'>&#xf304;</i></a></td>";
        echo "<td><a href='../../../backend/dashboard/userDashboard/DeleteUserAddress.php?id=" . $row['id'] . "' class='deleteButton' onclick=\"return confirm('Are you sure you want to delete this address?')\"><i style='font-size:18px' class='fas deleteUserBtn'>&#xf2ed;</a></td>";

        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='12'>No records found</td></tr>";
}
?>                
                    </table>
                </div>
            </div>
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
    <script src="../../Assets/js/common.js"></script>
    <script src="./Assets/js/userAddress.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>