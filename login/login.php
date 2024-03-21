<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        input {
            margin: 8px 0;
            padding: 10px;
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
    <h2>Login</h2>
    <form action="../actions/login_user_action.php" method="post" id="loginForm">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Kindly enter your email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">

        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Kindly enter your password" required minlength="6">

        <br>

        <button type="submit" name="signIn" id="signIn">Sign In</button>
    </form>

    <br>

    <p>Don't have an account? <a href="../login/register.php">Register</a></p>
</body>
</html>
