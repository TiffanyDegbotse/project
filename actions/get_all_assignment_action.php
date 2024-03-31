<?php
// Including the connection
include_once '../settings/connection.php';

function getAllAssignments() {
    global $conn;
    
    $query = "SELECT assignment.*, chores.chorename, status.sname, assigned_by.fname AS assigned_by_name, assigned_to.fname AS assigned_to_name
    FROM assignment 
    INNER JOIN chores ON assignment.cid = chores.cid
    INNER JOIN status ON assignment.sid = status.sid
    INNER JOIN people assigned_by ON assignment.who_assigned = assigned_by.pid
    INNER JOIN assigned_people ON assignment.assignmentid = assigned_people.assignmentid
    INNER JOIN people assigned_to ON assigned_people.pid = assigned_to.pid";



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


// Function 2: Get all chore assignments in progress
function getAssignmentsInProgress() {
    global $conn;
    $query = "SELECT assignment.*, chores.chorename, status.sname, assigned_by.fname AS assigned_by_name, assigned_to.fname AS assigned_to_name
    FROM assignment 
    INNER JOIN chores ON assignment.cid = chores.cid
    INNER JOIN status ON assignment.sid = status.sid
    INNER JOIN people assigned_by ON assignment.who_assigned = assigned_by.pid
    INNER JOIN assigned_people ON assignment.assignmentid = assigned_people.assignmentid
    INNER JOIN people assigned_to ON assigned_people.pid = assigned_to.pid
    WHERE assignment.sid = 2";

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
    $query = "SELECT assignment.*, chores.chorename, status.sname, assigned_by.fname AS assigned_by_name, assigned_to.fname AS assigned_to_name
    FROM assignment 
    INNER JOIN chores ON assignment.cid = chores.cid
    INNER JOIN status ON assignment.sid = status.sid
    INNER JOIN people assigned_by ON assignment.who_assigned = assigned_by.pid
    INNER JOIN assigned_people ON assignment.assignmentid = assigned_people.assignmentid
    INNER JOIN people assigned_to ON assigned_people.pid = assigned_to.pid
    WHERE assignment.sid = 4";

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
    $query = "SELECT assignment.*, chores.chorename, status.sname, assigned_by.fname AS assigned_by_name, assigned_to.fname AS assigned_to_name
    FROM assignment 
    INNER JOIN chores ON assignment.cid = chores.cid
    INNER JOIN status ON assignment.sid = status.sid
    INNER JOIN people assigned_by ON assignment.who_assigned = assigned_by.pid
    INNER JOIN assigned_people ON assignment.assignmentid = assigned_people.assignmentid
    INNER JOIN people assigned_to ON assigned_people.pid = assigned_to.pid
    WHERE assignment.sid = 3";

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
    $query = "SELECT assignment.*, chores.chorename, status.sname, assigned_by.fname AS assigned_by_name, assigned_to.fname AS assigned_to_name
    FROM assignment 
    INNER JOIN chores ON assignment.cid = chores.cid
    INNER JOIN status ON assignment.sid = status.sid
    INNER JOIN people assigned_by ON assignment.who_assigned = assigned_by.pid
    INNER JOIN assigned_people ON assignment.assignmentid = assigned_people.assignmentid
    INNER JOIN people assigned_to ON assigned_people.pid = assigned_to.pid
    WHERE assignment.sid = 3
    ORDER BY assignment.assignmentid DESC
    LIMIT 3";


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


