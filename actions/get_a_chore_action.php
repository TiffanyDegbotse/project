
<?php
// Include the connection
include_once('../settings/connection.php');

function getChoreById($id) {
    global $conn;
    
    // SQL query to select a chore by ID
    $stmt = $conn->prepare("SELECT * FROM chores WHERE cid = ?");
    
    if (!$stmt) {
        die("Prepared statement failed: " . mysqli_error($conn));
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    // Check if the execution is successful
    if ($result->num_rows == 0) {
        return null;
    }

    $chore = $result->fetch_assoc();

    $stmt->close();
    return $chore;
}
