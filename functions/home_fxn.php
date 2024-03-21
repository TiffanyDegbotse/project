<?php
// Include necessary functions for displaying assignments and statistics
include_once('../actions/get_all_assignment_action.php');

// Call the functions to get data
$var_data = getAllAssignments($conn);
$var_data_in_progress = getAssignmentsInProgress();
$var_data_incomplete = getIncompleteAssignments();
$var_data_completed = getCompletedAssignments();
$var_data_recent = getRecentAssignments();


// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


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
    <h2>Chore Management Dashboard</h2>

    <!-- Display All Assignments -->
    <?php
    if ($var_data === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>All Assignments</h3>";
        echo "<table border='1'>";
        // Add table headers and rows here
        echo "</table>";
    }
    ?>

    <!-- Display Assignments In Progress -->
    <?php
    if ($var_data_in_progress === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>All Assignments</h3>";
        echo "<table border='1'>";
        // Add table headers and rows here
        echo "</table>";
    }
    // Similar logic as above for other sections
    ?>

    <!-- Display Incomplete Assignments -->
    <?php
    if ($var_data === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>All Assignments</h3>";
        echo "<table border='1'>";
        // Add table headers and rows here
        echo "</table>";
    }
    // Similar logic as above for other sections
    ?>

    <!-- Display Completed Assignments -->
    <?php
    if ($var_data === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>All Assignments</h3>";
        echo "<table border='1'>";
        // Add table headers and rows here
        echo "</table>";
    }
    // Similar logic as above for other sections
    ?>
    

    <!-- Display Recent Assignments -->
    <?php
    if ($var_data === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<h3>All Assignments</h3>";
        echo "<table border='1'>";
        // Add table headers and rows here
        echo "</table>";
    }
    // Similar logic as above for other sections
    ?>

</body>
</html>
