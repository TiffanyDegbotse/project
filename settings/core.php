<?php
// Starting session
session_start();

// Function to check for login
function checkLogin() {
    // Checking if user_id session exists
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page
        header("Location: ../login/login.php");
        // Halting further execution
        die();
    }
}
