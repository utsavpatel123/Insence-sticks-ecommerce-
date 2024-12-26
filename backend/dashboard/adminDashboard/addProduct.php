<?php
require "../../connection.php"; 
if (isset($_POST["submit"]) && isset($_FILES["productImage"])) {

    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPrice = $_POST["productPrice"];
    $productCatagory = $_POST["productCatagory"];
    
    $imgName = $_FILES["productImage"]["name"];
    $imgSize = $_FILES["productImage"]["size"];
    $tmp_name = $_FILES["productImage"]["tmp_name"];
    $error = $_FILES["productImage"]["error"];

    // Array of form fields
    $fields = [
        'productName' => $productName,
        'productDescription' => $productDescription,
        'productPrice' => $productPrice,
        'productCatagory' => $productCatagory,
    ];

    $errors = [];

    // Check if all fields are filled
    foreach ($fields as $fieldName => $fieldValue) {
        if (trim($fieldValue) === "") {
            $errors[] = "$fieldName is required.";
        }
    }

    // Check if image upload has an error
    if ($error !== 0) {
        $errors[] = "There was an error uploading the image.";
    }

    
    if (empty($errors)) {
        // Check image size
        if ($imgSize > 1000000) {
            $errors[] =  "Sorry, your image is too large (must be under 1MB).";
        } else {
            
            $imgEx = pathinfo($imgName, PATHINFO_EXTENSION);
            $imgExLc = strtolower($imgEx);  

            $allowedTypes = array("jpg", "png", "jpeg");

            if (in_array($imgExLc, $allowedTypes)) {
                //unique name for the image
                $newImgName = uniqid("IMG-", true) . '.' . $imgExLc;
                $imgUploadPath = '../../productImageUpload/' . $newImgName;

                // Move uploaded file to the destination
                if (move_uploaded_file($tmp_name, $imgUploadPath)) {
                    
                    $productName = mysqli_real_escape_string($con, $productName);
                    $productDescription = mysqli_real_escape_string($con, $productDescription);
                    $productPrice = mysqli_real_escape_string($con, $productPrice);
                    $productCatagory = mysqli_real_escape_string($con, $productCatagory);

                    // Insert into the database
                    $sql = "INSERT INTO `product`(`productName`, `productDescription`, `productPrice`, `CatagoryId`, `productImage`) 
                            VALUES ('$productName','$productDescription','$productPrice', '$productCatagory', '$newImgName')";

                    if ($con->query($sql) === TRUE) {
                        header("location: ../../../frontend/Dashboard/Admin Dashboard/products.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                } else {
                    $errors[] =  "Failed to upload the image.";
                }
            } else {
                $errors[] =  "Invalid image type. Only JPG, PNG, and JPEG are allowed.";
            }
        }
    } else {
        // Show validation errors
        foreach ($errors as $error) {
            header("location: ../../../frontend/dashboard/admin dashboard/addProduct.php?errors=$error");
            exit();
        }
    }
} else {
    echo "Form not submitted.";
}


?>