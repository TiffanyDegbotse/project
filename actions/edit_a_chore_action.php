<?php
// Include the connection
include_once('../settings/connection.php');

if (isset($_POST['choreId']) && isset($_POST['choreName'])) {
    $choreId = filter_var($_POST['choreId'], FILTER_SANITIZE_NUMBER_INT);
    $choreName = $_POST['choreName'];

    // Writing the update query
    $sql_update = "UPDATE chores SET chorename = ? WHERE cid = ?";

    $stmt = mysqli_prepare($conn, $sql_update);

    if ($stmt === false) {
        die('Error: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "si", $choreName, $choreId);
    $output = mysqli_stmt_execute($stmt);

    if ($output) {
        header("Location: ../admin/chore_control_view.php?msg=SuccessfulEdit");
        exit;
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
        exit;
    }
} else {
    echo "Invalid parameters for chore update.";
    exit;
}
