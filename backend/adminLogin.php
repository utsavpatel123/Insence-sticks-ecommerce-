<?php

session_start();

if (isset($_POST['userName']) && isset($_POST['userName'])) {
    
    echo $userName = $_POST['userName'];
    echo $password = $_POST['password'];

    if(empty($userName) || empty($password)){
        header("location: ../frontend/admin.php?empty=Empty UserName or Password!");
    }
    else if ($userName === "admin@123" && $password === "admin123") {
         $_SESSION['admin'] = $userName;
         header("location: ../frontend/dashboard/admin dashboard/dashboard.php");
    }
    else{
        header("location: ../frontend/admin.php?error=Incurrect UserName or Password!");
    }

}


?>