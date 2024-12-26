<?php 

require "../../connection.php";

if (isset($_GET['id'])) {
    

     $id = $_GET['id'];

    $query = "DELETE FROM `prodductcategory` WHERE categoryId='$id'";

    $deleteQuery = mysqli_query($con, $query);

    if ($deleteQuery === true) {
        header("location: ../../../frontend/dashboard/admin dashboard/categories.php");
    }
    else{
        echo "error";
    }

}
else{
    echo "Category Delete Error";
}

?>