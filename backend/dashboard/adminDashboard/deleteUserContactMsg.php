<?php
    require "../../connection.php";

    $id = $_GET['id'];
    if(!$id){
        echo "id";
    }
    $deletequery = "DELETE FROM `contact` WHERE id='$id'";

    $result = mysqli_query($con, $deletequery);

    if($result === true){
        header("location: ../../../frontend/Dashboard/Admin Dashboard/userContact.php");
    }
    else{
        echo "Error while deleting the contact msg";
    }

?>