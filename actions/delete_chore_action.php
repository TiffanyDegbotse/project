<?php
// Including necessary configuration files and connection
include_once("../settings/connection.php");

// Checking if the ID is provided in the GET URL
if (isset($_GET['id'])) {
    $choreId = $_GET['id'];

    // Performing the delete operation
    $deleteQuery = "DELETE FROM chores WHERE cid = ?";

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param('i', $choreId); // 'i' represents the data type of the parameter (integer)

    // Executing the query
    if ($stmt->execute()) {
        // Redirecting to chore display page on success
        header("Location: ../admin/chore_control_view.php");
        exit();
    } else {
        // Handling errors accordingly (e.g., display an error message)
        header("Location: ../admin/chore_control_view.php?error=1");
        exit();
    }
} else {
    // Redirecting to chore display page if ID is not provided
    header("Location: ../admin/chore_control_view.php");
    exit();
}
