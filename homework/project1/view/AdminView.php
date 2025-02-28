<?php
    // Start the session
    session_name('admin');
    session_start();
    $_SESSION['username'] = $_GET['username'];

    //Checks if the Admin is logged in
    if (!isset($_SESSION['username'])) {
        if ($_SESSION['username'] != 'admin') {
            header("Location: LoginView.php");
            exit();
        }
    }
    
    require_once '../controller/UserController.php';
    require_once '../controller/BugController.php';
    //CREATION OF CLASS THAT CONNECTS TO USERCONTROLLER AND BUGCONTROLLER

    //START CONNECTION TO THE DATABASE

    //LOGOUT BUTTON (CREATE BUTTON)
    //header ("Location: LoginView.php");
    //session_unset() //Unset all session variables
    //session_destroy() //Destroy the session
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Page</title>
    </head>
    <body>
        <h1>Admin View</h1>
        <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
        <!-- ADD TABLE HERE FOR DATA RETRIEVAL
        ADD BUTTONS FOR ADMIN FUNCTIONS
        ADD UPDATE BUTTON
        ADD ADD BUG BUTTON
        ADD USER BUTTON
        ETC.
        ADD BUTTON FOR LOGOUT -->
    </body>
</html>