<?php

require "../../connection.php";

if (isset($_POST['submit'])) {
    
    $firstName = $_POST['firstName'];
    $midName = $_POST['midName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    
    $query = "UPDATE `usersdata` SET
     `firstName`='$firstName',`middleName`='$midName',`lastName`='$lastName',`gender`='$gender',`dateOfBirth`='$dateOfBirth',
     `number`='$number',`email`='$email',`pincode`='$pincode',`city`='$city',`state`='$state',`country`='$country'";
    
    $update = mysqli_query($con, $query);

    if ($update === true) {
        header("location: ../../../frontend/dashboard/User Dashboard/editProfile.php");
    }
    else{
        echo "error";
    }

}    
else{
    echo "error";
}    


?>