<?php

require "../../connection.php";
if (isset($_FILES['catImages']) && isset($_POST['submit'])) {

    $catName = $_POST['catName'];
    $catDetail = $_POST['catDetail'];

    $imgName = $_FILES["catImages"]["name"];
    $imgSize = $_FILES["catImages"]["size"];
    $tmp_name = $_FILES["catImages"]["tmp_name"];
    $error = $_FILES["catImages"]["error"];

    $fields = [
        "categoryName" => $catName,
        "categoryDescription" => $catDetail
    ];


     $errors = [];

    foreach($fields as $fieldName => $fieldValue){
           if (trim($fieldValue) == "") {
               $errors[] = "$fieldName is Require."; 
           }
    }
    
    
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
                $imgUploadPath = '../../productCategoryImageUpload/' . $newImgName;

                if (move_uploaded_file($tmp_name, $imgUploadPath)) {

                     $sql = "INSERT INTO `prodductcategory`(`categoryName`, `categoryImage`, `categoryDescription`) 
                     VALUES ('$catName','$newImgName','$catDetail')";
                     
                    if ($con->query($sql) === TRUE) {
                        header("location: ../../../frontend/Dashboard/Admin Dashboard/categories.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                }
                else{
                    $errors[] =  "Failed to upload the image.";
                }
            }
            else{
                $errors[] =  "Invalid image type. Only JPG, PNG, and JPEG are allowed.";
            }
        }
}
else {
    // Show validation errors
    foreach ($errors as $error) {
        header("location: ../../../frontend/dashboard/admin dashboard/addCategory.php?errors=$error");
        exit();
    }
}

}
else{
    echo "Error";
}


?>