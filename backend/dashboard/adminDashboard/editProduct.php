<?php

require "../../connection.php";

if (isset($_POST['submit'])) {

      $productID = $_POST['productId'];
     $productName = $_POST['productName'];
    $categoryId = $_POST['categoryId'];
     $productDescription = $_POST['productDescription'];
     $productPrice = $_POST['productPrice'];

    // Update the product details in the database
$sql = "UPDATE `product` SET 
            `productName` = '$productName', 
            `catagoryId` = '$categoryId', 
            `productDescription` = '$productDescription', 
            `productPrice` = '$productPrice'
        WHERE `id` = '$productID'";


    if (mysqli_query($con, $sql)) {
        // Only handle image update if a new image is uploaded
        if (!empty($_FILES['productImage']['name'])) {
            // Retrieve the old image name from the database
            $sqlSelect = "SELECT `productImage` FROM `product` WHERE `id` = '$productID'";
            $result = mysqli_query($con, $sqlSelect);
            $row = mysqli_fetch_assoc($result);
            $oldImageName = $row['productImage'];

            $imageName = $_FILES['productImage']['name'];
            $imageTmpName = $_FILES['productImage']['tmp_name'];
            $imageSize = $_FILES['productImage']['size'];
            $imageError = $_FILES['productImage']['error'];

            $allowedTypes = array("jpg", "jpeg", "png");
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (in_array($imageExtension, $allowedTypes) && $imageSize < 1000000) {
                // Generate a unique name for the new image
                $imageNewName = uniqid('IMG-', true) . "." . $imageExtension;

                // Directory to upload the new image
                $targetDir = "../../productImageUpload/";
                $targetFilePath = $targetDir . $imageNewName;

                // Move the new image to the server
                if (move_uploaded_file($imageTmpName, $targetFilePath)) {
                    // Delete the old image from the server
                    if (!empty($oldImageName) && file_exists($targetDir . $oldImageName)) {
                        unlink($targetDir . $oldImageName);
                    }

                    // Update the product image in the database
                    $sqlUpdateImage = "UPDATE `product` SET `productImage` = '$imageNewName' WHERE `id` = '$productID'";
                    $update = mysqli_query($con, $sqlUpdateImage);

                    if ($update === true) {
                        header("location: ../../../frontend/Dashboard/Admin Dashboard/products.php");
                    }
                }
                
            } else {
                echo "Invalid file type or file size exceeds the 225KB limit.";
            }
        }
        else{
            header("location: ../../../frontend/Dashboard/Admin Dashboard/products.php");
            
        }

        
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
}

?>
