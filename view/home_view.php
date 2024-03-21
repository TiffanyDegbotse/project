<?php
// Including the connection
include_once '../functions/get_all_assignment_fxn.php';
include_once '../functions/home_fxn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chore Management Dashboard</title>
    <!-- Add your CSS styles here -->
    <style>
        /* Add your styles for a visually appealing dashboard */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            padding: 20px;
        }

        h2, h3 {
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Chore Management Dashboard</h2>

    <!-- Display All Assignments -->
    <?php
             display($var_data);
             ?>
             </div>

    <!-- Display Chore Statistics -->
    <div>
        <h3>Chore Statistics</h3>
        <!-- Add dynamic charts or graphs here if desired -->
        <p>Total Chores:  <?php
             display($var_data);
             ?>
             </div></p>
        <p>In Progress Chores:  <?php
             display($var_data_in_progress);
             ?>
             </div></p>
        <p>Incomplete Chores:  <?php
             display($var_data_incomplete);
             ?>
             </div></p>
        <p>Completed Chores:  <?php
             display($var_data_completed);
             ?>
             </div></p>
    </div>

    <!-- Display Recently Assigned Chores -->
    <div>
        <h3>Recently Assigned Chores</h3>
        <ul>
        <?php
             display($var_data_recent);
             ?>
             </div>
        </ul>
    </div>

    <!-- Add more sections for other statistics or information -->

</body>
</html>
