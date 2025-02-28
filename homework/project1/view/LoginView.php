<?php
    session_name('login');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bug Login Page</title>
    </head>
    <body>
        <form action="LoginView.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username"><br />
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password"><br />
            <input type="submit" value="Login">
        </form>
        <?php
            //VALIDATION GOES HERE
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"]; //VALIDATE USERNAME BY SANITIZING (NOT DONE YET)
                $password = $_POST["password"]; //VALIDATE PASSWORD BY SANITIZING (NOT DONE YET)

                //ALLOWED USERNAME AND PASSWORD
                $valid_user = null; //WILL BE A LIST OF VALID USERNAMES
                $valid_password = null; //WILL BE A HASHED PASSWORD LIST
                //CHECK IF USERNAME AND PASSWORD MATCHES
                //SWITCH CASE FOR ADMIN, MANAGER, AND USER
                //CHECK FOR INVALID USERNAME OR PASSWORD
                $_SESSION['username'] = $username;
            }
            //session_unset() //Unset all session variables
            //session_destroy() //Destroy the session
        ?>
    </body>
</html>