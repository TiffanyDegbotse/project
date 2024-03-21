<?php

// Including the database connection file
include ("../settings/connection.php");

if (isset($_POST['choreName'])) {
    $choreName = $_POST["choreName"];

    // Writing the insert query
    $sql_insert = "INSERT INTO Chores (chorename) VALUES (?)";

    $stmt = mysqli_prepare($conn, $sql_insert);

    if ($stmt === false) {
        die('Error: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $choreName);
    $output = mysqli_stmt_execute($stmt);

    if ($output) {
        header("Location: ../admin/chore_control_view.php?msg=Sucessful");
        exit;
    } else {
       echo "Error: " . mysqli_stmt_error($stmt);
       exit;
    }
}
