<?php
// Include the database connection file
include_once ("../settings/connection.php");
include_once ('../functions/who_assigned_fxn.php');

// Start the session
session_start();
$email = $_SESSION['email'];

// Check if the form is submitted
if (isset ($_POST['assignChore'])) {
    // Collect form data and assign to variables
    $assignedperson = $_POST['assignPerson'];
    $assignedchore = $_POST['Chore'];
    $dueDate = $_POST['dueDate'];

    // Set values for additional fields
    $dateAssigned = date('Y-m-d H:i:s');
    $lastUpdated = date('Y-m-d H:i:s');
    $dateCompleted = date('Y-m-d H:i:s');
    $whoAssigned = $_SESSION['userId'];
    $imgPath = null;
    // Get the selected status from the form
    $statusID = $_POST['status']; // Assuming 'status' is the name of your dropdown or radio button

     // Get the selected status name (sname) from the status table
     $statusID = $_POST['status']; // Assuming 'status' is the name of your dropdown or radio button
     $status_query = "SELECT sname FROM status WHERE sid = ?";
     $status_stmt = mysqli_prepare($conn, $status_query);
     mysqli_stmt_bind_param($status_stmt, "i", $statusID);
     mysqli_stmt_execute($status_stmt);
     $status_result = mysqli_stmt_get_result($status_stmt);
     $status_row = mysqli_fetch_assoc($status_result);
     $statusName = $status_row['sname'];

    // Write the insert query
    $sql_insert = "INSERT INTO assignment (cid, sid, date_assign, date_due, last_updated, date_completed, img, who_assigned,status_name) VALUES (?, ?, NOW(), ?, NOW(), ?, '', ?, ?)";

    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt, "iississ", $assignedchore, $statusID, $dueDate, $dateCompleted, $whoAssigned, $statusName);

    // Execute the query and handle the status update
    $output = mysqli_stmt_execute($stmt);

    if ($output) {
        // Get the assignment ID of the newly inserted assignment
        $assignment_id = mysqli_insert_id($conn);

        // Update the status of the assignment in the assignment table
        $update_query = "UPDATE assignment SET status_name = ? WHERE assignmentid = ?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, "si", $statusName, $assignment_id);
        mysqli_stmt_execute($update_stmt);

        // Redirect to the dashboard or wherever needed
        header("Location: ../admin/assign_chore_view.php");
        exit;
    } else {
        echo "Error inserting record into assignment table: " . $conn->error;
        exit;
    }
}