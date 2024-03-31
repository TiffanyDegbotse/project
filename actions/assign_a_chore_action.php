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
    $statusID = 1;

    // Write the insert query
    $sql_insert = "INSERT INTO assignment ( cid, sid, date_assign, date_due, last_updated, date_completed, img, who_assigned) VALUES (?, ?, NOW(), ?, NOW(), ?, '', ?)";

    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt, "iissi", $assignedchore, $statusID, $dueDate, $dateCompleted, $whoAssigned);

    $output = mysqli_stmt_execute($stmt);

    if ($output) {
        // Get the assignment ID of the newly inserted assignment
        $assignment_id = mysqli_insert_id($conn);

        // Write the insert query for the assigned people table
        $sql_insert_assigned_people = "INSERT INTO assigned_people (pid, assignmentid) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql_insert_assigned_people);
        mysqli_stmt_bind_param($stmt, "ii", $assignedperson, $assignment_id);

        // Execute the query
        $output_assigned_people = mysqli_stmt_execute($stmt);

        if ($output_assigned_people) {
            header("Location: ../admin/assign_chore_view.php");
            exit;
        } else {
            echo "Error inserting record into assigned_people table: " . $conn->error;
            exit;
        }
    } else {
        echo "Error inserting record into assignment table: " . $conn->error;
        exit;
    }
}