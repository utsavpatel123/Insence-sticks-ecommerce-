<?php
require "../../../backend/adminLogin.php";

if (!isset($_SESSION['admin'])) {
    header("location: ../../index.php");
}

?>