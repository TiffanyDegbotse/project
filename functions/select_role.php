<?php
    // Including the database connection file
    include '../settings/connection.php';

    // Selecting query on the family_name table
    $sql_query = "SELECT * FROM family_name";

    // Executing the query
    $result = $conn->query($sql_query);

    // Checking if execution worked
    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $roles = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Closing connection
    $conn->close();


