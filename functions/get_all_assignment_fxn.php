<?php
// Include the connection
include_once('../settings/connection.php');

include_once('../actions/get_all_assignment_action.php');

$var_data=getAllassignments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Assignments</title>
    <!-- Add any other head content you might need -->
</head>
<body>
    <h2>All Assignments</h2>

    <?php
    if ($var_data === null) {
        // No records found
        echo "<p>No assignments found.</p>";
    } else {
        // Display the assignments in a table
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Assignment ID</th>";
        echo "<th>Assigned Person</th>";
        echo "<th>Assigned Chore</th>";
        echo "<th>Due Date</th>";
        echo "<th>Actions</th>"; // New column for actions
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($var_data as $assignment) {
            echo "<tr>";
            echo "<td>{$assignment['assignment_id']}</td>";
            echo "<td>{$assignment['assigned_person']}</td>";
            echo "<td>{$assignment['assigned_chore']}</td>";
            echo "<td>{$assignment['due_date']}</td>";
            echo "<td>";
            //Adding delete link with assignmentid in the URL
            echo "<a href='../actions/delete_assignment_action.php?id={$assignment['assignment_id']}'>Delete</a> | <a href='https://th.bing.com/th/id/OIP.0iXjpMzGLXU7uj4zACiqrQHaIv?rs=1&pid=ImgDetMain'>Status</a>"; // Add your action links here
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }
    ?>

</body>
</html>