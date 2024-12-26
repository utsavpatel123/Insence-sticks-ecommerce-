<?php

require "../../connection.php";

if (isset($_POST['edit'])) {
    
     $id = $_POST['id']; 
     $firstName = $_POST['firstName'];  
     $middleName = $_POST['middleName'];  
     $lastName = $_POST['lastName'];    
     $email = $_POST['email'];  
     $phone = $_POST['phone'];    
     $address = $_POST['address'];  
     $pincode = $_POST['pincode'];    
     $city = $_POST['city'];  
     $state = $_POST['state'];  
     $country = $_POST['country']; 
  
  

  $query = "UPDATE `usersdata` SET 
  `firstName`='$firstName', `middleName`='$middleName', `lastName`='$lastName',
  `email`='$email', `number`='$phone', `address`='$address',
  `pincode`='$pincode', 
  `city`='$city', `state`='$state', `country`='$country'
  WHERE `id` = '$id'";



  $update = mysqli_query($con, $query);


  if ($update === true) {
     header("location: ../../../frontend/dashboard/admin dashboard/user.php?successUserUpdate=User Update successfully!");
  }
  else{
     echo "user update Error";
  }

}
?>
