<?php
// Include the connection
include_once('../settings/connection.php');

// Check if the assignment id is in the URL
if (isset($_GET['id'])) {
    // Retrieve assignment id from the URL
    $assignmentId = $_GET['id'];

    // Write the delete query
    $sql_delete = "DELETE FROM assignment WHERE assignment_id = ?";

    // Prepare and execute the query
    $stmt = mysqli_prepare($conn, $sql_delete);
    mysqli_stmt_bind_param($stmt, "i", $assignmentId);
    $output = mysqli_stmt_execute($stmt);

    // Check if execution worked
    if ($output) {
        // Redirect to the assignment display page (assign_chore_view.php)
        header("Location: ../admin/assign_chore_view.php");
        exit;
    } else {
        // Display error message or take appropriate action
        echo "Error: " . $conn->error;
        exit;
    }
} else {
    // Redirect to the assignment display page (assign_chore_view.php)
    header("Location: ../admin/assign_chore_view.php");
    exit;
}
?>
