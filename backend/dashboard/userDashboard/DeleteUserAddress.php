<?php
require "../../connection.php";

    
 if (isset($_GET['id'])) {
    
    echo $id = $_GET['id'];

    
    $deletequery =  "DELETE FROM `useraddress` WHERE id='$id'"; 

    
    $result = mysqli_query($con, $deletequery);
    
    if ($result === true) {
        header("location: ../../../frontend/Dashboard/user Dashboard/userAddress.php");
    }
    else{
        echo "Address Delete Error";
    }

}
else{
    echo "Something Weng Wrong";
}

?>



