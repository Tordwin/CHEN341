<?php

    session_name('edwin');
    session_start();

    if (!empty($_SESSION['name'])) {
        $_SESSION['loggedIn'] = true;
        date_default_timezone_set('America/New_York');
        $currDate = date("F j, Y, g:i a");
        setcookie("loggedIn", $currDate, time() + 600, "/");
        header("Location: admin.php");
        exit;
    } else {
        echo "<h1>Invalid Login</h1>"
    }

?>