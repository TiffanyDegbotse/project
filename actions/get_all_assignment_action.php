<?php
// Including the connection
include_once '../settings/connection.php';

function getAllAssignments() {
    global $conn;
    
    $query = "SELECT assignment.*, chores.chorename, status.sname, people.fname
    FROM assignment 
    INNER JOIN chores ON assignment.cid = chores.cid
    INNER JOIN status ON assignment.sid = status.sid
    INNER JOIN assigned_people ON assignment.assignmentid = assigned_people.assignmentid
    INNER JOIN people ON assigned_people.pid = people.pid";



    $result = mysqli_query($conn, $query);

    if (!$result) {
        return "Query failed: " . mysqli_error($conn);
    }

    $assignments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $assignments[] = $row;
    }

    mysqli_free_result($result);

    return $assignments;
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


// Function 2: Get all chore assignments in progress
function getAssignmentsInProgress() {
    global $conn;
    $query = "SELECT * FROM assignment WHERE sid = 2 AND date_due > CURDATE()";

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
    $query = "SELECT * FROM assignment WHERE sid = 4 AND date_due < CURDATE()";

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
    $query = "SELECT * FROM assignment WHERE sid = 3";

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
    $query = "SELECT * FROM assignment WHERE sid = 2 ORDER BY assignmentid DESC LIMIT 3";

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
