<?php

require "connection.php";

if (isset($_POST['submit'])) {
    
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $fields = [
        'fullName' => $fullName,
        'Email' => $email,
        'Phone Number' => $phone,
        'Message' => $message,
    ];

    $errors = [];

            // if all fields are filled
            foreach ($fields as $fieldName => $fieldValue) {
                if (trim($fieldValue) === "") {
                    $errors[] = "$fieldName is required.";
                }
            }

    
    // if address is greaterthen 30 character
    if (strlen($message) > 50) {
        $errors[] = "Message is must be lessthen 50 characters.";
    }

    // if email formate is invalid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // if Phone Number is Equal 10 character
    if (strlen($phone) != 10) {
        $errors[] = "Phone Number must be 10 Digits.";
    }


    if (!empty($errors)) {

        foreach ($errors as $error) {
            header("location: ../frontend/contact.php?error=$error");
            exit();
                }
    } else {

    $query = "INSERT INTO `contact`( `fullName`, `email`, `phone`, `message`) VALUES ('$fullName','$email','$phone','$message')";

    $insert = mysqli_query($con, $query);

     if ($insert === true) {
         header("location: ../frontend/contact.php?success=Send Message Successfully!");
    }
    else{
            header("location: ../frontend/contact.php?dataError=something went wrong");
     }

    }

}
else{
    header("location: ../frontend/contact.php?errorMessage=something went wrong!");
}


?>