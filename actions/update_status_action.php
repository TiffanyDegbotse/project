<?php
// Include database connection
include_once '../settings/connection.php';

// Include getAllStatuses function
include_once '../actions/get_all_statuses_action.php';

if (isset ($_GET['assignmentid']) && isset ($_POST['status'])) {
    $assignmentId = $_GET['assignment'];
    $statusId = $_POST['status'];

    // Update chore status in the database
    $updateQuery = "UPDATE assignment SET sid = ? WHERE assignmentid = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ii", $statusId, $assignmentId);

    // Execute the update query
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        // Redirect back to assignment view or status update form
        header("Location: ../admin/assign_chore_view.php");
        exit;
    } else {
        echo "Error updating chore status: " . mysqli_error($conn);
        exit;
    }
}

// Fetch all statuses from the database
$allStatuses = getAllStatuses();

// Check if statuses are retrieved successfully
if ($allStatuses === null) {
    echo "Error retrieving statuses";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
</head>

<body>
    <h2>Update Status</h2>
        <label for="status">Select Status:</label>
        <select name="status" id="status">
            <?php foreach ($allStatuses as $status): ?>
                <option value="<?php echo $status['sid']; ?>">
                    <?php echo $status['sname']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="updateStatus">Update Status</button>
    </form>
</body>

</html>