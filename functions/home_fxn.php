<?php
// Include necessary functions for displaying assignments and statistics
include_once('../actions/get_all_assignment_action.php');
include_once ("../settings/connection.php");


// Call the functions to get data
$var_data = getAllAssignments();
$var_data_in_progress = getAssignmentsInProgress();
$var_data_incomplete = getIncompleteAssignments();
$var_data_completed = getCompletedAssignments();
$var_data_recent = getRecentAssignments();


// Display statistics or tables using $var_data_statistic, $var_data_in_progress, $var_data_incomplete, $var_data_completed, $var_data_recent
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chore Management Dashboard</title>
    <!-- Add any other head content you might need -->
</head>
<body>

    <!-- Display All Assignments -->
    <?php
    // Call the function to get all assignments
    $var_data = getAllAssignments();

    if ($var_data === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>All Assignments</h3>";
        echo "<table border='1'>";
        // Add table headers
        echo "<tr><th>Assignment ID</th><th>Chore Name</th><th>Status</th><th>Assigned By</th><th>Assigned To</th></tr>";
        // Add table rows
        foreach ($var_data as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['sname'] . "</td>";
            echo "<td>" . $assignment['assigned_by_name'] . "</td>";
            echo "<td>" . $assignment['assigned_to_name'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>

    <!-- Display Assignments In Progress -->
    <?php
    // Call the function to get assignments in progress
    $var_data_in_progress = getAssignmentsInProgress();

    if ($var_data_in_progress === null) {
        // No records found
        echo "<p>No assignments in progress.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>Assignments In Progress</h3>";
        echo "<table border='1'>";
        // Add table headers and rows
        foreach ($var_data_in_progress as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['date_due'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
     <!-- Display Completed Assignments -->
     <?php
    // Call the function to get assignments in progress
    $var_data_in_progress = getAssignmentsInProgress();

    if ($var_data_in_progress === null) {
        // No records found
        echo "<p>No assignments in progress.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>Assignments In Progress</h3>";
        echo "<table border='1'>";
        // Add table headers and rows
        foreach ($var_data_in_progress as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['date_due'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>