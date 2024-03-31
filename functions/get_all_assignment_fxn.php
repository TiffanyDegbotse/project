<?php
// Include the connection
include_once('../actions/get_all_assignment_action.php');



$assignments= getAllAssignments();
$var_data = $assignments;

function display($assignments) {
    if (empty($assignments)) {
        return;
    }
    else {
        // Display the assignments in a table
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Chore Name</th>";
        echo "<th>Assigned By</th>";
        echo "<th>Assigned To</th>";
        echo "<th>Date Assigned</th>";
        echo "<th>Date Due</th>";
        echo "<th>Chore Status</th>";
        echo "<th>Actions</th>"; // New column for actions
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($assignments as $assignment) {
            echo "<tr>";
            echo "<td>{$assignment['chorename']}</td>";
            echo "<td>{$assignment['assigned_by_name']}</td>";
            echo "<td>{$assignment['assigned_to_name']}</td>";
            echo "<td>{$assignment['date_assign']}</td>";
            echo "<td>{$assignment['date_due']}</td>";
            echo "<td>{$assignment['sname']}</td>"; // Displaying the status name

            echo "<td>";
            //Adding delete link with assignmentid in the URL
            echo "<a href='../actions/delete_assignment_action.php?id={$assignment['assignmentid']}'>Delete</a> 
            | <a href='../actions/update_status_action.php?assignmentid={$assignment['assignmentid']}'>Status</a>"; 
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }
}