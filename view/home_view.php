<?php
// Including the connection
include_once '../functions/get_all_assignment_fxn.php';
include_once ("../settings/connection.php");

// Call the functions to get data
$var_data = getAllAssignments();
$var_data_in_progress = getAssignmentsInProgress();
$var_data_incomplete = getIncompleteAssignments();
$var_data_completed = getCompletedAssignments();
$var_data_recent = getRecentAssignments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chore Management Dashboard</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Add your styles for a visually appealing dashboard */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            padding: 20px;
        }

        h2, h3 {
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Chore Management Dashboard</h2>

    <!-- Display Chore Statistics -->
    <div>
        <h3>Chore Statistics</h3>
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

    <!-- Display Assignments In Progress-->
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
        echo "<tr><th>Assignment ID</th><th>Chore Name</th><th>Status</th><th>Assigned By</th><th>Assigned To</th><th>Due date</th></tr>";
        // Add table headers and rows
        foreach ($var_data_in_progress as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['sname'] . "</td>";
            echo "<td>" . $assignment['assigned_by_name'] . "</td>";
            echo "<td>" . $assignment['assigned_to_name'] . "</td>";
            echo "<td>" . $assignment['date_due'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        echo "</table>";
    }

    
    ?>
    <!-- Display Completed Assignments-->
    <?php
    // Call the function to get assignments in progress
    $var_data_completed = getCompletedAssignments();

    if ($var_data_completed === null) {
        // No records found
        echo "<p>No assignments in progress.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>Assignments Completed</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Assignment ID</th><th>Chore Name</th><th>Status</th><th>Assigned By</th><th>Assigned To</th><th>Due date</th></tr>";
        // Add table headers and rows
        foreach ($var_data_completed as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['sname'] . "</td>";
            echo "<td>" . $assignment['assigned_by_name'] . "</td>";
            echo "<td>" . $assignment['assigned_to_name'] . "</td>";
            echo "<td>" . $assignment['date_due'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        echo "</table>";
    }

    
    ?>

    <!-- Display Incompleted Assignments-->
    <?php
    // Call the function to get assignments in progress
    $var_data_completed = getIncompleteAssignments();

    if ($var_data_completed === null) {
        // No records found
        echo "<p>No assignments in progress.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>Assignments Incompleted</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Assignment ID</th><th>Chore Name</th><th>Status</th><th>Assigned By</th><th>Assigned To</th><th>Due date</th></tr>";
        // Add table headers and rows
        foreach ($var_data_completed as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['sname'] . "</td>";
            echo "<td>" . $assignment['assigned_by_name'] . "</td>";
            echo "<td>" . $assignment['assigned_to_name'] . "</td>";
            echo "<td>" . $assignment['date_due'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        echo "</table>";
    }

    
    ?>

    <!-- Display Recent Assignments-->
    <?php
    // Call the function to get assignments in progress
    $var_data_recent = getRecentAssignments();

    if ($var_data_recent === null) {
        // No records found
        echo "<p>No assignments in progress.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>Recently completed assignments</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Assignment ID</th><th>Chore Name</th><th>Status</th><th>Assigned By</th><th>Assigned To</th><th>Due date</th></tr>";
        // Add table headers and rows
        foreach ($var_data_recent as $assignment) {
            echo "<tr>";
            echo "<td>" . $assignment['assignmentid'] . "</td>";
            echo "<td>" . $assignment['chorename'] . "</td>";
            echo "<td>" . $assignment['sname'] . "</td>";
            echo "<td>" . $assignment['assigned_by_name'] . "</td>";
            echo "<td>" . $assignment['assigned_to_name'] . "</td>";
            echo "<td>" . $assignment['date_due'] . "</td>";
            // Add more columns as needed
            echo "</tr>";
        }
        echo "</table>";
    }

    
    ?>

</body>
</html>