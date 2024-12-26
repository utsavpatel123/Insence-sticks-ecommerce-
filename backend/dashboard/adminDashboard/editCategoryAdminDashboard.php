<?php

require "../../connection.php";

if (isset($_POST['submit'])) {

    $categoryId = $_POST['categoryId'];
     $categoryName = $_POST['categoryName'];
     $categoryDescription = $_POST['categoryDescription'];


    // Update the product details in the database
$sql = "UPDATE `prodductcategory` SET 
            `categoryName` = '$categoryName',  
            `categoryDescription` = '$categoryDescription' 
        WHERE `categoryId` = '$categoryId'";


    if (mysqli_query($con, $sql)) {
        // Only handle image update if a new image is uploaded
        if (!empty($_FILES['categoryImage']['name'])) {

            // Retrieve the old image name from the database
            $sqlSelect = "SELECT `categoryImage` FROM `prodductcategory` WHERE `categoryId` = '$categoryId'";
            $result = mysqli_query($con, $sqlSelect);
            $row = mysqli_fetch_array($result);
            $oldImageName = $row['categoryImage'];
            
           
        
            $imageName = $_FILES['categoryImage']['name'];
            $imageTmpName = $_FILES['categoryImage']['tmp_name'];
            $imageSize = $_FILES['categoryImage']['size'];
            $imageError = $_FILES['categoryImage']['error'];

            $allowedTypes = array("jpg", "jpeg", "png");
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($imageExtension, $allowedTypes) && $imageSize < 1000000) {
                // Generate a unique name for the new image
                $imageNewName = uniqid('IMG-', true) . "." . $imageExtension;

                // Directory to upload the new image
                $targetDir = "../../productCategoryImageUpload/";
                $targetFilePath = $targetDir . $imageNewName;

                // Move the new image to the server
                if (move_uploaded_file($imageTmpName, $targetFilePath)) {
                    // Delete the old image from the server
                    if (!empty($oldImageName) && file_exists($targetDir . $oldImageName)) {
                        unlink($targetDir . $oldImageName);
                    }

                    // Update the product image in the database
                    $sqlUpdateImage = "UPDATE `prodductcategory` SET `categoryImage` = '$imageNewName' WHERE `categoryId` = '$categoryId'";
                    $update = mysqli_query($con, $sqlUpdateImage);

                    if ($update === true) {
                        header("location: ../../../frontend/dashboard/admin dashboard/categories.php");
                    }
                }

            } else {
                echo "Invalid file type or file size exceeds the 225KB limit.";
            }
        }
        else{
            header("location: ../../../frontend/dashboard/admin dashboard/categories.php");
        }

        
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
}

?>
