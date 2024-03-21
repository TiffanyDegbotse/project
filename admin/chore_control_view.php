<?php
include("../functions/chore_fxn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - Add Chore</title>
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
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 5px;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <h2>Add Chore</h2>

    <form action="../actions/add_chore_action.php" method="post" id="addChoreForm">

        <label for="choreName">Chore Name:</label>
        <input type="text" name="choreName" id="choreName" placeholder="Kindly enter your chore name" required>


        <button type="submit" name="addChore" id="addChore">Add Chore</button>
    </form>

         <div>
            <?php
             display($var_data);
             ?>
             </div>
</body>
</html>
