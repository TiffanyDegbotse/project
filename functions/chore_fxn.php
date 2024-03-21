<?php
// Including the get_all_chores_action.php file with the correct path
include_once('../actions/get_all_chores_action.php');

// Executing the getAllChores function and assigning the output to a variable
$var_data = getAllChores();

// Function to display chores in a table
function display($chores) {
    if (empty($chores)) {
        return;
    }

    echo "<h1>All Chores</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Chore Name</th><th>Edit</th><th>Delete</th></tr>";

    foreach ($chores as $chore) {
        echo "<tr>";
        echo "<td>{$chore['cid']}</td>";
        echo "<td>{$chore['chorename']}</td>";
        echo "<td><a href='../admin/edit_chore_view.php?id={$chore['cid']}'><img src='edit_icon.png' alt='Edit'></a></td>";
        echo "<td><a href='../actions/delete_chore_action.php?id={$chore['cid']}'><img src='delete_icon.png' alt='Delete'></a></td>";
        echo "</tr>";
    }

    echo "</table>";
}

