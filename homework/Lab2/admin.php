<?php
    session_name('admin');
    session_start();

    /*if the user tries to access this file without logging in, re-direct them back to
    the login.php page which should display a message saying “Invalid Login” –
    use the session variable to check. */
    if ($_SESSION['loggedIn'] !== true) {
        /* if they are redirected to login.php from admin.php, 
        it should display a different message: “You need to log in”. */
        header("Location: login.php?alert=invalidLogIn");
        exit;
    }

    //if the user is logged in
    if (!empty($_COOKIE['loggedIn'])) {
        //provide them with the value of the “loggedIn”
        echo "<h1>You logged in " . $_COOKIE['loggedIn'] . "</h1>";

        //unset the session variable and destroy the session
        session_unset();
        session_destroy();
        
        //unset both cookies (session and ‘loggedIn’)
        setcookie('loggedIn', "", time() - 3600, "/");
        setcookie(session_name(), "", time() - 3600, "/");
    }
?>