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
    if ($allAssignments === null) {
        echo "<p>No assignments found.</p>";
    } else {
        echo "<h3>All Assignments</h3>";
        echo "<table>";
        // ... (as before)
    }
    ?>

    <!-- Display Chore Statistics -->
    <div>
        <h3>Chore Statistics</h3>
        <!-- Add dynamic charts or graphs here if desired -->
        <p>Total Chores: <?php echo $totalChores; ?></p>
        <p>In Progress Chores: <?php echo $inProgressChores; ?></p>
        <p>Incomplete Chores: <?php echo $incompleteChores; ?></p>
        <p>Completed Chores: <?php echo $completedChores; ?></p>
    </div>

    <!-- Display Recently Assigned Chores -->
    <div>
        <h3>Recently Assigned Chores</h3>
        <ul>
            <?php foreach ($recentlyAssignedChores as $chore) : ?>
                <li><?php echo $chore['chore_name']; ?> - Assigned to: <?php echo $chore['assigned_to']; ?>, Due Date: <?php echo $chore['due_date']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Add more sections for other statistics or information -->

</body>
</html>
