<?php

require "connection.php";
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    
     $email = $_POST['email'];
     $password = $_POST['password'];

    $select = "SELECT * FROM `usersdata` WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($con, $select);

     echo $count = mysqli_num_rows($query);

    if ($count === 1) {
        while ($row = mysqli_fetch_array($query)) {
             
            if ($row['email'] === $email && $row['password'] === $password) {
                
                 $_SESSION['email'] = $row['email'];
                 $_SESSION['password'] = $row['password'];
                header("location: ../frontend/index.php");
            } else {
                header("location: ../frontend/login.php?msg=please tye again");
            }
        }
    }
     else {
        header("location: ../frontend/login.php?msg=you are not registered!");
    }


    if (empty($email) || empty($password)) {
        header("location: ../frontend/login.php?empty=empty email or password"); 
       }

} 


?>