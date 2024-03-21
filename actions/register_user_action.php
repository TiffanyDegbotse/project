<?php

// Include the database connection file
include ("../settings/connection.php");

// Check if the form is submitted
if (isset($_POST['register'])) {
    // Collect form data and assign to variables
    $firstname=$_POST['firstName'];
    $lastname=$_POST['lastName'];
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $passwordRetype=$_POST['passwordRetype'];
    $familyrole=$_POST['familyRole'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $contact=$_POST['contact'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $rid=3;
    // Write the insert query
    $sql_insert = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt,"iississss", $rid, $familyrole, $firstname, $lastname, $gender, $dob, $contact, $email, $hashedPassword);
    $output = mysqli_stmt_execute($stmt);

    echo "It works";

    if ($output) {
        header("Location: ../login/login.php");
        exit;
    } else {
       echo "Error: " . $conn->error;
       exit;
    }
}








 