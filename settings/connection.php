<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "chores_mgt";

// Creating connection
$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


