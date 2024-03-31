<?php
include_once ("../settings/core.php");
include_once ("../settings/connection.php");
include ("../functions/select_chore.php");
include ("../functions/select_person.php");

// Check if the user is logged in
//session_start();
//checklogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - Assign Chore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
            color: #333;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 5px;
        }

        select,
        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2>Assign Chore</h2>

    <form action="../actions/assign_a_chore_action.php" method="post" id="assignChoreForm">
        <label for="assignPerson">Assign Person:</label>
        <select name="assignPerson" id="assignPerson" required>
            <?php
            foreach ($people as $value) {
                echo "<option value='" . $value['pid'] . "'>" . $value['fname'] . "</option>";
            }
            ?>
        </select>

        <label for="assignChore">Assign Chore:</label>
        <select name="Chore" id="Chore" required>
            <?php
            foreach ($chores as $value) {
                echo "<option value='" . $value['cid'] . "'>" . $value['chorename'] . "</option>";
            }
            ?>
        </select>

        <label for="dueDate">Due Date:</label>
        <input type="date" name="dueDate" id="dueDate" required>

        <!-- Hidden input for assignment ID -->
        <input type="hidden" name="assignment" value="<?php echo $assignment['assignmentid']; ?>">


        <!-- Submit Button -->
        <button type="submit" name="assignChore" id="assignChore">Assign Chore</button>



    </form>

    <?php
    // Include necessary functions for displaying assignments
    include ("../actions/get_all_assignment_action.php");
    ?>

    <!-- Display all assignments -->
    <?php include ("../functions/get_all_assignment_fxn.php"); ?>

    <div>
        <?php
        display($var_data);
        ?>
    </div>
</body>

</html>