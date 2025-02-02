<?php
    session_name('admin');
    session_start();

    $adminUser = "admin";
    $adminPass = "password"; 

    if (!empty($_GET['user']) && !empty($_GET['password'])) {
        //Get the username and password using $_GET
        $username = $_GET['user'];
        $password = $_GET['password'];

        //If they log-in correctly
        if ($username === $adminUser && $password === $adminPass) {
            //record that fact in a $_SESSION variable named ‘loggedIn’ with a value of ‘true’
            $_SESSION['loggedIn'] = true;

            //set the default timezone
            date_default_timezone_set('America/New_York');

            /*set a cookie with a name of “loggedIn” and a value of the date
            and time formatted like: January 25, 2015 10:00 am that expires in 10 minutes */
            $currDate = date("F j, Y, g:i a");
            setcookie("loggedIn", $currDate, time() + 600, "/");

            //send them on to the admin.php
            header("Location: admin.php");
            exit;

        /* if they are redirected to login.php from admin.php, 
        it should display a different message: “You need to log in”. */
        } else if (isset($_GET['alert']) && $_GET['alert'] == "invalidLogIn") {
            echo "<h1>You need to log in</h1>";

        } else {
            //If they don’t log-in correctly print a message saying “Invalid Login”
            //If they don’t provide both values, display a message “Invalid Login”
            echo "<h1>Invalid Login</h1>";

        }
    /* if they are redirected to login.php from admin.php, 
    it should display a different message: “You need to log in”. */
    } else if (isset($_GET['alert']) && $_GET['alert'] == "invalidLogIn") {
        echo "<h1>You need to log in</h1>";
        
    } else {
        //If they don’t log-in correctly print a message saying “Invalid Login”
        //If they don’t provide both values, display a message “Invalid Login”
        echo "<h1>Invalid Login</h1>";
    }


    //If they have logged in before (if the session variable exists), then simply re-direct them to the admin.php page
    if (!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        header("Location: admin.php");
        exit;
    }

?>