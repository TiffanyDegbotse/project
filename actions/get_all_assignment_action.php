<?php
// Including the connection
include_once('../settings/connection.php');

function getAllAssignments() {
    global $conn;
    $query = "SELECT * FROM assignment";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $assignment = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $assignment[] = $row;
        }

        mysqli_free_result($result);

        return $assignment;
    } else {
        mysqli_free_result($result);
        return null;
    }
}

// Function 2: Get all chore assignments in progress
function getAssignmentsInProgress() {
    global $conn;
    $query = "SELECT * FROM assignment WHERE status = 2 AND due_date > CURDATE()";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $assignmentsInProgress = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $assignmentsInProgress[] = $row;
    }

    mysqli_free_result($result);

    return $assignmentsInProgress;
}

// Function 3: Get all incomplete chore assignments
function getIncompleteAssignments() {
    global $conn;
    $query = "SELECT * FROM assignment WHERE status = 4 AND due_date < CURDATE()";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $incompleteAssignments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $incompleteAssignments[] = $row;
    }

    mysqli_free_result($result);

    return $incompleteAssignments;
}

// Function 4: Get all completed chore assignments
function getCompletedAssignments() {
    global $conn;
    $query = "SELECT * FROM assignment WHERE status = 3";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $completedAssignments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $completedAssignments[] = $row;
    }

    mysqli_free_result($result);

    return $completedAssignments;
}

// Function 5: Get all recent chore assignments
function getRecentAssignments() {
    global $conn;
    $query = "SELECT * FROM assignment WHERE status = 2 ORDER BY assignment_id DESC LIMIT 3";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $recentAssignments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $recentAssignments[] = $row;
    }

    mysqli_free_result($result);

    return $recentAssignments;
}

// Calling the function and handling messages
$allassignments = getAllAssignments();

if (is_array($allassignments)) {
    // Displaying success message or processing the records
    echo "Successfully retrieved records!";
} else {
    // Displaying error message or handling no records found
    echo  "$allassignments";
}
