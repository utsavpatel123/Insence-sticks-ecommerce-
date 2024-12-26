<?php
require "connection.php";
if (isset($_POST["submit"])) {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $pincode = $_POST["pincode"];
    $dob = $_POST["dob"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];

    // Array of form fields
    $fields = [
        'First Name' => $firstName,
        'Middle Name' => $middleName,
        'Last Name' => $lastName,
        'Gender' => $gender,
        'Email' => $email,
        'Password' => $password,
        'Phone' => $phone,
        'Address' => $address,
        'Pincode' => $pincode,
        'Date of Birth' => $dob,
        'City' => $city,
        'State' => $state,
        'Country' => $country
    ];

    $errors = [];

    // if all fields are filled
    foreach ($fields as $fieldName => $fieldValue) {
        if (trim($fieldValue) === "") {
            $errors[] = "$fieldName is required.";
        }
    }

    // if email formate is invalid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // if address is greaterthen 30 character
    if (strlen($address) > 30) {
        $errors[] = "Address is must be lessthen 30 characters.";
    }
    // if password is lessthen 6 character
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }
    // if Phone Number is Equal 10 character
    if (strlen($phone) != 10) {
        $errors[] = "Phone Number must be 10 Digits.";
    }

    $emailExist = "SELECT * FROM `usersdata` WHERE `email` = '$email'";
    $phoneExist = "SELECT * FROM `usersdata` WHERE `number` = '$phone'";

    $emailCount = mysqli_query($con, $emailExist);
    $phoneCount = mysqli_query($con, $phoneExist);

    if (mysqli_num_rows($emailCount) > 0) {
        $errors[] = "Email is already registered.";
    }

    if (mysqli_num_rows($phoneCount) > 0) {
        $errors[] = "Phone number is already registered.";
    }

    // Display errors 
    if (!empty($errors)) {

        foreach ($errors as $error) {
            header("location: ../frontend/register.php?error=$error");
            exit();
                }
    } else {

        $firstName = mysqli_real_escape_string($con, $firstName);
        $middleName = mysqli_real_escape_string($con, $middleName);
        $lastName = mysqli_real_escape_string($con, $lastName);
        $gender = mysqli_real_escape_string($con, $gender);
        $dob = mysqli_real_escape_string($con, $dob);
        $phone = mysqli_real_escape_string($con, $phone);
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);
        $addressLine1 = mysqli_real_escape_string($con, $address);
        $pincode = mysqli_real_escape_string($con, $pincode);
        $city = mysqli_real_escape_string($con, $city);
        $state = mysqli_real_escape_string($con, $state);
        $country = mysqli_real_escape_string($con, $country);

        $query = "INSERT INTO `usersdata`(`firstName`, `middleName`, `lastName`, `gender`, `dateOfBirth`, `number`, `email`, `password`, `address`, `pincode`, `city`, `state`, `country`) 
        VALUES ('$firstName', '$middleName', '$lastName', '$gender', '$dob', '$phone', '$email', '$password', '$address', '$pincode', '$city', '$state', '$country')";

        $insert = mysqli_query($con, $query);

        if ($insert === true) {
            header("location: ../frontend/login.php");
        }
        else{
            header("location: ../frontend/register.php?registerError=something went wrong");
        }
        
    }
}


?>