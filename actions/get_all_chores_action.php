<?php
// Including the connection
include_once('../settings/connection.php');

function getAllChores() {
    global $conn;
    $query = "SELECT * FROM Chores";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $chores = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $chores[] = $row;
        }

        mysqli_free_result($result);

        return $chores;
    } else {
        mysqli_free_result($result);
        return null;
    }
}

// Calling the function and handling messages
$allChores = getAllChores();

if (is_array($allChores)) {
    // Displaying success message or processing the records
    echo "Successfully retrieved records!";
} else {
    // Displaying error message or handling no records found
    echo  "$allChores";
}
