<?php

require "../../connection.php";
require "../../login.php";


if (isset($_POST['submit'])) {
    
    $userId = $_SESSION['email'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $pincode = $_POST['pincode'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $addressType = $_POST['addressType'];


     // Array of form fields
     $fields = [
        'First Name' => $firstName,
        'Middle Name' => $middleName,
        'Last Name' => $lastName,
        'Gender' => $gender,
        'Email' => $email,
        'Phone' => $phone,
        'AddressLine1' => $addressLine1,
        'AddressLine2' => $addressLine2,
        'Pincode' => $pincode,
        'Date of Birth' => $dob,
        'City' => $city,
        'State' => $state,
        'Country' => $country,
        'addressType' => $addressType
    ];

    $errors = [];

    // if all fields are filled
    foreach ($fields as $fieldName => $fieldValue) {
        if (trim($fieldValue) === "") {
            $errors[] = "$fieldName is required.";
        }
    }

    // if address is greaterthen 30 character
    if (strlen($addressLine1) > 30) {
        $errors[] = "Address is must be lessthen 30 characters.";
    }

    // if address is greaterthen 30 character
    if (strlen($addressLine2) > 30) {
        $errors[] = "Address is must be lessthen 30 characters.";
    }

    // if email formate is invalid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // if Phone Number is Equal 10 character
    if (strlen($phone) != 10) {
        $errors[] = "Phone Number must be 10 Digits.";
    }

    // Display errors 
    if (!empty($errors)) {

        foreach ($errors as $error) {
            header("location: ../../../frontend/dashboard/User Dashboard/userAddress.php?error=$error");
            exit();
                }
    } else {

    $query = "INSERT INTO `useraddress`( `userId`, `firstName`, `middleName`, `lastName`, `email`, `phone`, `gender`, `addressOne`, `addressTwo`, `dateOfBirth`, `pincode`, `city`, `state`, `country`, `addressType`)
     VALUES ('$userId','$firstName','$middleName','$lastName','$email','$phone','$gender','$addressLine1','$addressLine2','$dob','$pincode','$city','$state','$country', '$addressType')";

    $insert = mysqli_query($con, $query);
    
    if ($insert === true) {
        header("location: ../../../frontend/dashboard/User Dashboard/userAddress.php?success=Add Address Successfully!");
    }
    else{
        header("location: ../../../frontend/dashboard/User Dashboard/userAddress.php?errorMessage=something went wrong");
    }

}

}

?>