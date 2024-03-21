<?php
// Starting session
session_start();

// Including the database connection file
include '../settings/connection.php';

// Checking if login button was clicked
if ((isset($_SERVER['REQUEST_METHOD']) == "POST") && isset($_POST['signIn'])) {

    // Collect form data and store in variables
    $email = $_POST['email'];
    $password = $_POST['password'];



    if (empty($email) || empty($password)) {
        echo "All fields required!";
        exit;
    }

    
    // Writing a prepared statement to select a record from the People table using the email
    $query = "SELECT * FROM people WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passwd'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['userId'] = $row['pid'];
            header('Location: ../admin/assign_chore_view.php?msg=sucess');
            exit();
        } else {
            echo "Incorrect username or password. Please try again.";
            header('Location: ../login/login.php?msg=Incorrect username or password. Please try again.');
            exit;
        }
    } else {
        echo "User not registered or incorrect username or password, Please try again.";
        header('Location: ../login/login.php?msg=User not registered or incorrect username or password, Please try again.');
        exit();
    }
} else {
    echo "Error";
    header('Location: ../login/login.php');
    exit();
}
