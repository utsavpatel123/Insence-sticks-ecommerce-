<?php

require "../../connection.php";

if (isset($_POST['edit'])) {
    
$id = $_POST['id']; 
$firstName = $_POST['firstName'];  
$middleName = $_POST['middleName'];  
$lastName = $_POST['lastName'];  
$gender = $_POST['gender'];  
$addressType = $_POST['addressType'];  
$email = $_POST['email'];  
$phone = $_POST['phone'];  
$addressLine1 = $_POST['addressLine1'];  
$addressLine2 = $_POST['addressLine2'];  
$pincode = $_POST['pincode'];  
$dob = $_POST['dob'];  
$city = $_POST['city'];  
$state = $_POST['state'];  
$country = $_POST['country']; 
  
  

  $query = "UPDATE `useraddress` SET 
  `firstName`='$firstName', `middleName`='$middleName', `lastName`='$lastName',
  `email`='$email', `phone`='$phone', `gender`='$gender', `addressOne`='$addressLine1',
  `addressTwo`='$addressLine2', `dateOfBirth`='$dob', `pincode`='$pincode', 
  `city`='$city', `state`='$state', `country`='$country', `addressType`='$addressType' 
  WHERE `id` = '$id'";



  $update = mysqli_query($con, $query);


  if ($update === true) {
     header("location: ../../../frontend/dashboard/user dashboard/userAddress.php?successUserAddressupdate=userAddress Update successfully!");
  }
  else{
     echo "userAddress update Error";
  }

}
?>