<?php
session_start(); // Start the session

// Unset only the user's session
unset($_SESSION['admin']); 

// Optionally, check if the session was successfully unset
if (!isset($_SESSION['admin'])) {
    echo "User session successfully removed.";
} else {
    echo "Failed to remove user session.";
}

// Optionally redirect to the login page or another page
header("Location: ../frontend/index.php");
exit;
?>