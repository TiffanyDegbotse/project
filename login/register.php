<?php
    include "../functions/select_role.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
            background-image: url('https://redtri.com/wp-content/uploads/2010/03/kiddoingchores_happygirl_momandgirl_choresforkis_istock-957387872-e1567094544345.jpg');
        }

        form {
            display: inline-block;
            text-align: left;
        }

        input, select {
            margin: 10px 0;
            padding: 8px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Register</h2>
    <form action="../actions/register_user_action.php" name="register" method="post" id="registerForm">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" placeholder="Kindly enter your first name" required>

        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" placeholder="Kindly enter your last name" required>

        <br>

        <label for="Email">Email:</label>
        <input type="text" name="Email" id="Email" placeholder="Kindly enter your email" required>

        <br>

        <label>Gender:</label>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="Male" required>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="Female" required>

        <br>

        <label for="familyRole">Family Role:</label>
        <select name="familyRole" id="familyRole" required>

            <?php
                foreach ($roles as $value) {
                    echo "<option value='".$value['fid']."'>".$value['fam_name']."</option>";
                }
            ?>
        </select>

        <br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" required>

        <br>

        <label for="contact">Contact:</label>
        <input type="number" placeholder="Enter your contact information" name="contact">

    <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required minlength="6">

        <br>

        <label for="passwordRetype">Retype Password:</label>
        <input type="password" name="passwordRetype" id="passwordRetype" placeholder="Retype your password" required minlength="6">

        <br>
        <button type="submit" name="register" id="register">Register</button>
    </form>

        

    <p>Already have an account? <a href="WebTech Login page.html">Login</a></p>
</body>
</html>
