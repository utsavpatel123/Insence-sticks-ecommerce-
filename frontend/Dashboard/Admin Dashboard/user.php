<?php

require "../../../backend/connection.php";
require "./adminAuthentication.php";

$sql = "SELECT * FROM `usersdata`";
$count = mysqli_query($con, $sql);

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
    <link rel="stylesheet" href="./Assets/css/user.css">

</head>

<body>

    <!----------------------
     Dashboard Header - start 
    ------------------------>
    <?php require "../../dashboardHeader.php"; ?>
    <!---------------------
     Dashboard Header - End 
    ---------------------->

 <!--------------------
    editUser form - start 
----------------------->

<?php
    if (isset($_GET['id'])) {

$id = $_GET['id'];

$query = "SELECT * FROM `usersdata` WHERE id = '$id'";

$selectquery = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($selectquery)) {
?>

    <div class="editUser" <?php if(isset($_GET['id'])){ echo 'style="display: block;"'; } else { echo '';} ?>>
        <div class="registerSection" id="registerSectionEdit">
            <div class="container" id="editUserContainer">
                <div class="closeEditUser">&#9986;</div>
                <form action="../../../backend/dashboard/adminDashboard/editUserAdminDashboard.php" method="post">
                    <div class="formBox" id="editFirstInfoBox">
                        <h3>Edit User</h3>
                        <input style="display: none;" type="text" name="id" value="<?php echo $row['id'] ?>">
                        <div>
                            <label for=""> First Name </label>
                            <input type="text" name="firstName" value="<?php echo $row['firstName'] ?>" placeholder="First Name" required>
                        </div>
                        <div>
                            <label for="">Middle Name</label>
                            <input type="text" name="middleName" value="<?php echo $row['middleName'] ?>" placeholder="Mid Name">
                        </div>
                        <div>
                            <label for="">Last Name</label>
                            <input type="text" name="lastName" value="<?php echo $row['lastName'] ?>" placeholder="Last Name" required>
                        </div>
                        <div class="button">
                            <button type="button" id="editButtonNextFirst">Next</button>
                        </div>
                    </div>
                    <div class="formBox" id="editSecondInfoBox" style="display: none;">
                        <h3>Contact Information</h3>
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" placeholder="Email" required>
                        </div>
                        <div>
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" value="<?php echo $row['number'] ?>" placeholder="Phone" required>
                        </div>
                        <div>
                            <label for="">Address</label>
                            <input type="text" name="address" value="<?php echo $row['address'] ?>" placeholder="Address" required> 
                        </div>
                        <div class="button">
                            <button type="button" id="editButtonPrevFirst">Prev</button>
                            <button type="button" id="editButtonNextSecond">Next</button>
                        </div>
                    </div>
                    <div class="formBox" id="editThirdInfoBox" style="display: none;">
                        <h3>Additional Information</h3>
                        <div>
                            <label for="">Pincode</label>
                            <input type="number" name="pincode" value="<?php echo $row['pincode'] ?>" placeholder="Pincode.." required>
                        </div>
                        <div>
                            <label for="">City</label>
                            <input type="text" name="city" value="<?php echo $row['city'] ?>" placeholder="City.." required>
                        </div>
                        <div>
                            <label for="">State</label>
                            <input type="text" name="state" value="<?php echo $row['state'] ?>" placeholder="State.." required>
                        </div>
                        <div>
                            <label for="">Country</label>
                            <input type="text" name="country" value="<?php echo $row['country'] ?>" placeholder="Country.." required>
                        </div>
                        <div class="button">
                            <button type="button" id="editButtonPrevSecond">Prev</button>
                            <button type="submit" name="edit" id="submitButton">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php } }?>

    <!--------------------
    editUser form - end 
----------------------->

    <!------------------
     Dashboard  - start 
    ------------------->
    <div class="dashboardContainer" id="dashboardContainer">


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
            <div class="userContainer">

                <?php if (isset($_REQUEST['successUserUpdate'])) { ?>
                    <div class="successMessage">
                        <?php echo $_REQUEST['successUserUpdate']; ?>
                        </div>
                <?php } ?>

                <div class="tableDataContainer">  
                <div class='usersTable'>
                    <table id='table'>
                        <tr class="tableHeading">

                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php
if ($count->num_rows > 0) {
    while ($row = mysqli_fetch_array($count)) {
        echo "<tr class='tableData'>";
        echo "<td>" . $row['firstName'] . "</td>";
        echo "<td>" . $row['middleName'] . "</td>";
        echo "<td>" . $row['lastName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['number'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['pincode'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "<td><a href='./user.php?id=" . $row['id'] ."'><i style='font-size:18px' class='fas editUserBtn'>&#xf304;</i></a></td>";
        echo "<td><a href='../../../backend/dashboard/adminDashboard/adminUserDelete.php?id= " . $row['id'] . "' style='color:black' ><i style='font-size:18px' class='fas deleteUserBtn'>&#xf2ed;</i><a></td>";
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
    <script src="./Assets/js/user.js"></script>
    <script src="../../Assets/js/common.js"></script>
    <script src="./Assets/js/commonAdminDashboard.js"></script>

    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>

</html>