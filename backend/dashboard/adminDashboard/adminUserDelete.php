
<?php
require "../../connection.php";

$id = $_GET['id'];
$deletequery =  "DELETE FROM `usersData` WHERE id='$id'"; 

$result = mysqli_query($con,$deletequery);

if ($result === true) {
    
    header("location: ../../../frontend/Dashboard/Admin Dashboard/user.php");
}
else{
    echo "user Delete Error";
}



?>