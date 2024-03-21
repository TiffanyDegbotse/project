<?php
// Including the connection
include_once('../settings/connection.php');

function getAllstatuses() {
    global $conn;
    $query = "SELECT * FROM status";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $statuses = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $statuses[] = $row;
        }

        mysqli_free_result($result);

        return $statuses;
    } else {
        mysqli_free_result($result);
        return null;
    }
}

// Calling the function and handling messages
$allstatuses = getAllstatuses();

if (is_array($allstatuses)) {
    // Displaying success message or processing the records
    echo "Successfully retrieved records!";
} else {
    // Displaying error message or handling no records found
    echo  "$allstatuses";
}
